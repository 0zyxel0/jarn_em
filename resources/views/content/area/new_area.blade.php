@extends('layouts.master')
@section('content')
    <script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script>
        $(document).ready(function () {

            $("#acquiredate").datepicker({ autoclose:true});

        });
    </script>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add New Area</h3>
                        <hr/>
                        <form method="post" action="saveAreaDetails">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" placeholder="Enter ..." id="areaname" name="areaname" required="">
                            </div>
                            <div class="form-group">
                                <label>Exact Address</label>
                                <input type="text" class="form-control" placeholder="Enter ..." id="areaaddress" name="areaaddress" required="">
                            </div>
                            <div class="form-group">
                                <label>City</label>
                                <input type="text" class="form-control" placeholder="Enter ..." id="city" name="city" required="">
                            </div>
                            <div class="form-group">
                                <label>Country</label>
                                <input type="text" class="form-control" placeholder="Enter ..." id="country" name="country" required="">
                            </div>
                            <div class="form-group">
                                <label>Size</label>
                                <input type="text" class="form-control" placeholder="Enter ..." id="size" name="size" required="">
                            </div>
                            <div class="form-group">
                                <label>Acquired Date</label>

                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right" id="acquiredate" name="acquiredate" required="">
                                </div>
                                <!-- /.input group -->
                            </div>


                            <div class="form-group">
                                <label>Contact Person</label>
                                <select class="form-control" id="contactperson" name="contactperson">
                                    <option>Male</option>
                                    <option>Female</option>
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