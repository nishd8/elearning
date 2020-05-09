<?php
$tab_sql = "SELECT * FROM questions WHERE exam_id = '$eid'";
$runq=mysqli_query($conn, $tab_sql);
$tbl_html="";
while ($qrow=mysqli_fetch_assoc($runq))
 {
	$tbl_html.="<tr><td>".$qrow['question_id']."</td><td>".$qrow['question']."</td><td>".$qrow['op1']."</td><td>".$qrow['op2']."</td><td>".$qrow['op3']."</td><td>".$qrow['op4']."</td><td>".$qrow['ans']."</td></tr>";
}
$tbl_html.="<form method='post'>";
$tbl_html.="<tr><td><input type='text' name='q_id' placeholder='question-id'></td><td><input type='text' name='q' placeholder='question'></td><td><input type='text' name='op1' placeholder='option 1'></td><td><input type='text' name='op2' placeholder='option 2'></td><td><input type='text' name='op3' placeholder='option 3'></td><td><input type='text' name='op4' placeholder='option 4'></td><td><input type='text' name='ans' placeholder='Answer'></td></tr>";
$tbl_html.="<tr><td><input type='submit' name='addq' value='add'></td></tr>";
$tbl_html.="</form>";

$del_html="";
$del_html.="<br><form method='post'>";
$del_html.="<input type='text' name='q_id' placeholder='question-id'>";
$del_html.="<tr><td><input type='submit' name='delq' value='delete'></td></tr>";
$del_html.="</form>";


if(isset($_POST['addq']))
{
	$qid=$_POST['q_id'];
	$ques=$_POST['q'];
	$op1=$_POST['op1'];
	$op2=$_POST['op2'];
	$op3=$_POST['op3'];
	$op4=$_POST['op4'];
	$ans=$_POST['ans'];
	$ins="INSERT INTO `questions`(`question_id`, `exam_id`, `question`, `op1`, `op2`, `op3`, `op4`, `ans`, `subject`) VALUES ('$qid','$eid','$ques','$op1','$op2','$op3','$op4','$ans','$sub')";
	if($rnq=mysqli_query($conn,$ins))
	{

   echo  '<script type="text/javascript">alert("Question Added")</script>';
   echo  '<script type="text/javascript">location.replace(window.location.href)</script>';
	}
	else
	{
		echo mysqli_error($conn);
	}
}

if (isset($_POST['delq']))
 {
		$qid=$_POST['q_id'];
		$del="DELETE FROM `questions` WHERE question_id='$qid'";
			if($rnq=mysqli_query($conn,$del))
	{

   echo  '<script type="text/javascript">alert("Question Deleted")</script>';
   echo  '<script type="text/javascript">location.replace(window.location.href)</script>';
	}
	else
	{
		echo mysqli_error($conn);
	}
 }


?>