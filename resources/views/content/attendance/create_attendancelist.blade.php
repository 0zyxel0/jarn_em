@extends('layouts.master')
@section('content')
    <section class="content-header">
        <h1>
            Attendance Period
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Schedule</a></li>
            <li class="active">Update Attendance</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">                <!-- /.box -->

                <div class="box">
                    <div class="box-body">

                        <table id="area-list" class="table table-bordered table-striped dataTable" >
                            <thead>

                            <tr role="row">
                                <th style="display:none">id</th>
                                <th>Week #</th>
                                <th>Year</th>

                            </tr>
                            <tr role="row">
                                <th>Employee Name </th>
                                <th>Date #</th>
                                <th>Date #</th>
                                <th>Date #</th>
                                <th>Date #</th>
                                <th>Date #</th>
                                <th>Date #</th>
                            </tr>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Name</td>
                                <td>
                                    <input type="checkbox"/>
                                    <select name="leave_category_id[]" class="form-control">
                                        <option >Select Area...</option>

                                    </select>
                                    <select name="leave_category_id[]" class="form-control">
                                        <option >Select Project...</option>

                                    </select>
                                </td>
                                <td>
                                    <input type="checkbox"/>
                                    <select name="leave_category_id[]" class="form-control">
                                        <option >Select Area...</option>

                                    </select>
                                    <select name="leave_category_id[]" class="form-control">
                                        <option >Select Project...</option>

                                    </select>
                                </td>  <td>
                                    <input type="checkbox"/>
                                    <select name="leave_category_id[]" class="form-control">
                                        <option >Select Area...</option>

                                    </select>
                                    <select name="leave_category_id[]" class="form-control">
                                        <option >Select Project...</option>

                                    </select>
                                </td>  <td>
                                    <input type="checkbox"/>
                                    <select name="leave_category_id[]" class="form-control">
                                        <option >Select Area...</option>

                                    </select>
                                    <select name="leave_category_id[]" class="form-control">
                                        <option >Select Project...</option>

                                    </select>
                                </td>  <td>
                                    <input type="checkbox"/>
                                    <select name="leave_category_id[]" class="form-control">
                                        <option >Select Area...</option>

                                    </select>
                                    <select name="leave_category_id[]" class="form-control">
                                        <option >Select Project...</option>

                                    </select>
                                </td>  <td>
                                    <input type="checkbox"/>
                                    <select name="leave_category_id[]" class="form-control">
                                        <option >Select Area...</option>

                                    </select>
                                    <select name="leave_category_id[]" class="form-control">
                                        <option >Select Project...</option>

                                    </select>
                                </td>


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

@stop