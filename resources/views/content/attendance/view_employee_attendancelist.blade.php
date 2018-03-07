@extends('layouts.master')
@section('content')
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="{{asset('css/datatables.css')}}">
    <script>
        $(document).ready(function(){
            var table =  $('#list').DataTable({
                "columnDefs":
                    [
                        {
                            "targets": [ 1 ],
                            "render": function(data){
                                if(data == 1){
                                    return  "<div class='circle_green'> </div>";
                                }
                                else{ return  "<div class='circle_red'> </div>"}
                            },
                            "data": 1,
                            "defaultContent": "Click to edit"
                        }

                    ],
                "bFilter":false,
                "paging":   false,
                "info":     false
            });
        });
    </script>
    <style>
        .circle_green
        {
            border: 2px solid #a1a1a1;
            padding: 10px 11px;
            background: green;
            width: 2px;
            border-radius: 100%;
            margin-left: auto;
            margin-right: auto;
            width: 1%;
        }
        .circle_red
        {
            border: 2px solid #a1a1a1;
            padding: 10px 11px;
            background: orangered;
            width: 2px;
            border-radius: 100%;
            margin-left: auto;
            margin-right: auto;
            width: 1%;
        }
    </style>
    <section class="content-header">
        <h1>
            Attendance
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Attendance</a></li>
            <li class="active">View Week Attendance</li>
        </ol>

    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">                <!-- /.box -->

                <div class="box">
                                       <!-- /.box-header -->
                    <div class="box-body">
                        <table id="list" class="table table-bordered table-striped dataTable">
                            <thead>
                            <tr>
                                <th>Employee Name</th>
@foreach($emp_data as $e)
    <th>{{$e['givenname']}} {{$e['familyname']}}</th>
    @endforeach
                            </tr>
                            <tr>
                                <th>Week Period</th>
                                @foreach($week_data as $w)
                                    <th>{{$w['week_number']}}</th>
                                @endforeach
                            </tr>
                            <tr>
                                <th>Date</th>
                                <th>Attendance</th>
                                <th>Area</th>
                                <th>Work Done</th>
                                                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $d)
                            <tr>
                                <td>{{$d['startdate']}}</td>
                                    <td>{{$d['isPresent']}}</td>
                                <td>{{$d['name']}}</td>
                                <td>{{$d['project_name']}}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </div>
        </div>
        <!-- /.row -->
    </section>
@stop