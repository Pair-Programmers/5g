<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>El-Gymnasio | Member Registration</title>

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
                    <h2>List of Services</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>
                            <a>Services</a>
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
    
                    <div class="ibox-content">

                        <form method="post" class="form-horizontal" action="{{route('product_store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Name</label>

                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="name" required>
                                </div>

                                <label class="col-sm-2 control-label">Unit Price</label>

                                <div class="col-sm-4">
                                    <input type="number" class="form-control" name="unit_price" required placeholder="500">
                                </div>
                                
                            </div>

                            <div class="form-group">
                                
                                <label class="col-sm-2 control-label">Opening Qty</label>

                                <div class="col-sm-4">
                                    <input type="number" class="form-control" name="opening_qty" required value="0">
                                </div>
                                
                            </div>

                            <div class="form-group">
                                
                                <label class="col-sm-2 control-label">Color</label>

                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="colors" required placeholder="Red, Black, White ..">
                                </div>

                                <label class="col-sm-2 control-label">Brand</label>

                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="brand" required placeholder="Samsung, Apple, Oppo ..">
                                </div>
                                
                            </div>

                            <div class="form-group">
                                
                                <label class="col-sm-2 control-label">Description</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="description" required placeholder="Condition, size etc ..">
                                </div>
                                
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Category</label>

                                <div class="col-sm-4">
                                    <select onchange="getSubCategories()" class="form-control" name="category_id" required id="categories">
                                        <option value="select" disabled selected>Select</option>
                                        @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select> 
                                </div>

                                <label class="col-sm-2 control-label">Sub Category</label>

                                <div class="col-sm-4">
                                    <select class="form-control" name="sub_category_id" required id="subcategories">
                                        
                                    </select> 
                                </div>
                                    
                            </div>

                            <div class="hr-line-dashed"></div>
                            
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Image1</label>

                                <div class="col-sm-4">
                                    <input type="file" class="form-control" name="image1" required>
                                </div>

                                <label class="col-sm-2 control-label">Image2</label>

                                <div class="col-sm-4">
                                    <input type="file" class="form-control" name="image2" required>
                                </div>
                                    
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Image3</label>

                                <div class="col-sm-4">
                                    <input type="file" class="form-control" name="image3" required>
                                </div>

                                <label class="col-sm-2 control-label">Image4</label>

                                <div class="col-sm-4">
                                    <input type="file" class="form-control" name="image4" required>
                                </div>
                                    
                            </div>

                            

                            

                            

                            <div class="hr-line-dashed"></div>
                            

                            
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

            <?=$footer;?>
    
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
            function getSubCategories() {
                var select = document.getElementById("subcategories");
                select.innerHTML = "";
                var categoryId = document.getElementById("categories").value;
                var subcategoriesArray = JSON.parse(`<?php echo json_encode($subcategories); ?>`);
                console.log(subcategoriesArray.length);
                
                for (let i = 0; i < subcategoriesArray.length; i++) 
                {
                    if(categoryId == subcategoriesArray[i].id){
                        var option = document.createElement("option");
                        option.value= subcategoriesArray[i].id;
                        option.innerHTML = subcategoriesArray[i].name;

                        // then append it to the select element
                        select.appendChild(option);
                    }
                    
                }
            }
        </script>
        
        <script>
            $(document).ready(function () {
                $('.i-checks').iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    radioClass: 'iradio_square-green',
                });
            });
        </script>

        <script>
           
            let count=0;
         function participate(e){
                if(count==0){
                    console.log('msg1');
                    count=1;
                    $('#trainers').fadeIn(10)
                }
                else{
                    console.log('msg2');
                    count=0;
                    $('#trainers').fadeOut(10)
                }
            }
        
        </script>
</body>

</html>
