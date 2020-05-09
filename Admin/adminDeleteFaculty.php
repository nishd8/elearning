<?php
 if (isset($_POST['delfaculty'])) 
 {
  $uname=$_POST['name'];
  $email=$_POST['email'];
  $p=$_POST['password'];

if($p==$pass)
{
  $signup="DELETE  FROM  user  WHERE name='$uname' AND email='$email'";
  if($run=mysqli_query($conn,$signup))
  {

      echo '<script type="text/javascript">alert("Done")</script>';
    
  }
  else
  {
    echo '<script type="text/javascript">alert("Not Done. Please Try Again.")</script>';
    
  }
  $tchupdate="DELETE  FROM  teachers  WHERE name='$uname' AND email='$email'";
  $run=mysqli_query($conn,$tchupdate);
  echo "<script type='text/javascript'>location.replace('admin.php')</script>";
}
else
{
   echo '<script type="text/javascript">alert("Password is wrong. Please Try Again. ")</script>';
}
}
 ?>