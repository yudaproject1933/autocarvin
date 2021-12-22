<?php

namespace App\Http\Controllers\Landing;

use File;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Transaction;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\TransactionEmail;
use Auth;

class DashboardController extends Controller
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
            }
            // else{
            //     $data_email = $data_email->where('status_payment',"pending");
            // }

            $data_email = $data_email->orderBy('created_date','DESC')->get();
            // dd($data_email);
            // Session::flush();
            $data['result_data'] = $data_email;
            $data['start_date'] = $start_date;
            $data['end_date'] = $end_date;
            $data['status_payment'] = $status_payment;

            return view('admin.dashboard.index', $data);
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
        $content_file = $request->content.' '.File::get(storage_path('setting_report/setting.blade.php'));
        // $dir = Storage::put(storage_path('app/public/report/'.$file_name),$content_file);
        // $dir = Storage::disk('local')->put('app/public/report/'.$file_name, $content_file);
        
        return $content_file;
    }

    public function upload_report(Request $request)
    {
        $file = $request->file('file_docs');
        $name_file = $file->getClientOriginalName();

        $path = Storage::putFileAs('/report',$file, $name_file);

        // dd($path);
        // $model = Transaction::where(['id' => $request->id_transaction])->first();
        $model = Transaction::findOrFail($request->id_transaction);
        $model->update([
            'link_docs' => $path,
            'updated_date' => date('Y-m-d H:i:s')
        ]);

        return redirect()->back();
    }

    public function sendEmail($id)
    {
        $model = Transaction::findOrFail($id);
        $docs = Storage::get('public/report/'.$model['vin'].'.pdf');

        $details = [
            'title' => 'Mail From Premium Report',
            'body' => 'test send email',
            'link'  => url('/').Storage::url($model['link_docs']),
            'docs_attach' => $docs,
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
