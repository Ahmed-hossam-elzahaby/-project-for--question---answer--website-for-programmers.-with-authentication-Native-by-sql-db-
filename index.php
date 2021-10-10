<?php
session_start();
require_once "header.php";
?>


<form action="handel_login.php"  method="POST"  >
<h3 class="m-5 px-5 member" >LOGIN</h3>
<hr class="w-75 " >
<div class="container p-4  text-center ">
<div class="text-center">
    <p class="text-danger"><?php if(isset($_SESSION["eroor"])){
        foreach($_SESSION["eroor"] as $value){
            echo $value . "<br>";
        }
    }  ?></p>
<p class="mt-1">Email</p>
<p class="alert-danger"><?php  if(isset($_SESSION["w_email"])){echo $_SESSION["w_email"];}  ?></p>
<input type="text" name="email"   placeholder="Enter your email" class="form-control    "  >
<p class="mt-1">Password</p>
<p class="alert-danger"><?php if(isset($_SESSION["pass"])){
echo $_SESSION["pass"]; 
unset($_SESSION["email"]);
}  ?></p>
<input type="password"  name="password" placeholder="Enter your password"  class="form-control "    >
<button name="submit"   class="btn btn- btn-outline-success mt-3 ">login</button>
</div>
</div>
</form>

<div class="m-2  d-flex d-flex justify-content-center   align-items-center" >
<a href="sign_up.php"><button class="btn btn- btn-outline-primary">Go to sign_up</button></a>
</div  >

<hr class="w-75">

<?php

require_once "footer.php";
unset($_SESSION["eroor"]);
unset($_SESSION["w_email"]);
unset($_SESSION["pass"]);

if(isset($_SESSION["email"]))
{
    header("location:profile.php");
}
?>





