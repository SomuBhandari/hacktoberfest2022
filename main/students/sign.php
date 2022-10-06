<?php
  if(isset($_POST['submit'])){
    $db = mysqli_connect("localhost","u414334225_admin","Learnenmet@123","u414334225_learnenmet");
    if(!$db){
        echo "Database Connection failed";
    }
    $uname = $_POST['uname'];
    $password = $_POST['pass'];
    $pass=md5($password);
    echo $password ,'<br>';
    echo $pass;
     $query  = "SELECT *FROM student WHERE user_name = '".$uname."' ";
     $res  = mysqli_query($db,$query);
     $data = mysqli_fetch_array($res);
     $count = mysqli_num_rows($res);

     if($count>=1){
     $query  = "SELECT *FROM student WHERE email = '".$uname."' AND password = '".$pass."'";
     $res  = mysqli_query($db,$query);
     $data = mysqli_fetch_array($res,MYSQLI_ASSOC);
     $count = mysqli_num_rows($res);
      
     if($count==1){
         	
         echo json_encode("login success");  
        
         $_SESSION["login"] = true;
         $_SESSION['sess_user']=$uname;
         $_SESSION["pass"] = $pass; 
        //  header("Location: ./admin/dashboard.php");
      }else {
         echo json_encode("false");
     }
       
     }else {
         echo json_encode("dont have an account");
         }	
          
  }

?>