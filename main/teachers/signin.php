<?php
  if(isset($_POST['submit'])){
    $db = mysqli_connect("localhost","u414334225_admin","Learnenmet@123","u414334225_learnenmet");
    if(!$db){
        echo "Database Connection failed";
    }
    $email = $_POST['email'];
    $password = $_POST['password'];
    $pass=md5($password);
    echo $password ,'<br>';
    echo $pass;
     $query  = "SELECT *FROM teachers WHERE email = '".$email."' ";
     $res  = mysqli_query($db,$query);
     $data = mysqli_fetch_array($res);
     $count = mysqli_num_rows($res);
     if($count>=1){
     $query  = "SELECT *FROM teachers WHERE email = '".$email."' AND password = '".$pass."'";
     $res  = mysqli_query($db,$query);
     $data = mysqli_fetch_array($res,MYSQLI_ASSOC);
     $count = mysqli_num_rows($res);
      
     if($count==1){
         	
         echo json_encode("login success");  
        
         $_SESSION["loggedin"] = true;
         $_SESSION['sess_user']=$email;
         $_SESSION["pass"] = $pass; 
         header("Location: ./admin/dashboard.php");
      }else {
         echo json_encode("false");
     }
       
     }else {
         echo json_encode("dont have an account");
         }	
          
  }

?>