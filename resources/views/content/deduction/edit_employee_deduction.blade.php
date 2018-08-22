@extends('layouts.master') @section('content')

    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('js/bootstrap3.min.js') }}"></script>
    <script>
        $(document).ready(function(){
            $("#monthform").hide();
            var table =  $('#employee-list').DataTable({

            });


            $("select[name='months']").change(function(){
                var getPrice = $('#price').val();
                var getMonthlyDivisor = $("select[name='months']").val();
                var calculateMonthPrice = ((getPrice/getMonthlyDivisor)).toFixed(2);
                $("#calculatedprice").val(calculateMonthPrice);
               // console.log(calculateMonthPrice);
            });


            $("select[name='deducttype']").change(function(){
                var deducttype = $(this).val();
                if(deducttype == '3'){

                    $("#monthform").show();
                }else{$("#monthform").hide();}
                var token = $("input[name='_token']").val();
                //console.log(deducttype);
                $.ajax({
                    url:"item-ajax/"+deducttype,
                    method: 'GET',
                    datatype:"json",
                    data: {id:deducttype, _token:token},

                success: function(data) {
                 // console.log(data);
                    var $box = $("#inventory_item");
                    $box.empty(); // remove old options
                    $.each(JSON.parse(data), function(key, value){
                        //console.log(value['name']);

                        $('select[name="inventory_item"]').append('<option value="'+ value['inventoryid'] +'">' + value['item'] + ' (Available :' +value['available_stock'] +')'+'</option>');

                    });


                },
                error:function(data){
                    alert('error');
                }
            });
            });



            $('#qty').on("input propertychange",function(){


                var quantity = $(this).val();
                var itemid =$('#inventory_item :selected').val();

                var token = $("input[name='_token']").val();
                event.preventDefault();
                $.ajax({
                    url: "price-ajax/"+itemid+"/"+quantity,
                    method: 'get',
                    datatype:"json",
                    data: {itemid:itemid,quantity:quantity, _token:token},

                    success: function(data) {

                        $.each(JSON.parse(data), function(key, value){
                            //console.log(value['name']);

                            $('input[name="price"]').attr('value',value['price']);


                        });

                    },
                    error:function(data,error){
                        alert(data,error);
                    }
                });
            });





        });
    </script>



    <section class="content-header">
        <button class="btn btn-block btn-default" onclick="location.href='/jarn_em/public/viewdeductionlist'; return false;" type="button" style="width: 150px;"> &lt; Back to Dashboard</button>
        @foreach($data as $d)
        <h1>
            Deduction History of {{$d['givenname']}} {{$d['familyname']}}
        </h1>
        @endforeach
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Employees</a></li>
            <li class="active">New Employee</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">

            <div class="row">
                <div class="col-xs-12">
                    <div class="box-body">

                        <div class="box box-warning">
                            <div class="box-header with-border">
                                <h3 class="box-title">Add Deductions</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <form method="post" action="saveDeduction" data-parsley-validate="">
                                    <!-- text input -->

                                    <div class="form-group">
                                        <label>Deduction Type</label>
                                        <select class="form-control" id="deducttype" name="deducttype">
                                            <option>-----</option>
                                            @foreach($deduct as $de)
                                                <option value="{{$de['id']}}">{{$de['name']}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Item</label>
                                        <select class="form-control" id="inventory_item" name="inventory_item">


                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Quantity</label>
                                        <input type="text" class="form-control" placeholder="Enter ..." id="qty" name="qty" required="">
                                    </div>

                                    <div class="form-group">
                                        <label>Price</label>
                                        <input type="text" class="form-control" placeholder="Enter ..." id="price" name="price" value="" required="" readonly>
                                    </div>

                                    <div class="form-group" id="monthform">
                                        <label>Months to Pay</label>
                                        <select class="form-control" id="months" name="months">
                                            <option selected>-------</option>
                                            <option value="1">1 Month</option>
                                            <option value="2">2 Months</option>
                                            <option value="3">3 Months</option>
                                        </select>
                                        <label>Monthly Price</label>
                                        <input type="text" class="form-control" placeholder="" id="calculatedprice" name="calculatedprice" value="" required="" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label>Remarks
                                        </label>
                                        <textarea class="form-control" rows="3" placeholder="Enter ..." id="comments" name="comments"></textarea>
                                    </div>
                                    @foreach($data as $d)
                                        <input type="hidden" name="partyid" id="partyid" value="{{$d['partyid']}}">
                                    @endforeach
                                    <input type="hidden" name="username" id="username" value="{{ Auth::user()->id }}">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </form>


                            </div>                    <!-- /.box-body -->
                        </div>


                </div>
                </div>
            </div>
            <!-- left column -->
            <div class="col-md-6">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Current Deduction</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->

                    <div class="box-body">
                        <table id="employee-list" class="table table-bordered table-striped dataTable" >
                            <thead>
                            <tr role="row">
                            <tr role="row">

                                <th>Deduction Type</th>
                                <th>Quantity (Kg)</th>
                                <th>Total Amount</th>
                                <th>Entered Date</th>

                                <th>Status</th>

                            </tr>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($user_deduction as $ud)
                                <tr>

                                    <td>{{$ud['name']}}</td>
                                    <td>{{$ud['quantity']}}</td>
                                    <td>{{$ud['total_price']}}</td>
                                    <td>{{$ud['created_at']}}</td>
                                    <td>{{$ud['status']}}</td>

                                </tr>
                            @endforeach



                            </tbody>

                        </table>
                    </div>
                    <!-- /.box-body -->

                    <!-- /.box-footer -->
                </div>
            </div>
            <!-- right column -->
            <div class="col-md-6">

                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">Deduction History</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->

                    <div class="box-body">

                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Rice</a></li>
                                <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Corn</a></li>
                                <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">Materials</a></li>
                                <li class=""><a href="#tab_4" data-toggle="tab" aria-expanded="false">Cash Advance</a></li>
                                <li class=""><a href="#tab_5" data-toggle="tab" aria-expanded="false">Paluwagan</a></li>

                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_1">
                                    <table id="" class="table table-bordered table-striped dataTable" >
                                        <thead>

                                        <tr role="row">
                                            <th>Date</th>

                                            <th>Kg</th>
                                            <th>Total Price</th>
                                        </tr>

                                        </thead>
                                        <tbody>
                                        @foreach($rice_deduction as $ud)
                                            <tr>
                                                <td>{{$ud['created_at']}}</td>
                                                <td>{{$ud['quantity']}}</td>
                                                <td>{{$ud['total_price']}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="tab_2">
                                    <table id="" class="table table-bordered table-striped dataTable" >
                                        <thead>

                                        <tr role="row">
                                            <th>Date</th>
                                            <th>Kg</th>
                                            <th>Total Price</th>
                                        </tr>

                                        </thead>
                                        <tbody>
                                        @foreach($corn_deduction as $ud)
                                            <tr>
                                                <td>{{$ud['created_at']}}</td>
                                                <td>{{$ud['quantity']}}</td>
                                                <td>{{$ud['total_price']}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="tab_3">
                                    <table id="employee-list" class="table table-bordered table-striped dataTable" >
                                        <thead>
                                        <tr role="row">
                                        <tr role="row">
                                            <th>deductionid</th>
                                            <th>Start Date</th>
                                            <th>Terms</th>
                                            <th>Options</th>
                                        </tr>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div>



                    </div>
                    <!-- /.box-body -->

                    <!-- /.box-footer -->

                </div>

            </div>
            <!--/.col (right) -->
        </div>

    </section>
@stop