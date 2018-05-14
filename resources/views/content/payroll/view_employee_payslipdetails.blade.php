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
                            "targets": [0,3,6,7],
                            "visible": false,
                            "searchable": false
                        },
                        {

                            "targets":[4],
                            "render": function(data){

                                return (data/8);

                            }
                        },
                        {

                            "targets":[8],
                            "data":null,
                            "render": function(full)
                            {
                                return ((full[4]/8)*(full[5]));

                            }

                        },
                        {

                            "targets":[10],
                            "data":null,
                            "render": function(full)
                            {
                                return (((full[4]/8)*(full[5])-(full[9])));

                            }

                        }

                    ],

            });

            $('#employee-list tbody').on( 'click', '#btn_editProfile', function () {

                var data = table.row( $(this).parents('tr') ).data();
                window.location.href='editEmployeeDetails/'+data[0];
            });

            $('#employee-list tbody').on( 'click', '#btn_viewProfile', function () {

                var data = table.row( $(this).parents('tr') ).data();
                window.location.href='profile/'+data[0];
            });

            var hourField = $('#hourData').val();
            var dayField = $('#dayData').val();

            var getHourValue = $('#hourDataField').val();

            function computeDaysWorked(getHourValue){
                   return (getHourValue/8);
            }

            function computeGrossSalary(getDaysWorked,getDailyRate){
                return (getDaysWorked * getDailyRate)
            }

            function computeNetSalary(getDeductions,getGrossSalary){
                return (getGrossSalary - getDeductions)
            }

            $("#daysWorkedField").attr("value",(computeDaysWorked(getHourValue))).val((computeDaysWorked(getHourValue)));

            var getDaysWorked =  $("#daysWorkedField").val();
            var getDailyRate =  $("#rateDataField").val();

            $("#grossSalaryField").attr("value",(computeGrossSalary(getDaysWorked,getDailyRate))).val(computeGrossSalary(getDaysWorked,getDailyRate));

            var getDeductions = $('#deductionField').val();
            var getGrossSalary = $('#grossSalaryField').val();

            $("#netSalaryField").attr("value",(computeNetSalary(getDeductions,getGrossSalary))).val(computeNetSalary(getDeductions,getGrossSalary));

            $('#totalAmountField').attr("value",$('#netSalaryField').val()).val($('#netSalaryField').val());

        });
    </script>

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <button class="btn btn-block btn-default" onclick="window.history.go(-1); return false;" type="button" style="width: 150px;"> < Back to List</button>

        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Employee</a></li>
            <li class="active">Employee List</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                <!-- /.box -->

                <div class="box">
                    <div class="box-header">
                        Salary Payslip

                    </div>
                </div>
                <div class="box">

                    <!-- /.box-header -->
                    <div class="box-body">
                    @foreach($data as $d)

                            <table width="100%">
                                <tbody>
                                <tr>
                                    <th>Employee</th>
                                    <td> {{$d['givenname']}} {{$d['familyname']}}</td>
                                    <th>Employee Id</th>
                                    <td> {{$d['partyid']}}</td>
                                </tr>

                                <tr>
                                    <th>Department</th>
                                    <td>Engineer</td>
                                    <th>Job Title</th>
                                    <td>Finance Manager</td>
                                </tr>
                                </tbody>
                            </table>



                        <table class="table" width="100%">
                            <tbody>
                            <tr>
                                <th>Daily Rate</th>
                                <td><input type="text" id="rateDataField" name="rateDataField" value="{{$d['daily_rate']}}"/></td>

                            </tr>
                            <tr>
                                <th>Hours Worked</th>
                                <td><input type="text" value="{{$d['hours']}}" name="hourDataField" id="hourDataField"></td>

                            </tr>
                            <tr>
                                <th>Days Worked</th>
                                <td><input type="text" value="" name="daysWorkedField" id="daysWorkedField"></td>

                            </tr>
                            <tr>
                                <th>Gross Salary</th>
                                <td><input type="text" value="" id="grossSalaryField" name="grossSalaryField"/></td>

                            </tr>
                            <tr>
                                <th>Deduction</th>

                                <td><input type="text" value="{{$d['total_price']}}" name="deductionField" id="deductionField"></td>

                            </tr>
                            <tr>
                                <th>Net Salary</th>
                                <td><input type="text" value="" name="netSalaryField" id="netSalaryField"></td>

                            </tr>

                            <tr>
                                <th>Bonus</th>
                                <td><input type="text" name="bonusField" id="bonusField"/></td>
                            </tr>

                            <tr>
                                <th>Payment Amount</th>
                                <td><input type="text" value="" name="totalAmountField" id="totalAmountField"></td>
                            </tr>

                            <tr>
                                <th>Comment</th>
                                <td><input type="text" name="commentsField" id="commentsField"/></td>
                            </tr>

                            </tbody>
                        </table>
                        @endforeach
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