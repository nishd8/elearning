           <div id="faculty" style="display: none;">
            <h3>Faculty</h3>
            <hr>
            <div class="row">
              <div class="col adminpad">
                <h3>Add Faculty</h3>
                    <form method='POST' action='admin.php' class="fc">
                        <input type="text" name="name" placeholder="Name"><br><br>
                        <input type="email" name="email" placeholder="Email"><br><br>
                        <select name='tsub'>
                           <option value="" disabled selected>Select Subject Taught</option>
                           <?php
                              $getsubs="SELECT * FROM subjects";
                              if($run3=mysqli_query($conn,$getsubs))
                              {
                                while ($row=mysqli_fetch_assoc($run3))
                                 {
                                   echo '<option value="'.$row['subject'].'">'.$row['subject'].'</option>'; 
                                 }
                              }
                            ?>
                        </select><br><br>             
                        <input type="submit" name="addfaculty" value="Add">&nbsp;&nbsp;&nbsp;
                     </form>
    
              </div>
        
              <div class="col adminpad">
                <h3>Remove Faculty</h3>
                    <form method='POST' action='admin.php' class="fc">
                        <input type="text" name="name" placeholder="Name"><br><br>
                        <input type="email" name="email" placeholder="Email"><br><br>
                        <input type="password" name="password" placeholder="Your password"><br><br>
                        <input type="submit" name="delfaculty" value="Delete">
                     </form>        
              </div>

              <div class="col adminpad">
                <h3>Search Faculty</h3>
                    <div class="fc" style="height: 88%;">
                        <input type="text" name="name" placeholder="Name"><br><br>
                        <input type="email" name="email" placeholder="Email" id="find"><br><br><br>
                        <br><br>
                        <button onclick="findString('find')">Search</button>
                      </div>
              </div>
              <div class="col adminpad">
                <h3>Bulk Add Faculty</h3>
                    <form method='POST' action='admin.php' class="fc" style="height: 88%;" enctype='multipart/form-data'>
                        <input type="file" name="fl"><br><br>
                        <input type="password" name="password" placeholder="Your password"><br><br>
                        <input type="submit" name="bulkaddfaculty" value="Bulk Add">
                     </form> 
              </div>
         </div>
          <div class="table-responsive pad">
          <table class="table table-bordered  table-striped">
            <tr class="thead-dark"><th>Name</th><th>Email</th><th>Password</th></tr>
            <?php
               $q="SELECT * FROM user WHERE pos='T' ORDER BY name asc";
               $run=mysqli_query($conn,$q);
               while($row=mysqli_fetch_assoc($run))
               {

               echo "<tr><td>".$row['name']."</td>
               <td>".$row['email']."</td>
               <td>".$row['pass']."</td>
                <input type='hidden' name='em' value='".$row['email']."'>";
             }
            ?>
          </table>
        </div>

        <div class="row pad" style="width: 100%; ">
            <div class="col-lg-4 sm-12 md-12 pad">
            <span><h3>Make admin:</h3></span>
            <form class="fc" method="post" action="admin.php"><input type="email" name="email" placeholder="Faculty Email"><br><br><input type="submit" name="mkadmin" value="Make Admin"></form>  </div>
            <div class="col-lg-4 sm-12 md-12 pad">
            <span><h3>Add Subject:</h3></span>
            <form class="fc" method="post" action="admin.php"><input type="text" name="sub" placeholder="Subject Name"><br><br><input type="submit" name="addsub" value="Add"></form>  </div>
            <div class="col-lg-4 sm-12 md-12 pad">
            <span><h3>Delete Subject:</h3></span>
            <form class="fc" method="post" action="admin.php"><input type="text" name="sub" placeholder="Subject Name"><br><br><input type="submit" name="delsub" value="Delete"></form>  </div>
          </div>

       <div class="table-responsive pad">
          <table class="table table-bordered  table-striped">
            <tr class="thead-dark"><th>Subject Name</th></tr>
            <?php
               $q="SELECT * FROM subjects";
               $run=mysqli_query($conn,$q);
               while($row=mysqli_fetch_assoc($run))
               {

               echo "<tr><td>".$row['subject']."</td>";
               }
            ?>
          </table>
        </div>

        </div>
      </div>
<?php include 'adminAddFaculty.php'?>
<?php include 'adminDeleteFaculty.php'?>
<?php include 'adminBulkAddFaculty.php'?>
<?php include 'adminMakeFacultyAdmin.php'?>
<?php include 'adminAddSubject.php'?>
<?php include 'adminDeleteSubject.php'?>

