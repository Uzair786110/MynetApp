<?php include'header.php' ;
 if($role!='admin')
 {
   header('location:login.php');
 }
?>

<div class="card">
   <div class="card-header d-flex justify-content-between">
      <div class="header-title">
         <h4 class="card-title">Expenses information</h4>
      </div>
      <div class="card">
         <button class="btn btn-primary" data-bs-toggle='modal' data-bs-target='#create'>Create Expenses</button>
      </div>
      <!-- Create package Modal -->
      <div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Create Expense</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" style="background: #fff;border: none;font-size: 27px;">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Item Name:</label>
                                <input type="text" class="form-control" id="item">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Order By:</label>
                                <input type="text" class="form-control" id="by">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Date:</label>
                                <input type="date" class="form-control" id="date">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Amount:</label>
                                <input type="number" class="form-control" id="amount">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary"  data-bs-dismiss="modal" id="createbtn">Create Expense</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Edit Modal -->
        <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Expense</h5>
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
                                <label for="recipient-name" class="col-form-label">Item Name:</label>
                                <input type="text" class="form-control" id="ed-item">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Order By:</label>
                                <input type="text" class="form-control" id="ed-by">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Date:</label>
                                <input type="date" class="form-control" id="ed-date">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Amount:</label>
                                <input type="number" class="form-control" id="ed-amount">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary"  data-bs-dismiss="modal" id="updatebtn">Update Expense</button>
                    </div>
                </div>
            </div>
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
               <th>Item</th>
                  <th>Expense By</th>
                  <th>Date</th>
                  <th>Amount</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody id="pdata">
               <tr>

                  <td>50Mbps</td>
                  <td>1000</td>

                  <td class="text-white">
                     <button type="button" class="btn btn-info" style="padding: 10px 10px 10px 10px;">
                        <img src="./assets/images/edit.png" width="20">

                     </button>
                     <button type="button" class="btn btn-success" style="padding: 10px 10px 10px 10px;">
                        <img src="./assets/images/add-friend.png" width="20">
                     </button>
                     <button type="button" class="btn btn-danger" style="padding: 10px 10px 10px 10px;">
                        <img src="./assets/images/trash-bin.png" width="20">
                     </button>
                  </td>
               </tr>

            </tbody>

         </table>
      </div>
      
   </div>
</div>
<!-- Modal  Delete Folder/ File-->

<div class="modal fade" id="deleteproject" tabindex="-1"  aria-hidden="true">
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
                    <button type="button" class="btn btn-danger color-fff" id="delete_client" data-bs-dismiss="modal">Delete</button>
                </div>
            </div>
            </div>
        </div>
     
<script>
   $(document).ready(function () {
   
   function show_all_packages() {
      $.ajax({
         url: "expense_process.php",
         type: "GET",
         data: {
            action: "show_all_package"
         },
         success: function(data) {
            console.log(data);
           //  alert(data);
            $("#pdata").html(data);
         },
      });
   }
   show_all_packages();
   var edit_package_id;
            $(document).on("click",".edit-btn",function(){
               edit_package_id = $(this).data("id");
                  //alert(edit_package_id);
                // alert(id);
                $.ajax({
                     url:"expense_process.php",
                    type:"POST",
                    data:{action:"edit_package",id:edit_package_id},
                    dataType: "html", 
                    success:function(data){
                        // console.log(data);
                        // alert(data);
                        var userData=JSON.parse(data); 
                        $("#ed-id").val(userData.ID);     
                        $("#ed-item").val(userData.Item);               
                        $("#ed-by").val(userData.Orderby); 
                        $("#ed-amount").val(userData.Amount);               
                        $("#ed-date").val(userData.Date);              
                        
                    },
                });
            });
            $("#updatebtn").click(function(e){
                e.preventDefault();
                var  id  = $("#ed-id").val();
                var name =      $("#ed-item").val();               
                var price  =   $("#ed-amount").val(); 
                var date =      $("#ed-date").val();               
                var by  =   $("#ed-by").val();              
                
                $.ajax({
                    url:"expense_process.php",
                    type:"POST",
                    data:{action:"update_package",id:id,name:name,price:price,by:by,date:date},
                    success:function(data){
                         //alert(data);
                        if(data=='client updated successfully')
                       {
                        swal("Success!", "Expense updated successfully", "success");
                       }
                       else{
                        swal("Error!", "Expense not Updated", "error");
                       }
                       show_all_packages();
                        console.log(data);
                    },
                });
            });
   var delete_client_id;
            $(document).on("click",".delete-btn",function(){
                 delete_client_id = $(this).data("id");
                // alert('click');
               //alert(delete_client_id);
                });
            $("#delete_client").on("click",function(){
                 //alert(delete_client_id);
                $.ajax({
                    url:"expense_process.php",
                    type:"POST",
                    data:{action:"delete",id:delete_client_id},
                    success:function(data){
                       // alert(data);
                        if(data=='client delete successfully')
                       {
                        swal("Success!", "Package deleted successfully", "success");
                       }
                       else{
                        swal("Error!", "Package not Deleted", "error");
                       }
                       show_all_packages();
                        console.log(data);
                    },
                });
            });
            $('#createbtn').click(function (e) { 
               e.preventDefault();
                var item =      $("#item").val();               
                var by  =   $("#by").val(); 
                var date =      $("#date").val();               
                var amount  =   $("#amount").val();                     
               

                $.ajax({
                    url:"expense_process.php",
                    type:"POST",
                    data:{action:"createpackage",item:item,by:by,date:date,amount:amount},
                    success:function(data){
                        // alert(data);
                        if(data=='package created successfully')
                       {
                        swal("Success!", "Expense Created successfully", "success");
                       }
                       else{
                        swal("Error!", "Expensee not Created", "error");
                       }
                       show_all_packages();
                        console.log(data);
                    },
                });
            });
});
</script>

<?php include 'footer.php' ?>