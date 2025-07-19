<?php

namespace App\Http\Controllers\BackEnd\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PinValidationRequest;
use App\Models\Balance\Balance;
use App\Models\Balance\BalanceHistory;
use App\Models\Balance\Gateway;
use App\Models\Balance\PaymentEncOperation;
use App\Models\Balance\PaymentType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthorizationController extends Controller
{
    public function authForm(Request $request)
    {

        $data = null;
        if($request->key != ""){
            $data = PaymentEncOperation::where(['unique_string'=>$request->key])
                ->where(['session'=>session()->getId()])
                ->first();
        }

       // dd(session()->getId());

        if(is_null($data)){
            abort(403,"Key Not Found. Please don't try again");
        }

        return view('backends.auth.pin_validation_form',[
            'data'=>$data,
            'key'=>$request->key
        ]);
    }




    public function verifyPin(PinValidationRequest $request)
    {

        $user = User::where(['id'=>auth()->user()->id])
                    ->where(['pin'=>$request->pin])
                    ->first();

        if(is_null($user)){
            session()->flash('error','Your PIN is not valid. Please enter currect PIN and try again.');
            return redirect()->back();
        }

        $data = PaymentEncOperation::where(['unique_string'=>$request->key])
            ->where(['session'=>session()->getId()])
            ->first();


        if(is_null($data)){
            session()->flash('error',"Your KEY is not valid. Please don't try again");
            return redirect()->back();
        }

        DB::beginTransaction();

        try{
            $form_data = decrypt($data->form_date);

            if(isset($form_data['payment_type_id'])){

                $balance = Balance::where(['user_id'=>$form_data['user_id']])->first();
                if(is_null($balance)){
                    session()->flash('error','Balance data not found.');
                    return redirect()->back();
                }

                BalanceHistory::create([
                    'payment_type_id'=>$form_data['payment_type_id'],
                    'gateway_id'=>$form_data['gateway_id'],
                    'date'=>now(),
                    'amount'=>$form_data['amount'],
                    'notes'=>$form_data['notes'],
                    'user_id'=>$form_data['user_id'],
                    'added_by'=>auth()->user()->id,
                ]);


                if($form_data['payment_type_id'] == "1"){ //payment
                    Balance::where(['user_id'=>$form_data['user_id']])->update([
                        'amount'=>$balance->amount + $form_data['amount']
                    ]);
                }else{
                    // return
                    Balance::where(['user_id'=>$form_data['user_id']])->update([
                        'amount'=>$balance->amount - $form_data['amount']
                    ]);
                }

                //Remove old Data
                PaymentEncOperation::where(['unique_string'=>$request->key])
                    ->where(['session'=>session()->getId()])
                    ->delete();
                DB::commit();
                return redirect('admin/addPayment/'.$form_data['user_id']);
            }

        }catch (\Exception $exception){
            DB::rollBack();
            session()->flash('error',$exception->getMessage());
            return redirect()->back();
        }
    }



}
