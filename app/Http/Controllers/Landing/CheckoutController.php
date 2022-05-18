<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Transaction;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function check()
    {
        $vin = isset($_GET['vin']) != '' ? $_GET['vin'] : '';
        $email = isset($_GET['email']) != '' ? $_GET['email'] : '';
        $phone = isset($_GET['phone']) != '' ? $_GET['phone'] : '';

        $res = [];
        if (!empty($result['attributes'])) {
            foreach ($result['attributes'] as $key => $value) {
                // echo "-".$key."-<br>";
                if ($key == "VIN") {
                    $res['vin'] = $value;
                }
                if ($key == "Year") {
                    $res['year'] = $value;
                }
                if ($key == "Make") {
                    $res['make'] = $value;
                }
                if ($key == "Model") {
                    $res['model'] = $value;
                }
                if ($key == "Engine") {
                    $res['engine'] = $value;
                }
                if ($key == "Made In") {
                    $res['made_in'] = $value;
                }
                if ($key == "Style") {
                    $res['style'] = $value;
                }
                if ($key == "Type") {
                    $res['type'] = $value;
                }
            }
        }
        
        $data['prev_data'] = $res;
        $data['status'] = isset($result['success']) ? true : false;

        $json = file_get_contents('https://ownershipcost.vinaudit.com/getownershipcost.php?key=VA_DEMO_KEY&vin='.$vin.'&mileage_start=-1&mileage_year=-1&country=');
        $data_preview = json_decode($json,true);

        if ($data_preview['success']) {
            $data['vehicle'] = $data_preview['vehicle'];
        }
        // $data[]
        // dd($data_preview);

        $data['vin'] = $vin;
        $data['email'] = $email;
        $data['phone'] = $phone;

        //insert
        $model = Transaction::create([
            'email' => $email,
            'phone' => $phone,
            'vin' => $vin,
            'status_payment' => 'checkout',
            'created_date' => date('Y-m-d H:i:s')
        ]);

        return view('landing.checkout.index', $data);

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
        if ($request->status_payment == 'pending') {
            $model = Transaction::where(['vin' => $request->vin,  'email' => $request->email, 'phone' => $request->phone, 'status_payment' => 'checkout'])->first(); 
        
            if ($model) {
                $model->update([
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'vin' => $request->vin,
                    'status_payment' => $request->status_payment,
                    'updated_date' => date('Y-m-d H:i:s')
                ]);
            }
        }else{
            $get_data = Transaction::where(['vin' => $request->vin,  'email' => $request->email, 'phone' => $request->phone, 'status_payment' => 'visit'])->first(); 
            // dd($request->phone);
            if ($get_data) {
                $get_data->update([
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'vin' => $request->vin,
                    'status_payment' => $request->status_payment,
                    'updated_date' => date('Y-m-d H:i:s')
                ]);
            }else{
                $model = Transaction::create([
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'vin' => $request->vin,
                    'status_payment' => $request->status_payment,
                    'created_date' => date('Y-m-d H:i:s')
                ]);
            }
        }

        

        
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
    
    public function payment_fcf()
    {
        $date = date('Y-m-d');
        
        try {
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://merchant.fcfpay.com/api/v1/create-order',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS =>'{
                    "domain": "https://vinautorecord.com/",
                    "order_id": "3",
                    "user_id": "1",
                    "amount": "10",
                    "currency_name": "USD",
                    "currency_code": "840",
                    "order_date": "2022-04-26",
                    "redirect_url": "https://vinautorecord.com/thank-you/"
                }',
                CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer P5Yw5JQTXTxo4yXXUb041mXoFroRCudOa9tHOuARkunknEE2tbEqvL8YUkMH',
                'Content-Type: application/json'
                ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);

            if ($err) {
                echo "cURL Error #:" . $err;
            } else {
                print_r(json_decode($response));
            }
            // dd($curl);
            // $response = curl_exec($curl);
            // dd($response);
            // curl_close($curl);
            // dd($response);
            // echo $response;
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
        

    }
}
