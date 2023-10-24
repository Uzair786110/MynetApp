

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Datum | CRM Admin Dashboard Template</title>
      
      <!-- Favicon -->
      <link rel="shortcut icon" href="assets/images/favicon.ico" />
      
      <link rel="stylesheet" href="assets/css/backend-plugin.min.css">
      <link rel="stylesheet" href="assets/css/backend.css?v=1.0.0">  </head>
  <body class=" ">
    <!-- loader Start -->
    <div id="loading">
          <div id="loading-center">
          </div>
    </div>
    <!-- loader END -->
    
      <div class="wrapper">
    <section class="login-content">
         <div class="container h-100">
            <div class="row align-items-center justify-content-center h-100">
               <div class="col-md-5">
                  <div class="card p-3">
                     <div class="card-body">
                        <div class="auth-logo">
                           <img src="assets/images/logo.png " class="img-fluid  rounded-normal  darkmode-logo" alt="logo">
                           <img src="assets/images/logo-dark.png" class="img-fluid rounded-normal light-logo" alt="logo">
                        </div>
                        <h3 class="mb-3 font-weight-bold text-center">Sign In</h3>
                
                        <form action="" method="post">
                           <div class="row">
                              <div class="col-lg-12">
                                 <div class="form-group">
                                    <label class="text-secondary">Username</label>
                                    <input class="form-control" type="text" name="user" placeholder="Username">
                                 </div>
                              </div>
                              <div class="col-lg-12 mt-2">
                                 <div class="form-group">
                                     <div class="d-flex justify-content-between align-items-center">
                                         <label class="text-secondary">Password</label>
                                        
                                     </div>
                                    <input class="form-control" type="password" name="password" placeholder="Enter Password">
                                 </div>
                              </div>
                           </div>
                           <button type="submit" name="submit" class="btn btn-primary btn-block mt-2">Log In</button>
                           
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      </div>
      <?php
      
include'db_config.php';
if(isset($_POST['submit']))
{
$user=$_POST['user'];
$pass=$_POST['password'];
$sql="SELECT * FROM `login` WHERE  `name`='$user' and `password`='$pass'";
$res = mysqli_query($db,$sql);
if (mysqli_num_rows($res) > 0) {
   $row = mysqli_fetch_assoc($res);
   session_start();
   $_SESSION['id']         = $row['ID'];
   $_SESSION['name']         = $row['name'];
   $_SESSION['role']         = 'admin';
   header('location:index.php');
    echo ' <script>
   alert("login");
 </script>';
}
else{
   $sql="SELECT * FROM `employee` WHERE  `name`='$user' and `password`='$pass'";
$res = mysqli_query($db,$sql);
if (mysqli_num_rows($res) > 0) {
   $row = mysqli_fetch_assoc($res);
   session_start();
   $_SESSION['id']         = $row['ID'];
   $_SESSION['name']         = $row['name'];
   $_SESSION['role']         = 'emp';
   header('location:index.php');
    echo ' <script>
   alert("login");
 </script>';

}
else
{
   echo ' <script>alert("UserName or Password is incorrect");</script>';
}
}
}
?>
   
    <!-- Backend Bundle JavaScript -->
    <script src="assets/js/backend-bundle.min.js"></script>
    <!-- Chart Custom JavaScript -->
    <script src="assets/js/customizer.js"></script>
    
    <script src="assets/js/sidebar.js"></script>
    
    <!-- Flextree Javascript-->
    <script src="assets/js/flex-tree.min.js"></script>
    <script src="assets/js/tree.js"></script>
    
    <!-- Table Treeview JavaScript -->
    <script src="assets/js/table-treeview.js"></script>
    
    <!-- SweetAlert JavaScript -->
    <script src="assets/js/sweetalert.js"></script>
    
    <!-- Vectoe Map JavaScript -->
    <script src="assets/js/vector-map-custom.js"></script>
    
    <!-- Chart Custom JavaScript -->
    <script src="assets/js/chart-custom.js"></script>
    <script src="assets/js/charts/01.js"></script>
    <script src="assets/js/charts/02.js"></script>
    
    <!-- slider JavaScript -->
    <script src="assets/js/slider.js"></script>
    
    <!-- Emoji picker -->
    <script src="assets/vendor/emoji-picker-element/index.js" type="module"></script>
    
    
    <!-- app JavaScript -->
    <script src="assets/js/app.js"></script>  </body>
</html>