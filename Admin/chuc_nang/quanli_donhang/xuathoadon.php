<!DOCTYPE html>
<html>

<head>
    <title>in hóa đơn</title>
    <link rel="stylesheet" type="text/css" href="../Admin/css/hoadon.css">
</head>

<body onload="window.print();">
    <div id="page" class="page">
        <div class="row header">
            <div class="logo col-5"><img src="../images/logoxe.jpg" class="img-fluid" /></div>
            <div class="company text-center col-7">
                <p><b>CỬA HÀNG BÁN LINH KIỆN MÁY TÍNH</b></p>
                <span>Địa chỉ: 31 Phạm Như Xương, quận Liên Chiểu, thành phố Đà Nẵng</span><br>
                <span>ĐT: 0779925153</span><br>
                <span>Email: tuango.472000@gmail.com</span><br>
            </div>
        </div>
        <hr />
        <div class="text-center">
            <h4>HÓA ĐƠN THANH TOÁN</h4>
            <span class="text-right">Số: <?php 
            if(isset($_GET['mahd'])){
            $mahd = $_GET['mahd'];
            echo $mahd;} ?></span><br />
        </div>
        <div style="float: right;">
            <span>Đà Nẵng,</span>
            <?php
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $date = getdate();
            echo " Ngày " . $date['mday'] . ",<span>";
            echo " Tháng " . $date['mon'] . ",<span>";
            echo " Năm " . $date['year'] . "<span style='margin-left:5px'>";
            ?>
        </div>
        <br />
        <br />
        <?php
        require('../../../connect/connect.php');
        if(isset($_GET['mahd'])){
        $mahd = $_GET['mahd'];
        $sql = mysqli_query($con, "SELECT * FROM tbl_hoadonchitiet WHERE MaHD = '$mahd'");
        $result = mysqli_query($con, "SELECT * FROM tbl_hoadon where MaHD = '$mahd'");
        $array = mysqli_fetch_array($result);
        }
        ?>
        <div class="col-12">
            <p>Họ và tên khách hàng : <b><?php echo $array['HoTen']; ?></b></p>
            <p>Điện thoại KH : <b><?php echo $array['SDT']; ?></b></p>
            <p>Email KH : <b><?php echo $array['Email']; ?></b></p>
            <p>Địa chỉ KH : <b><?php echo $array['DiaChiNhan']; ?></b></p>
            <p>Ngày đặt hàng : <b><?php echo $array['NgayDatHang']; ?></b></p>
        </div>

        <div class="col-12">
            <table class="mb-3 table table-bordered table-hover">
                <tr class="bg-info">
                    <th class="p-2 text-center">STT</th>
                    <th class="p-2 text-center">Tên sản phẩm</th>
                    <th class="p-2 text-center">Số lượng</th>
                    <th class="p-2 text-center">Giá</th>
                    <th class="p-2 text-center">Thành tiền</th>
                    <th class="p-2 text-center">Phương thức thanh toán</th>
                </tr>
                <?php
                $pos = 1;
                $tongsotien = 0;
                if ($sql) {
                    while ($row = mysqli_fetch_array($sql)) {
                        $tongsotien += $row['SoLuong'] * $row['Gia'];
                        ?>
                        <tr>
                            <td class="p-2"><?php echo $pos++; ?></td>
                            <td class="p-2"><?php echo $row['TenSP']; ?></td>
                            <td class="p-2 text-center"><?php echo $row['SoLuong']; ?></td>
                            <td class="p-2 text-center"><?php echo number_format($row['Gia'], 0, ",", "."); ?>đ</td>
                            <td class="p-2 text-center"><?php echo number_format(($row['SoLuong'] * $row['Gia']), 0, ",", "."); ?></td>
                            <td class="p-2 text-center"><?php if ($row['PTTT'] == 1) {
                                                                    echo "Qua bưu điện";
                                                                } else if ($row['PTTT'] == 2) {
                                                                    echo "Qua thẻ ATM";
                                                                } else {
                                                                    echo "Thanh toán trực tiếp";
                                                                }
                                                                ?></td>
                        </tr>
                <?php }
                } else {
                    echo "";
                } ?>
                <tr>
                    <td colspan="4" class="tong"><b>Tổng cộng</b></td>
                    <td class="p-2 text-center"><b><?php echo number_format(($tongsotien), 0, ",", ".") ?>đ</b></td>
                    <td></td>
                </tr>
            </table>
        </div>

        <div class="footer-left">
            <p class="mb-5">Người mua</p>
            <b><?php echo $array['HoTen']; ?></b>
        </div>
        <div class="footer-right">
            <p>Người bán</p>
        </div>
    </div>
</body>

</html>