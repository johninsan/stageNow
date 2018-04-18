@extends('stageNow/layouts/app')
@section('headSection')
<link rel="stylesheet" href="{{ asset('acara/plugins/timepicker/jquery.datetimepicker.min.css') }}">
@endsection
@section('main-content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Edit Acara
            <small>Edit Acara stageNow</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Tambah Acara</h3>
                    </div>
                    @include('stageNow.includes.messages')
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{{route('acara.update',$acara->id)}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                        <div class="box-body">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="judul">Judul Acara</label>
                                    <input type="text" class="form-control" name="judul" id="judul" placeholder="input Judul" value="{{$acara->judul}}">
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <textarea class="form-control" rows="3" name="deskripsi" id="deskripsi" placeholder="Masukkan Deskripsi...">{{$acara->deskripsi}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Mulai:</label>
                                </div>
                                <div>
                                    <input type="text" class="form-control pull-right datetimepicker" name="tanggal_mulai" data-date-format="yyyy-mm-dd H:i:s" value="{{$acara->tanggal_mulai}}">
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Berakhir:</label>
                                </div>
                                <div>
                                    <input type="text" class="form-control pull-right datetimepicker" name="tanggal_berakhir" data-date-format="yyyy-mm-dd H:i:s" value="{{$acara->tanggal_berakhir}}">
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat Acara</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="input alamat" value="{{$acara->alamat}}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <small>Open For:</small>
                                <br>
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label>
                                            <input name="eventOrganizer" type="checkbox" value="1"  
                                            @if($acara ->eventOrganizer == 1)
                                            {{'checked'}}
                                            @endif> Event Organizer
                                        </label>
                                    </div>
                                    <br>
                                    <div class="checkbox">
                                        <label>
                                            <input name="kafe" type="checkbox" value="1"
                                            @if($acara ->kafe == 1)
                                            {{'checked'}}
                                            @endif> kafe
                                        </label>
                                    </div>
                                    <br>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Gaji</label>
                                    <input type="text" class="form-control" id="salary" name="salary" placeholder="salary" value="{{$acara->salary}}">
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="email">Foto Lama:</label>
                                    <img src="{{ url('uploads/foto/'.$acara->foto) }}" style="width: 150px; height: 150px;">
                                </div>
                                <div class="pull-left">
                                    <label for="foto">Upload Foto</label>
                                    <input type="file" name="foto" id="foto">
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a type="button" href="{{ route('acara.index') }}" class="btn btn-warning">Back</a>
                        </div>
                        <!-- /.box-body -->

                    </form>

                </div>
                <!-- /.col-->
            </div>
        </div>
        <!-- ./row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection

@section('footerSection')
<script src="{{ asset('acara/plugins/timepicker/jquery.datetimepicker.full.js') }}"></script>
<script src="{{ asset('acara/plugins/timepicker/jquery.datetimepicker.full.min.js') }}"></script>
<script>
    // $(function() {
    //     $( ".datepicker" ).datepicker({
    //         todayHighlight: true,
    //         changeMonth: true,
    //         changeYear: true
    //     });
    // });
    $( ".datetimepicker" ).datetimepicker();
</script>
@endsection