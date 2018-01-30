@extends('layouts.master')
@section('content')
    <section class="content-header">
        <h1>
            View Teams

        </h1>

    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">                <!-- /.box -->

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Current Teams</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        <table id="employee-list" class="table table-bordered table-striped dataTable" >
                            <thead>
                            <tr role="row">
                            <tr role="row">
                                <th>Team Name</th>
                                <th>Team Leader</th>
                                
                                <th>Options</th>
                            </tr>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>


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