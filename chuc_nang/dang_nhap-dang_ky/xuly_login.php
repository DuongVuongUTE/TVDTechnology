

<!-- ----------------------- -->
<meta charset="utf-8" />
<?php
//Gọi file connection.php ở bài trước
require_once("connect/connect.php");
// Kiểm tra nếu người dùng đã ân nút đăng nhập thì mới xử lý
if (isset($_POST['btn_dangnhap'])) {
    $username = $_POST["txt_tendn"];
    $password = $_POST["txt_pass"];
    if ($username == "" || $password == "") {
        echo "Vui lòng nhập đầy đủ thông tin!";
    } else {
        $pass = md5($password);
        $sql = "select * from tbl_member where User = '$username' and PassWord = '$pass' ";
        $query = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($query);
        if ($num_rows > 0) {
            $_SESSION['tendn'] = $username;
            echo "<script> alert('Đăng nhập thành công!')</script>";
            echo "<script> window.location = 'index.php';</script>";
            
        } else {
            echo "<script>
				alert('Tên đăng nhập hoặc mật khẩu không đúng');
				window.location('../index.php');
				</script>";
        }
    }
}
?>