<?php
// @session_start();
if(isset($_GET['edit_account'])){
      $username=$_SESSION['username'];
      $select_edit_query="SELECT * from user_table where username='$username'";
      $edit_query=mysqli_query($conn,$select_edit_query);
 $fetch_query=mysqli_fetch_assoc($edit_query);
      $user_id=$fetch_query['user_id'];
      $user_name=$fetch_query['username'];
      $user_email=$fetch_query['user_email'];
      // $user_image=$fetch_query['user_image'];
      $user_address=$fetch_query['user_address'];
      $user_mobile=$fetch_query['user_mobile'];
      

}
if(isset($_POST['submit_button'])){
       $user_id1= $user_id;
$username=$_POST['user_name'];
$user_email=$_POST['user_email'];
$user_file=$_FILES['user_file']['name'];
$user_file_tem_name=$_FILES['user_file']['tmp_name'];
$user_address=$_POST['user_address'];
$user_mobile=$_POST['user_number'];
move_uploaded_file($user_file_tem_name, "user_img/$user_file");
$update="UPDATE user_table set username='$username', user_email='$user_email',user_image='$user_file',user_address='$user_address',
user_mobile='$user_mobile' where user_id='$user_id1'";
// $user_file=$_SESSION['user_file'];
$update_query=mysqli_query($conn,$update);
if($update_query){
      echo"<script>
      alert('updated successfully')
      window.open('../index.php')
      </script>";
}
else{
      echo"<script>
      alert('updated not successfully')
      </script>";  
}


}


?>


<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
</head>
<body>
  <h1 class="text-success text-center">Edit Account</h1> 
  
  <div>
      <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-4 form-outline "> 
                 <input type="text" class="form-control w-50 m-auto" value="<?php echo $user_name?>" name="user_name"> 
            </div>
            <div class="mb-4 form-outline "> 
                 <input type="email" class="form-control w-50 m-auto"  name="user_email"  value="<?php echo $user_email?>"> 
            </div>
            <div class="mb-4 form-outline "> 
                 <input type="file" class="form-control w-50 m-auto"  name="user_file"> 
            </div>
            <div class="mb-4 form-outline "> 
                 <input type="text" class="form-control w-50 m-auto"  name="user_address"  value="<?php echo $user_address?>"> 
            </div>
            <div class="mb-4 form-outline "> 
                 <input type="phone" class="form-control w-50 m-auto"  name="user_number"  value="<?php echo $user_mobile?>"> 
            </div>
            <div class="mb-4 form-outline "> 
                 <input type="submit" class="form-control w-50 m-auto text-light bg-info"  name="submit_button"> 
            </div>
      </form>
  </div>
</body>
</html>