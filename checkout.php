<?php
session_start();
include('./include/connect.php');


?>

   
<!-- fourth child -->
 <div class="row">
      <!-- products -->
      <div class="col-md-12">
            <div class="row">
           <?php
      if(!isset($_SESSION['username'])){
            include('./User_area/login.php');
      }
      else{
            include('payment.php'); 
      }
           
           ?>
                   </div>
            
      </div>
      
               
            
      </div>
 
 <!-- last child -->
 <!-- <div class=" bg-info text-center p-3 ">
      <p>All right are here by Mithilesh</p>
 </div> -->
</div>
<!-- bootstrap js file -->
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js
       "></script>
</body>
</html>