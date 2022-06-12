<?php
session_start();
?>
<?php
include('connect.php');

$sql = "SELECT * FROM hanghoa";
$result = $conn->query($sql);
if($result->num_rows>0){
  echo "
  <h3> SẢN PHẨM</h3>
  <div class = 'them' >
  <a style='float:right;'  href ='/webbanhang/Admin/code/sanpham_them.php'><button type='' name ='them' style='background-color:#2f84a0;' class='btn btn-primary'>Thêm</button></a>
  </div>
  <table class='table'>
    <thead class='thead'>
      <tr>
        <th>STT</th>
        <th>Mã loại</th>
        <th>Mã hàng</th>
        
        <th>Tên hàng </th>
        <th>Giá</th>
        <th>Số lượng</th>
        <th>Ghi chú</th>
        <th colspan='2'>Tùy chọn</th>
      </tr>
    </thead>";
  $STT = 0;
  while($row = $result->fetch_assoc()){
        $ma = $row['MSHH'];
        $maloai = $row['MaLoaiHang'];
		$ten = $row['TenHH'];
        $gia = $row['Gia'];
        $soluong = $row['SoLuongHang'];
        $ghichu = $row['GhiChu'];
        $STT++;
    echo "<tbody>
            <tr>
            <td>$STT</td>
            <td>$maloai</td>
            <td>$ma</td>
           
            <td>$ten</td>
            <td>$gia</td>
            <td>$soluong</td>
            <td>$ghichu</td>
            <td><a href='/webbanhang/Admin/code/sanpham_update.php?MSHH=$ma'><i class='fas fa-pen'></i></a> </td>
            <td><a href='/webbanhang/Admin/code/delete.php?MSHH=$ma'><i class='fas fa-trash-alt'></i></a></td>
            </tr>
          </tbody>";

  }
echo " </table>";
}
?>

   
 