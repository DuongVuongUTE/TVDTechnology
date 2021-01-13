<?php
include 'connect/connect.php';
if (isset($_SESSION['giohang'])) {
    $giohang = $_SESSION['giohang'];
    if ((isset($_POST['capnhat'])) && (count($_SESSION['giohang']) != '')) {

        $soluong_cn = $_POST['soluong'];

        foreach ($soluong_cn as $id => $sl) {
            if ($sl == 0) {
                unset($_SESSION['giohang'][$id]);
            } else if ($sl > 0 && is_numeric($sl)) {
                $_SESSION['giohang'][$id] = $sl;
            }
            "<script>Location.href= .../index.php?action=giohang; </script>";
        }
    }
}
?>

<?php
if (!isset($_SESSION['giohang']) || count($_SESSION['giohang']) == 0) {
    ?>
    <div class="container my-5">
        <h3 class="text-center">Giỏ hàng hiện đang rỗng. Bạn vui lòng mua hàng để tiếp tục xem!<h3>
                </div>
                <?php
            } else {
                ?>
                <div class="alert alert-success text-center m-1">
                    <strong>GIỎ HÀNG</strong>
                </div>
                <div class="container">
                    <form action='' method='POST'>
                        <div class="table-responsive">
                            <table class="table table-sm table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Tên sản phẩm</th>
                                        <th>Số lượng</th>
                                        <th>Giá</th>
                                        <th>Tổng</th>
                                        <th>Action</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white">
                                    <?php
                                    $total = 0;
                                    $tongsp = 0;
                                    if (isset($_SESSION['giohang'])) {
                                        echo '<form action="update-cart.php" method="POST">';
                                        foreach ($giohang as $id => $ls) {
                                            $row_show = mysqli_fetch_row(mysqli_query($con, "SELECT * FROM tbl_dmsp WHERE id in ('$id')"));
                                            $row_hidden = mysqli_fetch_array(mysqli_query($con, "SELECT (SoLuong - SoLuongBan) ToTal FROM tbl_dmsp WHERE ID in ('$id')"));
                                            $ls = $_SESSION['giohang'][$id];
                                            ?>
                                        <input type="hidden" value="<?php echo $row_hidden['ToTal']; ?>" id="sl_kt" />

                                        <tr>
                                            <td><a href="index.php?action=chitiet&id=<?php echo $row_show[0] ?>"><?php echo $row_show[2]; ?></a></td>
                                            <td class="text-center"><?php echo '<input type="number" id="sl" min="1" max="20" value="' . $ls . '" name="soluong[' . $id . ']"/>'; ?></td>
                                            <td><?php echo number_format($row_show[4], 0); ?><input type="hidden" value="<?php echo $id ?>" name="id"/></td>
                                            <td><?php echo number_format($row_show[4] * $ls); ?></td>
                                            <td class="text-center"><button type="submit" name="capnhat" class="btn btn-danger">Cập nhật</button></td>
                                            <td class="text-center"><a href="add.php?action=delete&id=<?php echo $id ?>"><span class="text-danger">Xóa</span></a></td>
                                        </tr>

                        <!--                                        <script language='javascript'>
                                                                    $(function () {
                                                                        var sl = $('#sl').val();
                                                                        var slkt = $('#sl_kt').val();
                                                                        if (sl > slkt) {
                                                                            alert("Sản phẩm không đủ cho sự lựa chọn của bạn!");
                                                                            $('#sl').val(slkt);
                                                                        }
                                                                    });
                                                                </script>-->
                                        <?php
                                        $total = $total + ($row_show[4] * $ls);
                                        $tongsp = $tongsp + $ls;
                                        ?>

                                        <?php
                                    }
                                    echo '</form>';
                                }
                                ?>
                                <tr>
                                    <td colspan="3" class="text-right">Tổng cộng</td>
                                    <td colspan="3"><?php echo number_format($total); ?></td>
                                </tr>
                                <tr>
                                    <td colspan="6" class="text-center">
                                        <a href="index.php?action=thanhtoan">
                                            <input type="button" class="btn btn-success btn-block" value="Thanh toán">
                                        </a>
                                    </td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            <?php } ?>