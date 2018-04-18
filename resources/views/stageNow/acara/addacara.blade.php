@extends('stageNow/layouts/app')
@section('headSection')
<link rel="stylesheet" href="{{ asset('acara/plugins/timepicker/jquery.datetimepicker.min.css') }}">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
@endsection
@section('main-content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Tambah Acara
            <small>Tambah Acara stageNow</small>
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
                    <form role="form" action="{{ route('acara.store') }}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="box-body">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="judul">Judul Acara</label>
                                    <input type="text" class="form-control" name="judul" id="judul" placeholder="input Judul">
                                </div>
                                <div class="form-group">
                                    <label for="Deskripsi">Deskripsi</label>
                                    <textarea class="form-control" rows="3" name="deskripsi" id="deskripsi" placeholder="Masukkan Deskripsi..."></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Mulai:</label>
                                </div>
                                <div>
                                    <input type="text" class="form-control pull-right datetimepicker" name="tanggal_mulai" data-date-format="yyyy-mm-dd H:i:s">
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Berakhir:</label>
                                </div>
                                <div>
                                    <input type="text" class="form-control pull-right datetimepicker" name="tanggal_berakhir" data-date-format="yyyy-mm-dd H:i:s">
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat Acara</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="input alamat">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <small>Jenis Acara:</small>
                                <br>
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label>
                                            <input name="eventOrganizer" type="checkbox" value="1"> Event Organizer
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input name="kafe" type="checkbox" value="1"> Kafe
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Gaji</label>
                                    <input type="text" class="form-control" id="salary" name="salary" placeholder="salary">
                                </div>
                                <div class="form-group pull-left">
                                <div class="pull-right">
                                    <label for="foto">Upload Foto</label>
                                    <input type="file" name="foto" id="foto">
                                </div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
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