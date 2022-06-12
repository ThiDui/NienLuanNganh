<?php session_start();?>

<?php 

include("connect.php");

$sql = "SELECT dh.SoDonDH, tk.TK_TenDangNhap, dh.NGAYDH, dh.TongHĐ, dh.TrangThaiDH FROM dathang dh join khachhang kh on dh.MSKH=kh.MSKH join taikhoan tk on tk.TK_Ma=kh.TK_MA ORDER BY SoDonDH DESC";
//truy van ket qua
$result= $conn->query($sql);
if($result->num_rows>0){
    echo "
    <h3>GIỎ HÀNG</h3><br>
    <table class='table'>
      <thead class='thead'>
        <tr>
          <th>STT</th>
          <th>Mã đơn</th>
          <th>Họ tên khách hàng</th>
          <th>Ngày đặt hàng</th>
          <th>Tổng hóa đơn</th>
          <th>Trạng thái</th>
          <th colspan='2'>Tùy chọn</th>
        </tr>
      </thead>";
    $STT = 0;
    while($row = $result->fetch_assoc()){
        $sodon = $row['SoDonDH'];
        $tentk = $row['TK_TenDangNhap'];
        $ngaydat = $row['NGAYDH'];
        $tongdon = $row['TongHĐ'];
        $trangthai = $row['TrangThaiDH'];
        $STT++;
  
        echo "<tbody>
        <tr>
            <td> $STT </td>
            <td> $sodon </td>
            <td>$tentk</td>
            <td> $ngaydat </td>
            <td> $tongdon</td>
            <td> $trangthai</td>
            <td><a href='/webbanhang/Admin/code/donhang_CT.php?SoDonDH=$sodon'>Xem chi tiết đơn hàng </a></td>
            <td><a href='/webbanhang/Admin/code/donhang_delete.php?SoDonDH=$sodon&TrangThaiDH=$trangthai'><i class='fas fa-trash-alt'></i></a></td>
        </tr>
        </tbody>";
            
  
    }
  echo " </table>";
  }
?>