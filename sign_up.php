<?php
require_once "header.php";
session_start();
?>


<form action="handel_sign_up.php"  method="POST" enctype="multipart/form-data"   >
<h3 class="m-5 px-5 member" >sign_up</h3>
<hr class="w-75 " >
<div class="container p-4  text-center ">
<div class="text-center">
    <p class="text-danger"><?php if(isset($_SESSION["eror"])){

foreach($_SESSION["eror"] as $value)
{
    echo $value . "<br>";
}

    }  ?></p>
    <p class="text-danger"><?php if(isset($_SESSION["exciste"])){echo $_SESSION["exciste"];}  ?></p>
<p class="mt-1">user-name</p>
<input type="text" name="user-name"   placeholder="Enter your user name" class="form-control    "  >
<p class="mt-1">Email</p>
<input type="text" name="email"   placeholder="Enter your email" class="form-control    "  >
<p class="mt-1">Password</p>
<input type="password"  name="password" placeholder="Enter your password"  class="form-control "    >
<p class="mt-1">confirm password</p>
<input type="password"  name="confirm-password" placeholder="Enter your confirm password"  class="form-control "    >
<p class="mt-1">choose your img</p>
<input type="file"  name="img"  >
<button name="submit" class="btn btn- btn-outline-success mt-2"  >submit</button>

</div>
</div>
</form>

<div  class=  " m-5 d-flex d-flex justify-content-center   align-items-center" >
<a href="index.php"><button  class="btn btn- btn-outline-info  ">back to login</button>  </a>
</div>
<hr class="w-75">




<?php
require_once "footer.php";
unset($_SESSION["exciste"]);
unset($_SESSION["eror"]);

?>