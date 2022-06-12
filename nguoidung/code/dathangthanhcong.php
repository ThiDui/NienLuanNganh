<!DOCTYPE html>
<html lang="en">
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
    <title>Đặt hàng thành công</title>
</head>
<body>
    <?php $sodon= $_GET['SoDonHD']; ?>
    <div class= 'title-dathang'>
        <h2>TBLUE | THÔNG BÁO</h2>
    </div>
    <br>
<div class = "dhthanhcong">

    <i class="fas fa-check-circle icon"></i>
    <div class = 'title'>ĐẶT HÀNG THÀNH CÔNG  </div>
    <div class = "nd1">Đơn hàng <b><?php echo $sodon; ?></b> đã được khởi tạo.<br>
        Cảm ơn quý khách đã mua hàng tại TBLUE.com!    
    </div>
    <div class = "nd2"><br>Hình thức thanh toán: Thanh toán tiền mặt khi nhận được hàng(COD).
        <br>
        Nhân viên chúng tôi sẽ liên hệ với bạn sớm nhất để xác nhận đơn hàng.
    </div>
    <div>
    <br><br>
        <a href='donmua.php'><button type='button' class = 'ctdonhang'>Xem chi tiết đơn hàng</button></a>
        
    </div>
    <div><br><a href='/webbanhang/nguoidung/index.php'><button type='button' class = 'ctdonhang'>Trở lại trang chủ</button></a></div>
</div>
</body>
</html>