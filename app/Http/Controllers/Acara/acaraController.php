<?php

namespace App\Http\Controllers\Acara;

use App\Http\Controllers\Controller;
use App\User;
use App\acara;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class acaraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $acaras = acara::where('user_id',Session::get('id'))->get();
         //$getMusisi = User::where('tipe', 2)->get();
        //$acaras = acara::all();
        return view('stageNow.acara.show',compact('acaras'));
    }
    public function musisi()
    {
         $getMusisi = User::where('tipe', 2)->get();
        //$acaras = acara::all();
        return view('stageNow.musisi.musisi',compact('getMusisi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('stageNow.acara.addacara'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this -> validate($request, [
            'judul' => 'required',
            'deskripsi' => 'required',
            //'tanggal_mulai' => 'required|date_format:"d-m-Y"',
            //'tanggal_berakhir' => 'required|date_format:"d-m-Y"',
            'alamat' => 'required',
        ]);
        $tanggal_mulai = date("Y-m-d");
        $tanggal_berakhir = date("Y-m-d");
        $acara = new acara;
        $acara->user_id = Session::get('id');
        $acara ->judul = $request ->judul;
        $acara ->deskripsi = $request ->deskripsi;
        $acara ->lat = $request ->lat;
        $acara ->long = $request ->long;
        $file = $request->file('foto');
        if(empty($file)){
            $acara->urlfoto = null;
            $acara->foto = null;
        }
        else{
            $ext = $file->getClientOriginalExtension();
            $newName = rand(100000,1001238912).".".$ext;
            $file->move('uploads/foto/',$newName);
            $acara->foto = $newName;
            $urlfoto = url('uploads/foto/').$newName;
            $acara->urlfoto = $urlfoto;
        }
        $acara ->tanggal_mulai = $request ->tanggal_mulai;
        $acara ->tanggal_berakhir = $request ->tanggal_berakhir;
        $acara ->alamat = $request ->alamat;
        $acara ->salary = $request ->salary;
        $acara ->wilayah_id = $request ->wilayah_id;

        if(empty($request ->eventOrganizer)){
            $acara ->eventOrganizer = 0;
        }
        else{
            $acara ->eventOrganizer = $request ->eventOrganizer;
        }
        if(empty($request ->kafe)){
            $acara ->kafe = 0;
        }
        else{
            $acara ->kafe = $request ->kafe;
        }
        $acara -> save();
        return redirect(route('acara.index'));

        
        //$acara ->user_id = 19; //error child and parrent constraint

        // if($acara->save()){
        //     return redirect()->route('acara.index')->with('sweet-alert','<script> window.onload = swal("Sukses!", "Acara Telah Ditambahkan!!", "success")</script>');
        // }
        // else{
        //     return redirect()->route('acara.index')->with('sweet-alert','<script> window.onload = swal("Oops!", "Gagal Menambahkan Acara!", "error")</script>');
        // }
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
        $acara = acara::where('id',$id) ->first();
        return view('stageNow.acara.edit',compact('acara'));
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
        $this -> validate($request, [
            'judul' => 'required',
            'deskripsi' => 'required',
            //'tanggal_mulai' => 'required|date_format:"d-m-Y"',
            //'tanggal_berakhir' => 'required|date_format:"d-m-Y"',
            'alamat' => 'required',
        ]);
        $tanggal_mulai = date("Y-m-d");
        $tanggal_berakhir = date("Y-m-d");
        $acara = acara::find($id);
        $acara ->judul = $request ->judul;
        $acara ->deskripsi = $request ->deskripsi;
        //$acara ->latitude = $request ->lat;
        //$acara ->longitude = $request ->long;
        if (empty($request->file('foto'))){
            $acara->foto = $acara->foto;
        }
        else{
            unlink('uploads/foto/'.$acara->foto); //menghapus file lama
            $file = $request->file('foto');
            $ext = $file->getClientOriginalExtension();
            $newName = rand(100000,1001238912).".".$ext;
            $file->move('uploads/foto',$newName);
            $acara->foto = $newName;
        }
        $acara ->tanggal_mulai = $request ->tanggal_mulai;
        $acara ->tanggal_berakhir = $request ->tanggal_berakhir;
        $acara ->alamat = $request ->alamat;
        $acara ->salary = $request ->salary;
        $acara ->wilayah_id = $request ->wilayah_id;

        if(empty($request ->eventOrganizer)){
            $acara ->eventOrganizer = 0;
        }
        else{
            $acara ->eventOrganizer = $request ->eventOrganizer;
        }
        if(empty($request ->kafe)){
            $acara ->kafe = 0;
        }
        else{
            $acara ->kafe = $request ->kafe;
        }
        $acara -> save();
        return redirect(route('acara.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        acara::where('id',$id) ->delete();
        // return redirect()->route('acara.index')->with('sweet-alert','<script> window.onload = swal("Sukses!", "Acara Telah Dihapus!!", "success")</script>');
        return redirect()->back()->with('message','data has been deleted');
    }
}
