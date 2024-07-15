<?php
if(isset($_GET['edit_brand'])){
      $brand_id=$_GET['edit_brand'];
      $slect_bnd="SELECT * from brand where brand_id='$brand_id'";
      $bnd_edit_query=mysqli_query($conn,$slect_bnd);
      $fetch_bnd=mysqli_fetch_assoc($bnd_edit_query);
      $brand_title=$fetch_bnd['brand_title'];
}
if(isset($_POST['upadte_brand'])){
    echo  $brand_title=$_POST['brand_title'];
      $upate="UPDATE brand set brand_title='$brand_title' where brand_id='$brand_id'";
      $upate_query=mysqli_query($conn,$upate);
      if($upate_query){
            echo "<script>
            alert('update brand is successfully')
            window.location.href='index.php?view_brand'
            </script>";
      }
}
?>
<h3 class="text-center text-success my-3">Edit Brand</h3>
<div class="container text-center">
      <form action="" method="post">
            <div class="text-center  ">
                  <label for="" class="label-control">Brand Title</label>
                  <input type="text" name="brand_title" class="form-control w-50 m-auto " value="<?php echo $brand_title ?>" >
            </div>
            <div>
                  <input type="submit" class=" btn btn-border-0 bg-info text-light my-4 m-auto" name="upadte_brand" value="upadte_brand">
            </div>
      </form>
</div>