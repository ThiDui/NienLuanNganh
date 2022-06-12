
<?php
if (!isset($_SESSION['MSNV'])) {
	// Nếu người dùng chưa đăng nhập thì chuyển hướng website sang trang đăng nhập
	header('Location: Location:/webbanhang/Admin/index.php');
}else {

	
      
	if (isset($_SESSION['ChucVu'])) {
		// Ngược lại nếu đã đăng nhập
		$chucvu = $_SESSION['ChucVu'];
       
		// Kiểm tra quyền của người đó có phải là admin hay không
		if ($chucvu == 'Nhân viên') {
			// Nếu không phải admin thì xuất thông báo
			echo "<center><h1>Bạn không đủ quyền truy cập vào trang này<br></h1>
			<a href='http://localhost/webbanhang/Admin/index_tc.php'> Click để về lại trang chủ</a></center>";
			exit();
		}
	}
}
?>
