<?php
 include('../include/connect.php');
if(isset($_POST['submit'])){
 
  $insert_cat=$_POST['insert_cat'];
$insert_select="SELECT * FROM categories WHERE categories_title='$insert_cat'";
$insert_select=mysqli_query($conn,$insert_select);
if(mysqli_num_rows($insert_select)>0){
  echo '<script>
  alert("Category already exists");
  </script>';
}
else{
   $insert_cat1="INSERT INTO categories (categories_title) VALUES('$insert_cat')";
  $insert_cat2=mysqli_query($conn,$insert_cat1);
  if($insert_cat2){
    echo '<script>
    alert("Category insert is successfully");
    </script>';
  }

  else{
 echo '<script>
    alert(" Category insert is not successfully");
    </script>';
  }
}

  
  }

?>

<form action="" method="post">
<div class="input-group w-80 m-3">
  <span class="input-group-text bg-info"id="basic-addon1"><i class="fa fa-address-card " aria-hidden="true"></i>
  </span>
  <input type="text" class="form-control" name="insert_cat" placeholder="Insert Categories" aria-label="Categories" aria-describedby="basic-addon1">
</div>
<div class="input-group  w-10 m-3  ">
  <button type="submit" name="submit" class=" bg-info border-0 px-3">Insert Categories</button>
</div>
</form>





