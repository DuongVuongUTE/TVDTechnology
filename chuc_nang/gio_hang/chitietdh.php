<meta charset="utf-8" />
<?php
require("./connect/connect.php");
$mahd = $_GET['mahd'];
$sql_1 = "select * from tbl_hoadon  where MaHD = '$mahd'";
$row_1 = mysqli_query($con, $sql_1);
$count = mysqli_num_rows($row_1);
if ($count > 0) {
    $chitiet = mysqli_fetch_array($row_1);
}
?>
<div class="container bg-white p-3">
    <div class="row">
        <div class="col-md-6 col-12">
            <form action="" method="POST" enctype="multipart/form-data">
                <h3 class="text-center">THÔNG TIN HÓA ĐƠN</h3>
                <p><b>Mã hóa đơn: </b><?php echo "$mahd"; ?></p>
                <p><b>Ngày đặt hàng: </b><?php echo $chitiet['NgayDatHang']; ?></p>
                <p><b>Tên khách hàng: </b><?php echo $chitiet['HoTen']; ?></p>
                <p><b>Số điện thoại: </b><?php echo $chitiet['SDT']; ?></p>
                <p><b>Email: </b><?php echo $chitiet['Email']; ?></p>
                <p><b>Địa chỉ: </b><?php echo $chitiet['DiaChiNhan']; ?></p>
                <p><b>Trạng thái: </b><span style="color: red">
                    <?php 
                        if($chitiet ['TrangThai'] == 0){
                            echo "Chưa xác nhận";
                        }if($chitiet ['TrangThai'] == 1){
                            echo "Đã xác nhận";
                        }if($chitiet ['TrangThai'] == 2){
                            echo "Đang giao hàng";
                        }if($chitiet ['TrangThai'] == 3){
                            echo "Đã gửi";
                        }if($chitiet ['TrangThai'] == 4){
                            echo "Hoàn tất";
                        }if($chitiet ['TrangThai'] == 5){
                            echo "Đã hủy";
                        }
                    ?>
                    </span>
                </p>
            </form>
        </div>
        <div class="col-md-6 col-12">
        <h3 class="text-center">DANH SÁCH SẢN PHẨM</h3>
            <table class="table table-bordered table-hover">
                <thead class="thead-light">
                    
                    <tr>
                        <th>STT</th>
                        <th>Tên SP</th>
                        <th>Số lượng</th>
                        <th>Giá</th>
                        <th>Phương thức thanh toán</th>
                    </tr>
                </thead>
                <?php
                require("./connect/connect.php");
                $sql = "select * FROM tbl_hoadonchitiet where MaHD = '$mahd'";
                $query = mysqli_query($con, $sql);
                $total = 0;
                $tongsp = 0;
                $i = 1;
                if (mysqli_num_rows($query) > 0) {
                    while ($row = mysqli_fetch_assoc($query)) { ?>
                        <tr>
                            <td class='p-2'><?php echo $i; ?></td>
                            <td class='p-2'><?php echo $row['TenSP']; ?></td>
                            <td class='p-2'><?php echo $row['SoLuong']; ?></td>
                            <td class='p-2'><?php echo number_format($row['Gia']); ?></td>
                            <td class='p-2'><?php if ($row['PTTT'] == 1) {
                                                echo ("Thanh toán qua bưu điện");
                                            }
                                            if ($row['PTTT'] == 2) {
                                                echo ("Thanh toán qua ATM");
                                            }
                                            if ($row['PTTT'] == 3) {
                                                echo ("Thanh toán trực tiếp");
                                            }
                                            ?>
                            </td>
                        </tr>
                <?php
                        $tongsp = $tongsp + ($row['SoLuong'] * $row['Gia']);
                        $i++;
                    }
                }
                
                ?>
                <tr>
                        <td colspan="3" class="text-right">Tổng cộng</td>
                        <td colspan="2"><?php echo number_format($tongsp)." vnđ" ?></td>
                    </tr>
            </table>
        </div>
    </div>
</div>