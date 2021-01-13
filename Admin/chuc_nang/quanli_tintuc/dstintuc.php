<div class="alert alert-primary mt-3 text-center" role="alert">
    <h3>DANH SÁCH TIN TỨC</h3>
</div>
<div>
    <a href="index.php?nc=themtt">
        <button class="btn btn-success mb-2">Thêm mới</button>
    </a>
</div>
<table id="example" class="table table-striped table-bordered table-responsive table-responsive-md" cellspacing="0"">
    <thead>
        <tr class=" text-center justify-content-center bg-primary">
    <th class="align-middle">STT</th>
    <th class="align-middle">Ngày nhập</th>
    <th class="align-middle">Tiêu đề</th>
    <th class="align-middle">Nội dung</th>
    <th class="align-middle">Trạng thái</th>
    <th class="align-middle" colspan="2">Quản trị</th>
    </tr>
    </thead>
    <tbody>
        <?php
        $con = mysqli_connect('localhost', 'root', '', 'linhkienmaytinh');
        mysqli_set_charset($con, 'utf8');
        $sql_tintuc = mysqli_query($con, "select * from tbl_tintuc");
        $i = 1;
        while ($row_qt = mysqli_fetch_array($sql_tintuc)) {
            if ($row_qt['TrangThai'] == 1) {
                $tt = "Hiển thị";
            } else {
                $tt = "Không hiển thị";
            }
            ?>
            <tr>
                <td style="vertical-align: middle; text-align: center;"><?php echo $i; ?></td>
                <td style="vertical-align: middle;"><?php echo $row_qt['NgayNhap']; ?></td>
                <td style="vertical-align: middle;"><?php echo $row_qt['TieuDe']; ?></td>
                <td style="vertical-align: middle; text-align: center;"><?php echo '...'; ?></td>
                <td style="vertical-align: middle;"><?php echo $tt; ?></td>
                <td style="vertical-align: middle; text-align: center;">
                    <a href="index.php?nc=view_suatt&matt=<?php echo $row_qt['MaTT']; ?>">
                        <button class="btn btn-primary">Sửa</button>
                    </a>
                </td>
                <td style="vertical-align: middle; text-align: center;">
                    <a onclick="return confirm('Bạn có chắc là muốn xóa tin tức này không?');" href="index.php?nc=tintuc&action=delete&matt=<?php echo $row_qt['MaTT']; ?>">
                        <button class="btn btn-secondary">Xóa</button>
                    </a>
                    <?php require('xulynhaptintuc.php'); ?>
                </td>
            </tr>
        <?php
            $i++;
        }
        ?>
    </tbody>
</table>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>