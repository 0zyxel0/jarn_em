@extends('layouts.master')
@section('content')
    <script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/bootstrap3.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $("#startdate").datepicker({ autoclose:true});
            $("#enddate").datepicker({ autoclose:true});


            $('.flash-message').fadeIn('fast').delay(1000).fadeOut('fast');
        });



    </script>

    <style>
        input[type='checkbox'] {

            width:30px;
            height:30px;

            border-radius:5px;
            border:2px solid #555;
        }


    </style>
    <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(Session::has('alert-' . $msg))

                <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
            @endif
        @endforeach
    </div> <!-- end .flash-message -->
    <section class="content-header">
        <h1>
            Scheduling
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Schedule</a></li>
            <li class="active">Create Schedule</li>
        </ol>

    </section>
    <section class="content">
        <div class="row">

            <div class="pull-right" style="margin-right: 15px;">
                <button type="button" class="btn btn-primary btn-large" data-toggle="modal" data-target="#myModal">Add Work Week</button>
            </div>
            <div class="col-xs-12">                <!-- /.box -->




                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="purchaseLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form method="post" action="saveSchedule">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="modalLabel">Add New Area</h4>
                                </div>

                                <div class="modal-body">


                                        <div class="form-group">
                                            <label>Year #</label>
                                            <input type="text" class="form-control" placeholder="Enter ..." id="yearnum" name="yearnum" required="">
                                        </div>
                                        <div class="form-group">
                                            <label>Week #</label>
                                            <input type="text" class="form-control" placeholder="Enter ..." id="weeknum" name="weeknum" required="">
                                        </div>
                                        <div class="form-group">
                                            <label>Start Date:</label>

                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="text" class="form-control pull-right" id="startdate" name="startdate">
                                            </div>

                                            <!-- /.input group -->
                                        </div>
                                        <div class="form-group">
                                            <label>End Date:</label>


                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="text" class="form-control pull-right" id="enddate" name="enddate">
                                            </div>


                                            <!-- /.input group -->
                                        </div>

                                        <input type="hidden" name="username" id="username" value="{{ Auth::user()->id }}">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">


                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>




                <!-- box -->
                <div class="box" style="margin-top:5px;">
                    <div class="box-body">

                            <table class="table table-hover table-bordered">
                                <thead>
                                <tr>
                                    <th>Year</th>
                                    <th>Week #</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Option</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $d)
                                <tr>
                                    <td>{{$d['year_number']}}</td>
                                    <td>{{$d['week_number']}}</td>
                                    <td>{{$d['startdate']}}</td>
                                    <td>{{$d['enddate']}}</td>
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
                </div>

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
@stop