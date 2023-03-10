
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Authentication</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
        @include('/layout/header')
    
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @foreach ($categories as $cat)

                    <div class="card my-4 " style="width: 15rem;  display:inline-block;">
                        <div class="card-body">
                        <h5 class="card-title text-center fw-bold">{{ $cat->name}} </h5>
                        
                        <a href="{{ url('song/'.$cat->id) }}" class="btn btn-success">check out {{ $cat->name}} songs here</a>
                        </div>
                    </div>
                    
                    @endforeach 
                </div>
            </div>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>    
</body>
</html>