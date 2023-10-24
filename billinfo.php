<?php include 'header.php'; ?>

<div class="card">
   <div class="card-header d-flex justify-content-between">
      <div class="header-title">
         <h4 class="card-title">Bill information</h4>
      </div>

   </div>
   <div class="card-body">
      <div class="collapse" id="datatable-2">

      </div>
      <!-- <p>Images in Bootstrap are made responsive with <code>.img-fluid</code>. <code>max-width: 100%;</code> and <code>height: auto;</code> are applied to the image so that it scales with the parent element.</p> -->
      <div class="table-responsive">
         <table id="datatable" class="table data-table table-striped table-bordered">
            <thead>
               <tr>
                 
                  <th>Registration Id</th>
                  <th>Username</th>
                  <th>Package</th>
                  <th>Amount</th>
                  <th>Collected By</th>
                  <th>Collected Date </th>
                  <th class="text-center">Action</th>
               </tr>
            </thead>
            <tbody id="bdata">
               
         </table>
      </div>
   </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Bill</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" style="background: #fff;border: none;font-size: 27px;">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form>
               <div class="form-group">

                  <input type="hidden" class="form-control" id="ed-id">
               </div>
               <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Collected By:</label>
                  <select class="form-control form-control-lg" id="ed-emp">
                     <option selected="">Select Employee</option>
                     <?php
                     $sql = "SELECT * FROM employee";
                     $res = mysqli_query($db, $sql);


                     while ($row = mysqli_fetch_assoc($res)) {
                     ?>
                        <option value="<?php echo $row['ID'] ?>"><?php echo $row['name'] ?></option>
                     <?php
                     }
                     ?>
                  </select>
               </div>
               <div class="form-group">
                  <label for="message-text" class="col-form-label">User Name</label>
                  <select class="form-control form-control-lg" id="ed-name">
               <option selected="">Select User</option>
               <?php
               $sql = "SELECT * FROM user";
               $res = mysqli_query($db, $sql);


               while ($row = mysqli_fetch_assoc($res)) {
               ?>
                  <option value="<?php echo $row['id'] ?>"><?php echo $row['first_name'].' '.$row['last_name'] ?></option>
               <?php
               }
               ?>

            </select>
               </div>
               <div class="form-group">
                  <label for="message-text" class="col-form-label">Pacakge</label>
                  <select class="form-control form-control-lg" id="ed-package">
               <option selected="">Select packages</option>
               <?php
               $sql = "SELECT * FROM packages";
               $res = mysqli_query($db, $sql);


               while ($row = mysqli_fetch_assoc($res)) {
               ?>
                  <option value="<?php echo $row['ID'] ?>"><?php echo $row['name'] ?></option>
               <?php
               }
               ?>

            </select>
               </div>
               <div class="form-group">
                  <label for="message-text" class="col-form-label">Amount</label>
                  <input class="form-control" id="ed-amount"></input>
               </div>
              

            </form>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal" id="updatebtn">Update Bill</button>
         </div>
      </div>
   </div>
</div>
<!-- Modal  Delete Folder/ File-->

<div class="modal fade" id="deleteproject" tabindex="-1" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title  fw-bold" id="deleteprojectLabel"> Delete Client Permanently?</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body justify-content-center flex-column d-flex">
            <i class="icofont-ui-delete text-danger display-2 text-center mt-2"></i>
            <i class="fa fa-trash" aria-hidden="true" style="font-size: 63px;color: red;display: flex;justify-content: center;align-items: center;"></i>
            <p class="mt-4 fs-5 text-center">Do You Really want to delete this Package</p>
         </div>
         <div class="modal-footer">
         
            
         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-danger color-fff" id="delete_bill" data-bs-dismiss="modal">Delete</button>

           

         </div>
      </div>
   </div>
</div>


<!-- Print Model -->

<!-- <div class="modal fade" id="printproject" tabindex="-1" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title  fw-bold" id="printprojectLabel"> Print Client Bill?</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body justify-content-center flex-column d-flex">
            <i class="icofont-ui-delete text-danger display-2 text-center mt-2"></i>
            <i class="fa fa-trash" aria-hidden="true" style="font-size: 63px;color: red;display: flex;justify-content: center;align-items: center;"></i>
            <p class="mt-4 fs-5 text-center">Do You Really want to Print this Bill</p>
         </div>
         <div class="modal-footer">
         
            
         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-danger color-fff" id="print_bill" >Print</button>

           

         </div>
      </div>
   </div>
</div> -->


</div>
</div>
<script>
   $(document).ready(function() {
      show_all_bill();
      function show_all_bill() {
         $.ajax({
            url: "billprocess.php",
            type: "GET",
            data: {
               action: "show_all_bill"
            },
            success: function(data) {
               console.log(data);
               //  alert(data);
               $("#bdata").html(data);
            },
         });
      }
      show_all_bill();
      var delete_client_id;
      $(document).on("click", ".delete-btn", function() {
         delete_client_id = $(this).data("id");
         // alert('click');
         //alert(delete_client_id);
      });
      var edit_package_id;
      $(document).on("click", ".edit-btn", function() {
         edit_package_id = $(this).data("id");
         //alert(edit_package_id);
         // alert(id);
         $.ajax({
            url: "billprocess.php",
            type: "POST",
            data: {
               action: "edit",
               id: edit_package_id
            },
            dataType: "html",
            success: function(data) {
               // console.log(data);
               //alert(data);
               var userData = JSON.parse(data);
               $("#ed-id").val(userData.id);
               $("#ed-emp").val(userData.emp);
               $("#ed-name").val(userData.fname);
               $("#ed-package").val(userData.pack);
               $("#ed-amount").val(userData.amount);
               $("#ed-remain").val(userData.remain);

            },
         });
      });
      $("#updatebtn").click(function(e){
                e.preventDefault();
                var  id  = $("#ed-id").val();
                var name =      $("#ed-name").val();               
                var emp  =   $("#ed-emp").val();
                var package  =   $("#ed-package").val();
                var amount  =   $("#ed-amount").val();
                var remain  =   $("#ed-remain").val();

                
                $.ajax({
                    url:"billprocess.php",
                    type:"POST",
                    data:{action:"update_bill",id:id,name:name,emp:emp,package:package,amount:amount,remain:remain},
                    success:function(data){
                        // alert(data);
                        if(data=='client updated successfully')
                       {
                        swal("Success!", "Bill updated successfully", "success");
                       }
                       else{
                        swal("Error!", "Bill not Updated", "error");
                       }
                       show_all_bill();
                        console.log(data);
                    },
                });
            });
      $("#delete_bill").on("click", function() {
         //alert(delete_client_id);
         $.ajax({
            url: "billprocess.php",
            type: "POST",
            data: {
               action: "delete",
               id: delete_client_id
            },
            success: function(data) {
               // alert(data);
               if (data == 'client delete successfully') {
                  swal("Success!", "Bill deleted successfully", "success");
                  show_all_bill();
               } else {
                  swal("Error!", "Bill not Deleted", "error");
               }
               show_all_bill();
               console.log(data);
            },
         });

      });


      // Print Bill 

      // var print_client_id;
      // $(document).on("click", ".print-btn", function() {
      //    print_client_id = $(this).data("id");
      //    // alert('click');
      //    //alert(delete_client_id);
      //    $.ajax({
      //       url: "printBill.php",
      //       type: "POST",
      //       data: {
      //          action: "print",
      //          id: print_client_id
      //       },
      //       success: function(data){
      //         alert(data)
              
              

      //          // location.assign('printBill.php?Printid=''');
      //       },
      //    });
      // });

   });
</script>
<?php include 'footer.php' ?>