<?php session_start()?>
<?php
               $email=$_SESSION['user_email'];
               $name=$_SESSION['user_name'];
               $pass=$_SESSION['user_pass'];
            ?>
<!DOCTYPE html>
<html>
<head>
	<title>Student</title>
	<?php include '../links.php' ?>
	<?php include '../connection.php' ?>
  <?php include '../style.php' ?>
</head>
<body style="height: 100vh !important;">
<!-- Side Bar -->
  <div id="sb">
  	<!-- Teacher Profile  -->
  	Hi <?php echo $name ;?>
  	<hr>
  	<ul style="list-style-type: none">
  		<?php
  		$getsubs="SELECT * FROM subjects";
  		$run=mysqli_query($conn,$getsubs);
  		while($row=mysqli_fetch_assoc($run))
  		{
  		
  		echo '<li>';
  		    $subid=$row['subject'].'id';
  		    //$subid=strval($subid);
            //$subid1='#'.$subid;
            $sub=$row['subject'];
  		    echo '<span onclick="tgllist(\''.$subid.'\')">'.$row['subject'].'</span>';
            echo '<div class="sub" id="'.$subid.'">';
            echo '<ul>';
            		echo '<li>';
            		   $pdf=$row['subject'].'pdf';
            		   echo '<span onclick="tgllist(\''.$pdf.'\')">PDF Notes</span>';
                       echo  '<div class="sub" id="'.$pdf.'">';
                              echo '<ul>';
                                $getpdf="SELECT * FROM pdfs WHERE  subject='$sub'";
                                $rgetpdf=mysqli_query($conn,$getpdf);
                                while($pdfrow=mysqli_fetch_assoc($rgetpdf))
                                { 
                                 echo '<li><a href="pdfs/'.$pdfrow['name'].'">'.$pdfrow['name'].'</a></li>';
                                }
                              echo '</ul>';	   
                       echo  '</div>';
            	    echo '</li>';
            		echo '<li>';
            		   $video=$row['subject'].'vid';
            		   echo '<span onclick="tgllist(\''.$video.'\')">Videos</span>';
                       echo  '<div class="sub" id="'.$video.'">';
                              echo '<ul>';
                                $getvid="SELECT * FROM videos WHERE  subject='$sub'";
                                $rgetvid=mysqli_query($conn,$getvid);
                                while($vidrow=mysqli_fetch_assoc($rgetvid))
                                { 
                                  echo '<li><span onclick="play(\'videos/'.$vidrow['name'].'\',\''.$vidrow['views'].'\')">'.$vidrow['name'].'</a></li>';
                                 
                                }
                              echo '</ul>';
                       echo  '</div>';
            	    echo '</li>';
            	    echo '<li>';
            		   $ppt=$row['subject'].'ppt';
            		   echo '<span onclick="tgllist(\''.$ppt.'\')">PPT</span>';
                       echo  '<div class="sub" id="'.$ppt.'">';
                             echo '<ul>';
                                $getppt="SELECT * FROM ppts WHERE subject='$sub'";
                                $rgetppt=mysqli_query($conn,$getppt);
                                while($pptrow=mysqli_fetch_assoc($rgetppt))
                                { 
                                 echo '<li><a href="ppts/'.$pptrow['name'].'">'.$pptrow['name'].'</a></li>';
                                }
                              echo '</ul>';

                       echo  '</div>';
            	    echo '</li>';
            	    
                  echo '<li>';
                   $quizz=$row['subject'].'quizz';
                   echo '<span onclick="tgllist(\''.$quizz.'\')">Quizzes</span>';
                       echo  '<div class="sub" id="'.$quizz.'">';
                             echo '<ul>';
                                $getquizz="SELECT * FROM quizz WHERE subject='$sub'";
                                $rgetquizz=mysqli_query($conn,$getquizz);
                                while($quizzrow=mysqli_fetch_assoc($rgetquizz))
                                { 
                                 echo '<li><a href="assessment.php?eid='.$quizzrow['exam_id'].'&qno='.$quizzrow['name'].'&qsub='.$quizzrow['subject'].'&duration='.$quizzrow['duration'].'">'.$quizzrow['name'].'</a></li>';
                                }
                              echo '</ul>';

                       echo  '</div>';
                  echo '</li>';
            	echo '</ul>';
            echo '</div>';
  		echo '</li>';
  	    }
        ?>
  		</ul>
  	<hr>
  </div>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
   <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <i id="tg" class='fas fa-arrow-alt-circle-right' style='color:#d5d5d5;font-size: 30px;'></i>
      </li>
    </ul>		
   <a class="navbar-brand" href="#">E-Learning</a>
   <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <form method="post">
        <button  type="submit" name='lgt' style="border:2px solid #d5d5d5; background-color: transparent;color: #d5d5d5;"><i class="fas fa-sign-out-alt"></i></button>
        </form>
      </li>
   </ul>
  </nav> 
  <div>
    <div class="container-fluid">
  	<div class="row pad">
  		<div class="col-lg-8 sm-auto md-auto pad2">
        <div id='viddiv' class="fc">
          <h3 id="title"></h3><br>
  	<video id='vidshow' style="width: 100%;" controls>
  		<source id="srcvid" type="video/mp4">
    </video>
      </div>
     </div>
     <br><br>
  	<div class="col-lg-4 sm-auto md-auto pad2">
      <div class="container-fluid fc">
        <h3><i class="fa fa-bullhorn" aria-hidden="true"></i></h3><h4> Announcements</h4>
      </div>
    </div>
  </div>
  
</body>
      <div class="navbar navbar-expand-lg navbar-dark bg-dark navbar-fixed-bottom" id="footer">
        <a class="navbar-brand mx-auto">Made by Nishad Raisinghani</a>
      </div>
  </div>
</html>
<?php
include '../sidebarJavaScript.php';
include 'studentPlay.php';

?>
<?php
if (isset($_POST['lgt'])) 
 {
  session_destroy();
  echo "<script type='text/javascript'>location.replace('../index.php')</script>";
 }
?>