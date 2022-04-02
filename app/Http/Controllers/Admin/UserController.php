<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd('masuk');
        $data['username'] = Auth::user()->email;
        $error = isset($_GET['error']) && $_GET['error'] != '' ? $_GET['error'] : '';
        $success = isset($_GET['success']) && $_GET['success'] != '' ? $_GET['success'] : '';

        $data['error'] = $error != '' ? 'style="color: red;"' : 'style="color: red; display: none;"';
        $data['message'] = $success != '' ? 'Your Password Has Been Updated' : "Your Old Password Doesn't Match";

        $data['success'] = $success;
        // $data['username'] = Auth::user()->username;
        // dd(Hash::check("initest@gmail.com.vehicle",Auth::user()->password));

        // $encrypted = Crypt::encryptString("vehicle");
		// $decrypted = Crypt::decryptString($encrypted);
 
		// echo "Hasil Enkripsi : " . $encrypted;
		// echo "<br/>";
		// echo "<br/>";
		// echo "Hasil Dekripsi : " . $decrypted;

        // dd($success);

        return view('admin.dashboard.user', $data);
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
        $old_pass = $request->old_password;
        $new_pass = Hash::make($request->new_password);

        if (Hash::check($old_pass,Auth::user()->password)) {
            $model = User::findOrFail(Auth::user()->id);

            $model->update([
                'password' => $new_pass
            ]);

            Auth::loginUsingId(Auth::user()->id);

            return redirect('/user?success=true');
        }else{
            return redirect('/user?error=true');
        }
        dd('masuk');
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
