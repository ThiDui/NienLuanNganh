<?php 
session_start();
include("connect.php");
include("function.php");
?>

<?php
if(isset($_SESSION['MSKH'])){
    $makh = $_SESSION['MSKH'];
  //  echo $makh;
    
}
?>

<?php
if(isset($_POST['muahang'])){

$madiachi=$_POST['diachi'];
$tonghd=$_POST['tonghd'];
$sp = $_POST['masp'];

  /////////////insert don hang - Tao don hang//////
$sql="INSERT INTO dathang ( SoDonDH, MSKH, NGAYDH, NGAYGH, MaDC, TongHĐ, TrangThaiDH)
            VALUES ('','$makh',curdate(),curdate()+3,'$madiachi','$tonghd','Chưa xác nhận')";
  //$conn->query($sql);
      if ($conn->query($sql) === TRUE) {
        //lay id mới them vao
        $last_id = $conn->insert_id;
  
        foreach( $sp as $VALUE ){
            $masp = $VALUE;
            $sql1 = "SELECT * FROM giohang where MAHH = '$masp'";
            $result1 = $conn->query($sql1);
                 if($result1->num_rows>0){
                    
                    while($row = $result1->fetch_assoc()){

                          $gia = $row['GiaSP'];
                          $soluong = $row['SOLUONG'];
                          $sotien = $gia * $soluong;
                          $sql2="INSERT INTO chitietdathang(SoDonDH, MSHH, SoLuong, GiaDatHang, ThanhTien)
                                    VALUES ('$last_id','$masp', '$soluong', '$gia', '$sotien')";
                         $conn->query($sql2);
                         //$conn->close();
                         //cap nhat lai so luong sau khi dat hang
                         $sql3="CALL Updatesoluong('$masp','$soluong') ";
                          $conn-> query($sql3);

                          //xoa san pham khoi gio hang
                          $sql4="DELETE FROM giohang where MAHH ='".$masp."'";
                          $conn-> query($sql4);
                    }
                    
                    

                     }
       
        }
        header("Location:dathangthanhcong.php?SoDonHD=$last_id");
            
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
  
//echo $diachi;
//echo $tonghd;
//var_dump($sp);
//var_dump($sl);

}
?>