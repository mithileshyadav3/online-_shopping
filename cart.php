<?php
include('./include/connect.php');
include('./function/coomon_functions.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>E-commerce websit using php and mysql</title>
      <!-- link css file -->
       <link rel="stylesheet" href="style.css">
      <!-- bootstrap css file -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
       <!-- bootsrtap font awesome file -->
       
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
      .card-img-top{
      width: 100%;
      height: 150px;
      object-fit: contain;
}
.cardimage{
  height: 80px;
  width: 80px;
  object-fit: contain;
}
</style>
      </head>
<body>
<div class="container-fluid p-0">
<!-- first child -->
<nav class="navbar navbar-expand-lg bg-info">
      <div class="container-fluid">
        <img src="../online_shoping/photos/logo.jpg" alt="" class="logo">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="./index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./display_allproduct.php">Products</a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link "  href="./User_area/user_register.php">Register</a>
            </li>
            <li class="nav-item">
                  <a class="nav-link " href="#">Contact</a>
                </li>
                <!-- <li class="nav-item">
                  <a class="nav-link " href="#">Register</a>
                </li> -->
                <li class="nav-item">
                  <a class="nav-link" aria-disabled="true"><i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    <sup><?php totalcart()?></sup></a>
                </li>
          </ul>
          
        </div>
      </div>
    </nav>
    <!-- second child -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
<ul class="navbar-nav me-auto text-center">
<?php
if(!isset($_SESSION['username'])){
 echo " <li class='nav-item'>
            <a class='nav-link' href='#'>Welcome Guest'</a>
          </li>";
}
else {
 echo" <li class='nav-item'>
            <a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a>
          </li>";
}
?>
          
          <?php
if(!isset($_SESSION['username'])){
 echo " <li class='nav-item'>
            <a class='nav-link' href='./User_area/login.php'>Login</a>
          </li>";
}
else {
 echo" <li class='nav-item'>
            <a class='nav-link' href='./User_area/user_logout.php'>Logout</a>
          </li>";
}
?>
          
</ul>
    </nav>
    <!-- third child -->
<div class="bg-light">
      <h3 class="text-center">Hidden Products</h3>
      <p class="text-center">Communication is at the heart of E-commerce and Community</p>
</div>
<!-- this is fourth child -->

 <div class="container">
 
  <div class="row">
  <form action="" method="post"> 
  <table class="table table-bordered text-center">

<tbody>
  <?php
  global $conn;
           
  $ip = getIPAddress(); 
  $total=0; 
  $slect_ip_address="SELECT * FROM `card_detail` WHERE ip_address='$ip'";
  $select_ip_query=mysqli_query($conn,$slect_ip_address) ;
  $count_card=mysqli_num_rows($select_ip_query);
  if($count_card>0){
    echo"<thead>
  <tr>
    <th>Product Title</th>
    <th>Product Image</th>
    <th>Quantity</th>
    <th>Total Price</th>
    <th>Remove</th>
    <th colspan='2'>Operations</th>
  </tr>
</thead>";
 while( $fetch_ip=mysqli_fetch_array($select_ip_query))
 {
  $product_id=$fetch_ip['product_id'];
  $select_product="SELECT * FROM `products` WHERE product_id='$product_id'";
  $select_product_query=mysqli_query($conn,$select_product);
 while( $fetch_product=mysqli_fetch_array($select_product_query))
 {
  $product_price= array($fetch_product['product_price']);
  $product_price1=implode($product_price);
  $product_title=$fetch_product['product_title'];
  $product_image1=$fetch_product['product_image1'];
  
   
   $total_price=array_sum($product_price);
   $total+=$total_price;
 
  
  ?>
  <tr>
    <td><?php echo $product_title?></td>
    <td><img src="./Admin/product_img/<?php echo $product_image1?>" class="card-img-top cardimage"></td>
    <td><input type="text" class="form-input" name="qty"></td>
    <?php
     $ip = getIPAddress(); 
     if(isset($_POST['update_cart'])){
     $get_qty= (int)$_POST['qty'];
     
    $update_qty="UPDATE `card_detail` SET quantity='$get_qty' WHERE ip_address='$ip' ";
    $update_query=mysqli_query($conn,$update_qty);
    $total=($total*$get_qty);
     }

    ?> 
    

    <td><?php echo $product_price1?></td>
    <td><input type="checkbox" name="delete_cart1[]" value="<?php echo $product_id?>"></td>
    <td>
    <input type="submit"  value="Remove Cart" class="bg-info  border-0 mx-2" name="remove_cart">
    <!-- <td><button class="bg-info  border-0 mx-2">Remove</button> -->
    <!-- <button class="bg-info  border-0 mx-2">Update</button> -->
     <input type="submit"  value="Update Cart" class="bg-info  border-0 mx-2" name="update_cart">
  </td>
  </tr>
</tbody>
<?php
}
}
  }
  else{
    echo"<h4 class='text-center text-danger'> Card item is empty </h4>";
    // echo "<a href='index.php'><button class='bg-info  border-0 mx-2>Continue Shopping</button></a>";

  }
?>
  </table>
  <div class="d-flex m-3">
    <?php
    $ip = getIPAddress(); 
    // $total=0; 
    $slect_ip_address="SELECT * FROM `card_detail` WHERE ip_address='$ip'";
    $select_ip_query=mysqli_query($conn,$slect_ip_address) ;
    $count_card=mysqli_num_rows($select_ip_query);
    if($count_card>0){
      echo" <h4>Subtotal :<strong class='text-info'> $total/</strong></h4>
    <input type='submit' value='Continue shopping' class='bg-info  border-0 mx-2' name='submit'>  </input>
    <button class='bg-secondary border-0 '><a href='checkout.php' class='bg-info border-0 mx-2 text-decoration-none'>Checkout</a></button>
  ";

    }
    else{ 
      // echo "<a href='index.php'><button class='bg-info  border-0 mx-2>Continue Shopping</button></a>";
      // echo "<a href='index.php'><button class='bg-info  border-0 mx-2>Continue Shopping</button></a>";
      echo "<input type='submit' value='Continue shopping' class='bg-info  border-0 mx-2' name='submit'>  </input>";
      

     }
     if(isset($_POST['submit'])){
      echo "<script>window.location.href = 'index.php';</script>";;
    }
    ?>
    
  </div>
  </div>
 </div>
 </form> 
  <!-- function of removing cart -->
     
 <?php
        function remove_cart1(){
          global $conn;
          // $ip = getIPAddress(); 
          if (isset($_POST['remove_cart'])){
foreach($_POST['delete_cart1'] as $remove_id){
          echo $remove_id;
          $delete_query="DELETE FROM `card_detail` WHERE product_id='$remove_id'";
          $query_delete=mysqli_query($conn,$delete_query);
          if($query_delete){
            echo "<script>
            alert('delete successfully')
            window.location.href = 'cart.php'
            </script>";
          }
        }


          }
 
        
       
      }
       echo $delete_item=remove_cart1();        
        ?>   
 <!-- last child -->
 <div class=" bg-info text-center p-3 ">
      <p>All right are here by Mithilesh</p>
 </div>
</div>
<!-- bootstrap js file -->
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js
       "></script>
       <!-- function of removing cart -->
       
</body>
</html>