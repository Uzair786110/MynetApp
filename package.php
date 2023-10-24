<?php include 'header.php'; ?>

<div class="card">
   <div class="card-header d-flex justify-content-between">
      <div class="header-title">
         <h4 class="card-title">Package information</h4>
      </div>
      <div class="card">
         <button class="btn btn-primary" data-bs-toggle='modal' data-bs-target='#create'>Create Pacakge</button>
      </div>
      <!-- Create package Modal -->
      <div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Create Package</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" style="background: #fff;border: none;font-size: 27px;">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Package Name:</label>
                                <input type="text" class="form-control" id="package-name">
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Package Price:</label>
                                <textarea class="form-control" id="package-price"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary"  data-bs-dismiss="modal" id="createbtn">Create Package</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Edit Modal -->
        <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Package</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" style="background: #fff;border: none;font-size: 27px;">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                        <div class="form-group">
                               
                                <input type="hidden" class="form-control" id="ed-package-id">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Package Name:</label>
                                <input type="text" class="form-control" id="ed-package-name">
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Package Price:</label>
                                <textarea class="form-control" id="ed-package-price"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary"  data-bs-dismiss="modal" id="updatebtn">Update Package</button>
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

                  <th>Package Mbs</th>
                  <th>Price</th>
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
         url: "package_process.php",
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
                     url:"package_process.php",
                    type:"POST",
                    data:{action:"edit_package",id:edit_package_id},
                    dataType: "html", 
                    success:function(data){
                        // console.log(data);
                        // alert(data);
                        var userData=JSON.parse(data); 
                        $("#ed-package-id").val(userData.ID);     
                        $("#ed-package-name").val(userData.name);               
                        $("#ed-package-price").val(userData.price);               
                        
                    },
                });
            });
            $("#updatebtn").click(function(e){
                e.preventDefault();
                var  id  = $("#ed-package-id").val();
                var name =      $("#ed-package-name").val();               
                var price  =   $("#ed-package-price").val();               
                
                $.ajax({
                    url:"package_process.php",
                    type:"POST",
                    data:{action:"update_package",id:id,name:name,price:price},
                    success:function(data){
                         //alert(data);
                        if(data=='client updated successfully')
                       {
                        swal("Success!", "Package updated successfully", "success");
                       }
                       else{
                        swal("Error!", "Package not Updated", "error");
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
                    url:"package_process.php",
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
                var name =      $("#package-name").val();               
                var price  =   $("#package-price").val();               
               

                $.ajax({
                    url:"package_process.php",
                    type:"POST",
                    data:{action:"createpackage",name:name,price:price},
                    success:function(data){
                        // alert(data);
                        if(data=='package created successfully')
                       {
                        swal("Success!", "Package Created successfully", "success");
                       }
                       else{
                        swal("Error!", "package not Created", "error");
                       }
                       show_all_packages();
                        console.log(data);
                    },
                });
            });
});
</script>

<?php include 'footer.php' ?>