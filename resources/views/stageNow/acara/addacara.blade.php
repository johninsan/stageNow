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
                                    <label for="alamat">Alamat Acara: <br><br></label>
                                    <input type="text" class="form-control" id="txtautocomplete" name="alamat" placeholder="Alamat Mu Lur"/>
                                    <br>
                                    <input  type="hidden" id="lat" name="lat">
                                    <input type="hidden" id="long" name="long">
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
                                    <label for="gaji">Gaji</label>
                                    <input type="text" class="form-control" id="salary" name="salary" placeholder="salary">
                                </div>
                                 <label for="wilayahh">Wilayah</label>
                                <select type="text" id="wilayah_id" name="wilayah_id" class="form-control" required=""'>
                                    <option value="">-- Pilih Wilayah Acara --</option>
                                    @foreach(\App\modelWilayah::all() as $cihuy)
                                    <option value="{{ $cihuy->id }}">{{ $cihuy->nama }}</option>
                                    @endforeach
                                </select>
                                <br>
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
<script type="text/javascript">
    google.maps.event.addDomListener(window, 'load', intilize);
    function intilize() {
        var autocomplete = new google.maps.places.Autocomplete(document.getElementById("txtautocomplete"));

        google.maps.event.addListener(autocomplete, 'place_changed', function () {

            var place = autocomplete.getPlace();
            var lat = place.geometry.location.lat();
            var lng = place.geometry.location.lng();
            document.getElementById('lat').value = lat
            document.getElementById('long').value = lng
        });

    };

</script>
@endsection