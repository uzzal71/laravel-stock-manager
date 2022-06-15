<?php

namespace App\Http\Controllers;
    
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Supplier;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:suppliers.index|suppliers.create|suppliers.edit|suppliers.delete', ['only' => ['index','show']]);
         $this->middleware('permission:suppliers.create', ['only' => ['create','store']]);
         $this->middleware('permission:suppliers.edit', ['only' => ['edit','update']]);
         $this->middleware('permission:suppliers.delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Supplier::orderBy('id','DESC')->paginate(5);
        return view('suppliers.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('suppliers.create');
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
            'supplier_name' => 'required',
            'supplier_email' => 'required|email|unique:suppliers,supplier_email',
            'supplier_phone' => 'required|email|unique:suppliers,supplier_phone',
        ]);
    
        $input = $request->all();
    
        Supplier::create($input);
    
        return redirect()->route('customers.index')
                        ->with('success','Customer created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $supplier = Supplier::find($id);
        return view('suppliers.show',compact('supplier'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supplier = Supplier::find($id);
    
        return view('suppliers.edit',compact('supplier'));
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
            'supplier_name' => 'required',
            'supplier_email' => 'required|email|unique:suppliers,supplier_email',
            'supplier_phone' => 'required|email|unique:suppliers,supplier_phone',
        ]);
    
        $input = $request->all();
    
        $supplier = Supplier::find($id);
        $supplier->update($input);
        
        return redirect()->route('suppliers.index')
                        ->with('success','Supplier updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Supplier::find($id)->delete();
        return redirect()->route('suppliers.index')
                        ->with('success','Supplier deleted successfully');
    }
}
