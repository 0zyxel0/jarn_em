@extends('layouts.master')
@section('content')
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(document).ready(function(){
            $("select[name='selectarea']").change(function(){
                var selectarea = $(this).val();
                var token = $("input[name='_token']").val();
                console.log(selectarea);
                $.ajax({
                    url: "area-ajax/"+selectarea,
                    method: 'GET',
                    datatype:"json",
                    data: {id_country:selectarea, _token:token},

                    success: function(data) {
                        var $box = $("#selectsite");
                        $box.empty(); // remove old options
                        $.each(JSON.parse(data), function(key, value){
                            //console.log(value['name']);

                            $('select[name="selectsite"]').append('<option value="'+ value['areaid'] +'">' + value['name'] + '</option>');

                        });


                    },
                    error:function(data){
                        alert('error');
                    }
                });
            });
        });
    </script>

    <section class="content-header">
        <button class="btn btn-block btn-default" onclick="location.href='dashboard'; return false;" type="button" style="width: 150px;"> < Back to Dashboard</button>

        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Reports</a></li>
            <li class="active">View Payroll List</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Generate Payroll Report</h3>
                        <hr/>
                        <form method="post" action="">
                            <div class="form-group">
                                <label>Area</label>
                                <select class="form-control" name="selectarea" id="selectarea">
                                    <option value="">------</option>
                                    @foreach($area as $area)
                                        <option value="{{$area['areaid']}}">{{$area['name']}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Site</label>
                                <select class="form-control" name="selectsite" id="selectsite">
                                    <option value="">------</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>From</label>
                                <select class="form-control" name="dateFrom" id="dateFrom">
                                    <option value="">------</option>
                                    @foreach($weekTo as $wt)
                                        <option value="{{$wt['startdate']}}">Week {{$wt['week_number']}} ({{$wt['startdate']}} - {{$wt['enddate']}})</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group">
                                <label>To</label>
                                <select class="form-control" name="dateTo" id="dateTo">
                                    <option value="">------</option>
                                    @foreach($weekTo as $wt)
                                        <option value="{{$wt['enddate']}}">Week {{$wt['week_number']}} ({{$wt['startdate']}} - {{$wt['enddate']}})</option>
                                    @endforeach
                                </select>
                            </div>

                            <input type="hidden" name="username" id="username" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div style="text-align: right;">
                                <button type="submit" class="btn-lg btn-info">Go</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop