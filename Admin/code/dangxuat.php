<?php
	session_start();

	unset($_SESSION['MSNV']);
	header("location:/webbanhang/Admin/index.php");
?>