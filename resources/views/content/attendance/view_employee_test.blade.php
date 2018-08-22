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

            var d1 = $('#fromdate').val();
            var d2 = $('#todate').val();
            var oneDay = 24*60*60*1000;
            function parseDate(input) {
                var parts = input.match(/(\d+)/g);
                // new Date(year, month [, date [, hours[, minutes[, seconds[, ms]]]]])
                return new Date(parts[0], parts[1]-1, parts[2]); // months are 0-based
            }
          //  function parseAddDate(input) {
            //    var parts = input.match(/(\d+)/g);
                // new Date(year, month [, date [, hours[, minutes[, seconds[, ms]]]]])
              //  return new Date(parts[0], parts[1]-1, parts[2]); // months are 0-based
            //}
            //console.log(parseAddDate(d1));
            var diff = (parseDate(d2).getTime() - parseDate(d1).getTime()) / oneDay-1;

            for(var x=0;x<=diff;x++){
                var id = 2;
                    id=id+x;
                var markup = ""
                    +"<tr>"
                    +"<td>"+id+"</td>"
                    +"<td>"
                    +"<div class='form-group'>"
                    +"<div class='input-group date'>"
                    +"<div class='input-group-addon'><i class='fa fa-calendar'></i></div>"
                    +"<input type='text' class='form-control pull-right startdate' name='startdate[]'>"
                    +"</div>"
                    +"</div>"
                    +"</td>"
                    +"<td>"
                    +"<input type='hidden' class='form-control pull-right enddate' name='enddate[]'>"
                    +"<input type='checkbox' name='ispresent[]'/></td>"
                    +"<td>"
                    +"<select name='presenttype[]' class='form-control'>"
                    +"<option disabled>Select Attendance Type...</option>"
                    +"@foreach($presenttype as $pt)"
                    +"<option value={{$pt['id']}}>{{$pt['typename']}}</option>"
                    +"@endforeach"
                    +"</select>"
                    +"</td>"

                    +"<td>"
                    +"<select name='areaid[]' class='form-control'>"
                    +"<option disabled>Select Area...</option>"
                    +"@foreach($area as $a)"
                    +"<option value={{$a['areaid']}}>{{$a['name']}}</option>"
                    +"@endforeach"
                    +"</select>"
                    +"</td>"
                    +"<td>"
                    +"<select name='projectid[]' class='form-control'>"
                    +"<option disabled>Select Project...</option>"
                    +"@foreach($project as $p)"
                    +"<option value={{$p['projectid']}}>{{$p['project_name']}}</option>"
                    +"@endforeach"
                    +"</select>"
                    +"</td>"
                    +"</tr>"
                    +"";
                $("table tbody").append(markup);
            }

            $(".add-row").click(function(){
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
                    +"<input type='hidden' class='form-control pull-right enddate' name='enddate[]'>"
                    +"<input type='checkbox' name='ispresent[]'/></td>"
                    +"<td>"
                    +"<select name='presenttype[]' class='form-control'>"
                    +"<option disabled>Select Attendance Type...</option>"
                    +"@foreach($presenttype as $pt)"
                    +"<option value={{$pt['id']}}>{{$pt['typename']}}</option>"
                    +"@endforeach"
                    +"</select>"
                    +"</td>"

                    +"<td>"
                    +"<select name='areaid[]' class='form-control'>"
                    +"<option disabled>Select Area...</option>"
                    +"@foreach($area as $a)"
                    +"<option value={{$a['areaid']}}>{{$a['name']}}</option>"
                    +"@endforeach"
                    +"</select>"
                    +"</td>"
                    +"<td>"
                    +"<select name='projectid[]' class='form-control'>"
                    +"<option disabled>Select Project...</option>"
                    +"@foreach($project as $p)"
                    +"<option value={{$p['projectid']}}>{{$p['project_name']}}</option>"
                    +"@endforeach"
                    +"</select>"
                    +"</td>"
                    +"</tr>"
                    +"";
                $("table tbody").append(markup);
            });




        });
    </script>



    <section class="content-header">
        <button class="btn btn-block btn-default" onclick="window.history.go(-1); return false;" type="button" style="width: 150px;"> < Back to Week List</button>

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
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            Attendance Period

                        </h3>
                        <br/> <br/>
                        <button class="add-row">Add Row</button>
                        <!-- /.box-tools -->
                    </div>
                    <div class="box-body">


                        <form method="post" action="store">
                            <table id="weeklist" class="table table-bordered table-striped dataTable" >
                                <thead>
                                <tr>
                                    <th>Employee Name</th>


                                    @foreach($emp as $e)
                                        <td>{{$e['givenname']}} {{$e['familyname']}}</td>
                                        <input type="hidden" name="partyid" value="{{$e['partyid']}}"/>
                                @endforeach

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

                                    <th>Present</th>
                                    <th>Present Type</th>
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
                                                <input type="text" class="form-control pull-right startdate" id="startdate" name="startdate[]" required>
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                    </td>
                                    <td>
                                        <input type="hidden" class="form-control pull-right enddate" name="enddate[]">
                                        <input type="checkbox" name="ispresent[]"/>

                                    </td>
                                    <td>
                                        <select name="presenttype[]" class="form-control">
                                            <option disabled>Select Attendance Type...</option>
                                            @foreach($presenttype as $pt)
                                                <option value="{{$pt['id']}}">{{$pt['typename']}}</option>
                                            @endforeach

                                        </select>
                                    </td>

                                    <td>
                                        <select name="areaid[]" class="form-control">
                                            <option disabled>Select Area...</option>
                                            @foreach($area as $a)
                                                <option value="{{$a['areaid']}}">{{$a['name']}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <select name="projectid[]" class="form-control">
                                            @foreach($project as $p)
                                                <option value="{{$p['projectid']}}">{{$p['project_name']}}</option>
                                            @endforeach
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