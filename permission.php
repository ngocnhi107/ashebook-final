<?php
if (isset($_SESSION['email']) == false) {
	// Nếu người dùng chưa đăng nhập thì chuyển hướng website sang trang đăng nhập
	header('Location:/ashebook/log_in.php');
}
?>