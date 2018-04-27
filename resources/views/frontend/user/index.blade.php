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
          <div class="blog-item-inner" style="width: 100%;">
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
       <div>
        @if ($message = Session::get('warning'))
        <div class="alert alert-warning">
          <p>
            {{ $message }}
          </p>
        </div>
        @endif
        <h5>Wilayah:</h5>                    
        <ul class="tags">
          @foreach(\App\modelWilayah::all() as $y)
          <li class="text-center">
            <a href="{{url('home/wilayah/'.base64_encode($x->wilayah_id))}}">{{$y -> nama }}</a>
          </li>
          @endforeach  
        </ul>
        <!--end tags --> 

      </div>
    </div>
                {{-- <small>Cari Acara disini...</small>
                   <div class="search-container">
                    <form action="/search" method="get">
                        {{csrf_field()}}
                      <input type="text" placeholder="Cari acara disini" name="search">
                      <button type="submit"><i class="fa fa-search"></i></button>
                  </form>
                </div> --}}
                <!--begin recent_posts -->
              </div>
              <!--end col-sm-4-->

            </div>
            <!--end row-->  

          </div>
          <!--end container-->

        </section>
        @endsection