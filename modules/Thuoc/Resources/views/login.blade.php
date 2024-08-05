<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link rel="stylesheet" href="/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="wrapper">
        @if (session('msg'))
            <div class="alert alert-outline-success">{{session('msg')}}</div>
        @endif 
        <div class="icon">
            <img src="https://www.freepnglogos.com/uploads/512x512-logo-png/512x512-logo-github-icon-35.png" alt="">
        </div>
        <div class="text-center mt-4 name"> HAMADA LOGIN </div>
        <form class="p-3 mt-3" method="POST" action="{{ route('thuoc.login-post')}}">
            @csrf
            <div class="input-field d-flex align-items-center">
                <span class="far fa-user"></span> <input type="text" name="email" id="userName" placeholder="Email">
            </div>
            <div class="input-field d-flex align-items-center"> <span class="fas fa-key"></span> 
                <input type="password" name="password" id="pwd" placeholder="Password">
             </div>
              <button class="btn mt-3">Login</button>
        </form>
        <div class="text-center fs-6"> 
            <a href="{{ route('thuoc.forgot') }}">Forgot password?</a> or <a href="{{ route('thuoc.register') }}">Sign up</a> 
        </div>
    </div>


    <script>        
        document.addEventListener('DOMContentLoaded', function(event) {
            
        });
    </script>
</body>
</html>