<meta charset="utf-8" />
<?php
	require('./connect/connect.php');
	if(isset($_POST['btn_dangky'])){
		$tendn = $_POST['txt_tendn'];
		$pass = md5($_POST['txt_pass']);
		$hoten = $_POST['txt_hoten'];
		$diachi = $_POST['txt_diachi'];
		$sdt = $_POST['txt_sdt'];
		$email = $_POST['txt_email'];
		if($tendn == "" || $pass == "" || $hoten == "" || $diachi == "" || $sdt == "" || $email == ""){
			echo "
					<script language='javascript'>
							alert('Vui lòng nhâp đầy đủ thông tin!');
							window.open('index.php','_self',3);
					</script>";
		}else{
			$sql_kt = "select * from tbl_member where User = '$tendn'";
			$result_kt = mysqli_query($con, $sql_kt);
			$num_rows = mysqli_num_rows($result_kt);
			if($num_rows){
				echo "
					<script language='javascript'>
							alert('Tên đăng nhập đã tồn tại vui lòng nhập tên khác!');
							window.open('index.php','_self',3);
					</script>";
			}else{
				$sql = "INSERT INTO tbl_member(User, PassWord, HoTen, DiaChi, SDT, Email) VALUES 
				('$tendn', '$pass', '$hoten', '$diachi', '$sdt', '$email')";
				$result_insert = mysqli_query($con, $sql);
				if($result_insert){
					echo "
					<script >
							alert('Đăng ký thành công vui lòng đăng nhập để tiếp tục!');
							window.open('index.php','_self',3);
					</script>";
				}
			}	
		}	
	}
?>