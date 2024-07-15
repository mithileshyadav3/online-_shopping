
<?php
 include('../include/connect.php');
if(isset($_POST['submit'])){
 
  $insert_brand=$_POST['insert_brand'];
$insert_select="SELECT * FROM brand WHERE brand_title='$insert_brand'";
$insert_select=mysqli_query($conn,$insert_select);
if(mysqli_num_rows($insert_select)>0){
  echo '<script>
  alert("Brand already exists");
  </script>';
}
else{
   $insert_bnd1="INSERT INTO brand (brand_title) VALUES('$insert_brand')";
  $insert_bnd2=mysqli_query($conn,$insert_bnd1);
  if($insert_bnd2){
    echo '<script>
    alert("Brand insert is successfully");
    </script>';
  }

  else{
 echo '<script>
    alert("Brand insert is not successfully");
    </script>';
  }
}

  
  }

?>


<form action="" method="post">
<div class="input-group w-80 m-3">
  <span class="input-group-text bg-info"id="basic-addon1"><i class="fa fa-address-card " aria-hidden="true"></i>
  </span>
  <input type="text" class="form-control" name="insert_brand" placeholder="Insert Brands" aria-label="Brands" aria-describedby="basic-addon1">
</div>
<div class="input-group  w-10 m-3  ">
  <button type="submit"  name ="submit" class=" bg-info border-0 px-3">Insert Brands</button>
</div>
</form>




