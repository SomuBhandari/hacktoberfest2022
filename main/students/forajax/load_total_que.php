<?php

session_start();

$db = mysqli_connect("localhost","u414334225_admin","Learnenmet@123","u414334225_learnenmet");
$total_que=0;
$res3=mysqli_query($db, "SELECT * FROM `questions` WHERE `category`='$_SESSION[exam_category]'");
$total_que=mysqli_num_rows($res3);
echo $total_que;
?>