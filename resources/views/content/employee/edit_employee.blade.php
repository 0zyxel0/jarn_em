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
            <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Last Updated : {{$data['updated_at']}}</h3>
                </div>




            </div>
            </div>
            <!-- left column -->
            <div class="col-md-6">
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">Employee Details</h3>
                    </div>
                    <!-- /.box-header -->

                    <div class="box-body">
                        <form action="saveEmployeeDetails" method="post" data-parsley-validate="">
                            <!-- text input -->
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
                                    <option selected>Current : {{$data['civilstatus']}}</option>
                                    <option>Single</option>
                                    <option>Married</option>
                                    <option>Divorced</option>
                                    <option>Widowed</option>
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
                                        <option>Current : {{$data['status']}}</option>
                                        <option>Permanent</option>
                                        <option>Contractual</option>
                                        <option>Renewed</option>
                                    </select>
                                    <!-- /.input group -->
                                </div>

                            </div>




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
                            <input type="hidden" name="username" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <button type="submit" class="btn-lg btn-info">Save</button>
                        </div>
                        @endforeach
                    </form>
                    </div>
                    <!-- /.box-body -->
                </div>



            </div>
            <!--/.col (right) -->
        </div>

    </section>
@stop