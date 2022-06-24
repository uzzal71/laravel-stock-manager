<?php
 
 namespace App\Http\Controllers;
    
 use Illuminate\Http\Request;
 use App\Http\Controllers\Controller;
 use App\Models\CheckIn;
 use App\Models\CheckInDetail;
 use App\Models\Supplier;
 use App\Models\Item;
 use App\Models\Organization;

class CheckInController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:checkins.index|checkins.create|checkins.edit|checkins.delete', ['only' => ['index','show']]);
         $this->middleware('permission:checkins.create', ['only' => ['create','store']]);
         $this->middleware('permission:checkins.edit', ['only' => ['edit','update']]);
         $this->middleware('permission:checkins.delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    { 
        $data = CheckIn::with('supplier')->orderBy('id','DESC')->paginate(5);
        return view('checkin.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suppliers = Supplier::all();
        $items = Item::all();
        return view('checkin.create', compact('suppliers', 'items'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $checkin = new CheckIn;
        $checkin->checkin_date = $request->checkin_date;
        $checkin->reference = $request->reference;
        $checkin->supplier_id = $request->supplier_id;
        $checkin->note = $request->note;

        $checkin->save();
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
        $checkin = CheckIn::with(['supplier'])->find($id);
        $checkin_details = CheckInDetail::with(['item'])->where('check_in_id', $id)->get();
        return view('checkin.show',compact('organization', 'checkin', 'checkin_details'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $suppliers = Supplier::all();
        $items = Item::all();
        $checkin = CheckIn::with(['user', 'supplier'])->find($id);
        $checkin_details = CheckInDetail::with(['item'])->where('check_in_id', $id)->get();
        return view('checkin.edit',compact('suppliers', 'items', 'checkin', 'checkin_details'));
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
        CheckIn::find($id)->delete();
        CheckInDetail::where('check_in_id', $id)->delete();
        return redirect()->route('checkin.index')
                        ->with('success','CheckIn deleted successfully');
    }
}
