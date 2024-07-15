<?php
if(isset($_GET['delete_products'])){
      $product_id=$_GET['delete_products'];
      $delete="DELETE from  products where product_id='$product_id'";
      $delete_query=mysqli_query($conn,$delete);
      if($delete_query){
            echo "<script>
            alert('product delete is successfully')
            window.location.href='index.php'
            </script>";
      }
      else{
            echo "<script>
            alert('You can't able to delete products')
            window.location.href='index.php'
            </script>";
      }
}




?>