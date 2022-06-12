<?php session_start();?>
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
    <title>Giỏ hàng</title>
</head>
<body class = 'body'>
<?php


//include("connect.php");
include("functionAD.php");
//$sodon= $_GET['SoDonDH'];


if(isset($_POST['capnhat-tt'])){

    capnhattrangthai();

    


  header('location:http://localhost/webbanhang/Admin/index_tc.php');
 }
?>

<div class= 'title-dathang'>
        <h2>TBLUE | CHI TIẾT ĐƠN HÀNG</h2>
</div>
    <br>
<div class="container donmua-sanpham topbroder">
 <?php echo "<h3>Mã đơn hàng: </h3>"; ?>
    <div class="row">
        <div class="col-sm ">Từ : <br>
            Kho TBLUE Cần Thơ <br>
            Đường 3/2, Phường Xuân Khánh - quận Ninh Kiều - Cần Thơ<br>
        </div>
          
        <div class="col-sm "><?php showdiachidonmua(); ?></div>
    <div>
        
    <br>      
</div>  

<div class="container donmua-sanpham topbroder"><br>
    <?php 
    //showdiachidonmua(); 
    showsanphamdonmua();   
    ?><br>
</div>

<div class="container trangthaiad">
    <div class ='trangthai' >
        <form action='' method='post' id='form' enctype='multipart/form-data'>
            <label for='tt'><b>Trạng thái:</b></label>
                <select class='size' name='trangthai'>
                    <option value='Chưa xác nhận'>Chưa xác nhận</option>
                    <option value='Đã xác nhận'>Đã xác nhận</option>

                </select>
            <br>
            <br>
            <input id='update-trangthai' type='submit' name='capnhat-tt' value='Cập nhật đơn hàng'>
        </form>
    </div> 
</div>
 
</body>
</html>