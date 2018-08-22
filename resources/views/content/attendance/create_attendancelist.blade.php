@extends('layouts.master')
@section('content')
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{asset('js/jquery-ui.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/datatables.css')}}">

    <script>
        $(document).ready(function () {
            $('.flash-message').fadeIn('fast').delay(1000).fadeOut('fast');
            var table =  $('#list_dots').DataTable({
                "columnDefs":
                    [
                        {
                            "targets": [ 1 ],
                            "render": function(data){
                                if(data == 1){
                                    return  "<div class='circle_green'> </div>";
                                }
                                else{ return  "<div class='circle_red'> </div>"}
                            },
                            "data": 1,
                            "defaultContent": "Click to edit"
                        }

                    ],
                "bFilter":false,
                "paging":   false,
                "info":     false
            });

            $("#moving").on("click", ".removeRowBtn", function() {
                $(this).closest( 'tr').remove();
                return false;
            });
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
                var markup = ""
                    +"<tr>"

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
                    +"<td>"
                    +"<input type='button' class='removeRowBtn' name='removeRowBtn' value='X''>"
                    +"</td>"
                    +"</tr>"
                    +"";
                $("#moving").append(markup);
            });




        });
    </script>
    <style>
        .circle_green
        {
            border: 2px solid #a1a1a1;
            padding: 10px 11px;
            background: green;
            width: 2px;
            border-radius: 100%;
            margin-left: auto;
            margin-right: auto;
            width: 1%;
        }
        .circle_red
        {
            border: 2px solid #a1a1a1;
            padding: 10px 11px;
            background: orangered;
            width: 2px;
            border-radius: 100%;
            margin-left: auto;
            margin-right: auto;
            width: 1%;
        }
    </style>


    <section class="content-header">
        <button class="btn btn-block btn-default" onclick="window.history.go(-1); return false;" type="button" style="width: 150px;"> < Back to Week List</button>

        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Schedule</a></li>
            <li class="active">Update Attendance</li>
        </ol>
    </section>

    <section class="content">
        <div class="flash-message">
            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                @if(Session::has('alert-' . $msg))

                    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                @endif
                    @if($errors->any())

                        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                    @endif
            @endforeach

                @if($errors->any())
                    <h4>{{$errors->first()}}</h4>
                @endif
        </div> <!-- end .flash-message -->
        <div class="row">
            <div class="col-xs-12">                <!-- /.box -->

                <div class="box">
                    <!-- /.box-header -->

                    <div class="box-header">
                        <h3 class="box-title">
                            Attendance
                        </h3>
                    </div>
                    <div class="box-body">
                        <table id="list_dots" class="table table-bordered table-striped dataTable">
                            <thead>
                            <tr>
                                <th>Employee Name</th>
                                @foreach($emp as $e)
                                    <th>{{$e['givenname']}} {{$e['familyname']}}</th>
                                @endforeach
                            </tr>
                            <tr>
                                <th>Week Period</th>
                                @foreach($sked as $s)
                                    <th>{{$s['week_number']}}</th>
                                @endforeach
                            </tr>
                            <tr>
                                <th>Date</th>
                                <th>Attendance</th>
                                <th>Attendance Type</th>
                                <th>Area</th>
                                <th>Work Done</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($attendance as $d)
                                <tr>
                                    <td>{{$d['startdate']}}</td>
                                    <td>{{$d['isPresent']}}</td>
                                    <td>{{$d['typename']}}</td>
                                    <td>{{$d['name']}}</td>
                                    <td>{{$d['project_name']}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </div>
        </div>
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

                                <th>Date Start</th>

                                <th>Present</th>
                                <th>Present Type</th>
                                <th>Area</th>
                                <th>Project</th>
                                <th></th>

                            </tr>
                            </tr>
                            </thead>

                            <tfoot>
                            <tr>

                                <td></td>
                                <td></td>

                                <td></td>
                                <td></td>
                                <td><button class="pull-right">Submit For Approval</button></td>


                            </tr>
                            </tfoot>
                            <tbody id="moving" name="moving">
                            <tr>


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