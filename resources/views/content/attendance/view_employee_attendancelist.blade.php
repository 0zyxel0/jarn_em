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

            $('.flash-message').fadeIn('fast').delay(1000).fadeOut('fast');
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


        <button class="btn btn-block btn-default" onclick="window.history.go(-1); return false;" type="button" style="width: 150px;"> < Back to Week List</button>



        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Attendance</a></li>
            <li class="active">Choose Area List</li>
        </ol>
    </section>
    <section class="content">
        <div class="flash-message">
            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                @if(Session::has('alert-' . $msg))

                    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                @endif
            @endforeach
        </div> <!-- end .flash-message -->
        <div class="row">
            <div class="col-xs-12">                <!-- /.box -->

                <div class="box">
                                       <!-- /.box-header -->

                    <div class="box-header">
                        <h3 class="box-title">
                            Attendance
                        </h3>
                    </div>
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
                                <th>Attendance Type</th>
                                <th>Area</th>
                                <th>Work Done</th>
                                                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $d)
                            <tr>
                                <td>{{$d['startdate']}}</td>
                                <td>{{$d['isPresent']}}</td>
                                <td>{{$d['typename']}}</td>
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