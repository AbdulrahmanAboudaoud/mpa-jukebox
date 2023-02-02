
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Authentication</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/main.css">

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
                           <th></th>
                        </thead>
                           <tbody>
                            

                              
                    @foreach ($songs as $song)
                    @if ($song->category_id == $id)
                    <tr>
                    <td>{{$song->name}}</td>
                    <td>{{$song->artist}}</td>
                    <td>{{$song->duration}}</td>
                    <td><button class="btn btn-info" id="{{$song->id}}">+</button></td>
                    </tr>
                        <div id="myModal"class="modal">

                        <!-- Modal content -->
                    <div class="modal-content">
                        <span class="close">&times;</span>
                          
                          
                        <form action="{{url('add-Song')}}" method="POST"> 
                         @csrf
                            
                          
                          <input type="hidden" name="getSong" value="" id="hidden">


                          <input type="submit" value="add">
                          
                        
                        </form>
                        
                    </div>
                    
                        <script>
                            // Get the modal
                            var modal = document.getElementById("myModal");
                            
                            // Get the button that opens the modal
                            var btn = document.getElementById("{{$song->id}}");
                            
                            // Get the <span> element that closes the modal
                            var span = document.getElementsByClassName("close")[0];
                            
                                                 
                            // When the user clicks the button, open the modal 
                            btn.onclick = function() {
                            modal.style.display = "block";
                            document.getElementById('hidden').value = '{{$song->id}}';
                           
                            }
                            
                            // When the user clicks on <span> (x), close the modal
                            span.onclick = function() {
                            modal.style.display = "none";
                                                        
                            
                            }
                            
                            // When the user clicks anywhere outside of the modal, close it
                            window.onclick = function(event) {
                            if (event.target == modal) {
                                modal.style.display = "none";
                            }
                            }
                        </script> 
                    @endif
                    @endforeach 
                            
                        </tbody>
                    </table>
    	        </div>
            </div>
                   
    
            </div>
 
            </div>
        
               
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>    
</body>
</html>