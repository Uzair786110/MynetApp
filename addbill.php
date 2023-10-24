<?php include 'header.php';

?>
<center>
   <h3>Add Bill</h3>
</center>

<form action="" method="post">
<div class="container">
   <div class="row">
      <div class="col-md-12">
         <div class="form-group">
            <label for="exampleInputText1">Username</label>
            <select class="form-control form-control-lg" id="" name="userreg">
               <option selected="">Select User</option>
               <?php
               $sql = "SELECT * FROM user";
               $res = mysqli_query($db, $sql);


               while ($row = mysqli_fetch_assoc($res)) {
               ?>
                  <option value="<?php echo $row['id'] ?>"><?php echo $row['reg'] ?></option>
               <?php
               }
               ?>

            </select>
         </div>
      </div>
      <div class="col-md-4">
      <div class="form-group">
         <button type="submit" name="btn-fetch" class="btn btn-success">Fetch data</button>
      </div>
      </div>
   </div>
</div>
</form>
<?php
if(isset($_POST['btn-fetch']))
{
   $reg=$_POST['userreg'];
   if($reg!='Select User')
   {
      $sql = "SELECT * FROM user where id=$reg";
     
      $fetch = mysqli_query($db, $sql);
      $fetchuser = mysqli_fetch_assoc($fetch);
      

   }
}



?>
<input type="text" hidden name="" id="b-emp" value="<?php echo $id?>">
<div class="container">
   <div class="row">
      <div class="col-md-12">
         <div class="form-group">
            <label>Packages</label>
            <select class="form-control form-control-lg" id="b-package">
               <option selected="">Select packages</option>
               <?php
               
               $sql = "SELECT * FROM packages";
               $res = mysqli_query($db, $sql);


               while ($row = mysqli_fetch_assoc($res)) {
                  if($fetchuser['package']==$row['ID'])
                  {
               ?>
                  <option selected value="<?php echo $row['ID'] ?>"><?php echo $row['name'] ?></option>
               <?php
               }
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
            <label for="exampleInputText1">Package Price</label>
            <input type="hidden" id="b-name" value="<?php echo $fetchuser['id'] ?? null ?>">
            <input type="text" class="form-control" id="" disabled placeholder="Rupees" value="<?php echo $fetchuser['price'] ?? null ?>">
         </div>
      </div>
   </div>
</div>

<div class="container">
   <div class="row">
      <div class="col-md-12">
         <div class="form-group">
            <label for="exampleInputText1">Total Amount</label>
            <input type="text" class="form-control" disabled id="b-remain" placeholder="Rupees" value="<?php echo $fetchuser['Remaining'] ?? null ?>">
         </div>
      </div>
   </div>
</div>
<div class="container">
   <div class="row">
      <div class="col-md-12">
         <div class="form-group">
            <label for="exampleInputText1">Paying</label>
            <input type="text" class="form-control" id="b-amount" placeholder="Rupees" value="<?php echo $fetchuser['Remaining']?? null ?>">
         </div>
      </div>
   </div>
</div>
<div class="container">
   <button type="submit" class="btn btn-primary mr-2" id="createbtn">Submit</button>
   <button type="submit" class="btn bg-danger">Cancel</button>

</div>

</div>
</div>
<script>
   $(document).ready(function() {

      $('#createbtn').click(function(e) {
         e.preventDefault();
         var emp = $("#b-emp").val();
         var name = $("#b-name").val();
         var package = $("#b-package").val();
         var amount = $("#b-amount").val();
        if(emp=='khali')
        {
         alert("Insert Emp Name");
        }
        else
        {

         $.ajax({
            url: "billprocess.php",
            type: "POST",
            data: {
               action: "createbill",
               name: name,
               status: status,
               package: package,
               emp: emp,
               amount: amount
               
            },
            success: function(data) {
               // alert(data);
              
               if (data == 'package created successfully') {
                  swal("Success!", "Bill Created successfully", "success");
                  setTimeout(function(){location.reload()}, 2000);

               } else {
                  swal("Error!", "Bill not Created", "error");
               }
               setTimeout(function(){ window.location.href = "billinfo.php"}, 2000);
              
               console.log(data);
            },
         });
      }
      });
   });
</script>
<?php include 'footer.php' ?>