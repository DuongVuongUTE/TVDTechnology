<div class="alert alert-primary mt-3 text-center" role="alert">
    <h3>DANH SÁCH TÀI KHOẢN NGƯỜI DÙNG</h3>
</div>

    <table id="example" class="table table-striped table-bordered table-responsive table-responsive-md" cellspacing="0">
        <thead>
            <tr class="bg-primary">
                    <th class="align-middle">STT</th>
                    <th class="align-middle">Tên đăng nhập</th>
                    <th class="align-middle">Họ và Tên</th>
                    <th class="align-middle">Địa chỉ</th>
                    <th class="align-middle">Số điện thoại</th>
                    <th class="align-middle">Email</th>
                    <th class="align-middle">Xóa tài khoản</th>  
            </tr>
        </thead>
        <body>
            <?php
            $con = mysqli_connect('localhost', 'root', '', 'linhkienmaytinh');
            mysqli_set_charset($con, 'utf8');
            $sql_table_member = "SELECT * FROM tbl_member order by ID ASC";
            $kq = mysqli_query($con, $sql_table_member);
            $i=1;
            while ($row = mysqli_fetch_assoc($kq)) {
                ?>
                <tr>
                    <td class="align-middle"><?php echo $i; ?></td>
                    <td class="align-middle"><?php echo $row['User']; ?></td>
                    <td class="align-middle"><?php echo $row['HoTen']; ?></td>
                    <td class="align-middle"><?php echo $row['DiaChi']; ?></td>
                    <td class="align-middle"><?php echo $row['SDT']; ?></td>
                    <td class="align-middle"><?php echo $row['Email']; ?></td>
                    <td style="vertical-align: middle; text-align: center;">
                    <a onclick="return confirm('Bạn có chắc là muốn xóa người dùng này không?');"  href="index.php?nc=taikhoan&action=delete&id=<?php echo $row['ID']; ?>">
                            <button class="btn btn-secondary">Xóa</button>
                        </a>
                    <?php require('xoa_thanh_vien.php');?>
                </tr>
            <?php
            $i++;
            }
            ?>
        </body>
    </table>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
