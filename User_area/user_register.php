<?php
// include('../include/connect.php');
include('../include/connect.php');
include('../function/coomon_functions.php');
// include('./User_area')
if(isset($_POST['submit'])){
      $get_ip=getIPAddress();
      $username=$_POST['username'];
      $email=$_POST['email'];
      $user_image=$_FILES['user_image']['name'];
      $temp_name=$_FILES['user_image']['tmp_name'];
      $user_password=$_POST['user_password'];
      $cnfpass=$_POST['cnfpass'];
      $address=$_POST['user_address'];
      $mobile_number=$_POST['mobile'];  
        $password_hashing=password_hash($user_password,PASSWORD_DEFAULT );
      $select_reg_query="SELECT * FROM  user_table where user_email='$email' or username='$username'" ;
      $query_reg=mysqli_query($conn,$select_reg_query) ;
      if(mysqli_num_rows($query_reg)>0)    {
            echo "<script> alert('Email  and username already exists')</script>"; 
      }    
      else{  
            if($user_password===$cnfpass)    {
                  if(strlen($mobile_number)==10){

                  
                  move_uploaded_file($temp_name,"../user_area/user_img/$user_image");
                  $insert_query="INSERT INTO `user_table`(username,user_email,user_password,user_image,user_ip,user_mobile,user_address)
                  VALUES('$username','$email','$password_hashing','$user_image','$get_ip','$mobile_number','$address')";
                  $insert_execute=mysqli_query($conn,$insert_query);
                  if($insert_execute){
                        echo "<script> alert('user data insert is successfully')</script>"; 
                  }}
                  else{
                        echo "<script> alert('Invalid mobile number')</script>"; 
                  }
            }  
            else{
                  echo "<script> alert('Password does not match')</script>"; 

            }  
     
      }
      $select_card="SELECT * from card_detail where ip_address='$get_ip'";
      $cart_query=mysqli_query($conn,$select_card);
      
      if(mysqli_num_rows($cart_query)>0){
            $_SESSION['username']=$username;
            echo "<script> alert('You have some items in your cart')
            window.location.href = '../checkout.php';

            </script>";  

      }
      else{
//  echo "  window.location.href = '../index.php'";
      }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Registration form</title>
       <!-- bootstrap css file -->
       <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container-fluid  mt-3 mb-2">
<h2 class="text-center">New User Register</h2>
<div class="row  d-flex justify-content-center align-items-center">
      <div class="col-lg-12 col-xl-6">
      <form action="" method="post" enctype="multipart/form-data">
                  <!-- username -->
<div class="form-outline w-100 mb-4 m-auto ">
      <label for="username_label" class="form-label">Username</label> 
      <input type="text" name="username" id="" class="form-control" placeholder="Enter username" autocomplete="off" required="required">
</div>
<!-- email -->
<div class="form-outline w-100 mb-4 m-auto">
      <label for="email_label" class="form-label">Email</label> 
      <input type="email" name="email" id="" class="form-control" placeholder="Enter email" autocomplete="off" required="required">
</div>
<!-- user image-->
<div class="form-outline w-100 mb-4 m-auto">
      <label for="product_keyword" class="form-label">User Image</label> 
      <input type="file" name="user_image" id="" class="form-control"  required="required">
     
      </div>
      <div class="form-outline w-100 mb-4 m-auto">
      <label for="password_label" class="form-label">Password</label> 
      <input type="password" name="user_password" id="" class="form-control" placeholder="Enter Password" autocomplete="off" required="required">
     
      </div>
      <div class="form-outline w-100 mb-4 m-auto">
      <label for="cnfpass" class="form-label">Confirm Password</label> 
      <input type="password" name="cnfpass" id="" class="form-control" placeholder="Repeat password" autocomplete="off" required="required">
     
      </div>
      <div class="form-outline w-100 mb-4 m-auto">
      <label for="address for" class="form-label">Address</label> 
      <input type="text" name="user_address" id="" class="form-control" placeholder="Enter address" autocomplete="off" required="required">
     
      </div>
      <div class="form-outline w-100 mb-4 m-auto">
      <label for="mobile_data" class="form-label">Mobile</label> 
      <input type="text" name="mobile" id="" class="form-control" placeholder="Enter Mobile" autocomplete="off" required="required">
     
      </div>
    <div>
      <input type="submit"value="Register" name="submit" class="bg-info border-0"></input>
      <p>Already You have account? <a href="./login.php" class="text-decoration-none" >Login</a></p>
</div>
</form>
</div>
</div>
</div>

      <!-- bootstrap js file -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js
       "></script>
</body>
</html>