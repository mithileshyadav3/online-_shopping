


<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
      <!-- bootstrap css file -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
      <div class="container mb-5">
            <h1 class="text-center">User Login</h1>
            <div class=" row d-flex justify-content-center align-items-center">
                  <div class="col-md-12">
                        <form action=" " method="post">
                                <!-- username -->
<div class="form-outline w-50 mb-4 m-auto ">
      <label for="username_label" class="form-label">Username</label> 
      <input type="text" name="user_name" id="" class="form-control" placeholder="Enter username" autocomplete="off" required="required">
</div>

      <div class="form-outline w-50 mb-4 m-auto">
      <label for="password_label" class="form-label">Password</label> 
      <input type="password" name="user_password" id="" class="form-control" placeholder="Enter Password" autocomplete="off" required="required">
     
      </div>
                       <div class=" form-outline w-50 m-auto">
                        <p><a href="" class="text-info">ForgotPassword</a></p>
                        <input type="submit" name="login_submit" class="btn btn-bordered-0 bg-info"  value="login"></input>
                        <p>Don't have account? <a href="./user_register.php" class="text-decoration-none" >Register</a></p>

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
<?php
// @session_start();
include('../include/connect.php');
include('../function/coomon_functions.php');
// include('../function/coomon_functions.php');
if(isset($_POST['login_submit'])){
      $username=$_POST['user_name'];
      $password=$_POST['user_password'];
      
      $select_query="SELECT * FROM user_table where username='$username'";
      $select_query=mysqli_query($conn,$select_query);
      $fetchdata=mysqli_fetch_assoc($select_query);
      $num_row=mysqli_num_rows($select_query);
      $user_ip=getIPAddress(); 
      $select_query_cart="SELECT * from card_detail where ip_address='$user_ip'";
      $execute_query=mysqli_query($conn,$select_query_cart);
      $num_row_cart=mysqli_num_rows($execute_query);
      if($num_row>0){
            $_SESSION['username']=$username;
            if(password_verify($password,$fetchdata['user_password'])){
                  if($num_row==1 and $num_row_cart==0){
                        $_SESSION['username']=$username;
                        echo "<script>
                        alert('login is successfully')
                        </script>";
                        echo "<script>
                 window.location.href='../index.php'
                  </script>";
                  }
                  else{
                        $_SESSION['username']=$username;
                        echo "<script>
                        alert('login is successfully')
                        </script>";
                        echo "<script>
                 window.location.href='../payment.php';
                  </script>"; 
                  }
                  
            }
            else{
                  echo "<script>
                  alert('password does not match')
                  </script>";
            }
      }
      else{
            echo "<script>
            alert('invalid username')
            </script>";
      }
}

?>


