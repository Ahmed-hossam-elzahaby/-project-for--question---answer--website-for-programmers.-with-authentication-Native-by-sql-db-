<?php
require_once "conection.php";
session_start();
$id_question = $_SESSION["id"];

// echo $_SESSION["id"];
if (!isset($_SESSION["email"])) {
    header("location:index.php");
}
$query = "SELECT * FROM `question` WHERE `user_id`=$id_question ";
$runquery = mysqli_query($con, $query);
$questions = mysqli_fetch_all($runquery, MYSQLI_ASSOC);
// print_r($questions);


?>
<?php

require_once "header.php";
?>

<form action="handel-question.php" method="POST">

    <h5 class=" mt-4  text-center">Ask Me</h5>
    <p class="text-center  text-danger"><?php if (isset($_SESSION["question_eroor"])) {

                                foreach ($_SESSION["question_eroor"] as $value) {
                                    echo $value . "<br>";
                                }
                            }  ?> </p>
    <div class="d-flex justify-content-center align-items-center">

        <input type="text" class=" mt-2 w-50  form-control" name="question" placeholder="Enter your question">
    </div>

    <div class="d-flex justify-content-center align-items-center">


        <button name="submit" class="mt-3   btn btn-outline-success">Ask</button>
    </div>


</form>



<h4 class="text-center mt-2   ">Your questions:</h4>
<div class="container mt-2 ">

    <?php foreach ($questions as $question) {  ?>

        <hr class="w-75 mb-4 ">

        <h2 class="text-center"><?php echo $question["titel"]; ?></h2>
        <a href="handel-delete-q.php?id=<?php echo $question["id"];  ?>"><button   onClick="return confirm('Sure you want delete this question?')"  class="btn btn-danger">delete</button></a>
        <a href="edit_q.php?id=<?php echo $question["id"];   ?>"><button class="btn btn-warning">edit</button></a>
        

        <hr class="w-75 mt-4 ">


    <?php } ?>


</div>


<?php
unset($_SESSION["question_eroor"]);
require_once "footer.php";

?>