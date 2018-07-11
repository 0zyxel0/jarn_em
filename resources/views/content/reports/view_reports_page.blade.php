@extends('layouts.master')
@section('content')
    <script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/bootstrap3.min.js') }}"></script>
    <link rel="stylesheet" href="{{asset('css/datatables.css')}}">
    <script>
        $(document).ready(function(){
            var table =  $('#list').DataTable({


            });
            $('#list tbody').on( 'click', '#btn_viewPayrollReport', function () {
                window.location.href='/jarn_em/public/viewPayrollReport';
            });
        });
    </script>

    <section class="content-header">
        <h1>
            Reports
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Reports</a></li>
            <li class="active">View Available Reports</li>
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
                                <th >Deduction Type</th>

                                <th>Option</th>
                            </tr>
                            </thead>
                            <tbody>

                                <tr>

                                    <td>Payroll Reports</td>
                                    <td>     <button id="btn_viewPayrollReport"><i class="fa fa-book"></i>View</button></td>
                                </tr>


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