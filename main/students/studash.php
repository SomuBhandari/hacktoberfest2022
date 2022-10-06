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
    header("location: ../login.php");
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
              <!-- <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="modal" data-target="#addPage" aria-haspopup="true" aria-expanded="true">
                Add Students
              </button> -->
            </div>
          </div>
        </div>
      </div>
    </header>

    <section id="breadcrumb">
      <div class="container">
        <ol class="breadcrumb">
          <li><a href="index.html">Dashboard</a></li>
          <!-- <li class="active">Pages</li> -->
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
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Batches</h3>
              </div>
              <div class="panel-body">
                <div class="row">
                      <div class="col-md-12">
                          <input class="form-control" type="text" placeholder="Filter Batches...">
                      </div>
                </div>
                <br>
                <?php
                $db = mysqli_connect("localhost","u414334225_admin","Learnenmet@123","u414334225_learnenmet");
                if (mysqli_connect_errno()){
                  echo "Failed to connect to MySQL: " . mysqli_connect_error();
                }
                $bid = intval($_GET['id']);
                $result = mysqli_query($db,"SELECT b.batch_name from batches b JOIN student_details s on s.student_batch=b.id where s.student_email=(SELECT email from student where user_name='{$_SESSION['sess_user']}')");
                
                echo "<table class='table table-striped table-hover'>
                <tr>
                  <th>Batches Enrolled</th>
              
                </tr>";
                while($row = mysqli_fetch_array($result)){
                  echo "<tr>";
                  echo "<td>" . $row['batch_name'] . "</td>";
                 
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
  </body>
</html>
