<?php include'header.php' ;
 if($role!='admin')
 {
   header('location:login.php');
 }
?>
<center>
   <h3>Employee Salary</h3>
</center>
<form action="" method="post">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="form-group ">
               <label>Employee Name</label>
               <select name="name" class="form-control form-control-lg">
                  <option selected="">Select Employee</option>
                  <?php
                  $sql = "SELECT * FROM employee";
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
               <div class="form-group ">
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
                  <label for="exampleInputText1">Salary</label>
                  <input type="text" name="salary" class="form-control" id="exampleInputText1" placeholder="Enter Salary">
               </div>
            </div>
         </div>
      </div>
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="form-group">
                  <label for="exampleInputText1">Remaning Amount</label>
                  <input type="text" name="remaining" class="form-control" id="exampleInputText1" placeholder="Rupees">
               </div>
            </div>
         </div>
      </div>
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="form-group">
                  <label for="exampleInputText1">Date</label>
                  <input type="Date" name="date" class="form-control" id="exampleInputText1" placeholder="Date">
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
if (isset($_POST['submit'])) {
   $name = $_POST['name'];
   $designation = $_POST['designation'];
   $salary = $_POST['salary'];
   $remaining = $_POST['remaining'];
   $date = $_POST['date'];


   $query = "INSERT INTO `salary`(`name`, `designation`, `salary`, `remaining`, `date`) VALUES ('$name','$designation','$salary','$remaining','$date')";
   $q = mysqli_query($db, $query);
   if ($q) { ?>
      <script>
         window.location.href = "salaryinfo.php"
      </script>
<?php

   }
}

?>
<?php include 'footer.php' ?>