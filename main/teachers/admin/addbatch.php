<?php
    if(isset($_POST['submit'])){
      $db = mysqli_connect("localhost","u414334225_admin","Learnenmet@123","u414334225_learnenmet");
   if(!$db){
	   echo "Database Connection failed";
   }
   $batch = $_POST['batch'];
   session_start();
   $_SESSION['batchname']=$batch;

   $sql = "SELECT * FROM `batches` WHERE `batch_name` = '".$batch."'";
   $result = mysqli_query($db,$sql);
   $count = mysqli_num_rows($result);
   
   if($count == 1) {
	   echo json_encode("Error");
   }else {
	   $insert = "INSERT INTO `batches` (`batch_name`) VALUES ('$batch')";
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