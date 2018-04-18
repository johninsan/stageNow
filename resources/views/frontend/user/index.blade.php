@extends('frontend.base')
@section('section')
<!--begin blog -->
<section class="section-white small-padding">

    <!--begin container-->
    <div class="container padding-bottom-40">

        <!--begin row-->
        <div class="row">

            <!--begin col-sm-8 -->
            <div class="col-sm-8">

                <!--begin blog-item -->
                <div class="blog-item">

                    <!--begin popup image -->
                    @foreach($user as $x)
                    <div class="popup-wrapper">
                        <div class="popup-gallery">
                            <a href="blog-single.html"><img src="{{ url('uploads/foto') }}/{{ $x->foto }}" class="width-100" alt="pic"><span class="eye-wrapper2"><i class="icon icon-link eye-icon"></i></span></a>
                        </div>
                    </div>
                    <!--begin popup image -->

                    <!--begin blog-item_inner -->
                    <div class="blog-item-inner">
                        <h3 class="blog-title"><a href="{{url('acara/'.base64_encode($x->id))}}">{{ $x->judul }}</a></h3>
                        <p class="blog-icons" style="font-color:#191010; font-size: 11pt">Rp. {{number_format($x->salary , "2", ",", ".") }}</p>

                        {{ $x->tanggal_mulai }} - {{ $x->tanggal_berakhir }} 

                        <p>{{ $x->deskripsi }}</p>

                    </div>
                    @endforeach
                    <hr>
                    <ul class="pager">
                        <li class="next">
                            {{ $user->links() }}
                        </li>
                    </ul>
                    <!--end blog-item-inner -->
                </div>
            </div>
            <!--end col-sm-8-->

            <!--begin col-sm-4 -->
            <div class="col-sm-4 margin-top-20">

               {{--  <h5>Acara Terbaru</h5>
                @foreach($recent as $recents)
                    <div class="sidebar_posts">
                        <a href="#" title=""><img src="{{ url('uploads/foto') }}/{{ $recents->foto }}" alt=""></a>
                        <a href="/acara/{{base64_encode($recents->id)}}" title="">{{ $recents->judul }}</a>
                        <span class="sidebar_post_date">{{ \Carbon\Carbon::createFromTimeStamp(strtotime($recents->created_at))->diffForHumans() }}</span>
                    </div>
                @endforeach --}}
                <!--begin recent_posts -->

                <!--begin tags -->   
                {{-- <h5>Tags:</h5>
                <ul class="tags">
                    <li>
                        <a href="#">WordPress</a>
                    </li>
                    <li>
                        <a href="#">Jquery</a>
                    </li>
                    <li>
                        <a href="#">Html5</a>
                    </li>
                </ul> --}}
                <!--end tags -->

            </div>
            <!--end col-sm-4-->

        </div>
        <!--end row-->  

    </div>
    <!--end container-->
    
</section>
@endsection