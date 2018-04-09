@extends('layouts.master')
@section('content')
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/bootstrap3.min.js') }}"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="{{asset('css/datatables.css')}}">
    <script>
        $(document).ready(function(){
            var table =  $('#area-list').DataTable({
                "columnDefs":
                    [
                        {
                            "targets": 0,
                            "visible": false,
                            "searchable": false
                        }

                    ]
            });

            $('#area-list tbody').on( 'click', '#btn_editArea', function () {

                var data = table.row( $(this).parents('tr') ).data();
                window.location.href='editEmployeeDetails/'+data[0];
            });

            $('#area-list tbody').on( 'click', '#btn_viewArea', function () {

                var data = table.row( $(this).parents('tr') ).data();
                window.location.href='profile/'+data[0];
            });




            $('.flash-message').fadeIn('fast').delay(1000).fadeOut('fast');

            $('#acquiredate').datepicker();

        });
    </script>
    <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(Session::has('alert-' . $msg))

                <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
            @endif
        @endforeach
    </div> <!-- end .flash-message -->
    <section class="content-header">
        @foreach($area as $ad)
        <h1>
            {{$ad['name']}} Area
        </h1>
        @endforeach
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Area</a></li>
            <li class="active">View Area</li>
        </ol>
    </section>

    <section class="content">

        <div class="row">


            <div class="pull-right" style="margin-right: 15px;">
                <button type="button" class="btn btn-primary btn-large" data-toggle="modal" data-target="#myModal">Add Area</button>
            </div>

            <div class="col-xs-12" style="margin-top:5px;">                <!-- /.box -->

                <div class="box">

                    <div class="box-body">

                        <table id="area-list" class="table table-bordered table-striped dataTable" >
                            <thead>
                            <tr role="row">
                            <tr role="row">
                                <th>id</th>
                                <th>Area</th>
                                <th>Address</th>
                                <th>Size</th>
                                <th>Options</th>
                            </tr>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($areaData as $item)
                                <tr>
                                    <td>   {{$item['areaid']}}</td>
                                    <td>   {{$item['name']}}</td>
                                    <td>   {{$item['address']}}</td>
                                    <td>   {{$item['size']}}</td>
                                    <td>
                                        <button id="btn_viewProfile"><i class="fa fa-book"></i> View</button>
                                        <button id="btn_editProfile"><i class="fa fa-edit"></i> Edit</button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="purchaseLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="post" action="saveChildAreaRecord">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="modalLabel">Add New Area</h4>
                    </div>

                    <div class="modal-body">

                        <div class="form-group">
                            @foreach($area as $a)
                                <input type="hidden" class="form-control" placeholder="Enter ..." id="parentid" name="parentid" value="{{$a['areaid']}}">
                            @endforeach
                        </div>
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


                        <input type="hidden" name="username" id="username" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>

                </div>
            </form>
        </div>
    </div>

@stop