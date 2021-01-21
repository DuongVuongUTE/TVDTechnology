<meta charset="utf-8" />
<?php
require("../connect/connect.php");
$id = $_GET['id'];
$sql_1 = "select * from tbl_hangsx where IDHang = '$id'";
$row_1 = mysqli_query($con, $sql_1);
$count = mysqli_num_rows($row_1);
if ($count > 0) {
    $nhaphsx = mysqli_fetch_array($row_1);
}
?>
<div class="row">
    <div class="col-12">
        <div class="alert alert-primary mt-3 text-center" role="alert">
            <h3>CHỨC NĂNG SỬA HÃNG SẢN XUẤT</h3>
        </div>
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="txt_id" value="<?php echo $nhaphsx['IDHang']; ?>" />
            <div class="form-group">
                <label>Tên hãng:</label>
                <input type="text" class="form-control" name="txt_TenHang" value="<?php echo $nhaphsx['TenHang']; ?>">
            </div>
            <div class="form-group">
                <label>Nước:</label>
                <input type="text" class="form-control" name="txt_Nuoc" value="<?php echo $nhaphsx['Nuoc']; ?>">
            </div>
            <div class="form-group">
                <label>Trạng thái:</label>
                <select name="txt_TrangThai" class="form-control">
                    <option value="1">Hiển thị</option>
                    <option value="0">Không hiển thị</option>
                </select>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary w-50 mb-5" name="btn_SuaHSX">Sửa HSX</button>
                <?php require('xulynhaphsx.php'); ?>
            </div>

        </form>
    </div>
</div>