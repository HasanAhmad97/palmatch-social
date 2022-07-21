@extends(admin_layout_vw().'.index')

@section('css')
    <link href="{{url(assets('admin'))}}/global/plugins/datatables/datatables.min.css" rel="stylesheet"
          type="text/css"/>
    <link href="{{url(assets('admin'))}}/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css"
          rel="stylesheet" type="text/css"/>
    <link href="{{url(assets('admin'))}}/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css"
          rel="stylesheet"
          type="text/css"/>
    <link href="{{url(assets('admin'))}}/global/plugins/morris/morris.css" rel="stylesheet" type="text/css"/>
    <link href="{{url(assets('admin'))}}/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet"
          type="text/css"/>
    <link href="{{url(assets('admin'))}}/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css"/>
    <link href="{{url(assets('admin'))}}/layouts/layout2/css/layout.min.css" rel="stylesheet" type="text/css" />
    <link href="{{url(assets('admin'))}}/layouts/layout2/css/themes/blue.min.css" rel="stylesheet" type="text/css" id="style_color" />
    <link href="{{url(assets('admin'))}}/layouts/layout2/css/custom.min.css" rel="stylesheet" type="text/css" />



@endsection
@section('content')

    <div class="page-content">

{{--        <div class="page-bar">--}}
{{--            <div class="page-toolbar">--}}
{{--                <a href="javascript:;" style="margin: 4px;" onclick="init(0);" class="btn btn-info"><i--}}
{{--                        class="fa fa-check"></i>--}}
{{--                    Reset Filter</a>--}}
{{--                <div id="dashboard-report-range" class="pull-right tooltips btn btn-fit-height green"--}}
{{--                     data-placement="top"--}}
{{--                     data-original-title="Change dashboard date range">--}}
{{--                    <i class="icon-calendar"></i>&nbsp;--}}
{{--                    <span class="thin uppercase hidden-xs"></span>&nbsp;--}}
{{--                    <i class="fa fa-angle-down"></i>--}}
{{--                </div>--}}

