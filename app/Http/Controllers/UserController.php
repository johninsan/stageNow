<?php

namespace App\Http\Controllers;

use App\modelUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Mockery\Exception;

class UserController extends Controller
{
	public function login(){
		return view('frontend.register-login.login');
	}

	public function loginPost(Request $request){
		// try {
			$email = $request->email;
			$password = $request->password;

			$data = modelUser::where('email', $email)->first();
            if (count($data) > 0) { //apakah email tersebut ada atau tidak
            	if (Hash::check($password, $data->password)) {
            		Session::put('id', $data->id);
            		Session::put('name', $data->nama);
                    Session::put('salary', $data->salary);
            		Session::put('email', $data->email);
            		Session::put('nohp', $data->nohp);
            		Session::put('tipe', $data->tipe);
            		Session::put('login', TRUE);
                    if ($data->tipe == 1) { //berarti dia penyedia acara
                    	return redirect('stageNow/home');
                    } else {
                    	return redirect('/');
                    }
                } else {
                	return redirect('login');
                	// ->with('alert-success', '<script> window.onload = swal ( "Oops !" ,  "Password atau Email kamu Salah!" ,  "error" )</script>');
                }
            } else {
            	return redirect('login')->with('message','Password atau email salah!');
            	// ->with('alert-success', '<script> window.onload = swal ( "Oops !" ,  "Password atau Email kamu Salah!" ,  "error" )</script>');
            }
        //}
        // catch (Exception $e){
        // 	return response ($e->getMessage());
        // }

    }

    public function logout(){
    	Session::flush();
    	return redirect('/')->with('message','Kamu telah logout!');
    	// return redirect('login')->with('alert-success','<script> window.onload = swal("Sukses!", "Kamu telah logout!", "success")</script>');
    }

//    public function register(Request $request){
//        return view('frontend.register-login.register');
//    }

    public function registerPost(Request $request){
    	// try{
    		$this->validate($request, [
    			'name' => 'required|min:4',
    			'email' => 'required|unique:users',
    			'phone' => 'required|min:4',
    			'address' => 'required',
                // 'salary' => 'required|numeric',
    			'password' => 'required',
    			'confirmation' => 'required|same:password',
    		]);

    		$data =  new modelUser();
    		$data->nama = $request->name;
            $data->salary = $request->salary;
    		$data->email = $request->email;
    		$data->alamat = $request->address;
    		$data->nohp = $request->phone;
    		$data->tipe = $request->type;
    		$data->password = bcrypt($request->password);
    		$data -> save();
    		 return redirect('login');
            // if($data->save()){
            //     return back()->with('alert-success','<script> window.onload = swal("Sukses!", "Berhasil Daftar !", "success")</script>');
            // }
            // else{
            //     return back()->with('alert-success','<script> window.onload = swal ( "Oops !" ,  "Gagal Daftar!" ,  "error" )</script>');
            // }

    		//}
    	// catch (Exception $e){
    	// 	return back()->with('alert-success',$e->getMessage());
    	// }
    }

    public function test(){
    	return redirect('/login')->with('alert-success','<script> window.onload = swal ( "Oops" ,  "Something went wrong!" ,  "error" )</script>');
    }
}
