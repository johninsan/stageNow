<?php

namespace App\Http\Controllers;

use App\acara;
use App\modelPesan;
use App\modelWilayah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Nicolaslopezj\Searchable\SearchableTrait;

class AcaraFrontendController extends Controller
{
     use SearchableTrait;

     protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'user.judul' => 10,
            'user.deskripsi' => 10,
            'wilayahs.name' => 5,
        ],
        'joins' => [
            'wilayahs' => ['id','wilayah_id'],
        ],
    ];

    public function wilayahs()
    {
        return $this->hasMany('modelWilayah');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function AboutUs()
    {
        return view('frontend.aboutus');
    }
    public function index()
    {
        $recent = acara::where('statusAcara', 1)
                  ->orderBy('created_at', 'desc')
                  ->take(3)->get();
        $user = DB::table('acaras')->where('statusAcara',1)
               ->orderByRaw('tanggal_mulai - tanggal_berakhir ASC')
               ->paginate(2);
         // $user = acara::paginate(2);

        $data = [
            'user' => $user,
            'recent' => $recent
        ];
        return view('frontend.user.index',$data);
    }
    public function kafe()
    {
        $recent = acara::where('statusAcara', 1)
                  ->orderBy('created_at', 'desc')
                  ->take(3)->get();
         // $user = acara::where('kafe', 1)->get();
         $user = acara::where('kafe', 1)
                 ->where('statusAcara',1)
                 ->orderByRaw('tanggal_mulai - tanggal_berakhir ASC')
                 ->paginate(2);
         $data = [
            'user' => $user,
            'recent' => $recent
        ];
        return view('frontend.user.index',$data);
    }
     public function eo()
    {
        $recent = acara::where('statusAcara', 1)
                  ->orderBy('created_at', 'desc')
                  ->take(3)->get();
         // $user = acara::where('eventOrganizer', 1)->get();
         $user = acara::where('eventOrganizer', 1)
                 ->where('statusAcara',1)
                 ->orderByRaw('tanggal_mulai - tanggal_berakhir ASC')
                 ->paginate(2);
         $data = [
            'user' => $user,
            'recent' => $recent
        ];
        return view('frontend.user.index',$data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $query = $request->input('query');
        $user = acara::search($query)
        ->paginate(10);
        // $request->validate([
        //     'query' => 'required|min:3',
        // ]);
        // $query = $request->input('query');
        // $user = acara::where('judul','like',"%$query%")
        //         ->orwhere('deskripsi','like',"$query%")
        //         ->paginate(10);


        // $users = acara::search($searchKey)->get(); return $users;
        // $searchKey = $request->searchKey;
        // $user = acara::search($searchKey)->paginate(2);
        // $data = [
        //     'user' => $user
        // ];
        if(count($user) > 0){
            return view('frontend.user.search-result',compact('user'));
        }
        else{
            return back()->with('sweet-alert','<script> window.onload = swal ( "Oops !" ,  "Kami tidak dapat menemukan data tersebut!!" ,  "error" )</script>');
        }
        //return view('frontend.user.search-result',compact('user'));
    }
    public function wilayahsort(Request $request)
    {
        $wil_id = $request->wil_id;
         $user = DB::table('acaras')->where('statusAcara',1)
        ->join('wilayah','wilayah.id','acaras.wilayah_id')
        ->where('acaras.wilayah_id',$wil_id)
        ->paginate(2);
        // return view('frontend.user.wilayahsort',[
        //     'user' => $user,
        // ]);
        $data = [
            'user' => $user,
        ];
        if(count($data) > 0){
            return view('frontend.user.wilayahsort',$data);
        }
        else{
           return back()->with('sweet-alert','<script> window.onload = swal ( "Oops !" ,  "Kami tidak dapat menemukan wilayah tersebut!!" ,  "error" )</script>');
        }
    }
    public function create()
    {
        //
    }

    public function wilayah($wilayah_id)
    {
       $idasli = base64_decode($wilayah_id);
        $user = acara::where('wilayah_id',$idasli)->paginate(2);
        $recent = acara::where('statusAcara', 1)
                  ->orderBy('created_at', 'desc')
                  ->take(3)->get();
        $data = [
            'user' => $user,
            'recent' =>$recent
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
