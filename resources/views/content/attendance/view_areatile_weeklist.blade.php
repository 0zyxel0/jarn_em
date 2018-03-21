@extends('layouts.master')
@section('content')
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="{{asset('css/datatables.css')}}">
    <script>
        $(document).ready(function(){
            var table =  $('#list').DataTable();

            $('#list tbody').on( 'click', '#btn_pickWeek', function () {

                var data = table.row( $(this).parents('tr') ).data();

                window.location.href='/jarn_em/public/generateWeekSchedule/'+data[0]+'/'+data[1];
            });
        });
    </script>
    <section class="content-header">

        @foreach($area as $area)
        <h1>
            Attendance for {{$area['name']}}
        </h1>
        @endforeach
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
                                <th>AreaId</th>
                                <th>ScheduleId</th>
                                <th>Year</th>
                                <th>Period</th>
                                <th>Coverage</th>
                                <th>Option</th>

                            </tr>

                            </thead>
                            <tbody>
@foreach($week as $week)
    <tr>
        <td>{{$area['areaid']}}</td>
        <td>{{$week['scheduleid']}}</td>
        <td>{{$week['year_number']}}</td>
        <td>{{$week['week_number']}}</td>
        <td>{{$week['startdate']}} - {{$week['enddate']}}</td>
        <td>
            <button id="btn_pickWeek"><i class="fa fa-book"></i> View</button>
        </td>
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