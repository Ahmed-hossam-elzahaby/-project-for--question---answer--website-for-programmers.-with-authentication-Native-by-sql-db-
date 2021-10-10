<?php
require_once "conection.php";
session_start();
if (!isset($_SESSION["email"])) {
    header("location:index.php");
}

$id = $_SESSION["id"];
// echo "welcome  $id";

$query = "SELECT * FROM `users` WHERE id=$id";
$runquery = mysqli_query($con, $query);
$member = mysqli_fetch_assoc($runquery);
// print_r($member);

$query_x="SELECT * FROM `question`";
$runquery_x=mysqli_query($con,$query_x);
$questions_x=mysqli_fetch_all($runquery_x,MYSQLI_ASSOC);


?>

<?php
require_once "header.php";
?>
<div class=" m-5 d-flex d-flex justify-content-between   align-items-center">
    <h1>Your profile</h1>

    <a href="logout.php"><button class="btn btn-danger">logout</button></a>
</div>




<h2 class="text-center">welcome <?php echo $member["user_name"] ?></h2>

<div class="d-flex d-flex justify-content-center   align-items-center">
    <img class="  rounded " src="uplode/<?php echo $member["img"]; ?>" alt="">
    </div>
    <div class=" mt-3 d-flex d-flex justify-content-center   align-items-center">
        <a href="edit.php?id=<?php  echo $member["id"];  ?>"><button class="btn btn- btn-outline-warning">Edit your profile</button></a>
    </div>
    <div class=" mt-3 d-flex d-flex justify-content-center   align-items-center">
        <a href="question.php"><button class="btn btn- btn-outline-warning">question</button></a>
    </div>



<h4 class="text-center mt-4"  >All questions:</h4>

<div class="container mt-2 ">

    <?php foreach ($questions_x as $question) {  ?>

        <hr class="w-75 mb-4 ">

        <h2 class="text-center"><?php echo $question["titel"]; ?></h2>
        <a href="answer.php?id=<?php echo $question["id"];   ?>"><button class="btn btn- btn-outline-warning">answer</button></a>

        

        <hr class="w-75 mt-4 ">

    <?php } ?>


</div>



    <?php
    require_once "footer.php";

    ?>