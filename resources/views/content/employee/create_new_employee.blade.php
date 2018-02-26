@extends('layouts.master') @section('content')

    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>

    <script>
        $(document).ready(function () {

            $('#cmd').click(function(){
                $('#content').append('<br>a datepicker <input class="datepicker_recurring_start"/>');
            });
            $('body').on('focus',".datepicker_recurring_start", function(){
                $(this).datepicker();
            });


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
                        <form action="saveEmployeeDetails" method="post" data-parsley-validate="">
                            <!-- text input -->

                            <div class="form-group">
                                <label>Given Name</label>
                                <input type="text" class="form-control" placeholder="Enter ..." id="givenname" name="givenname" required="">
                            </div>
                            <div class="form-group">
                                <label>Family Name</label>
                                <input type="text" class="form-control" placeholder="Enter ..." id="familyname" name="familyname" required="">
                            </div>
                            <div class="form-group">
                                <label>Middle Name</label>
                                <input type="text" class="form-control" placeholder="Enter ..." id="middlename" name="middlename" required="">
                            </div>
                            <div class="form-group">
                                <label>Gender</label>
                                <select class="form-control" id="gender" name="gender">
                                    <option>Male</option>
                                    <option>Female</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon "><i class="fa fa-envelope"></i></span>
                                    <input type="email" class="form-control" placeholder="Email" id="email" name="email" data-parsley-trigger="change">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                    <input type="text" class="form-control" placeholder="Contact Number" id="contactnumber" name="contactnumber" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Birthdate:</label>

                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right" id="birthday" name="birthday">
                                </div>
                                <!-- /.input group -->
                            </div>
                            <div class="form-group">
                                <label>Age:</label>
                                <input type="text" class="form-control" id="age" name="age" >
                                <!-- /.input group -->
                            </div>
                            <div class="form-group">
                                <label>Religion:</label>
                                <input type="text" class="form-control" id="religion" name="religion" >
                                <!-- /.input group -->
                            </div>

                            <div class="form-group">
                                <label>Civil Status</label>
                                <select class="form-control" id="civilstatus" name="civilstatus">
                                    <option>Single</option>
                                    <option>Married</option>
                                    <option>Divorced</option>
                                    <option>Widowed</option>
                                </select>
                                <!-- /.input group -->
                            </div>

                            <div class="form-group">
                                <label>Address</label>
                                <textarea class="form-control" rows="3" placeholder="Enter ..." id="address" name="address" required=""></textarea>
                            </div>

                            <div class="form-group">
                                <label>Comments</label>
                                <textarea class="form-control" rows="3" placeholder="Enter ..." id="comments" name="comments"></textarea>
                            </div>

                            <div class="box-footer">
                                <div class="form-group">
                                    <label>Start Date:</label>

                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right" id="startdate" name="startdate" required="">
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <div class="form-group">
                                    <label>End Date:</label>

                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right" id="enddate">
                                    </div>
                                    <!-- /.input group -->
                                </div>

                                <div class="form-group">
                                    <label>Employee Status</label>
                                    <select class="form-control" id="emp_stat" name="emp_stat" required="">
                                        <option>Full-Time</option>
                                        <option>Contractual</option>

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
                            <select class="form-control" id="assignteam" name="assignteam">
                                <option value="">----</option>
                                @foreach($query2 as $q2)
                                    <option value="{{$q2['teamid']}}">{{$q2['name']}}</option>
                                @endforeach
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
                            <select class="form-control" name="areaid" id="areaid">
                                <option value="">----</option>
                                @foreach($query as $q)
                                <option value="{{$q['areaid']}}">{{$q['name']}}</option>
                                    @endforeach
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
                            <label>Salary Rate</label>
                            <input type="text" class="form-control" placeholder="Enter ..." id="salary_rate" name="salary_rate" required="" data-parsley-pattern="^[0-9]*\.[0-9]{2}$">
                        </div>
                        <div class="form-group">
                            <label>SSS ID</label>
                            <input type="text" id="sss_id" name="sss_id" class="form-control" placeholder="Enter ...">
                        </div>
                        <div class="form-group">
                            <label>PHILHEALTH ID</label>
                            <input type="text" class="form-control" id="philhealth_id" name="philhealth_id" placeholder="Enter ...">
                        </div>
                        <div class="form-group">
                            <label>PAG-IBIG</label>
                            <input type="text" class="form-control" id="pagibig_id" name="pagibig_id" placeholder="Enter ...">
                        </div>
                        <div class="form-group">
                            <label>TIN</label>
                            <input type="text" class="form-control" id="tax_id" name="tax_id" placeholder="Enter ...">
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
                    </form>
                    </div>
                    <!-- /.box-body -->
                </div>



            </div>
            <!--/.col (right) -->
        </div>

    </section>
@stop