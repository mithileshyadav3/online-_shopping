<?php
session_start();
session_unset();
session_destroy();
echo "<script>
header('Location: ../index.php');
    exit();
     </script>"
?>
<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
</head>
<body>
     <h1>Logout page</h1> 
</body>
</html>