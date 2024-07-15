<?php
include('../include/connect.php');
if(isset($_GET['payment_id'])){
$order_id=$_GET['payment_id'];
$select_get="SELECT * from  user_orders where order_id='$order_id'";
$query_exe_pay=mysqli_query($conn,$select_get);
$fetchdata=mysqli_fetch_assoc($query_exe_pay);
$invoice_number=$fetchdata['invoice_number'];
$amount=$fetchdata['amount_due'];
// $order_id=$fetchdata['order_id'];

}
if(isset($_POST['submit_button'])){
$invoice_number=$_POST['invoice_number'];
$amount=$_POST['amount'];
$payment_method=$_POST['payment_method'];

$insert_payment="INSERT INTO user_payments (order_id,invoice_number,amount,payment_mode,date,status)
values('$order_id','$invoice_number','$amount','$payment_method',NOW(),0)";
$insert_query=mysqli_query($conn,$insert_payment);
if($insert_query){
echo"<h3 class='text-center text-success'>Payment is successfully</h3>";
}

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
       <!-- bootstrap css file -->
       <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body  class="bg-secondary">
      <div class="container">
      <h3 class="text-center text-light my-5">Confirm Payment</h3>
      <div class="row text-center">
            <form action="" method="post">
                  <div>
                       <label for="" class="form-label text-center text-light m-auto" >Invoice_number</label>
                       <input type="text" class="form-control w-50 bordered-0 m-auto"  name="invoice_number" value="<?php echo $invoice_number?>">
                  </div>
                  <div>
                       <label for="" class="form-label text-center text-light m-auto">Amount</label>
                       <input type="text" class="form-control w-50 bordered-0 m-auto"  name="amount" value="<?php echo $amount?>">
                  </div>
                  <div>
                      <select  class="form-control w-50 bordered-0 m-auto my-5" name="payment_method">
                        <option value="">Select payment Mode</option>
                        <option value="">Google pay</option>
                        <option value="">Phone pay</option>
                        <option value="">Credit card</option>
                        <option value="">Offline</option>
                        <option value="">Paytm</option>
                      </select>
                  </div>
                  <div>
                       
                       <input type="submit" class="border-none m-auto bg-info text-light"  name="submit_button">
                  </div>
            </form>
      </div>
      </div>
      

</body>
</html>