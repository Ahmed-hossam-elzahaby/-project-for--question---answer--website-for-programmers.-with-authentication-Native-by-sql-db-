<?php
require_once "conection.php";
// echo $_GET["id"];
$id_edit=$_GET["id"];
if(isset($_POST["submit"]))
{

    $question_edit=$_POST["edit_question"];
$query="UPDATE `question` SET `titel`='$question_edit' where id=$id_edit ";
$runquery=mysqli_query($con,$query);
if($runquery)
{
    header("location:question.php");
}

}else
{
    http_response_code(404);
}


?>