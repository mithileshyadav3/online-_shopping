
<?php
include('../include/connect.php');
if(isset($_POST['submit_register'])){
$username=$_POST['username'];
$email=$_POST['email'];
$cnfpass=$_POST['cnfpass'];
$password=$_POST['password'];
$hashpass=password_hash($password,PASSWORD_DEFAULT);

$select="SELECT * from admin_register where username='$username' or email='$email'";
$slect_quer=mysqli_query($conn,$select);
$count_rows=mysqli_num_rows($slect_quer);
if($count_rows>0){
      echo"<script>alert('admin email and username already exists ') </script>";
}
else{
      if($password===$cnfpass){
      $insert="INSERT into admin_register (username,email,password) values('$username','$email','$hashpass') ";
      $insert_query=mysqli_query($conn,$insert);
     echo"<script>alert('admin register is successfully ') 
     window.location.href='./admin_login.php'
     </script>";
      }
      else{
            echo"<script>alert('password doen not matched') </script>";
      }
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
      <h1 class="text-center my-3">Admin Registration</h1>
      <div class="row d-flex align-items-center justify-content-center my-4">
            <div class="col-lg-6 col-xl-5">
<img src="./product_img/admin.jpg" class="admin_img">  </div>
            <div class="col-lg-6 col-xl-4">
                  <form action="" method="post">
                        <div class="form-outline my-4">
<label for="username" class="form-lable">Username</label>
<input type="text" class="form-control" name="username" placeholder="username" required="required">
                        </div>
                        <div class="form-outline my-4">
<label for="email" class="form-label">Email</label>
<input type="email" class="form-control" name="email" placeholder="Email" required="required">
                        </div>
                        <div class="form-outline my-4">
<label for="password" class="form-label">Password</label>
<input type="password" class="form-control" name="password" placeholder="password" required="required">
                        </div>
                        <div class="form-outline my-4">
<label for="cnfpass" class="form-label">CNF Password</label>
<input type="password" class="form-control" name="cnfpass" placeholder="confirm password" required="required">
                        </div>
                        <div class="form-outline my-4">

<input type="submit" class="btn btn border-0 bg-info" name="submit_register" value="Register" >
                        </div>
                  </form>
                  <p class="small fw ">Already you have account ? <a href="./admin_login.php" class="text-decoration-none link-danger">Login</a></p>
           
      </div>
    </div> 
     <!-- bootstrap js file -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js
       "></script>  
</body>
</html>