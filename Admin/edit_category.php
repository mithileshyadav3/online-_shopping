<?php
if(isset($_GET['editcategory'])){
      $category_id=$_GET['editcategory'];
      $slect_cat="SELECT * from categories where categories_id='$category_id'";
      $cat_edit_query=mysqli_query($conn,$slect_cat);
      $fetch_cat=mysqli_fetch_assoc($cat_edit_query);
      $category_title=$fetch_cat['categories_title'];
}
if(isset($_POST['upadte_category'])){
    echo  $category_title=$_POST['category_title'];
      $upate="UPDATE categories set categories_title='$category_title' where categories_id='$category_id'";
      $upate_query=mysqli_query($conn,$upate);
      if($upate_query){
            echo "<script>
            alert('update category is successfully')
            window.location.href='index.php?view_category'
            </script>";
      }
}
?>
<h3 class="text-center text-success my-3">Edit Category</h3>
<div class="container text-center">
      <form action="" method="post">
            <div class="text-center  ">
                  <label for="" class="label-control">Categories Title</label>
                  <input type="text" name="category_title" class="form-control w-50 m-auto " value="<?php echo $category_title ?>" >
            </div>
            <div>
                  <input type="submit" class=" btn btn-border-0 bg-info text-light my-4 m-auto" name="upadte_category" value="upadte_category">
            </div>
      </form>
</div>