<?php
require_once "conection.php";
session_start();
if(isset($_POST["submit"]))
{
$question_id=$_GET["id"];
$answer=$_POST["answer"];
$user=$_SESSION["id"];
$eroor=[];

if(empty($answer))
{
    $eroor[]="answer is required";
}
if(empty($eroor))
{

    $query="INSERT INTO `answer` (`body`,`question_id`,`user_id`) VALUES ('$answer',$question_id,$user)";
    $runquery=mysqli_query($con,$query);
    header("location:profile.php");
}else
{

    $_SESSION["answer_error"]=$eroor;
   header("location:answer.php?id=$question_id");
}








}





?>