@extends('layouts.master')
@section('content')
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="{{asset('css/datatables.css')}}">
    <script>
        $(document).ready(function(){
            var table =  $('#list').DataTable({

                bInfo:false
                ,  columnDefs: [
                { targets: [0], visible: false}

            ]
            });

            $('#list tbody').on( 'click', '#btn_showAttn', function () {

                var data = table.row( $(this).parents('tr') ).data();

                window.location.href='/jarn_em/public/attendance/'+data[0]+'/'+data[1];
            });
        });
    </script>
    <section class="content-header">
        <button class="btn btn-block btn-default" onclick="window.history.go(-1); return false;" type="button" style="width: 150px;"> < Back to Area List</button>

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
                            @foreach($area as $area)

                                    {{$area['name']}} Area Employees

                            @endforeach</h3>
                        <div class="box-tools pull-right">
                            <!-- Buttons, labels, and many other things can be placed here! -->
                            <!-- Here is a label for example -->
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="list" class="table table-bordered table-striped dataTable">
                            <thead>
                            <tr>
                                <th>AreaId</th>
                                <th>EmployeeId</th>

                                <th>Employee Name</th>

                                <th>Option</th>

                            </tr>

                            </thead>
                            <tbody>
                            @foreach($employee as $e)
                            <tr>

                                <td>{{$e['areaid']}}</td>
                                <td>{{$e['partyid']}}</td>
                                <td>{{$e['givenname']}} {{$e['familyname']}}</td>
                                <td>     <button id="btn_showAttn"><i class="fa fa-book"></i> View</button></td>
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