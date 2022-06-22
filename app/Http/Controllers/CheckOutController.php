<?php

namespace App\Http\Controllers;
    
 use Illuminate\Http\Request;
 use App\Http\Controllers\Controller;
 use App\Models\CheckOut;
 use App\Models\CheckOutDetail;
 use App\Models\Organization;
 use App\Models\Customer;
 use App\Models\Item;

class CheckOutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:checkouts.index|checkouts.create|checkouts.edit|checkouts.delete', ['only' => ['index','show']]);
         $this->middleware('permission:checkouts.create', ['only' => ['create','store']]);
         $this->middleware('permission:checkouts.edit', ['only' => ['edit','update']]);
         $this->middleware('permission:checkouts.delete', ['only' => ['destroy']]);
    }

    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = CheckOut::with(['user', 'customer'])->orderBy('id','DESC')->paginate(5);
        return view('checkout.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::all();
        $items = Item::all();
        return view('checkout.create', compact('customers', 'items'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $organization = Organization::first();
        $checkout = CheckOut::with(['customer'])->find($id);
        $checkout_details = CheckOutDetail::with(['item'])->where('check_out_id', $id)->get();
        return view('checkout.show',compact('organization', 'checkout', 'checkout_details'));
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
        $items = Item::all();
        $checkout = CheckIn::with(['user', 'customer'])->find($id);
        $checkout_details = CheckOutDetail::with(['item'])->where('check_out_id', $id)->get();
        return view('checkout.edit',compact('customers', 'items', 'checkout', 'checkout_details'));
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
    public function destroy($id)
    {
        //
    }
}
