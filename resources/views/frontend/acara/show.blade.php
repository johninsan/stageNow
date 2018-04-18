@extends('frontend.base')
@section('section')
<section class="section-white small-padding">

    <!--begin container-->
    <div class="container padding-bottom-40">

        <!--begin row-->
        <div class="row">

            <!--begin col-sm-8 -->
            <div class="col-sm-8">

                <!--begin blog-item -->
                <div class="blog-item">
                    @foreach($acaras as $x)
                    <!--begin popup image -->
                    <div class="popup-wrapper">
                        <div class="popup-gallery">
                            <a href="#"><img src="{{ url('uploads/foto') }}/{{ $x->foto }}" class="width-100" alt="pic"><span class="eye-wrapper2"><i class="icon icon-link eye-icon"></i></span></a>
                        </div>
                    </div>
                    <!--begin popup image -->

                    <!--begin blog-item_inner -->
                    <div class="blog-item-inner margin-bottom-50">                        
                        <a href="#" class="blog-icons last"><i class="icon icon-calendar"></i> {{$x->tanggal_mulai }}</a>
                        <a href="#" class="blog-icons last"><i class="icon icon-calendar"></i> {{$x->tanggal_berakhir }}</a>

                        <p>{{ $x->deskripsi }}</p>

                    </div>
                    @endforeach
                    <table class="table">
                        <tbody>
                            <tr>
                               @foreach(\App\modelUser::where('id',$x->user_id)->get() as $y)
                               <td><i class="fa fa-user"></i>&nbsp;&nbsp;&nbsp;Penyelenggara :</td>
                               <td><b><i class="icon icon-user" id="nameAcara"></i> {{ $y->nama }}</b></td>
                                @endforeach
                            </tr>
                            <tr>
                                <td><i class="fa fa-dollar"></i>&nbsp;&nbsp;&nbsp;Bayaran</td>
                                <td><b>Rp. {{number_format($x->salary , "2", ",", ".") }} / Tampil</b></td>
                            </tr>
                            <tr>
                                <td><i class="fa fa-spinner"></i>&nbsp;&nbsp;&nbsp;Status Event</td>
                                <td>@if(\Carbon\Carbon::now() > $x->tanggal_berakhir ) <font style="background-color: red; padding: 5px" color="white"> Event sudah berakhir </font> @else <font style="background-color: green; padding: 5px" color="white"> Event akan berlangsung </font> @endif</td>
                            </tr>
                        </tbody>
                    </table>

                    @if(($countpesan) < 1)
                    @if(\Illuminate\Support\Facades\Session::get('tipe') != 1 OR \Illuminate\Support\Facades\Session::get('tipe') != 2)
                    <hr>
                    <p>*<b> Tertarik untuk Tampil disini? Kirimkan pesan!</b></p>
                    <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#modalCompose">Kirim Pesan</button>
                    @endif
                    @else
                    <div class="alert alert-success">Kamu telah mengirimkan pesan, harap tunggu balasan dari penyedia acara. <br><a href="{{-- /home/pesan --}}">Klik disini untuk melihat pesan masuk</a> </div>
                    @endif
                    <!--end blog-item-inner -->

                    <!--end post_author -->
                    

                    </div>

                    </div>
                    <!--end col-sm-8-->

                    <!--begin col-sm-4 -->
                    <div class="col-sm-4 margin-top-20">

                    <!--begin recent_posts -->    
                    <h5>Acara Terbaru</h5>
                    @foreach($recent as $recents)
                    <div class="sidebar_posts">
                    <a href="#" title=""><img src="{{ url('uploads/foto') }}/{{ $recents->foto }}" alt=""></a>
                    <a href="/acara/{{base64_encode($recents->id)}}" title="">{{ $recents->judul }}</a>
                    <span class="sidebar_post_date">{{ \Carbon\Carbon::createFromTimeStamp(strtotime($recents->created_at))->diffForHumans() }}</span>
                </div>
                @endforeach
                <div>
                    <h5>Tags:</h5>
                    <ul class="tags">
                        <li>
                            <a href="#">WordPress</a>
                        </li>
                        <li>
                            <a href="#">Jquery</a>
                        </li>
                        <li>
                            <a href="#">Html5</a>
                        </ul>
                        <!--end tags -->        
                    </div>                                
                </div>
                <!--end col-sm-4-->

            </div>
            <!--end row-->

        </div>
        <!--end container-->

    </section>
    <!-- /.modal compose message -->
    <div class="modal fade" id="modalCompose">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Kirim Pesan</h4>
                </div>
                <div class="modal-body">
                    <form role="form" class="form-horizontal" action="/messagePost" method="post" enctype="multipart/form-data">
                        @foreach($acaras as $acara)
                        <div class="form-group">
                            <label class="col-sm-2" for="inputTo">Kepada</label>
                            <input type="hidden" name="idAcara" class="form-control" value="{{ $acara->id }}">
                            <input type="hidden" name="idPenerima" class="form-control" value="{{ $acara->user_id }}">
                            <div class="col-sm-10"><input disabled type="text" class="form-control" id="nameModal" placeholder="comma separated list of recipients" value="{{ $acara->judul }}"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12" for="inputBody">Pesan</label>
                            <div class="col-sm-12"><textarea name="message" class="form-control" id="inputBody" rows="7" placeholder="Masukkan pesan kamu disini...." required=""></textarea></div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12" for="inputBody">Lampiran</label>
                            <div class="col-sm-12"><input type="file" class="form-control" id="inputSubject" placeholder="subject" name="lampiran"></div>
                        </div>
                        @endforeach

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary ">Send <i class="fa fa-arrow-circle-right fa-lg"></i></button>
                        </div>
                    </form>

                </div>


            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal compose message -->
    <!--end blog -->
    @endsection