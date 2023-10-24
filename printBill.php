<!DOCTYPE html>
<html>
    <head>
        <title> Print Receipt </title>
        
        <style>
            
            * {
    font-size: 12px;
    font-family: 'Times New Roman';
}

td,
th,
tr,
table {
    border-top: 1px solid black;
    border-collapse: collapse;
}

td.description,
th.description {
    width: 3000px;
    max-width: 3000px;
}

td.quantity,
th.quantity {
    width: 4000px;
    max-width: 4000px;
    word-break: break-all;
}

td.price,
th.price {
    width: 3000px;
    max-width: 3000px;
    word-break: break-all;
}

.centered {
    text-align: center;
    align-content: center;
}
.ticket {
    width: 200px;
    max-width: 200px;
}


@media print {
    .hidden-print,
    .hidden-print * {
        display: none !important;
    }
}
@page{
  top:0.4;
  left:1.56;
  right:2.1;
  bottom:0.39;
  size:A10; 
}
 </style>
    </head>
    <body>
      
       
      
    <div class="ticket">
        <center>
           <img src="assets/images/logo.png" style="width: 10%;">
           <h1>Mynet</h1>
           </center>
           <h4>Contact Numebr:038291293012
           <br>Email:mynet@gmail.com
           <br>Address:Mynet Office Address, Azam basti Karachi</h4>
           <?php
           // Print Bill Here
            include'db_config.php'; 
           if(isset($_POST['print'])){
            $id = $_POST['id'];
            $sql = "SELECT bill.id as id, employee.name as emp,packages.name as pack,user.reg,user.first_name as fname,user.last_name as lname,user.address as addres,bill.date,bill.amount FROM `bill`JOIN packages on packages.ID=package JOIN employee on employee.ID=emp JOIN user ON user.id=bill.name where bill.id='$id'";
            $res = mysqli_query($db,$sql);
            $data  = mysqli_fetch_assoc($res);
            $month = date("M",strtotime($data['date']));
            $date = date("d-m-y",strtotime($data['date']));
            ?>
            <p class="centered">
           Bill Info
                <br>User Name: <?php echo $data['fname']." ".$data['lname']?>
                <br>User Address: <?php echo $data['addres']." Karachi"?>
                <br>Collected By: <?php echo $data['emp']?></p>
                <h2>Billing Month: <?php echo $month?></h2>

    
        <table border='1px' width='100%'>
          <tr>
            <th class="quantity">Reg Id.</th>
            <th class="description">Date</th>
            <th class="description">Package</th>
            <th class="price">Amount</th>
          </tr>
        

      
          <tr>
            <td class="quantity"><?php echo $data['reg']; ?></td>
            <td class="description"><?php echo $date;  ?></td>
            <td class="description"><?php echo $data['pack'];  ?></td>
            <td class="price"><?php echo $data['amount'];  ?></td>
          </tr>
          <?php 
    
        ?>
        </table>

        <p class="centered">Thanks for your purchase!
                </p>

        <?php

    
}

?>
</div>  
        <script>
            window.print(); 
        </script>