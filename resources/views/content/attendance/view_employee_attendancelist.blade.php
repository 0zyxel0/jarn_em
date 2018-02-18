@extends('layouts.master')
@section('content')
    <script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script>
        $(document).ready(function () {
            $("#attenddate").datepicker({ autoclose:true});
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

    <section class="content-header">
        <h1>
            Attendance
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Attendance</a></li>
            <li class="active">Set Attendance</li>
        </ol>

    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">                <!-- /.box -->

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Set Attendance</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form>
                        <div class="form-group">
                            <label>Date:</label>

                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control pull-right" id="attenddate" name="attenddate">
                            </div>
                            <!-- /.input group -->
                        </div>
                        <div class="form-group">
                            <label>Team</label>
                            <select class="form-control" id="gender" name="gender">

                                <option selected disabled>Select Team</option>
                                @foreach($data as $q)
                                    <option value="{{$q['teamid']}}">{{$q['Teamname']}}</option>
                                    @endforeach

                            </select>
                        </div>
                            <div style="text-align: right;">
                                <button type="submit" class="btn-lg btn-info">Go</button>
                            </div>
                        </form>



                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->


                <!-- box -->
                <div class="box">
                    <div class="box-body">
                        <form>
                        <table class="table table-hover table-bordered">
                            <thead>
                            <tr>
                                <th class="active">Employee Id</th>
                                <th class="active">Employee</th>
                                <th class="active">
                                    <label class="css-input css-checkbox css-checkbox-success">
                                        <input type="checkbox" class="checkbox-inline select_one" id="parent_present"><span></span> Attendance                                            </label>
                                </th>
                                <th class="active">

                                    Project Name
                                </th>
                                <th class="active">Area</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($emps as $e)
                            <tr>

                                <td> {{$e['partyid']}}</td>

                                <td>
                                    {{$e['givenname']}} {{$e['familyname']}}
                                </td>




                                <td  style="text-align: center;">

                                    <input name="attendance[]" id="2" value="2" type="checkbox" class="child_present">



                                </td>

                                <td >



                                    <div id="l_category" class="col-sm-9">
                                        <select name="leave_category_id[]" class="form-control">
                                            <option disabled>Select Project...</option>
                                            @foreach($data2 as $prj)

                                                <option value="{{$prj['projectid']}}">{{$prj['project_code']}}</option>
                                                @endforeach
                                        </select>
                                    </div>

                                </td>
                                <td >



                                    <div id="l_category" class="col-sm-9">
                                        <select name="leave_category_id[]" class="form-control">
                                            <option disabled>Select Project...</option>

                                            @foreach($area as $a)
                                                <option value="{{$a['areaid']}}">{{$a['name']}}</option>
                                                @endforeach
                                        </select>
                                    </div>

                                </td>
                            </tr>
                                @endforeach
                            </tbody>
                        </table>
                            <div style="text-align: right;">
                                <button type="submit" class="btn-lg btn-info">Save</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
@stop