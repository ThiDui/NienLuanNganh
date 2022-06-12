<?php
session_start();
?>
<?php
include('connect.php');

$sql = "SELECT * FROM hinhhanghoa";
$result = $conn->query($sql);
if($result->num_rows>0){
  echo "
  <h3>HÌNH ẢNH SẢN PHẨM</h3>
  <div class = 'them' >
  <a style='float:right;'  href ='/webbanhang/Admin/code/sanpham_img_them.php'><button type='' name ='them' style='background-color:#2f84a0;' class='btn btn-primary'>Thêm</button></a>
  </div>
  <table class='table'>
    <thead class='thead'>
      <tr>
        <th>STT</th>
        <th>Mã hình</th>
        <th>Hình ảnh </th>
        <th>Mã hàng</th>
        
        <th>Xóa</th>
      </tr>
    </thead>";
  $STT = 0;
  while($row = $result->fetch_assoc()){
        $maimg = $row['MaHinh'];
        $tenimg = $row['TenHinh'];
		$mshh = $row['MSHH'];
        
        $STT++;
    echo "<tbody>
            <tr>
            <td>$STT</td>
            <td>$maimg</td>
           
            <td><img src='$tenimg' alt='HTML5 Icon' style='width:200px;height:150px;'></td>
            <td>$mshh</td>
            <td><a href='/webbanhang/Admin/code/delete.php?MaHinh=$maimg'><i class='fas fa-trash-alt'></i></a></td>
            </tr>
          </tbody>";

  }
echo " </table>";
}
?>

   
 