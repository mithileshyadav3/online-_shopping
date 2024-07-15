<?php
if(isset($_GET['edit_products']))
 $product_id=$_GET['edit_products'];
$select_product="SELECT * from products where product_id='$product_id'";
$product_query=mysqli_query($conn,$select_product);
$product_fetch=mysqli_fetch_assoc($product_query);
$product_id=$product_fetch['product_id'];
$product_title=$product_fetch['product_title'];
$product_description=$product_fetch['product_description'];
$product_keywords=$product_fetch['product_keywords'];
$category_id=$product_fetch['category_id'];
$brand_id=$product_fetch['brand_id'];
$product_image1=$product_fetch['product_image1'];
$product_image2=$product_fetch['product_image2'];
$product_image3=$product_fetch['product_image3'];
$product_price=$product_fetch['product_price'];

// edit for the categories
$select_category="SELECT * from  categories  where categories_id='$category_id'";
$execute_cate=mysqli_query($conn,$select_category);
$fetch_cate=mysqli_fetch_assoc($execute_cate);
$category_title=$fetch_cate['categories_title'];
$category_id=$fetch_cate['categories_id'];
// edit for the brand 
$select_brand="SELECT * from  brand where brand_id='$brand_id' ";
$execute_cate=mysqli_query($conn,$select_brand);
 $fetch_cate=mysqli_fetch_assoc($execute_cate);
$brand_title=$fetch_cate['brand_title'];
$brand_id=$fetch_cate['brand_id'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Edit products</title>
      <style>
            .edit_img{
                  width: 8%;
                  object-fit: contain;
            }
      </style>
</head>
<body>
 <div class="container">
      <h3 class="text-center text-success my-2">Edit Products</h3>
      <div class="row">
            <form action="" method="post" enctype="multipart/form-data">
            <div class="form-outline w-50 mb-4 m-auto">
      <label for="product_title" class="form-label">Product Title</label> 
      <input type="text" name="product_title" id="" class="form-control" placeholder="Enter Product Title" value="<?php echo $product_title ?>"
      autocomplete="off" required="required">
</div>
<!-- description -->
<div class="form-outline w-50 mb-4 m-auto">
      <label for="product_description" class="form-label">Product Description</label> 
      <input type="text" name="product_description" id="" class="form-control" placeholder="Enter Product Description" value="<?php echo $product_description?>"
      autocomplete="off" required="required">
</div>
<!-- keyword -->
<div class="form-outline w-50 mb-4 m-auto">
      <label for="product_keyword" class="form-label">Product keyword</label> 
      <input type="text" name="product_keyword" id="" class="form-control" value="<?php echo $product_keywords ?>"
       placeholder="Enter Product keyword" autocomplete="off" required="required">
</div>
<div class="form-outline w-50 mb-4 m-auto">
    <select name="select_category" id="" class="form-select" >
    <option value="<?php echo $category_title?>"><?php echo $category_title?> </option>
    <?php
    $select_category="SELECT * from  categories ";
    $execute_cate=mysqli_query($conn,$select_category);
   while( $fetch_cate=mysqli_fetch_assoc($execute_cate)){
    $category_title=$fetch_cate['categories_title'];
    $category_id=$fetch_cate['categories_id'];
    echo " <option value='$category_title'> $category_title </option>";
   }
    ?>
    </select>
</div>
<div class="form-outline w-50 mb-4 m-auto">
    <select name="select_brand" id="" class="form-select">
    <option value="<?php echo $brand_title?>"><?php echo $brand_title?> </option>
      <!-- <option value=" ">Select Brand </option> -->
      <?php
    $select_brand="SELECT * from  brand ";
    $execute_cate=mysqli_query($conn,$select_brand);
   while( $fetch_cate=mysqli_fetch_assoc($execute_cate)){
    $brand_title=$fetch_cate['brand_title'];
    $brand_id=$fetch_cate['brand_id'];
    echo " <option value='$brand_title'> $brand_title </option>";
   }
    ?>
      </select>
      </div>

            <div class="form-outline w-50 mb-4 m-auto">
      <label for="product_image1" class="form-label">Product Image1</label> 
      <div class="d-flex">
      <input type="file" name="product_image1" id="" class="form-control" placeholder="Enter Product Title">
      <img src="product_img/<?php echo $product_image1 ?>" alt="" class="edit_img">
      </div>
</div>
<div class="form-outline w-50 mb-4 m-auto">
      <label for="product_image2" class="form-label">Product Image2</label> 
      <div class="d-flex">
      <input type="file" name="product_image2" id="" class="form-control" placeholder="Enter Product Title">
      <img src="product_img/<?php echo $product_image2 ?>" alt="" class="edit_img">
</div>
</div>
<div class="form-outline w-50 mb-4 m-auto">
      <label for="product_image3" class="form-label">Product Image3</label> 
      <div class="d-flex">
      <input type="file" name="product_image3" id="" class="form-control" placeholder="Enter Product Title">
      <img src="product_img/<?php echo $product_image3 ?>" alt="" class="edit_img">
</div>
</div>
<div class="form-outline w-50 mb-4 m-auto">
      <label for="product_Price" class="form-label">Product price</label> 
      <input type="text" name="product_price" id="" class="form-control" 
       value="<?php echo $product_price ?>"
      placeholder="Enter Product price" autocomplete="off" required="required">
</div>
<div class="form-outline w-50 mb-4 m-auto">
      
      <input type="submit" name="update_btn" id="" class="btn btn-primary border-0" 
       value="Update">
</div>

            </form>
      </div>
 </div>     
</body>
</html>
<?php
if(isset($_POST['update_btn'])){
$product_title=$_POST['product_title'];
$product_description=$_POST['product_description'];
$product_keywords=$_POST['product_keyword'];
$product_price=$_POST['product_price'];
$product_brand=$_POST['select_category'];
$product_category=$_POST['select_brand'];
$product_image1=$_FILES['product_image1']['name'];
$product_image2=$_FILES['product_image2']['name'] ;
$product_image3=$_FILES['product_image3']['name'];
$temp_image1=$_FILES['product_image1']['tmp_name'];
$temp_image2=$_FILES['product_image2']['tmp_name'] ;
$temp_image3=$_FILES['product_image3']['tmp_name'];
if($product_title='' or $product_description='' or $product_keywords=''or  $product_price=''  or $product_category='' or $product_brand=''
 or $product_image1='' or $product_image2='' or $product_image3=''){
      echo "<script> alert('please fill the required area') </script>
    window.location.href='edit_product.php'  ";
 }



 
 else{
      move_uploaded_file($temp_image1,"./product_img/$product_image1");
move_uploaded_file($temp_image2,"./product_img/$product_image2");
move_uploaded_file($temp_image3,"./product_img/$product_image3");
$upadte_query="UPDATE products SET product_title='$product_title',
product_description='$product_description',product_keywords='$product_keywords',category_id='$product_category',
brand_id='$product_brand' , product_image1='$product_image1',product_image2='$product_image2',
product_image3='$product_image3',product_price='$product_price', date=NOW() WHERE product_id='$product_id'";
 $product_query=mysqli_query($conn,$upadte_query);
 if($product_query){
       echo "<script> alert('update successfully')
       window.location.href='insertproduct.php'
       </script> ";
 }
 else{
       echo "<script> alert('update not successfully') </script> "; 
 }
 
 }}

?>