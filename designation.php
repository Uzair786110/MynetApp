<?php include'header.php' ;
 if($role!='admin')
 {
   header('location:login.php');
 }
?>

<div class="card">
   <div class="card-header d-flex justify-content-between">
      <div class="header-title">
         <h4 class="card-title">Designation information</h4>
      </div>
      <div class="card">
         <button class="btn btn-primary" data-bs-toggle='modal' data-bs-target='#create'>Create Designation</button>
      </div>
      <!-- Create package Modal -->
      <div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Create Designation</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" style="background: #fff;border: none;font-size: 27px;">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Designation Name:</label>
                                <input type="text" class="form-control" id="package-name">
                            </div>
                           
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary"  data-bs-dismiss="modal" id="createbtn">Create Designation</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Edit Modal -->
        <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Designation</h5>
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
                                <label for="recipient-name" class="col-form-label">Designation Name:</label>
                                <input type="text" class="form-control" id="ed-package-name">
                            </div>
                            
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary"  data-bs-dismiss="modal" id="updatebtn">Update Designation</button>
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

                  <th>Designation Name</th>
                  
                  <th>Action</th>
               </tr>
            </thead>
            <tbody id="ddata">
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
                    <h5 class="modal-title  fw-bold" id="deleteprojectLabel"> Delete Designation Permanently?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body justify-content-center flex-column d-flex">
                    <i class="icofont-ui-delete text-danger display-2 text-center mt-2"></i>
                    <i class="fa fa-trash" aria-hidden="true" style="font-size: 63px;color: red;display: flex;justify-content: center;align-items: center;"></i>
                    <p class="mt-4 fs-5 text-center">Do You Really want to delete this designation</p>
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
   
   function show_all_desig() {
      $.ajax({
         url: "designation_process.php",
         type: "GET",
         data: {
            action: "show_all_desig"
         },
         success: function(data) {
            console.log(data);
           //  alert(data);
            $("#ddata").html(data);
         },
      });
   }
   show_all_desig();
   var edit_package_id;
            $(document).on("click",".edit-btn",function(){
               edit_package_id = $(this).data("id");
                  //alert(edit_package_id);
                // alert(id);
                $.ajax({
                     url:"designation_process.php",
                    type:"POST",
                    data:{action:"edit_package",id:edit_package_id},
                    dataType: "html", 
                    success:function(data){
                        // console.log(data);
                        // alert(data);
                        var userData=JSON.parse(data); 
                        $("#ed-package-id").val(userData.ID);     
                        $("#ed-package-name").val(userData.name);               
                             
                        
                    },
                });
            });
            $("#updatebtn").click(function(e){
                e.preventDefault();
                var  id  = $("#ed-package-id").val();
                var name =      $("#ed-package-name").val();               
                           
                
                $.ajax({
                    url:"designation_process.php",
                    type:"POST",
                    data:{action:"update_package",id:id,name:name},
                    success:function(data){
                         //alert(data);
                        if(data=='client updated successfully')
                       {
                        swal("Success!", "Designation updated successfully", "success");
                       }
                       else{
                        swal("Error!", "Designation not Updated", "error");
                       }
                       show_all_desig();
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
                    url:"designation_process.php",
                    type:"POST",
                    data:{action:"delete",id:delete_client_id},
                    success:function(data){
                       // alert(data);
                        if(data=='client delete successfully')
                       {
                        swal("Success!", "Designation deleted successfully", "success");
                       }
                       else{
                        swal("Error!", "Designation not Deleted", "error");
                       }
                       show_all_desig();
                        console.log(data);
                    },
                });
            });
            $('#createbtn').click(function (e) { 
               e.preventDefault();
                var name =      $("#package-name").val();               
                       // alert('aa');     
               

                $.ajax({
                    url:"designation_process.php",
                    type:"POST",
                    data:{action:"createpackage",name:name},
                    success:function(data){
                        // alert(data);
                        if(data=='package created successfully')
                       {
                        swal("Success!", "Designation Created successfully", "success");
                       }
                       else{
                        swal("Error!", "Designation not Created", "error");
                       }
                       show_all_desig();
                        console.log(data);
                    },
                });
            });
});
</script>

<?php include 'footer.php' ?>