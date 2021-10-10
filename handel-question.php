<?php
session_start();
$id_user=$_SESSION["id"];
require_once "conection.php";
if(isset($_POST["submit"]))
{

$question=$_POST["question"];
$erorrs=[];
if(empty($question))
{
    $erorrs[]="Question is required";
}elseif(is_numeric($question))
{
    $erorrs[]="Question must be string";
}

if(empty($erorrs))
{

    $query="INSERT INTO `question` (`titel`,`user_id`) VALUES ('$question',$id_user)";
$runquery=mysqli_query($con,$query);
header("location:question.php");

}else
{

$_SESSION["question_eroor"]=$erorrs;
header("location:question.php");


}




}else {


    http_response_code(404);
}






?>