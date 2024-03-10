<?php

namespace App\Http\Controllers\Admin\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Employee;
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::with('products')->orderBy('id','DESC')->get();

        return view('admin.employee.index', compact('employees'),['pageName' => 'Employees']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       $product = Product::where('status','Active')->get();
       return view('admin.employee.create',compact('product'),['pageName' => 'Add New Employee']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'fname' => 'required',
            'lname' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'email' => 'required','unique:users',
            'mono' => 'required',
            'department' => 'required',
            'status' => 'required',
            'image' => 'required',
            //'product' => 'required',
            // 'assigndate' => 'required',
            // 'quantity' => 'required',
            // 'condition' => 'required',
        ]);

        $emp_image = time().'-'.$request['image']->getClientOriginalExtension();
        $img =  $request['image']->move('employee_image',$emp_image);

        $employee = new Employee();
        $employee->fname =  $request['fname'];
        $employee->lname =  $request['lname'];
        $employee->gender =  $request['gender'];
        $employee->dob =  $request['dob'];
        $employee->email =  $request['email'];
        $employee->mono =  $request['mono'];
        $employee->department =  $request['department'];
        $employee->status =  $request['status'];
        $employee->image =  $emp_image;
        // $employee->product_id =  $request['product'];
        // $employee->assigndate =  $request['assigndate'];
        // $employee->quantity =  $request['quantity'];
        // $employee->condition =  $request['condition'];
        $employee->save();
        //$employee->products()->attach($employee->product_id);
       //dd($request->all());
        foreach($request->assign_product as $data){
            $employee->products()->attach($data['product'],[
                'assigndate' => $data['assigndate'],
                'quantity' => $data['quantity'],
                'condition' => $data['condition'],
            ]);
            //dd($employee->products());
        }
        toastr()->success('Employee Added successfully', 'Employee', ['timeOut' => 5000]);
       return redirect()->route('admin.employee.list');
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
        $employee = Employee::with('products')->find($id);
        $product = Product::all();
        return view('admin.employee.edit',compact('employee','product'),['pageName' => 'Edit Employee']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //dd($product);
        $employee = Employee::with('products')->find($id);
        $employee->fname =  $request['fname'];
        $employee->lname =  $request['lname'];
        $employee->gender =  $request['gender'];
        $employee->dob =  $request['dob'];
        $employee->email =  $request['email'];
        $employee->mono =  $request['mono'];
        $employee->department =  $request['department'];
        $employee->status =  $request['status'];
         /*image edit*/
         if(empty($request['image'])){
            $employee->image =  $employee->image;
        }else{
            //new add image edit time
            $emp_image = time().'-'.$request['image']->getClientOriginalExtension();
            $img =  $request['image']->move('employee_image',$emp_image);
            $employee->image = $emp_image;
        }
        //  dd($employee);
        $employee->save();
        //$employee->products()->attach($employee->product_id);

        //update pivot table
        if($employee->products->isEmpty()){
            $employee->products()->detach();
        }
        if($employee->products->isEmpty()){
            foreach($request->assign_product as $data){
                $employee->products()->attach($data['product'],[
                    'assigndate' => $data['assigndate'],
                    'quantity' => $data['quantity'],
                    'condition' => $data['condition'],
                ]);
            }
        }else{

            foreach($request->assign_product as $data){
                //if($data->pivot->product_id && $data->pivot->employee_id !== ''){
                    $employee->products()->updateExistingPivot($data['product'],[
                        //'product_id' => $data['product'],
                        'assigndate' => $data['assigndate'],
                        'quantity' => $data['quantity'],
                        'condition' => $data['condition'],
                    ]);
                    //dd($employee->products);
                // }else{
                //     dd('errno');
                // }

            }
            // toastr()->info('Employee Updated successfully', 'Employee', ['timeOut' => 5000]);
            // return redirect()->route('admin.employee.list');
        }

       toastr()->info('Employee error successfully', 'Employee', ['timeOut' => 5000]);
       return redirect()->route('admin.employee.list');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employee = Employee::with('products')->find($id);
        if ($employee) {
            $employee->products()->detach();
            $employee->delete();
            toastr()->error('Employee Deleted successfully', 'Employee', ['timeOut' => 5000]);
            return redirect()->route('admin.employee.list');
        } else {
            toastr()->warning('Employee Not Deleted successfully', 'Employee', ['timeOut' => 5000]);
            return redirect()->route('admin.employee.list');
        }
    }
}
