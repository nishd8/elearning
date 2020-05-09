<?php session_start()?>
<?php
$email=$_SESSION['user_email'];
$name=$_SESSION['user_name'];
$pass=$_SESSION['user_pass'];
$exam_id=$_SESSION['eid'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Student Assessment</title>
	<?php include '../links.php' ?>
	<?php include '../connection.php' ?>
  <?php include '../style.php' ?>
  <script src="  https://printjs-4de6.kxcdn.com/print.min.js"></script>

</head>
<body>
<!-- Side Bar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
   <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
      	<a href="student.php"><i id="tg" class='fas fa-arrow-alt-circle-left' style='color:#d5d5d5;font-size: 30px;'></i></a>
        </li>
    </ul>
   <a class="navbar-brand mx-auto" href="#">E-Learning</a>
   <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <form method="post">
        <button  type="submit" name='lgt' style="border:2px solid #d5d5d5; background-color: transparent;color: #d5d5d5;"><i class="fas fa-sign-out-alt"></i></button>
        </form>
      </li>
   </ul>		
  </nav>
  <div class="container-fluid">
    <div class="row pad">
    	<div class="col-lg-6 offset-lg-3 md-auto sm-auto pad">
        <div class="fc" id="result" style="overflow-y: scroll; height: 700px;">
              <?php
                       $sql = "SELECT * FROM assessment_records WHERE email= '$email' and exam_id = '$exam_id'";
                       $result = $conn->query($sql);
                       while($row=mysqli_fetch_assoc($result))
                       {
                        echo "<h2>Congratulations !!! on completing the test</h2><div style='border-top:2px solid black; width:100%;'></div><br><h4>Your current percentage: <span style='color:#0275d8;'>".$row['score']." %</span></h4><br>";
                        echo "<h2>Question-Wise Analysis</h2>";
                        $sql1 = "SELECT * FROM questions WHERE exam_id = '$exam_id'";
                        $result1 = $conn->query($sql1);
                        $qno=1;
                        while($row1= mysqli_fetch_assoc($result1))
                        {
                          $a=$row1['ans'];
                          $q=$row1['question_id'];
                          echo $qno.") ".nl2br($row1['question'])."<br><span style='font-weight:bold;'>Correct Answer: </span>".nl2br($row1[$a])."<br>";
                          $sql2 = "SELECT * FROM qwise_assesment WHERE exam_id = '$exam_id' and question_id='$q' and email='$email'";
                          $result2 = $conn->query($sql2);
                          while($row2= mysqli_fetch_assoc($result2))
                          {
                            $ans=$row2['uans'];
                            echo "<span style='style='font-weight:bold;'>Your Answer: </span>".nl2br($row1[$ans])."<br><br>";
                            $qno++;
                          }
                        }
                        
                       }
                       ?>
              </div>
                       <br><button onclick="printDiv('result')">Download Result</button>
    	</div>
  	
    </div>
  </div>
  	


  <div class="navbar navbar-expand-lg navbar-dark bg-dark" id="footer">
        <a class="navbar-brand mx-auto">Made by Nishad Raisinghani</a>
  </div>
</body>
</html>
<?php
if (isset($_POST['lgt'])) 
 {
  session_destroy();
  echo "<script type='text/javascript'>location.replace('../index.php')</script>";
 }
?>
<script type="text/javascript">
  function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>