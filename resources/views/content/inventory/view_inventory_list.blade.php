@extends('layouts.master')
@section('content')
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="{{ asset('js/bootstrap3.min.js') }}"></script>
    <link rel="stylesheet" href="{{asset('css/datatables.css')}}">
    <script>
        $(document).ready(function(){
            var table =  $('#list').DataTable({
                "columnDefs":
                    [
                        {
                            "targets": 0,
                            "visible": false,
                            "searchable": false
                        }

                    ],

            });

            $('#list tbody').on( 'click', '.btn_view', function () {

             alert('asdf');
                //window.location.href='/jarn_em/public/attendance/'+data[0]+'/'+data[1];
            });

            $('.flash-message').fadeIn('fast').delay(1000).fadeOut('fast');
        });
    </script>
    <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(Session::has('alert-' . $msg))

                <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
            @endif
        @endforeach
    </div>
    <section class="content-header">
        <button class="btn btn-block btn-default" onclick="location.href='dashboard'; return false;" type="button" style="width: 150px;"> &lt; Back to Dashboard</button>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Inventory</a></li>
            <li class="active">View Inventory List</li>
        </ol>

    </section>
    <section class="content">
        <div class="row">
            <div class="pull-right" style="margin-right: 15px;">
                <button type="button" class="btn btn-primary btn-large" data-toggle="modal" data-target="#myModal">Add New Item</button>
            </div>
            <div class="col-xs-12">                <!-- /.box -->

                <div class="box">

                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="list" class="table table-bordered table-striped dataTable">
                            <thead>
                            <tr>
                                <th>InventoryId</th>
                                <th>Item</th>
                                <th>Metric</th>

                                <th>Stock Level</th>
                                <th>Price Amount Bought</th>
                                <th>Selling Price</th>
                                <th>Option</th>

                            </tr>

                            </thead>
                            <tbody>
                            @foreach($data as $item)
                                <tr>
                                    <td>   {{$item['inventoryid']}}</td>
                                    <td>   {{$item['item']}}</td>
                                    <td>   {{$item['metric']}}</td>
                                    <td>   {{$item['available_stock']}}</td>
                                    <td>   {{$item['price_amount']}}</td>
                                    <td>   {{$item['selling_price']}}</td>
                                    <td>
                                        <button id=""><i class="fa fa-book"></i> Add</button>
                                        <button class="btn_view"><i class="fa fa-edit"></i> View</button>
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
        </div>
        <!-- /.row -->

    </section>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="purchaseLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="post" action="store">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="modalLabel">Add New Item</h4>
                    </div>

                    <div class="modal-body">
                        <div class="form-group">
                            <label>Item Name</label>
                            <input type="text" class="form-control" placeholder="Enter ..." id="item_name" name="item_name" required="">
                        </div>
                        <div class="form-group">
                            <label>Quantity</label>
                            <input type="text" class="form-control" placeholder="Enter ..." id="qty" name="qty" required="">
                        </div>

                        <div class="form-group">
                            <label>Metric</label>
                            <input type="text" class="form-control" placeholder="Enter ..." id="metric" name="metric" required="">
                        </div>
                        <div class="form-group">
                            <label>Total Amount Bought</label>
                            <input type="text" class="form-control" placeholder="Enter ..." id="price" name="price" required="">
                       </div>

                        <div class="form-group">
                            <label>Selling Price</label>
                            <input type="text" class="form-control" placeholder="Enter ..." id="sell" name="sell" required="">
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