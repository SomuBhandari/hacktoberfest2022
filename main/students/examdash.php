<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Area | Batches</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"  crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <link href="../../assests/css/teacherdash.css" rel="stylesheet">
    <script src="http://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>
  </head>
  <body>
  <?php   
session_start();  
 
if(!isset($_SESSION["login"]) || $_SESSION["login"] != true){
    header("location: ./login.php");
    exit;
}
?> 
    <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="dashboard.php">Dashboard</a></li>
            <li class="active"><a href="batches.html">Batches</a></li>
            <li><a href="posts.html"></a></li>
            <li><a href="users.html"></a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Welcome, x</a></li>
            <li><a href="login.html">Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <header id="header">
      <div class="container">
        <div class="row">
          <div class="col-md-10">
            <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Batches<small></small></h1>
          </div>
          <div class="col-md-2">
            <div class="dropdown create">
                <div id="countdown" style="display: block;"></div>
              <!-- <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="modal" data-target="#addPage" aria-haspopup="true" aria-expanded="true">-->
              <!--  Add Students-->
              <!--</button> -->
            </div>
          </div>
        </div>
      </div>
    </header>

    <section id="breadcrumb">
      <div class="container">
        <ol class="breadcrumb">
          <li><a href="index.html">Dashboard</a></li>
           <li class="active">Pages</li> 
        </ol>
      </div>
    </section>

    <section id="main">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="list-group">
            <a href="index.html" class="list-group-item active main-color-bg">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard
              </a>
              <a href="batches.php" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Batches <span class="badge"></span></a>
              <a href="posts.html" class="list-group-item"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Students <span class="badge"></span></a>
            </div>

          </div>
          <div class="col-md-9">
             Website Overview 
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Batches</h3>
              </div>
              <div class="panel-body">
                <div class="row">
                    <div class="col-lg-2 col-lg-push-10">
                        <div id="current_que" style="float:left;">0</div>
                        <div style="float:left;"></div>
                        <div id="total_que" style="float:left;">0</div>
                    </div>
                    <div class="row" style="margin-top: 30px;">
                    <div class="row">
                        <div class="col-lg-10 col-lg-push-1" style="min-height: 300px;" id="load_questions">
                    </div>
                    </div>
                </div>
                <div class="row" style="margin-top: 10px;">
                        <div class="col-lg-6 col-lg-push-3" style="min-height: 50px;" id="load_questions">
                        <div class="col-lg-12 text-center">
                            <input type="button" class="btn btn-warning" value="Previous" onclick="load_previous();">&nbsp;
                            <input type="button" class="btn btn-success" value="Next" onclick="load_next();">
                        </div>
                    </div>
                    </div>
                  
                </div>
                <br>
                
              </div>
              </div>

          </div>
        </div>
      </div>
    </section>

    <footer id="footer">
      
    </footer>

    <!-- Modals -->

    <!-- Add Page -->
  

<script>
    CKEDITOR.replace( 'editor1' );
</script>
 
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <script>
    setInterval(function(){
        timer();
    },1000);
    function timer(){
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function(){
            if(xmlhttp.readyState==4 && xmlhttp.status==200){
               if(xmlhttp.responseText=="00:00:01"){
                   window.location="result.php";
               }
               document.getElementById("countdown").innerHTML=xmlhttp.responseText;

            }
        };

        xmlhttp.open("GET", "forajax/loadTimer.php");
        xmlhttp.send(null);

        }
        
    </script>
  <script>
      function load_total_que(){
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("total_que").innerHTML=xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","forajax/load_total_que.php",true);
        xmlhttp.send(null);
      }

      var question_no="1";
      load_questions(question_no);
      function load_questions(question_no){ 
          document.getElementById("current_que").innerHTML=question_no;
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                // document.getElementById("total_que").innerHTML=xmlhttp.responseText;
                if(xmlhttp.responseText=="over"){
                    window.location="result.php";
                }
                else{
                    document.getElementById("load_questions").innerHTML=xmlhttp.responseText;
                    load_total_que();
                }
            }
        };
        xmlhttp.open("GET","forajax/load_questions.php?question_no="+question_no,true);
        xmlhttp.send(null);
      }


      function radioclick(radiovalue,question_no){
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                // document.getElementById("total_que").innerHTML=xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","forajax/save_answer_in_session.php?question_no="+question_no+"&value1="+radiovalue,true);
        xmlhttp.send(null);
      }

      function load_previous(){
          if(question_no=="1"){
              load_questions(question_no);
          }
          else{
              question_no=eval(question_no)-1;
              load_questions(question_no);
          }
      }
      function load_next(){
        question_no=eval(question_no)+1;
              load_questions(question_no);
      }
  </script>
  </body>
</html>
