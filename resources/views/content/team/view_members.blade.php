@extends('layouts.master')
@section('content')
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script src="{{asset('js/bootstrap3.min.js')}}"></script>
    <script>

        $(document).ready(function() {

        });

    </script>


    <section class="content-header">
        <h1>
            Teams
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Team</a></li>
            <li class="active">View Team Members</li>
        </ol>
    </section>
    <section class="content">

        <div class="row">
            <div class="col-md-3">

                <div class="box">
                    <div class="box-header">

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">

                                <b>Team Name</b> <a class="pull-right">

                                    @forelse($data as $d2)
                                        <td><h3 class="box-title">{{$d2['Teamname']}}</h3></td>
                                    @empty
                                        <td><h3 class="box-title"> </h3></td>

                                    @endforelse

                                </a>


                            </li>
                            <li class="list-group-item">
                                <b>Team Leader</b> <a class="pull-right">

                                    @forelse($data as $d2)

                                        <td><h3 class="box-title">{{$d2['givenname']}} {{$d2['familyname']}}</h3></td>
                                        @if (is_null($d2['givenname']))
                                            <button type="button"  data-toggle="modal" data-target="#myModal">Assign Team Leader</button>
                                        @endif
                                    @empty

                                        <button type="button"  data-toggle="modal" data-target="#myModal">Assign Team Leader</button>
                                    @endforelse
                                </a>
                            </li>
                            <li class="list-group-item">
                                <b>Area</b> <a class="pull-right">
                                    @foreach($data as $d)
                                        <td><h3 class="box-title">{{$d['Areaname']}}</h3></td>
                                    @endforeach
                                </a>

                            </li>
                        </ul>

                    </div>
                    <!-- /.box-header -->


                </div>
            </div>
            <div class="col-md-9">

                <!-- /.box -->

                <div class="box">
                    <div class="box-header">
                        @forelse($data as $d2)
                            <h3 class="box-title">Members of {{$d2['Teamname']}}</h3>
                        @empty
                            <td><h3 class="box-title"> </h3></td>
                        @endforelse
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        <table id="employee-list" class="table table-bordered table-striped dataTable" >
                            <thead>
                            <tr role="row">
                            <tr role="row">
                                <th>Given Name</th>
                                <th>Family Name</th>
                                <th>Contact Number</th>

                            </tr>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $d)
                                <tr>
                                <td>{{$d['givenname']}}</td>
                                    <td>{{$d['familyname']}}</td>
                                    <td>{{$d['contactnumber']}}</td>
                                </tr>
                            @endforeach
                            @foreach($data3 as $i)
                                <tr>

                                    <td>   {{$i['givenname']}}</td>
                                    <td>   {{$i['familyname']}}</td>
                                    <td>   {{$i['contactnumber']}}</td>


                                </tr>
                            @endforeach


                            </tbody>

                        </table>
                        <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Assign Team Leader</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="updateTeamLeader">
                                            <div class="form-group">
                                                <label>Team Name</label>
                                                @foreach($data as $name)
                                                {{$name['Teamname']}}
                                                    <input type="hidden" name="teamid" id="teamid" value="{{$name['teamid']}}">
                                                    @endforeach
                                            </div>
                                            <div class="form-group">
                                                <label>Employee Name</label>
                                                <select class="form-control" name="selectleader" id="selectleader">
                                                    <option value="">------</option>
                                                    @foreach($data2 as $emps)
                                                        <option value="{{$emps['partyid']}}">{{$emps['givenname']}} {{$emps['familyname']}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <input type="hidden" name="username" id="username" value="{{ Auth::user()->id }}">
                                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                            <div style="text-align: right;">
                                                <button type="submit" class="btn-lg btn-info">Save</button>
                                            </div>

                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Save</button>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
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