<h3 class="text-center text-success my-3 ">All Categories</h3>
<table class='table table-bordered my-3'>
      <thead>
            <tr>
                  <th class='bg-info text-center'>S.NO</th>
                  <th class='bg-info text-center'>Product_title</th>
                  <th class='bg-info text-center'>Edit</th>
                  <th class='bg-info text-center'>Delete</th>
                  
            </tr>
      </thead>
      <tbody>
      <?php
if(isset($_GET['viewcategory'])){
      $select_view_cat="SELECT * from categories";
      $view_cat_query=mysqli_query($conn,$select_view_cat);
      $number=0;
      while($fetch_cat=mysqli_fetch_assoc($view_cat_query)){
            $categories_title=$fetch_cat['categories_title'];
            $category_id=$fetch_cat['categories_id'];
            $number++;
            echo"
            <tr >
                  <td class='bg-secondary text-center text-light'>$number</td>
                  <td class='bg-secondary text-center text-light'>$categories_title</td>
                  <td class='bg-secondary text-light text-center'><a href='index.php?editcategory=$category_id'><i class='fa-solid fa-pen-to-square text-light'></i></a></td>
                  <td class='bg-secondary text-light text-center'><a href='index.php?deletecat=$category_id'><i class='fa-solid fa-trash text-light'></i></a></td>
            </tr>";
      }
}

?>
      </tbody>
</table>