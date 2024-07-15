<?php
include('../include/connect.php');
?>


<h3 class='text-center text-success mt-3'>All Products</h3>
<table class='table table-bordered'>
      <thead class='text-center'>
            <tr>
                  <th class='bg-info'>Product Id</th>
                  <th class='bg-info'>Product Title</th>
                  <th class='bg-info'>Product Image</th>
                  <th class='bg-info'>Product Price</th>
                  <th class='bg-info'>Total Sold</th>
                  <th class='bg-info'>Status</th>
                  <th class='bg-info'>Edit</th>
                  <th class='bg-info'>Delete</th>
            </tr>
      </thead>
      <tbody>
           
            
            <?php
$select_query='SELECT * from products ';
$query_exe=mysqli_query($conn,$select_query);
$number=0;
while($fetch_query=mysqli_fetch_assoc($query_exe)){
      $product_id=$fetch_query['product_id'];
      $product_title=$fetch_query['product_title'];
      $product_img=$fetch_query['product_image1'];
      $product_price=$fetch_query['product_price'];
      $status=$fetch_query['status'];
      $number++;
echo"<tr> <td class='bg-secondary text-light text-center'>$number</td>
                  <td class='bg-secondary text-light text-center'>$product_title</td>
                  <td class='bg-secondary text-light text-center'> <img src='product_img/$product_img' class='img-top' ></td>
                  

                  <td class='bg-secondary text-light text-center'>$product_price</td>
                  <td class='bg-secondary text-light text-center'>0</td>
                  <td class='bg-secondary text-light text-center'>true</td>
                  <td class='bg-secondary text-light text-center'><a href='index.php?edit_products=$product_id'><i class='fa-solid fa-pen-to-square text-light'></i></a></td>
                  <td class='bg-secondary text-light text-center'><a href='index.php?delete_products=$product_id'> <i class='fa-solid fa-trash text-light'></i></a></td>
                   </tr>";
}
?> 
                 
           
      </tbody>
</table>

