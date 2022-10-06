<?php
    if(isset($_POST['submit'])){
      $db = mysqli_connect("localhost","u414334225_quizadmin","SomeshB@405","u414334225_quiz");
   if(!$db){
	   echo "Database Connection failed";
   }
   $category = $_POST['category'];
   $time = $_POST['time'];
   session_start();
   $_SESSION['batchname']=$batch;

   $sql = "SELECT * FROM `exam_category` WHERE `category` = '".$category."'";
   $result = mysqli_query($db,$sql);
   $count = mysqli_num_rows($result);
   
   if($count == 1) {
	   echo json_encode("Error");
   }else {
	   $insert = "INSERT INTO `exam_category` (`category`, `exam_time_in_minutes`) VALUES ('$category','$time')";
   $query = mysqli_query($db,$insert);
   if($query){
      echo json_encode("Sucess");
      header("Location: ./admin/batches.php");
   }else {
      echo "error";
   }
   
   }
    }
   
?>