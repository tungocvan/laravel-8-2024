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
    <div class="main">
        @if (session('msg'))
            <div class="alert alert-outline-success">{{session('msg')}}</div>
        @endif 
        <div class="d-flex bg-200">
            <div class="p-2 flex-grow-1 bg-200 border border-400 row">
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card border border-primary">
                      <div class="card-body">
                        <h4 class="card-title">Primary Border Card </h4>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="{{ route('thuoc.trungthau') }}" class="btn btn-outline-primary me-1 mb-1" type="button">TRA CỨU THUỐC TRÚNG THẦU</a>
                      </div>
                    </div>
                 </div>        
                 
                </div>
            <div class="p-2 flex-grow-1 bg-200 border border-400">Flex item</div>
           
          </div>
    </div>


    <script>        
        document.addEventListener('DOMContentLoaded', function(event) {
            
        });
    </script>
</body>
</html>