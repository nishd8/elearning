<h3>Create Quizz</h3>
      <form action="teacher.php" class="fc" method="post">
        <input type="text" name="qname" placeholder="Quizz Name" style="width: 75%;"><br><br>
        <input type="text" name="qid" placeholder="Quizz ID(same as in file uploaded)" style="width: 75%;"><br><br>
        <input type="number" name="duration" placeholder="Duration(minutes)" style="width: 75%"><br><br>
        <select name="subs" style="width: 75%">
    <option value="" disabled selected>Select Subject</option>
    <?php

   $getsubs="SELECT * FROM teachers WHERE email='$email'";
   if($rungetsub=mysqli_query($conn,$getsubs))
   {
   while ($row=mysqli_fetch_assoc($rungetsub))
   {
    echo '<option value="'.$row['subject'].'">'.$row['subject'].'</option>';
   }
   }                            
    ?>   
   </select><br><br>
   
        <input type="submit" name="cq" value="Create"><br><br>
      </form>

<?php  

if(isset($_POST['cq']))
{
  $qnm=$_POST['qname'];
  $id=$_POST['qid'];
  $dur=$_POST['duration'];
  $sub=$_POST['subs'];
  $status=0;
  $ins="INSERT INTO `quizz`(`name`, `exam_id`, `duration`, `status`,subject) VALUES ('$qnm','$id','$dur','$status','$sub')";
  if($run=mysqli_query($conn,$ins))
  {
       echo '<script type="text/javascript">alert("Done")</script>';
    
  }
  else
  {
          echo mysqli_error($conn);
    
  }
}


?>      