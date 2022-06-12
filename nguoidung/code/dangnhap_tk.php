<?php 
session_start();
?>


<?php

include("connect.php");
include("../view/dangnhap.html");

if(isset($_POST['dn'])){
    $tendn = $_POST['firstname'];
    $mkdn  = $_POST['password'];
    $mk = md5($mkdn);

    //b2: cau truy van
	  $sql= "SELECT MSKH, TK_TenDangNhap, Password from khachhang kh 
            join taikhoan tk on tk.TK_Ma = kh.TK_Ma where TK_TenDangNhap= '".$tendn."' and Password ='".$mk."'";
	  $result =$conn->query($sql);
	  //b3: xl ket qua
	  if( $result->num_rows > 0){
        while($row = $result ->fetch_assoc()){
            $mskh = $row['MSKH'];
        }
         
	          $_SESSION['MSKH']= $mskh;
                
	          header("Location:/webbanhang/nguoidung/index.php");
	  }
	  else{
	      header("Location: dangnhap_tk.php");
	  }

	  //b4: dong noi ket
	  $conn->close();
}

?>