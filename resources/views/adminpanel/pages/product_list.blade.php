<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>El-Gymnasio | Services</title>

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
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>List of Products</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>
                            <a>Products</a>
                        </li>
                        <li class="active">
                            <strong>List</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">

                
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>オーダーリスト</h5>{{-- order list --}}
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#">Config option 1</a>
                                </li>
                                <li><a href="#">Config option 2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Sub Category</th>
                        <th>Brand</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total Amount</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php
                        $counter = 1;
                    @endphp 
                    
                    @foreach($products as $product)
                        <tr class="gradeX">
                            <td>{{$product->id}}</td>
                            <td class="center">{{$product->name}}</td>
                            <td class="center">{{$product->category->name}}</td>
                            <td class="center">{{$product->subCategory->name}}</td>
                            <td class="center">{{$product->brand}}</td>
                            <td class="center">{{$product->available_qty}} </td>
                            <td class="center">{{$product->unit_price}}</td>
                            <td class="center">{{$product->unit_price*$product->available_qty}}</td>
                            
                            
                            <td>
                                <a href="{{ url('/display_edit_expense', ['id' => $product->id]) }}">
                                    <small class="label label-warning"><i class="fa"></i>Edit</small>
                                </a>
                                <a href="{{ url('/display_edit_expense', ['id' => $product->id]) }}">
                                    <small class="label label-danger"><i class="fa"></i>delete</small>
                                </a>
                            </td>
                        </tr>

                        @php
                            $counter = $counter + 1;
                        @endphp 
                    @endforeach
                    
                    
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Sub Category</th>
                        <th>Brand</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total Amount</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    </table>
                        </div>

                    </div>
                </div>
            </div>
            </div>
        </div>
        <div class="footer">
            <div class="pull-right">
                10GB of <strong>250GB</strong> Free.
            </div>
            <div>
                <strong>Copyright</strong> Example Company &copy; 2014-2015
            </div>
        </div>

        </div>
        </div>



    <!-- Mainly scripts -->
    <script src="{{asset('resources')}}/js/jquery-2.1.1.js"></script>
    <script src="{{asset('resources')}}/js/bootstrap.min.js"></script>
    <script src="{{asset('resources')}}/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="{{asset('resources')}}/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="{{asset('resources')}}/js/plugins/jeditable/jquery.jeditable.js"></script>

    <script src="{{asset('resources')}}/js/plugins/dataTables/datatables.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{asset('resources')}}/js/inspinia.js"></script>
    <script src="{{asset('resources')}}/js/plugins/pace/pace.min.js"></script>

    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    {extend: 'copy'},
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
