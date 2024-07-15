<h3 class="text-center text-success my-3">All Users</h3>
<style>
      .user_img{
            width: 10%;
            object-fit: contain;
            height: 100px;
      }
</style>
<table class="table table-bordered ">
<thead class=bg-info>
<tr class="bg-info">
   <th class='bg-info text-light text-center'>S.No</th>
   <th class='bg-info text-light text-center'  >Username</th>
   <th class='bg-info text-light text-center'>User_email</th>
   <th class='bg-info text-light text-center'>User_image</th>
   <th class='bg-info text-light text-center'>User_mobile</th>
   <th class='bg-info text-light text-center'>User_addres</th>
   <th class='bg-info text-light text-center'>Delete</th>
</tr>
      </thead>
            <?php
      $select_order="SELECT * from user_table";
      $select_order_query=mysqli_query($conn,$select_order);
     
      $select_row=mysqli_num_rows($select_order_query);
      if($select_row==0){
            echo" <h3 class='text-danger text-center my-3'>No user till now</h3>";
      }
      else{
            $number=0;
            while( $fetch_order=mysqli_fetch_assoc($select_order_query)){
            $username=$fetch_order['username'];
            $user_email=$fetch_order['user_email'];
            $user_image=$fetch_order['user_image'];
            $user_mobile=$fetch_order['user_mobile'];
            $user_address=$fetch_order['user_address'];
            $number++;
            echo" <tbody>
            <tr>
                  <td class='bg-secondary text-light text-center'>$number</td>
                  <td class='bg-secondary text-light text-center'>$username</td>
                  <td class='bg-secondary text-light text-center'>$user_email</td>
                  <td class='bg-secondary text-light text-center'><img src='../User_area/user_img/$user_image' class='user_img'></td>
                  <td class='bg-secondary text-light text-center'>$user_mobile</td>
                  <td class='bg-secondary text-light text-center'>$user_address</td>
                  <td class='bg-secondary text-light text-center'><i class='fa-solid fa-trash text-light'></i></td>
      
                 
                  
                  
            </tr>
      </tbody>";
            } 
      }
            
            ?>
            
      
</table> 