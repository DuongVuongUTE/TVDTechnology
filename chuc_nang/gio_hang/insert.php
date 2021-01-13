<?php
require('./connect/connect.php');
?>
<?php
if (isset($_POST['LuuTT'])) {
        if (isset($_SESSION['giohang'])) {
                //kiểm tra nhập thông tin
                if ($_POST['txt_email'] != "" and $_POST['txt_hoten'] != "" and $_POST['txt_dienthoai'] != "" and $_POST['txt_diachinhanhang'] != "" and $_POST['phuongthuc'] != "") {
                        $idkh = $_POST['txt_idkh'];
                        $email = $_POST['txt_email'];
                        $tenkh = $_POST['txt_hoten'];
                        $dienthoai = $_POST['txt_dienthoai'];
                        $diachinhan = $_POST['txt_diachinhanhang'];
                        $phuongthuc = $_POST['phuongthuc'];
                        $ngay = date('Y-m-d');
                        if (isset($_SESSION['tendn'])) {
                                $sql = mysqli_query($con, "select * from tbl_member where User='" . $_SESSION['tendn'] . "'");
                                $row = mysqli_fetch_array($sql);
                                $idnd = $_SESSION['tendn'];
                                $sql = "INSERT INTO tbl_hoadon(MaHD, IDKH, HoTen, SDT, Email, DiaChiNhan, NgayDatHang, TrangThai) VALUES 
                (null,'$idkh', '$tenkh', '$dienthoai', '$email', '$diachinhan', '$ngay','0')";
                                mysqli_query($con, $sql);

                                $mahd = mysqli_insert_id($con);
                                foreach ($_SESSION['giohang'] as $stt => $cart) {
                                        $row_show = mysqli_fetch_row(mysqli_query($con, "SELECT * FROM tbl_dmsp WHERE id in ('$stt')"));
                                        $masp = $row_show[1];
                                        $tensp = $row_show[2];
                                        $gia = $row_show[4];
                                        $soluong = $cart;
                                        $sql1 = "INSERT INTO tbl_hoadonchitiet(MaHD, MaSP, TenSP,SoLuong,Gia,PTTT) VALUES('$mahd','$masp','$tensp',$soluong,$gia,'$phuongthuc')";
                                        mysqli_query($con, $sql1);

                                        $sql_update_SLBan = "select * from tbl_dmsp where MaSP='$masp'";
                                        $rows = mysqli_query($con, $sql_update_SLBan);
                                        $rowdm = mysqli_fetch_array($rows);
                                        $ban = $rowdm['SoLuongBan'] + $soluong;
                                        $sql2 = "UPDATE tbl_dmsp SET SoLuongBan = $ban WHERE MaSP = '$masp'";
                                        mysqli_query($con, $sql2);
                                }
                        } else { }

                        unset($_SESSION['giohang']);
                        echo "Ban da dat hang thanh cong";
                        echo "
<script language='javascript'>
        alert('Đơn hàng của bạn đã thiết lập thành công chúng tôi sẽ chuyển hàng cho bạn trong thời gian sớm nhất');
        window.open('index.php','_self',3);
</script>";
                } else echo "
                <script language='javascript'>
                        alert('Vui lòng nhập đầy đủ thông tin!');
                </script>";
        } else
                echo "Không lấy được thông tin giỏ hàng";
}
?>