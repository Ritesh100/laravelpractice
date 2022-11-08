<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class RegistrationController extends Controller
{
    public function forms(){
        return view('form');

    }
    //create
    public function customer(){
        $url = url('/customer');
      
        $title ="Customer Registration";
        $data = compact('url','title');
        return view('customer')->with($data);
     
    }

    public function register(Request $request){
        $request->validate(
            [
                'name' => 'required ',
                'email' =>'required |email',
                'password'=>'required| confirmed',
                'password_confirmation'=> 'required',
                'country'=>'required',
                'state'=>'required',
                'address'=>'required',
               
                'dob'=>'required'
            ]
        );
 print_r($request ->all());
    }
    public function store(Request $request)
{
   
    //Insert Query
    $customer =new Customer;
    $customer->name=$request['name'];
    $customer->email=$request['email'];
    $customer->address=$request['address'];
    $customer->country=$request['country'];
    $customer->state=$request['state'];
    $customer->dob=$request['dob'];
    $customer->password=md5($request['password']);
   $customer->save(); 
return redirect('/customer/view');
}
public function view(){
    $customer =Customer ::all();
    $data = compact('customer');
    return view('customer-view')->with(($data));
}
//delete
public function delete($id){
$customer=Customer :: find($id);
if(!is_null($customer)){
    $customer->delete(); 
}
return redirect('/customer/view');
}
//force-delete
//delete
public function forceDelete($id){
    $customer=Customer ::withTrashed()-> find($id);
    if(!is_null($customer)){
        $customer->forceDelete(); 
    }
    return redirect('/customer/view');
    }

    
//restore
public function restore($id){
    $customer=Customer ::withTrashed()-> find($id);
    if(!is_null($customer)){
        $customer->restore(); 
    }
    return redirect('/customer/view');
    }

//edit ko function
public function edit($id){
    $customer =Customer::find($id);
    if(is_null($customer)){
        return redirect('/customer/view');

    }else{
        $title ="Update Customer";
        $url=url('/customer/update')."/".$id;
        $data = compact('customer','url','title');
        return view('edit')->with($data);

    }
}
//for update
public function update($id,Request $request){
    $customer =Customer::find($id);
    $customer->name=$request['name'];
    $customer->email=$request['email'];
    $customer->address=$request['address'];
    $customer->country=$request['country'];
    $customer->state=$request['state'];
    $customer->dob=$request['dob']; 
   $customer->save(); 
   return redirect('/customer/view');
}

public function trash(){
    $customers = Customer::onlyTrashed()->get();
    $data = compact('customers');
    return view('customer-trash')->with($data);
}
}

