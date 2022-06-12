<?php
session_start();
if(isset($_GET['timkiem'])){
  $q= $_GET['tukhoa'];
  echo $q;
}

include('connect.php');
$sql="SELECT * FROM hanghoa where TenHH LIKE '%$q%'";
$result =$conn->query($sql);
while($row = $result->fetch_assoc()){
  $tenhh= $row['TenHH'];
  $ma= $row['MSHH'];
  echo "<a style='text-decoration :none;' href='/webbanhang/nguoidung/code/chitietsp.php?MSHH=$ma'>$tenhh</a></br>";
}
//Đóng kết nối
$conn->close();
?>
