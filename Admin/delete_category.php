<?php
if(isset($_GET['deletecat'])){
      $category_id=$_GET['deletecat'];

      $delete_cat="DELETE from categories where categories_id='$category_id'";
      $query_cat=mysqli_query($conn,$delete_cat);
      if($query_cat){
            echo "<script>
            alert('delete category is successfully')
            window.location.href='index.php?delete_cat'
            </script>";
      }
}


?>