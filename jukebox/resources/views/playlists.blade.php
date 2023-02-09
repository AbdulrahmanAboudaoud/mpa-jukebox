

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
            <div class="grid-2" style="margin-top:20px;">
                @foreach ($playlists as $playlist)
                <div class="playlist">
                <h5>{{$playlist->name}}</h5>

                @php
           
           
                $total = DB::select("SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(duration))) FROM songs JOIN betweens ON songs.id=betweens.song_id && betweens.playlist_id = $playlist->id;");
                $sumstring = 'SEC_TO_TIME(SUM(TIME_TO_SEC(duration)))';
                $array = json_decode(json_encode($total[0]), true);
                $arraySum = $array[$sumstring];
                
            
                   
                @endphp


                <p class="duration text-warning "><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-alarm" viewBox="0 0 16 16">
                    <path d="M8.5 5.5a.5.5 0 0 0-1 0v3.362l-1.429 2.38a.5.5 0 1 0 .858.515l1.5-2.5A.5.5 0 0 0 8.5 9V5.5z"/>
                    <path d="M6.5 0a.5.5 0 0 0 0 1H7v1.07a7.001 7.001 0 0 0-3.273 12.474l-.602.602a.5.5 0 0 0 .707.708l.746-.746A6.97 6.97 0 0 0 8 16a6.97 6.97 0 0 0 3.422-.892l.746.746a.5.5 0 0 0 .707-.708l-.601-.602A7.001 7.001 0 0 0 9 2.07V1h.5a.5.5 0 0 0 0-1h-3zm1.038 3.018a6.093 6.093 0 0 1 .924 0 6 6 0 1 1-.924 0zM0 3.5c0 .753.333 1.429.86 1.887A8.035 8.035 0 0 1 4.387 1.86 2.5 2.5 0 0 0 0 3.5zM13.5 1c-.753 0-1.429.333-1.887.86a8.035 8.035 0 0 1 3.527 3.527A2.5 2.5 0 0 0 13.5 1z"/>
                  </svg>  duration: <?php echo  $arraySum;?></p>
           
                    
                
                <div class="editList">
                <a href="{{url('delete-Playlists/'.$playlist['id'])}}">Delete Play list<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                  </svg></a>
                  
                <button  id="{{$playlist->id}}" href="" class="modalBtn text-success">Change Play list name <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                  </svg></button> 
                  
                 

                    <!-- The Modal -->
                    

                    <!-- Modal content -->
                    <div id="myModal"class="modal">

                      <!-- Modal content -->
                  <div class="modal-content">
                      <span class="close">&times;</span>
                        
                   
                        

                        <form  method="post" action="{{url('update-Playlists')}}">
                         @csrf
                        <label for="name">New Name:</label>
                        <input type="text" name="name" id="name">
                        <input type="hidden" name="id" id="hidden" value="{{$playlist->id}}">
                        <input  class ="btn btn-success" type="submit" value="Submit">
                        
                        
                        </form>
                    

                    </div>
                    <script>
                  var modal = document.getElementById("myModal");
                            
                            // Get the button that opens the modal
                            var btn = document.getElementById("{{$playlist->id}}");
                            
                            // Get the <span> element that closes the modal
                            var span = document.getElementsByClassName("close")[0];
                            
                                                 
                            // When the user clicks the button, open the modal 
                            btn.onclick = function() {
                            modal.style.display = "block";
                            document.getElementById('hidden').value = '{{$playlist->id}}';
                           
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
                    </div>


                </div>  
                <table class="table">

                    <thead>
                       <th>Name</th>
                       <th>artist</th>
                       <th>duration</th>
                       <th></th>
                       
                    </thead>
                       <tbody>
                        

                          
               
                @foreach ($between as $bet)
                @foreach ($songs as $song)
               
                @if ($bet->song_id == $song['id'])
                @if ($bet->playlist_id== $playlist->id)
                <tr>
                <td>{{$song['name']}}</td>
                <td>{{$song['artist']}}</td>
                <td>{{$song['duration']}}</td>
                <td><a href="{{url('delete-Playlist-song/'.$song['id'].'/'.$playlist['id'])}}">Delete<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                  </svg></a></td>
                
                </tr>
                    <div id="myModal"class="modal">
                    
                    <!-- Modal content -->
                <div class="modal-content">
                    <span class="close">&times;</span>
                    @endif
                    @endif
                    @endforeach
                    @endforeach 
                   
                    
                    </tbody>
                     
                    </table>
                </div>
                    @endforeach 
                       
    	        </div>
            </div>
                   
    
            </div>
    
            
    
            
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>    
</body>
</html>