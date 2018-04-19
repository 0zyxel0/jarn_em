@extends('layouts.master')
@section('content')
    <script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/bootstrap3.min.js') }}"></script>
    <link rel="stylesheet" href="{{asset('css/datatables.css')}}">
    <script>
        $(document).ready(function(){
            var table =  $('#list').DataTable({


            });

            $('#list tbody').on( 'click', '#btn_showAttn', function () {

                var data = table.row( $(this).parents('tr') ).data();

                window.location.href='/jarn_em/public/attendance/'+data[0]+'/'+data[1];
            });
        });
    </script>

    <section class="content-header">
        <h1>
            Deduction
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Deduction</a></li>
            <li class="active">Create Deduction Type</li>
        </ol>

    </section>
    <section class="content">
        <div class="row">
            <div class="pull-right" style="margin-right: 15px;">
                <button type="button" class="btn btn-primary btn-large" data-toggle="modal" data-target="#myModal">Add Deduction Type</button>
            </div>
            </br>
            <div class="col-xs-12">                <!-- /.box -->

                <!-- box -->
                <div class="box">
                    <div class="box-body">

                            <table class="table table-hover table-bordered" id="list">
                                <thead>
                                <tr>
                                    <th >Deduction Type</th>
                                    <th >Last Updated Date</th>
                                    <th>Option</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $d)
                                <tr>
                                    <td>{{$d['name']}}</td>
                                    <td>{{$d['created_at']}}</td>
                                    <td>     <button id="btn_showAttn"><i class="fa fa-book"></i> Edit</button> <button id="btn_showAttn"><i class="fa fa-book"></i> Delete</button></td>
                                </tr>

                                    @endforeach
                                </tbody>
                            </table>


                    </div>
                </div>

            </div>
            <!-- /.col -->
        </div>




        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="purchaseLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form method="post" action="saveDeductionType">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="modalLabel">Add Deduction Type</h4>
                        </div>

                        <div class="modal-body">



                                <div class="form-group">
                                    <label>Type Name</label>
                                    <input type="text" class="form-control" placeholder="Enter ..." id="deducttype" name="deducttype" required="">
                                </div>

                                <div style="text-align: right;">
                                    <input type="hidden" name="username" id="username" value="{{ Auth::user()->id }}">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">

                                </div>




                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
        <!-- /.row -->
    </section>
@stop