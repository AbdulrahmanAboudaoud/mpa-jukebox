



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
                <div class="col-md-4 col-md-offset-4" style="margin-top:20px;">
                    <table class="table">
                        <thead>
                           <th>Name</th>
                           <th>artist</th>
                           <th>duration</th>
                        </thead>
                           <tbody>
                            

                              
                    @foreach ($songs as $song)
                    @if ($song->category_id == $id)
                    <tr>
                    <td>{{$song->name}}</td>
                    <td>{{$song->artist}}</td>
                    <td>{{$song->duration}}</td>
                    </tr>
                    @endif 
                    @endforeach 
                            
                        </tbody>
                    </table>
    	        </div>
            </div>
                   
    
            </div>
        
        

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>    
</body>
</html>