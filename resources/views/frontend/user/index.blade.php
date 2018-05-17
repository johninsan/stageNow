@extends('frontend.base')
@section('headSection')
<script type="text/javascript">
  $(document).ready(function() {
     @foreach(\App\modelWilayah::all() as $testwil)
   $('#wil{{$testwil->id}}').click(function(){
   var wil = $("#wil{{$testwil->id}}").val(); 
    //alert(cat);
    $.ajax({
      type: 'get',
      dataType:'html',
      url: '{{url('/wilayahsort')}}',
      data: 'wil_id=' + wil,
      success:function(response){
        //console.log(response);
        $("#wilayahData").html(response);
      }
    });
  });
  @endforeach    
 });
</script>
@endsection
@section('section')
@if(\Illuminate\Support\Facades\Session::has('alert-success'))
{!! \Illuminate\Support\Facades\Session::get('alert-success') !!}
@endif
<!--begin blog -->
<section class="section-white small-padding">

  <!--begin container-->
  <div class="container padding-bottom-40">

    <!--begin row-->
    <div class="row">
      <div class="container">
      </div>
      <!--begin col-sm-8 -->
      <div class="col-sm-8">

        <!--begin blog-item -->
        <div class="blog-item">
          <div id="wilayahData">
          @foreach($user as $x)
          <div class="popup-wrapper">
            <div class="popup-gallery">
              <a href="blog-single.html"><img src="{{ url('uploads/foto') }}/{{ $x->foto }}" class="width-100" alt="pic"><span class="eye-wrapper2"><i class="icon icon-link eye-icon"></i></span></a>
            </div>
          </div>
          <!--begin popup image -->

          <!--begin blog-item_inner -->
          <div class="blog-item-inner margin-top-10" style="width: 100%;">
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
          </div>
          <!--begin popup image -->
          <!--end blog-item-inner -->
        </div>
      </div>
      <!--end col-sm-8-->
      <!--begin col-sm-4 -->
      <div class="col-sm-4 margin-top-10">
        <div class="col-md-12">
          <div class="search-container">
            {{-- <form action="/search" method="get">
              <input type="text" id="query" placeholder="Cari acara disini" name="query">
              <button type="submit"><i class="fa fa-search"></i></button>
            </form> --}}
            <form method="get" action="/search">
              <input type="text" id="query" name="query" class="textbox" placeholder="Search">
              <input title="Search" value="" type="submit" class="button fa fa-search">
            </form>
          </div>
        </div>
        <div class="col-md-12 margin-top-10">
          <!--begin recent_posts -->    
          <h5>Acara Terbaru</h5>
          @foreach($recent as $recents)
          <div class="sidebar_posts">
            <a href="#" title=""><img src="{{ url('uploads/foto') }}/{{ $recents->foto }}" alt=""></a>
            <a href="/acara/{{base64_encode($recents->id)}}" title="">{{ $recents->judul }}</a>
            <span class="sidebar_post_date">{{ \Carbon\Carbon::createFromTimeStamp(strtotime($recents->created_at))->diffForHumans() }}</span>
          </div>
          @endforeach
        </div>

        {{-- 
          <form role="form" action="#" method="get" enctype="multipart/form-data"> --}}  
            <div class="col-md-12 margin-top-10">
             <div class="dropdown">
              <button class="btn btn-primary dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">Pilih Wilayah Acara
                <span class="caret"></span></button>
                <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                  @foreach(\App\modelWilayah::all() as $cihuy)
                  <li class="option" id="wil{{$cihuy->id}}" value="{{ $cihuy->id }}">{{ $cihuy->nama }}</li>
                  @endforeach
                </ul>
              </div>
            </div>
      {{-- <div class="col-md-12 margin-top-20">
        <button type="submit" class="col-lg-4 btn btn-primary">Cari</button>
      </div> --}}
    {{-- </form> --}}
  </div>

  <!--begin recent_posts -->
</div>
<!--end col-sm-4-->

</div>
<!--end row-->  

</div>
<!--end container-->

</section>
@endsection
