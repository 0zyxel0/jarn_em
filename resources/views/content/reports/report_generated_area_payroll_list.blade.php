@extends('layouts.master')
@section('content')

    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/bootstrap3.min.js') }}"></script>
    <link rel="stylesheet" href="{{asset('css/datatables.css')}}">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
    <script>
        $(document).ready(function(){
            var table =  $('#list').DataTable( {
                "columnDefs":
                    [

                    ],

            } );
        });
    </script>

    <section class="content-header">
        <h1>
            Reports
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Reports</a></li>
            <li class="active">Generate Area Payroll Report</li>
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
                                <td>Area Name</td>
                                <td>Total Amount</td>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach( $data as  $d )
                                    <tr>
                                    <td>{{$d['name']}}</td>
                                    <td>P {{$d['amount']}}</td>
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