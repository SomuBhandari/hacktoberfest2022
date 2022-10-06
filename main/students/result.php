<?php
session_start();
$date=date("Y-m-d H:i:s");
$_SESSION["end_time"]=date("Y-m-d H:i:s", strtotime($date."+$_SESSION[exam_time] minutes"));
$db = mysqli_connect("localhost","u414334225_admin","Learnenmet@123","u414334225_learnenmet");
$correct=0;
$wrong=0;
if(isset($_SESSION["answer"])){
    for($i=1;$I<=sizeof($_SESSION["answer"]);$i++){
        $answer="";
        $res5=mysqli_query($db, "SELECT * FROM `questions` WHERE category='{$_SESSION['exam_category']}' and question_no=$i");
        while($row=mysqli_fetch_array($res5)){
            $answer=$row["answer"];
        }
        if(isset($_SESSION["answer"][$i])){
            if($answer==$_SESSION["answer"][$i]){
                $correct=$correct+1;
            }
            else{
                $wrong=$wrong+1;
            }
        } 
        else{
            $wrong=$wrong+1;
        }
    }
}

$count=0;
$res6=mysqli_query($db, "SELECT * FROM `questions` WHERE category='{$_SESSION['exam_category']}' and question_no=$i");
$count=mysqli_num_rows($res6);
$wrong=$count-$correct;

echo "<br>";
echo "<br>";
echo "<center>";
echo "<br>";
echo "<br>";
echo "Total Questions=" .$count;
echo "<br>";
echo "Total Correct=" .$correct;
echo "<br>";
echo "Total Wrong=" .$wrong;
echo "<br>";
echo "</center>";
?>


<?php
if(isset($_SESSION["exam_start"])){
    $date=date("Y-m-d");
    mysqli_query($db, "INSERT INTO `exam_result`(`email`, `exam_type`, `total_question`, `correct_answer`, `wrong_answer`, `exam_time`) VALUES ('{$_SESSION['uname']}','{$_SESSION['exam_category']}',$count,$correct,$wrong)");

}
if(isset($_SESSION["exam_start"])){

    unset($_SESSION["exam_start"]);
}

?>