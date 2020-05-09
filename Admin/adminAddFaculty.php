 <?php

if (isset($_POST['addfaculty'])) 
 {
  $uname=$_POST['name'];
  $email=$_POST['email'];
  $password=uniqid();
  $position='T';
  $sub=$_POST['tsub'];

  $signup="INSERT INTO user (name, email, pass, pos) VALUES ('$uname','$email','$password','$position')";
  if($run=mysqli_query($conn,$signup))
  {

      echo '<script type="text/javascript">alert("Done")</script>';
    
  }
  else
  {
    echo '<script type="text/javascript">alert("Not Done. Please Try Again.")</script>';
    echo mysql_error($conn);
  }

  $tchupdate="INSERT INTO teachers (name, email, subject) VALUES ('$uname','$email','$sub')";
  $run=mysqli_query($conn,$tchupdate);
  echo "<script type='text/javascript'>location.replace('admin.php')</script>";
 }

 ?>