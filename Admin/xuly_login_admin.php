<meta charset="utf-8" />
<?php
	require('../connect/connect.php');
	if(isset($_POST['btn_login'])){
		$tendn = $_POST['txt_tendn'];
		$pass = $_POST['txt_pass'];
		$sql = "select * from tbl_admin where User = '$tendn' and Pass = '$pass'";
		$query = mysqli_query($con,$sql);
		$row = mysqli_num_rows($query);
		session_start();
		if($row > 0){			
			echo '<script>alert("Đăng  nhập thành công")</script>';
			$_SESSION['tendnadmin'] = $_POST['txt_tendn'];
			header("location: index.php");
		}else{
			echo '<script>alert("Đăng  nhập thất bại")</script>';
			header("location: login_admin.php");
		}		
	}
?>