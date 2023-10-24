<?php include 'header.php';

?>
<style>
    label {
        font-weight: 600;
        color: #555;
    }
</style>
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="https://codepen.io/skjha5993/pen/bXqWpR.css">
<title>Registration Form Using Bootstrap 4</title>
<div class="container">
    <form action="#" method="POST" enctype='multipart/form-data'>
        <h2 class="text-center">Join Our Network</h2>
        <div class="row jumbotron">
            <div class="col-sm-6 form-group">
                <label for="name-f">First Name</label>
                <input type="text" class="form-control" name="fname" id="name-f" placeholder="Enter your first name." required>
            </div>
            <div class="col-sm-6 form-group">
                <label for="name-l">Last name</label>
                <input type="text" class="form-control" name="lname" id="name-l" placeholder="Enter your last name." required>
            </div>
            <div class="col-sm-6 form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email." required>
            </div>
            <div class="col-sm-6 form-group">
                <label for="address-1">Address Line-1</label>
                <input type="address" class="form-control" name="address" id="address-1" placeholder="Locality/House/Street no." required>
            </div>
            <div class="col-sm-6 form-group">
                <label for="Cnic Number">CNIC </label>
                <input type="Number" maxlength="13" class="form-control" name="cnic" id="address-2" placeholder="CNIC Number" required oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength)" ;>

            </div>
            <div class="col-sm-6 form-group">
                <label for="state">CNIC PIC (Front)</label>
                <input type="file" class="form-control" name="pic" id="state" placeholder="" required>
            </div>
            <div class="col-sm-6 form-group">
                <label for="state">CNIC PIC (Back)</label>
                <input type="file" class="form-control" name="bpic" id="state" placeholder="" required>
            </div>

            <div class="col-sm-6 form-group">
                <label for="Country">Registration Id</label>
                <input type="text" class="form-control" name="reg" id="reg" placeholder="Enter Registeration Id" required>
            </div>

            <div class="col-sm-6 form-group">
                <label>Package</label>
                <select class="form-control form-control-lg" id="package" name="package">
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
            <div class="col-sm-6 form-group">
                <label for="price">Package Price</label>
                <input type="number" name="price" class="form-control" id="price" placeholder="Enter Package Price" required>
            </div>

            <div class="col-sm-6 form-group">
                <label for="tel">Phone</label>
                <input type="tel" name="phone" class="form-control" id="tel" placeholder="Enter Customer Contact Number." required>
            </div>


            <div class="col-sm-12 form-group mb-0">
                <button class="btn btn-primary float-right" name="submit">Submit</button>
            </div>

        </div>
    </form>
    <script>



    </script>

    <?php
    $date = date('dmyHis');

    if (isset($_POST['submit'])) {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $reg = $_POST['reg'];
        $package = $_POST['package'];
        $phone = $_POST['phone'];
        $price = $_POST['price'];
        $cnic = $_POST['cnic'];

        $image_name     = $_FILES['pic']['name'];
        $tmp_image_dir  = $_FILES['pic']['tmp_name'];
        $uploads        = 'assets/images/cnic/';
        $modified_name = $date . $image_name;

        $image_name2     = $_FILES['bpic']['name'];
        $tmp_image_dir2  = $_FILES['bpic']['tmp_name'];
        $uploads        = 'assets/images/cnic/';
        $modified_name2 = $date . $image_name2;

        $check = "Select *from user where reg=$reg";
        $c = mysqli_query($db, $check);
        if (mysqli_num_rows($c) > 0) {
    ?>
            <script>
                $(document).ready(function() {
                    swal("Error!", "User Registeration Id already exist", "error");

                });
            </script>

            <?php
        } else {
            if (move_uploaded_file($tmp_image_dir, $uploads . $modified_name)) {
                if (move_uploaded_file($tmp_image_dir2, $uploads . $modified_name2)) {

                    $query = "INSERT INTO `user`( `first_name`, `last_name`, `email`, `address`, `cnic`, `bpic`, `pic`, `reg`, `package`, `price`, `phone`, `status`,`Remaining`) VALUES 
            ('$fname','$lname','$email','$address','$cnic','$modified_name2','$modified_name','$reg','$package','$price','$phone','1','$price')";

                    $q = mysqli_query($db, $query);
                    if ($q) { ?>
                        <script>
                            $(document).ready(function() {
                                swal("Success!", "User Created successfully", "success");
                                setTimeout(function() {
                                    window.location.href = "usertable.php"
                                }, 2000);
                            });
                        </script>
    <?php

                    } else {
                        echo "Error";
                    }
                }
            }
        }
    }

    ?>
</div>
<?php include 'footer.php' ?>