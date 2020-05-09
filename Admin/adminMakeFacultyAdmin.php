<?php
if(isset($_POST['mkadmin']))
{
  $em=$_POST['email'];
  $q="UPDATE `user` SET `pos`='A' WHERE email='$em'";
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