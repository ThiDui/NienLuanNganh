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
    <title>Giỏ hàng</title>
</head>
<body>

<?php

if(!isset($_SESSION['MSKH'])){
    header("Location:/webbanhang/nguoidung/code/dangnhap_tk.php");
    
    }
else{
  include("connect.php");
  ////dat hang
 /* 
  if(isset($_POST['dathang'])){
    $sp = $_POST['sanpham'];
    $spParams = "";
    foreach ($sp as $key => $value) {
      $spParams .= "sanpham=".$value."&";
    }
     echo $spParams;
    //$sl = $_POST['quantity'];
    // print_r($sp);
    //header("Location: dathang.php?".$spParams);
    
    
  } 
  */
  include("../view/header.php");

    if(isset($_POST['themgiohang'])){

        $makh =$_SESSION['MSKH'];
        $mahh = $_POST['ma'];
        $ten = $_POST['ten'];
        $hinh = $_POST['hinh'];
        $gia = $_POST['gia'];
        $soluong = $_POST['quantity'];
        
        ///xu ly khi them trung san pham vao gio hang
        $temp = 0;
        $sql2="SELECT MAHH, SOLUONG FROM giohang";
        $result2 = $conn->query($sql2);
        if($result2->num_rows>0){
          
          while($row = $result2->fetch_assoc()){
            $ma = $row['MAHH'];
            $sl = $row['SOLUONG'];
            if($mahh==$ma){
                $temp = 1;
                $soluongmoi= $soluong + $sl;
                $sql="UPDATE giohang SET SOLUONG='".$soluongmoi."' WHERE MAHH= '".$ma."'";
                $result = $conn->query($sql);
                break;
            }
          }

        }
        
        //xuly neu k trung
        if($temp == 0){//khong trùng sp thi them
          ////them san pham vao gio hang
        $sql="INSERT INTO giohang(MAHH, MSKH, TENSP, HINHSP, GiaSP, SOLUONG)
                      VALUES ('$mahh','$makh','$ten','$hinh','$gia','$soluong')";
        $result = $conn->query($sql);
        }
        
        
    }
    

    //cap nhat so luong san pham trong gio hang
    if(isset($_POST['suagiohang'])){
          
      for ($i=0; $i <count($_POST['idhh']) ; $i++) { 
        $idhh = $_POST['idhh'][$i];
        $slupdate = $_POST['quantity'][$i];
        
       $sql = "UPDATE giohang SET SOLUONG='".$slupdate."' WHERE MAHH = '".$idhh."'";
      $result =$conn->query($sql);
      }
    
    }


//hien gio hang
    $sql1 = "SELECT * FROM giohang";
    $result = $conn->query($sql1);
         if($result->num_rows>0){
            echo "
         <div class='container'>
            <h3>GIỎ HÀNG</h3>
            <form action='' method='POST' id='formProducts' enctype='multipart/form-data'>
            <table class='table'>
            
              <thead  class='thead'>
                <tr>
                  
                
                  <th></th>
                  <th>Hình</th>
                  <th>Tên hàng </th>
                  
                  <th>Giá</th>
                  <th>Số lượng</th>
                  <th>Số tiền</th>
                  <th>Xóa</th>
                </tr>
              </thead>";
              $tong=0;
            $STT = 0;
            while($row = $result->fetch_assoc()){
                  $ma = $row['MAHH'];
                  $makh = $row['MSKH'];
                  $ten = $row['TENSP'];
                  $hinh = $row['HINHSP'];
                  $gia = $row['GiaSP'];
                  $soluong = $row['SOLUONG'];
                  $STT++;
                  $sotien = $gia * $soluong;
                  $tong+=$sotien;
              echo "<tbody>
              
                   
                    <tr class='sanpham-item' data-id='$ma'>
                    
                      <td class = 'checkbox' ><input type='checkbox' class='spchonmua' name='sanpham[]' value='$ma'></td>
                      <td><img src='$hinh' alt='HTML5 Icon' style='width:150px;height:120px;'></td>
                      <td>$ten</td>
                      <td>$gia</td>
                      <input type='hidden' name='idhh[]' value='$ma'>
                      <td> <input type='number' id='quantity' name='quantity[]' min='1' max='10' value ='$soluong'> </td>
                      <td>$sotien</td>
                      <td><a href='delete.php?MAHH=$ma'><i class='fas fa-trash-alt'></i></a></td>
                    
                    </tr>
                    
                    
              

                      
                    </tbody>";
          
            }
          echo " <tr>
                <th colspan='5'>Tổng đơn hàng</th>
                <th colspan='2'><div>$tong(VNĐ)</div></th>
               </tr>
                  </table>
                 <hr>";
                 
           echo " <a href= 'http://localhost/webbanhang/nguoidung/code/sanphamds.php?MaLoaiHang=L01' ><button type='button'  class='giohang'>Tiếp tục mua hàng</button></a>
           <button type='submit' name ='suagiohang' id='btnUpdate' class='giohang'>Cập nhật giỏ hàng</button>
           </form>
           <div class = 'gocphai' style=' float:right; '>
             
             
             <input type='submit' id='btnOrder' name = 'dathang' class='giohang' value='Đặt hàng'>
             
           </div>  
                  </div><br><br>";
          }
          
          $conn->close();
        
}
?>



<?php   include("../view/footer.html"); ?> 
<script src="Cart.js"></script>
</body>
</html>
