<?php session_start(); ?>
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
<title>Danh sách</title>
</head>
<body>

<?php 
   include("connect.php");
   include("../view/header.php");
?>
   

   
   
        <?php 
          $ma=$_GET['MSHH'];
              
          $sql="SELECT *  FROM  hanghoa hh JOIN hinhhanghoa ha on ha.MSHH=hh.MSHH WHERE hh.MSHH='".$ma."'";
          $result = $conn->query($sql);

          if($result ->num_rows>0){
            while($row = $result ->fetch_assoc()){
              $mahh = $row['MSHH'];
              $ten = $row['TenHH'];
              $gia = $row['Gia'];
              $soluong = $row['SoLuongHang'];
              $ghichu = $row['GhiChu'];
              $hinh= $row['TenHinh'];
              echo "<div class='container'>
                    <div class='row'> ";
              echo "<div class='col-sm '><img src='$hinh' alt='HTML5 Icon' style='height:500px;'></div>";
              echo "<div class='col-sm' >
                      <h2 style='font-size:45px;font-style: oblique;'>$ten</h2><br>
                      <h4 style='font-size:30px;color: red;'>$gia (VNĐ) </h4>
                      <div class ='check' style='font-size:22px;'>
                      
                      <i class='far fa-check-square'>Hỗ trợ tư vấn mua hàng 0917367843</i><br>
                      <i class='far fa-check-square'> Đảm bảo cây chất lượng như ảnh</i><br>
                      <i class='far fa-check-square'> Đổi trả trong vòng 4 ngày</i><br>
                      <i class='far fa-check-square'> Giao hàng tận nơi</i><br>
                      </div>
                        <form action='giohang.php' method='POST' enctype='multipart/form-data'>
                            
                            <input type='hidden' name='ma' value='$mahh'>
                            <input type='hidden' name='ten' value='$ten'>
                            <input type='hidden' name='hinh' value='$hinh'>
                            <input type='hidden' name='gia' value='$gia'>
                          
                        
                            <div class = 'themdon'>
                            <label for='quantity'>Số lượng:</label>
                            <input type='number' id='quantity' name='quantity' min='1' max='$soluong' value ='1'>
                               <input class ='colorbt' type='submit' name='themgiohang'  value='THÊM VÀO GIỎ HÀNG'>
                              
                            </div>
                          </form> 

                   </div>
                 </div>
                 <br> 
                 <h3 style='color: rgb(43, 65, 43);'>Đôi nét về $ten</h3>
                 <p style='font-size:25px;'>$ghichu</p>
                </div>";
          

            }
          }
          ?>

          
          
          
         
        
   <?php   include("../view/footer.html"); ?>
</body>
</html>