<?php
session_start();
?>

<?php
include('connect.php');

$sql = "SELECT MaLoaiHang, TenLoaiHang FROM loaihanghoa";
$result = $conn->query($sql);
if($result->num_rows>0){
  echo "
  <h3>LOẠI SẢN PHẨM</h3><br>
  <div class = 'them' >
  <a style='float:right;'  href ='/webbanhang/Admin/code/loaisp_them.php'><button type='' name ='them' style='background-color:#2f84a0;' class='btn btn-primary'>Thêm</button></a>
  </div>
  <table class='table'>
    <thead class='thead'>
      <tr>
        <th>STT</th>
        <th>Mã loại hàng</th>
        <th>Tên loại hàng</th>
        <th colspan='2'>Tùy chọn</th>
      </tr>
    </thead>";
  $STT = 0;
  while($row = $result->fetch_assoc()){
    $maloai = $row['MaLoaiHang'];
		$tenloai = $row['TenLoaiHang'];

        $STT++;
    echo "<tbody>
            <tr>
            <td>$STT</td>
            <td>$maloai</td>
            <td>$tenloai</td>
            <td><a href='/webbanhang/Admin/code/loaisp_update.php?MaLoaiHang=$maloai&TenLoaiHang=$tenloai'><i class='fas fa-pen'></i></a> </td>
            <td><a href='/webbanhang/Admin/code/delete.php?MaLoaiHang=$maloai'><i class='fas fa-trash-alt'></i></a></td>
            </tr>
          </tbody>";

  }
echo " </table>";
}
?>

   
 