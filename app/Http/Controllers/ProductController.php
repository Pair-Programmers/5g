<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use View;
use App\Models\ProductCategory;
use App\Models\ProductSubCategory;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        //return $products[0]->subCategory;
        $view = View::make('adminpanel/pages/product_list', compact('products'));
        $view->nest('sidebar','adminpanel/partials/sidebar');
        $view->nest('header','adminpanel/partials/header');
        $view->nest('footer','adminpanel/partials/footer');
        
        return $view;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = ProductCategory::all(); 
        $subcategories = ProductSubCategory::get(); 

        $view = View::make('adminpanel/pages/product_create', compact('categories','subcategories'));
        $view->nest('sidebar','adminpanel/partials/sidebar');
        $view->nest('header','adminpanel/partials/header');
        $view->nest('footer','adminpanel/partials/footer');
        return $view;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
        ]);

        $inputs = $request->all();
        $inputs['available_qty'] = $request->opening_qty;

        if(!empty($request->image1)){
            $image_name = time().'_Product_'.$request->name.'.'.$request->image1->extension();
            $request->image1->move(public_path('/storage/images/products'), $image_name);
            $inputs['image1'] = $image_name;
        }
        else{
            $inputs['image1'] = 'add_product_icon.png';
        }

        if(!empty($request->image2)){
            $image_name = time().'_Product_'.$request->name.'.'.$request->image2->extension();
            $request->image2->move(public_path('/storage/images/products'), $image_name);
            $inputs['image2'] = $image_name;
        }
        else{
            $inputs['image2'] = 'add_product_icon.png';
        }


        if(!empty($request->image3)){
            $image_name = time().'_Product_'.$request->name.'.'.$request->image3->extension();
            $request->image3->move(public_path('/storage/images/products'), $image_name);
            $inputs['image3'] = $image_name;
        }
        else{
            $inputs['image3'] = 'add_product_icon.png';
        }

        if(!empty($request->image4)){
            $image_name = time().'_Product_'.$request->name.'.'.$request->image4->extension();
            $request->image4->move(public_path('/storage/images/products'), $image_name);
            $inputs['image4'] = $image_name;
        }
        else{
            $inputs['image4'] = 'add_product_icon.png';
        }

        Product::create($inputs);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
