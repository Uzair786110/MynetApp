<?php include'header.php'; 
 if($role!='admin')
 {
   header('location:login.php');
 }
?>

<div class="card">
   <div class="card-header d-flex justify-content-between">
      <div class="header-title">
         <h4 class="card-title">Designation Information</h4>
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
                  <th>Username</th>
                  <th>Salary </th>
                  <th>Joining Date</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody id="edata">
           
               <tr>
                  
                  <td>CEO</td>
                  <td>Haris</td>
                  <td>2000</td>
                  <td>11-2-2022</td> 
                  <td class="text-white">
                  <button type="button" class="btn btn-info" style="padding: 10px 10px 10px 10px;">
                  <img src="./assets/images/edit.png" width="20">

                  </button>
                  <button type="button" class="btn btn-success" style="padding: 10px 10px 10px 10px;">
                  <img src="./assets/images/add-friend.png" width="20">
                  </button>
                  <button type="button" class="btn btn-danger delete-btn" data-bs-toggle="modal" data-bs-target='#deleteproject' style='padding: 10px 10px 10px 10px;' >
                  <img src="./assets/images/trash-bin.png" width="20">
                  </button>
                  </td>
               </tr>
              
            </tbody>
            
         </table>
      </div>
       <!-- Info Modal -->
       <div class="modal fade" id="info" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Employee Profile</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" style="background: #fff;border: none;font-size: 27px;">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                        <div class="form-group">
                               
                                  <input disabled type="hidden" class="form-control" id="ed-id">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Employess Designation:</label>
                                <input disabled class="form-control" id="in-designation" style="background-color:#fff ;">
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Employee Name:</label>
                                <input disabled class="form-control" id="in-name" style="background-color:#fff ;">
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Employee Salary:</label>
                                <input disabled class="form-control" id="in-salary" style="background-color:#fff ;">
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Employee Joining Date:</label>
                                <input disabled class="form-control" id="in-date" style="background-color:#fff ;">
                            </div>
                        </form>
                    </div>
                   
                </div>
            </div>
        </div>
        <!-- Edit Modal -->
        <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Employee</h5>
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
                                <label for="message-text" class="col-form-label">Employee Joining Date:</label>
                                <input type="Date" class="form-control" id="ed-date"></input>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-form-label">Employee Password:</label>
                                <input type="password" class="form-control" id="ed-pass"></input>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary"  data-bs-dismiss="modal" id="updatebtn">Update Employee</button>
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
                    <button type="button" class="btn btn-danger color-fff" id="delete_emp" data-bs-dismiss="modal">Delete</button>
                </div>
            </div>
            </div>
        </div>
   </div>
</div>
<script>
   $(document).ready(function () {
     // alert('aaa');
      function show_all_emp() {
      $.ajax({
         url: "emploeeprocess.php",
         type: "GET",
         data: {
            action: "show_all_emp"
         },
         success: function(data) {
            console.log(data);
          //  alert(data);
            $("#edata").html(data);
         },
      });
   }
   show_all_emp();
   var edit_package_id;
            $(document).on("click",".edit-btn",function(){
               edit_package_id = $(this).data("id");
                  //alert(edit_package_id);
                // alert(id);
                $.ajax({
                     url:"emploeeprocess.php",
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
                        $("#ed-designation").val(userData.designation);               
                        $("#ed-date").val(userData.joining);  
                        $("#ed-pass").val(userData.password);             
                        
                    },
                });
            });
            var edit_package_id;
            $(document).on("click",".info-btn",function(){
               edit_package_id = $(this).data("id");
                  //alert(edit_package_id);
                // alert(id);
                $.ajax({
                     url:"emploeeprocess.php",
                    type:"POST",
                    data:{action:"edit",id:edit_package_id},
                    dataType: "html", 
                    success:function(data){
                        // console.log(data);
                         //alert(data);
                        var userData=JSON.parse(data); 
                        $("#in-id").val(userData.ID);     
                        $("#in-name").val(userData.name);               
                        $("#in-salary").val(userData.salary);   
                        $("#in-designation").val(userData.designation);               
                        $("#in-date").val(userData.joining);              
                        
                    },
                });
            });
            $("#updatebtn").click(function(e){
                e.preventDefault();
                var  id  = $("#ed-id").val();
                var name =      $("#ed-name").val();               
                var designation  =   $("#ed-designation").val();
                var salary  =   $("#ed-salary").val();
                var join  =   $("#ed-date").val();
                var pass =   $("#ed-pass").val();

                
                $.ajax({
                    url:"emploeeprocess.php",
                    type:"POST",
                    data:{action:"update_emp",id:id,name:name,designation:designation,salary:salary,join:join,pass:pass},
                    success:function(data){
                        //alert(data);
                        if(data=='client updated successfully')
                       {
                        swal("Success!", "Employee updated successfully", "success");
                       }
                       else{
                        swal("Error!", "Employee not Updated", "error");
                       }
                       show_all_emp();
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
            $("#delete_emp").on("click",function(){
                 //alert(delete_client_id);
                $.ajax({
                    url:"emploeeprocess.php",
                    type:"POST",
                    data:{action:"delete",id:delete_client_id},
                    success:function(data){
                       // alert(data);
                        if(data=='client delete successfully')
                       {
                        swal("Success!", "Employee deleted successfully", "success");
                        show_all_emp();
                       }
                       else{
                        swal("Error!", "Employee not Deleted", "error");
                       }
                       show_all_emp();
                        console.log(data);
                    },
                });
            });
   });
</script>
<?php include'footer.php' ?>