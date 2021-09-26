<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use App\Models\ProductCategory;
use App\Models\ProductSubCategory;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = ProductCategory::all(); 
        $subcategories = ProductSubCategory::all(); 
        $view = View::make('adminpanel/pages/product_category', compact('categories', 'subcategories'));
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
    public function storeCategory(Request $request)
    {
        ProductCategory::create($request->all());
        return redirect()->route('product_category_page');
    }

    public function storeSubCategory(Request $request)
    {
        ProductSubCategory::create($request->all());
        return redirect()->route('product_category_page');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyCategory($id)
    {
        //if find in another table than dont delete
        if(!ProductSubCategory::whereCategoryId($id)->first()){
            ProductCategory::find($id)->delete();
        }
        return redirect()->route('product_category_page');
    }

    public function destroySubCategory($id)
    {
        ProductSubCategory::find($id)->delete();
        return redirect()->route('product_category_page');
    }
}
