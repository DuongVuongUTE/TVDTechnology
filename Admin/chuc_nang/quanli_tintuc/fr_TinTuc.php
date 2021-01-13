<div class="text-center"><h2><b>NHẬP TIN TỨC</b></h2></div>
<form action="" method="post" enctype="multipart/form-data">
    <p><b>Chọn ảnh tin tức : </b></p>
    <p><input type="file" class="form-control-file border" name="txt_AnhTinTuc"></p>
    <p><b>Nhập tiêu đề tin tức : </b></p>
    <p><input type="text" name="txt_tieude" class="form-control" placeholder="Nhập tiêu đề" /></p>
    <p><b>Nhập nội dung :</b></p>
    <p><textarea id="editor1" name="txt_noidung" cols="80" rows="10"></textarea></p>
    <p><b>Trạng thái :</b></p>
    <select name="txt_trangthai" class="custom-select">
        <option value="1">Hiển thị</option>
        <option value="0">Không hiển thị</option>
    </select>
    <div class="text-center mt-4">
        <button class="btn btn-success font-weight-bold" name="btn_addtt">THÊM TIN TỨC</button>
        <?php require('xulynhaptintuc.php');?>
    </div>
    <script>
        CKEDITOR.replace('editor1');
    </script>
</form>