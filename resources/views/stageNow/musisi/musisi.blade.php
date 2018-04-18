@extends('stageNow/layouts/app')
@section('headSection')
<link rel="stylesheet" href="{{asset('acara/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection
@section('main-content')
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
            <div class="box-header with-border">
                <h3 class="box-title">List Musisi</h3>
                {{-- <form action="#" method="get" class="col-lg-offset-5">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="Search Musisi...">
                      <span class="input-group-btn">
                        <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
            </form> --}}
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                title="Collapse">
                <i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="box-body">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">List Musisi StageNow</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Nama</th>
                                <th>Salary</th>
                                <th>Review</th>
                                <th>Kirim Pesan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($getMusisi as $x)
                            <tr>
                                <td>{{$loop -> index +1}}</td>
                                <td>{{$x ->nama}}
                                </td>
                                <td>Rp. {{number_format($x->salary , "2", ",", ".") }}</td>
                                <td><a href="#"><span class="fa fa-commenting-o"></span></a></td>
                                 <td><a href="#"><span class="fa fa-envelope"></span></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>S.No</th>
                                <th>Nama</th>
                                <th>Salary</th>
                                <th>Review</th>
                                <th>Kirim Pesan</th>
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

