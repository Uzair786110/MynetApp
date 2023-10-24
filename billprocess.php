<?php
include'db_config.php';
if (isset($_POST['action']) && $_POST['action'] == "createbill") {
   
    $name = $_POST['name'];
    $emp = $_POST['emp'];
    $status = $_POST['status'];
    $package = $_POST['package'];
    $amount = $_POST['amount'];
   
    
      

      $sql = "INSERT INTO `bill`( `name`, `emp`, `package`, `amount`) VALUES ('$name','$emp','$package','$amount')";
      
      // echo $sql;
      $res = mysqli_query($db,$sql);

      $fetch="Select * from user where id=$name";
      $fres = mysqli_query($db,$fetch);
      $frow = mysqli_fetch_assoc($fres);
      $Balance=$frow['Remaining'];

      $new=$Balance-$amount;

      $setrem="UPDATE `user` SET `Remaining`='$new' WHERE id=$name";
      $ures = mysqli_query($db,$setrem);




      if ($ures) {
          echo "package created successfully";
      }else{
          echo "not updated and try again later";
      }

  }

  if(isset($_GET['action']) && $_GET['action'] == "show_all_bill"){
    // $id = $_SESSION['user']['id'];
    $sql = "SELECT bill.id as id, employee.name as emp,packages.name as pack,user.reg,user.first_name as fname,user.last_name as lname
    ,bill.date,bill.amount FROM `bill`JOIN packages on packages.ID=package JOIN employee on employee.ID=emp JOIN user ON user.id=bill.name order by ID DESC;;";
    $res = mysqli_query($db,$sql);
  
    $output ="";
    if (mysqli_num_rows($res) > 0) {
       
       while($row = mysqli_fetch_assoc($res)){

        $id=$row['id'];  
        $dt = new DateTime($row['date']);
        $date = $dt->format('d/m/Y');
  
    $output .= "<tr>
                    
    
    <td>{$row['reg']}</td>
    <td>{$row['fname']} {$row['lname']}</td>
    <td>{$row['pack']}</td>
    <td>{$row['amount']}</td> 
    <td>{$row['emp']}{$row['id']}</td>
    <td> $date</td> 
    <td class='text-white'>
    <button type='button' class='btn btn-info  edit-btn' data-bs-toggle='modal' data-bs-target='#edit' style='padding: 10px 10px 10px 10px;' data-id='{$row['id']}'>
    <img src='./assets/images/edit.png' width='20'>
  
    </button>
   
    <button type='button' class='btn btn-danger delete-btn' data-bs-toggle='modal' data-id='{$row['id']}' data-bs-target='#deleteproject' style='padding: 10px 10px 10px 10px;' >
    <img src='./assets/images/trash-bin.png' width='20'>
    </button>
<form action='printBill.php' method='post'>
  <input type='hidden' name='id' value='{$row['id']}'>
    <button type='submit' name='print' class='btn btn-danger print-btn' data-bs-toggle='modal' data-id='{$row['id']}' data-bs-target='#printproject' style='padding: 10px 10px 10px 10px;' >
    <img src='./assets/images/trash-bin.png' width='20'>
    </button>
</form>   
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
  
    $sql = "DELETE FROM bill where id ='$id'";
    $res = mysqli_query($db,$sql);
  
    if ($res) {
          echo "client delete successfully";
       }else{
          echo "client Not Deleted";
       }	
  }


  
  if(isset($_POST['action']) && $_POST['action'] == "edit"){

    $id = $_POST['id'];
  
    $sql = "SELECT bill.id as id, employee.ID as emp,packages.ID as pack,user.id as fname,bill.date,bill.amount FROM `bill`JOIN packages on packages.ID=package JOIN employee on employee.ID=emp JOIN user ON user.id=bill.name where bill.id ='$id'";
    $res = mysqli_query($db,$sql);
    $result  = mysqli_fetch_assoc($res);
    // print_r($result);
     echo json_encode($result);
  
  }
  if (isset($_POST['action']) && $_POST['action'] == "update_bill") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $emp = $_POST['emp'];
    $package = $_POST['package'];
    $amount = $_POST['amount'];

    
    $sql = "UPDATE `bill` SET `name`='$name',`emp`='$emp',`package`='$package',`amount`='$amount' WHERE  id = '$id' ";
    // echo $sql;
    $res = mysqli_query($db,$sql);
  
    if ($res) {
      echo "client updated successfully";
    }else{
      echo "not updated and try again later";
    }
  
  }
?>