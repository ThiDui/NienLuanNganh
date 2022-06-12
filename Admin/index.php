<?php 
session_start();
?>


<?php

include("./code/connect.php");
include("./view/dangnhap.html");

if(isset($_POST['dn'])){
    $tendn = $_POST['firstname'];
    $mkdn  = $_POST['password'];
    $mk = md5($mkdn);

    //b2: cau truy van
	  $sql= "SELECT MSNV, TK_TenDangNhap,ChucVu, Password from nhanvien nv 
            join taikhoan tk on tk.TK_Ma = nv.TK_Ma where TK_TenDangNhap= '".$tendn."' and Password ='".$mk."'";
	  $result =$conn->query($sql);
	  //b3: xl ket qua
	  if( $result->num_rows > 0){
        while($row = $result ->fetch_assoc()){
            $msnv = $row['MSNV'];
			$chucvu= $row['ChucVu'];
        }
         
	          $_SESSION['MSNV']= $msnv;
			  $_SESSION['ChucVu']= $chucvu;
	          header("Location:/webbanhang/Admin/index_tc.php");
	  }
	  else{
	      header("Location: index.php");
	  }

	  //b4: dong noi ket
	  $conn->close();
}

?>