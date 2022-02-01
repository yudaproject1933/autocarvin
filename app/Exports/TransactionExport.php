<?php

namespace App\Exports;

use App\Models\Transaction;
use Maatwebsite\Excel\Concerns\FromCollection;

class TransactionExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return Transaction::all();
    // }

    public function __construct(string $start_date, string $end_date, string $status_payment)
    {
        $this->start_date = $start_date;
        $this->end_date = $end_date;
        $this->status_payment = $status_payment;
    }

    public function query()
    {
        return Transaction::query()->select('nama','nik')->where('nama','like', '%'.$this->name.'%')->where('bagian', 'like', '%'.$this->bagian.'%');
    }

    public function collection()
    {
        // dd($this->status_payment);
        // die();
        $data_email = Transaction::query()->select('created_date','phone','vin');
        if ($this->start_date !== '' && $this->end_date === '') {
            $data_email = $data_email->whereDate('created_date', '=', $this->start_date);
        }
        if ($this->start_date !== '' && $this->end_date !== '') {
            $data_email = $data_email->whereDate('created_date', '>=', $this->start_date);
        }
        if ($this->end_date !== '') {
            $data_email = $data_email->whereDate('created_date', '<=', $this->end_date);
        }
        if ($this->status_payment !== '') {
            $data_email = $data_email->where('status_payment',$this->status_payment);
        }
        $data_email = $data_email->orderBy('created_date', 'ASC');

        return $data_email->get();
        // return Email::all();
        // return Email::query()->select('phone','vin')->where('nama','like', '%'.$this->name.'%')->where('bagian', 'like', '%'.$this->bagian.'%');
        // return Email::select('phone','vin')->get();
    }
}
