@extends('layouts.master')
@section('content')

    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="{{asset('css/datatables.css')}}">
    <script>
        $(document).ready(function(){
            var table =  $('#list').DataTable({
                "paging":   false,
                "ordering": false,
                "info":     false,
                "searching":   false,

                "columnDefs":
                    [
                        {
                          //  "targets": [0,5],
                            "visible": false,
                            "searchable": false
                        },
                    ],

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

         function submitPayslip(){
             $( "#payslip_form" ).submit();
             $( "#deduction_list" ).submit();
             }

         $('#submit').click(function(){
             submitPayslip();
         });

            $("#paymentdate").datepicker({ autoclose:true});

        });
    </script>

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <button class="btn btn-block btn-default" onclick="window.history.go(-1); return false;" type="button" style="width: 150px;"> < Back to List</button>

        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Payroll</a></li>
            <li class="active">Payslip Status</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">

            <div class="col-xs-12">

                <!-- /.box -->

                <div class="box">
                    <div class="box-header">

                        <table width="100%" class="table table-striped">
                            <tr>@foreach($data as $d)
                                <th><h4>Employee</h4></th>
                                <td><h4> {{$d['givenname']}} {{$d['familyname']}}</h4></td>
                                <th><h4>Employee Id</h4></th>
                                <td><h4> {{$d['partyid']}}</h4></td>
                            </tr>

                            <tr>
                                <th><h4>Area</h4></th>
                                <td></td>

                            </tr>
                            <tr>
                                <td>Payroll Status</td>
                                <td> <button id="submit" class="btn-lg btn-warning">Click to Pay</button></td>
                            </tr>@endforeach
                            <tr>
                                <td>Updated Date</td>
                                <td></td>
                            </tr>
                        </table>

                    </div>
                </div>

                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <div class="row">

            <div class="col-md-6">
                <div class="box">
                    <div class="box-header">
                        <h3>Payslip Details</h3>
                    </div>
                    <!-- /.box-header -->
                    <form id="payslip_form" name="payslip_form" action="updatePayslipStatus" method="post" data-parsley-validate="">
                    <div class="box-body">
                        @foreach($data as $d)
                            <table class="table" width="100%">
                                <tbody>
                                <input type="hidden" id="coverage_start" name="coverage_start" value="{{ Request::segment(3) }}" />
                                <input type="hidden" id="coverage_end" name="coverage_end" value="{{ Request::segment(4) }}" />
                                <tr>
                                    <th>Daily Rate</th>
                                    <td><input type="text" id="rateDataField" name="rateDataField" value="{{$d['daily_rate']}}" readonly/></td>

                                </tr>
                                <tr>
                                    <th>Hours Worked</th>
                                    <td><input type="text" value="{{$d['hours']}}" name="hourDataField" id="hourDataField" readonly></td>

                                </tr>
                                <tr>
                                    <th>Days Worked</th>
                                    <td><input type="text" value="" name="daysWorkedField" id="daysWorkedField" readonly></td>

                                </tr>
                                <tr>
                                    <th>Gross Salary</th>
                                    <td><input type="text" value="" id="grossSalaryField" name="grossSalaryField" readonly/></td>

                                </tr>
                                <tr>
                                    <th>Deduction</th>

                                    <td><input type="text" value="{{$d['amount']}}" name="deductionField" id="deductionField" readonly></td>

                                </tr>
                                <tr>
                                    <th>Net Salary</th>
                                    <td><input type="text" value="" name="netSalaryField" id="netSalaryField" readonly></td>

                                </tr>

                                <tr>
                                    <th>Bonus</th>
                                    <td><input type="text" name="bonusField" id="bonusField"/></td>
                                </tr>

                                <tr>
                                    <th>Payment Amount</th>
                                    <td><input type="text" value="" name="totalAmountField" id="totalAmountField" readonly></td>
                                </tr>

                                <tr>
                                    <th>Comment</th>
                                    <td><input type="text" name="commentsField" id="commentsField"/></td>
                                </tr>
                                <tr>
                                    <th>Payment Date</th>
                                  <td>

                                                <i class="fa fa-calendar"></i>

                                            <input type="text" id="paymentdate" name="paymentdate" required="">

                                        <!-- /.input group -->
                                  </td>
                                </tr>
                                @foreach($data as $pt)
                                    <input name="partyid"  id="partyid" value=" {{$pt['partyid']}}"  type="hidden"/>

                                    @endforeach
                                @foreach($deductionList as $key => $category)
                                    <input name="deductid_[]"  id="{{$key}}" value="{{$category['deductionid']}}" type="hidden" />

                                @endforeach

                                </tbody>
                            </table>
                        @endforeach
                        <hr>


                    </div>
                    <!-- /.box-body -->
                        <input type="hidden" name="username" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box">
                    <div class="box-header">
                        <h3>Months Deductions</h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-hover table-bordered" id="list" width="100%">
                        <thead>
                        <tr>
                            <th>DeductionId</th>
                            <th>Deduction Type</th>
                            <th>Quantity</th>
                            <th>Amount</th>
                            <th>Comments</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                            <tbody>


                            @foreach($deduct as $d)
                             <tr>
                                <td>{{$d['deductionid']}}</td>
                                 <td>{{$d['name']}}</td>
                                 <td>{{$d['quantity']}}</td>
                                 <td>{{$d['total_price']}}</td>
                                 <td>{{$d['comments']}}</td>
                                 <td>{{$d['status']}}</td>
                             </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>







        <!-- /.row -->
    </section>
    <!-- /.content -->

@stop