<?php
// include('./include/connect.php');
// function of products
  session_start();
function getproduct(){
global $conn;
if(!isset($_GET['categories'])){
      if(!isset($_GET['brand'])){ 
      $fetchproduct="SELECT * FROM products order by rand() limit 0,3";
              $executeproduct=mysqli_query($conn,$fetchproduct);
            //   $fetchproducts=mysqli_fetch_assoc($executeproduct);
              while($fetchproducts=mysqli_fetch_assoc($executeproduct)){
                  $product_id=$fetchproducts['product_id'];
$product_title=$fetchproducts['product_title'];
$product_description=$fetchproducts['product_description'];
$product_keywords=$fetchproducts['product_keywords'];
$category_id=$fetchproducts['category_id'];
$brand_id=$fetchproducts['brand_id'];
$product_image1=$fetchproducts['product_image1'];
$product_image2=$fetchproducts['product_image2'];
$product_price=$fetchproducts['product_price']; //C:\xampp\htdocs\Projects\E-commerce Website\online_shoping\Admin\uploadpic apple.jpg
echo "
                  <div class='col-md-4 mb-3'>
                        <div class='card' style='width: 18rem;'>
                              <img src='./Admin/product_img/$product_image1' class='card-img-top'>
                              <div class='card-body'>
                                <h5 class='card-title'>$product_title</h5>
                               <b> <p>Price: $product_price/ <p> </b>
                                <p class='card-text'>$product_description</p>
                                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Go to Cart</a>
                                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                              </div>
                            </div>
                  </div>";
              }
              

            }
            }
}
// display all data  there is no limit for display on homepage
function display_allproduct(){
     global $conn;
      if(!isset($_GET['categories'])){
            if(!isset($_GET['brand'])){ 
            $fetchproduct="SELECT * FROM `products`  order by rand()";
                    $executeproduct=mysqli_query($conn,$fetchproduct);
                  //   $fetchproducts=mysqli_fetch_assoc($executeproduct);
                    while($fetchproducts=mysqli_fetch_assoc($executeproduct)){
                        $product_id=$fetchproducts['product_id'];
      $product_title=$fetchproducts['product_title'];
      $product_description=$fetchproducts['product_description'];
      $product_keywords=$fetchproducts['product_keywords'];
      $category_id=$fetchproducts['category_id'];
      $brand_id=$fetchproducts['brand_id'];
      $product_image1=$fetchproducts['product_image1'];
      
      $product_price=$fetchproducts['product_price']; //C:\xampp\htdocs\Projects\E-commerce Website\online_shoping\Admin\uploadpic apple.jpg
      echo "
                        <div class='col-md-4 mb-3'>
                              <div class='card' style='width: 18rem;'>
                                    <img src='./Admin/product_img/$product_image1' class='card-img-top'>
                                    <div class='card-body'>
                                      <h5 class='card-title'>$product_title</h5>
                                     <b> <p>Price: $product_price/ <p> </b>
                                      <p class='card-text'>$product_description</p>
                                      <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Go to Cart</a>
                                      <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                                    </div>
                                  </div>
                        </div>
      ";
                    }
                  }
      
                  }
                  }
      



// this function is used for unique  category value;
function get_unique_category(){
      global $conn;
      if(isset($_GET['categories'])){
            $cat_uni_id=$_GET['categories'];
            
           
            $fetchproduct="SELECT * FROM `products`  where category_id='$cat_uni_id'";
            $executeproduct=mysqli_query($conn,$fetchproduct);
            $num_of_rows=mysqli_num_rows($executeproduct);
            if( $num_of_rows==0){
                  echo "<h2 class='text-center text-danger'>You choose products is not available </h2>";
            }
            
                    
                  //   $fetchproducts=mysqli_fetch_assoc($executeproduct);
                    while($fetchproducts=mysqli_fetch_assoc($executeproduct)){
                        $product_id=$fetchproducts['product_id'];
      $product_title=$fetchproducts['product_title'];
      $product_description=$fetchproducts['product_description'];
      $product_keywords=$fetchproducts['product_keywords'];
      $category_id=$fetchproducts['category_id'];
      $brand_id=$fetchproducts['brand_id'];
      $product_image1=$fetchproducts['product_image1'];
      $product_image2=$fetchproducts['product_image2'];
      $product_price=$fetchproducts['product_price']; //C:\xampp\htdocs\Projects\E-commerce Website\online_shoping\Admin\uploadpic apple.jpg
      echo "
                        <div class='col-md-4 mb-3'>
                              <div class='card' style='width: 18rem;'>
                                    <img src='./Admin/product_img/$product_image1' class='card-img-top'>
                                    <div class='card-body'>
                                      <h5 class='card-title'>$product_title</h5>
                                     <b> <p> Price:$product_price/ <p> /</b>
                                      <p class='card-text'>$product_description</p>
                                       <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Go to Cart</a>
                                        <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                                    </div>
                                  </div>
                        </div>";
                    }
                    
                  }
            }
                  
            
