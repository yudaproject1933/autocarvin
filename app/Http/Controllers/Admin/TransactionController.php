<?php

namespace App\Http\Controllers\Admin;

use File;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Transaction;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\TransactionEmail;
use Auth;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role === 'admin') {
            $tgl_now = '';
            $tgl_end = '';

            if (date('d') <= 15) {
                $tgl_now = date('Y-m-01');
                $tgl_end = date('Y-m-15');
            }else{
                $tgl_now = date('Y-m-16');
                $tgl_end = date('Y-m-t');
            }
            // dd(date('d'));

            $start_date = isset($_GET['start_date']) ? $_GET['start_date'] : $tgl_now;
            $end_date = isset($_GET['end_date']) ? $_GET['end_date'] : $tgl_end;
            $status_payment = isset($_GET['status_payment']) ? $_GET['status_payment'] : '';

            $data_email = Transaction::select('*');
            if ($start_date !== '' && $end_date === '') {
                $data_email = $data_email->whereDate('created_date', '=', $start_date);
            }
            if ($start_date !== '' && $end_date !== '') {
                $data_email = $data_email->whereDate('created_date', '>=', $start_date);
            }
            if ($end_date !== '') {
                $data_email = $data_email->whereDate('created_date', '<=', $end_date);
            }
            if ($status_payment !== '') {
                $data_email = $data_email->where('status_payment',$status_payment);
            }else{
                $data_email = $data_email->whereIn('status_payment',["pending","success"]);
            }

            $data_email = $data_email->orderBy('created_date','DESC')->get();
            // dd($data_email);
            // Session::flush();
            $data['result_data'] = $data_email;
            $data['start_date'] = $start_date;
            $data['end_date'] = $end_date;
            $data['status_payment'] = $status_payment;

            return view('admin.transaction.index', $data);
        }else{
            return redirect('/');
        }
    }

    public function generate_report(Request $request)
    {
        // dd($request->content);
        $data = Transaction::findOrFail($request->id_email);
        $vin = $data->vin;
    
        $file_name = $vin.'.blade.php';
        $file = $request->content.' '.File::get(storage_path('setting_report/setting.blade.php'));

        $dir = Storage::disk('local')->put('public/bank_report/'.$file_name, $file);
        
        $data->update([
            'link_docs' => "/read_report/".$data->id."/".$vin,
            'updated_date' => date('Y-m-d H:i:s')
        ]);
        
        // return $file;
        return redirect('/transaction');
    }

    public function upload_report(Request $request)
    {
        $model = Transaction::findOrFail($request->id_transaction);

        $file = $request->file('file_docs');
        $name_file = $model->vin.".pdf";

        $path = Storage::putFileAs('public/report',$file, $name_file);

        $model->update([
            'link_docs' => $path,
            'updated_date' => date('Y-m-d H:i:s')
        ]);

        return redirect()->back();
    }

    public function read_report($id, $vin)
    {
        $data = Transaction::findOrFail($id);
        $data_vin = $data->vin;

        if ($vin == $data_vin) {
            $file = $data_vin.".blade.php";
            $file = Storage::get('public/bank_report/'.$file);

            return $file;
        }else{
            return view('error404');
        }
    }

    public function sendEmail($id)
    {
        $model = Transaction::findOrFail($id);
        // dd(url('/')."/read_report/".$model->id."/".$model->vin);
        // $docs = Storage::get('public/report/'.$model['vin'].'.pdf');

        //url('/').Storage::url($model['link_docs'])
        $details = [
            'title' => 'Mail From Vin Data Record',
            'body' => 'Report',
            'link'  => url('/')."/read_report/".$model->id."/".$model->vin,
            'docs_name' => '',
            'vin' => $model['vin'],
        ];

        $email = $model->email;
        $kirim = Mail::to($email)->send(new TransactionEmail($details));

        $model->update([
            'status_payment' => 'success',
            'updated_date' => date('Y-m-d H:i:s')
        ]);

        return [
            'success' => true,
            'message' => "Email berhasil dikirim"
        ];
    }

    public function contactUs(Request $request) 
    {
        $message_send = [
            'name' => $request->name,
            'email' => $request->email,
            'message_body' => $request->message,
        ];

        $kirim = Mail::send('landing.dashboard.contact_us', ['body_message' => $message_send], function($message)
                {
                    $message->from('vindatarecord@gmail.com','Complaint Service')
                        ->to('vindatarecord@gmail.com')
                        ->subject('Complaint');
                });
        
        // return redirect('/');
        return [
            'success' => true,
            'message' => "Email berhasil dikirim"
        ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
