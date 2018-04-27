<?php

namespace App\Http\Controllers;

use App\Mail\verifyEmail;
use App\modelUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Mockery\Exception;
use Validator;

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
                Session::put('is_activated', $data->is_activated);
                Session::put('tipe', $data->tipe);
                Session::put('login', TRUE);
                if ($data->is_activated == 1) {
                    if ($data->tipe == 1) { //berarti dia penyedia acara
                    	return redirect('stageNow/home');
                    } else {
                    	return redirect('/');
                    }
                  }
                  else{
                    return redirect('login')->with('danger','Verifikasi Emailmu!');
                  }
                } else {
                	return redirect('login')->with('danger','Password atau email salah!');
                	// ->with('alert-success', '<script> window.onload = swal ( "Oops !" ,  "Password atau Email kamu Salah!" ,  "error" )</script>');
                }
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
            $data->verifyToken =str_random(30);
            $data->password = bcrypt($request->password);
            $data -> save();
          // $confirmation_code['link'] = str_random(30);
          // DB::table('user_activations')->insert(['id_user'=>$data['id'],'token'=>$confirmation_code['link']]);
            $thisUser = modelUser::findOrFail($data->id);
            $this->send($thisUser);
            return redirect()->to('login')->with('success',"Silahkan cek inbox atau folder spam email anda .");
          }
          public function send($thisUser)
          {
            Mail::to($thisUser['email'])->send(new verifyEmail($thisUser));
          }

  //     public function userActivation($token){
  //         $check = DB::table('user_activations')->where('token',$token)->first();
  //         if(!is_null($check)){
  //           $user = modelUser::find($check->id_user);
  //           if ($user->is_activated ==1){
  //             return redirect()->to('login')->with('success',"user are already actived.");

  //         }
  //         $user->update(['is_activated' => 1]);
  //         DB::table('user_activations')->where('token',$token)->delete();
  //         return redirect()->to('login')->with('success',"user active successfully.");
  //     }
  //     return redirect()->to('login')->with('Warning',"your token is invalid");
  // }
          
        }