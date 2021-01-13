<?php
require("../connect/connect.php");
$matt = $_GET['matt'];
$sql_show_update_tt = mysqli_fetch_array(mysqli_query($con, "select * from tbl_tintuc where MaTT = '$matt'"));
?>
<div class="alert alert-primary mt-3 text-center" role="alert">
    <h3>CHỨC NĂNG SỬA TIN TỨC</h3>
</div>
<form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="txt_matt" class="form-control" value="<?php echo $sql_show_update_tt['MaTT']; ?>" />
    <p><b>Chọn ảnh tin tức : </b></p>
    <p><input type="file" class="form-control-file border" name="txt_AnhTinTuc"></p>
    <p><b>Tiêu đề : </b></p>
    <p><input type="text" name="txt_tieude" class="form-control" placeholder="Nhập tiêu đề" value="<?php echo $sql_show_update_tt['TieuDe']; ?>" /></p>
    <p><b>Nội dung :</b></p>
    <p><textarea id="editor1" name="txt_noidung" cols="80" rows="10"><?php echo $sql_show_update_tt['NoiDungTT']; ?></textarea></p>
    <p><b>Trạng thái :</b></p>
    <select name="txt_trangthai" class="custom-select">
        <option value="1">Hiển thị</option>
        <option value="0">Không hiển thị</option>
    </select>
    <div class="text-center mt-4">
        <button class="btn btn-success font-weight-bold" name="btn_updatett">SỬA TIN TỨC</button>
        <?php require('xulynhaptintuc.php'); ?>
    </div>
    <script>
        CKEDITOR.replace('editor1');
    </script>
</form>