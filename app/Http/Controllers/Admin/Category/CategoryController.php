<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::orderBy('id','DESC')->paginate(5);
        return view('admin.category.index',compact('category'),['pageName' => 'Categories']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create',['pageName' => 'Add New Category']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,gif,webp|max:2048',
            'status' => 'required',
        ]);

        $cat_img = time().'-'.$request['image']->getClientOriginalExtension();
        $img =  $request['image']->move('category_image',$cat_img);

        $category = new Category();
        $category->name = $request['name'];
        $category->description = $request['description'];
        $category->image = $cat_img;
        $category->status = $request['status'];
        $category->save();
        toastr()->success('Category Added successfully', 'Category', ['timeOut' => 5000]);
        return redirect()->route('admin.category.list');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::find($id);
        return view('admin.category.edit',compact('category'),['pageName' => 'Edit Category']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'status' => 'required',
            //'image' => 'nullable|image|mimes:jpeg,jpg,png,gif,webp|max:52048',
        ]);

        $category = Category::find($id);
        $category->name = $request['name'];
        $category->description = $request['description'];
        /*image edit*/
        if(empty($request['image'])){
            $category->image = $category->image;  //image fetch db
        }else{
            //new add image edit time
            $cat_img = time().'-'.$request['image']->getClientOriginalExtension();
            $img =  $request['image']->move('category_image',$cat_img);
            $category->image = $cat_img;
        }


        $category->status = $request['status'];
        $category->save();
        toastr()->info('Category Updated successfully', 'Category', ['timeOut' => 5000]);
        return redirect()->route('admin.category.list');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id)->delete();
        toastr()->error('Category Deleted successfully', 'Category', ['timeOut' => 5000]);
        return redirect()->route('admin.category.list');
    }
}
