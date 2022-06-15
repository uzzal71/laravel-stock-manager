<?php

namespace App\Http\Controllers;
    
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Barcode;

class BarcodeController extends Controller
{
    /**
     *Access Permission
     *
     * @return True OR False
     */
    function __construct()
    {
         $this->middleware('permission:barcodes.index|barcodes.create|barcodes.edit|barcodes.delete', ['only' => ['index','show']]);
         $this->middleware('permission:barcodes.create', ['only' => ['create','store']]);
         $this->middleware('permission:barcodes.edit', ['only' => ['edit','update']]);
         $this->middleware('permission:barcodes.delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Barcode::orderBy('id','DESC')->paginate(5);
        return view('barcodes.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('barcodes.create');
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
            'barcode_name' => 'required',
        ]);
    
        $input = $request->all();
    
        Barcode::create($input);
    
        return redirect()->route('barcodes.index')
                        ->with('success','Barcode created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $barcode = Barcode::find($id);
        return view('barcodes.show',compact('barcode'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barcode = Barcode::find($id);
    
        return view('barcodes.edit',compact('barcode'));
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
            'barcode_name' => 'required',
        ]);
    
        $input = $request->all();
    
        $barcode = Barcode::find($id);
        $barcode->update($input);
        
        return redirect()->route('barcodes.index')
                        ->with('success','Barcode updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Barcode::find($id)->delete();
        return redirect()->route('barcodes.index')
                        ->with('success','Barcode deleted successfully');
    }
}
