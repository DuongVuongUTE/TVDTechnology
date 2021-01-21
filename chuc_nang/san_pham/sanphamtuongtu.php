<div class="container">
    <div class="row">
        <?php
        require('connect/connect.php');
        $sql_sptt = "SELECT * FROM tbl_dmsp WHERE IDLoai = '" . $row['IDLoai'] . "' limit 4";
        $query1 = mysqli_query($con, $sql_sptt);
        if (mysqli_num_rows($query1) > 0) {
            while ($row2 = mysqli_fetch_array($query1)) { ?>
                <!-- Bắt đầu col-md-3-->
                <div class="col-md-3 col-12 my-2">
                    <div class="card sp h-100">
                        <div class="card-body">
                            <form method="post" action="add.php?id=<?php echo $row2["ID"]; ?>">
                                <img class="card-img-top thumb" src="<?php echo $row2['HinhAnh'] ?>" style="height: 213px;">
                                <h6 class="card-title" style="height: 75px;"><?php echo $row2['TenSP'] ?></h6>
                                <p class="card-text" style="font-size: 18px; font-weight: bold; color: red;">Giá: <?php echo number_format($row2['DonGia']) ?> đ</p>
                                <!-- <input type='submit' name='btn_dathang' class="btn btn-outline-secondary p-1 btn-muangay" value='Mua ngay'/> -->
                                <?php
                                        $dem = $row2['SoLuong'] - $row2['SoLuongBan'];
                                        if ($dem > 0) {
                                            echo "<input type='submit' name='btn_dathang' class='btn btn-outline-secondary p-1 btn-muangay' value='Mua ngay'/>";
                                        } else {
                                            echo "<input type='button' class='btn btn-outline-secondary p-1 btn-hethang' value='Hết hàng'/>";
                                        }
                                        ?>
                                <?php
                                        echo "<a href='./index.php?action=chitiet&id=" . $row2['ID'] . "' class='btn btn-outline-secondary p-1 btn-chitiet float-right'>Chi tiết</a>";
                                        ?>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Kết thúc col-md-3 -->
        <?php
            }
        }
        ?>
    </div>
</div>