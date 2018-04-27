<?php

namespace App\Http\Controllers\Acara;

use App\Http\Controllers\Controller;
use App\modelPesan;
use App\modelUser;
use App\modelPesanHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Mockery\Exception;

class PesanAcaraController extends Controller
{
    public function index()
    {
        try{
            $pesan = DB::table('pesan')
                ->select('id','penerima_id','pengirim_id','acara_id','pesan','lampiran','url_lampiran','created_at','kode')
                ->where('penerima_id', Session::get('id'))
                ->groupBy('kode')
                ->orderBy('created_at','desc')
                ->get();
//
//            $pesan == DB::table('pesan')->select(DB::raw('*'))->where('penerima_id', Session::get('id'))->groupBy('kode')->orderBy('created_at','desc')
//                ->get();

            $data = [
                'pesan' => $pesan
            ];
            return view('stageNow.pesan.listpesan', $data);

        }
        catch(Exception $e){
            return response($e->getMessage());
        }

    }

    public function create(request $request)
    {
    	return $request->all();
    }

    public function show($id){
        try{
            try{
                $getPesan = modelPesan::where('kode',$id)->orderBy('created_at','desc')->get();
                $data = [
                    'modalpesan' => $getPesan
                ];
                return view('stageNow.pesan.pesan',$data);
            }
            catch (Exception $exception){
                return response($exception->getMessage());
            }
        }
        catch (Exception $exception){
            print_r($exception->getMessage());
        }
    }

    public function messagePost(Request $request){
            $header = new modelPesanHeader();
            $kode = rand(123000,560000);
            $header->kode = $kode;

            if($header->save()){
                $data = new modelPesan();
                $data->acara_id = $request->idAcara;
                $data->pengirim_id = Session::get('id');
                $data->penerima_id = $request->idPenerima;
                $data->pesan = $request->message;
                $file = $request->file('lampiran');
                if(!empty($file)){
                    $ext = $file->getClientOriginalExtension();
                    $name = time().'.'.$ext;
                    $file->move('uploads/acara',$name);
                    $data->lampiran = $name;
                    $data->url_lampiran = url('uploads/acara/').$name;
                }
                else{
                    $data->lampiran = null;
                    $data->url_lampiran = null;
                }
                 $data->save();
                return back();
            }
    }

    public function messageAcaraReply(Request $request)
    {
            $data = new modelPesan();
            $data->acara_id = $request->idAcara;
            $data->pengirim_id = Session::get('id');
            $data->penerima_id = $request->idPenerima;
            $data->kode = $request->kode;
            $data->pesan = $request->message;
            $file = $request->file('lampiran');
            if (!empty($file)) {
                $ext = $file->getClientOriginalExtension();
                $name = time() . '.' . $ext;
                $file->move('uploads/acara', $name);
                $data->lampiran = $name;
                $data->url_lampiran = url('uploads/acara/') . $name;
            } else {
                $data->lampiran = null;
                $data->url_lampiran = null;
            }
             $data->save();
             return back();
    }
}
