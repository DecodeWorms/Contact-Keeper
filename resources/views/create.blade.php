@extends('appBase')
@section('body')
<div class = "container">
<div class = "content-justify-center">
  <div class =" card">
     <div class = "card-header">
       <nav class = "nav">
       <a class = "nav-link disabled" href = "#">Contact Keeper</a>
       <a class = "nav-link disabled ml-5" href = "#">Sign Up</a>
       <a class = "nav-link disabled ml-5  float-right" href = "#"></a>
       </nav>
     </div>
     <div class = "card-body">
     <form action = "{{url('/create')}}" method = "post" >
        @csrf
      <label for="firsName">First Name</label>
      <small class = "text-danger">{{$errors->first('firstName')}}</small>
      <input type="text" class="form-control" name="firstName" placeholder="First Name"><br><br>

    <label for="lastName">Last Name</label>
    <small class = "text-danger">{{$errors->first('lastName')}}</small>
    <input type="text" class="form-control" name="lastName" placeholder="Last Name"><br><br>

    <label for="phoneNumber">Phone Number</label>
    <small class = "text-danger">{{$errors->first('phoneNumber')}}</small>
    <input type="text" class="form-control" name="phoneNumber" placeholder="Phone Number"><br><br>

    <label for="email">Email</label>
    <small class = "text-danger">{{$errors->first('email')}}</small>
    <input type="email" class="form-control" name="email" placeholder="Email"><br><br>


      <label for="password">Password</label>
      <small class = "text-danger">{{$errors->first('password')}}</small>
      <input type = "password" class = "form-control" name = "password" placeholder = "******"><br><br>

  <button type="submit" class="btn btn-primary">SUBMIT</button>
</form>
     </div>
  </div>
</div>
</div>
@endsection()