<?php

session_start();
$con = mysqli_connect("localhost","u414334225_admin","Learnenmet@123","u414334225_learnenmet");
if(isset($_POST[teacherreg])){

    // echo $_SESSION['fname'];
    // echo $_SESSION['email'];
    // echo $_SESSION['pass'];
    // echo $_SESSION['cpass'];
    // echo $_SESSION['orgname'];
    $orgname=$_POST['orgname'];
    $subject1=$_POST['subject'];
    $ssubject=$_POST['ssubject'];
    $experience=$_POST['experience'];
    $rating=$_POST['rating'];

    $search1 = "SELECT * FROM `teachers` WHERE email='{$_SESSION['email']}'";
    $res1= mysqli_query($con,$search1);
    $crows=mysqli_num_rows($res1);
    if($crows==1){
      echo '<script>alert("email already exists. Please use another email")</script>';
      header("Location: ./index.php");
    }
    else{
      $search= "SELECT organization FROM `teachers` WHERE organization='$orgname'";
      $result=mysqli_query($con,$search);
      $checkrows=mysqli_num_rows($result);
     if($checkrows>0) {
        // echo "customer exists";
        echo '<script>alert("Class name already exists. Please rename your class to something else")</script>';
        header("Location: failure.html");
  
     } else {  
      $from_add = "contact@learnenmet.com"; 
  
      $to_add = mysqli_real_escape_string($con,$_SESSION['email']);
      
      $subject = "Thank you for registering with us";
    $message = "Hi,
  
    Thank you for showing interest in availing of our services.
    
    Our Advisor will contact you shortly on your registered email address.
  
    
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
   //mail part done
  
   if (!$con){
    die('Could not connect: ' . mysqli_error());
  }else{
      $query = "INSERT INTO `teachers`(`full_name`, `email`, `password`, `conf_pass`, `organization`, `subject`, `strong_subject`, `experience`, `rating`) VALUES ('{$_SESSION['fname']}','{$_SESSION['email']}','{$_SESSION['pass']}','{$_SESSION['cpass']}','$orgname','$subject1','$ssubject','$experience','$rating')";
  
      if (mysqli_query($con, $query)) {
          echo "New record created successfully";
          header("Location: success.html");
        } else {
          echo "Error: " . $query . "<br>" . mysqli_error($con);
          header("Location: dbfailure.html");
        }
  
      //   if (mysqli_query($con, $query)) {
      // 	echo "New record created successfully";
      //   } else {
      // 	echo "Error: " . $query . "<br>" . mysqli_error($con);
      //   }
        
        mysqli_close($conn);
      }
    }
    }
   
    // if($search==$orgname){
    //   echo 'alert("Class name already exists. Please rename your class to something else")'
    // }
 
//mail part
    
}



?>