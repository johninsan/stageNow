@extends('frontend.base')
@section('section')
@if(\Illuminate\Support\Facades\Session::has('alert-success'))
    {!! \Illuminate\Support\Facades\Session::get('alert-success') !!}
@endif
    @include('frontend.user.menu', ['menu' => 'Home' ])

    <section class="section-white small-padding">

        <!--begin container-->
        <div class="container">
            <div class="row">
                <div class="col-sm-3 col-md-2">
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                            stageNow
                        </button>
                    </div>
                </div>
                <div class="col-sm-9 col-md-10">

                </div>
            </div>
            <hr />
            <div class="row">
                <div class="col-sm-3 col-md-2">
                    <ul class="nav nav-pills nav-stacked">
                        <li class="active"><a href="#"><span class="badge pull-right">1546</span> Inbox </a></li>
                        <li><a style='color:black;' href="http://www.coderglass.com">Sent Mail</a></li>
                    </ul>
                </div>
                <div class="col-sm-9 col-md-10">
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="home">
                            <div class="list-group">
                                @if(count($pesan) <= 0)
                                    <a href="#" class="list-group-item">
                                        <center><span class="name" style="min-width: 120px; display: inline-block;"> You don't have any message !</span></center>
                                    </a>
                                    @else
                                    @foreach($pesan as $pesans)
                                        <a href="/pesan/detail/{{ base64_encode($pesans->id) }}" class="list-group-item">
                                            @foreach(\App\modelUser::where('id',$pesans->pengirim_id)->get() as $user)
                                                <span class="name" style="min-width: 120px; display: inline-block;">{{ $user->nama }}</span>
                                            @endforeach
                                            {{--<span class="">You have asdkasdkasmd 2 files</span>--}}
                                            <span class="text-muted" style="font-size: 11px;">{{ $pesans->pesan }}</span>
                                            <span class="badge">{{ \Carbon\Carbon::createFromTimestamp(strtotime($pesans->created_at))->diffForHumans() }}</span>
                                            @if($pesans->lampiran != null)
                                                <span class="pull-right"><span class="glyphicon glyphicon-paperclip"></span></span>
                                            @endif
                                        </a>
                                    @endforeach
                                    @endif
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
        <!--end container-->

    </section>


@endsection