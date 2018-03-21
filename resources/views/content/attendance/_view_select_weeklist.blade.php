@extends('layouts.master')
@section('content')
    <section class="content-header">
        <h1>
            Attendance for Area
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Attendance</a></li>
            <li class="active">Choose Week List</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">                <!-- /.box -->

                <div class="box">
                    <div class="box-body">
<form method="post" action="generateWeekSchedule">
                        <div class="form-group">
                            <label>Area</label>

                            <select class="form-control" id="areaid" name="areaid">
                                <option value="">----</option>
@foreach($area as $a)
                                    <option value="{{$a['areaid']}}">{{$a['name']}}</option>
    @endforeach
                            </select>
                        </div>


                        <div class="form-group">
                            <label>Week #</label>
                            <select class="form-control" id="scheduleid" name="scheduleid">
                                <option value="">----</option>
@foreach($schedule as $s)
                                    <option value="{{$s['scheduleid']}}">{{$s['week_number']}}</option>
    @endforeach
                            </select>
                        </div>


<button type="submit">Generate</button>
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