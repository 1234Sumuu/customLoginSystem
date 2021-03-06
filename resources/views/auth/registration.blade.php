<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Authentication</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4" style="margin-top: 20px; ">
                <h3>Registration</h3>
                <hr/>
                <form action="{{route('register-user')}}" method="POST">
                    @if(Session::has('success'))
                        <div class="alert alert-success" >{{Session::get('success')}}</div>
                    @endif
                    @if(Session::has('fail'))
                    <div class="alert alert-danger" >{{Session::get('fail')}}</div>
                    @endif
                    @csrf
                    <div class="form-group">
                        <label for="name"> Enter Full Name *</label>
                        <input type="text" class="form-control" placeholder="Enter Your Full Name" name="name" value="{{old('name')}}">
                        <span class="text-danger"> @error ('name') {{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="email">Enter Email *</label>
                        <input type="name" class="form-control" placeholder="Enter Your Email" name="email" value="{{old('email')}}">
                        <span class="text-danger"> @error ('email') {{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="password">Enter Password *</label>
                        <input type="password" class="form-control" placeholder="Enter your password" name="password" value="{{old('password')}}">
                        <span class="text-danger"> @error ('password') {{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-block btn-primary">Register</button>
                    </div>
                    <br>
                    <a href="login"> Have an Account?</a>
                </form>  
            </div>
        </div>
    </div>
    
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

</html>