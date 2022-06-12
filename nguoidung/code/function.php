<?php

function thongtinkh(){
    include("connect.php");
    if(isset($_SESSION['MSKH'])){
        $makh = $_SESSION['MSKH'];
      //  echo $makh;
        
    }
    $sql = "SELECT HoTenKH,SoDienThoai FROM khachhang WHERE MSKH='$makh'";
        $result = $conn->query($sql);
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                $hoten = $row['HoTenKH'];
                $sdt = $row['SoDienThoai'];
                echo "<span>$hoten ( $sdt ) </span>";
            }
        }
}

function diachi(){
    include("connect.php");
    if(isset($_SESSION['MSKH'])){
        $makh = $_SESSION['MSKH'];
      //  echo $makh;
        
    }
    $sql = "SELECT dc.MaDC, dc.DiaChi FROM khachhang kh 
                join diachikh dc on kh.MSKH = dc.MSKH WHERE dc.MSKH='$makh'"; 
           $result = $conn->query($sql);
           if($result->num_rows>0) {
               echo "<select class='size-dc' name= 'diachi' id='diachi'> ";
               while($row= $result->fetch_assoc()){
                   $madc = $row['MaDC'];
                   $diachi = $row['DiaChi'];
                   echo "<option  value='$madc'>$diachi</option>  ";
               }
               echo "</select>";
              
            }   
}

function donmua(){
    include("connect.php");
    $sql = "SELECT SoDonDH, NGAYDH, TongHĐ, TrangThaiDH FROM dathang
         WHERE MSKH = '".$_SESSION['MSKH']."' ORDER BY SoDonDH DESC";
         $result = $conn->query($sql);
         if($result->num_rows > 0){
             echo "<h3>ĐƠN MUA HÀNG</h3>
             <i><p>(Bạn chỉ được hủy đơn hàng khi chưa được xác nhận!)</p></i>";
            echo "<table class='table'>
            
              <thead  class='thead'>
                <tr>
                  <th>Số đơn đặt</th>
                  <th>Ngày đặt </th>
                  <th>Tổng hóa đơn</th>
                  <th>Trạng thái đơn hàng</th>
                  <th colspan='2'>Tùy chọn</th>
                </tr>
              </thead>";
              while($row = $result->fetch_assoc()){
                $sodon = $row['SoDonDH'];
                $ngaydat = $row['NGAYDH'];
                $tongdon = $row['TongHĐ'];
                $trangthai = $row['TrangThaiDH'];
                echo "<tr>
                    <td> $sodon </td>
                    <td> $ngaydat </td>
                    <td> $tongdon</td>
                    <td> $trangthai</td>
                    <td><a href='donmua_CT.php?SoDonDH=$sodon'>Xem chi tiết đơn mua </a></td>
                    <td ><a href='donmua_delete.php?SoDonDH=$sodon&TrangThaiDH=$trangthai'><button type='button' style='width:70px;height:30px;'>Hủy</button></a></td>
      </tr>";
              }
              echo "</table><hr>";
              
         }
         //dong ket noi
        $conn->close();
}

function showdiachidonmua(){
    include("connect.php");

    $sodon= $_GET['SoDonDH'];
    $sql="SELECT dc.DiaChi, kh.HoTenKH,kh.SoDienThoai FROM diachikh dc join dathang dh  on dc.MaDC=dh.MaDC
                join khachhang kh on kh.MSKH=dh.MSKH WHERE dh.SoDonDH='".$sodon."'";
    //truy van ket qua
    $result=$conn->query($sql);
      if($result->num_rows > 0)
        {
          
          while($row = $result->fetch_assoc())
          {
            $diachi = $row['DiaChi'];
            $hotenkh=$row['HoTenKH'];
            $sdt=$row['SoDienThoai'];
  
            echo "<span> Đến: <br>  $hotenkh ( $sdt ) </span>";
            echo "<div>  Địa chỉ nhận: $diachi</div>";
          }
  
      }
       //dong ket noi
       $conn->close();
      
  }

  function showsanphamdonmua(){
    include("connect.php");
    $sodon= $_GET['SoDonDH'];
    $sql = "SELECT hh.TenHH,ha.TenHinh,ct.GiaDatHang,ct.SoLuong,ct.ThanhTien
            FROM chitietdathang ct JOIN hanghoa hh on hh.MSHH=ct.MSHH JOIN hinhhanghoa ha ON ha.MSHH=hh.MSHH
            WHERE ct.SoDonDH= '$sodon'";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
      echo "<div class='container'>";
            echo "<table class = 'table'>
                    <tr>
                      <th colspan='2'>Sản Phẩm</th>
                      <th>Đơn Giá </th>
                      <th>Số lượng</th>
                      <th>Thành tiền</th>
                    </tr>";
                    $stt = 0;
      while($row = $result->fetch_assoc()){
        $ten = $row['TenHH'];
        $hinh = $row['TenHinh'];
        $gia = $row['GiaDatHang'];
        $soluong = $row['SoLuong'];
        $thanhtien = $row['ThanhTien'];
        $stt++;
        
        echo "
        <tr>
          <td><img src='$hinh' alt='HTML5 Icon' style='width:150px;height:120px;'></td>
          <td>$ten</td>
          <td>$gia</td>
          <td>$soluong</td>
          <td>$thanhtien</td>
          
        </tr> ";

      }
      echo "<h6>Nội dung hàng (Tổng số lượng sản phẩm: $stt )</h6>";
     
    }
     //dong ket noi
     $conn->close();        
  }

?>
