 <?php

if (isset($_POST['addstud'])) 
 {
  $uname=$_POST['name'];
  $email=$_POST['email'];
  $password=uniqid();
  $position='S';

  $signup="INSERT INTO user (name, email, pass, pos) VALUES ('$uname','$email','$password','$position')";
  if($run=mysqli_query($conn,$signup))
  {

     echo '<script type="text/javascript">alert("Done")</script>';
      echo "<script type='text/javascript'>location.replace('admin.php')</script>";    
  }
  else
  {
    echo '<script type="text/javascript">alert("Not Done. Please Try Again.")</script>';
    echo mysql_error($conn);
  }

 
 }

 ?>