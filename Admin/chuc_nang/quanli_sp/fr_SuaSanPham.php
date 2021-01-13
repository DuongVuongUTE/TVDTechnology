<meta charset="utf-8" />
<?php
require("../connect/connect.php");
$id = $_GET['id'];
$sql_1 = "select * from tbl_dmsp where ID = '$id'";
$row_1 = mysqli_query($con, $sql_1);
$count = mysqli_num_rows($row_1);
if ($count > 0) {
    $nhapsp = mysqli_fetch_array($row_1);
}
?>
<div class="row">
    <div class="col-12">
        <div class="alert alert-primary mt-3 text-center" role="alert">
            <h3>CHỨC NĂNG SỬA SẢN PHẨM</h3>
        </div>
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="txt_id" value="<?php echo $nhapsp['ID']; ?>" />
            <div class="form-group">
                <label>Mã sản phẩm:</label>
                <input type="text" class="form-control" readonly placeholder="Enter email" name="txt_MaSP" value="<?php echo $nhapsp['MaSP']; ?>">
            </div>
            <div class="form-group">
                <label>Tên sản phẩm:</label>
                <input type="text" class="form-control" placeholder="Enter password" name="txt_TenSP" value="<?php echo $nhapsp['TenSP']; ?>">
            </div>
            <div class="form-group">
                <label>Chi tiết sản phẩm:</label>
                <textarea id="editor1" name="txt_diengiai" cols="80" rows="10"><?php echo $nhapsp['DienGiai']; ?></textarea>
            </div>
            <div class="form-group">
                <label>Giá sản phẩm:</label>
                <input type="text" class="form-control" placeholder="Enter password" name="txt_DonGia" value="<?php echo $nhapsp['DonGia']; ?>">
            </div>
            <div class="form-group">
                <label>Số lượng:</label>
                <input type="text" class="form-control" placeholder="Enter email" name="txt_SoLuong" value="<?php echo $nhapsp['SoLuong']; ?>">
            </div>
            <div class="form-group">
                <label>Ảnh minh họa:</label>
                <input type="file" class="form-control-file border" name="txt_HinhAnh" value="<?php echo $nhapsp['HinhAnh']; ?>">
            </div>
            <div class="form-group">
                <label>Hãng sản xuất:</label>
                <?php
                $sql = "select distinct * from tbl_hangsx";
                $loaisp = mysqli_query($con, $sql);
                ?>
                <select name="txt_IDHSX" class="form-control">
                    <option>Chọn hãng sản xuất</option>
                    <?php
                    while ($row = mysqli_fetch_array($loaisp)) {
                        echo "<option value=" . $row['IDHang'] . ">" . $row['TenHang'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label>Loại sản phẩm:</label>
                <?php
                $sql = "select distinct * from tbl_dmloai";
                $loaisp = mysqli_query($con, $sql);
                ?>
                <select name="txt_IDChungLoai" class="form-control">
                    <option>Chọn loại sản phẩm</option>
                    <?php
                    while ($row = mysqli_fetch_array($loaisp)) {
                        echo "<option value=" . $row['IDLoai'] . ">" . $row['TenLoai'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label>Trạng thái:</label>
                <select name="txt_trangthai" class="form-control">
                    <option value="1">Hiển thị</option>
                    <option value="0">Không hiển thị</option>
                </select>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary w-50 mb-5" name="btn_SuaSP">Sửa sản phẩm</button>
            </div>
            <?php require('xulynhapsp.php'); ?>
        </form>
    </div>
</div>
<script>
    CKEDITOR.replace('editor1');
</script>