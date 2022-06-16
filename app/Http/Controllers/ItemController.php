<?php

namespace App\Http\Controllers;
    
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Item;


class ItemController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:items.index|items.create|items.edit|items.delete', ['only' => ['index','show']]);
         $this->middleware('permission:items.create', ['only' => ['create','store']]);
         $this->middleware('permission:items.edit', ['only' => ['edit','update']]);
         $this->middleware('permission:items.delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('items.create');
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
            'item_name' => 'required',
            'item_code' => 'required',
            'item_barcode' => 'required',
            'category_id' => 'required',
            'brand_id' => 'required',
            'item_quantity' => 'required',
            'item_unit' => 'required',
            'item_alert_quantity' => 'required',
        ]);
    
        $input = $request->all();
    
        Item::create($input);
    
        return redirect()->route('items.index')
                        ->with('success','Item created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Item::find($id);
        return view('items.show',compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Item::find($id);
    
        return view('items.edit', compact('item'));
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
            'item_name' => 'required',
            'item_code' => 'required',
            'item_barcode' => 'required',
            'category_id' => 'required',
            'brand_id' => 'required',
            'item_quantity' => 'required',
            'item_unit' => 'required',
            'item_alert_quantity' => 'required',
        ]);
    
        $input = $request->all();
    
        $item = Item::find($id);
        $item->update($input);
        
        return redirect()->route('items.index')
                        ->with('success','Item updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Item::find($id)->delete();
        return redirect()->route('items.index')
                        ->with('success','Item deleted successfully');
    }
}
