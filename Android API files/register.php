<?php
   $db = mysqli_connect('localhost','root','','u414334225_learnenmet');
   if(!$db){
	   echo "Database Connection failed";
   }
   $full_name = $_POST['full_name'];
   $email = $_POST['email'];
   $password = $_POST['password'];
   $conf_pass = $_POST['conf_pass'];
   $organization = $_POST['organization'];
   $subject = $_POST['subject'];
   $strong_subject = $_POST['strong_subject'];
   $experience = $_POST['experience'];
   $rating = $_POST['rating'];  

   $sql = "SELECT *FROM teachers WHERE email = '".$email."'";
   $result = mysqli_query($db,$sql);
   $count = mysqli_num_rows($result);
   
   if($count == 1) {
	   echo json_encode("Error");
   }else {
	   $insert = "INSERT INTO `teachers` (`full_name`, `email`, `password`, `conf_pass`, `organization`, `subject`, `strong_subject`, `experience`, `rating`) VALUES ('$full_name', '$email', '$password', '$conf_pass', '$organization', '$subject', '$strong_subject', '$experience', '$rating');";
   $query = mysqli_query($db,$insert);
   if($query){
	   echo json_encode("Sucess");
   }else {
      echo "error";
   }
   
   }
?>