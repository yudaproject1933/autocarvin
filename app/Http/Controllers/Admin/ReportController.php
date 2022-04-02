<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Transaction;
use App\Models\Refund;

use Auth;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id_user = Auth::user()->id;
        $data_email = Transaction::where(['id_user' => $id_user]);
        $data_email = $data_email->whereIn('status_payment', ['success','refund','pending_refund','request_refund'])->orderBy('created_date','DESC')->get();
        

        $data['result_data'] = $data_email;

        return view('admin.dashboard.report', $data);
    }

    public function list_refund()
    {
        $model = Refund::get();
        // $data = Refund::find(1)->transaction->vin;
        // dd($data);
        
        $data['model'] = $model;

        return view('admin.dashboard.list_refund', $data);
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
        // dd($request->id_transaction);
        $data = Transaction::findOrFail($request->id_transaction);
        // dd($data);

        $data->update([
            'status_payment' => 'request_refund'
        ]);

        $model = Refund::create([
            'id_transaction' => $request->id_transaction,
            'command' => $request->command,
            'created_date' => date('Y-m-d H:i:s')
        ]);

        return redirect('/report');
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
        // dd('masuk');
        $data = Transaction::findOrFail($id);

        if ($data->status_payment === 'request_refund') {
            $data->update([
                'status_payment' => 'pending_refund'
            ]);
        }else{
            $data->update([
                'status_payment' => 'refund'
            ]);
        }
        

        return [
            'success' => true,
            'message' => "Refund Susscess"
        ];
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

    public function refund_info()
    {
        // dd('masuk');
        return view('landing.dashboard.refund');
    }
}
