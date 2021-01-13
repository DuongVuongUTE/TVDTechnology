<?php
require("../connect/connect.php");
?>
<div class="row">
  <div class="col-12">
    <form action="" method="POST" enctype="multipart/form-data">
      <h3 class="text-center">CHỨC NĂNG THÊM SẢN PHẨM</h3>
      <div class="form-group">
        <label>Tên sản phẩm:</label>
        <input type="text" class="form-control" name="txt_TenSP">
      </div>
      <div class="form-group">
        <label>Chi tiết sản phẩm:</label>
        <textarea id="editor1" name="txt_diengiai" cols="80" rows="10"></textarea>
      </div>
      <div class="form-group">
        <label>Giá sản phẩm:</label>
        <input type="text" class="form-control" name="txt_DonGia">
      </div>
      <div class="form-group">
        <label>Số lượng:</label>
        <input type="text" class="form-control" name="txt_SoLuong">
      </div>
      <div class="form-group">
        <label>Ảnh minh họa:</label>
        <input type="file" class="form-control-file border" name="txt_HinhDaiDien">
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
        <button type="submit" class="btn btn-success w-50 mb-5" name="btn_them">Thêm sản phẩm</button>
      </div>
      <?php require('xulynhapsp.php'); ?>
    </form>
  </div>
</div>
<script>
        CKEDITOR.replace('editor1');
    </script>