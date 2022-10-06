<?php
    if(isset($_POST['submit'])){
      $db = mysqli_connect("localhost","u414334225_admin","Learnenmet@123","u414334225_learnenmet");


   if(!$db){
	   echo "Database Connection failed";
   }
   $name = $_POST['name'];
   $email = $_POST['email'];
   $phone = mysqli_real_escape_string($_POST['phone']);
   $bid = $_POST['batch'];
   echo $bid;

   $sql = "SELECT * FROM `student_details` WHERE `student_email` = '".$email."'";
   $result = mysqli_query($db,$sql);
   $count = mysqli_num_rows($result);
   
   if($count == 1) {
	   echo json_encode("Error");
   }else {
	   $insert = "INSERT INTO `student_details` (`student_name`, `student_email`, `student_phone`, `student_batch`) VALUES ('$name','$email','$phone','$bid')";
   $query = mysqli_query($db,$insert);
   if($query){
       echo json_encode("Sucess");
       $from_add = "contact@learnenmet.com"; 

    $to_add = mysqli_real_escape_string($con,$email);
    
    $subject = "Your Instructor has registered you with us";
	$message = "Hi,

    This is to inform you that your instructor has enrolled you with our platform to conduct classes.
    You are requested to follow the below link and resgister yourself to the portal.
	
	Thanks,
	Team Learnenmet
	";
	
	$headers = "From: $from_add \r\n";
	$headers .= "Reply-To: $from_add \r\n";
	$headers .= "Return-Path: $from_add\r\n";
    $headers .= "X-Mailer: PHP \r\n";
    
    if(mail($to_add,$subject,$message,$headers)) 
	{
		$msg = "Mail sent OK";
	} 
	else 
	{
 	   $msg = "Error sending email!";
	}
   }else {
      echo "error";
   }
   
   }
    }
   
?>