<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../view/style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<title>Đơn mua</title>
</head>
<body >
   
   <?php 
   
    if(!isset($_SESSION['MSKH'])){
      header("Location:/webbanhang/nguoidung/code/dangnhap_tk.php");
      
      }else{
        include("connect.php");
        include("../view/header.php");
        
         echo "<div class='container donmua'>";
        
         include("function.php");
         donmua();
         echo "</div>"; 
    }
   ?> 
     
    
  
  <?php   include("../view/footer.html"); ?>

</body>
</html>