<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Employee;
use App\Models\Invetory_History;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$product = Product::all();
        $product = Product::with('employees')->join('categories', 'products.category', '=', 'categories.id')
        ->select('products.*', 'categories.name as category')->orderBy('id','DESC')->get();
        //$product = Product::with('employeesData')->orderBy('id','DESC')->get();
        //dd($product);
        return view('admin.product.index',compact('product'),['pageName' => 'Products']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::where('status','Active')->get();
        //$employee = Employee::where('status','Active')->get();
        $employee = Employee::with('products')->where('status','Active')->orderBy('id','DESC')->get();
        //dd($employee);
        return view('admin.product.create',compact('category','employee'),['pageName' => 'Add New Product']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'category' => 'required',
            //'assign_to' => 'required',
            'comment' => 'required',
            'condition' => 'required',
            'quantity' => 'required',
            'inventory_no' => 'required',
            'brand' => 'required',
            'image' => 'required',
            'purchase_price' => 'required',
            'purchase_date' => 'required',
            //'warranty' => 'required',
            'company' => 'required',
            'owner_name' => 'required',
            'phone' => 'required',
        ]);


        $product_image = time().'-'.$request['image']->getClientOriginalExtension();
        $img =  $request['image']->move('product_image',$product_image);

        $product = new Product();
        $product->name = $request['name'];
        $product->category = $request['category'];
        $product->assign_to = $request['assign_to'];
        $product->comment = $request['comment'];
        $product->condition = $request['condition'];
        $product->quantity = $request['quantity'];
        $product->inventory_no = $request['inventory_no'];
        $product->brand = $request['brand'];
        $product->image = $product_image;
        $product->status = $request['status'];
        $product->purchase_price = $request['purchase_price'];
        $product->purchase_date = $request['purchase_date'];
        $product->warranty = $request['warranty'];
        $product->duration = $request['duration'];
        $product->start_date = $request['start_date'];
        $product->end_date = $request['end_date'];
        $product->company = $request['company'];
        $product->owner_name = $request['owner_name'];
        $product->phone = $request['phone'];
        $product->save();

        // $imv_history = new Invetory_History();
        // $imv_history->item_id = $request['id'];
        // $imv_history->image = $product_image;
        // $imv_history->title = $request['name'];
        // $imv_history->assign = $request['assign_to'];
        // $imv_history->assigndate = $request['created_at'];
        // $imv_history->returndate = $request['created_at'];
        // $imv_history->reson = $request['name'];
        // $imv_history->condition = $request['condition'];
        // $imv_history->duration = $request['duration'];
        // $imv_history->save();




        toastr()->success('Product Added successfully', 'Product', ['timeOut' => 5000]);
        return redirect()->route('admin.product.list');
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
        $product = Product::find($id);
        $category = Category::all();
        $employee = Employee::all();
        return view('admin.product.edit',compact('product','category','employee'),['pageName' => 'Edit Product']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'category' => 'required',
            'assign_to' => 'required',
            'comment' => 'required',
            'condition' => 'required',
            'quantity' => 'required',
            'inventory_no' => 'required',
            'brand' => 'required',
            'purchase_price' => 'required',
            'purchase_date' => 'required',
            'company' => 'required',
            'owner_name' => 'required',
            'phone' => 'required',
        ]);

        $product = Product::find($id);
        $product->name = $request['name'];
        $product->category = $request['category'];
        $product->assign_to = $request['assign_to'];
        $product->comment = $request['comment'];
        $product->condition = $request['condition'];
        $product->quantity = $request['quantity'];
        $product->inventory_no = $request['inventory_no'];
        $product->brand = $request['brand'];

        if(empty($request['image'])){
            $product->image = $product->image;  //image fetch db
        }else{
            //new add image edit time
            $product_image = time().'-'.$request['image']->getClientOriginalExtension();
            $img =  $request['image']->move('product_image',$product_image);
            $product->image = $product_image;
        }


        $product->status = $request['status'];
        $product->purchase_price = $request['purchase_price'];
        $product->purchase_date = $request['purchase_date'];
        $product->warranty = $request['warranty'];
        $product->duration = $request['duration'];
        $product->start_date = $request['start_date'];
        $product->end_date = $request['end_date'];
        $product->company = $request['company'];
        $product->owner_name = $request['owner_name'];
        $product->phone = $request['phone'];
        $product->save();
        toastr()->info('Product Updated successfully', 'Product', ['timeOut' => 5000]);
        return redirect()->route('admin.product.list');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id)->delete();
        toastr()->error('Product Deleted successfully', 'Product', ['timeOut' => 5000]);
        return redirect()->route('admin.product.list');
    }
}
