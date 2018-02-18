@extends('layouts.master') @section('content')
    <section class="content-header">
        <h1>
           Dashboard

        </h1>

    </section>
    <section class="content">

        <!-- Default box -->

            <div class="row">

                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Monthly Recap Report</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
                                        <i class="fa fa-wrench"></i></button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a></li>
                                    </ul>
                                </div>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <p class="text-center">
                                        <strong>Sales: 1 Jan, 2014 - 30 Jul, 2014</strong>
                                    </p>

                                    <div class="chart">
                                        <!-- Sales Chart Canvas -->
                                        <canvas id="salesChart" style="height: 180px; width: 1031px;" width="1031" height="180"></canvas>
                                    </div>
                                    <!-- /.chart-responsive -->
                                </div>
                                <!-- /.col -->
                                <div class="col-md-4">
                                    <p class="text-center">
                                        <strong>Goal Completion</strong>
                                    </p>

                                    <div class="progress-group">
                                        <span class="progress-text">Add Products to Cart</span>
                                        <span class="progress-number"><b>160</b>/200</span>

                                        <div class="progress sm">
                                            <div class="progress-bar progress-bar-aqua" style="width: 80%"></div>
                                        </div>
                                    </div>
                                    <!-- /.progress-group -->
                                    <div class="progress-group">
                                        <span class="progress-text">Complete Purchase</span>
                                        <span class="progress-number"><b>310</b>/400</span>

                                        <div class="progress sm">
                                            <div class="progress-bar progress-bar-red" style="width: 80%"></div>
                                        </div>
                                    </div>
                                    <!-- /.progress-group -->
                                    <div class="progress-group">
                                        <span class="progress-text">Visit Premium Page</span>
                                        <span class="progress-number"><b>480</b>/800</span>

                                        <div class="progress sm">
                                            <div class="progress-bar progress-bar-green" style="width: 80%"></div>
                                        </div>
                                    </div>
                                    <!-- /.progress-group -->
                                    <div class="progress-group">
                                        <span class="progress-text">Send Inquiries</span>
                                        <span class="progress-number"><b>250</b>/500</span>

                                        <div class="progress sm">
                                            <div class="progress-bar progress-bar-yellow" style="width: 80%"></div>
                                        </div>
                                    </div>
                                    <!-- /.progress-group -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- ./box-body -->
                        <div class="box-footer">
                            <div class="row">
                                <div class="col-sm-3 col-xs-6">
                                    <div class="description-block border-right">
                                        <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 17%</span>
                                        <h5 class="description-header">35,210.43</h5>
                                        <span class="description-text">TOTAL PAYROLL</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-3 col-xs-6">
                                    <div class="description-block border-right">
                                        <span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i> 0%</span>
                                        <h5 class="description-header">$10,390.90</h5>
                                        <span class="description-text">TOTAL EXPENSE</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-3 col-xs-6">
                                    <div class="description-block border-right">
                                        <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 20%</span>
                                        <h5 class="description-header">24,813.53</h5>
                                        <span class="description-text">TOTAL PROFIT</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-3 col-xs-6">
                                    <div class="description-block">
                                        <span class="description-percentage text-red"><i class="fa fa-caret-down"></i> 18%</span>
                                        <h5 class="description-header">1200</h5>
                                        <span class="description-text">MAN HOURS</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.box-footer -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->



            <!-- /.box-footer-->
        </div>
        <div class="row">
            <!-- Left col -->
            <section class="col-lg-7 connectedSortable ui-sortable">
                <!-- Custom tabs (Charts with tabs)-->
                <div class="nav-tabs-custom" style="cursor: move;">
                    <!-- Tabs within a box -->
                    <ul class="nav nav-tabs pull-right ui-sortable-handle">
                        <li class="active"><a href="#revenue-chart" data-toggle="tab">Area</a></li>
                        <li><a href="#sales-chart" data-toggle="tab">Donut</a></li>
                        <li class="pull-left header"><i class="fa fa-inbox"></i> Sales</li>
                    </ul>
                    <div class="tab-content no-padding">
                        <!-- Morris chart - Sales -->
                        <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"><svg height="300" version="1.1" width="909.75" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="overflow: hidden; position: relative;"><desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël 2.2.0</desc><defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs><text x="49.515625" y="261" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">0</tspan></text><path fill="none" stroke="#aaaaaa" d="M62.015625,261H884.75" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="49.515625" y="202" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">7,500</tspan></text><path fill="none" stroke="#aaaaaa" d="M62.015625,202H884.75" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="49.515625" y="143" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">15,000</tspan></text><path fill="none" stroke="#aaaaaa" d="M62.015625,143H884.75" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="49.515625" y="84.00000000000003" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4.000000000000028" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">22,500</tspan></text><path fill="none" stroke="#aaaaaa" d="M62.015625,84.00000000000003H884.75" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="49.515625" y="25.00000000000003" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4.000000000000028" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">30,000</tspan></text><path fill="none" stroke="#aaaaaa" d="M62.015625,25.00000000000003H884.75" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="733.7987355710815" y="273.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,7)"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2013</tspan></text><text x="367.9168628493317" y="273.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,7)"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2012</tspan></text><path fill="#74a5c2" stroke="none" d="M62.015625,219.05493333333334C85.00820170109355,219.56626666666668,130.9933551032807,222.62345,153.98593180437425,221.10026666666667C176.9785085054678,219.57708333333335,222.96366190765494,209.1355825136612,245.9562386087485,206.86946666666668C268.69889599787365,204.6279825136612,314.18421077612396,204.88215,336.9268681652491,203.06986666666666C359.6695255543743,201.25758333333332,405.1548403326246,194.9129178506375,427.89749772174974,192.3712C450.8900744228433,189.80155118397084,496.87522782503044,182.51721666666668,519.867804526124,182.6244C542.8603812272175,182.73158333333333,588.8455346294047,204.18057122040074,611.8381113304982,193.22866666666667C634.5807687196234,182.39580455373405,680.0660834978737,101.94395359116025,702.8087408869989,95.48533333333336C725.3014789641556,89.09768692449359,770.286955118469,135.1380230769231,792.7796931956258,141.8436C815.7722698967193,148.69818974358975,861.7574232989066,147.7554,884.7500000000001,149.726L884.7500000000001,261L62.015625,261Z" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></path><path fill="none" stroke="#3c8dbc" d="M62.015625,219.05493333333334C85.00820170109355,219.56626666666668,130.9933551032807,222.62345,153.98593180437425,221.10026666666667C176.9785085054678,219.57708333333335,222.96366190765494,209.1355825136612,245.9562386087485,206.86946666666668C268.69889599787365,204.6279825136612,314.18421077612396,204.88215,336.9268681652491,203.06986666666666C359.6695255543743,201.25758333333332,405.1548403326246,194.9129178506375,427.89749772174974,192.3712C450.8900744228433,189.80155118397084,496.87522782503044,182.51721666666668,519.867804526124,182.6244C542.8603812272175,182.73158333333333,588.8455346294047,204.18057122040074,611.8381113304982,193.22866666666667C634.5807687196234,182.39580455373405,680.0660834978737,101.94395359116025,702.8087408869989,95.48533333333336C725.3014789641556,89.09768692449359,770.286955118469,135.1380230769231,792.7796931956258,141.8436C815.7722698967193,148.69818974358975,861.7574232989066,147.7554,884.7500000000001,149.726" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><circle cx="62.015625" cy="219.05493333333334" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="153.98593180437425" cy="221.10026666666667" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="245.9562386087485" cy="206.86946666666668" r="7" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="336.9268681652491" cy="203.06986666666666" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="427.89749772174974" cy="192.3712" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="519.867804526124" cy="182.6244" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="611.8381113304982" cy="193.22866666666667" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="702.8087408869989" cy="95.48533333333336" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="792.7796931956258" cy="141.8436" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="884.7500000000001" cy="149.726" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><path fill="#eaf3f6" stroke="none" d="M62.015625,240.02746666666667C85.00820170109355,239.8072,130.9933551032807,241.35496666666666,153.98593180437425,239.1464C176.9785085054678,236.93783333333334,222.96366190765494,223.33676429872497,245.9562386087485,222.35893333333334C268.69889599787365,221.39173096539162,314.18421077612396,233.23263333333333,336.9268681652491,231.36626666666666C359.6695255543743,229.4999,405.1548403326246,209.2890577413479,427.89749772174974,207.428C450.8900744228433,205.54649107468123,496.87522782503044,214.43916666666667,519.867804526124,216.39600000000002C542.8603812272175,218.35283333333334,588.8455346294047,232.37947613843352,611.8381113304982,223.08266666666668C634.5807687196234,213.88690947176687,680.0660834978737,148.22682412523022,702.8087408869989,142.42573333333334C725.3014789641556,136.6883907918969,770.286955118469,170.47037838827842,792.7796931956258,176.92893333333336C815.7722698967193,183.53101172161175,861.7574232989066,190.23343333333335,884.7500000000001,194.66826666666668L884.7500000000001,261L62.015625,261Z" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></path><path fill="none" stroke="#a0d0e0" d="M62.015625,240.02746666666667C85.00820170109355,239.8072,130.9933551032807,241.35496666666666,153.98593180437425,239.1464C176.9785085054678,236.93783333333334,222.96366190765494,223.33676429872497,245.9562386087485,222.35893333333334C268.69889599787365,221.39173096539162,314.18421077612396,233.23263333333333,336.9268681652491,231.36626666666666C359.6695255543743,229.4999,405.1548403326246,209.2890577413479,427.89749772174974,207.428C450.8900744228433,205.54649107468123,496.87522782503044,214.43916666666667,519.867804526124,216.39600000000002C542.8603812272175,218.35283333333334,588.8455346294047,232.37947613843352,611.8381113304982,223.08266666666668C634.5807687196234,213.88690947176687,680.0660834978737,148.22682412523022,702.8087408869989,142.42573333333334C725.3014789641556,136.6883907918969,770.286955118469,170.47037838827842,792.7796931956258,176.92893333333336C815.7722698967193,183.53101172161175,861.7574232989066,190.23343333333335,884.7500000000001,194.66826666666668" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><circle cx="62.015625" cy="240.02746666666667" r="4" fill="#a0d0e0" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="153.98593180437425" cy="239.1464" r="4" fill="#a0d0e0" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="245.9562386087485" cy="222.35893333333334" r="7" fill="#a0d0e0" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="336.9268681652491" cy="231.36626666666666" r="4" fill="#a0d0e0" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="427.89749772174974" cy="207.428" r="4" fill="#a0d0e0" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="519.867804526124" cy="216.39600000000002" r="4" fill="#a0d0e0" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="611.8381113304982" cy="223.08266666666668" r="4" fill="#a0d0e0" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="702.8087408869989" cy="142.42573333333334" r="4" fill="#a0d0e0" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="792.7796931956258" cy="176.92893333333336" r="4" fill="#a0d0e0" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="884.7500000000001" cy="194.66826666666668" r="4" fill="#a0d0e0" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle></svg><div class="morris-hover morris-default-style" style="left: 202.933px; top: 136px;"><div class="morris-hover-row-label">2011 Q3</div><div class="morris-hover-point" style="color: #a0d0e0">
                                    Item 1:
                                    4,912
                                </div><div class="morris-hover-point" style="color: #3c8dbc">
                                    Item 2:
                                    1,969
                                </div></div></div>
                        <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"><svg height="300" version="1.1" width="939.75" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="overflow: hidden; position: relative;"><desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël 2.2.0</desc><defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs><path fill="none" stroke="#3c8dbc" d="M469.875,243.33333333333331A93.33333333333333,93.33333333333333,0,0,0,558.102755194977,180.44625304313007" stroke-width="2" opacity="0" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 0;"></path><path fill="#3c8dbc" stroke="#ffffff" d="M469.875,246.33333333333331A96.33333333333333,96.33333333333333,0,0,0,560.9386473262442,181.4248826052307L597.4901459070204,194.03833029452744A135,135,0,0,1,469.875,285Z" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><path fill="none" stroke="#f56954" d="M558.102755194977,180.44625304313007A93.33333333333333,93.33333333333333,0,0,0,386.15984627831415,108.73398312817662" stroke-width="2" opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 1;"></path><path fill="#f56954" stroke="#ffffff" d="M560.9386473262442,181.4248826052307A96.33333333333333,96.33333333333333,0,0,0,383.46900205154566,107.40757544301087L344.30226941747117,88.10097469226493A140,140,0,0,1,602.2166327924656,195.6693795646951Z" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><path fill="none" stroke="#00a65a" d="M386.15984627831415,108.73398312817662A93.33333333333333,93.33333333333333,0,0,0,469.84567846904883,243.333328727518" stroke-width="2" opacity="0" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 0;"></path><path fill="#00a65a" stroke="#ffffff" d="M383.46900205154566,107.40757544301087A96.33333333333333,96.33333333333333,0,0,0,469.84473599126824,246.3333285794739L469.8325884998742,284.9999933380171A135,135,0,0,1,348.7870097954186,90.31165416754118Z" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="469.875" y="140" text-anchor="middle" font-family="&quot;Arial&quot;" font-size="15px" stroke="none" fill="#000000" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: Arial; font-size: 15px; font-weight: 800;" font-weight="800" transform="matrix(1,0,0,1,0,0)"><tspan dy="140" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">In-Store Sales</tspan></text><text x="469.875" y="160" text-anchor="middle" font-family="&quot;Arial&quot;" font-size="14px" stroke="none" fill="#000000" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: Arial; font-size: 14px;" transform="matrix(1,0,0,1,0,0)"><tspan dy="160" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">30</tspan></text></svg></div>
                    </div>
                </div>
                <!-- /.nav-tabs-custom -->







            </section>
            <!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <section class="col-lg-5 connectedSortable ui-sortable">



                <!-- solid sales graph -->
                <div class="box box-solid bg-teal-gradient">
                    <div class="box-header ui-sortable-handle" style="cursor: move;">
                        <i class="fa fa-th"></i>

                        <h3 class="box-title">Sales Graph</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn bg-teal btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn bg-teal btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body border-radius-none">
                        <div class="chart" id="line-chart" style="height: 250px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"><svg height="250" version="1.1" width="621.25" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="overflow: hidden; position: relative; left: -0.75px; top: -0.59375px;"><desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël 2.2.0</desc><defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs><text x="41" y="214" text-anchor="end" font-family="Open Sans" font-size="10px" stroke="none" fill="#ffffff" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: &quot;Open Sans&quot;; font-size: 10px; font-weight: normal;" font-weight="normal"><tspan dy="3.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">0</tspan></text><path fill="none" stroke="#efefef" d="M53.5,214H596.25" stroke-width="0.4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="41" y="166.75" text-anchor="end" font-family="Open Sans" font-size="10px" stroke="none" fill="#ffffff" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: &quot;Open Sans&quot;; font-size: 10px; font-weight: normal;" font-weight="normal"><tspan dy="3.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">5,000</tspan></text><path fill="none" stroke="#efefef" d="M53.5,166.75H596.25" stroke-width="0.4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="41" y="119.5" text-anchor="end" font-family="Open Sans" font-size="10px" stroke="none" fill="#ffffff" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: &quot;Open Sans&quot;; font-size: 10px; font-weight: normal;" font-weight="normal"><tspan dy="3.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">10,000</tspan></text><path fill="none" stroke="#efefef" d="M53.5,119.5H596.25" stroke-width="0.4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="41" y="72.25" text-anchor="end" font-family="Open Sans" font-size="10px" stroke="none" fill="#ffffff" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: &quot;Open Sans&quot;; font-size: 10px; font-weight: normal;" font-weight="normal"><tspan dy="3.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">15,000</tspan></text><path fill="none" stroke="#efefef" d="M53.5,72.25H596.25" stroke-width="0.4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="41" y="25" text-anchor="end" font-family="Open Sans" font-size="10px" stroke="none" fill="#ffffff" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: &quot;Open Sans&quot;; font-size: 10px; font-weight: normal;" font-weight="normal"><tspan dy="3.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">20,000</tspan></text><path fill="none" stroke="#efefef" d="M53.5,25H596.25" stroke-width="0.4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="496.66889428918586" y="226.5" text-anchor="middle" font-family="Open Sans" font-size="10px" stroke="none" fill="#ffffff" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: &quot;Open Sans&quot;; font-size: 10px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,5.5)"><tspan dy="3.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2013</tspan></text><text x="255.30012150668284" y="226.5" text-anchor="middle" font-family="Open Sans" font-size="10px" stroke="none" fill="#ffffff" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: &quot;Open Sans&quot;; font-size: 10px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,5.5)"><tspan dy="3.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2012</tspan></text><path fill="none" stroke="#efefef" d="M53.5,188.8063C68.6679829890644,188.5417,99.0039489671932,190.4009875,114.1719319562576,187.74790000000002C129.339914945322,185.09481250000002,159.6758809234508,168.75624016393445,174.8438639125152,167.5816C189.84697752126368,166.41972766393442,219.8532047387606,180.6438625,234.8563183475091,178.40185C249.8594319562576,176.15983749999998,279.8656591737545,151.8811350409836,294.868772782503,149.6455C310.0367557715674,147.3852975409836,340.3727217496962,158.0678125,355.5407047387606,160.4185C370.708687727825,162.7691875,401.0446537059538,179.61898934426227,416.2126366950182,168.451C431.2157503037667,157.40440184426228,461.2219775212636,78.52883321823204,476.2250911300121,71.56015C491.0633353584447,64.66804571823204,520.7398238153098,105.24937403846154,535.5780680437424,113.00785C550.7460510328068,120.93873653846154,581.0820170109356,128.9901625,596.25,134.3176" stroke-width="2" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><circle cx="53.5" cy="188.8063" r="4" fill="#efefef" stroke="#efefef" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="114.1719319562576" cy="187.74790000000002" r="4" fill="#efefef" stroke="#efefef" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="174.8438639125152" cy="167.5816" r="4" fill="#efefef" stroke="#efefef" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="234.8563183475091" cy="178.40185" r="4" fill="#efefef" stroke="#efefef" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="294.868772782503" cy="149.6455" r="4" fill="#efefef" stroke="#efefef" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="355.5407047387606" cy="160.4185" r="4" fill="#efefef" stroke="#efefef" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="416.2126366950182" cy="168.451" r="4" fill="#efefef" stroke="#efefef" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="476.2250911300121" cy="71.56015" r="4" fill="#efefef" stroke="#efefef" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="535.5780680437424" cy="113.00785" r="4" fill="#efefef" stroke="#efefef" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="596.25" cy="134.3176" r="4" fill="#efefef" stroke="#efefef" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle></svg><div class="morris-hover morris-default-style" style="display: none;"></div></div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer no-border">
                        <div class="row">
                            <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                                <div style="display:inline;width:60px;height:60px;"><canvas width="60" height="60"></canvas><input type="text" class="knob" data-readonly="true" value="20" data-width="60" data-height="60" data-fgcolor="#39CCCC" readonly="readonly" style="width: 34px; height: 20px; position: absolute; vertical-align: middle; margin-top: 20px; margin-left: -47px; border: 0px; background: none; font-style: normal; font-variant: normal; font-weight: bold; font-stretch: normal; font-size: 12px; line-height: normal; font-family: Arial; text-align: center; color: rgb(57, 204, 204); padding: 0px; -webkit-appearance: none;"></div>

                                <div class="knob-label">Mail-Orders</div>
                            </div>
                            <!-- ./col -->
                            <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                                <div style="display:inline;width:60px;height:60px;"><canvas width="60" height="60"></canvas><input type="text" class="knob" data-readonly="true" value="50" data-width="60" data-height="60" data-fgcolor="#39CCCC" readonly="readonly" style="width: 34px; height: 20px; position: absolute; vertical-align: middle; margin-top: 20px; margin-left: -47px; border: 0px; background: none; font-style: normal; font-variant: normal; font-weight: bold; font-stretch: normal; font-size: 12px; line-height: normal; font-family: Arial; text-align: center; color: rgb(57, 204, 204); padding: 0px; -webkit-appearance: none;"></div>

                                <div class="knob-label">Online</div>
                            </div>
                            <!-- ./col -->
                            <div class="col-xs-4 text-center">
                                <div style="display:inline;width:60px;height:60px;"><canvas width="60" height="60"></canvas><input type="text" class="knob" data-readonly="true" value="30" data-width="60" data-height="60" data-fgcolor="#39CCCC" readonly="readonly" style="width: 34px; height: 20px; position: absolute; vertical-align: middle; margin-top: 20px; margin-left: -47px; border: 0px; background: none; font-style: normal; font-variant: normal; font-weight: bold; font-stretch: normal; font-size: 12px; line-height: normal; font-family: Arial; text-align: center; color: rgb(57, 204, 204); padding: 0px; -webkit-appearance: none;"></div>

                                <div class="knob-label">In-Store</div>
                            </div>
                            <!-- ./col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-footer -->
                </div>
                <!-- /.box -->

                <!-- Calendar -->
                <div class="box box-solid bg-green-gradient">
                    <div class="box-header ui-sortable-handle" style="cursor: move;">
                        <i class="fa fa-calendar"></i>

                        <h3 class="box-title">Calendar</h3>
                        <!-- tools box -->
                        <div class="pull-right box-tools">
                            <!-- button with a dropdown -->
                            <div class="btn-group">
                                <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-bars"></i></button>
                                <ul class="dropdown-menu pull-right" role="menu">
                                    <li><a href="#">Add new event</a></li>
                                    <li><a href="#">Clear events</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">View calendar</a></li>
                                </ul>
                            </div>
                            <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                            </button>
                        </div>
                        <!-- /. tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <!--The calendar -->
                        <div id="calendar" style="width: 100%"><div class="datepicker datepicker-inline"><div class="datepicker-days" style=""><table class="table-condensed"><thead><tr><th colspan="7" class="datepicker-title" style="display: none;"></th></tr><tr><th class="prev">«</th><th colspan="5" class="datepicker-switch">February 2018</th><th class="next">»</th></tr><tr><th class="dow">Su</th><th class="dow">Mo</th><th class="dow">Tu</th><th class="dow">We</th><th class="dow">Th</th><th class="dow">Fr</th><th class="dow">Sa</th></tr></thead><tbody><tr><td class="old day" data-date="1517097600000">28</td><td class="old day" data-date="1517184000000">29</td><td class="old day" data-date="1517270400000">30</td><td class="old day" data-date="1517356800000">31</td><td class="day" data-date="1517443200000">1</td><td class="day" data-date="1517529600000">2</td><td class="day" data-date="1517616000000">3</td></tr><tr><td class="day" data-date="1517702400000">4</td><td class="day" data-date="1517788800000">5</td><td class="day" data-date="1517875200000">6</td><td class="day" data-date="1517961600000">7</td><td class="day" data-date="1518048000000">8</td><td class="day" data-date="1518134400000">9</td><td class="day" data-date="1518220800000">10</td></tr><tr><td class="day" data-date="1518307200000">11</td><td class="day" data-date="1518393600000">12</td><td class="day" data-date="1518480000000">13</td><td class="day" data-date="1518566400000">14</td><td class="day" data-date="1518652800000">15</td><td class="day" data-date="1518739200000">16</td><td class="day" data-date="1518825600000">17</td></tr><tr><td class="day" data-date="1518912000000">18</td><td class="day" data-date="1518998400000">19</td><td class="day" data-date="1519084800000">20</td><td class="day" data-date="1519171200000">21</td><td class="day" data-date="1519257600000">22</td><td class="day" data-date="1519344000000">23</td><td class="day" data-date="1519430400000">24</td></tr><tr><td class="day" data-date="1519516800000">25</td><td class="day" data-date="1519603200000">26</td><td class="day" data-date="1519689600000">27</td><td class="day" data-date="1519776000000">28</td><td class="new day" data-date="1519862400000">1</td><td class="new day" data-date="1519948800000">2</td><td class="new day" data-date="1520035200000">3</td></tr><tr><td class="new day" data-date="1520121600000">4</td><td class="new day" data-date="1520208000000">5</td><td class="new day" data-date="1520294400000">6</td><td class="new day" data-date="1520380800000">7</td><td class="new day" data-date="1520467200000">8</td><td class="new day" data-date="1520553600000">9</td><td class="new day" data-date="1520640000000">10</td></tr></tbody><tfoot><tr><th colspan="7" class="today" style="display: none;">Today</th></tr><tr><th colspan="7" class="clear" style="display: none;">Clear</th></tr></tfoot></table></div><div class="datepicker-months" style="display: none;"><table class="table-condensed"><thead><tr><th colspan="7" class="datepicker-title" style="display: none;"></th></tr><tr><th class="prev">«</th><th colspan="5" class="datepicker-switch">2018</th><th class="next">»</th></tr></thead><tbody><tr><td colspan="7"><span class="month">Jan</span><span class="month focused">Feb</span><span class="month">Mar</span><span class="month">Apr</span><span class="month">May</span><span class="month">Jun</span><span class="month">Jul</span><span class="month">Aug</span><span class="month">Sep</span><span class="month">Oct</span><span class="month">Nov</span><span class="month">Dec</span></td></tr></tbody><tfoot><tr><th colspan="7" class="today" style="display: none;">Today</th></tr><tr><th colspan="7" class="clear" style="display: none;">Clear</th></tr></tfoot></table></div><div class="datepicker-years" style="display: none;"><table class="table-condensed"><thead><tr><th colspan="7" class="datepicker-title" style="display: none;"></th></tr><tr><th class="prev">«</th><th colspan="5" class="datepicker-switch">2010-2019</th><th class="next">»</th></tr></thead><tbody><tr><td colspan="7"><span class="year old">2009</span><span class="year">2010</span><span class="year">2011</span><span class="year">2012</span><span class="year">2013</span><span class="year">2014</span><span class="year">2015</span><span class="year">2016</span><span class="year">2017</span><span class="year focused">2018</span><span class="year">2019</span><span class="year new">2020</span></td></tr></tbody><tfoot><tr><th colspan="7" class="today" style="display: none;">Today</th></tr><tr><th colspan="7" class="clear" style="display: none;">Clear</th></tr></tfoot></table></div><div class="datepicker-decades" style="display: none;"><table class="table-condensed"><thead><tr><th colspan="7" class="datepicker-title" style="display: none;"></th></tr><tr><th class="prev">«</th><th colspan="5" class="datepicker-switch">2000-2090</th><th class="next">»</th></tr></thead><tbody><tr><td colspan="7"><span class="decade old">1990</span><span class="decade">2000</span><span class="decade focused">2010</span><span class="decade">2020</span><span class="decade">2030</span><span class="decade">2040</span><span class="decade">2050</span><span class="decade">2060</span><span class="decade">2070</span><span class="decade">2080</span><span class="decade">2090</span><span class="decade new">2100</span></td></tr></tbody><tfoot><tr><th colspan="7" class="today" style="display: none;">Today</th></tr><tr><th colspan="7" class="clear" style="display: none;">Clear</th></tr></tfoot></table></div><div class="datepicker-centuries" style="display: none;"><table class="table-condensed"><thead><tr><th colspan="7" class="datepicker-title" style="display: none;"></th></tr><tr><th class="prev">«</th><th colspan="5" class="datepicker-switch">2000-2900</th><th class="next">»</th></tr></thead><tbody><tr><td colspan="7"><span class="century old">1900</span><span class="century focused">2000</span><span class="century">2100</span><span class="century">2200</span><span class="century">2300</span><span class="century">2400</span><span class="century">2500</span><span class="century">2600</span><span class="century">2700</span><span class="century">2800</span><span class="century">2900</span><span class="century new">3000</span></td></tr></tbody><tfoot><tr><th colspan="7" class="today" style="display: none;">Today</th></tr><tr><th colspan="7" class="clear" style="display: none;">Clear</th></tr></tfoot></table></div></div></div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer text-black">
                        <div class="row">
                            <div class="col-sm-6">
                                <!-- Progress bars -->
                                <div class="clearfix">
                                    <span class="pull-left">Task #1</span>
                                    <small class="pull-right">90%</small>
                                </div>
                                <div class="progress xs">
                                    <div class="progress-bar progress-bar-green" style="width: 90%;"></div>
                                </div>

                                <div class="clearfix">
                                    <span class="pull-left">Task #2</span>
                                    <small class="pull-right">70%</small>
                                </div>
                                <div class="progress xs">
                                    <div class="progress-bar progress-bar-green" style="width: 70%;"></div>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-6">
                                <div class="clearfix">
                                    <span class="pull-left">Task #3</span>
                                    <small class="pull-right">60%</small>
                                </div>
                                <div class="progress xs">
                                    <div class="progress-bar progress-bar-green" style="width: 60%;"></div>
                                </div>

                                <div class="clearfix">
                                    <span class="pull-left">Task #4</span>
                                    <small class="pull-right">40%</small>
                                </div>
                                <div class="progress xs">
                                    <div class="progress-bar progress-bar-green" style="width: 40%;"></div>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                </div>
                <!-- /.box -->

            </section>
            <!-- right col -->
        </div>
        <!-- /.box -->

    </section>

@stop