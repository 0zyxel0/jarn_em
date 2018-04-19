@extends('layouts.master')
@section('content')
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="{{asset('css/datatables.css')}}">
    <script>
        $(document).ready(function(){
            var table =  $('#employee-list').DataTable({
                "columnDefs":
                    [
                        {
                            "targets": 0,
                            "visible": false,
                            "searchable": false
                        }

                    ]
            });

            $('#employee-list tbody').on( 'click', '#btn_editProfile', function () {

                var data = table.row( $(this).parents('tr') ).data();
                window.location.href='editEmployeeDetails/'+data[0];
            });

            $('#employee-list tbody').on( 'click', '#btn_viewProfile', function () {

                var data = table.row( $(this).parents('tr') ).data();
                window.location.href='profile/'+data[0];
            });

        });
    </script>

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <button class="btn btn-block btn-default" onclick="location.href='dashboard'; return false;" type="button" style="width: 150px;"> < Back to Dashboard</button>

        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Employee</a></li>
            <li class="active">Employee List</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                <!-- /.box -->

                <div class="box">
                    <div class="box-header">
                        <ul class="list-unstyled">
                            <li>Period</li>
                            <li>From</li>
                            <li>To</li>
                        </ul>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        <table id="employee-list" class="table table-bordered table-striped dataTable" >
                            <thead>
                            <tr role="row">
                            <tr role="row">
                                <th>partyid</th>
                                <th>Given Name</th>
                                <th>Family Name</th>
                                <th>Hours</th>
                                <th>Total Work Days</th>
                                <th>Rate</th>
                                <th>Options</th>
                            </tr>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($data as $item)
                                <tr>
                                    <td>   {{$item['partyid']}}</td>
                                    <td>   {{$item['givenname']}}</td>
                                    <td>   {{$item['familyname']}}</td>
                                    <td>   {{$item['hours']}}</td>
                                    <td></td>
                                    <td>   {{$item['daily_rate']}}</td>
                                    <td>
                                        <button id="btn_viewProfile"><i class="fa fa-book"></i> View</button>
                                        <button id="btn_editProfile"><i class="fa fa-edit"></i> Edit</button>
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
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

@stop