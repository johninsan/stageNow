<?php

namespace App\Http\Controllers;

use App\acara;
use App\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
	public function index()
	{
		return view('admin.home');
	}
	public function status()
    {
        $acaras = DB::table('acaras')->get();
        return view('admin.acara.show',compact('acaras'));
    }
	public function login(){
		return view('admin.login');
	}
	public function edit($id)
    {
        $acara = acara::where('id',$id) ->first();
        return view('admin.acara.ubah',compact('acara'));
    }
	public function ubahstatus(Request $request,$id)
    {
        $acara = acara::find($id);
        if(empty($request ->statusAcara)){
            $acara ->statusAcara = 0;
        }
        else{
            $acara ->statusAcara = $request ->statusAcara;
        }
        $acara -> save();
        // return redirect()->route('acara.index')->with('sweet-alert','<script> window.onload = swal("Sukses!", "Acara Telah Dihapus!!", "success")</script>');
        return redirect(route('admin.acara'))->with('message','Acara berhasil di edit');
    }
	public function adminloginPost(Request $request){
		// try {
		$email = $request->email;
		$password = $request->password;

		$data = admin::where('email', $email)->first();
            if (count($data) > 0) { //apakah email tersebut ada atau tidak
            	if (Hash::check($password, $data->password)) {
            		Session::put('id', $data->id);
            		Session::put('name', $data->nama);
            		Session::put('email', $data->email);
            		Session::put('nohp', $data->nohp);
            		Session::put('admin-login', TRUE);
            		return redirect('admin/home');
                } else {
                    return redirect('admin-login')->with('alert-success', '<script> window.onload = swal ( "Oops !" ,  "Password atau Email kamu Salah!" ,  "error" )</script>');
                }
            } else {
                return redirect('admin-login')->with('alert-success', '<script> window.onload = swal ( "Oops !" ,  "Cek password dan email!" ,  "error" )</script>');
            }
        }
        //}
        // catch (Exception $e){
        // 	return response ($e->getMessage());
        // }

    public function logoutadmin(){
    	Session::flush();
             //return redirect('/')->with('message','Kamu telah logout!');
    	return redirect('admin-login')->with('alert-success','<script> window.onload = swal("Sukses!", "Kamu telah logout!", "success")</script>');
    }
}
