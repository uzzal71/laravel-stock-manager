<?php

namespace App\Http\Controllers;
    
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Organization;

class OrganizationController extends Controller
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $organization = Organization::find($id);
        return view('organizations.show',compact('organization'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $organization = Organization::find($id);
    
        return view('organizations.edit',compact('organization'));
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
            'site_name' => 'required',
            'mobile' => 'required',
            'email' => 'required',
            'address' => 'required',
        ]);
    
        $input = $request->all();
    
        $organization = Organization::find($id);
        $organization->update($input);
        
        return redirect()->route('organizations.show', $id)
                        ->with('success','Organization updated successfully');
    }
}