// this function is used for unique brand value;
function get_unique_brand(){
      global $conn;
      if(isset($_GET['brand'])){
            $brand_uni_id=$_GET['brand'];
            
           
            $fetchproduct="SELECT * FROM products  where brand_id=$brand_uni_id";
            $executeproduct=mysqli_query($conn,$fetchproduct);
            $num_of_rows=mysqli_num_rows($executeproduct);
            if( $num_of_rows==0){
                  echo "<h2 class='text-center text-danger'>You choose Service is not available </h2>";
            }
            
                    
                  //   $fetchproducts=mysqli_fetch_assoc($executeproduct);
                    while($fetchproducts=mysqli_fetch_assoc($executeproduct)){
                        $product_id=$fetchproducts['product_id'];
      $product_title=$fetchproducts['product_title'];
      $product_description=$fetchproducts['product_description'];
      $product_keywords=$fetchproducts['product_keywords'];
      $category_id=$fetchproducts['category_id'];
      $brand_id=$fetchproducts['brand_id'];
      $product_image1=$fetchproducts['product_image1'];
      $product_image2=$fetchproducts['product_image2'];
      $product_price=$fetchproducts['product_price']; //C:\xampp\htdocs\Projects\E-commerce Website\online_shoping\Admin\uploadpic apple.jpg
      echo "
                        <div class='col-md-4 mb-3'>
                              <div class='card' style='width: 18rem;'>
                                    <img src='./Admin/product_img/$product_image1' class='card-img-top'>
                                    <div class='card-body'>
                                      <h5 class='card-title'>$product_title</h5>
                                     <b> <p> Price: $product_price/ <p> /</b>
                                      <p class='card-text'>$product_description</p>
                                      <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Go to Cart</a>
                                       <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                                    </div>
                                  </div>
                        </div>";
                    }
                    
                  }
            }
      

// function of brands fetcht to display;
function getbrand(){
      global $conn;
      $selectdata="SELECT * FROM brand";
                  $querydata=mysqli_query($conn,$selectdata);
                 while( $fetchdata=mysqli_fetch_assoc($querydata)){
                  // $product_id=$fetchdata['product_id'];
                  $total_fetchdata=$fetchdata['brand_title'];
                  $total_fetchid=$fetchdata['brand_id'];
                  echo "
                  <li class='nav-item bg-dark'>
                        <a href='index.php?brand=$total_fetchid' class='nav-link'>$total_fetchdata</a>
                  </li>";
                 }
}
// function of category fetch to display
function getcategory(){
      global $conn;
      $selectcat="SELECT * FROM categories";
      $selectcat1=mysqli_query($conn,$selectcat);
      while($fetchcat=mysqli_fetch_assoc($selectcat1)){
       $fetchrowcat=$fetchcat['categories_title'];
       $fetchrowcat_id=$fetchcat['categories_id'];
       echo "<li class='nav-item bg-dark '>
            <a href='index.php?categories=$fetchrowcat_id' class='nav-link '> $fetchrowcat</a>
      </li>";
      }
}

