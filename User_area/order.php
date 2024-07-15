<?php
include('../include/connect.php');
include('../function/coomon_functions.php');

if(isset($_GET['user_id'])){
     
     echo $user_id=$_GET['user_id'];
}
      $user_ip=getIPAddress(); 
      $total=0;
      $status='pending';
      $invoice_number=mt_rand();
      $select_query_price="SELECT * from card_detail where ip_address='$user_ip'";
      $query_exe=mysqli_query($conn,$select_query_price);
      $query_exe_row=mysqli_num_rows($query_exe);
      
      while( $query_fet=mysqli_fetch_array($query_exe)){
            $product_id_price=$query_fet['product_id'];
            $select_pro_price="SELECT * from products where product_id='$product_id_price'";
            $execute_query_price=mysqli_query($conn,$select_pro_price);
            while($fetchprice=mysqli_fetch_array($execute_query_price)){
                  $product_one_price= array($fetchprice['product_price']);
                  $product_sum_price=array_sum($product_one_price);
$total+=$product_sum_price;
            }
      }
// for quantity 
$select_qty="SELECT * from card_detail";
$select_qty_query=mysqli_query($conn,$select_qty);
$fetch_qty=mysqli_fetch_array($select_qty_query);
// $fetch_query=mysqli_query($conn,$fetch_qty);
$fetch_quantity=$fetch_qty['quantity'];
if($fetch_quantity==0){
      $quantity=1;
      $total_price=$total;
}
else{
      $quantity=$fetch_quantity;
      $total_price=$total*$quantity;
}
$insert_in_userorder="INSERT INTO user_orders (user_id,amount_due,invoice_number,total_products,order_date,order_status) values('$user_id','$total_price',' $invoice_number',
                              '$query_exe_row',NOW(),'$status')";
      $insert_product_query=mysqli_query($conn,$insert_in_userorder);
      if($insert_product_query){
            echo "<script> alert('order accepted')
            
            </script>";
            
      }
      // window.location.href=('profile.php')

      // order pending
      $insert_in_orderpending="INSERT INTO order_pending (user_id,invoice_number,product_id,quantity,order_status) values('$user_id','$invoice_number',
      '$product_id_price','$quantity ','$status')";
      $insert_product_order_pending=mysqli_query($conn,$insert_in_orderpending);
      if($insert_product_order_pending){
            echo "<script> alert('order accepted') 
            window.location.href=('profile.php')
            </script>";
            //  window.location.href=('profile.php')
      }
      $delete_query ="DELETE from card_detail where ip_address='$user_ip'";
      $delete_query_card=mysqli_query($conn,$delete_query);
?>