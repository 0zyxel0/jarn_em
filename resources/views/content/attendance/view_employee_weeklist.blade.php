@extends('layouts.master')
@section('content')
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="{{asset('css/datatables.css')}}">
    <script>
        $(document).ready(function(){
            var table =  $('#list').DataTable(
                {
                    searching:false
                    ,paging:false
                    ,bInfo:false
                    ,order: [[ 4, "desc" ]]
                    ,  columnDefs: [
                    { targets: [0,1,2,3,4,7,8 ], visible: false}

                ]
                }
                );
            $('#list tbody').on( 'click', '#btn_setAttendance', function () {

                var data = table.row( $(this).parents('tr') ).data();

                window.location.href='/jarn_em/public/weeklist/'+data[0]+'/'+data[3]+'/'+data[2];
            });

            $('#list tbody').on( 'click', '#btn_viewAttendance', function () {

                var data = table.row( $(this).parents('tr') ).data();
                window.location.href='/jarn_em/public/viewEmployeeAttendanceList/'+data[3]+'/'+data[2];
            });

            $('#list tbody').on( 'click', '#btn_TestAttendance', function () {

                var data = table.row( $(this).parents('tr') ).data();
                window.location.href='/jarn_em/public/viewEmployeeAttendance/'+data[3]+'/'+data[2]+'/'+data[0]+'/'+data[7]+'/'+data[8];
            });

        });
    </script>
    <section class="content-header">

            <button class="btn btn-block btn-default" onclick="window.history.go(-1); return false;" type="button" style="width: 200px;"> < Back to Employee List</button>
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
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            @foreach($employee as $e)

                                    Attendance for {{$e['givenname']}} {{$e['familyname']}}

                            @endforeach
                        </h3>

                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="list" class="table table-bordered table-striped dataTable">
                            <thead>
                            <tr>
                                <th>parentAreaId</th>
                                <th>AreaId</th>
                                <th>ScheduleId</th>
                                <th>EmployeeId</th>
                                <th>Year</th>
                                <th>Week #</th>
                                <th>Coverage</th>
                                <th>Start</th>
                                <th>End</th>
                                <th>Option</th>

                            </tr>

                            </thead>
                            <tbody>
                            @foreach($week as $week)
                                <tr>
                                    <td>@foreach($parentarea as $pa){{$pa['parentareaid']}}@endforeach</td>
                                    <td>@foreach($area as $a){{$a['areaid']}}@endforeach</td>
                                    <td>{{$week['scheduleid']}}</td>
                                    <td>{{$e['partyid']}}</td>
                                    <td>{{$week['year_number']}}</td>
                                    <td>{{$week['week_number']}}</td>
                                    <td>{{$week['startdate']}} ~ {{$week['enddate']}}</td>
                                    <td>{{$week['startdate']}}</td>
                                    <td>{{$week['enddate']}}</td>
                                    <td>
                                        <button id="btn_viewAttendance"><i class="fa fa-book"></i> View Attendance</button>
                                        <button id="btn_setAttendance"><i class="fa fa-edit"></i> Update Attendance</button>
                                        <!--button id="btn_TestAttendance"><i class="fa fa-book"></i>TEST Attendance</button-->
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