// this searching products
function search_products(){

      global $conn;
             if(isset($_GET['search_data_product'])) {
            $search_value=$_GET['search_product'];
           
            $search_query="SELECT * FROM products  where product_keywords like '% $search_value%'";
            $executeproduct=mysqli_query($conn,$search_query);
            $num_of_rows=mysqli_num_rows($executeproduct);
            if( $num_of_rows==0){
                  echo "<h2 class='text-center text-danger'>You choose products is not available </h2>";
            }
            
                    
                  //   $fetchproducts=mysqli_fetch_assoc($executeproduct);
                    while($fetchproducts=mysqli_fetch_assoc($executeproduct)){
                        $product_id=$fetchproducts['product_id'];
      $product_title=$fetchproducts['product_title'];
      $product_description=$fetchproducts['product_description'];
      $product_keywords=$fetchproducts['product_keywords'];
      $category_id=$fetchproducts['category_id'];
      $brand_id=$fetchproducts['brand_id'];
      $product_image1=$fetchproducts['product_image1'];
     
      
      $product_price=$fetchproducts['product_price']; //C:\xampp\htdocs\Projects\E-commerce Website\online_shoping\Admin\uploadpic apple.jpg
      echo "
                        <div class='col-md-4 mb-3'>
                              <div class='card' style='width: 18rem;'>
                                    <img src='./Admin/product_img/$product_image1' class='card-img-top'>
                                    <div class='card-body'>
                                      <h5 class='card-title'>$product_title</h5>
                                     <b> <p> Price: $product_price /<p> /</b>
                                      <p class='card-text'>$product_description</p>
                                      <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Go to Cart</a>
                                       <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                                    </div>
                                  </div>
                        </div>
                                        
                        
                        ";
                    }
                    
                  }

                  
            }
            //  view more detail of products

            function viewDetails(){
                  global $conn;
                  if(isset($_GET['product_id'])){
                        $product_id1=$_GET['product_id'];
                  if(!isset($_GET['categories'])){
                       
                        if(!isset($_GET['brand'])){ 
                        $fetchproduct="SELECT * FROM `products`  where product_id ='$product_id1'";
                                $executeproduct=mysqli_query($conn,$fetchproduct);
                              //   $fetchproducts=mysqli_fetch_assoc($executeproduct);
                                while($fetchproducts=mysqli_fetch_assoc($executeproduct)){
                                    $product_id=$fetchproducts['product_id'];   
                  $product_title=$fetchproducts['product_title'];
                  $product_description=$fetchproducts['product_description'];
                  $product_keywords=$fetchproducts['product_keywords'];
                  $category_id=$fetchproducts['category_id'];
                  $brand_id=$fetchproducts['brand_id'];
                  $product_image1=$fetchproducts['product_image1'];
                  $product_image2=$fetchproducts['product_image2'];
                  $product_image3=$fetchproducts['product_image3'];
                  
                  $product_price=$fetchproducts['product_price']; //C:\xampp\htdocs\Projects\E-commerce Website\online_shoping\Admin\uploadpic apple.jpg
                  echo "
                                    <div class='col-md-4 mb-3'>
                                          <div class='card' style='width: 18rem;'>
                                                <img src='./Admin/product_img/$product_image1' class='card-img-top'>
                                                <div class='card-body'>
                                                  <h5 class='card-title'>$product_title</h5>
                                                 <b> <p> Price: $product_price /<p> </b>
                                                  <p class='card-text'>$product_description</p>
                                                  <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Go to Cart</a>
                                                  <a href='index.php' class='btn btn-secondary'>Go Home</a>
                                                </div>
                                              </div>
                                    </div>
                                    <div class='col-md-8'>
      <div class='row'>
            <div class='col-md-12'>
                  <h4 class='h4 text-center text-info'>
                  Related Products
                  
  </h4>
                      

            </div>
            <div class='col-md-6 mt-5'>
<img src='./photos/$product_image2'  class='card-img-top'>
            </div>
            <div class='col-md-6 mt-5'>
           <img src='./photos/$product_image3'  class='card-img-top'>
            </div>
      </div>
</div>  
                  ";
                                }
                              }
                  
                              }
      }}

      //  Get function of ip address
      
            function getIPAddress() {  
                  //whether ip is from the share internet  
                   if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                              $ip = $_SERVER['HTTP_CLIENT_IP'];  
                      }  
                  //whether ip is from the proxy  
                  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                              $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
                   }  
              //whether ip is from the remote address  
                  else{  
                           $ip = $_SERVER['REMOTE_ADDR'];  
                   }  
                   return $ip;  
              }  
            //   $ip = getIPAddress();  
            //   echo 'User Real IP Address - '.$ip;  


            function cart(){

              if(isset($_GET['add_to_cart'])) {
                  global $conn;
                  $get_product_id=$_GET['add_to_cart'];
                  $ip = getIPAddress();  
                  $select_query="SELECT * FROM  `card_detail` WHERE product_id='$get_product_id' AND ip_address='$ip' ";
                  $result_query=mysqli_query($conn,$select_query);
                  $count_num_ofrows=mysqli_num_rows($result_query);
                  if($count_num_ofrows>0){
                      echo "<script> alert('cart is already added')
                       window.open('index.php')
                      </script>";
                     
                  }
                  else{
                        $insert_query="INSERT INTO `card_detail` (product_id,ip_address,quantity) VALUES('$get_product_id','$ip','0')";
                        $inserted_query=mysqli_query($conn,$insert_query);
                        if($inserted_query){
                              echo "<script> alert('insert cart is successfully')
                              </script>"  ;
                              // echo  "window.open('index.php')";
                        }
                  }

               }
            
            }
            // Count the total cart 
            function totalcart(){
                
              if(isset($_GET['add_to_cart'])) {
                  global $conn;
                  
                  $ip = getIPAddress();  
                  $select_query="SELECT * FROM  `card_detail` WHERE  ip_address='$ip' ";
                  $result_query=mysqli_query($conn,$select_query);
                  $count_num_ofrows=mysqli_num_rows($result_query);  
              }
                  else{
                        global $conn;
                  
                        $ip = getIPAddress();  
                        $select_query="SELECT * FROM  `card_detail` WHERE  ip_address='$ip' ";
                        $result_query=mysqli_query($conn,$select_query);
                        $count_num_ofrows=mysqli_num_rows($result_query); 
                  }
echo $count_num_ofrows;
               }  
            //    this is the total of price when you add to cart

      function totalprice(){
            global $conn;
           
                  $ip = getIPAddress(); 
                  $total=0;
                  $slect_ip_address="SELECT * FROM `card_detail` WHERE ip_address='$ip'";
                  $select_ip_query=mysqli_query($conn,$slect_ip_address) ;
                 while( $fetch_ip=mysqli_fetch_array($select_ip_query))
                 {
                  $product_id=$fetch_ip['product_id'];
                  $select_product="SELECT * FROM `products` WHERE product_id='$product_id'";
                  $select_product_query=mysqli_query($conn,$select_product);
                 while( $fetch_product=mysqli_fetch_array($select_product_query))
                 {
                  
                   $product_price= array($fetch_product['product_price']);
                   
                   $total_price=array_sum($product_price);
                   $total+=$total_price;
                 }
                 }
                 echo $total;
      }   
      
      // for the pending order
      function show_pending_order(){
            global $conn;
            $username=$_SESSION['username'];
            $selct_order="SELECT * from user_table where username='$username'";
            $select_order_query=mysqli_query($conn,$selct_order);
          
           while(  $fetch_order=mysqli_fetch_array($select_order_query)){
          echo  $user_id=$fetch_order['user_id'];
            if(!isset($_GET['edit_account'])){
                  if(!isset($_GET['my_oders'])){
                        if(!isset($_GET['delete_account'])){
                               $get_order="SELECT * FROM user_orders where user_id='$user_id' and order_status='pending'";
                               $query=mysqli_query($conn,$get_order);
                               $num_row=mysqli_num_rows($query);
                               if($num_row>0){
                                    echo"<h3 class='text-center text-success'>You have <span class='text-danger'>$num_row</span> pending orders</h3>
                                   <p class='text-center'> <a href='profile.php?myorder' > Order Details</a></p>
                                    ";
                               }
                               else{
                                    echo"<h3 class='text-center text-success'>You have 0 pending orders</h3>
                                    <p class='text-center'> <a href='../index.php' >Explore more</a></p>
                                     ";

                               }
                        }
                  }  
            }
           }
      }
?>

