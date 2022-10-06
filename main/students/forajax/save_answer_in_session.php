<?php 
session_start();
$questionno=$_GET['question_no'];
$value1=$_GET["value1"];
$_SESSION["answer"][$questionno]=$value1;
?>