@extends('layouts.master')
@section('content')
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{asset('js/datatables.js')}}"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="{{asset('css/datatables.css')}}">
    <script>
        $(document).ready(function(){


        });
    </script>




    <section class="content-header">
        <h1>
            View Teams

        </h1>

    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add New Project</h3>
                        <hr/>
                        <form method="post" action="saveProjectDetails">
                            <div class="form-group">
                                <label>Project Name</label>
                                <input type="text" class="form-control" placeholder="Enter ..." id="prjname" name="prjname" required="">
                            </div>
                            <div class="form-group">
                                <label>Project Code</label>
                                <input type="text" class="form-control" placeholder="Enter ..." id="prjcode" name="prjcode" required="">
                            </div>
                            <div class="form-group">
                                <label>Rate</label>
                                <input type="text" class="form-control" placeholder="Enter ..." id="prjrate" name="prjrate" required="">
                            </div>
                            <input type="hidden" name="username" id="username" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div style="text-align: right;">
                                <button type="submit" class="btn-lg btn-info">Save</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">                <!-- /.box -->

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Current Teams</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        <table id="team" class="table table-bordered table-striped dataTable" >
                            <thead>

                            <tr role="row">
                                <th>Project Code</th>
                                <th>Project Name</th>
                                <th>Rate</th>
                                <th>Last update</th>
                                <th>Options</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($query as $q)
                            <tr>
                                <td>{{$q->project_code}}</td>
                                <td>{{$q->project_name}}</td>
                                <td>{{$q->rate}}</td>
                                <td>{{$q->created_at}}</td>

                                <td>
                                    <button id="btn_viewProfile"><i class="fa fa-book"></i> View</button>
                                    <button id="btn_editProfile"><i class="fa fa-edit"></i> Edit</button>
                                    <button id="btn_editProfile"><i class="fa fa-edit"></i> Delete</button>
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
@stop