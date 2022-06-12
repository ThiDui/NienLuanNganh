
<?php
// Start the session
session_start();
?>

<?php include('connect.php'); ?>
<?php
            // san pham
if(isset($_GET['MAHH'])){


        $masp = $_GET['MAHH'];

        //b2 sql
        $sql="DELETE FROM giohang where MAHH ='".$masp."'";
        $result= $conn->query($sql);

        header("location:/webbanhang/nguoidung/code/giohang.php");
        //dong ket noi
        $conn->close();
}
?>