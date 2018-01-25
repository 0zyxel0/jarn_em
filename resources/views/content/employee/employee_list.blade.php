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

});
</script>

    <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Employee
                <small>advanced tables</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Tables</a></li>
                <li class="active">Data tables</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Hover Data Table</h3>
                        </div>
                        <!-- /.box-header -->


                    </div>
                    <!-- /.box -->

                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Data Table With Full Features</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">

                                        <table id="employee-list" class="table table-bordered table-striped dataTable" >
                                            <thead>
                                            <tr role="row">
                                            <tr role="row">
                                                <th>id</th>
                                                <th>Given Name</th>
                                                <th>Family Name</th>
                                                <th>Contact Number</th>
                                                <th>Start Date</th>
                                                <th>End Date</th>
                                                <th>Options</th>
                                            </tr>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                            @foreach($data as $item)
                                                    <td>   {{$item['partyid']}}</td>
                                                    <td>   {{$item['givenname']}}</td>
                                                    <td>   {{$item['familyname']}}</td>
                                                    <td>   {{$item['contactnumber']}}</td>
                                                    <td>   {{$item['startdate']}}</td>
                                                    <td>   {{$item['enddate']}}</td>
                                                    <td>
                                                        <button><i class="fa fa-book"></i> View</button>
                                                        <button id="btn_editProfile"><i class="fa fa-edit"></i> Edit</button>
                                                    </td>
                                            @endforeach

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