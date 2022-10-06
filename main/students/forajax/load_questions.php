<?php
session_start();

$db = mysqli_connect("localhost","u414334225_admin","Learnenmet@123","u414334225_learnenmet");


$questionno="";
$question="";
$opt1="";
$opt2="";
$opt3="";
$opt4="";
$answer="";
$count=0;
$ans="";

$queno=$_GET["question_no"];
if(isset($_SESSION["answer"][$queno])){
    $ans=$_SESSION["answer"][$queno];
}

$res4=mysqli_query($db, "SELECT * FROM `questions` WHERE category='{$_SESSION['exam_category']}' and question_no=$_GET[question_no]");
$count=mysqli_num_rows($res4);

if($count==0){
    echo "over";
}
else{

    while($row=mysqli_fetch_array($res4)){
        $questionno=$row['question_no'];
        $question=$row['question'];
        $opt1=$row['opt1'];
        $opt2=$row['opt2'];
        $opt3=$row['opt3'];
        $opt4=$row['opt4'];
    }
    ?>
<table>
    <tr>
        <td style="font-weight: bold; font-size: 16px; padding-left: 5px;" colspan="2"><?php echo "(".$questionno .")". $question;?></td>
    </tr>
</table>



<table>
   <tr>
       <td>
           <input type="radio" name="r1" id="r1" value="<?php echo $opt1; ?>" onclick="radioclick(this.value, <?php echo $questionno ?>)"

           <?php
           if($ans==$opt1){
               echo "checked";
           }
           ?>>
       </td>
       <td style="padding-left: 10px;">
           <?php
           if(strpos($opt1, 'images/')==false){
               echo $opt1;
           }
           ?>
          
       </td>
   </tr> 
   <tr>
       <td>
           <input type="radio" name="r1" id="r1" value="<?php echo $opt2; ?>" onclick="radioclick(this.value, <?php echo $questionno ?>)"

           <?php
           if($ans==$opt2){
               echo "checked";
           }
           ?>>
       </td>
       <td style="padding-left: 10px;">
           <?php
           if(strpos($opt1, 'images/')==false){
               echo $opt2;
           }
           ?>
          
       </td>
   </tr> 
   <tr>
       <td>
           <input type="radio" name="r1" id="r1" value="<?php echo $opt3; ?>" onclick="radioclick(this.value, <?php echo $questionno ?>)"

           <?php
           if($ans==$opt3){
               echo "checked";
           }
           ?>>
       </td>
       <td style="padding-left: 10px;">
           <?php
           if(strpos($opt3, 'images/')==false){
               echo $opt3;
           }
           ?>
          
       </td>
   </tr> 
   <tr>
       <td>
           <input type="radio" name="r1" id="r1" value="<?php echo $opt4; ?>" onclick="radioclick(this.value, <?php echo $questionno ?>)"

           <?php
           if($ans==$opt4){
               echo "checked";
           }
           ?>>
       </td>
       <td style="padding-left: 10px;">
           <?php
           if(strpos($opt4, 'images/')==false){
               echo $opt4;
           }
           ?>
          
       </td>
   </tr> 
</table>
<?php
}
?>