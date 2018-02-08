@extends('layouts.master')
@section('content')
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{asset('js/datatables.js')}}"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="{{asset('css/datatables.css')}}">
    <script>
        $(document).ready(function(){
            var table =  $('#team').DataTable({
                "columnDefs":
                    [
                        {
                            "targets": 0,
                            "visible": false,
                            "searchable": false
                        }

                    ]
            });

            $('#team tbody').on( 'click', '#btn_viewMember', function () {

                var data = table.row( $(this).parents('tr') ).data();
                window.location.href='viewMembers/'+data[0];
            });

        });
    </script>




    <section class="content-header">
        <h1>
            View Teams

        </h1>

    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">                <!-- /.box -->

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Current Teams</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        <table id="team" class="table table-bordered table-striped dataTable" >
                            <thead>
                            <tr role="row">
                            <tr role="row">
                                <th>id</th>
                                <th>Team Name</th>
                                <th>Team Leader</th>
                                <th>Area</th>
                                <th>Options</th>
                            </tr>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($data as $item)
                                <tr>
                                    <td>   {{$item['teamid']}}</td>
                                    <td>   {{$item['Teamname']}}</td>
                                    <td>   {{$item['givenname']}} {{$item['familyname']}}</td>
                                    <td>   {{$item['Areaname']}}</td>
                                    <td>
                                        <button id="btn_viewMember"><i class="fa fa-book"></i> View</button>
                                        <button id="btn_editProfile"><i class="fa fa-edit"></i> Edit</button>
                                        <button id="btn_editProfile"><i class="fa fa-edit"></i> Assign Leader</button>
                                        <button id="btn_editProfile"><i class="fa fa-edit"></i> Delete</button>

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