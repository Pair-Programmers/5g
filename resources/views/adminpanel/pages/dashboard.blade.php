<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Dashboard v.2</title>

    <link href="{{asset('resources')}}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('resources')}}/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="{{asset('resources')}}/css/plugins/dataTables/datatables.min.css" rel="stylesheet">

    <link href="{{asset('resources')}}/css/animate.css" rel="stylesheet">
    <link href="{{asset('resources')}}/css/style.css" rel="stylesheet">

</head>

<body>
    <div id="wrapper">
        <?=$sidebar; ?>

        <div id="page-wrapper" class="gray-bg">
            <?=$header; ?> 
            <div class="wrapper wrapper-content">
        <div class="row">
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                {{-- <span class="label label-success pull-right">Monthly</span> --}}
                                <h5>Registered Members</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">dsa</h1>
                                {{-- <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div> --}}
                                <small>Total Registered</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                {{-- <span class="label label-info pull-right">Annual</span> --}}
                                <h5>Active Members</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">asd</h1>
                                {{-- <div class="stat-percent font-bold text-info">20% <i class="fa fa-level-up"></i></div> --}}
                                <small>Total Active (Regular Member)</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                {{-- <span class="label label-primary pull-right">Today</span> --}}
                                <h5>Inactive Members</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">asd</h1>
                                {{-- <div class="stat-percent font-bold text-navy">44% <i class="fa fa-level-up"></i></div> --}}
                                <small>Total Inactives (absent from a month)</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                {{-- <span class="label label-danger pull-right">Low value</span> --}}
                                <h5>Archive Members</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">sad</h1>
                                {{-- <div class="stat-percent font-bold text-danger">38% <i class="fa fa-level-down"></i></div> --}}
                                <small>Total Removed From GYM</small>
                            </div>
                        </div>
                    </div>


                    {{-- Fees --}}


                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                {{-- <span class="label label-success pull-right">Monthly</span> --}}
                                <h5>Paid Fees</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">asd</h1>
                                {{-- <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div> --}}
                                <small>Total income</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                {{-- <span class="label label-info pull-right">Annual</span> --}}
                                <h5>Upcoming Fees</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">asd</h1>
                                {{-- <div class="stat-percent font-bold text-info">20% <i class="fa fa-level-up"></i></div> --}}
                                <small>New orders</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                {{-- <span class="label label-primary pull-right">Today</span> --}}
                                <h5>Pendin Fees</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">asd</h1>
                                {{-- <div class="stat-percent font-bold text-navy">44% <i class="fa fa-level-up"></i></div> --}}
                                <small>New visits</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                {{-- <span class="label label-danger pull-right">Low value</span> --}}
                                <h5></h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">---</h1>
                                {{-- <div class="stat-percent font-bold text-danger">38% <i class="fa fa-level-down"></i></div> --}}
                                <small>--</small>
                            </div>
                        </div>
                    </div>


                    {{-- attendance --}}


                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                {{-- <span class="label label-success pull-right">Monthly</span> --}}
                                <h5>Members Present</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">--</h1>
                                {{-- <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div> --}}
                                <small>Total Present Members at GYM</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                {{-- <span class="label label-info pull-right">Annual</span> --}}
                                <h5>Members Absent </h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">--</h1>
                                {{-- <div class="stat-percent font-bold text-info">20% <i class="fa fa-level-up"></i></div> --}}
                                <small>Total Present Members at GYM</small>
                            </div>
                        </div>
                    </div>
                    
        </div>

        


                
                </div>
        <?=$footer; ?>
        </div>
        
    </div>

    <!-- Mainly scripts -->
    <script src="{{asset('resources')}}/js/jquery-2.1.1.js"></script>
    <script src="{{asset('resources')}}/js/bootstrap.min.js"></script>
    <script src="{{asset('resources')}}/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="{{asset('resources')}}/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Flot -->
    <script src="{{asset('resources')}}/js/plugins/flot/jquery.flot.js"></script>
    <script src="{{asset('resources')}}/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="{{asset('resources')}}/js/plugins/flot/jquery.flot.spline.js"></script>
    <script src="{{asset('resources')}}/js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="{{asset('resources')}}/js/plugins/flot/jquery.flot.pie.js"></script>
    <script src="{{asset('resources')}}/js/plugins/flot/jquery.flot.symbol.js"></script>
    <script src="{{asset('resources')}}/js/plugins/flot/jquery.flot.time.js"></script>

    <!-- Peity -->
    <script src="{{asset('resources')}}/js/plugins/peity/jquery.peity.min.js"></script>
    <script src="{{asset('resources')}}/js/demo/peity-demo.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{asset('resources')}}/js/inspinia.js"></script>
    <script src="{{asset('resources')}}/js/plugins/pace/pace.min.js"></script>

    <!-- jQuery UI -->
    <script src="{{asset('resources')}}/js/plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- Jvectormap -->
    <script src="{{asset('resources')}}/js/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="{{asset('resources')}}/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

    <!-- EayPIE -->
    <script src="{{asset('resources')}}/js/plugins/easypiechart/jquery.easypiechart.js"></script>

    <!-- Sparkline -->
    <script src="{{asset('resources')}}/js/plugins/sparkline/jquery.sparkline.min.js"></script>

    <!-- Sparkline demo data  -->
    <script src="{{asset('resources')}}/js/demo/sparkline-demo.js"></script>

    <script src="{{asset('resources')}}/js/plugins/dataTables/datatables.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]

            });

            /* Init DataTables */
            var oTable = $('#editable').DataTable();

            /* Apply the jEditable handlers to the table */
            oTable.$('td').editable( '../example_ajax.php', {
                "callback": function( sValue, y ) {
                    var aPos = oTable.fnGetPosition( this );
                    oTable.fnUpdate( sValue, aPos[0], aPos[1] );
                },
                "submitdata": function ( value, settings ) {
                    return {
                        "row_id": this.parentNode.getAttribute('id'),
                        "column": oTable.fnGetPosition( this )[2]
                    };
                },

                "width": "90%",
                "height": "100%"
            } );


        });

        function fnClickAddRow() {
            $('#editable').dataTable().fnAddData( [
                "Custom row",
                "New row",
                "New row",
                "New row",
                "New row" ] );

        }
    </script>
</body>
</html>
