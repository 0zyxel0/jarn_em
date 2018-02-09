@extends('layouts.master')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add New Project</h3>
                        <hr/>
                        <form method="post" action="saveAreaDetails">
                            <div class="form-group">
                                <label>Project Name</label>
                                <input type="text" class="form-control" placeholder="Enter ..." id="prjname" name="prjname" required="">
                            </div>
                            <div class="form-group">
                                <label>Rate</label>
                                <input type="text" class="form-control" placeholder="Enter ..." id="prjrate" name="prjrate" required="">
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