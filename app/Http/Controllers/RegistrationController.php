<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class RegistrationController extends Controller
{
    public function forms(){
        return view('form');

    }
    public function customer(){
        return view('customer');
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
                'address'=>'required|in:male,female,other',
                'gender'=>'required',
                'dob'=>'required'
            ]
        );
 print_r($request ->all());
    }
    public function store(Request $request)
{
    echo "<pre>";
    print_r($request->all());
    //Insert Query
    $customer =new Customer;
    $customer->name=$request['name'];
    $customer->email=$request['email'];
    $customer->gender=$request['gender'];
    $customer->address=$request['address'];
    $customer->country=$request['country'];
    $customer->state=$request['state'];
    $customer->dob=$request['dob'];
    $customer->password=md5($request['password']);
   $customer->save(); 
}
}

