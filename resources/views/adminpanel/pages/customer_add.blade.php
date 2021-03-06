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
                    <h2>Create Customer</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>
                            <a>Customer</a>
                        </li>
                        <li class="active">
                            <strong>Create</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">

                <div class="ibox-content">
                            <form method="post" class="form-horizontal" action="{{route('customer_store')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Name</label>

                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="name">
                                    </div>

                                    <label class="col-sm-2 control-label">Image</label>

                                    <div class="col-sm-4">
                                        <input type="file" class="form-control" name="image_path">
                                    </div>

                                    
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Phone</label>

                                    <div class="col-sm-4">
                                        <input type="number" class="form-control" name="phone">
                                    </div>

                                    <label class="col-sm-2 control-label">Email</label>

                                    <div class="col-sm-4">
                                        <input type="email" class="form-control" name="email">
                                    </div>

                                    
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Adress</label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="adress">
                                        {{-- <input type="hidden" class="form-control" name="group" value="vendor"> --}}
                                    </div>
                                    

                                    
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Opening Balance</label>

                                    <div class="col-sm-4">
                                        <input type="number" class="form-control" name="opening_balance" value="0" required>
                                        {{-- <input type="hidden" class="form-control" name="group" value="vendor"> --}}
                                    </div>
                                    

                                    
                                </div>

                                

                                

                                
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-primary" type="submit">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <br>
                
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
