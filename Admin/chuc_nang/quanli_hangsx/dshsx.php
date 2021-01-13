<div class="alert alert-primary mt-3 text-center" role="alert">
    <h3>DANH SÁCH HÃNG SẢN XUẤT</h3>
</div>
<div>
    <a href="index.php?nc=themhsx">
        <button class="btn btn-success mr-4 mb-2">Thêm mới</button>
    </a>
</div>
<div class="table-responsive">
    <table class="table table-striped table-bordered" cellspacing="0">
        <thead>
            <tr class="bg-primary">
                <th>STT</th>
                <th>Tên Hãng</th>
                <th>Nước</th>
                <th>Trạng thái</th>
                <th>Sửa</th>
                <th>Xóa</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $con = mysqli_connect('localhost', 'root', '', 'linhkienmaytinh');
            mysqli_set_charset($con, 'utf8');
            $sql_table_hsx = "SELECT * FROM tbl_hangsx order by IDHang ASC";
            $kq = mysqli_query($con, $sql_table_hsx);
            $i = 1;
            while ($row = mysqli_fetch_assoc($kq)) {
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $row['TenHang']; ?></td>
                    <td><?php echo $row['Nuoc']; ?></td>
                    <td><?php if ($row['TrangThai'] == 1) {
                                echo "Hiển thị";
                            } else {
                                echo "Không hiển thị";
                            }; ?></td>
                    <td style="vertical-align: middle; text-align: center;">
                        <a href="index_admin.php?nc=suahsx&id=<?php echo $row['IDHang']; ?>">
                            <button class="btn btn-primary">Sửa</button>
                        </a>
                    </td>
                    <td style="vertical-align: middle; text-align: center;">
                        <a onclick="return confirm('Bạn có chắc là muốn xóa hãng sản xuất này không?');" href="index_admin.php?nc=hsx&action=deletehsx&id=<?php echo $row['IDHang'];?>">
                            <button class="btn btn-secondary">Xóa</button>
                        </a>
                    </td>
                    <?php require('xulynhaphsx.php'); ?>
                </tr>
            <?php
                $i++;
            }
            ?>
        </tbody>
    </table>
</div>