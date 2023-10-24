<?php include'header.php' ;
 if($role!='admin')
 {
   header('location:login.php');
 }
?>
 <center><h4>Designation Information</h4></center>
 <form action="" method="post">
                   <div class="container">
                        <div class="row">
                            <div class="col-md-12"> 
                                <div class="form-group " >
                                    <label>Designation Name</label>
                                    <select class="form-control form-control-lg" name="designation">
                                    <option selected="">Select Designation</option>
                  <?php
                  $sql = "SELECT * FROM designation";
                  $res = mysqli_query($db, $sql);


                  while ($row = mysqli_fetch_assoc($res)) {
                  ?>
                     <option><?php echo $row['name'] ?></option>
                  <?php
                  }
                  ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="container">
                     <div class="row">
                            <div class="col-md-12">
                     <div class="form-group">
                           <label for="exampleInputText1">Employee Name</label>
                           <input type="text" class="form-control" id="exampleInputText1" name="name" placeholder="Employee name">
                        </div>
                        </div>
                     </div>
</div>

<div class="container">
                     <div class="row">
                            <div class="col-md-12">
                     <div class="form-group">
                           <label for="exampleInputText1">Salary</label>
                           <input type="text" class="form-control" id="exampleInputText1" name="salary"
                              placeholder="salary">
                        </div>
                        </div>
                     </div>
</div>
<div class="container">
                     <div class="row">
                            <div class="col-md-12">
                        <div class="form-group">
                           <label for="exampleInputText1">Joining Data</label>
                           <input type="Date" class="form-control" id="exampleInputText1" 
                              placeholder="Joining Date" name="date">
                        </div>
                        </div>
                        </div>
</div>
<div class="container">
                     <div class="row">
                            <div class="col-md-12">
                        <div class="form-group">
                           <label for="exampleInputText1">Password</label>
                           <input type="Password" class="form-control" id="exampleInputText1" 
                              placeholder="Enter Password" name="pass">
                        </div>
                        </div>
                        </div>
</div>

<div class="container">
                        <button type="submit" name="submit" class="btn btn-primary mr-2">Submit</button>
                        <button type="submit" class="btn bg-danger">Cancel</button>
                        
</div>
</div>
</div>
</form>
<?php
if(isset($_POST['submit']))
        {
            $name=$_POST['name'];
            $designation=$_POST['designation'];
            $salary=$_POST['salary'];
            $joiningdate=$_POST['date'];
            $pass=$_POST['pass'];
           
            
            $query="INSERT INTO `employee`( `name`, `designation`, `salary`, `joining`, `password`) VALUES ('$name','$designation','$salary','$joiningdate',$pass)";
            $q=mysqli_query($db,$query);
            if($q)
            {?>
              <script>
            window.location.href = "employeeinfo.php"
        </script>
        <?php
                
            }
        }
        ?>
<?php include'footer.php' ?>