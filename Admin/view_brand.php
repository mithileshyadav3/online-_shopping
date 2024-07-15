<h3 class="text-center text-success my-3 ">All Brands</h3>
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
   

      $select_view_brand="SELECT * from brand ";
      $view_brand_query=mysqli_query($conn,$select_view_brand);
      $number=0;
      while($fetch_brand=mysqli_fetch_assoc($view_brand_query)){
            $brand_title=$fetch_brand['brand_title'];
           echo $brand_id=$fetch_brand['brand_id'];
            $number++;
      
            echo"
            <tr >
                  <td class='bg-secondary text-center text-light'> $number </td>
                  <td class='bg-secondary text-center text-light'> $brand_title </td>
                  <td class='bg-secondary text-light text-center'><a href='index.php?edit_brand=$brand_id'>
                  <i class='fa-solid fa-pen-to-square text-light'></i></a></td>
                  <td class='bg-secondary text-light text-center'><a href='index.php?deletebrand=$brand_id' type='button'  data-bs-toggle='modal' data-bs-target='#exampleModal'>
                  
                  
  
                  <i class='fa-solid fa-trash text-light'></i></td>
            </tr>";
      
      }

?>
      </tbody>
</table>
<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">

</button> -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
   <h2>Are you sure do you want to delete this ?</h2>
         <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
      </div>
      <!-- <div class="modal-body">
        ...
      </div> -->
      
     <div class='modal-footer'>
        <button type='button' class='btn btn-danger' data-bs-dismiss='modal'><a href='index.php?viewbrands' class='text-decoration-none text-light'>No </a>
 </button>
        <button type='button' class='btn btn-success' data-bs-dismiss='modal'><a href='index.php?deletebrand=<?php echo $brand_id?>' class='text-decoration-none text-light'>Yes</a>
            </button>
      </div>
      
     
    </div>
  </div>
</div>
