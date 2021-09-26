<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payee;
use View;

class VendorController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendors = Payee::whereGroup('Vendor')->orderby('id', 'DESC')->get();

        $view = View::make('adminpanel/pages/vendor_list', ['vendors'=>$vendors]);
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
        $view = View::make('adminpanel/pages/vendor_add');
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

            'image_path' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        $requestData = $request->all();

        if(!empty($request->image_path)){
            $imageName = time().'_'.$request->name.'.'.$request->image_path->extension();  
            $request->image_path->move(public_path('images/vendors'), $imageName);
            $requestData['image_path'] = $imageName;
        }
        else{
            $requestData['image_path'] = 'male_avatar.png';
        }

        $requestData['group'] = 'Vendor';

        Payee::create($requestData);
        //return redirect()->back()->with('success', 'Created Successfuly !');
        return redirect('display_vendor_list');
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
        $vendor = Payee::find($id);

        $view = View::make('adminpanel/pages/vendor_edit', ['vendor'=>$vendor]);
        $view->nest('sidebar','adminpanel/partials/sidebar');
        $view->nest('header','adminpanel/partials/header');
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
        $request->validate([

            'image_path' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        $requestData = $request->all();

        if(!empty($request->image_path)){
            $imageName = time().'_'.$request->name.'.'.$request->image_path->extension();  
            $request->image_path->move(public_path('images/vendors'), $imageName);
            $requestData['image_path'] = $imageName;
        }
        else{
            $requestData['image_path'] = $request->image_path_temp;
        }

        $vendor = Payee::find($request->id);
        $vendor->update($requestData);
        //return redirect()->back()->with('success', 'Updated Successfuly !');
        return redirect('display_vendor_list');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Payee::destroy($id);
        return redirect()->back()->with('success', 'Deleted Successfuly !');
    }
}
