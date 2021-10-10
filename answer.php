<?php
require_once "conection.php";
// echo $_GET["id"];
session_start();

$question_id=$_GET["id"];
if(!isset($question_id))
{
    header("location:index.php");
}
$query="SELECT * FROM `question` WHERE id=$question_id  ";
$runquery=mysqli_query($con,$query);
$question=mysqli_fetch_assoc($runquery);
// print_r($question);

$query_answer="SELECT * FROM `answer` WHERE question_id=$question_id ";
$runquery_answer=mysqli_query($con,$query_answer);
$answeres=mysqli_fetch_all($runquery_answer,MYSQLI_ASSOC);



?>
<?php

require_once "header.php";

?>
<div class="d-flex d-flex justify-content-center   align-items-center">

<p class=" mt-3 text-center" >your question :</p>
</div>
<div class="d-flex d-flex justify-content-center   align-items-center">

<h1 class="text-center" > <?php  echo $question["titel"] ;  ?>  ?</h1>
</div>




<form action="handel-answer.php?id=<?php echo $question_id;   ?>"  method="POST" >

<p class="text-center text-danger" ><?php  if(isset($_SESSION["answer_error"])) 
{
foreach($_SESSION["answer_error"] as $value)
{
    echo $value;
}

}
?>  </p>


<div class="d-flex d-flex justify-content-center   align-items-center">

<p>Answer</p>

</div>
<div class="d-flex d-flex justify-content-center   align-items-center">

<input name="answer"  type="text" class="w-50  form-control"  placeholder="Enter your answer"  >

</div>
<div class="d-flex d-flex justify-content-center   align-items-center">

<button name="submit" class="mt-3  btn btn-outline-primary"  >Answer</button>
</div>

</form>

<p class=" mt-2 text-center" > all answer: </p>


<?php  foreach($answeres as $answer){?>

    <hr class="w-75 mb-4 ">

<h4 class="text-center"  ><?php  echo $answer["body"]; ?></h4>
    <hr class="w-75 mb-4 ">

<?php  }  ?>



<?php
unset($_SESSION["answer_error"]);
require_once "footer.php";
?>