<div class="alert alert-primary mt-3 text-center" role="alert">
  <h3>DANH SÁCH SẢN PHẨM</h3>
</div>
<div>
    <a href="index.php?nc=themsp">
        <button class="btn btn-success mr-4 mb-2">Thêm mới</button>
    </a>
</div>
<div class="table-responsive">
    <table id="example" class="table table-bordered table-hover" cellspacing="0">
        <thead>
            <tr class="bg-primary text-center">
                <th style="width: 50px;">STT</th>
                <th style="width: 250px;">Tên sản phẩm</th>
                <th style="width: 250px;">Đơn giá</th>
                <th style="width: 250px;">Hình ảnh</th>
                <th style="width: 250px;">Sửa</th>
                <th style="width: 250px;">Xóa</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $con = mysqli_connect('localhost', 'root', '', 'linhkienmaytinh');
        mysqli_set_charset($con, 'utf8');
        $sql_table_hsx = "SELECT * FROM tbl_dmsp order by MaSP DESC";
        $kq = mysqli_query($con, $sql_table_hsx);
        $i = 1;
        while ($row = mysqli_fetch_assoc($kq)) {
            ?>
            <tr>
                <td class="text-center"><?php echo $i; ?></td>
                <td><?php echo $row['TenSP']; ?></td>
                <td><?php echo number_format($row['DonGia']); ?></td>
                <td class='p-2 text-center'><img src="../<?php echo $row['HinhAnh']; ?>" style="width:50px;"></td>
                <td style="vertical-align: middle; text-align: center;">
                    <a href="index.php?nc=suasp&id=<?php echo $row['ID']; ?>">
                        <button class="btn btn-primary">Sửa</button>
                    </a>
                </td>
                <td style="vertical-align: middle; text-align: center;">
                    <a onclick="return confirm('Bạn có chắc là muốn xóa sản phẩm này không?');" href="index.php?nc=nhapsp&action=delete&id=<?php echo $row['ID']; ?>">
                        <button class="btn btn-secondary">Xóa</button>
                    </a>
                </td>
                <?php require('xulynhapsp.php');?>            
            </tr>
        <?php
            $i++;
        }
        ?>
        </tbody>
    </table>
    </div>   
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
