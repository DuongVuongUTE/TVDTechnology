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
    <h3>DANH SÁCH ĐƠN HÀNG</h3>
</div>
    <table id="example" class="table table-striped table-bordered" cellspacing="0">
        <thead>
            <tr class="bg-primary">
                <th>STT</th>
                <th>Mã HĐ</th>
                <th>Tên khách hàng</th>
                <th>Ngày đặt hàng</th>
                <th>Trạng thái</th>
                <th>Xác nhận</th>
                <th>Chi tiết</th>
                <th>Xóa hóa đơn</th>
            </tr>
        </thead>
        <body>
        <?php
                require("../connect/connect.php"); 
                $sql="select * from tbl_hoadon";  
                $query = mysqli_query($con,$sql);
                $i=1;
                    while ($row = mysqli_fetch_assoc($query)){?>
                    <tr>
                        <td class='p-3'><?php echo $i;?></td>
                        <td class='p-3'><?php echo $row ['MaHD'];?></td>
                        <td class='p-3'><?php echo $row ['HoTen'];?></td>
                        <td class='p-3'><?php echo $row ['NgayDatHang'];?></td>
                        <td class='p-3'>
                            <?php 
                                if($row ['TrangThai'] == 0){
                                    echo "Chưa xác nhận";
                                }if($row ['TrangThai'] == 1){
                                    echo "Đã xác nhận";
                                }if($row ['TrangThai'] == 2){
                                    echo "Đang giao hàng";
                                }if($row ['TrangThai'] == 3){
                                    echo "Đã gửi";
                                }if($row ['TrangThai'] == 4){
                                    echo "Hoàn tất";
                                }if($row ['TrangThai'] == 5){
                                    echo "Đã hủy";
                                }

                            ?>
                        </td>
                        <td class='p-3'><a href="index.php?nc=xacnhan&mahd=<?php echo $row['MaHD'];?>">Xong</a></td>
                        <td class='p-3'><a href="index.php?nc=chitietdh&mahd=<?php echo $row['MaHD'];?>">Chi tiết</a></td>
                        <td style="vertical-align: middle; text-align: center;">
                            <a onclick="return confirm('Bạn có chắc là muốn xóa hóa đơn này không?');"  href="index.php?nc=thongke&action=delete&id=<?php echo $row['MaHD']; ?>">
                                <button class="btn btn-secondary">Xóa</button>
                            </a>
                        <?php require('xoa_hoa_don.php');?>
                    <tr>
                    <?php
                    $i++;
                }
            
        ?>
        
        </body>
    </table>
</body>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>

</html>