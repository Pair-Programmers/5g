<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Product;
use App\Models\SaleOrder;
use App\Models\SaleOrderDetail;
use View;
use Session;

class SaleOrderController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index()
    {
        $sale_orders = SaleOrder::orderby('created_at', 'DESC')->get();

        $view = View::make('adminpanel/pages/sale_order_list', ['sale_orders'=>$sale_orders]);
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
        $customers = Customer::all();
        $products = Product::all();
        session()->flush();
        
        $view = View::make('adminpanel/pages/sale_order_add', compact('customers', 'products'));
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
        //store into session
        if ($request->button == 'Add') {
        
            $request->validate([
                'product_id'=>'required',
                'quantity'=>'required',
                'sale_price'=>'required',
            ]);

            $total_amount = 0;
            
            $request->session()->push('items', [    'product_id'=>$request->product_id,
                                                    'product_name'=>Product::find($request->product_id)->name, 
                                                    'quantity'=>$request->quantity, 
                                                    'sale_price'=>$request->sale_price]);
            
            foreach (Session::get('items') as $item) {
                $total_amount += $item['quantity']*$item['sale_price'];
            }
            $request->session()->put('total_amount', $total_amount);

            return redirect()->back();
        }
        else if($request->button == 'Save Invoice'){
            $request->validate([
                'customer_id'=>'required',
                'date'=>'required',
                'discount'=>'required'
            ]);
            

            if(Session::has('items')){
                $no_of_items = 0;
                $no_of_products = 0;
                $total_amount = 0;

                foreach (Session::get('items') as $item) {
                    $total_amount += $item['quantity']*$item['sale_price'];
                    $no_of_items += $item['quantity'];
                    $no_of_products++;           
                }

                $inputs = $request->all();
                $inputs['user_id'] = 1;
                $inputs['no_of_items'] = $no_of_items;
                $inputs['no_of_products'] = $no_of_products;
                $inputs['total_amount'] = $total_amount - $inputs['discount'];
                $sale_order = SaleOrder::create($inputs);
                foreach (Session::get('items') as $item) {
                    $item['sale_order_id'] = $sale_order->id;
                    SaleOrderDetail::create($item);
                }
                session()->flush();
                return redirect()->back();   
                
            }
            else{
                return redirect()->back();
            }
        }
        

        // Customer::create($requestData);
        // //return redirect()->back()->with('success', 'Created Successfuly !');
        // return redirect('display_customer_list');
    }

    public function storeIntoSession(Request $request)
    {
        return 321;
        //return session()->flush();
        //return session()->all();
        //return $request;
        //return Session::get('items');
        

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customers = Customer::all();
        $products = Product::all();
        $sale_order = SaleOrder::find($id);
        //return $sale_order->detail;
        session()->flush();
        $total_amount = 0;
        
        foreach ($sale_order->detail as $item) {

            session()->push('items', [  'product_id'=>$item->product_id,
                                    'product_name'=>Product::find($item->product_id)->name, 
                                    'quantity'=>$item->quantity, 
                                    'sale_price'=>$item->sale_price]);
            $total_amount += $item['quantity']*$item['sale_price'];
        }
        session()->put('total_amount', $total_amount);
        session()->put('customer_id', $sale_order->customer_id);

        $view = View::make('adminpanel/pages/sale_order_edit', compact('customers', 'products', 'sale_order'));
        $view->nest('sidebar','adminpanel/partials/sidebar');
        $view->nest('header','adminpanel/partials/header');
        $view->nest('footer','adminpanel/partials/footer');
        return $view;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        return $request;
        //store into session
        if ($request->button == 'Add') {
        
            $request->validate([
                'product_id'=>'required',
                'quantity'=>'required',
                'sale_price'=>'required',
            ]);

            $total_amount = 0;
            
            $request->session()->push('items', [    'product_id'=>$request->product_id,
                                                    'product_name'=>Product::find($request->product_id)->name, 
                                                    'quantity'=>$request->quantity, 
                                                    'sale_price'=>$request->sale_price]);
            
            foreach (Session::get('items') as $item) {
                $total_amount += $item['quantity']*$item['sale_price'];
            }
            $request->session()->put('total_amount', $total_amount);

            return redirect()->back();
        }
        else if($request->button == 'Update Invoice'){
            $request->validate([
                'customer_id'=>'required',
                'date'=>'required',
                'discount'=>'required'
            ]);
            

            if(Session::has('items')){
                $no_of_items = 0;
                $no_of_products = 0;
                $total_amount = 0;

                foreach (Session::get('items') as $item) {
                    $total_amount += $item['quantity']*$item['sale_price'];
                    $no_of_items += $item['quantity'];
                    $no_of_products++;           
                }

                $inputs = $request->all();
                $inputs['user_id'] = 1;
                $inputs['no_of_items'] = $no_of_items;
                $inputs['no_of_products'] = $no_of_products;
                $inputs['total_amount'] = $total_amount - $inputs['discount'];
                $sale_order = SaleOrder::find($id);
                $sale_order->update($inputs);
                foreach (Session::get('items') as $item) {
                    $item['sale_order_id'] = $sale_order->id;
                    SaleOrderDetail::create($item);
                }

                foreach ($sale_order->detail as $item) {
                    SaleOrderDetail::destroy($item['id']);
                }
                session()->flush();
                return redirect()->back();   
                
            }
            else{
                return redirect()->back();
            }
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Customer::destroy($id);
        return redirect()->back()->with('success', 'Deleted Successfuly !');
    }

    public function destroyFromSession($product_id)
    {
        $flag = 0;
        //return $product_id;
        Session::forget('items.'.$product_id);
        $total_amount = 0;
        if(Session::has('items')){
            
            //$total_amount = Session::get('total_amount');
            foreach (Session::get('items') as $item) {
                $total_amount += $item['quantity']*$item['sale_price'];
                $flag++;
            }
            Session::put('total_amount', $total_amount);
        }
        else{
            Session::put('total_amount', $total_amount);

        }
        if($flag = 0){
            Session::forget('items');
        }
        
        return redirect()->back();
        
    }
}
