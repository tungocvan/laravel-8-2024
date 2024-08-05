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
        <div class="icon">
            <img src="https://www.freepnglogos.com/uploads/512x512-logo-png/512x512-logo-github-icon-35.png" alt="">
        </div>
        <div class="text-center mt-4 name"> HAMADA REGISTER </div>
        <form class="p-4 mt-3">
            <div class="input-field d-flex align-items-center">
                 <span class="fas fa-user"></span> <input type="text" name="username" id="username" placeholder="username">
            </div>
            <div class="input-field d-flex align-items-center">
                <span class="far fa-user"></span> <input type="text" name="email" id="username" placeholder="Email">
            </div>
            <div class="input-field d-flex align-items-center">
                 <span class="fas fa-key"></span> <input type="password" name="password" id="pwd" placeholder="Password">
            </div>
            <div class="input-field d-flex align-items-center">
                 <span class="fas fa-key"></span> <input type="password" name="co-password" id="pwd" placeholder="Confirm Password">
            </div>
             <button class="btn mt-3">Register</button>
        </form>
        <div class="text-center fs-6"> 
            <a href="{{ route('thuoc.forgot') }}">Forgot password?</a> or <a href="{{ route('thuoc.login') }}">Sign in</a> 
        </div>
    </div>
    <script>        
        document.addEventListener('DOMContentLoaded', function(event) {
            
        });
    </script>
</body>
</html>