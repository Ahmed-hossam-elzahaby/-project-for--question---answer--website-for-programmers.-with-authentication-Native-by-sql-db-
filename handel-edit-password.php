<?php
require_once "conection.php";
session_start();
$id_pass=$_GET["id"];
echo $id_pass;
if(isset($_POST["submit"]))
{


$password=$_POST["password"];
$confirm_password=$_POST["confirm_password"];

$eroors=[];

if(empty($password))
{
    $eroors[]="new password is required";
}elseif(!is_numeric($password))
{
    $eroors[]="new password must be number";
}
if(empty($confirm_password))
{
    $eroors[]="confirm new password is required";
}elseif(!is_numeric($confirm_password))
{
$eroors[]="confirm password must be number";

}
if($password != $confirm_password)
{
    $eroors[]="check your new pass and confirm new pass ";
}


if(empty($eroors))
{

    $newPassword_hash = password_hash($password, PASSWORD_BCRYPT);
    $query="UPDATE `users` set `password`='$newPassword_hash' where id=$id_pass";
$runquery=mysqli_query($con,$query);
// echo json_encode(["msg"=>"update sucess"]);
unset($_SESSION["email"]);
header("location:index.php");



}else{

$_SESSION["r"]=$eroors;
header("location:edit.php?id=<?php echo $id_pass;  ?>");


// foreach($eroors as $value)
// {

// echo json_encode(["msg"=>"$value"]);

// }
}











}else
{
    http_response_code(404);
}
?>