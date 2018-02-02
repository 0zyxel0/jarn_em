@extends('layouts.master')
@section('content')
    <section class="content-header">
        <h1>
            Teams
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Team</a></li>
            <li class="active">View Team Members</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-3">

                <div class="box">
                    <div class="box-header">

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">

                                <b>Team Name</b> <a class="pull-right">
                                    @foreach($data as $d2)
                                        <td><h3 class="box-title">{{$d2['Teamname']}}</h3></td>
                                    @endforeach
                                </a>


                            </li>
                            <li class="list-group-item">
                                <b>Team Leader</b> <a class="pull-right">
                                    @foreach($data as $d2)
                                        <td><h3 class="box-title">{{$d2['givenname']}} {{$d2['familyname']}}</h3></td>
                                    @endforeach
                                </a>
                            </li>
                            <li class="list-group-item">
                                <b>Area</b> <a class="pull-right">
                                    @foreach($data as $d)
                                        <td><h3 class="box-title">{{$d['Areaname']}}</h3></td>
                                    @endforeach
                                </a>

                            </li>
                        </ul>

                    </div>
                    <!-- /.box-header -->


                </div>
            </div>
            <div class="col-md-9">

                <!-- /.box -->

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Members of {{$d2['Teamname']}}</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        <table id="employee-list" class="table table-bordered table-striped dataTable" >
                            <thead>
                            <tr role="row">
                            <tr role="row">
                                <th>Given Name</th>
                                <th>Family Name</th>
                                <th>Contact Number</th>

                            </tr>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $d)
                                <tr>
                                <td>{{$d['givenname']}}</td>
                                    <td>{{$d['familyname']}}</td>
                                    <td>{{$d['contactnumber']}}</td>
                                </tr>
                            @endforeach
                            @foreach($data3 as $i)
                                <tr>

                                    <td>   {{$i['givenname']}}</td>
                                    <td>   {{$i['familyname']}}</td>
                                    <td>   {{$i['contactnumber']}}</td>


                                </tr>
                            @endforeach


                            </tbody>

                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
@stop