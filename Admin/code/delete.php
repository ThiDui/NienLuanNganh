<?php
// Start the session
session_start();
?>

<?php
include("phanquyen.php");
 include('connect.php'); ?>
<?php
        //loai san pham
if(isset($_GET['MaLoaiHang'])){


        $ma = $_GET['MaLoaiHang'];
        //b1 tao kn

        //b2 sql
        $sql="DELETE FROM loaihanghoa where MaLoaiHang ='".$ma."'";
        $result= $conn->query($sql);

        header("location:/webbanhang/Admin/index_tc.php?act=loaisp");
        //dong ket noi
        $conn->close();
}


            // san pham
if(isset($_GET['MSHH'])){


        $masp = $_GET['MSHH'];

        //b2 sql
        $sql="DELETE FROM hanghoa where MSHH ='".$masp."'";
        $result= $conn->query($sql);

        header("location:/webbanhang/Admin/index_tc.php?act=sanpham");
        //dong ket noi
        $conn->close();
}

// hình ảnh sản phẩm 
if(isset($_GET['MaHinh'])){
        $mahinh = $_GET['MaHinh'];
        
        $sql="DELETE FROM hinhhanghoa where MaHinh ='".$mahinh."'";
        $result= $conn->query($sql);

        header("location:/webbanhang/Admin/index_tc.php?act=sanpham_img");
        //dong ket noi
        $conn->close();
}

//xóa nhân viên
if(isset($_GET['TK_Ma'])){
        $matk = $_GET['TK_Ma'];
        //b2 sql
        $sql="DELETE FROM taikhoan where TK_Ma ='".$matk."'";
        $result= $conn->query($sql);

        $sql="DELETE FROM nhanvien where TK_Ma ='".$matk."'";
        $result= $conn->query($sql);

        header('location:/webbanhang/Admin/index_tc.php?act=nhanvien');
        //dong ket noi
        $conn->close();
}


?>