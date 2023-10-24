<?php

include'db_config.php';
if(isset($_GET['action']) && $_GET['action'] == "show_all_user"){
  // $id = $_SESSION['user']['id'];
  $sql = "SELECT * FROM user";
  $res = mysqli_query($db,$sql);

  $output ="";
  if (mysqli_num_rows($res) > 0) {
     
     while($row = mysqli_fetch_assoc($res)){

  $output .= "<tr>
                  
  <td>{$row['first_name']} {$row['last_name']}</td>
  <td>{$row['email']}</td>
  <td>{$row['phone']}</td>
  <td>{$row['cnic']}</td> 
  <td>{$row['address']}</td> 
  <td class='text-white'>
  <button type='button' class='btn btn-info  edit-btn' data-bs-toggle='modal' data-bs-target='#edit' style='padding: 10px 10px 10px 10px;' data-id='{$row['id']}'>
  <img src='./assets/images/edit.png' width='20'>

  </button>
  <button type='button' class='btn btn-success info-btn' data-bs-toggle='modal' data-bs-target='#info' style='padding: 10px 10px 10px 10px;' data-id='{$row['id']}'>
  <img src='./assets/images/add-friend.png' width='20'>
  </button>
  <button type='button' class='btn btn-danger delete-btn' data-bs-toggle='modal' data-id='{$row['id']}' data-bs-target='#deleteproject' style='padding: 10px 10px 10px 10px;' >
  <img src='./assets/images/trash-bin.png' width='20'>
  </button>
  </td>
</tr>
";		
     }
     // $output .="</table>";
     echo $output;				
  }
}


if(isset($_GET['action']) && $_GET['action'] == "show_all_active_user"){
  // $id = $_SESSION['user']['id'];
  $sql = "SELECT * FROM `user` WHERE `status`=1";
  $res = mysqli_query($db,$sql);

  $output ="";
  if (mysqli_num_rows($res) > 0) {
     
     while($row = mysqli_fetch_assoc($res)){

  $output .= "<tr>
                  
  <td>{$row['first_name']} {$row['last_name']}</td>
  <td>{$row['email']}</td>
  <td>{$row['phone']}</td>
  <td>{$row['cnic']}</td> 
  <td>{$row['address']}</td> 
  <td class='text-white'>
  <button type='button' class='btn btn-info  edit-btn' data-bs-toggle='modal' data-bs-target='#edit' style='padding: 10px 10px 10px 10px;' data-id='{$row['id']}'>
  <img src='./assets/images/edit.png' width='20'>

  </button>
  <button type='button' class='btn btn-success info-btn' data-bs-toggle='modal' data-bs-target='#info' style='padding: 10px 10px 10px 10px;' data-id='{$row['id']}'>
  <img src='./assets/images/add-friend.png' width='20'>
  </button>
  <button type='button' class='btn btn-danger delete-btn' data-bs-toggle='modal' data-id='{$row['id']}' data-bs-target='#deleteproject' style='padding: 10px 10px 10px 10px;' >
  <img src='./assets/images/trash-bin.png' width='20'>
  </button>
  </td>
</tr>
";		
     }
     // $output .="</table>";
     echo $output;				
  }
}

if(isset($_GET['action']) && $_GET['action'] == "show_all_offline_user"){
    // $id = $_SESSION['user']['id'];
    $sql = "SELECT * FROM `user` WHERE `status`=2";
    $res = mysqli_query($db,$sql);
  
    $output ="";
    if (mysqli_num_rows($res) > 0) {
       
       while($row = mysqli_fetch_assoc($res)){
  
    $output .= "<tr>
                    
    <td>{$row['first_name']} {$row['last_name']}</td>
    <td>{$row['email']}</td>
    <td>{$row['phone']}</td>
    <td>{$row['cnic']}</td> 
    <td>{$row['address']}</td> 
    <td class='text-white'>
    <button type='button' class='btn btn-info  edit-btn' data-bs-toggle='modal' data-bs-target='#edit' style='padding: 10px 10px 10px 10px;' data-id='{$row['id']}'>
    <img src='./assets/images/edit.png' width='20'>
  
    </button>
    <button type='button' class='btn btn-success info-btn' data-bs-toggle='modal' data-bs-target='#info' style='padding: 10px 10px 10px 10px;' data-id='{$row['id']}'>
    <img src='./assets/images/add-friend.png' width='20'>
    </button>
    <button type='button' class='btn btn-danger delete-btn' data-bs-toggle='modal' data-id='{$row['id']}' data-bs-target='#deleteproject' style='padding: 10px 10px 10px 10px;' >
    <img src='./assets/images/trash-bin.png' width='20'>
    </button>
    </td>
  </tr>
  ";		
       }
       // $output .="</table>";
       echo $output;				
    }
  }
  if(isset($_POST['action']) && $_POST['action'] == "delete"){
    $id = $_POST['id'];
  
    $sql = "UPDATE `user` SET `status`='2' where id ='$id'";
    $res = mysqli_query($db,$sql);
  
    if ($res) {
          echo "client delete successfully";
       }else{
          echo "client Not Deleted";
       }	
  }
  if(isset($_POST['action']) && $_POST['action'] == "restore"){
    $id = $_POST['id'];
  
    $sql = "UPDATE `user` SET `status`='1' where id ='$id'";
    $res = mysqli_query($db,$sql);
  
    if ($res) {
          echo "client delete successfully";
       }else{
          echo "client Not Deleted";
       }	
  }
  if(isset($_POST['action']) && $_POST['action'] == "edit"){

    $id = $_POST['id'];
  
    $sql = "SELECT user.id,`first_name`,`last_name`,`email`,`address`,`cnic`,`pic`,`bpic`,`reg`,`package`,user.price,`Remaining`,`phone`,`status`,DATE(date) as date ,packages.name FROM `user` join packages on packages.id=user.package where user.id ='$id';";
    $res = mysqli_query($db,$sql);
    $result  = mysqli_fetch_assoc($res);
    // print_r($result);
     echo json_encode($result);
  
  }

  if (isset($_POST['action']) && $_POST['action'] == "update_user") {
    $id = $_POST['id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $cnic = $_POST['cnic'];
    $address = $_POST['address'];
    $package = $_POST['package'];
    $price = $_POST['price'];
    $reg = $_POST['reg'];
    $rem = $_POST['rem'];
   
   
   
   
    $sqlupd = "UPDATE `user` SET`first_name`='$fname',`last_name`='$lname',`email`='$email',`address`='$address',`cnic`='$cnic',`reg`='$reg',`package`='$package',`price`='$price',`Remaining`='$rem',`phone`='$phone]' WHERE `id`= '$id' ";
     //echo $sql;
    $res = mysqli_query($db,$sqlupd);
  
    if ($res) {
      echo "client updated successfully";
    }else{
      echo "user not updated and try again later";
    }
  
  }
?>