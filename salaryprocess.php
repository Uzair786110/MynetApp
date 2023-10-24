<?php

include'db_config.php';
if(isset($_GET['action']) && $_GET['action'] == "show_all_salary"){
  // $id = $_SESSION['user']['id'];
  $sql = "SELECT * FROM salary";
  $res = mysqli_query($db,$sql);

  $output ="";
  if (mysqli_num_rows($res) > 0) {
     
     while($row = mysqli_fetch_assoc($res)){

  $output .= "<tr>
                  
  <td>{$row['designation']}</td>
  <td>{$row['name']}</td>
  <td>{$row['remaining']}</td>
  <td>{$row['salary']}</td>
  <td>{$row['date']}</td> 
  <td class='text-white'>
  <button type='button' class='btn btn-info  edit-btn' data-bs-toggle='modal' data-bs-target='#edit' style='padding: 10px 10px 10px 10px;' data-id='{$row['ID']}'>
  <img src='./assets/images/edit.png' width='20'>

  </button>
 
  <button type='button' class='btn btn-danger delete-btn' data-bs-toggle='modal' data-id='{$row['ID']}' data-bs-target='#deleteproject' style='padding: 10px 10px 10px 10px;' >
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

  $sql = "DELETE FROM salary where id ='$id'";
  $res = mysqli_query($db,$sql);

  if ($res) {
        echo "client delete successfully";
     }else{
        echo "client Not Deleted";
     }	
}
if(isset($_POST['action']) && $_POST['action'] == "edit"){

  $id = $_POST['id'];

  $sql = "SELECT * FROM `salary` where ID ='$id'";
  $res = mysqli_query($db,$sql);
  $result  = mysqli_fetch_assoc($res);
  // print_r($result);
   echo json_encode($result);

}
if (isset($_POST['action']) && $_POST['action'] == "update_salary") {
  $id = $_POST['id'];
  $name = $_POST['name'];
  $designation = $_POST['designation'];
  $remain = $_POST['remain'];
  $salary = $_POST['salary'];
  $date = $_POST['join'];
  
  $sql = "UPDATE `salary` SET `name`='$name',`designation`='$designation',`salary`='$salary',`remaining`='$remain',`date`='$date' WHERE ID = '$id' ";
  // echo $sql;
  $res = mysqli_query($db,$sql);

  if ($res) {
    echo "client updated successfully";
  }else{
    echo "not updated and try again later";
  }

}
?>