<?php
function MakkingVideoId($givenUrl){

  $url = $givenUrl;
  $v_id = array();
  // $linkLength = ;

  for ($i = 0; $i < strlen($url); $i++){
    if ($url[$i]=='v'&& $url[$i+1]=='='){
      $index = $i+2;
      // || $url[$index]!='&'

      while ($index!=strlen($url)){
      array_push($v_id,$url[$index]);
      
      $index++;

    }

    }

    
}



$VideoId =   implode("",$v_id);
return $VideoId;
}
// $url = "https://www.youtube.com/watch?v=DgMZDWO9Qk8";
// echo "url = ".strlen($url);
$commentsSrc = "https://www.youtube.com/live_chat?v=Sz6IGZ1KbZI&embed_domain=".$_SERVER['HTTP_HOST'];
$streamSrc = "https://www.youtube.com/embed/Sz6IGZ1KbZI";

// ReceingFormDataToGenerateStreamId
if (isset($_POST['makeVideoId'])){
$url = $_POST['url'];
$streamId = MakkingVideoId($url);
$commentsSrc = "https://www.youtube.com/live_chat?v=".$streamId."&embed_domain=".$_SERVER['HTTP_HOST'];
$streamSrc = "https://www.youtube.com/embed/".$streamId;

}
echo $src;

// DOMAIN
// echo $_SERVER['HTTP_HOST'];
// fULLlINK
// echo $_SERVER['REQUEST_URI'];

?>




