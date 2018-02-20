@extends('layouts.master')
@section('content')

    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>

    <script>
        $(document).ready(function () {

                  $('table tbody').on('focus',".startdate", function(){
                $(this).datepicker({autoclose:true});
            });


            $('table tbody').on('focus',".enddate", function(){
                $(this).datepicker({autoclose:true});
            });


            $("form").submit(function() {

                var this_master = $(this);

                this_master.find('input[type="checkbox"]').each(function() {
                    var checkbox_this = $(this);


                    if (checkbox_this.is(":checked") == true) {
                        checkbox_this.attr('value', '1');
                    } else {
                        checkbox_this.prop('checked', true);
                        //DONT' ITS JUST CHECK THE CHECKBOX TO SUBMIT FORM DATA
                        checkbox_this.attr('value', '0');
                    }
                })
            });



            $(".add-row").click(function(){
                var fdate = $("#fromdate").val();
                var tdate = $("#todate").val();
                console.log(fdate);
                console.log(tdate);
                var markup = ""
                    +"<tr>"
                    +"<td>1</td>"
                    +"<td>"
                    +"<div class='form-group'>"
                    +"<div class='input-group date'>"
                    +"<div class='input-group-addon'><i class='fa fa-calendar'></i></div>"
                    +"<input type='text' class='form-control pull-right startdate' name='startdate[]'>"
                    +"</div>"
                    +"</div>"
                    +"</td>"
                    +"<td>"
                    +"<div class='form-group'>"
                    +"<div class='input-group date'>"
                    +"<div class='input-group-addon'><i class='fa fa-calendar'></i></div>"
                    +"<input type='text' class='form-control pull-right enddate' name='enddate[]'>"
                    +"</div>"
                    +"</div>"
                    +"</td>"
                    +"<td><input type='checkbox' name='ispresent[]'/></td>"
                    +"<td>"
                    +"<select name='areaid[]' class='form-control'>"
                    +"<option >Select Area...</option>"
                +"</select>"
                +"</td>"
                +"<td>"
                +"<select name='projectid[]' class='form-control'>"
                    +"<option >Select Project...</option>"
                +"</select>"
                +"</td>"
                    +"</tr>"
                    +"";
                $("table tbody").append(markup);
            });




        });
    </script>



    <section class="content-header">
        <h1>
            Attendance Period
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Schedule</a></li>
            <li class="active">Update Attendance</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">                <!-- /.box -->

                <div class="box">
                    <div class="box-body">
                        <button class="add-row">Add Row</button>
                        <form method="post" action="test">

                        <table id="weeklist" class="table table-bordered table-striped dataTable" >
                            <thead>
                            <tr>
                                <th>Employee Name</th>
                                <td> Sample Name</td>
                            <tr/>
                            <tr role="row">
                                <th style="display:none">id</th>
                                @foreach($sked as $s)
                                    <input type="hidden" name="scheduleid" value="{{$s['scheduleid']}}"/>
                                <th>Week # {{$s['week_number']}}</th>
                                <th>Year : {{$s['year_number']}}</th>
                                    <th>From : <input type="text" id="fromdate" value="{{$s['startdate']}}" contentEditable="false" style="border: none;"/></th>
                                    <th>To :<input type="text"  id="todate" value="{{$s['enddate']}}" contentEditable="false" style="border: none;"/> </th>
                                @endforeach
                                <th></th>
                            </tr>
                            <tr role="row">
                                <th>id</th>
                                <th>Date Start</th>
                                <th>Date End</th>
                                <th>Present</th>
                                <th>Area</th>
                                <th>Project</th>


                            </tr>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><button class="pull-right">Submit For Approval</button></td>


                            </tr>
                            </tfoot>
                            <tbody>
                            <tr>
                                <td>1</td>

                                <td>
                                    <div class="form-group">

                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control pull-right startdate" id="startdate" name="startdate[]">
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">

                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control pull-right enddate" name="enddate[]">
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                </td>
                                <td>
                                    <input type="checkbox" name="ispresent[]"/>

                                </td>

                                <td>
                                    <select name="areaid[]" class="form-control">
                                        <option >Select Area...</option>

                                    </select>
                                    </td>
                                <td>
                                    <select name="projectid[]" class="form-control">
                                        <option >Select Project...</option>

                                    </select>
                                </td>

                            </tr>
                            </tbody>


                        </table>
    <input type="hidden" name="username" value="{{ Auth::user()->id }}">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
</form>
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