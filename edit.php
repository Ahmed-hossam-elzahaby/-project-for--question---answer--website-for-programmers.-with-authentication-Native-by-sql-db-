<?php
require_once "header.php";


session_start();
$_SESSION["i"]=$_GET["id"];
$id=$_GET["id"];
if(!isset($_SESSION["i"]))
{
    header("location:index.php");
}

?>

<hr class="w-75">
<form action="handel-edite-user_name-email.php?id=<?php echo $_SESSION['id'];  ?>" method="POST">
<div class="p-4 container text-center">
<p class="text-danger"><?php if(isset($_SESSION["er"])){

foreach($_SESSION["er"] as $value)
{
    echo $value . "<br>";
}

 }  ?></p>
 <p class="text-danger" ><?php  if(isset($_SESSION["k"])){echo $_SESSION["k"]; } ?></p>

    <h3>Edite your user_name & email</h3>
<div class="d-flex justify-content-center align-items-center">
<input type="text"  name="user_name"  placeholder="Enter your new user_name" class=" mt-3 w-75 form-control" >
</div>
<div class="d-flex justify-content-center align-items-center">
<input type="text"  name="email"  placeholder="Enter your email" class=" w-75 mt-2 form-control" >
</div>

<button  name="submit" class=" mt-2  btn btn- btn-outline-success" >submit</button>
</div>
</form>
<hr class="w-75">

<?php unset($_SESSION["er"]);

unset($_SESSION["k"]);
?>


<hr class="w-75">
<form action="handel-edit-password.php?id=<?php echo $_SESSION["id"];  ?>" method="POST">
<div class="p-4 container text-center">
  
    <h3>Edite your password</h3>
    <p class="text-danger"  ><?php  if(isset($_SESSION["r"])){
foreach($_SESSION["r"] as $value)
{
    echo $value . "<br>";
}


    } ?></p>
<div class="d-flex justify-content-center align-items-center">
<input type="text"  name="password"  placeholder="Enter your new password" class=" mt-3 w-75 form-control" >
</div>
<div class="d-flex justify-content-center align-items-center">
<input type="text"  name="confirm_password"  placeholder="Enter your confirm password" class=" w-75 mt-2 form-control" >
</div>

<button  name="submit" class=" mt-2  btn btn- btn-outline-success" >submit</button>
</div>
<?php  unset($_SESSION["r"]); ?>
</form>
<hr class="w-75">








<hr class="w-75">
<form action="handel-edit-img.php?id=<?php echo $_SESSION["id"];  ?>" method="POST"  enctype="multipart/form-data" >
<div class="p-4 container text-center">
    <h3>Edite your profile image</h3>
    <p class="text-danger" ><?php if(isset($_SESSION["m"])){

foreach($_SESSION["m"] as $value)
{
    echo $value . "<br>";
}

    }  ?></p>
<input name="img" type="file">

<button  name="submit" class=" mt-2  btn btn- btn-outline-success" >submit</button>
</div>
<?php
unset($_SESSION["m"]);

?>
</form>
<hr class="w-75">






<?php
require_once "footer.php"
?>



<!-- mysqli_real_escape_string -->
<!-- strip_tags -->

