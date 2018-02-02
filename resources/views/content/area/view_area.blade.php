@extends('layouts.master')
@section('content')
    <script src="{{ asset('js/jquery.js') }}"></script>
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

        });
    </script>
    <section class="content-header">
        <h1>
            Area
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Area</a></li>
            <li class="active">View Area</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">                <!-- /.box -->

                <div class="box">
                    <div class="box-body">

                        <table id="area-list" class="table table-bordered table-striped dataTable" >
                            <thead>
                            <tr role="row">
                            <tr role="row">
                                <th>id</th>
                                <th>Area</th>
                                <th>Address</th>
                                <th>Contact Person</th>
                                <th>Options</th>
                            </tr>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $item)
                                <tr>
                                    <td>   {{$item['areaid']}}</td>
                                    <td>   {{$item['name']}}</td>
                                    <td>   {{$item['address']}}</td>
                                    <td>   {{$item['contact_person']}}</td>
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
@stop