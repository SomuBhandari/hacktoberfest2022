<?php
    if(isset($_POST['stureg'])){
      $db = mysqli_connect("localhost","u414334225_admin","Learnenmet@123","u414334225_learnenmet");
         

   if(!$db){
	   echo "Database Connection failed";
   }

   $full_name = $_POST['uname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $pass = md5($password);
   echo $full_name, "<br>";
   echo $email,"<br>";
   echo $password,"<br>";
   echo $pass,"<br>";
   
  $sql = "SELECT * FROM `student_details` WHERE `student_email`='$email'";
// $sql = "SELECT * FROM `student` WHERE `email`='$email'";
   $res = mysqli_query($db,$sql);

     $count1 = $count = mysqli_num_rows($res);
    echo $sql;
    echo $result;
    echo $count1;
    if($count >= 1) {
        $query1="SELECT * FROM `student` WHERE `email`='$email'";
     $result = mysqli_query($db,$query1);
     $row1 = mysqli_num_rows($result);
     echo $row1;
     if($row1==1){
         echo json_encode("Error");
     }
     else{
         $insert = "INSERT INTO `student`(`user_name`, `email`, `password`) VALUES ('$full_name','$email','$pass')";
         $query = mysqli_query($db,$insert);
         if($query){
             echo json_encode("Sucess");
              header("Location: ./login.php");
         }else {
            echo "error";
         }
     }
    }
    }