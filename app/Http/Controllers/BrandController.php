<?php

namespace App\Http\Controllers;
    
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Brand;


class BrandController extends Controller
{
    /**
     *Access Permission
     *
     * @return True OR False
     */
    function __construct()
    {
         $this->middleware('permission:brands.index|brands.create|brands.edit|brands.delete', ['only' => ['index','show']]);
         $this->middleware('permission:brands.create', ['only' => ['create','store']]);
         $this->middleware('permission:brands.edit', ['only' => ['edit','update']]);
         $this->middleware('permission:brands.delete', ['only' => ['destroy']]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'brand_code' => 'required|unique.brands, brand_code',
            'brand_name' => 'required'
        ]);
    
        $input = $request->all();
    
        Brand::create($input);
    
        return redirect()->route('brands.index')
                        ->with('success','Brand created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $brand = Brand::find($id);
        return view('brands.show',compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = Brand::find($id);
    
        return view('brands.edit',compact('brand'));
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
        $this->validate($request, [
            'brand_code' => 'required|unique.brands, brand_code'. $id,
            'brand_name' => 'required'
        ]);
    
        $input = $request->all();
    
        $brand = Brand::find($id);
        $brand->update($input);
        
        return redirect()->route('brands.index')
                        ->with('success','Brand updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Brand::find($id)->delete();
        return redirect()->route('brands.index')
                        ->with('success','Brand deleted successfully');
    }
}
