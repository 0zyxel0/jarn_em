@extends('layouts.master')
@section('content')
<section class="content-header">
    <h1>
Choose Area
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Attendance</a></li>
        <li class="active">Choose Area List</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        @foreach($area as $area)
        <div class="col-md-3 col-sm-6 col-xs-12">

            <div class="info-box">
                <a href="weektiles/{{$area['areaid']}}" class="info-box-icon bg-aqua" ><i class="fa fa-map"></i></a>

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


</section>

@stop