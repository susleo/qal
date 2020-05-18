@extends('admin.layouts.app')

@section('content')

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="page-title">Dashboard</h2>
                            <a href="#" class="btn btn-text-secondary float-right">Get Info</a>
                            <a href="#" class="btn btn-text-danger float-right m-r-sm">Print</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="card info-card">
                                        <div class="card-body">
                                            <h5 class="card-title">Revenue</h5>
                                            <div class="info-card-text">
                                                <h3>792.8 $</h3>
                                                <span class="info-card-helper">Last Month</span>
                                            </div>
                                            <div class="info-card-icon">
                                                <i class="material-icons">trending_up</i>
                                            </div>
                                        </div>
                                        <div id="sparkline-bar"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="card info-card info-info">
                                        <div class="card-body">
                                            <h5 class="card-title">Page Views</h5>
                                            <div class="info-card-text">
                                                <h3>460.9 K</h3>
                                                <span class="info-card-helper">This Week</span>
                                            </div>
                                            <div class="info-card-icon">
                                                <i class="material-icons-outlined">remove_red_eye</i>
                                            </div>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar bg-info" role="progressbar" style="width: 45%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="card info-card info-warning">
                                        <div class="card-body">
                                            <h5 class="card-title">Sales</h5>
                                            <div class="info-card-text">
                                                <h3>570.4 K</h3>
                                                <span class="info-card-helper">From all markets</span>
                                            </div>
                                            <div class="info-card-icon">
                                                <i class="material-icons">attach_money</i>
                                            </div>
                                        </div>
                                        <div id="sparkline-line"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="card info-card info-success">
                                        <div class="card-body">
                                            <h5 class="card-title">Growth</h5>
                                            <div class="info-card-text">
                                                <h3>142,739</h3>
                                                <span class="info-card-helper">New Users</span>
                                            </div>
                                            <div class="info-card-icon">
                                                <i class="material-icons">trending_up</i>
                                            </div>
                                        </div>
                                        <div id="sparkline-bar-2"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Downloads</h5>
                                    <div class="card-info"><a href="#" class="btn btn-xs btn-text-dark"><i class="material-icons">refresh</i></a></div>
                                    <div id="dash-chart-1"><svg></svg></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Reports</h5>
                                    <div class="card-info"><a href="#" class="btn btn-xs btn-text-dark">See all</a></div>
                                    <ul class="report-list list-unstyled">
                                        <li class="report-item">
                                            <div class="report-icon"><i class="material-icons">add</i></div>
                                            <div class="report-text">Alan Grey uploaded new item
                                                <span>This item has to be reviewed, moderators will check it soon.</span>
                                            </div>
                                            <div class="report-helper">45min ago</div>
                                        </li>
                                        <li class="report-item report-info">
                                            <div class="report-icon"><i class="material-icons">code</i></div>
                                            <div class="report-text">David Crook made changes to create-invoice.js
                                                <span>57 lines of code added, 0 removals, 0 errors, 6 warnings</span>
                                            </div>
                                            <div class="report-helper">3h ago</div>
                                        </li>
                                        <li class="report-item report-danger">
                                            <div class="report-icon"><i class="material-icons">error_outline</i></div>
                                            <div class="report-text">Can't retrieve data from server
                                                <span>Server is not responding, please contact provider</span>
                                            </div>
                                            <div class="report-helper">6h ago</div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Server Load</h5>
                                    <div class="card-info"><span class="badge badge-secondary">Optimal</span></div>
                                    <div class="server-load row">
                                        <div class="server-stat col-sm-4">
                                            <p>167GB</p>
                                            <span>Usage</span>
                                        </div>
                                        <div class="server-stat col-sm-4">
                                            <p>320GB</p>
                                            <span>Space</span>
                                        </div>
                                        <div class="server-stat col-sm-4">
                                            <p>57.4%</p>
                                            <span>CPU</span>
                                        </div>
                                    </div>
                                    <div id="dash-flotchart"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            


@endsection

@section('script')
    <script src="{{asset('assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
    <script src="{{asset('assets/plugins/d3/d3.min.js')}}"></script>
    <script src="{{asset('assets/plugins/nvd3/nv.d3.min.js')}}"></script>
    <script src="{{asset('assets/plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('assets/plugins/apexcharts/dist/apexcharts.min.js')}}"></script>
    <script src="{{asset('assets/plugins/flot/jquery.flot.min.js')}}"></script>
    <script src="{{asset('assets/plugins/flot/jquery.flot.time.min.js')}}"></script>
    <script src="{{asset('assets/plugins/flot/jquery.flot.symbol.min.js')}}"></script>
    <script src="{{asset('assets/plugins/flot/jquery.flot.resize.min.js')}}"></script>
    <script src="{{asset('assets/plugins/flot/jquery.flot.tooltip.min.js')}}"></script>
    <script src="{{asset('assets/js/pages/dashboard.js')}}"></script>
    @endsection