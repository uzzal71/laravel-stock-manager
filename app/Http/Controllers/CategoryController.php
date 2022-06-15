<?php
 
 namespace App\Http\Controllers;
    
 use Illuminate\Http\Request;
 use App\Http\Controllers\Controller;
 use App\Models\Category;

class CategoryController extends Controller
{
    /**
     *Access Permission
     *
     * @return True OR False
     */
    function __construct()
    {
         $this->middleware('permission:categories.index|categories.create|categories.edit|categories.delete', ['only' => ['index','show']]);
         $this->middleware('permission:categories.create', ['only' => ['create','store']]);
         $this->middleware('permission:categories.edit', ['only' => ['edit','update']]);
         $this->middleware('permission:categories.delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Category::orderBy('id','DESC')->paginate(5);
        return view('categories.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
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
            'category_code' => 'required',
            'category_name' => 'required'
        ]);
    
        $input = $request->all();
    
        Category::create($input);
    
        return redirect()->route('categories.index')
                        ->with('success','Supplier created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);
        return view('categories.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
    
        return view('categories.edit',compact('category'));
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
            'category_code' => 'required',
            'category_name' => 'required'
        ]);
    
        $input = $request->all();
    
        $category = Category::find($id);
        $category->update($input);
        
        return redirect()->route('categories.index')
                        ->with('success','Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::find($id)->delete();
        return redirect()->route('categories.index')
                        ->with('success','Category deleted successfully');
    }
}
