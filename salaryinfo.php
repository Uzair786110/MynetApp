<?php include'header.php' ;
 if($role!='admin')
 {
   header('location:login.php');
 }
?>
<div class="card">
   <div class="card-header d-flex justify-content-between">
      <div class="header-title">
         <h4 class="card-title">Salary Information</h4>
      </div>

   </div>
   <div class="card-body">
      <div class="collapse" id="datatable-2">
         
      </div>
      <!-- <p>Images in Bootstrap are made responsive with <code>.img-fluid</code>. <code>max-width: 100%;</code> and <code>height: auto;</code> are applied to the image so that it scales with the parent element.</p> -->
      <div class="table-responsive">
         <table id="datatable" class="table data-table table-striped table-bordered" >
            <thead>
               <tr>
                 
                 
                  <th>Designation Name</th>
                  <th>Employee Name</th>
                  <th>Salary </th>
                  <th>Remaining Amount</th>
                  <th>Date</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody id="sdata">
               <tr>
                  <td class="pr-0">
                     <div class="d-flex justify-content-start align-items-end mb-1 ">
                        <div class="custom-control custom-checkbox custom-control-inline">
                           <input type="checkbox" class="custom-control-input m-0" id="customCheck">
                           <label class="custom-control-label" for="customCheck"></label>
                        </div>
                     </div>
                  </td>
                  <td>Haris</td>
                  <td>Ceo</td>
                  <td>50k</td>
                  <td>00</td>
                  <td>10-2-2022</td> 
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
<!-- Edit Modal -->
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Salary</h5>
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
                                <label for="recipient-name" class="col-form-label">Employess Designation:</label>
                                <input type="text" class="form-control" id="ed-designation">
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Employee Name:</label>
                                <input class="form-control" id="ed-name"></input>
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Employee Salary:</label>
                                <input class="form-control" id="ed-salary"></input>
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Remaining Salary:</label>
                                <input class="form-control" id="ed-remain"></input>
                            </div>
                            
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Employee Joining Date:</label>
                                <input type="Date" class="form-control" id="ed-date"></input>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary"  data-bs-dismiss="modal" id="updatebtn">Update Salary</button>
                    </div>
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
                    <button type="button" class="btn btn-danger color-fff" id="delete_salary" data-bs-dismiss="modal">Delete</button>
                </div>
            </div>
            </div>
        </div>
   </div>
</div>
<script>
   $(document).ready(function () {
      function show_all() {
      $.ajax({
         url: "salaryprocess.php",
         type: "GET",
         data: {
            action: "show_all_salary"
         },
         success: function(data) {
            console.log(data);
          //  alert(data);
            $("#sdata").html(data);
         },
      });
   }
   show_all();
   var edit_package_id;
            $(document).on("click",".edit-btn",function(){
               edit_package_id = $(this).data("id");
                  //alert(edit_package_id);
                // alert(id);
                $.ajax({
                     url:"salaryprocess.php",
                    type:"POST",
                    data:{action:"edit",id:edit_package_id},
                    dataType: "html", 
                    success:function(data){
                        // console.log(data);
                        // alert(data);
                        var userData=JSON.parse(data); 
                        $("#ed-id").val(userData.ID);     
                        $("#ed-name").val(userData.name);               
                        $("#ed-salary").val(userData.salary);
                        $("#ed-remain").val(userData.remaining);   
                        $("#ed-designation").val(userData.designation);               
                        $("#ed-date").val(userData.date);              
                        
                    },
                });
            });
            $("#updatebtn").click(function(e){
                e.preventDefault();
                var  id  = $("#ed-id").val();
                var name =      $("#ed-name").val();  
                var remain=$('#ed-remain')   .val();          
                var designation  =   $("#ed-designation").val();
                var salary  =   $("#ed-salary").val();
                var join  =   $("#ed-date").val();

                
                $.ajax({
                    url:"salaryprocess.php",
                    type:"POST",
                    data:{action:"update_salary",id:id,name:name,designation:designation,salary:salary,join:join,remain:remain},
                    success:function(data){
                       //  alert(data);
                        if(data=='client updated successfully')
                       {
                        swal("Success!", "Salary updated successfully", "success");
                       }
                       else{
                        swal("Error!", "Salary not Updated", "error");
                       }
                       show_all();
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
            $("#delete_salary").on("click",function(){
                 //alert(delete_client_id);
                $.ajax({
                    url:"salaryprocess.php",
                    type:"POST",
                    data:{action:"delete",id:delete_client_id},
                    success:function(data){
                       // alert(data);
                        if(data=='client delete successfully')
                       {
                        swal("Success!", "Salary deleted successfully", "success");
                        show_all();
                       }
                       else{
                        swal("Error!", "Salary not Deleted", "error");
                       }
                       show_all();
                        console.log(data);
                    },
                });
            });
   });
</script>
<?php include'footer.php' ?>