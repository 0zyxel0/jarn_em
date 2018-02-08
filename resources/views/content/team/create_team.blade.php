@extends('layouts.master')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">New Team</h3>
                        <hr/>
                        <form method="post" action="saveTeamRecord">
                            <div class="form-group">
                                <label>Team Name</label>
                                <input type="text" class="form-control" placeholder="Enter ..." id="teamname" name="teamname" required="">
                            </div>
                            <div class="form-group">
                                <label>Area</label>
                                <select class="form-control" name="selectarea" id="selectarea">
                                    @foreach($query as $q)
                                        <option value="{{$q['areaid']}}">{{$q['name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Team Leader</label>
                                <select class="form-control" name="selectleader" id="selectleader">
                                    <option value="">------</option>
                                    @foreach($query2 as $q2)
                                        <option value="{{$q2['partyid']}}">{{$q2['givenname']}} {{$q2['familyname']}}</option>
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
                </div>
            </div>
        </div>
    </section>
@stop