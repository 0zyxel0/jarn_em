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
                            "targets": [0,3,6,7],
                            "visible": false,
                            "searchable": false
                        },
                        {

                            "targets":[4],
                            "render": function(data){

                                return (data/8);

                            }
                        },
                        {

                            "targets":[8],
                            "data":null,
                            "render": function(full)
                            {
                                return ((full[4]/8)*(full[5]));

                            }

                        },
                        {

                            "targets":[10],
                            "data":null,
                            "render": function(full)
                            {
                                return (((full[4]/8)*(full[5])-(full[9])));

                            }

                        }

                    ],

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
                        Salary Payslip

                    </div>
                </div>
                <div class="box">

                    <!-- /.box-header -->
                    <div class="box-body">
                    @foreach($data as $d)

                            <table width="100%">
                                <tbody>
                                <tr>
                                    <th>Employee</th>
                                    <td> {{$d['givenname']}} {{$d['familyname']}}</td>
                                    <th>Employee Id</th>
                                    <td> {{$d['partyid']}}</td>
                                </tr>

                                <tr>
                                    <th>Department</th>
                                    <td>Engineer</td>
                                    <th>Job Title</th>
                                    <td>Finance Manager</td>
                                </tr>
                                </tbody>
                            </table>

                    @endforeach

                        <table class="table" width="100%">
                            <tbody>
                            <tr>
                                <th>Gross Salary</th>
                                <td></td>

                            </tr>
                            <tr>
                                <th>Deduction</th>
                                <td>{{$d['total_price']}}</td>
                            </tr>
                            <tr>
                                <th>Net Salary</th>
                                <td>{{$d['hours']}}</td>
                            </tr>

                            <tr>
                                <th>Bonus</th>
                                <td></td>
                            </tr>

                            <tr>
                                <th>Payment Amount</th>
                                <td></td>
                            </tr>

                            <tr>
                                <th>Comment</th>
                                <td> </td>
                            </tr>

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