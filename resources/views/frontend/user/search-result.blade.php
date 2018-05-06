@extends('frontend.base')
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

      <!--begin col-sm-8 -->
      <div class="col-sm-8">
        <div class="container">
          @if ($message = Session::get('success'))
          <div class="alert alert-success">
            <p>
              {{ $message }}
            </p>
          </div>
          @endif
          @if ($message = Session::get('warning'))
          <div class="alert alert-warning">
            <p>
              {{ $message }}
            </p>
          </div>
          @endif
          
        </div>
        <!--begin blog-item -->
        <div class="blog-item">

          <h1>Search Result</h1>
          <p>{{$user->total()}} Results for {{request()->input('query')}}</p>
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Judul</th>
                <th>Wilayah</th>
                <th>Deskripsi</th>
              </tr>
            </thead>
            <tbody>
              @foreach($user as $x)
              <tr>
                <th><a href="{{url('acara/'.base64_encode($x->id))}}">{{$x->judul}}</a></th>
                 @foreach(\App\modelWilayah::where('id',$x->wilayah_id)->get() as $y)
                <td>{{$y -> nama }}</td>
                 @endforeach
                <td>{{ str_limit($x->deskripsi, 80) }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
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
      <div class="col-sm-4 margin-top-10">
        <div class="col-md-12">
          <div class="search-container">
            {{-- <form action="/search" method="get">
              <input type="text" id="query" placeholder="Cari acara disini" name="query" value="{{request()->input('query')}}">
              <button type="submit"><i class="fa fa-search"></i></button>
            </form> --}}
            <form method="get" action="/search">
              <input type="text" id="query" value="{{request()->input('query')}}" name="query" class="textbox" placeholder="Search">
              <input title="Search" value="" type="submit" class="button fa fa-search">
            </form>
          </div>
        </div>
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