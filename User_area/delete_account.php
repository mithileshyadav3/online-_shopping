<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
</head>
<body>
<div class="container">
    <h3 class="text-center text-danger my-4">
      Delete Account
    </h3>
    <form action="" method="post">
<div>
      <input type="submit" class="form-control my-3 m-auto text-light bg-danger w-50" name="delete_btn" value="Delete Account">
</div>
<div>
      <input type="submit" class="form-control my-3 m-auto text-light bg-success w-50" name="dont_delete_btn" value=" Don't Delete Account">
</div>
    </form>
</div>
</body>
</html>
<?php
if(isset($_POST['delete_btn'])){
$username=$_SESSION['username'];
$deleteaccount="DELETE From user_table where username='$username'";
$deletequery=mysqli_query($conn,$deleteaccount);
if($deletequery){
      echo "<script>
      alert('Account has been delete successfully')
      window.location.href='../index.php';
      </script>";
}
}

if(isset($_POST['dont_delete_btn'])){
echo"window.location.href='profile.php'";
}



?>