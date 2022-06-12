<?php
session_start();
?>

<?php
include("phanquyen.php");
include('connect.php');

$sql = "SELECT MSNV, HoTenNV,ChucVu,DiaChi, SoDienThoai,TK_TenDangNhap, tk.TK_Ma FROM nhanvien nv join taikhoan tk on tk.TK_Ma=nv.TK_MA";
$result = $conn->query($sql);
if($result->num_rows>0){
  echo "
  <h3>DANH SÁCH NHÂN VIÊN</h3><br>
  <div class = 'them' >
  <a style='float:right;'  href ='/webbanhang/Admin/code/nhanvien_them.php'><button type='' name ='them' style='background-color:#2f84a0;' class='btn btn-primary'>Thêm</button></a>
  </div>
  <table class='table'>
    <thead class='thead'>
      <tr>
      <th> Mã NV </th>
      <th>Tên NV</th>
      <th>Tên TK</th>
      <th>Chức vụ</th>
      <th>Địa chỉ</th>
      <th>Số điện thoại</th>
      <th >Xóa</th>
      </tr>
    </thead>";
  $STT = 0;
  while($row = $result->fetch_assoc()){
    $matk = $row['TK_Ma'];
    $manv = $row['MSNV'];
	$tennv = $row['HoTenNV'];
    $tentk = $row['TK_TenDangNhap'];
    $chucvu = $row['ChucVu'];
    $diachi = $row['DiaChi'];
    $sdt = $row['SoDienThoai'];
    echo "<tbody>
            <tr>
            <td>$manv</td>
            <td>$tennv</td>
            <td>$tentk</td>
            <td>$chucvu</td>
            <td>$diachi</td>
            <td>$sdt</td>
            <td><a href='/webbanhang/Admin/code/delete.php?TK_Ma=$matk'><i class='fas fa-trash-alt'></i></a></td>
            </tr>
          </tbody>";

  }
echo " </table>";
}
?>

   
 