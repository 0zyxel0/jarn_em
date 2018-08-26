@extends('layouts.reports')
@section('content')
<script src="{{asset('js/datatables.js')}}"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/dataTables.jqueryui.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.jqueryui.css" />

<!--Required for Datatables to function-->
<script type="text/javascript" src="{{asset('js/jquery.js')}}"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.js"></script>


<link rel="stylesheet" type="text/css" href="{{asset('DataTables/datatables.min.css')}}"/>
<script src="{{asset('js/DataTables/datatables.min.js')}}"></script>

    <script>
        $(document).ready(function(){

            var table =  $('#list').DataTable( {
                "bPaginate": false,
                "bLengthChange": false,
                "bFilter": true,
                "bInfo": false,
                "bAutoWidth": false,
                "columnDefs":
                    [
                        {

                            "targets":[2],
                            "data":null,
                            "render": function(full)
                            {
                                return ((full[3]/8).toFixed(1));

                            }

                        },
                        {

                            "targets":[5],
                            "data":null,
                            "render": function(full)
                            {
                                return (((full[3]/8)*full[4]).toFixed(2));

                            }

                        },
                        {

                            "targets":[11],
                            "data":null,
                            "render": function(full)
                            {
                                return ((((full[3]/8)*full[4])-full[10]).toFixed(2));

                            }

                        },
                    ],
                "dom": 'lBfrtiBp',
                'buttons': ['copy', 'excel', 'csv', 'pdf', 'print' ],

            } );
        });
    </script>

    <section class="content-header">

        <button class="btn btn-block btn-default" onclick="location.href='viewReports'; return false;" type="button" style="width: 150px;"> < Back to Reports</button>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Reports</a></li>
            <li class="active">Generate Payroll Report</li>
        </ol>

    </section>
    <section class="content">
        <div class="row">
            <div class="pull-right" style="margin-right: 15px;">
            </div>
            </br>
            <div class="col-xs-12">                <!-- /.box -->

                <!-- box -->
                <div class="box">
                    <div class="box-body">

                        <table class="table table-hover table-bordered" id="list">
                            <thead>
                            <tr>

                                <th>Given Name</th>
                                <th>Family Name</th>
                                <th>Worked Days</th>
                                <th>Worked Hours</th>
                                <th>Rate</th>
                                <th>Gross Amount</th>
                                <th>Rice Deduction</th>
                                <th>Corn Deduction</th>
                                <th>Materials Deduction</th>
                                <th>Advance Deduction</th>
                                <th>Total Deduction</th>
                                <th>Net Amount</th>
                                <th>Recieved By</th>
                                <th>Signature</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $d)
                                <tr>


                                    <td>{{$d['givenname']}}</td>
                                    <td>{{$d['familyname']}}</td>
                                    <td></td>
                                    <td>{{$d['hours']}}</td>
                                    <td>{{$d['daily_rate']}}</td>
                                    <td></td>
                                    <td>{{$d['rice']}}</td>
                                    <td>{{$d['corn']}}</td>
                                    <td>{{$d['material']}}</td>
                                    <td>{{$d['paluwagan']}}</td>
                                    <td>{{$d['total_deductions']}}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>


                                </tr>
                            @endforeach

                            </tbody>
                        </table>


                    </div>
                </div>

            </div>
            <!-- /.col -->
        </div>




        <!-- /.row -->
    </section>






@stop

