<?php

namespace App\Http\Controllers\BackEnd\ContactUs;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{

    public function index(Request $request)
    {
        $data_query = ContactUs::query();

        if($request->search != ""){
            $data_query->where('name','like','%'.$request->search.'%')
            ->orWhere('email','like','%'.$request->search.'%')
                ->orWhere('subject','like','%'.$request->search.'%');
        }

        $data = $data_query->orderBy('id','desc')->paginate(50);

        return view('backends.contact-us.index',[
            'datas'=>$data,
            'search'=>$request->search
        ]);
    }



    public function destroy($id)
    {
        try {
            ContactUs::where(['id'=>$id])->delete();
            session()->flash('success','Data deleted successfully');
            return redirect()->route('admin.contact-messages.index');
        }catch (\Exception $exception){
            session()->flash('error',$exception->getMessage());
            return redirect()->back();
        }
    }

}
