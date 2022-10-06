<?php
  $db = mysqli_connect('localhost','root','','u414334225_learnenmet');
   if(!$db){
	   echo "Database Connection failed";
   }
   $email = $_POST['email'];
   $password = $_POST['password'];
   
    $query  = "SELECT *FROM teachers WHERE email = '".$email."' ";
    $res  = mysqli_query($db,$query);
	$data = mysqli_fetch_array($res);
	$count = mysqli_num_rows($res);
    if($count>=1){
	$query  = "SELECT *FROM teachers WHERE email = '".$email."' AND password = '".$password."'";
    $res  = mysqli_query($db,$query);
	$data = mysqli_fetch_array($res,MYSQLI_ASSOC);
	$count = mysqli_num_rows($res);
	 
	if($count==1){		
	    echo json_encode("login success");  
	 }else {
		echo json_encode("false");
	}
	  
	}else {
		echo json_encode("dont have an account");
		}	
    	 

?>