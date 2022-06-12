<?php session_start(); ?>
<?php
   include("phanquyen.php");
    $sodon = $_GET['SoDonDH'];
    $trangthai = $_GET['TrangThaiDH'];

    include('connect.php');
    //b2 sql
    if($trangthai == 'Chưa xác nhận'){
        $sql="DELETE FROM chitietdathang where SoDonDH ='".$sodon."'";
        $conn->query($sql);
        $sql1="DELETE FROM dathang where SoDonDH ='".$sodon."'";
        $result= $conn->query($sql1);
        
       
    }
    header('location:http://localhost/webbanhang/Admin/index_tc.php');
    //dong ket noi
    $conn->close();    

   // if()

?>