<?php

namespace App\Http\Controllers;

use App\acara;
use App\modelPesan;
use App\modelWilayah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AcaraFrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //  public function acara(acara $judul)
    // {
    //     return $judul;
    //     return view('frontend.acara.show');
    // }
    public function index()
    {
         $user = acara::paginate(2);

        $data = [
            'user' => $user
        ];
        return view('frontend.user.index',$data);
    }
    public function kafe()
    {
         $user = acara::where('kafe', 1)->get();
         $user = acara::where('kafe', 1)->paginate(2);
         $data = [
            'user' => $user
        ];
        return view('frontend.user.index',$data);
    }
     public function eo()
    {
         $user = acara::where('eventOrganizer', 1)->get();
         $user = acara::where('eventOrganizer', 1)->paginate(2);
         $data = [
            'user' => $user
        ];
        return view('frontend.user.index',$data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search($searcKey)
    {
        // $users = acara::search($searchKey)->get(); return $users;
        // $searchKey = $request->searchKey;
        $user = acara::search($searchKey)->paginate(2);
        $data = [
            'user' => $user
        ];
        return view('frontend.user.index',$data);
    }
    public function create()
    {
        //
    }

    public function wilayah($wilayah_id)
    {
       $idasli = base64_decode($wilayah_id);
        $user = acara::where('wilayah_id',$idasli)->paginate(2);

        $data = [
            'user' => $user,
        ];
        if(count($data) > 0){
            return view('frontend.user.index',$data);
        }
        else{
            return back()->with('warning','data di wilayah tersebut tidak di temukan!');
        }
    }

     public function wilayahNasional($id)
    {
       $idasli = base64_decode($id);
        $user = acara::where('id',$idasli)->paginate(2);

        $data = [
            'user' => $user,
        ];
        if(count($data) > 0){
            return view('frontend.user.index',$data);
        }
        else{
            return back()->with('warning','data di wilayah tersebut tidak di temukan!');
        }
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
        $idasli = base64_decode($id);
        $acara = acara::where('id',$idasli)->get();
        //$review = modelReview::where('event_id',$idasli)->get();
        //$review_user = modelReview::where('event_id',$idasli)->where('user_id',Session::get('id'))->get();
        //$countdata = modelReview::where('event_id',$idasli)->count();
        $countpesan = modelPesan::where('acara_id',$idasli)->where('pengirim_id', Session::get('id'))->count();
        $recent = acara::where('statusAcara', 1)->where('id', '!=' , $idasli)->orderBy('created_at', 'desc')->take(3)->get();

        $data = [
            'acaras' => $acara,
            //'review' => $review,
            //'review_user' => $review_user,
            //'countdata' => $countdata,
            'countpesan' => $countpesan,
            'recent' => $recent
        ];
        if(count($data) > 0){
            return view('frontend.acara.show',$data);
        }
        else{
            return back()->with('sweet-alert','<script> window.onload = swal ( "Oops !" ,  "Kami tidak dapat menemukan data tersebut!!" ,  "error" )</script>');
        }
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