{{--            </div>--}}
{{--        </div>--}}
        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                <div class="dashboard-stat2 ">
                    <div class="display">
                        <div class="number">
                            <h3 class="font-red-haze">
                                <span data-counter="counterup" id="requests_num"
                                      data-value="{{$users ?? 0}}"></span>
                            </h3>
                            <small>Users</small>
                        </div>
                        <div class="icon">
                            <i class="icon-user"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                <div class="dashboard-stat2 ">
                    <div class="display">
                        <div class="number">
                            <h3 class="font-blue-sharp">
                                <span data-counter="counterup" id="talents_num"
                                      data-value="{{$usersSubscription ?? 0}}"></span>
                            </h3>
                            <small>Users Subscriptions</small>
                        </div>
                        <div class="icon">
                            <i class="icon-layers"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                <div class="dashboard-stat2 ">
                    <div class="display">
                        <div class="number">
                            <h3 class="font-blue-sharp">
                                <span data-counter="counterup" id="talents_num"
                                      data-value="{{$requests_num ?? 0}}"></span>
                            </h3>
                            <small>Conversations</small>
                        </div>
                        <div class="icon">
                            <i class="icon-bubbles"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                <div class="dashboard-stat2 ">
                    <div class="display">
                        <div class="number">
                            <h3 class="font-purple-soft">$
                                <span data-counter="counterup" id="clients_num"
                                      data-value="{{$userSubscriptionPayments ?? 0}}"></span>
                            </h3>
                            <small>Subscriptions Payments</small>
                        </div>
                        <div class="icon">
                            <i class="icon-credit-card"></i>
                            {{--                            <i class="icon-badge"></i>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 col-xs-12 col-sm-12">
                <!-- BEGIN PORTLET-->
                <div class="portlet light ">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-bar-chart font-dark hide"></i>
                            <span class="caption-subject font-dark bold uppercase">Registered Users</span>
                            <span class="caption-helper">daily stats...</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div id="site_statistics_loading">
                            <img src="{{url(assets('admin'))}}/global/img/loading.gif" alt="loading" /> </div>
                        <div id="site_statistics_content" class="display-none">
                            <div id="site_statistics" class="chart"> </div>
                        </div>
                    </div>
                </div>
                <!-- END PORTLET-->
            </div>
            <div class="col-lg-6 col-xs-12 col-sm-12">
                <!-- BEGIN PORTLET-->
                <div class="portlet light ">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-share font-red-sunglo hide"></i>
                            <span class="caption-subject font-dark bold uppercase">Subscriptions Payments</span>
                            <span class="caption-helper">monthly stats...</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div id="site_activities_loading">
                            <img src="{{url(assets('admin'))}}/global/img/loading.gif" alt="loading" /> </div>
                        <div id="site_activities_content" class="display-none">
                            <div id="site_activities" style="height: 228px;"> </div>
                        </div>
                        <div style="margin: 20px 0 10px 30px">
                            <div class="row">
                                <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                                    <span class="label label-sm label-success"> Revenue: </span>
                                    <h3>${{$userSubscriptionPayments ?? 0}}</h3>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                                    <span class="label label-sm label-warning"> Orders: </span>
                                    <h3>{{ $numberOfUserSubscriptionPayments }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END PORTLET-->
            </div>
        </div>
    </div>

@endsection
@section('js')
    <style>
        /* rotate the x axis labels. */
        .flot-x-axis div {
            /*white-space: nowrap;*/
            transform: rotate(-45deg);
            /*text-indent: -100%;*/
            /*transform-origin: top center;*/
            /*text-align: right !important;*/
            /*top: 200px !important;*/
        }
    </style>
    <script src="{{url(assets('admin'))}}/global/plugins/moment.min.js" type="text/javascript"></script>
    <script src="{{url(assets('admin'))}}/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js"
            type="text/javascript"></script>
    <script src="{{url(assets('admin'))}}/global/plugins/morris/morris.min.js" type="text/javascript"></script>
    <script src="{{url(assets('admin'))}}/global/plugins/morris/raphael-min.js" type="text/javascript"></script>
    <script src="{{url(assets('admin'))}}/global/plugins/counterup/jquery.waypoints.min.js"
            type="text/javascript"></script>
    <script src="{{url(assets('admin'))}}/global/plugins/counterup/jquery.counterup.min.js"
            type="text/javascript"></script>
    <script src="{{url(assets('admin'))}}/global/plugins/amcharts/amcharts/amcharts.js" type="text/javascript"></script>
    <script src="{{url(assets('admin'))}}/global/plugins/amcharts/amcharts/serial.js" type="text/javascript"></script>
    <script src="{{url(assets('admin'))}}/global/plugins/amcharts/amcharts/pie.js" type="text/javascript"></script>
    <script src="{{url(assets('admin'))}}/global/plugins/amcharts/amcharts/radar.js" type="text/javascript"></script>
    <script src="{{url(assets('admin'))}}/global/plugins/amcharts/amcharts/themes/light.js"
            type="text/javascript"></script>
    <script src="{{url(assets('admin'))}}/global/plugins/amcharts/amcharts/themes/patterns.js"
            type="text/javascript"></script>
    <script src="{{url(assets('admin'))}}/global/plugins/amcharts/amcharts/themes/chalk.js"
            type="text/javascript"></script>
    <script src="{{url(assets('admin'))}}/global/plugins/amcharts/ammap/ammap.js" type="text/javascript"></script>
    <script src="{{url(assets('admin'))}}/global/plugins/amcharts/ammap/maps/js/worldLow.js"
            type="text/javascript"></script>
    <script src="{{url(assets('admin'))}}/global/plugins/amcharts/amstockcharts/amstock.js"
            type="text/javascript"></script>
    <script src="{{url(assets('admin'))}}/global/plugins/fullcalendar/fullcalendar.min.js"
            type="text/javascript"></script>
    <script src="{{url(assets('admin'))}}/global/plugins/horizontal-timeline/horizontal-timeline.js"
            type="text/javascript"></script>
    <script src="{{url(assets('admin'))}}/global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
    <script src="{{url(assets('admin'))}}/global/plugins/flot/jquery.flot.resize.min.js"
            type="text/javascript"></script>
    <script src="{{url(assets('admin'))}}/global/plugins/flot/jquery.flot.categories.min.js"
            type="text/javascript"></script>
    <script src="{{url(assets('admin'))}}/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js"
            type="text/javascript"></script>
    <script src="{{url(assets('admin'))}}/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
    <script src="{{url(assets('admin'))}}/global/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
    <script src="{{url(assets('admin'))}}/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js"
            type="text/javascript"></script>
    <script src="{{url(assets('admin'))}}/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js"
            type="text/javascript"></script>
    <script src="{{url(assets('admin'))}}/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js"
            type="text/javascript"></script>
    <script src="{{url(assets('admin'))}}/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js"
            type="text/javascript"></script>
    <script src="{{url(assets('admin'))}}/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js"
            type="text/javascript"></script>
    <script src="{{url(assets('admin'))}}/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js"
            type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->

    <script src="{{url(assets('admin'))}}/global/scripts/datatable.js" type="text/javascript"></script>
    <script src="{{url(assets('admin'))}}/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
    <script src="{{url(assets('admin'))}}/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js"
            type="text/javascript"></script>
    <!-- BEGIN THEME GLOBAL SCRIPTS -->
    <script src="{{url(assets('admin'))}}/global/scripts/app.min.js" type="text/javascript"></script>
    <!-- END THEME GLOBAL SCRIPTS -->
    <script src="{{url(assets('admin'))}}/pages/scripts/table-datatables-responsive.min.js"
            type="text/javascript"></script>

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{url(assets('admin'))}}/pages/scripts/dashboard.min.js" type="text/javascript"></script>
    <script src="{{url(assets('admin'))}}/pages/scripts/dashboard.js" type="text/javascript"></script>
    <script src="{{url(assets('admin'))}}/js/users.js" type="text/javascript"></script>

    <script>
        $(document).ready(function () {
            init(0);
            $(document).on('click', '.applyBtn,.ranges li', function () {
                init(1);
            });
        });

        function init(flag) {
            if (flag) {
                var DELIVERABLE_DATE_F = $("input[name='daterangepicker_start']").val();
                var DELIVERABLE_DATE_T = $("input[name='daterangepicker_end']").val();
            } else {
                var DELIVERABLE_DATE_F = null;
                var DELIVERABLE_DATE_T = null;
            }
            var t1 = [];
            var t2 = [];
            var t3 = [];
            var t4 = [];

            $.ajax({
                url: baseURL + '/dashboard-stats',
                type: 'POST',
                dataType: 'json',
                data: {
                    _token: csrf_token,
                    DELIVERABLE_DATE_F: DELIVERABLE_DATE_F,
                    DELIVERABLE_DATE_T: DELIVERABLE_DATE_T
                },
                success: function (data) {
                    $('#clients_num').text(data.items.clients_num);
                    $('#requests_num').text(data.items.requests_num);
                    $('#talents_num').text(data.items.talents_num);
                }
            });


            if (0 != $("#site_request_dates").size()) {

                $.ajax({
                    url: baseURL + '/requests-stats',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        _token: csrf_token,
                        type: 1,
                        DELIVERABLE_DATE_F: DELIVERABLE_DATE_F,
                        DELIVERABLE_DATE_T: DELIVERABLE_DATE_T
                    },
                    success: function (data) {

                        $.each(data.items, function (i, v) {
                            t1.push([v.daily, v.count]);
                        });
                        $("#site_request_dates_loading").hide(), $("#site_request_dates_content").show();
                        var a = ($.plot($("#site_request_dates"), [{
                            data: t1,
                            lines: {fill: .6, lineWidth: 0},
                            color: ["#f89f9f"]
                        }, {
                            data: t1,
                            points: {show: !0, fill: !0, radius: 5, fillColor: "#f89f9f", lineWidth: 3},
                            color: "#fff",
                            shadowSize: 0
                        }], {
                            xaxis: {
                                tickLength: 0,
                                tickDecimals: 0,
                                mode: "categories",
                                min: 0,
                                font: {lineHeight: 14, style: "normal", variant: "small-caps", color: "#6F7B8A"}
                            },
                            yaxis: {
                                ticks: 5,
                                tickDecimals: 0,
                                tickColor: "#eee",
                                font: {lineHeight: 14, style: "normal", variant: "small-caps", color: "#6F7B8A"}
                            },
                            grid: {
                                hoverable: !0,
                                clickable: !0,
                                tickColor: "#eee",
                                borderColor: "#eee",
                                borderWidth: 1
                            }
                        }), null);
                        $("#site_request_dates").bind("plothover", function (t, i, l) {
                            if ($("#x").text(i.x.toFixed(2)), $("#y").text(i.y.toFixed(2)), l) {
                                if (a != l.dataIndex) {
                                    a = l.dataIndex, $("#tooltip").remove();
                                    l.datapoint[0].toFixed(2), l.datapoint[1].toFixed(2);
                                    e(l.pageX, l.pageY, l.datapoint[0], l.datapoint[1] + " counts")
                                }
                            } else $("#tooltip").remove(), a = null
                        })
                    }
                });
            }
            if (0 != $("#site_request_occasions").size()) {
                $.ajax({
                    url: baseURL + '/requests-stats',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        _token: csrf_token,
                        type: 2,
                        DELIVERABLE_DATE_F: DELIVERABLE_DATE_F,
                        DELIVERABLE_DATE_T: DELIVERABLE_DATE_T
                    },
                    success: function (data) {

                        $.each(data.items, function (i, v) {
                            t2.push([v.occasion, v.count]);
                        });
                        $("#site_request_occasions_loading").hide(), $("#site_request_occasions_content").show();
                        var a = ($.plot($("#site_request_occasions"), [{
                            data: t2,
                            lines: {fill: .6, lineWidth: 0},
                            color: ["#5C9BD1"]
                        }, {
                            data: t2,
                            points: {show: !0, fill: !0, radius: 5, fillColor: "#5C9BD1", lineWidth: 3},
                            color: "#fff",
                            shadowSize: 0
                        }], {
                            xaxis: {
                                tickLength: 0,
                                tickDecimals: 0,
                                mode: "categories",
                                min: 0,
                                font: {lineHeight: 14, style: "normal", variant: "small-caps", color: "#6F7B8A"}
                            },
                            yaxis: {
                                ticks: 5,
                                tickDecimals: 0,
                                tickColor: "#eee",
                                font: {lineHeight: 14, style: "normal", variant: "small-caps", color: "#6F7B8A"}
                            },
                            grid: {
                                hoverable: !0,
                                clickable: !0,
                                tickColor: "#eee",
                                borderColor: "#eee",
                                borderWidth: 1
                            }
                        }), null);
                        $("#site_request_occasions").bind("plothover", function (t, i, l) {
                            if ($("#x").text(i.x.toFixed(2)), $("#y").text(i.y.toFixed(2)), l) {
                                if (a != l.dataIndex) {
                                    a = l.dataIndex, $("#tooltip").remove();
                                    l.datapoint[0].toFixed(2), l.datapoint[1].toFixed(2);
                                    e(l.pageX, l.pageY, l.datapoint[0], l.datapoint[1] + " counts")
                                }
                            } else $("#tooltip").remove(), a = null
                        })

                    }
                });
            }
        }

        function e(e, t, a, i) {
            $('<div id="tooltip" class="chart-tooltip">' + i + "</div>").css({
                position: "absolute",
                display: "none",
                top: t - 40,
                left: e - 40,
                border: "0px solid #ccc",
                padding: "2px 6px",
                "background-color": "#fff"
            }).appendTo("body").fadeIn(200)
        }

        function TickGenerator(axis) {
            var res = [],
                i = Math.floor(axis.min);
            do {
                res.push([i, "some-large-string-value-" + i]);
                ++i;
            } while (i < axis.max);
            return res;
        }
    </script>

    <script>
        function showChartTooltip(x, y, xValue, yValue) {
            $('<div id="tooltip" class="chart-tooltip">' + yValue + '<\/div>').css({
                position: 'absolute',
                display: 'none',
                top: y - 40,
                left: x - 40,
                border: '0px solid #ccc',
                padding: '2px 6px',
                'background-color': '#fff'
            }).appendTo("body").fadeIn(200);
        }
        $(document).ready(function () {


            var chart = JSON.parse(`<?php echo $data['chart_data'] ?>`);

            var visitors =  chart.label ;

            if ($('#site_statistics').size() != 0) {

                $('#site_statistics_loading').hide();
                $('#site_statistics_content').show();

                var plot_statistics = $.plot($("#site_statistics"), [{
                        data: visitors.data,
                        lines: {
                            fill: 0.6,
                            lineWidth: 0
                        },
                        color: ['#f89f9f']
                    }, {
                        data: visitors.data,
                        points: {
                            show: true,
                            fill: true,
                            radius: 5,
                            fillColor: "#f89f9f",
                            lineWidth: 3
                        },
                        color: '#fff',
                        shadowSize: 0
                    }],

                    {
                        xaxis: {
                            tickLength: 0,
                            tickDecimals: 0,
                            mode: "categories",
                            min: 0,
                            font: {
                                lineHeight: 33,
                                style: "normal",
                                variant: "small-caps",
                                color: "#6F7B8A"
                            }

                        },
                        yaxis: {
                            ticks: 5,
                            tickDecimals: 0,
                            tickColor: "#eee",
                            font: {
                                lineHeight: 14,
                                style: "normal",
                                variant: "small-caps",
                                color: "#6F7B8A"
                            }
                        },
                        grid: {
                            hoverable: true,
                            clickable: true,
                            tickColor: "#eee",
                            borderColor: "#eee",
                            borderWidth: 1
                        }
                    });

                var previousPoint = null;
                $("#site_statistics").bind("plothover", function(event, pos, item) {
                    $("#x").text(pos.x.toFixed(2));
                    $("#y").text(pos.y.toFixed(2));
                    if (item) {
                        if (previousPoint != item.dataIndex) {
                            previousPoint = item.dataIndex;

                            $("#tooltip").remove();
                            var x = item.datapoint[0].toFixed(2),
                                y = item.datapoint[1].toFixed(2);

                            showChartTooltip(item.pageX, item.pageY, item.datapoint[0], item.datapoint[1] + ' visits');
                        }
                    } else {
                        $("#tooltip").remove();
                        previousPoint = null;
                    }
                });
            }



            if ($('#site_activities').size() != 0) {
                //site activities
                var previousPoint2 = null;
                $('#site_activities_loading').hide();
                $('#site_activities_content').show();
                var chartPayments = JSON.parse(`<?php echo  $payment['payment_data']?>`);

                console.log(chartPayments)
                var data1 =  chartPayments.label.data ;

                var plot_statistics = $.plot($("#site_activities"),

                    [{
                        data: data1,
                        lines: {
                            fill: 0.2,
                            lineWidth: 0,
                        },
                        color: ['#BAD9F5']
                    }, {
                        data: data1,
                        points: {
                            show: true,
                            fill: true,
                            radius: 4,
                            fillColor: "#9ACAE6",
                            lineWidth: 2
                        },
                        color: '#9ACAE6',
                        shadowSize: 1
                    }, {
                        data: data1,
                        lines: {
                            show: true,
                            fill: false,
                            lineWidth: 3
                        },
                        color: '#9ACAE6',
                        shadowSize: 0
                    }],

                    {

                        xaxis: {
                            tickLength: 0,
                            tickDecimals: 0,
                            mode: "categories",
                            min: 0,
                            font: {
                                lineHeight: 18,
                                style: "normal",
                                variant: "small-caps",
                                color: "#6F7B8A"
                            }
                        },
                        yaxis: {
                            ticks: 5,
                            tickDecimals: 0,
                            tickColor: "#eee",
                            font: {
                                lineHeight: 14,
                                style: "normal",
                                variant: "small-caps",
                                color: "#6F7B8A"
                            }
                        },
                        grid: {
                            hoverable: true,
                            clickable: true,
                            tickColor: "#eee",
                            borderColor: "#eee",
                            borderWidth: 1
                        }
                    });

                $("#site_activities").bind("plothover", function(event, pos, item) {
                    $("#x").text(pos.x.toFixed(2));
                    $("#y").text(pos.y.toFixed(2));
                    if (item) {
                        if (previousPoint2 != item.dataIndex) {
                            previousPoint2 = item.dataIndex;
                            $("#tooltip").remove();
                            var x = item.datapoint[0].toFixed(2),
                                y = item.datapoint[1].toFixed(2);
                            showChartTooltip(item.pageX, item.pageY, item.datapoint[0], item.datapoint[1] + '$');
                        }
                    }
                });

                $('#site_activities').bind("mouseleave", function() {
                    $("#tooltip").remove();
                });
            }
        });

    </script>
@stop
