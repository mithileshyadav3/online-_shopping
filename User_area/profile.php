<?php
// session_start();
include('../include/connect.php');
include('../function/coomon_functions.php');

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
              <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../display_allproduct.php">Products</a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link " href="user_register.php">Register</a>
            </li>
            <li class="nav-item">
                  <a class="nav-link " href="#">Contact</a>
                </li>
                <!-- <li class="nav-item">
                  <a class="nav-link " href="#">Register</a>
                </li> -->
                <li class="nav-item">
                  <a class="nav-link "  href="cart.php"><i class="fa fa-shopping-cart" ></i>
                    <sup><?php totalcart()?></sup>    Total Price:<?php totalprice()?>/-</a>
                </li>
          </ul>
          <form class="d-flex" role="search" action="./search_data.php" method="get">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_product">
            <!-- <button class="btn btn-outline-light" type="submit">Search</button> -->
             <input type="submit" value="search" class="btn btn-outline-light" name="search_data_product">
          </form>
        </div>
      </div>
    </nav>
    <!-- second child -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
<ul class="navbar-nav me-auto text-center">
      <!-- <li class="nav-item">
            <a class="nav-link" href="#">Welcome Guest</a>
          </li> -->
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
            <a class='nav-link' href='login.php'>Login</a>
          </li>";
}
else {
 echo" <li class='nav-item'>
            <a class='nav-link' href='user_logout.php'>Logout</a>
          </li>";
}
?>
<!--           
          <li class="nav-item">
            <a class="nav-link" href="./User_area/login.php">Login</a>
          </li> -->
          
</ul>
    </nav>
    <!-- third child -->
<div class="bg-light">
      <h3 class="text-center">Hidden Products</h3>
      <p class="text-center">Communication is at the heart of E-commerce and Community</p>
</div>
<!-- fourth child -->
 <div class="row">
    <div class="col-md-2 text-center text-light p-0">

<ul class="navbar-nav me-auto mb-2 mb-lg-0 bg-secondary">
<li class="nav-item bg-info">
<h4 class="">Your Profile</h4>
            </li>

<?php
 echo $username=$_SESSION['username'];
$select_img="SELECT * from user_table where username='$username' ";
$select_img_query=mysqli_query($conn,$select_img);
$fetch_img=mysqli_fetch_array($select_img_query);
$profile_img=$fetch_img['user_image'];
echo "<li class='nav-item'><a class='nav-link active' aria-current='page' href='#'><img src='$profile_img' class='card-img-top px-3 '></a>
            </li>";

?>

              
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="profile.php?pending_orders">Pending orders</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="profile.php?edit_account">Edit Account</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="profile.php?my_orders">My Orders</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="profile.php?delete_account">Delete Account</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="../index.php">Logout</a>
            </li>
            </ul>

    </div>
    <div class="col-md-10 ">
      <?php 
      
      show_pending_order();
      if(isset($_GET['edit_account'])){
            include('edit_account.php');
      }
      if(isset($_GET['my_orders'])){
            include('myorder.php');
      }
      if(isset($_GET['delete_account'])){
        include('delete_account.php');
      }


       ?>    
         
    </div>
    
 </div>
 <!-- last child -->
 <div class=" bg-info text-center p-3 ">
      <p>All right are here by Mithilesh</p>
 </div>
</div>
<!-- bootstrap js file -->
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js
       "></script>
</body>
</html>