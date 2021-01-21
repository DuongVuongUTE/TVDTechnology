<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/dataTables.bootstrap.min.css" rel="stylesheet" />
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap.min.js"></script>
</head>
<body>
<div class="alert alert-primary mt-3 text-center" role="alert">
    <h3>DANH SÁCH HÀNG TỒN</h3>
</div>
    <table id="example" class="table table-bordered table-responsive table-responsive-md table-hover"  cellspacing="0">
        <thead>
            <tr class="bg-primary">
                    <th>STT</th>
                    <th>Mã sản phẩm</th>
                    <th>Tên sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Số lượng nhập</th>
                    <th>Số lượng bán</th>
                    <th>Số lượng tồn</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $con = mysqli_connect('localhost', 'root', '', 'linhkienmaytinh');
            mysqli_set_charset($con, 'utf8');
            $sql_spton = "SELECT * FROM tbl_dmsp";
            $kq = mysqli_query($con, $sql_spton);
            $i=1;
            while ($row = mysqli_fetch_assoc($kq)) {
                ?>
                <tr>
                    <td class="text-center"><?php echo $i; ?></td>
                    <td><?php echo $row['MaSP']; ?></td>
                    <td><?php echo $row['TenSP']; ?></td>
                    <td class='p-2 text-center'><img src="../<?php echo $row ['HinhAnh'];?>" style="width:50px;"></td>
                    <td class="text-right"><?php echo $row['SoLuong']; ?></td>
                    <td class="text-right"><?php echo $row['SoLuongBan']; ?></td>
                    <td class="text-right"><?php echo $row['SoLuong'] - $row['SoLuongBan']; ?></td>
                </tr>
            <?php
            $i++;
            }
            ?>
        </tbody>
    </table>
</body>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>

</html>