<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <script src="https://apis.google.com/js/platform.js" async defer></script>

    <meta name="google-signin-client_id" content="861769269826-f6ks8u0vjoun2ciorar79o3kka4nqtvi.apps.googleusercontent.com">

    
    <title>Webinar</title>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-12 bg-dark rounded mt-5 mb-2">
                <h1 class="text-center text-white fw-bold">Calculator & Webinar</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12 d-flex justify-content-end my-4">
                <button class="btn btn-primary" id="btnCalculator">Goto Calculator</button>
                <button class="btn btn-primary d-none" id="btnWebinar" >Goto Webinar</button>

            </div>
        </div>
        <div class="row d-flex justify-content-center">

            <div class="col-8 d-none" id="divCalculator">
              <h3 class="bg-dark text-white fw-bold text-center rounded p-3">Calculator</h3>

                <form method="post" action = "result.php">
  
                    <label  class="form-label">First number</label><br>
                    <input  class="form-control" type = 'number' name="n1"><br><br>
                    <label  class="form-label">Second number</label><br>
                    <input  class="form-control" type = 'number'  name="n2"><br><br>
                    <label  class="form-label"> Chose Op</label><br>
                    <select name="op"  class="form-select"><br>
                    <option value="+">Addition (+)</option>
                    <option value="-">Subtraction (-)</option>
                    <option value="*">Multiplicaton (x)</option>
                    <option value="/">Diviosn (/)</option>
                    <option value="/">Modulus (%)</option>
                    </select><br><br>
                    <input type = 'submit'>

                </form>
            </div>

            <div class="col-10"  id="divWebinar">
              <div class="row">

                <div class="col-12">
                  <h3 class="bg-dark text-white fw-bold text-center rounded p-3">Webinar</h3>
                </div>

              </div>

              <div class="row">
                <div class="row">
                  <div class="col-12">
                    <h6 class="my-3 bg-secondary text-white rounded p-3">Put your stream link here to watch your stream here with comments</h6>
                  <form method='post'>
                      <div class="my-3">
                        <label for="url" class="form-label">Stream URL</label>
                        <input type="text" class="form-control" name="url" >
                      </div>

                      <button type="submit" name="makeVideoId" class="btn mt-2 mb-5 btn-primary">Submit</button>
                  </form>
                    </div>
                </div>
                <div class="row">

                  <div class="col-12">

                    <h6 class="bg-success py-2 ps-3 text-white rounded ">Video </h6>        
                     <?php 
                      echo "<iframe width='100%' height='715' src='$streamSrc' title='YouTube video player' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe><br><iframe width='100%' height='715' src='$commentsSrc'></iframe>"; 

                      ?> 
                      
                  </div>
                </div>
                  
                <div class="col-6 ps-3">
                  <!-- <h6 class="bg-success py-2 ps-3 text-white rounded ">All Comments</h6> -->
                  <?php 
                          define('API_KEY','AIzaSyDQaaQXGPSW_4xTmz5x_lwxI0tNkBuDQag',true);
                          define('BASE_URL',"https://www.googleapis.com/youtube/v3/",true);

                          // $ApiKey = "AIzaSyDQaaQXGPSW_4xTmz5x_lwxI0tNkBuDQag";
                          function gettingAllreplies($parentId){

                            $CommentparentId=$parentId;
                      
                            $api_url = BASE_URL.'comments?part=snippet&parentId='.$CommentparentId.'&key='.API_KEY;
                          // echo $api_url;
                            $commentsReplies=  json_decode( file_get_contents($api_url));
                            $sigleReplyItems = $commentsReplies->items;
                          
                            $count  = count($sigleReplyItems);
                                          
                          for ($i=0;$i<$count;$i++){

                            // $replyParentId = $sigleReplyItems[$i]->id;
                            $replySnippet = $sigleReplyItems[$i]->snippet;

                            $textOriginal = $replySnippet->textOriginal;
                            echo "    ".++$i." : $textOriginal<br><br>";
                            $i--;

                          }


                          // echo"<pre>";
                          // print_r($sigleReplyItems);

                          }

                          function getTopLevelCommentsByVideoId(){
                          // $key = "AIzaSyDQaaQXGPSW_4xTmz5x_lwxI0tNkBuDQag";
                          // $base_url ="https://www.googleapis.com/youtube/v3/";
                          // $videoId='rZqUsFpdVLs';
                          $videoId='y3-wgCuqPWY';
                      
                          $api_url = BASE_URL.'commentThreads?part=snippet&videoId='.$videoId.'&key='.API_KEY;
                          // echo $api_url;
                          $commentsThread =  json_decode( file_get_contents($api_url));
                          echo"<pre>";
                      
                          $commentsArrayItems  = $commentsThread->items;
                          $count  = count($commentsArrayItems);
                                          
                      
                          for ($i=0;$i<$count;$i++){

                            $commentParentId = $commentsArrayItems[$i]->id;

                            $commentsSnippet = $commentsArrayItems[$i]->snippet;
                            $topLevelComments = $commentsSnippet->topLevelComment;
                            $TopCommentsSnippet = $topLevelComments->snippet;
                            $textOriginal = $TopCommentsSnippet->textOriginal;

                            if ($commentsSnippet->totalReplyCount>0){
                              
                              echo ++$i." : $textOriginal<br><br>";
                              gettingAllreplies($commentParentId);

                            }
                            else {
                              echo ++$i." : $textOriginal<br><br>";
                            }
                            $i--;
                            // print_r($textOriginal);
                          }
                                            
                          // $commentsSnippet = $commentsArrayItems[0]->snippet;
                          // $topLevelComments = $commentsSnippet->topLevelComment;
                          // $TopCommentsSnippet = $topLevelComments->snippet;
                          // $textOriginal = $TopCommentsSnippet->textOriginal;
                          // print_r($commentsThread);
                      
                      
                          }
                          // getTopLevelCommentsByVideoId();


                          // AllWork
                          // FunctionForExtractingVideoIdFromYoutubeLink;
                          

                  ?>
                  <!-- <form  method="post">
                    <input type="text" name='url'>
                    <button name="makeVideoId">go</button>
                  </form> -->
                  
                </div>

            </div>
                
                
                <!-- <div class="g-signin2" data-onsuccess="onSignIn"></div> 
                 <a href="#" onclick="signOut();">Sign out</a> -->




                <?php
                    function SearchResults(){
                      $key = "AIzaSyDQaaQXGPSW_4xTmz5x_lwxI0tNkBuDQag";
                      $base_url ="https://www.googleapis.com/youtube/v3/";
                      $channelId = "UCo5AYE6zfF61Davq2rl7CTw";
                      $maxResults=3;

                      $api_url = $base_url.'search?order=date&part=snippet&channelId='.$channelId.'&maxResults='.$maxResults.'&key='.$key;
                      $videos =  json_decode( file_get_contents($api_url));
                      echo"<pre>";
                      print_r( $videos);
                    } 
                

                    function getById(){
                        $key = "AIzaSyDQaaQXGPSW_4xTmz5x_lwxI0tNkBuDQag";
                        $base_url ="https://www.googleapis.com/youtube/v3/";
                        $videoId='rZqUsFpdVLs';
                        $api_url = $base_url.'videos?part=snippet&id='.$videoId.'&key='.$key;
                        echo $api_url;
                        $videos =  json_decode( file_get_contents($api_url));
                        echo"<pre>";
                        print_r( $videos);


                    }



                    
                    // getById();
                    // SearchResults();
                    // getCommentsByVideoId();

                    
                ?>

            </div>
            


        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>
      var btnCalculator = document.getElementById('btnCalculator');
      var btnWebinar = document.getElementById('btnWebinar');
      var divCalculator = document.getElementById('divCalculator');
      var divWebinar = document.getElementById('divWebinar');


      btnCalculator.addEventListener('click',function (){
          divCalculator.classList.remove('d-none');
          divWebinar.classList.add('d-none');  
          btnCalculator.classList.add('d-none');
          btnWebinar.classList.remove('d-none');      



      });
      btnWebinar.addEventListener('click',function (){
          divCalculator.classList.add('d-none');
          divWebinar.classList.remove('d-none');    
          btnCalculator.classList.remove('d-none');
          btnWebinar.classList.add('d-none');  

      });


  // googleSignIn

  function onSignIn(googleUser) {
    var profile = googleUser.getBasicProfile();
    console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
    console.log('Name: ' + profile.getName());
    console.log('Image URL: ' + profile.getImageUrl());
    console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
  }

    function signOut() {
      var auth2 = gapi.auth2.getAuthInstance();
      auth2.signOut().then(function () {
        console.log('User signed out.');
      });
    }

</script>
  </body>
</html>


