@extends('layouts.master')
@section('content')
    <script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('js/jquery.js') }}"></script>


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
            <div class="col-xs-12">                <!-- /.box -->

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Create Deduction Type</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form method="post" action="saveDeductionType">
                            <div class="form-group">
                                <label>Type Name</label>
                                <input type="text" class="form-control" placeholder="Enter ..." id="deducttype" name="deducttype" required="">
                            </div>

                            <div style="text-align: right;">
                                <input type="hidden" name="username" id="username" value="{{ Auth::user()->id }}">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <button type="submit" class="btn-lg btn-info">Save</button>
                            </div>
                        </form>



                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->


                <!-- box -->
                <div class="box">
                    <div class="box-body">
                        <form>
                            <table class="table table-hover table-bordered">
                                <thead>
                                <tr>
                                    <th >Deduction Type</th>
                                    <th >Last Updated Date</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $d)
                                <tr>
                                    <td>{{$d['name']}}</td>
                                    <td>{{$d['created_at']}}</td>
                                </tr>

                                    @endforeach
                                </tbody>
                            </table>
                            <div style="text-align: right;">
                                <button type="submit" class="btn-lg btn-info">Save</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
@stop