<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customers;
use Illuminate\Pagination\Paginator;



class CustomerController extends Controller
{
    public function create(){
        $edit = '0';
        $url = url('/customer');
        $title = 'Customer Registration';
        $data = compact('url','title','edit');
        return view('customerform')->with($data);
    }
    public function store(Request $request )
    {
        // echo '<pre>';print_r($request->all()); 
        // Insert query
        $request->validate(
            [
                'name'=>'required',
                'email'=>'required|email',
                'gender'=>'required',
                'dob'=>'required|date',
                'address'=>'required',
            ]
        );
        $customers = new Customers;
        $customers->name = $request['name'];
        $customers->email = $request['email'];
        $customers->dob = $request['dob'];
        $customers->address = $request['address'];
        $customers->gender = $request['gender'];
        $customers->status = $request['status'];
        $customers->save();

        return redirect('/customer');
    }
    public function view(Request $request )
    {
        $search = $request['search'] ?? '';
        if($search != ''){
            $customers = Customers::where('name','LIKE',"%$search%")->orWhere('email','LIKE', "%$search%")->get();
        }else{
            Paginator::useBootstrap();
            $customers = Customers::orderBy('name')->Paginate(8);
        }
        $data = compact('customers','search');
        return view('customer_view')->with($data);
    }
    public function delete($id)
    {
        $customer = Customers::find($id);
        if(!is_null($customer)){
            $customer->delete();
        }
        return redirect('/customer');
    }
    public function force_delete($id)
    {
        $customer = Customers::withTrashed()->find($id);
        if(!is_null($customer)){
            $customer->forceDelete();
        }
        return redirect()->back();
    }
    public function restore($id)
    {
        $customer = Customers::withTrashed()->find($id);
        if(!is_null($customer)){
            $customer->restore();
        }
        return redirect('/customer');
    }
    public function edit($id)
    {
        $customer = Customers::find($id);
        if(is_null($customer)){
            return redirect('/customer');
        }else{
            $edit = '1';
            $url = url('/customer/update') . '/' . $id;
            $title = 'Update Customer';
            $data = compact('customer','url', 'title', 'edit');
            return view('/customerform')->with($data);
        }
    }
    public function update($id , Request $request)
    {
        $customers = Customers::find($id);
        $customers->name = $request['name'];
        $customers->email = $request['email'];
        $customers->dob = $request['dob'];
        $customers->address = $request['address'];
        $customers->gender = $request['gender'];
        $customers->status = $request['status'];
        $customers->save();

        return redirect('/customer');
    }
    public function trash()
    {
        $customers = Customers::onlyTrashed()->get();
        $data = compact('customers');
        return view('customer_trash')->with($data);
    }
}
