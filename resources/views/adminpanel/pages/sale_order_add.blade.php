<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>El-Gymnasio | Services</title>

    <link href="{{asset('resources')}}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('resources')}}/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="{{asset('resources')}}/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="{{asset('resources')}}/css/animate.css" rel="stylesheet">
    <link href="{{asset('resources')}}/css/style.css" rel="stylesheet">

    <link href="{{asset('resources')}}/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">

</head>

<body>

    <div id="wrapper">

    <?=$sidebar; ?>

        <div id="page-wrapper" class="gray-bg">
            <?=$header; ?>            
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Sales Order</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>
                            <a>Sale Oder</a>
                        </li>
                        <li class="active">
                            <strong>Create</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
            <form method="post" class="form-horizontal" action="{{route('sale_order_store')}}" enctype="multipart/form-data">
                @csrf
            <div class="wrapper wrapper-content animated fadeInRight">
                @error('quantity')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
                <div class="row">

                    <div class="ibox-content">
                        
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Customer</label>

                                <div class="col-sm-4">
                                    <select class="form-control" name="customer_id" >
                                        <option value="select" disabled selected>Select</option>
                                        @foreach ($customers as $customer)
                                        @if(Session::get('customer_id') == $customer->id)
                                        <option value="{{$customer->id}}" selected>{{$customer->name}}</option>
                                        @else
                                        <option value="{{$customer->id}}">{{$customer->name}}</option>
                                        @endif
                                        @endforeach
                                    </select> 
                                </div>

                                <label class="col-sm-2 control-label">Date</label>

                                <div class="col-sm-4">
                                    <input type="date" class="form-control has-error" name="date" value="<?php echo date('Y-m-d'); ?>">
                                </div>

                                
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Product</label>

                                <div class="col-sm-10">
                                    <select onchange="getSubCategories()" class="form-control" name="product_id" >
                                        <option value="" disabled selected>Select</option>
                                        @foreach ($products as $product)
                                        <option value="{{$product->id}}">{{$product->name}}</option>
                                        @endforeach
                                    </select> 
                                </div>

                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Qty</label>

                                <div class="col-sm-2">
                                    <input type="number" class="form-control " name="quantity" value="1" min="1">
                                </div>

                                <label class="col-sm-1 control-label">Price/Unit</label>

                                <div class="col-sm-2">
                                    <input type="number" class="form-control" name="sale_price" min="0">
                                </div>
                                
                                <div class="col-sm-4 ">
                                    <button onclick="addProductInTable()" class="btn btn-primary" type="submit" name="button" value="Add">Add</button>
                                </div>
                            </div>

                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Discount</label>

                                <div class="col-sm-2">
                                    <input type="number" class="form-control " name="discount" value="0">
                                </div>

                                <label class="col-sm-1 control-label">Ref #</label>

                                <div class="col-sm-2">
                                    <input type="number" class="form-control" name="reference_no" placeholder="Optional">
                                </div>

                                    <label class="col-sm-1 control-label">Description</label>

                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="description" placeholder="Optional">
                                </div>
                               
                                
                            </div>

                            
    
                    </div>

                        <div class="ibox-content">
                            <h3>Total Amount : {{Session::get('total_amount')}}</h3>
                            <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Product</th>
                                        <th>Qty</th>
                                        <th>Price</th>
                                        <th>Amount</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $counter = 1;
                                    @endphp
                                    
                                    @if (Session::has('items'))
                                    
                                    @foreach (Session::get('items') as $key => $item)
                                    <tr class="gradeX">
                                        <td>{{$counter}}</td>
                                        <td class="center">{{$item['product_name']}}</td>
                                        <td class="center">{{$item['quantity']}}</td>
                                        <td class="center">{{$item['sale_price']}}</td>
                                        <td class="center">{{$item['sale_price']*$item['quantity']}}</td>
                                        <td>
                                            
                                            <a href="{{ route('sale_order_session_destroy',  $key) }}">
                                                <small class="label label-danger"><i class="fa"></i>Remove</small>
                                            </a>
                                        </td>
                                    </tr>
                                    @php
                                        $counter = $counter + 1;
                                    @endphp 
                                    @endforeach
                                    
                                    @endif
            
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>Product</th>
                                        <th>Qty</th>
                                        <th>Price</th>
                                        <th>Amount</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                            </div>

                            <button  class="btn btn-primary" type="submit" name="button" value="Save Invoice">Save Invoice</button>
    
                        </div>
                        <br>
                </form>
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

    <!-- Custom and plugin javascript -->
    <script src="{{asset('resources')}}/js/inspinia.js"></script>
    <script src="{{asset('resources')}}/js/plugins/pace/pace.min.js"></script>

    <!-- iCheck -->
    <script src="{{asset('resources')}}/js/plugins/iCheck/icheck.min.js"></script>
        <script>
            $(document).ready(function () {
                $('.i-checks').iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    radioClass: 'iradio_square-green',
                });
            });
        </script>

</body>

</html>

