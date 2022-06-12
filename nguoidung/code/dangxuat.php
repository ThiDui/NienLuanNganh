<?php
	session_start();

	unset($_SESSION['MSKH']);
	header("location:/webbanhang/nguoidung/index.php");
?>