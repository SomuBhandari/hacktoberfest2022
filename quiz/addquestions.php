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
// session_start();  
 
// if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] != true){
//   header("location: ../login.php");
//   exit;
// } 
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
            <li class="active"><a href="question.php">Add Question</a></li>
            <!-- <li><a href="posts.html">Students</a></li>
            <li><a href="users.html">Users</a></li> -->
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
            <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Add Questions<small></small></h1>
          </div>
          <div class="col-md-2">
            <div class="dropdown create">
              <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="modal" data-target="#addPage" aria-haspopup="true" aria-expanded="true">
                Add Exam
              </button>
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
              <!-- <a href="posts.html" class="list-group-item"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Students <span class="badge"></span></a> -->
            </div>

          </div>
          <div class="col-md-9">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Questions</h3>
              </div>
              <div class="panel-body">
                <div class="row">
                      
                </div>
                <br>
                
                <div class="modal-content">
      <form method="POST" action="">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Batch</h4>
      </div>
      <div class="modal-body">
      <div class="form-group">
          <label>Question</label>
          <input type="text" class="form-control" placeholder="Question" name='question'>
        </div>
        <div class="form-group">
          <label>Option1</label>
          <input type="text" class="form-control" placeholder="Option1" name='opt1'>
        </div>
        <div class="form-group">
          <label>Option2</label>
          <input type="text" class="form-control" placeholder="Option2" name='opt2'>
        </div>
        <div class="form-group">
          <label>Option3</label>
          <input type="text" class="form-control" placeholder="Option3" name='opt3'>
        </div>
        <div class="form-group">
          <label>Option4</label>
          <input type="text" class="form-control" placeholder="Option4" name='opt4'>
        </div>
        <div class="form-group">
          <label>Answer</label>
          <input type="text" class="form-control" placeholder="answer" name='answer'>
        </div>
      </div>
      <div class="modal-footer">
        
        <button type="submit" name='submit' class="btn btn-primary">Save changes</button>
      </div>
    </form>
    </div>
               
              </div>
              </div>
             
              
          </div>
          <div class="col-md-9">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Exams</h3>
              </div>
              <div class="panel-body">
                <div class="row">
                      <div class="col-md-12">
                          <input class="form-control" type="text" placeholder="Filter Batches...">
                      </div>
                </div>
                <br>
                <?php
                $db = mysqli_connect("localhost","u414334225_quizadmin","SomeshB@405","u414334225_quiz");

                if (mysqli_connect_errno()){
                  echo "Failed to connect to MySQL: " . mysqli_connect_error();
                }
                $result = mysqli_query($db,"SELECT * FROM `questions` WHERE `id`=$id");
                echo "<table class='table table-striped table-hover'>
                <tr>
                  <th>#</th>
                  <th>Question</th>
                  <th>Option1</th>
                  <th>Option2</th>
                  <th>Option3</th>
                  <th>Option4</th>
                </tr>";
                while($row = mysqli_fetch_array($result)){
                  $count=$count+1;
                  echo "<tr>";
                  echo "<td>"  .$count. "</td>";
                  echo "<td>" . $row['question'] . "</td>";
                  echo "<td>" . $row['opt1'] . "</td>";
                  echo "<td>" . $row['opt2'] . "</td>";
                  echo "<td>" . $row['opt3'] . "</td>";
                  echo "<td>" . $row['opt4'] . "</td>";
                  echo "</tr>";
                }
                echo "</table>";
               
                ?>

               
              </div>
              </div>
             
              
          </div>
        </div>
      </div>
    </section>



    <footer id="footer">
      
    </footer>

<?php
$id=$_GET['id'];
$res1=mysqli_query($db,"SELECT * FROM `exam_category` WHERE `id`=$id");
while($row=mysqli_fetch_array($res1)){
    $exam_category=$row['category'];
}
if(isset($_POST[submit])){
    $loop=0;
    $count=0;
    $db = mysqli_connect("localhost","u414334225_quizadmin","SomeshB@405","u414334225_quiz");
    $res = mysqli_query($db, "SELECT * FROM `questions` WHERE `category`='$exam_category' order by id asc");

    $count=mysqli_num_rows($res);
    if($count==0){

    }
    else{
        while($row1=mysqli_fetch_array($res)){
            $loop=$loop+1;
            mysqli_query($db, "UPDATE `questions` SET `question_no`=$loop where id=$row1[id]");
        }
    }
    $loop=$loop+1;
    mysqli_query($db,"INSERT INTO `questions`(`question_no`, `question`, `opt1`, `opt2`, `opt3`, `opt4`, `answer`, `category`) VALUES ('$loop','$_POST[question]', '$_POST[opt1]', '$_POST[opt2]', '$_POST[opt3]', '$_POST[opt4]', '$_POST[answer]', '$exam_category')");
    echo "<script>
alert('question added');
window.location='addquestions.php?id=$id';</script>";
}

?>
<script>
    CKEDITOR.replace( 'editor1' );
</script>

    <!-- Bootstrap core JavaScript
    ================================================== --> 
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </body>
</html>
