<?php
session_start();
?>

<?php
include("phanquyen.php");
include('connect.php');

$sql = "SELECT * FROM lichsu";
$result = $conn->query($sql);
if($result->num_rows>0){
  echo "
  <h3>Danh sách lịch sử</h3><br>
  
  <table class='table'>
    <thead class='thead'>
      <tr>
        <th>STT</th>
        
        <th>Mã nội dung</th>
        <th>Thời gian</th>
        <th>Hàng động</th>
        <th> Mã nhân viên </th>
      </tr>
    </thead>";
  $STT = 0;
  while($row = $result->fetch_assoc()){
        $ma = $row['MSNV'];
        $mand = $row['MA_ND'];
		$time = $row['TIMESTAMP'];
        $hd = $row['HANHDONG'];
        $STT++;
    echo "<tbody>
            <tr>
            <td>$STT</td>
            <td>$mand</td>
            <td>$time</td>
            <td>$hd</td>
            <td>$ma</td>
            </tr>
          </tbody>";

  }
echo " </table>";
}
?>

   
 