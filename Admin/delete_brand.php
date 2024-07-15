<?php
if(isset($_GET['deletebrand'])){
    echo  $brand_id=$_GET['deletebrand'];

      $delete_bnd="DELETE from brand where brand_id='$brand_id'";
      $query_bnd=mysqli_query($conn,$delete_bnd);
      if($query_bnd){
            echo "<script>
            alert('delete brand is successfully')
            window.location.href='index.php?viewbrands'
            </script>";
      }
}


?>