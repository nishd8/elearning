      <form action='teacher.php' method='POST' enctype='multipart/form-data' class="fc">
        <input type='file'  name='fl'><br><br>
        <select  name="type" required>
        <option value="" disabled selected>Select File Type</option>
        <option value='vid'>Video</option>
        <option value='pdf'>PDF</option>
        <option value='ppt'>PPT</option>
        
        </select><br><br>
   <select name='unit'>
    <option value="" disabled selected>Select Unit</option>
   <option value='1'>1</option>
   <option value='2'>2</option>
   <option value='3'>3</option>
   <option value='4'>4</option>
   <option value='5'>5</option>
   <option value='6'>6</option>
   </select><br><br>
   <select name="subs">
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
   <input type='submit' value='Upload' name='upld'><br>
  </form>

  <?php
    if(isset($_POST['upld']))
{
  $sub=$_POST['subs'];
  $type=$_POST['type'];
  $unit=$_POST['unit'];
  $name=$_FILES['fl']['name'];

  if($type=='vid')
  {
   $dir="videos/";
   $target_file=$dir.$_FILES['fl']['name'];
  if(move_uploaded_file($_FILES['fl']['tmp_name'],$target_file))
              {
              $cmd=" ffmpeg -i  videos/".$name." -vframes 1 -an -s 400x222 -ss 30 thumbnail/".$name."_thumbnail.jpg";
              echo (shell_exec($cmd." 2<&1"));
              $query = "INSERT INTO videos(name,subject,unit,author,status) VALUES('$name','$sub','$unit','$email',0)";
              if(mysqli_query($conn,$query))
              {
                    echo '<script type="text/javascript">alert("Video Uploaded")</script>';
                    echo '<script type="text/javascript">window.location.replace("teacher.php")</script>';
              }
              else
              {
                    echo '<script type="text/javascript">alert("Video Not Uploaded")</script>';

              }
              
            }
  }
  else if($type=='pdf')
  {
   $dir="pdfs/";
   $target_file=$dir.$_FILES['fl']['name'];
   if(move_uploaded_file($_FILES['fl']['tmp_name'],$target_file)){
              // Insert record
              $query = "INSERT INTO pdfs(name,subject,author,unit) VALUES('$name','$sub','$email','$unit')";
              if(mysqli_query($conn,$query))
              {
                    echo '<script type="text/javascript">alert("PDF Uploaded")</script>';
                    echo '<script type="text/javascript">location.replace("teacher.php")</script>';
              }
              else
              {
                    echo '<script type="text/javascript">alert("PDF Not Uploaded")</script>';

              }
              
            }
  }
  else if($type=='ppt')
  {
   $dir="ppts/";
   $target_file=$dir.$_FILES['fl']['name'];
    if(move_uploaded_file($_FILES['fl']['tmp_name'],$target_file)){

              // Insert record
              $query = "INSERT INTO ppts(name,subject,author,unit) VALUES('$name','$sub','$email','$unit')";
              if(mysqli_query($conn,$query))
              {
                    echo '<script type="text/javascript">alert("PPT Uploaded")</script>';
                    echo '<script type="text/javascript">location.replace("teacher.php")</script>';

              }
              else
              {
                    echo '<script type="text/javascript">alert("PPT Not Uploaded")</script>';

              }
              
            } 
 
  }

  
}

  ?>