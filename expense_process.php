<?php
 include'db_config.php';
if(isset($_GET['action']) && $_GET['action'] == "show_all_package"){
   // $id = $_SESSION['user']['id'];
   $sql = "SELECT * FROM expense";
   $res = mysqli_query($db,$sql);

   $output ="";
   if (mysqli_num_rows($res) > 0) {
      
      while($row = mysqli_fetch_assoc($res)){

   $output .= "<tr>

   <td>{$row['Item']}</td>
   <td>{$row['Orderby']}</td>
   <td>{$row['Date']}</td>
   <td>{$row['Amount']}</td>

   <td class='text-white'>
      <button type='button' class='btn btn-info edit-btn' data-bs-toggle='modal' data-bs-target='#edit' style='padding: 10px 10px 10px 10px;' data-id='{$row['ID']}'>
         <img src='./assets/images/edit.png' width='20'>

      </button>
     
      <button type='button' class='btn btn-danger delete-btn' data-bs-toggle='modal' data-bs-target='#deleteproject' style='padding: 10px 10px 10px 10px;'  data-id='{$row['ID']}'>
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

   $sql = "DELETE FROM expense where id ='$id'";
   $res = mysqli_query($db,$sql);

   if ($res) {
         echo "client delete successfully";
      }else{
         echo "client Not Deleted";
      }	
}
if (isset($_POST['action']) && $_POST['action'] == "createpackage") {
   
      $item = $_POST['item'];
		$amount = $_POST['amount'];
      $by = $_POST['by'];
		$date = $_POST['date'];
		

		$sql = "INSERT INTO `expense`( `Item`, `Orderby`, `Date`, `Amount`) VALUES ('$item','$by','$date','$amount')";
		// echo $sql;
		$res = mysqli_query($db,$sql);

		if ($res) {
			echo "package created successfully";
		}else{
			echo "not updated and try again later";
		}

	}
   if(isset($_POST['action']) && $_POST['action'] == "edit_package"){

		$id = $_POST['id'];

		$sql = "SELECT * FROM `expense` where ID ='$id'";
		$res = mysqli_query($db,$sql);
		$result  = mysqli_fetch_assoc($res);
		// print_r($result);
		 echo json_encode($result);

	}
   if (isset($_POST['action']) && $_POST['action'] == "update_package") {
		$id = $_POST['id'];
		$name = $_POST['name'];
		$price = $_POST['price'];
      $by = $_POST['by'];
		$date= $_POST['date'];
		
		$sql = "UPDATE `expense` SET `Item`='$name',`Orderby`='$by',`Date`='$date',`Amount`='$price' WHERE  ID = '$id' ";
		// echo $sql;
		$res = mysqli_query($db,$sql);

		if ($res) {
			echo "client updated successfully";
		}else{
			echo "not updated and try again later";
		}

	}

