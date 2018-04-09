@extends('layouts.master')
@section('content')
    <section class="content-header">


        <button class="btn btn-block btn-default" onclick="window.history.go(-1); return false;" type="button" style="width: 150px;"> < Back to Dashboard</button>



        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Attendance</a></li>
            <li class="active">Choose Area List</li>
        </ol>
    </section>

    <section class="content">

        <div class="box">
            <div class="box-header with-border">
                <h1 class="box-title">Choose Area</h1>
                <div class="box-tools pull-right">
                    <!-- Buttons, labels, and many other things can be placed here! -->
                    <!-- Here is a label for example -->
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">

                    @foreach($area as $area)
                        <div class="col-md-3 col-sm-6 col-xs-12">

                            <div class="info-box">
                                <a href="/jarn_em/public/areaEmployee/{{$area['areaid']}}" class="info-box-icon bg-aqua" ><i class="fa fa-map"></i></a>

                                <div class="info-box-content">
                                    <span class="info-box-text"><h3>{{$area['name']}}</h3></span>
                                    <span class="info-box-text"><i class="fa fa-user"></i> 1,410</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>

                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                    @endforeach
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">

            </div>
            <!-- box-footer -->
        </div>
        <!-- /.box -->





    </section>

@stop