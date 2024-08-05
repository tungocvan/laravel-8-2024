<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        <div class="text-center mt-4 name"> HAMADA FORGOT PASSWORD  </div>
        <form class="p-4 mt-3">
            <div class="input-field d-flex align-items-center">
                <span class="far fa-user"></span> <input type="text" name="email" id="username" placeholder="Email">
            </div>
             <button class="btn mt-3">Reset Password</button>
        </form>
        <div class="text-center fs-6"> 
            <a href="{{ route('thuoc.register') }}">Sing up</a> or <a href="{{ route('thuoc.login') }}">Sign in</a> 
        </div>
    </div>
    <script>        
        document.addEventListener('DOMContentLoaded', function(event) {
            
        });
    </script>
</body>
</html>