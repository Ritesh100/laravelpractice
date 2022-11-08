<!doctype html>
<html lang="en">
  <head>
    <title>Customer Trash</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  
</head>
  <body>
    @extends('layout.main')
  @section('main-section')
      <div class="container">
        <a href="{{'/customer'}}">
        <button class="btn btn-primary d-inline-block m-2 float-right">Add</button>
</a>
<a href="{{'/customer/view'}}">
        <button class="btn btn-primary d-inline-block m-2 float-right">Customer View</button>
</a>


        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Country</th>
                    <th>State</th>
                    <th>Address</th>
                    <th>DOB</th>
                    <th>Status</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach($customers as $customer)
                
                <tr>
                    <td>{{$customer->name}}</td>
                    <td>{{$customer->email}}</td>
                    <td>{{$customer->country}}</td>
                    <td>{{$customer->state}}</td>
                    <td>{{$customer->address}}</td>
                    <td>{{$customer->dob}}</td>
                    <td>
                  @if($customer->status =="1")
                 <a href=""></a>
                    <span class="badge badge-success">Active</span>
</a>
                  @else
                  <a href="">
                    <span class="badge badge-danger">Inactive</span>
</a>
                  @endif
                  </td>
                    <td>
                      <a href="{{route('customer.restore',['id'=>$customer->customer_id])}}">
                    <button class="btn btn-primary" >Restore</button></a>
                    <a href="{{url('/customer/force-delete/')}}/{{$customer->customer_id}}">
                      <buttin class="btn btn-danger" >Delete </buttin>
                    </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
      </div>
@endsection
  </body>
</html>