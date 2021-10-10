<?php
require_once "conection.php";
session_start();
 if(isset($_POST["submit"]))
 {
    $id_edite=$_GET["id"];
    echo $id_edite;
    $user_name=$_POST["user_name"];
    $email=$_POST["email"];
    $errors=[];
    if (strlen($user_name) > 10) {
        $errors[] = "max len 10";
    } elseif (is_numeric($user_name)) {
        $errors[] = "name must be string";
    } elseif (empty($user_name)) {
        $errors[] = "new user is required";
    }
    
    if (empty($email)) {
    
        $errors[] = "email is required";
    }
    
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    
        $errors[] = "MUSTE BE EMAIL";
    } 
    
    if(empty($errors))
    {
    
    $query="SELECT * FROM `users`  where email='$email'";
    $runquery=mysqli_query($con,$query);
    if(!mysqli_num_rows($runquery)>0)
    {
        $query_update = "UPDATE `users` SET `user_name`='$user_name', `email`='$email' Where id=$id_edite ";
        $runquer_update=mysqli_query($con,$query_update);
        unset($_SESSION["email"]);
        header("location:index.php");
    }else
    {
        $k="this email exsite";
        $_SESSION["k"]=$k;
        echo "this email exsite";
        header("location:edit.php?id=<?php echo $id_edite;  ?>");
    }
    
    
    
    }else
    {
        print_r($errors);
        $_SESSION["er"]=$errors;
        header("location:edit.php?id=<?php echo $id_edite;  ?>");
    }
 }else
 {
     http_response_code(404);
 }








?>