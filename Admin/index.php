<?php
include('../include/connect.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Admin Dashboard</title>
      <!-- link css file -->
       <link rel="stylesheet" href="../style.css">
       <!-- bootstrap css file -->
       <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
       <!-- bootsrtap font awesome file -->
              <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
      
      .logo{
            width: 7%;
            height: 7%;  
            object-fit: contain;
      }
      .logo1{
            width: 150px;
            object-fit: contain;
            height: 40px;

      }
      .img-top{
            width: 10%;
            object-fit: contain;
      }
</style>
            </head>
<body>
<div class="container-fluid p-0">
      <!-- first child -->
      <nav class="navbar navbar-expand-lg navbar-light bg-info ">
<div class="container-fluid">
       <img src="../photo/logo.jpg" alt="" class="logo">
</div>
<nav class="navbar navbar-expand-lg  ">
      <ul class="navbar-nav">
            <li class="nav-item">
             <a href="#" class="nav-link ">Welcome Guest</a>
            </li>
      </ul>
</nav>

      </nav>
      <!-- second child -->
       <div class="container-fluid">
            <h3 class="text-center bg-light">Manger Details</h3>
       </div>
       <!-- third child -->
        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
                  <div class="p-3">
              <a href="" class="nav-link"> <img src="../photos/milk1.jpg" alt="" class="logo1"> </a>
              <p class="text-light text-center">Admin Name</p>
            
            </div>
            <div class="button text-center">
                  <button><a href="index.php?insertproduct"   class="nav-link text-light bg-info py-1 ">Insert Products</a></button>
                  <button><a href="index.php?view_products"  class="nav-link text-light bg-info py-1">View Products</a></button>
                  <button><a href="index.php?insertdata"    class="nav-link text-light bg-info py-1">Insert Categories</a></button>
                  <button><a href="index.php?viewcategory" class="nav-link text-light bg-info py-1">View Categories</a></button>
                  <button><a href="index.php?insertbrand" class="nav-link text-light bg-info py-1">Insert Brands</a></button>
                  <button><a href="index.php?viewbrands" class="nav-link text-light bg-info py-1">View Brands</a></button>
                  <button><a href="index.php?allorder"  class="nav-link text-light bg-info py-1">All Orders</a></button>
                  <button><a href=""                   class="nav-link text-light bg-info py-1">All Payments</a></button>
                  <button><a href="index.php?allusers"class="nav-link text-light bg-info py-1">All users</a></button>
                  <button><a href="" class="nav-link text-light bg-info py-1">Logout</a></button>
                 
            </div>
        </div>
        <!-- fourth child -->
  <div class="container my-3">
  <?php
  if(isset($_GET['insertdata'])){
      include('insert_categories.php');
  }
  if(isset($_GET['insertbrand'])){
      include('insert_brands.php');
  }
  if(isset($_GET['insertproduct'])){    
include('insertproduct.php');
  }
  if(isset($_GET['edit_products'])){
      include('edit_product.php');
  }
  if(isset($_GET['view_products'])){
      include('view_products.php');
  }
  if(isset($_GET['delete_products'])){
      include('delete_product.php');
  }
  if(isset($_GET['viewbrands'])){
      include('view_brand.php');
  }
  if(isset($_GET['viewcategory'])){
      include('view_category.php');
  }
  if(isset($_GET['editcategory'])){
      include('edit_category.php');
  }
  if(isset($_GET['edit_brand'])){
      include('edit_brand.php');
  }
  if(isset($_GET['deletebrand'])){
      include('delete_brand.php');
  }
  if(isset($_GET['deletecat'])){
      include('delete_category.php');
  }
  if(isset($_GET['allorder'])){
      include('all_order.php');
  }
  if(isset($_GET['allusers'])){
      include('user_list.php');
  }
  ?>
  </div>
</div>


     <!-- bootstrap js file -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js
       "></script> 
</body>
</html>