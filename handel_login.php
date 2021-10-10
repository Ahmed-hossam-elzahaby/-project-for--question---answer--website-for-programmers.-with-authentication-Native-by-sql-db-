
<?php
session_start();
require_once "conection.php";
if(isset($_POST["submit"]))
{

    $email=$_POST["email"];
    $password=$_POST["password"];

    $eroors=[];
if(empty($email))
{
    $eroors[]="Email is required";
}elseif(!filter_var($email,FILTER_VALIDATE_EMAIL))
{
    $eroors[]="Must be email";
}
if(empty($password))
{
    $eroors[]="password is required";
}elseif(!is_numeric($password))
{
    $eroors[]="pass must be number";
}


if(empty($eroors))
{

$query="SELECT * FROM `users` WHERE email='$email'";
$runquery=mysqli_query($con,$query);
if(mysqli_num_rows($runquery)>0)
{
$user=mysqli_fetch_assoc($runquery);
// print_r($user);

$_SESSION["email"]=$user["email"];
$_SESSION["id"]=$user["id"];
$iscorrect=password_verify($password,$user["password"]);
if($iscorrect)
{

header("location:profile.php");


}else
{
    echo "wrong password";
    $pass="wrong password";
    $_SESSION["pass"]=$pass;
    header("location:index.php");
}

}else
{
    echo "wrong email";
$w_email="wrong email";
$_SESSION["w_email"]=$w_email;
header("location:index.php");
}

}else
{
    $_SESSION["eroor"]=$eroors;
    print_r( $eroors);
    header("location:index.php");
}







}





?>