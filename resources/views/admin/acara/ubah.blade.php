@extends('admin/layouts/app')
@section('admin-content')
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
                        <h3 class="box-title">Edit Acara</h3>
                    </div>
                    @include('stageNow.includes.messages')
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{{url('ubahstatus/'.$acara->id)}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="box-body">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label>
                                            <input name="statusAcara" type="checkbox" value="1"  
                                            @if($acara ->statusAcara == 1)
                                            {{'checked'}}
                                            @endif> Status
                                        </label>
                                    </div>
                                </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a type="button" href="{{ route('admin.acara') }}" class="btn btn-warning">Back</a>
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