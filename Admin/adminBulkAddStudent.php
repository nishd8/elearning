<?php
if(isset($_POST['bulkaddfaculty']))

{
   $name=$_FILES['fl']['name'];
   $dir="";
   $target_file=$dir.$_FILES['fl']['name'];
  if(move_uploaded_file($_FILES['fl']['tmp_name'],$target_file))
              {
         $f=fopen('a.txt', 'w');
         fwrite($f, $name);
         fclose($f);

         $cmd="python aa.py < a.txt";
         shell_exec($cmd);     
               
$name=str_replace(".xlsx",".csv",$name);
echo $name;
$q="LOAD DATA INFILE 'C:/xampp/htdocs/ui/".$name."' 
INTO TABLE user 
FIELDS TERMINATED BY ',' 
LINES TERMINATED BY '\n'
IGNORE 1 ROWS";
if($r=mysqli_query($conn,$q))
{
       echo '<script type="text/javascript">alert("Done")</script>';

}
else
{
    echo '<script type="text/javascript">alert("Not Done. Please Try Again.")</script>';

}
}
}
?>