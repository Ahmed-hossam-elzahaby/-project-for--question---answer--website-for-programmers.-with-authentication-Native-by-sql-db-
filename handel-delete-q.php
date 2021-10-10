<?php
require_once "conection.php";
session_start();
echo $_GET["id"];
$question_id=$_GET["id"];
$user=$_SESSION["id"];

$query="SELECT * FROM `question` WHERE id=$question_id ";
$runquery=mysqli_query($con,$query);
// $result=mysqli_fetch_assoc($runquery);
// print_r($result);

// var_dump($runquery);
echo "<br>";
if(mysqli_num_rows($runquery)>0)
{


    $query_d="DELETE FROM `question` where id=$question_id ";
    $runquery_d=mysqli_query($con,$query_d);
    if($runquery_d)
    {
        header("location:question.php");
    }else
    {
        echo "errorbb";
        echo "<br>";
        // var_dump($runquery_d);
    }
}else{

echo "not found";

}

// $query="DELETE FROM `question` WHERE id=$question_id  ";
// $runquery=mysqli_query($con,$query);
// if($runquery)
// {
//     header("location:question.php");
// }else{
//     var_dump($runquery);
//     echo "error";
//     // http_response_code(404);
// }

?>