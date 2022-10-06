<?php
$db = mysqli_connect("localhost","u414334225_quizadmin","SomeshB@405","u414334225_quiz");
$id=$_GET['id'];
echo $id;
mysqli_query($db, "DELETE FROM `exam_category` WHERE `id`=$id");
echo '<script>
window.location="index.php";
</script>';
?>