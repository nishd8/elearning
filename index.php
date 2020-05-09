<?php session_start()?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
 <?php include 'links.php'; ?>	
 <?php include 'style.php';?>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand mx-auto" href="#">E-Learning</a>
    </nav>
    <div class="container-fluid pad2">
      <div class="row pad">
        <div class="col-lg-6 offset-lg-3 sm-auto md-auto">
          <div class="row">
             <div class="col abtpad">
               <form action="index.php" method="POST" class="fc">
                 <h3>Sign-up</h3><hr>
                  <input type="text" name="name"  placeholder="Full-Name" required><br><br>
                  <input type="email" name="email" placeholder="Email" required><br><br>
                  <input type="password" name="password" placeholder="Password" required><br><br>
                  <input type="submit" name="su" value="Sign-Up">
               </form>
             </div>
             <div class="col abtpad">
               <form action="index.php" method="POST" class="fc">
                 <h3>Login</h3><hr>
                 <input type="email" name="uemail" placeholder="Email"><br><br>
                 <input type="password" name="upassword" placeholder="Password"><br><br><br>
                 <input type="submit" name="lg" value="Log-in"><br><br>
                
               </form>
             </div>
           </div>
           <div class="abtpad">
           <div class=" fc">
          <h3>About</h3>
          <hr>
          <P>To create quality information technology professionals through superior academic environment.<br>
            To incorporate the IT fundamentals in students to be successful in their career.<br>
            To motivate the students for higher studies ,research and entrepreneurship.<br>
          To provide IT services to society .<br><br>
        </P>
          <h3>FAQ</h3>
         <hr>
          <p>
          1)<b>What is E-learning?</b><br>
            A platform for students of E-Learning to interact with teachers with help of usefull resources like PDF notes,Videos and PPTs.<br><br>
          2)<b>What will you get?</b><br>
                 Helping students re-visit the lecture to revise and understand concepts aswell as provide necessary resources for exam prep. 
                 <br>Unit Wise:<br>
                 <ul>
                   <li>Video Lectures</li>
                   <li>PDF Notes</li>
                   <li>PPT's</li>
                   <li>Quizzes</li>
                 </ul>
          </p>
        </div>
      </div>
         </div>
    </div> 
      </div>
      <div class="navbar navbar-expand-lg navbar-dark bg-dark" id="footer">
        <a class="navbar-brand mx-auto">Copyright 2020, Nishad Raisinghani.</a>
      </div>
</body>
</html>

<?php
include 'connection.php';

//-------------------------------------------- Sign-Up ------------------------------------------	
if(isset($_POST['su']))
{

	$uname=$_POST['name'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$dept=$_POST['dept'];
	$year=$_POST['year'];
  $prn=$_POST['prn'];
  $mname=$_POST['mname'];
  
	$signup="INSERT INTO user (name, email, pass) VALUES ('$uname','$email','$password')";
	if($run=mysqli_query($conn,$signup))
	{

      echo '<script type="text/javascript">alert("Done. Please Login.")</script>';
    
	}
	else
	{
		echo '<script type="text/javascript">alert("Not Done. Please Try Again.")</script>';
    
	}
}

//------------------------------------------------------------------------------------------------------
if(isset($_POST['lg']))
{

	$email=$_POST['uemail'];
	$password=$_POST['upassword'];
	
	$login="SELECT * FROM user WHERE (email='$email' AND pass='$password')";
	if($run2=mysqli_query($conn,$login))
	{
      $num=mysqli_num_rows($run2);
      if($num==1)
      {
      	$row=mysqli_fetch_assoc($run2);
  		if($row['pos']=='T')
  		{
  		 $_SESSION['user_email']=$email;
  	     $_SESSION['user_pass']=$password;
  	     $_SESSION['user_name']=$row['name'];
  		   echo "<script type='text/javascript'>location.replace('Teacher/teacher.php')</script>";
  	    }
        elseif($row['pos']=='A')
       {
       $_SESSION['user_email']=$email;
         $_SESSION['user_pass']=$password;
         $_SESSION['user_name']=$row['name'];
       echo "<script type='text/javascript'>location.replace('Admin/admin.php')</script>";
        }
      
  	    else
  	    {
  		$_SESSION['user_email']=$email;
  	    $_SESSION['user_pass']=$password;
  	    $_SESSION['user_name']=$row['name'];
  		echo "<script type='text/javascript'>location.replace('Student/student.php')</script>";
        }   	
   	 }
     else
     {
      	echo '<script type="text/javascript">alert("Email Or Password is wrong check again or contact admin.");</script>;';
     }    
	}
	else
	{
		echo '<script type="text/javascript">alert("Email Or Password is wrong check again or contact admin.");</script>';
    
	}
}

?>