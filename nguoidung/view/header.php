<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <title>TBlue</title>
</head>
<body>
  <div class="header">
    <div class="container-fluid">
        <div class="row bg-color">
          <div class="col-sm ">Thời gian mở cửa: 08:00 - 17:00</div>
          
          <div class="col-sm ">Welcome to TBlue online store </div>
          <div class="col-sm ">
            <!--<a  style=" float:right;padding:5px;color:white; " href = "/webbanhang/nguoidung/code/dangnhap_tk.php"><i class="fas fa-user "></i></a>-->
            

            <div style=" float:right;" class="dropdown">
              <button  style="color:white;" type="button" class="btn dropdown-toggle" data-toggle="dropdown">
              <i class="fas fa-user "></i>
              </button>
              <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="/webbanhang/nguoidung/code/dangnhap_tk.php">Đăng nhập</a>
                <a class="dropdown-item" href="/webbanhang/nguoidung/code/dangxuat.php">Đăng xuất</a>
                
              </div>
            </div>
            <a  style=" float:right;padding:5px;color:white;text-decoration:none; " href = "/webbanhang/nguoidung/code/giohang.php">Giỏ hàng <i class="fas fa-shopping-cart"></i></a>
        </div>  
      </div>
   </div>
  <div class="menu">
  <div class="container-fluid">
   
        <nav class="navbar navbar-expand-lg navbar-light  ">
            <a class="navbar-brand" href="#"><img src="/webbanhang/img/logoTB.png" alt="New York" width="70"></a>
            <div class="navbar-brand1">TBlue</div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
              <ul class="navbar-nav mr-auto my-2 my-lg-0 navbar-nav-scroll" style="max-height: 100px;">
                <li class="nav-item active">
                  <a class="nav-link" href="/webbanhang/nguoidung/index.php">TRANG CHỦ <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/webbanhang/nguoidung/index.php#gioithieu">GIỚI THIỆU</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="/webbanhang/nguoidung/index.php#" id="navbarScrollingDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                    SẢN PHẨM
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                    <?php 
                     // include("../code/connect.php");
            
                      
                      $sql = "SELECT * FROM loaihanghoa";
                      $result = $conn->query($sql);
                      if($result->num_rows>0){
                        while($row = $result->fetch_assoc()){
                          $tenloai=$row['TenLoaiHang'];
                          $maloai=$row['MaLoaiHang'];
                          echo"<li><a class='dropdown-item' href='/webbanhang/nguoidung/code/sanphamds.php?MaLoaiHang=$maloai'>$tenloai</a></li>";

                        }
                      }
                        
                    ?>
                  </ul>
                </li>
                <li class="nav-item">
                  <a href='/webbanhang/nguoidung/code/donmua.php' class="nav-link">ĐƠN MUA</a>
                </li>
              </ul>
              <form class="d-flex" action= "/webbanhang/nguoidung/code/sanphamds.php" method ='GET' enctype="multipart/form-data">
                <input class="form-control mr-2"  style='width:400px;  font-size: 20px;font-style: oblique;border: 1px solid black;' 
                        type="search" placeholder="Từ khóa" aria-label="Search" name = "tukhoa">
                <button class="btn btn-outline-success" type="submit" name ="timkiem">Search</button>
              </form>
            </div>
          </nav>
    </div>
  </div>
</body>
</html>
