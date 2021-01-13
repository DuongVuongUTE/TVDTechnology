<div class="alert alert-danger text-center m-1 mb-3">
    <h3><b>DANH SÁCH ĐƠN HÀNG ĐÃ ĐẶT<b>
                <h3>
</div>
<div class="container bg-white">
    <div class="row">
        <table class="table table-striped table-bordered table-hover" cellspacing="0">
            <thead>
                <tr class="bg-primary">
                    <th>STT</th>
                    <th>Mã HĐ</th>
                    <th>Tên khách hàng</th>
                    <th>Ngày đặt hàng</th>
                    <th>Trạng thái</th>
                    <th>Chi tiết</th>
                    <th>Hủy</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require("./connect/connect.php");
                $user_kh = $_SESSION['tendn'];
                $sql_select_user = "select * from tbl_member where User = '$user_kh' ";
                $query_kh = mysqli_query($con, $sql_select_user);
                $row_kh = mysqli_fetch_array($query_kh);
                $sql = "select * from tbl_hoadon where IDKH = '" . $row_kh['ID'] . "'";
                $query = mysqli_query($con, $sql);
                $i = 1;
                while ($row = mysqli_fetch_assoc($query)) { ?>
                    <tr>
                        <td class='p-3'><?php echo $i; ?></td>
                        <td class='p-3'><?php echo $row['MaHD']; ?></td>
                        <td class='p-3'><?php echo $row['HoTen']; ?></td>
                        <td class='p-3'><?php echo $row['NgayDatHang']; ?></td>
                        <td class='p-3'>
                            <?php
                            if ($row['TrangThai'] == 0) {
                                echo "Chưa xác nhận";
                            }
                            if ($row['TrangThai'] == 1) {
                                echo "Đã xác nhận";
                            }
                            if ($row['TrangThai'] == 2) {
                                echo "Đang giao hàng";
                            }
                            if ($row['TrangThai'] == 3) {
                                echo "Đã gửi";
                            }
                            if ($row['TrangThai'] == 4) {
                                echo "Hoàn tất";
                            }
                            if ($row['TrangThai'] == 5) {
                                echo "Đã hủy";
                            } ?>
                        </td>
                        <td class='p-3'><a href="index.php?action=chitietdh&mahd=<?php echo $row['MaHD']; ?>">Chi tiết</a></td>
                        <?php
                        if ($row['TrangThai'] < 2) { ?>
                            <td style="vertical-align: middle; text-align: center;">
                                <a onclick="return confirm('Bạn có chắc là muốn hủy đơn hàng này không?');" href="index.php?action=huydh&mahd=<?php echo $row['MaHD']; ?>">
                                    <button class="btn btn-danger">Hủy</button>
                                </a>
                            </td>

                        <?php } else {?>
                            <td style="vertical-align: middle; text-align: center;">
                                <a onclick="return alert('Bạn không thể hủy đơn hàng này. Do đơn hàng đang trong quá trình vận chuyển hoặc bạn đã nhận nó rồi!');">
                                    <button class="btn btn-danger">Hủy</button>
                                </a>
                            </td>
                        <?php } ?>
                    <tr>
                    <?php
                    $i++;
                }

                    ?>
            </tbody>
        </table>
    </div>
</div>