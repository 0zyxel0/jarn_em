@extends('layouts.master') @section('content')
    <section class="content-header">
        <h1>
            New Employee

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Employees</a></li>
            <li class="active">New Employee</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">Employee Details</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form role="form">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Given Name</label>
                                <input type="text" class="form-control" placeholder="Enter ...">
                            </div>
                            <div class="form-group">
                                <label>Family Name</label>
                                <input type="text" class="form-control" placeholder="Enter ...">
                            </div>
                            <div class="form-group">
                                <label>Middle Name</label>
                                <input type="text" class="form-control" placeholder="Enter ...">
                            </div>
                            <div class="form-group">
                                <label>Gender</label>
                                <select class="form-control">
                                    <option>Male</option>
                                    <option>Female</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon "><i class="fa fa-envelope"></i></span>
                                    <input type="email" class="form-control" placeholder="Email">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                    <input type="text" class="form-control" placeholder="Contact Number">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Birthdate:</label>

                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right" id="datepicker">
                                </div>
                                <!-- /.input group -->
                            </div>
                            <div class="form-group">
                                <label>Age:</label>
                                <input type="text" class="form-control" placeholder="Enter ...">
                                <!-- /.input group -->
                            </div>

                            <div class="form-group">
                                <label>Marital Status</label>
                                <select class="form-control">
                                    <option>Single</option>
                                    <option>Married</option>

                                </select>
                                <!-- /.input group -->
                            </div>

                            <div class="form-group">
                                <label>Address</label>
                                <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                            </div>

                            <div class="form-group">
                                <label>Comments</label>
                                <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                            </div>

                            <div class="box-footer">


                            </div>



                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
            <!-- right column -->
            <div class="col-md-6">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Assign Team</h3>
                    </div>
                    <div class="box-body">

                        <div class="form-group">
                            <label>Team Name</label>
                            <select class="form-control">
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                        </div>

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Area Assignment</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->

                    <div class="box-body">

                        <div class="form-group">
                            <label>Area</label>
                            <select class="form-control">
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                        </div>




                        <!-- /.box-body -->

                        <!-- /.box-footer -->
                    </div>
                </div>


                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">Salary Details</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->

                    <div class="box-body">
                        <div class="form-group">
                            <label>Rate</label>
                            <input type="text" class="form-control" placeholder="Enter ...">
                        </div>
                        <div class="form-group">
                            <label>SSS ID</label>
                            <input type="text" class="form-control" placeholder="Enter ...">
                        </div>
                        <div class="form-group">
                            <label>PAG-IBIG</label>
                            <input type="text" class="form-control" placeholder="Enter ...">
                        </div>
                        <div class="form-group">
                            <label>TIN</label>
                            <input type="text" class="form-control" placeholder="Enter ...">
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <!-- /.box-footer -->

                </div>

                <div class="box box-success">

                    <div class="box-body" style="text-align: center;">

                        <div class="form-group">
                            <button type="submit" class="btn-lg btn-info">Save</button>
                        </div>

                    </div>
                    <!-- /.box-body -->
                </div>



            </div>
            <!--/.col (right) -->
        </div>

    </section>
@stop