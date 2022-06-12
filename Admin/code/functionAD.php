<?php
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


  function capnhattrangthai(){
    include("connect.php");
    if(isset($_SESSION['MSNV'])){
      $manv = $_SESSION['MSNV'];
     
  }
    $trangthai=$_POST['trangthai'];
    $sodon= $_GET['SoDonDH'];
  
    $sql1= "UPDATE dathang SET MSNV ='".$manv."',TrangThaiDH ='".$trangthai."' WHERE SoDonDH = '".$sodon."'";
    $result1 =$conn->query($sql1);
  
     // theo doi lich su

     $msnv=$_SESSION['MSNV'];
     $sql2 = "CALL lichsuNV('Duyệt đơn hàng ($sodon)','Cập nhật đơn hàng','$msnv')";
     $conn->query($sql2);
  //dong ket noi
  $conn->close();
  
  }
  ?>