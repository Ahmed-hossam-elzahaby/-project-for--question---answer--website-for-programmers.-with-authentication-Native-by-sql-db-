<?php
require_once "conection.php";
session_start();

if(isset($_POST["submit"]))
{
    $id_img=$_GET["id"];
    $query="SELECT * FROM `users` WHERE id='$id_img'";
    $runquery=mysqli_query($con,$query);
    $user=mysqli_fetch_assoc($runquery);
    echo $user["img"];
    $img = $_FILES["img"];
    $imgname = $img["name"];
    $imgtype = $img["type"];
    $imgtypename = $img["tmp_name"];
    $imgerror = $img["error"];
    $imgsize = $img["size"];
    $ext = pathinfo($imgname, PATHINFO_EXTENSION);
    $imgsizemb = $imgsize / (1024 ** 2);
    $errors=[];
    if ($imgerror > 0) {

        $eroors[] = "error while uploding or empty  ";
    } elseif (!in_array($ext, ["png", "jpg", "gif"])) {
        $eroors[] = "must be img";
    } elseif ($imgsizemb > 1) {
        $eroors[] = "muste be 1 mb";
    }
    if (empty($eroors)) {
         
    
            $randstr = uniqid();
            $IMGNEWNAME = "$randstr.$ext";
         move_uploaded_file($imgtypename, "uplode/$IMGNEWNAME");
            $query_img = "UPDATE `users` SET `img`='$IMGNEWNAME' Where id=$id_img ";
            $runquery_img= mysqli_query($con, $query_img);
if($runquery_img){
    unlink("uplode/".$user["img"]);
    header("location:index.php");
}
          

        }else
        {
            $_SESSION["m"]=$eroors;
        header("location:edit.php?id=<?php echo $id_img;  ?>");

            foreach($eroors as $value)
            {
                echo json_encode(["msg"=>"$value"]);
            }
        }

}

?>