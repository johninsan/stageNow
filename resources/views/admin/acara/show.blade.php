@extends('admin/layouts/app')
@section('headSection')
<link rel="stylesheet" href="{{asset('acara/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection
@section('admin-content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        @include('stageNow.layouts.pageHead')
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-body">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Data Table With Full Features</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Judul</th>
                                    <th>Status</th>
                                    <th>Ubah Status</th>
                                    <th>Tanggal Berakhir</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($acaras as $acara)
                                <tr>
                                    <td>{{$loop -> index +1}}</td>
                                    <td>{{$acara ->judul}}
                                    </td>
                                    <td>{{$acara ->statusAcara? 'Akan Berlangsung' : 'Sudah Berakhir'}}</td>
                                    <td>
                                        <a href="{{route('admin.edit',$acara ->id)}}"><span class="glyphicon glyphicon-edit"></span></a>
                                    </td>
                                    <td>{{ $acara->tanggal_berakhir}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>S.No</th>
                                    <th>Judul</th>
                                    <th>Status</th>
                                    <th>Ubah Status</th>
                                    <th>Tanggal Berakhir</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                Footer
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
@endsection
@section('footerSection')
<!-- DataTables -->
<script src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script src="{{asset('acara/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script>
    $(document).ready(function(){
        $('#myTable').DataTable();
    });
</script>
@endsection

