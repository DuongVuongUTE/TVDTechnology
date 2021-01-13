<?php
	require("../connect/connect.php");
?>
<div class="row">
    <div class="col-12">
<form action="fr_NhapHangSX.php" method="POST" enctype="multipart/form-data">
    <h3 class="text-center">CHỨC NĂNG THÊM HÃNG SẢN XUẤT</h3>
    <div class="form-group">
      <label>Tên hãng:</label>
      <input type="text" class="form-control" name="txt_TenHang">
    </div>
    <div class="form-group">
      <label>Nước:</label>
      <input type="text" class="form-control" name="txt_Nuoc">
    </div>
    <div class="form-group">
      <label>Trạng thái:</label>
      <select name="txt_TrangThai" class="form-control">
        <option value="1">Hiển thị</option>
        <option value="0">Không hiển thị</option>
      </select>
    </div>
    <div class="text-center">
    <button type="submit" class="btn btn-primary w-50 mb-5" name="btn_themhsx">Thêm HSX</button> 
    </div>
    <?php require('xulynhaphsx.php');?>
  </form>
    </div>
</div>