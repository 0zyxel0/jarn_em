@extends('layouts.master')
@section('content')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/bootstrap3.min.js')}}"></script>

    <script>
        </script>



    <section class="content">

        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">

                        @forelse($image as $image)
                            <img class="profile-user-img img-responsive img-square" src="{{asset("storage/photo_library/".$image['imageid'])}}.jpeg"  alt="User profile picture">
                        @empty
                            <img class="profile-user-img img-responsive img-square" src="" alt="User profile picture">


                            <form action="store" method="post" enctype="multipart/form-data">
                                <label>Select image to upload:</label>
                                <input type="hidden" value="{{ csrf_token() }}" name="_token">
                                <input type="hidden" value="{{ Auth::user()->name }}" name="updatedby" id="updatedby">

                                @foreach($data as $c)
                                    <input type="hidden" value="{{$c['partyid']}}" name="userId" id="userId">
                                @endforeach
                                <input type="file" name="image_file" id="image_file">
                                <input type="submit" value="Upload" name="submit">

                            </form>
                        @endforelse




                        @foreach($data as $d)
                        <h3 class="profile-username text-center">{{$d['givenname']}} {{$d['familyname']}}</h3>
                            @foreach($area as $area)
                            <p class="text-muted text-center">{{$area['name']}}</p>
                                @endforeach
                        @endforeach
                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">

                                    <b>Salary Rate</b> <a class="pull-right">
                                    @foreach($data2 as $d2){{$d2['daily_rate']}}
                                    @endforeach
                                </a>


                            </li>
                            <li class="list-group-item">
                                <b>Start Date</b> <a class="pull-right">
                                    @foreach($data as $d3)
                                        {{$d3['startdate']}}
                                    @endforeach</a>
                            </li>
                            <li class="list-group-item">
                                <b>Status</b> <a class="pull-right">
                                    @foreach($data as $d3)
                                        {{$d3['status']}}
                                    @endforeach</a>
                                </a>
                            </li>
                        </ul>


                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <!-- About Me Box -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Employee Details</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <strong><i class="fa fa-book margin-r-5"></i> Contact Number</strong>
                        @foreach($data as $n)
                        <p class="text-muted">{{$n['contactnumber']}}</p>
                        @endforeach
                        <hr>

                        <strong><i class="fa fa-map-marker margin-r-5"></i>Address</strong>
                        @foreach($data as $a)
                        <p class="text-muted">{{$a['address']}}</p>
                        @endforeach
                        <hr>

                        <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

                        <p>
                            <span class="label label-danger">UI Design</span>
                            <span class="label label-success">Coding</span>
                            <span class="label label-info">Javascript</span>
                            <span class="label label-warning">PHP</span>
                            <span class="label label-primary">Node.js</span>
                        </p>

                        <hr>

                        <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#Government" data-toggle="tab" aria-expanded="true">Personal Details</a></li>
                        <li class=""><a href="#activity" data-toggle="tab" aria-expanded="false">Activity</a></li>
                        <li class=""><a href="#timeline" data-toggle="tab" aria-expanded="false">Timeline</a></li>
                        <li class=""><a href="#Attendance" data-toggle="tab" aria-expanded="false">Attendance</a></li>
                        <li class=""><a href="#Team" data-toggle="tab" aria-expanded="false">Team</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="Government">

                            <div class="tab-content">

                                <table class="table table-condensed">
                                    <tbody><tr>

                                        <th>Government ID</th>
                                        <th>#</th>
                                    </tr>
                                    @foreach($govid as $govid)
                                        <tr>

                                            <td> {{$govid['name']}}</td>
                                            <td>    {{$govid['government_num']}}</td>


                                        </tr>
                                    @endforeach
                                    </tbody></table>








                            </div>

                        </div>
                        <div class="tab-pane " id="activity">
                            <!-- Post -->
                            <div class="post">
                                <div class="user-block">
                                    <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image">
                                    <span class="username">
                          <a href="#">Jonathan Burke Jr.</a>
                          <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                        </span>
                                    <span class="description">Shared publicly - 7:30 PM today</span>
                                </div>
                                <!-- /.user-block -->
                                <p>
                                    Lorem ipsum represents a long-held tradition for designers,
                                    typographers and the like. Some people hate it and argue for
                                    its demise, but others ignore the hate as they create awesome
                                    tools to help create filler text for everyone from bacon lovers
                                    to Charlie Sheen fans.
                                </p>
                                <ul class="list-inline">
                                    <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
                                    <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
                                    </li>
                                    <li class="pull-right">
                                        <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
                                            (5)</a></li>
                                </ul>

                                <input class="form-control input-sm" type="text" placeholder="Type a comment">
                            </div>
                            <!-- /.post -->

                            <!-- Post -->
                            <div class="post clearfix">
                                <div class="user-block">
                                    <img class="img-circle img-bordered-sm" src="../../dist/img/user7-128x128.jpg" alt="User Image">
                                    <span class="username">
                          <a href="#">Sarah Ross</a>
                          <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                        </span>
                                    <span class="description">Sent you a message - 3 days ago</span>
                                </div>
                                <!-- /.user-block -->
                                <p>
                                    Lorem ipsum represents a long-held tradition for designers,
                                    typographers and the like. Some people hate it and argue for
                                    its demise, but others ignore the hate as they create awesome
                                    tools to help create filler text for everyone from bacon lovers
                                    to Charlie Sheen fans.
                                </p>

                                <form class="form-horizontal">
                                    <div class="form-group margin-bottom-none">
                                        <div class="col-sm-9">
                                            <input class="form-control input-sm" placeholder="Response">
                                        </div>
                                        <div class="col-sm-3">
                                            <button type="submit" class="btn btn-danger pull-right btn-block btn-sm">Send</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.post -->

                            <!-- Post -->
                            <div class="post">
                                <div class="user-block">
                                    <img class="img-circle img-bordered-sm" src="../../dist/img/user6-128x128.jpg" alt="User Image">
                                    <span class="username">
                          <a href="#">Adam Jones</a>
                          <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                        </span>
                                    <span class="description">Posted 5 photos - 5 days ago</span>
                                </div>
                                <!-- /.user-block -->
                                <div class="row margin-bottom">
                                    <div class="col-sm-6">
                                        <img class="img-responsive" src="../../dist/img/photo1.png" alt="Photo">
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-6">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <img class="img-responsive" src="../../dist/img/photo2.png" alt="Photo">
                                                <br>
                                                <img class="img-responsive" src="../../dist/img/photo3.jpg" alt="Photo">
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-6">
                                                <img class="img-responsive" src="../../dist/img/photo4.jpg" alt="Photo">
                                                <br>
                                                <img class="img-responsive" src="../../dist/img/photo1.png" alt="Photo">
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.row -->
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->

                                <ul class="list-inline">
                                    <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
                                    <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
                                    </li>
                                    <li class="pull-right">
                                        <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
                                            (5)</a></li>
                                </ul>

                                <input class="form-control input-sm" type="text" placeholder="Type a comment">
                            </div>
                            <!-- /.post -->
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="timeline">
                            <!-- The timeline -->
                            <ul class="timeline timeline-inverse">
                                <!-- timeline time label -->
                                <li class="time-label">
                        <span class="bg-red">
                          10 Feb. 2014
                        </span>
                                </li>
                                <!-- /.timeline-label -->
                                <!-- timeline item -->
                                <li>
                                    <i class="fa fa-envelope bg-blue"></i>

                                    <div class="timeline-item">
                                        <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                                        <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                                        <div class="timeline-body">
                                            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                                            weebly ning heekya handango imeem plugg dopplr jibjab, movity
                                            jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                                            quora plaxo ideeli hulu weebly balihoo...
                                        </div>
                                        <div class="timeline-footer">
                                            <a class="btn btn-primary btn-xs">Read more</a>
                                            <a class="btn btn-danger btn-xs">Delete</a>
                                        </div>
                                    </div>
                                </li>
                                <!-- END timeline item -->
                                <!-- timeline item -->
                                <li>
                                    <i class="fa fa-user bg-aqua"></i>

                                    <div class="timeline-item">
                                        <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>

                                        <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request
                                        </h3>
                                    </div>
                                </li>
                                <!-- END timeline item -->
                                <!-- timeline item -->
                                <li>
                                    <i class="fa fa-comments bg-yellow"></i>

                                    <div class="timeline-item">
                                        <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

                                        <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                                        <div class="timeline-body">
                                            Take me to your leader!
                                            Switzerland is small and neutral!
                                            We are more like Germany, ambitious and misunderstood!
                                        </div>
                                        <div class="timeline-footer">
                                            <a class="btn btn-warning btn-flat btn-xs">View comment</a>
                                        </div>
                                    </div>
                                </li>
                                <!-- END timeline item -->
                                <!-- timeline time label -->
                                <li class="time-label">
                        <span class="bg-green">
                          3 Jan. 2014
                        </span>
                                </li>
                                <!-- /.timeline-label -->
                                <!-- timeline item -->
                                <li>
                                    <i class="fa fa-camera bg-purple"></i>

                                    <div class="timeline-item">
                                        <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>

                                        <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                                        <div class="timeline-body">
                                            <img src="http://placehold.it/150x100" alt="..." class="margin">
                                            <img src="http://placehold.it/150x100" alt="..." class="margin">
                                            <img src="http://placehold.it/150x100" alt="..." class="margin">
                                            <img src="http://placehold.it/150x100" alt="..." class="margin">
                                        </div>
                                    </div>
                                </li>
                                <!-- END timeline item -->
                                <li>
                                    <i class="fa fa-clock-o bg-gray"></i>
                                </li>
                            </ul>
                        </div>
                        <!-- /.tab-pane -->

                        <div class="tab-pane" id="Attendance">

                                <div class="tab-content">
                                <table class="table table-bordered" id="my_table">
                                    <thead>
                                    <tr>
                                        <td style="text-align: center;">
                                            Employees<i class="entypo-down-thin"></i> |
                                            Date <i class="entypo-right-thin"></i>
                                        </td>
                                        <td style="text-align: center;">
                                            Summary<br>( Total Presence / Total Absence )                        </td>
                                        <td style="text-align: center;">1</td>
                                        <td style="text-align: center;">2</td>
                                        <td style="text-align: center;">3</td>
                                        <td style="text-align: center;">4</td>
                                        <td style="text-align: center;">5</td>
                                        <td style="text-align: center;">6</td>
                                        <td style="text-align: center;">7</td>
                                        <td style="text-align: center;">8</td>
                                        <td style="text-align: center;">9</td>
                                        <td style="text-align: center;">10</td>
                                        <td style="text-align: center;">11</td>
                                        <td style="text-align: center;">12</td>
                                        <td style="text-align: center;">13</td>
                                        <td style="text-align: center;">14</td>
                                        <td style="text-align: center;">15</td>
                                        <td style="text-align: center;">16</td>
                                        <td style="text-align: center;">17</td>
                                        <td style="text-align: center;">18</td>
                                        <td style="text-align: center;">19</td>
                                        <td style="text-align: center;">20</td>
                                        <td style="text-align: center;">21</td>
                                        <td style="text-align: center;">22</td>
                                        <td style="text-align: center;">23</td>
                                        <td style="text-align: center;">24</td>
                                        <td style="text-align: center;">25</td>
                                        <td style="text-align: center;">26</td>
                                        <td style="text-align: center;">27</td>
                                        <td style="text-align: center;">28</td>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <tr>
                                        <td style="text-align: center;">
                                            John Doe                            </td>
                                        <td style="text-align: center;">
                                            1 / 0                            </td>
                                        <td style="text-align: center;">
                                        </td>

                                        <td style="text-align: center;">
                                            <i class="entypo-record" style="color: #00a651;"></i>
                                        </td>

                                        <td style="text-align: center;">
                                        </td>

                                        <td style="text-align: center;">
                                        </td>

                                        <td style="text-align: center;">
                                        </td>

                                        <td style="text-align: center;">
                                        </td>

                                        <td style="text-align: center;">
                                        </td>

                                        <td style="text-align: center;">
                                        </td>

                                        <td style="text-align: center;">
                                        </td>

                                        <td style="text-align: center;">
                                        </td>

                                        <td style="text-align: center;">
                                        </td>

                                        <td style="text-align: center;">
                                        </td>

                                        <td style="text-align: center;">
                                        </td>

                                        <td style="text-align: center;">
                                        </td>

                                        <td style="text-align: center;">
                                        </td>

                                        <td style="text-align: center;">
                                        </td>

                                        <td style="text-align: center;">
                                        </td>

                                        <td style="text-align: center;">
                                        </td>

                                        <td style="text-align: center;">
                                        </td>

                                        <td style="text-align: center;">
                                        </td>

                                        <td style="text-align: center;">
                                        </td>

                                        <td style="text-align: center;">
                                        </td>

                                        <td style="text-align: center;">
                                        </td>

                                        <td style="text-align: center;">
                                        </td>

                                        <td style="text-align: center;">
                                        </td>

                                        <td style="text-align: center;">
                                        </td>

                                        <td style="text-align: center;">
                                        </td>

                                        <td style="text-align: center;">
                                        </td>

                                    </tr>
                                    </tbody>
                                </table>

                                <center>
                                    <a href="http://creativeitem.com/demo/hrm/index.php?admin/attendance_report_print_view/1/2018/2" class="btn btn-primary" target="_blank">
                                        Print Attendance Sheet                </a>
                                </center>
                                </div>

                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        </div>
    </section>
@stop