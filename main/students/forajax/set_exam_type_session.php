<?php

session_start();
$db = mysqli_connect("localhost","u414334225_admin","Learnenmet@123","u414334225_learnenmet");
$exam_category=$_GET['exam_category'];
$_SESSION['exam_category']=$exam_category;
$res=mysqli_query($db, "SELECT * FROM `exam_category` WHERE category='$exam_category'");
while($r1=mysqli_fetch_array($res)){

    $_SESSION['exam_time']=$r['exam_time_in_minutes'];
}

$date=date("Y-m-d H:i:s");
$_SESSION['end_time']=date("Y-m-d H:i:s", strtotime($date."+$_SESSION[exam_time] minutes"));

$_SESSION['exam_start']="yes";
?>