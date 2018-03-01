@extends('layouts.master')
@section('content')
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="{{asset('css/datatables.css')}}">
    <script>
        $(document).ready(function(){
            var table =  $('#list').DataTable();
            $('#list tbody').on( 'click', '#btn_setAttendance', function () {

                var data = table.row( $(this).parents('tr') ).data();

                 window.location.href='weeklist/'+data[0]+'/'+data[1];
            });

            $('#list tbody').on( 'click', '#btn_viewProfile', function () {

                var data = table.row( $(this).parents('tr') ).data();
                window.location.href='profile/'+data[0];
            });

        });
    </script>
    <section class="content-header">
        <h1>
            Attendance
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Attendance</a></li>
            <li class="active">Set Attendance</li>
        </ol>

    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">                <!-- /.box -->

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Set Attendance for Week : @foreach($data_week as $week){{$week['week_number']}}@endforeach</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="list" class="table table-bordered table-striped dataTable">
                            <thead>
                            <tr>
                                <th>Schedule Id</th>
                                <th>Employee Id</th>
                                <th >Employee Name</th>
                                <th>Status</th>
                                <th >Option</th>

                            </tr>
                            </thead>
                            <tbody>

@foreach($data as $d)
    <tr>


        <td>{{$d['partyid']}}</td>
        @foreach($data_week as $week)
            <td>{{$week['scheduleid']}}</td>
        @endforeach
        <td>{{$d['givenname']}} {{$d['familyname']}}</td>
        <td></td>
        <td>
            <button id="btn_setAttendance"><i class="fa fa-book"></i> View Attendance</button>
            <button id="btn_editProfile"><i class="fa fa-edit"></i> Update Attendance</button>
            <button id="btn_editProfile"><i class="fa fa-edit"></i> Submit for Approval</button>

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