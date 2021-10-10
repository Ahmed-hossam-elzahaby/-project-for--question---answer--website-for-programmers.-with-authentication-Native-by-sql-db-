<?php
require_once "conection.php";
// echo $_GET["id"];
$id=$_GET["id"];
if(!isset($id))
{
    header("location:index.php");
}

$query="SELECT * FROM `question` where id=$id ";
$runquery=mysqli_query($con,$query);
$question=mysqli_fetch_assoc($runquery);





?>

<?php

require_once "header.php";

?>


<form action="handel_edit_q.php?id=<?php echo $question["id"];  ?>"  method="POST" >

<div class="mt-5  container">

<input name="edit_question" value="<?php echo $question["titel"]  ?>" type="text" class="form-control" >
<div class="d-flex d-flex justify-content-center   align-items-center">

<button  name="submit"  class=" mt-2  btn btn-warning"  >edit</button>
</div>



</div>




</form>



<?php


require_once "footer.php";


?>