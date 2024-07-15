<?php 
include('../include/connect.php');
if (isset($_POST['productinsert_db'])) {
      $product_title=$_POST['product_title'];
      $product_description=$_POST['product_description'];
      $product_keywords=$_POST['product_keyword'];
      $select_category=$_POST['select_category'];
      $select_brand=$_POST['select_brand'];
      $product_image1=$_FILES['product_image1']['name'];
      $product_image2=$_FILES['product_image2']['name'];
      $product_image3=$_FILES['product_image3']['name'];
      $tmp_image1=$_FILES['product_image1']['tmp_name'];
      $tmp_image2=$_FILES['product_image2']['tmp_name'];
      $tmp_image3=$_FILES['product_image3']['tmp_name'];
      $product_price=$_POST['product_price'];
      $status=true;
      if($product_title=='' or $product_description=='' or $product_keywords=='' or $select_category=='' or $select_brand=='' or $product_image1==''
      or $product_image2=='' or $product_image3=='' or $product_price=='' )
      {
            echo '<script> alert("please fill the all field")</script>';
      
      }
      else{
            move_uploaded_file($tmp_image1, "./product_img/$product_image1");
            move_uploaded_file($tmp_image2, "./product_img/$product_image2");
            move_uploaded_file($tmp_image3, "./product_img/$product_image3");
            $insertproduct="INSERT INTO products (product_title,product_description,product_keywords,category_id,brand_id,product_image1,product_image2,product_image3,product_price,date,status)
          VALUES('$product_title', '$product_description','$product_keywords','$select_category',' $select_brand','$product_image1','$product_image2','$product_image3',
          '$product_price', NOW(), '$status' )  ";
          $insertproducts=mysqli_query($conn,$insertproduct);
          if($insertproducts){
            echo '<script> alert("Product is successfully inserted")</script> ';
          }
      }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Insert Product by Admin</title>
       <!-- bootstrap css file -->
       <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
       <!-- bootsrtap font awesome file -->
       
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-light">
      <div class="container  mt-2">
            <h1 class="text-center">Insert Products</h1>
            <form action="" method="post" enctype="multipart/form-data">
                  <!-- title -->
<div class="form-outline w-50 mb-4 m-auto">
      <label for="product_title" class="form-label">Product Title</label> 
      <input type="text" name="product_title" id="" class="form-control" placeholder="Enter Product Title" autocomplete="off" required="required">
</div>
<!-- description -->
<div class="form-outline w-50 mb-4 m-auto">
      <label for="product_description" class="form-label">Product Description</label> 
      <input type="text" name="product_description" id="" class="form-control" placeholder="Enter Product Description" autocomplete="off" required="required">
</div>
<!-- keyword -->
<div class="form-outline w-50 mb-4 m-auto">
      <label for="product_keyword" class="form-label">Product keyword</label> 
      <input type="text" name="product_keyword" id="" class="form-control" placeholder="Enter Product keyword" autocomplete="off" required="required">
</div>
<!-- option -->
<div class="form-outline w-50 mb-4 m-auto">
    <select name="select_category" id="" class="form-select" >
    <option value=" ">Select Categories </option>
      <?php 
      $adminselect="SELECT * FROM  categories";
      $adminquery=mysqli_query($conn,$adminselect);
     while( $adminfetch=mysqli_fetch_assoc($adminquery)){
$adminproduct=$adminfetch['categories_title'];
$adminid=$adminfetch['categories_id'];
echo " <option value='$adminid'>$adminproduct</option>";
     }
      ?>
    </select>
</div>
<div class="form-outline w-50 mb-4 m-auto">
    <select name="select_brand" id="" class="form-select">
      <option value=" ">Select Brand </option>
      <?php 
      $adminselect="SELECT * FROM  brand";
      $adminquery=mysqli_query($conn,$adminselect);
     while( $adminfetch=mysqli_fetch_assoc($adminquery)){
$adminproduct=$adminfetch['brand_title'];
$adminid=$adminfetch['brand_id'];
echo " <option value='$adminid'>$adminproduct</option>";
     }
      ?>
     
    </select>
</div>
<div class="form-outline w-50 mb-4 m-auto">
      <label for="product_image1" class="form-label">Product Image1</label> 
      <input type="file" name="product_image1" id="" class="form-control" placeholder="Enter Product Title">
</div>
<div class="form-outline w-50 mb-4 m-auto">
      <label for="product_image2" class="form-label">Product Image2</label> 
      <input type="file" name="product_image2" id="" class="form-control" placeholder="Enter Product Title">
</div>
<div class="form-outline w-50 mb-4 m-auto">
      <label for="product_image3" class="form-label">Product Image3</label> 
      <input type="file" name="product_image3" id="" class="form-control" placeholder="Enter Product Title">
     
</div>
<div class="form-outline w-50 mb-4 m-auto">
      <label for="product_Price" class="form-label">Product price</label> 
      <input type="text" name="product_price" id="" class="form-control" placeholder="Enter Product price" autocomplete="off" required="required">
</div>
<div class="form-outline w-50 mb-4 m-auto">
      
      <input type="submit" name="productinsert_db" id="" class="btn btn-info border-0 " placeholder="Enter Product Title" value="Insert Products">
</div>


            </form>
      </div>
      
</body>
</html>