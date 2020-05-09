
<?php
if (isset($_POST['delsub']))
{
  $nm=$_POST['sub'];
  $q="DELETE FROM`subjects` where subject='$nm' ";
  if($run=mysqli_query($conn,$q))
  {
     echo '<script type="text/javascript">alert("Done")</script>';

  } 
  else
  {
    echo '<script type="text/javascript">alert("Not Done. PLease Try Again")</script>';
  } 
}
?>