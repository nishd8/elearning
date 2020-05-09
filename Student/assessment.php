<?php session_start()?>
<?php
$eid=$_GET['eid'];
$aid=$_GET['qno'];
$sub=$_GET['qsub'];
$duration=$_GET['duration'];
$_SESSION['eid']=$eid;
$email=$_SESSION['user_email'];
$name=$_SESSION['user_name'];
$pass=$_SESSION['user_pass'];
include '../connection.php';
$getinfo="SELECT * FROM assessment_records WHERE email='$email' and exam_id='$eid' and status=1";
if($rungtinfo=mysqli_query($conn,$getinfo))
{
  if(mysqli_num_rows($rungtinfo)==1)
  {
      echo "<script type='text/javascript'>alert('Test Already Submitted')</script>";
          echo "<script type='text/javascript'>location.replace('result.php')</script>";
  }
}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Student Assessment</title>
	<?php include '../links.php' ?>
	<?php ?>
  <?php include '../style.php' ?>
</head>
<body id="bod">
<!-- Side Bar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
   <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
      	<a href="student.php"><i id="tg" class='fas fa-arrow-alt-circle-left' style='color:#d5d5d5;font-size: 30px;'></i></a>
        </li>
    </ul>
   <a class="navbar-brand mx-auto" href="#">RSCOE</a>
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
    	<div class="col-lg-12 md-auto sm-auto pad">
        <?php include 'quizz-data-get.php'; ?> 
          <form class="qdiv" method="post">
          <h2><span id='quiz-time-left'></span></h2>
        	<ul class="nav nav-tabs" style="border-bottom:0px">
            <?php echo $tab_html ;?>
          </ul>
          <div class="tab-content">
            <?php echo $question_html ;?>
          </div>
         </form>
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
<?php
if(isset($_POST['submit_ans']))
{
  $qn=1;
  $tpt=0;
  $totalq=$_POST['totalq'];
  $sid=$email;
  while($qn<=$totalq)
  {
    $val="q".$qn;
    $ansval="a".$qn;
    $ans=$_POST[$ansval];
    $qid=$_POST[$val];
    $uans=$_POST[$qn];
    $pt=0;
    if(strcmp($ans,$uans)==0)
    {
      $pt=1;
      $tpt++;
    }
    $ins="INSERT INTO `qwise_assesment`(`email`, `exam_id`, `question_id`, `uans`, `pt`) VALUES ('$sid','$eid','$qid','$uans','$pt')";
    if($runins=mysqli_query($conn,$ins))
    {}
    else
    {
      echo mysqli_error($conn);
    }
    $qn++;
  }
  $score=($tpt/$totalq)*100;
   $uprecords="INSERT INTO `assessment_records` values ('$email','$eid','$score',1)";
   if($runup=mysqli_query($conn,$uprecords))
   {
    echo "<script type='text/javascript'>alert('Test Submitted')</script>";
   echo "<script type='text/javascript'>location.replace('result.php')</script>";    
   }
   else
   {
       echo mysqli_error($conn);
       echo "<script type='text/javascript'>alert('Test Not Submitted')</script>";
 
   }
}
?>

<script type="text/javascript">
var max_time = <?php echo "$duration" ?>;
var c_seconds  = 0;
var total_seconds =60*max_time;
max_time = parseInt(total_seconds/60);
c_seconds = parseInt(total_seconds%60);
document.getElementById("quiz-time-left").innerHTML='' + max_time + ':' + c_seconds + 'Min';
function init(){
document.getElementById("quiz-time-left").innerHTML='' + max_time + ':' + c_seconds + ' Min';
setTimeout("CheckTime()",999);
}
function CheckTime(){
document.getElementById("quiz-time-left").innerHTML='' + max_time + ':' + c_seconds + ' Min' ;
if(total_seconds <=0){
setTimeout('document.getElementById("fintest").click()',1);
    
    } else
    {
total_seconds = total_seconds -1;
max_time = parseInt(total_seconds/60);$
c_seconds = parseInt(total_seconds%60);
setTimeout("CheckTime()",999);
}

}
init();
document.addEventListener('contextmenu', event => event.preventDefault());
$(document).keydown(function(e){
    if(e.which === 17 || e.which === 16 || e.which ===73 || e.which==123 || e.which==67){
      alert('Action Prohibited.You Will Be Disqualified');
       return false;
    }
});
</script>