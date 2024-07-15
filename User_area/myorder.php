<?php
// session_start();
$username=$_SESSION['username'];
      $select="SELECT * from user_table where username='$username'";
      $query=mysqli_query($conn,$select);
      $fetchdata=mysqli_fetch_assoc($query);
       $user_id=$fetchdata['user_id'];
      // $Amount_due=$fetchdata['amount_due'];
      // $total_products=$fetchdata['total_products'];
      // $invoice_number=$fetchdata['invoice_number'];
      // $date=$fetchdata['order_date'];
      // $order_status=$fetchdata['order_status'];

?>



<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Myorder</title>
      <style>
            .thead{
                  background-color:blue;
            }
            .tbody{
                  background-color:black;
            }
      </style>
</head>
<body>
      <h3 class="text-success text-center">All My Orders</h3>
     <table class="table table-bordered mt-5 text-center ">
      <thead class="thead">
            <tr class="bg-info">
                  
                  <th>S.no</th>
                  <th>Amount due</th>
                  <th>Total Products</th>
                  <th>Invoice_number</th>
                  <th>Date</th>
                  <th>Complete/Incomplete</th>
                  <th>Status</th>
            </tr>
                 
      </thead>
      <tbody class="bg-info">
      <?php
      $number=1;
      $select="SELECT * from user_orders where user_id='$user_id'" ;
      $query=mysqli_query($conn,$select);
     while( $fetchdata=mysqli_fetch_assoc($query)){
      
      $order_id=$fetchdata['order_id'];
      $Amount_due=$fetchdata['amount_due'];
       $total_products=$fetchdata['total_products'];
       $invoice_number=$fetchdata['invoice_number'];
      $date=$fetchdata['order_date'];
      $order_status=$fetchdata['order_status'];
      if($order_status=='pending'){
            $order_status='incomplete';
      }
      else{
            $order_status='completed';
      }
echo"
            <tr class='bg-secondary'>
                  <td> $number</td>
                  <td>$Amount_due </td>
                  <td> $total_products</td>
                  <td> $invoice_number </td>
                  <td>$date</td>
                  <td>$order_status</td>
                  <td><a href='confirm_payment.php?payment_id=$order_id'>Confirm</a></td>
            </tr>";
            $number++;
     }
      ?>
      </tbody>
     </table>
</body>

</html>