<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <form action="{{url('/')}}/register" method="post">
       @csrf 
      
     
      <div class="container">
        <h1 class="text-center">Registration</h1>
           <x-input type="text" name="name" label="Please Enter Your Name" />
           <x-input type="email" name="email" label="Please Enter Your email" />
           <x-input type="password" name="password" label="Please Enter Your password" />
           <x-input type="password" name="password_confirmation" label="Confirm Password" />
           
      <button class="btn btn-primary">Submit</button>
</form>
  </body>
</html>