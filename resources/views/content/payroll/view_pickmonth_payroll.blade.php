@extends('layouts.master')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">New Team</h3>
                        <hr/>
                        <form method="post" action="">
                            <div class="form-group">
                                <label>Area</label>
                                <select class="form-control" name="selectarea" id="selectarea">
                                    @foreach($area as $area)
                                        <option value="{{$area['areaid']}}">{{$area['name']}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Site</label>
                                <select class="form-control" name="selectsite" id="selectsite">
                                    @foreach($area as $area)
                                        <option value="{{$area['areaid']}}">{{$area['name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>From</label>
                                <select class="form-control" name="selectleader" id="selectleader">
                                    <option value="">------</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <label>To</label>
                                <select class="form-control" name="selectleader" id="selectleader">
                                    <option value="">------</option>

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