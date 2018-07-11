@extends('layouts.master')
@section('content')
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.js') }}"></script>
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

            $('#employee-list tbody').on( 'click', '#btn_viewDeductions', function () {

                var data = table.row( $(this).parents('tr') ).data();
                window.location.href='addDeduction/'+data[0];
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
                        <h3 class="box-title">
                            Employee
                        </h3>
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
                                <th>Total Deduction</th>
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
                                    <td>   {{$item['amount']}}</td>

                                    <td>
                                        <button id="btn_viewDeductions"><i class="fa fa-book"></i> View</button>
                                        <button id=""><i class="fa fa-edit"></i> Add</button>
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