<?php
include('../include/connect.php');
if(isset($_POST['login'])){
      $username=$_POST['username'];
      $password=$_POST['password'];
      $select="SELECT * from admin_register where username='$username' ";
      $query=mysqli_query($conn,$select);
      $fetchpass=mysqli_fetch_assoc($query);
      
      
      if(password_verify($password,$fetchpass['password'])){
            echo"<script>alert('admin login is successfully ') 
            window.location.href='index.php'
            </script>";
      }
      else{
            echo"<script>alert('password does not match ') 
            window.location.href='./sadmin_login.php'
            </script>";
      }
     
} 


?>


<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Admin</title>
      <!-- bootstrap css file -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
       <!-- bootsrtap font awesome file -->
              <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <style>
            .admin_img{
                  width: 100%;
                  height: 100%;
            }
      </style>
</head>
<body>
    <div class="container-fluid">
      <h1 class="text-center my-3">Admin Login</h1>
      <div class="row d-flex align-items-center justify-content-center my-4">
            <div class="col-lg-6 col-xl-5">
<img src="product_img/admin.jpg" class="admin_img"> 
 </div>
            <div class="col-lg-6 col-xl-4">
                  <form action="" method="post">
                        <div class="form-outline my-4">
<label for="username" class="form-lable">Username</label>
<input type="text" class="form-control" name="username" placeholder="username" required="required">
                        </div>
                        
                        <div class="form-outline my-4">
<label for="password" class="form-label">password</label>
<input type="password" class="form-control" name="password" placeholder="password" required="required">
                        </div>
                       
                        <div class="form-outline my-4">

<input type="submit" class="btn btn border-0 bg-info" name="login" value="Login" >
                        </div>
                  </form>
                  <p class="small fw ">Don't have account? <a href="./Admin_registration.php" class="text-decoration-none link-danger">Register</a></p>
           
      </div>
    </div>  
</body>
</html>