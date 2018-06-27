@extends('layouts.master') @section('content')


    <script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script>
        $(document).ready(function () {

            $("#startdate").datepicker({ autoclose:true});
            $("#enddate").datepicker({ autoclose:true});

            $("#birthday").datepicker({
                maxDate: '+0d',
                changeMonth: true,
                changeYear: true,
                autoclose:true,
                dateFormat: 'dd-mm-yy' })
                .on("changeDate", function (e) {

                    var currentDate = new Date();
                    var selectedDate = new Date($(this).val());
                    var age = currentDate.getFullYear() - selectedDate.getFullYear();
                    var m = currentDate.getMonth() - selectedDate.getMonth();
                    if (m < 0 || (m === 0 && currentDate.getDate() < selectedDate.getDate())) {
                        age--;
                    }
                    $('#age').attr('value', age);
                });
        });
    </script>

    <section class="content-header">
        <h1>
            Edit Details
        </h1>
    </section>
    @foreach($data as $data)
    <section class="content">
        <div class="row">



            <div class="col-xs-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Last Updated : {{$data['updated_at']}}</h3>
                </div>




            </div>
            </div>
            <!-- left column -->
            <div class="col-xs-12">
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">Employee Details</h3>
                    </div>
                    <!-- /.box-header -->

                    <div class="box-body">
                        <form action="updateEmployeeDetails" method="post" data-parsley-validate="">

                            <!-- text input -->
                            <input type="hidden" class="form-control" id="partyid" name="partyid" required="" value="{{$data['partyid']}}">
                            <div class="form-group">
                                <label>Given Name</label>
                                <input type="text" class="form-control" id="givenname" name="givenname" required="" value="{{$data['givenname']}}">
                            </div>
                            <div class="form-group">
                                <label>Family Name</label>
                                <input type="text" class="form-control" id="familyname" name="familyname" required="" value="{{$data['familyname']}}">
                            </div>
                            <div class="form-group">
                                <label>Middle Name</label>
                                <input type="text" class="form-control" id="middlename" name="middlename" required="" value="{{$data['middlename']}}">
                            </div>
                            <div class="form-group">
                                <label>Gender</label>
                                <select class="form-control" id="gender" name="gender">
                                <option selected>{{$data['gender']}}</option>
                                <option>Male</option>
                                    <option>Female</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon "><i class="fa fa-envelope"></i></span>
                                    <input type="email" class="form-control" value="{{$data['email']}}" id="email" name="email" data-parsley-trigger="change">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                    <input type="text" class="form-control" value="{{$data['contactnumber']}}" id="contactnumber" name="contactnumber" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Birthdate:</label>

                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right" id="birthday" name="birthday" value="{{$data['birthday']}}">
                                </div>
                                <!-- /.input group -->
                            </div>
                            <div class="form-group">
                                <label>Age:</label>
                                <input type="text" class="form-control" id="age" name="age" value="{{$data['age']}}">
                                <!-- /.input group -->
                            </div>
                            <div class="form-group">
                                <label>Religion:</label>
                                <input type="text" class="form-control" id="religion" name="religion" value="{{$data['religion']}}">
                                <!-- /.input group -->
                            </div>

                            <div class="form-group">
                                <label>Civil Status</label>
                                <select class="form-control" id="civilstatus" name="civilstatus">
                                    <option selected value="{{$data['civilstatus']}}">Current : {{$data['civilstatus']}}</option>
                                    <option value="Single">Single</option>
                                    <option value="Married">Married</option>
                                    <option value="Divorced">Divorced</option>
                                    <option value="Widowed">Widowed</option>
                                </select>
                                <!-- /.input group -->
                            </div>

                            <div class="form-group">
                                <label>Address</label>
                                <textarea class="form-control" rows="3"  id="address" name="address" required="">{{$data['address']}}</textarea>
                            </div>

                            <div class="form-group">
                                <label>Comments</label>
                                <textarea class="form-control" rows="3" id="comments" name="comments">{{$data['comments']}}</textarea>
                            </div>

                            <div class="box-footer">
                                <div class="form-group">
                                    <label>Start Date:</label>

                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right" id="startdate" required="" value="{{$data['startdate']}}">
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <div class="form-group">
                                    <label>End Date:</label>

                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right" id="enddate" value="{{$data['enddate']}}">
                                    </div>
                                    <!-- /.input group -->
                                </div>

                                <div class="form-group">
                                    <label>Employee Status</label>
                                    <select class="form-control" id="emp_stat" name="emp_stat" required="">
                                        <option value="{{$data['status']}}">Current : {{$data['status']}}</option>
                                        <option>Permanent</option>
                                        <option>Contractual</option>
                                        <option>Renewed</option>
                                    </select>
                                    <!-- /.input group -->
                                </div>

                                <div class="form-group">
                                    <label>is Active</label>
                                    <select class="form-control" id="isActive" name="isActive" required="">
                                        <option value="{{$data['isActive']}}">Current : Active</option>
                                        <option value="0">Deactivate</option>

                                    </select>
                                    <!-- /.input group -->
                                </div>

                                @endforeach

                                        <h3 class="box-title">Salary Details</h3>
                                <hr>
                                        <div class="form-group">
                                            <label>Rate</label>
                                            @foreach($salary as $sal)

                                                <input type="text" class="form-control" id="emp_rate" name="emp_rate" placeholder="Enter ..." value="{{$sal['daily_rate']}}">
                                            @endforeach
                                        </div>

                                <h3 class="box-title">Area</h3>
                                <hr>
                                <div class="form-group">

                                    <select class="form-control" id="emp_area" name="emp_area">

                                        @foreach($area as $a)
                                            <option value="{{$a['areaid']}}">{{$a['name']}}</option>
                                        @endforeach


                                    </select>
                                </div>
                                <h3 class="box-title">Team</h3>
                                <hr>
                                <div class="form-group">

                                    <select class="form-control" id="emp_team" name="emp_team">

                                        @foreach($team as $t)
                                            <option value="{{$t['teamid']}}">{{$t['name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                    </div>

                                <input type="hidden" name="username" value="{{ Auth::user()->id }}">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <button type="submit" class="btn-lg btn-info">Save</button>


                            </form>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
            <!-- right column -->

            <!--/.col (right) -->
        </div>



    </section>
@stop