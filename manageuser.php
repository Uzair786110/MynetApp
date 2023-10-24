<?php include 'header.php';
$active = "SELECT count(*) c from user where status='1'";
$results = mysqli_query($db, $active);
$cntcustom = mysqli_fetch_assoc($results);
$off = "SELECT count(*) c from user where status='2'";
$oresults = mysqli_query($db, $off);
$cntoff = mysqli_fetch_assoc($oresults);
?>
<div class="col-lg-12 col-md-12">
    <div class="row">
        <div class="col-md-4" id="active">
            <div class="card">
                <div class="card-body bg-box ">
                    <div class="d-flex align-items-center ">
                        <div class="">

                            <p class="mb-2 text-white">Active User</p>
                            <div class="d-flex flex-wrap justify-content-start align-items-center">
                                <h5 class="mb-0 font-weight-bold text-white"><?php echo $cntcustom['c'] ?></h5>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4" id="offline">
            <div class="card">
                <div class="card-body bg_box1">
                    <div class="d-flex align-items-center">
                        <div class="">
                            <p class="mb-2 text-white">Expired User

                            </p>
                            <div class="d-flex flex-wrap justify-content-start align-items-center">
                                <h5 class="mb-0 font-weight-bold text-white"><?php echo $cntoff['c'] ?></h5>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4" id="total">
            <div class="card">
                <div class="card-body bg_box2">
                    <div class="d-flex align-items-center">
                        <div class="">
                            <p class="mb-2 text-white">Total User</p>
                            <div class="d-flex flex-wrap justify-content-start align-items-center">
                                <h5 class="mb-0 font-weight-bold text-white"><?php echo $cntcustom['c'] + $cntoff['c'] ?></h5>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="container">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">Client information</h4>
                </div>

            </div>
            <div class="card-body">
                <div class="collapse" id="datatable-2">

                </div>
                <!-- <p>Images in Bootstrap are made responsive with <code>.img-fluid</code>. <code>max-width: 100%;</code> and <code>height: auto;</code> are applied to the image so that it scales with the parent element.</p> -->
               

                    <div class="form-group col-md-3 float-right">
                        <input type="text" name="search_box" id="search_box" class="form-control" placeholder="Type User First Name here" />
                    </div>
                    <div class="table-responsive" id="udata">


                </div>
                <!-- Info Modal -->
                <div class="modal fade" id="info" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">User Profile</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" style="background: #fff;border: none;font-size: 27px;">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="">
                                    <Label>Cnic Picture (front)</Label>
                                <img id="in_img_show" src="" style="width:100px;display:block;margin-left:auto;margin-right:auto;margin-bottom:10px;">
                                <Label>Cnic Picture (back)</Label>
                                <img id="bin_img_show" src="" style="width:100px;display:block;margin-left:auto;margin-right:auto;margin-bottom:10px;">

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">First Name:</label>
                                                <input disabled class="form-control" id="in-name" style="background-color:#fff">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Last Name:</label>
                                                <input disabled class="form-control" id="in-lname" style="background-color:#fff">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Email:</label>
                                                <input disabled class="form-control" id="in-email" style="background-color:#fff">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Phone:</label>
                                                <input disabled class="form-control" id="in-phone" style="background-color:#fff">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Address:</label>
                                                <input disabled class="form-control" id="in-address" style="background-color:#fff">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">CNIC:</label>
                                                <input disabled class="form-control" id="in-cnic" style="background-color:#fff">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Package:</label>
                                                <input disabled class="form-control" id="in-state" style="background-color:#fff">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Price:</label>
                                                <input disabled class="form-control" id="in-country" style="background-color:#fff">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Reg id:</label>
                                                <input disabled class="form-control" id="in-reg" style="background-color:#fff">
                                            </div>
                                        </div>
                                    
                                       
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Member Since:</label>
                                                <input disabled class="form-control" id="in-join" style="background-color:#fff">
                                            </div>
                                        </div>
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
                                <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" style="background: #fff;border: none;font-size: 27px;">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="">
                                    <div class="form-group">

                                        <input type="hidden" disabled class="form-control" id="ed-id">
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">First Name:</label>
                                                <input class="form-control" id="ed-name" style="background-color:#fff">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Last Name:</label>
                                                <input class="form-control" id="ed-lname">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Email:</label>
                                                <input class="form-control" id="ed-email" style="background-color:#fff">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Phone:</label>
                                                <input class="form-control" id="ed-phone" style="background-color:#fff">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Address:</label>
                                                <input class="form-control" id="ed-address" style="background-color:#fff">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">CNIC:</label>
                                                <input class="form-control" id="ed-cnic" style="background-color:#fff">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Package:</label>
                                                <input class="form-control" id="ed-state" style="background-color:#fff">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Price:</label>
                                                <input class="form-control" id="ed-country" style="background-color:#fff">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Registration Id:</label>
                                                <input class="form-control" type="text" id="ed-reg" style="background-color:#fff">
                                            </div>
                                       
                                            
                                    </div>
                                    <div class="col-6">
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Remaining:</label>
                                                <input class="form-control" type="text" id="ed-remain" style="background-color:#fff">
                                            </div>
                                       
                                            
                                    </div>
                                    </div>
                                   

                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" id="updatebtn">Update User</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal  Delete Folder/ File-->

                <div class="modal fade" id="deleteproject" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title  fw-bold" id="deleteprojectLabel">Expire Client?</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body justify-content-center flex-column d-flex">
                                <i class="icofont-ui-delete text-danger display-2 text-center mt-2"></i>
                                <i class="fa fa-trash" aria-hidden="true" style="font-size: 63px;color: red;display: flex;justify-content: center;align-items: center;"></i>
                                <p class="mt-4 fs-5 text-center">Do You Really want to Expire this Client</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-danger color-fff" id="delete_emp" data-bs-dismiss="modal">Expire</button>
                            </div>
                        </div>
                    </div>
                </div>
                 <!-- Modal  Restore Folder/ File-->

                 <div class="modal fade" id="restore" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title  fw-bold" id="deleteprojectLabel">Restore Client?</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body justify-content-center flex-column d-flex">
                                <i class="icofont-ui-delete text-danger display-2 text-center mt-2"></i>
                                <i class="fa fa-trash" aria-hidden="true" style="font-size: 63px;color: red;display: flex;justify-content: center;align-items: center;"></i>
                                <p class="mt-4 fs-5 text-center">Do You Really want to restore this Client</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-danger color-fff" id="restore_emp" data-bs-dismiss="modal">Restore</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                //search ka kaam
                function show_all_user() {
                load_data(1);

                function load_data(page, query = '') {
                    $.ajax({
                        url: "fetch.php",
                        method: "POST",
                        data: {
                            action: "man_show_all_user",
                            page: page,
                            query: query
                        },
                        success: function(data) {
                            $('#udata').html(data);
                        }
                    });
                }

                $(document).on('click', '.page-link', function() {
                    var page = $(this).data('page_number');
                    var query = $('#search_box').val();
                    load_data(page, query);
                });

                $('#search_box').keyup(function() {
                    var query = $('#search_box').val();
                    load_data(1, query);
                });
                   
                }
                show_all_active_user();

                function show_all_active_user() {
                load_data(1);

                function load_data(page, query = '') {
                    $.ajax({
                        url: "fetch.php",
                        method: "POST",
                        data: {
                            action: "man_show_active_user",
                            page: page,
                            query: query
                        },
                        success: function(data) {
                            $('#udata').html(data);
                        }
                    });
                }

                $(document).on('click', '.page-link', function() {
                    var page = $(this).data('page_number');
                    var query = $('#search_box').val();
                    load_data(page, query);
                });

                $('#search_box').keyup(function() {
                    var query = $('#search_box').val();
                    load_data(1, query);
                });




                
                  
                }
                $("#active").click(function() {

                    show_all_active_user();
                });

                function show_all_offline_user() {
                load_data(1);

                function load_data(page, query = '') {
                    $.ajax({
                        url: "fetch.php",
                        method: "POST",
                        data: {
                            action: "man_show_offline_user",
                            page: page,
                            query: query
                        },
                        success: function(data) {
                            $('#udata').html(data);
                        }
                    });
                }

                $(document).on('click', '.page-link', function() {
                    var page = $(this).data('page_number');
                    var query = $('#search_box').val();
                    load_data(page, query);
                });

                $('#search_box').keyup(function() {
                    var query = $('#search_box').val();
                    load_data(1, query);
                });




                
                   
                }
                $("#offline").click(function() {

                    show_all_offline_user();
                });
                $("#total").click(function() {
                   

                    show_all_user();
                });


                var delete_client_id;
                $(document).on("click", ".delete-btn", function() {
                    delete_client_id = $(this).data("id");
                    // alert('click');
                    //alert(delete_client_id);
                });
                $("#delete_emp").on("click", function() {
                    //alert(delete_client_id);
                    $.ajax({
                        url: "userprocess.php",
                        type: "POST",
                        data: {
                            action: "delete",
                            id: delete_client_id
                        },
                        success: function(data) {
                            // alert(data);

                            if (data == 'client delete successfully') {
                                show_all_user();
                                swal("Success!", " User Expired successfully", "success");
                               
                                setTimeout(function(){ window.location.reload()}, 1500);

                            } else {
                                swal("Error!", "user not Expired", "error");
                            }
                            show_all_user();
                            console.log(data);
                        },
                    });
                });
                $("#restore_emp").on("click", function() {
                    //alert(delete_client_id);
                    $.ajax({
                        url: "userprocess.php",
                        type: "POST",
                        data: {
                            action: "restore",
                            id: delete_client_id
                        },
                        success: function(data) {
                            // alert(data);

                            if (data == 'client delete successfully') {
                                show_all_user();
                               
                                swal("Success!", " User Restored successfully", "success");
                                setTimeout(function(){ window.location.reload()}, 1500);

                            } else {
                                swal("Error!", "user not restored", "error");
                            }
                            show_all_user();
                            console.log(data);
                        },
                    });
                });
                var edit_package_id;
                $(document).on("click", ".info-btn", function() {
                    edit_package_id = $(this).data("id");
                    //alert(edit_package_id);
                    // alert(id);
                    $.ajax({
                        url: "userprocess.php",
                        type: "POST",
                        data: {
                            action: "edit",
                            id: edit_package_id
                        },
                        dataType: "html",
                        success: function(data) {
                            // console.log(data);
                           // alert(data);
                            var userData = JSON.parse(data);
                            $("#in-id").val(userData.id);
                            $("#in-name").val(userData.first_name);
                            $("#in-lname").val(userData.last_name);
                            $("#in-email").val(userData.email);
                            $("#in-phone").val(userData.phone);
                            $("#in-dob").val(userData.dob);
                            $("#in-state").val(userData.name);
                            $("#in-country").val(userData.price);
                            $("#in-join").val(userData.date);
                            $("#in-cnic").val(userData.cnic);
                            $("#in-address").val(userData.address);
                            $("#in-reg").val(userData.reg);
                            var pic=userData.pic;
                            var bpic=userData.bpic;
                       $("#in_img_show").attr("src","assets/images/cnic/"+ pic);
                       $("#bin_img_show").attr("src","assets/images/cnic/"+ bpic);
                            
                            



                        },
                    });
                });
                $("#updatebtn").click(function(e) {
                    e.preventDefault();
                    var id = $("#ed-id").val();
                    var fname = $("#ed-name").val();
                    var lname = $("#ed-lname").val();
                    var email = $("#ed-email").val();
                    var phone = $("#ed-phone").val();
                    var cnic = $("#ed-cnic").val();
                    var address = $("#ed-address").val();
                    var package = $("#ed-state").val();
                    var price = $("#ed-country").val();
                    var reg = $("#ed-reg").val();
                    var join = $("#ed-join").val();
                    var rem=$("#ed-remain").val();
                   


                    $.ajax({
                        url: "userprocess.php",
                        type: "POST",
                        data: {
                            action: "update_user",
                            id: id,
                            fname: fname,
                            lname: lname,
                            email: email,
                            phone: phone,
                            cnic: cnic,
                            address: address,
                            package: package,
                            price: price,
                            reg: reg,
                            rem:rem
                            
                            
                        },
                        success: function(data) {
                             alert(data);
                            if (data == 'client updated successfully') {
                                swal("Success!", "User updated successfully", "success");
                            } else {
                                swal("Error!", "User not Updated", "error");
                            }
                            show_all_user();
                            console.log(data);
                        },
                    });
                });
                var edit_package_id;
                $(document).on("click", ".edit-btn", function() {
                    edit_package_id = $(this).data("id");
                    // alert(edit_package_id);
                    // alert(id);
                    $.ajax({
                        url: "userprocess.php",
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
                            $("#ed-name").val(userData.first_name);
                            $("#ed-lname").val(userData.last_name);
                            $("#ed-email").val(userData.email);
                            $("#ed-phone").val(userData.phone);
                            $("#ed-reg").val(userData.reg);
                            $("#ed-remain").val(userData.Remaining);
                            $("#ed-state").val(userData.name);
                            $("#ed-country").val(userData.price);
                            $("#ed-join").val(userData.date);
                            $("#ed-cnic").val(userData.cnic);
                            $("#ed-gender").val(userData.gender);
                            $("#ed-address").val(userData.address);
                           



                        },
                    });
                });


            });
        </script>
        <?php include 'footer.php' ?>