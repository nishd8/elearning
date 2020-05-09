
<?php
if (isset($_POST['addsub']))
{
  $nm=$_POST['sub'];
  $q="INSERT INTO `subjects`(`subject`) VALUES ('$nm')";
  if($run=mysqli_query($conn,$q))
  {
     echo '<script type="text/javascript">alert("Done")</script>';
      echo '<script type="text/javascript">window.location.replace("admin.php")</script>';

  } 
  else
  {
    echo '<script type="text/javascript">alert("Not Done. PLease Try Again")</script>';
  } 
}
?>