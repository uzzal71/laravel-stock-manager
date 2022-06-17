<?php

namespace App\Http\Controllers;
    
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer; 

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:customers.index|customers.create|customers.edit|customers.delete', ['only' => ['index','show']]);
         $this->middleware('permission:customers.create', ['only' => ['create','store']]);
         $this->middleware('permission:customers.edit', ['only' => ['edit','update']]);
         $this->middleware('permission:customers.delete', ['only' => ['destroy']]);
    }
 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Customer::orderBy('id','DESC')->paginate(5);
        return view('customers.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.create');
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
            'customer_name' => 'required',
            'customer_email' => 'required|email|unique:customers,customer_email',
            'customer_phone' => 'required|unique:customers,customer_phone',
        ]);
    
        $input = $request->all();
    
        Customer::create($input);
    
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
        $customer = Customer::find($id);
        return view('customers.show',compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::find($id);
    
        return view('customers.edit', compact('customer'));
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
            'customer_name' => 'required',
            'customer_email' => 'required|email|unique:customers,customer_email',
            'customer_phone' => 'required|unique:customers,customer_phone',
        ]);
    
        $input = $request->all();
    
        $customer = Customer::find($id);
        $customer->update($input);
        
        return redirect()->route('customers.index')
                        ->with('success','Customer updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Customer::find($id)->delete();
        return redirect()->route('customers.index')
                        ->with('success','Customer deleted successfully');
    }
}
