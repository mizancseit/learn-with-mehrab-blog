<?php

namespace App\Exports\Client;

use App\Models\BalanceRequest\BalanceRequest;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class BalanceRequestExecelExport implements FromView
{
    public $request;

    public function __construct($_request)
    {
        $this->request = $_request;
    }


    public function view(): View
    {
        $data_query = BalanceRequest::with('beneficary');

        if($this->request->search != ""){
            $data_query->whereHas('beneficary',function ($query) {
                $query->orWhere('account_name','like','%'.$this->request->search.'%')
                    ->orWhere('e_wallet','like','%'.$this->request->search.'%')
                    ->orWhere('ibn_number','like','%'.$this->request->search.'%');
            });
        }

        if($this->request->start_date != "" && $this->request->end_date != ""){
            $data_query->whereBetween('date',[$this->request->start_date.' 00:00:00',$this->request->end_date.' 23:59:59']);
        }

        $datas = $data_query->orderBy('id','desc')->get();

        return view('exports.clients.balance_request_excel_export',[
            'datas'=>$datas,
        ]);

    }
}
