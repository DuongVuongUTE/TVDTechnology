<style>
    .thumb {
        width: 100%;
        height: 100%;
        background-color: #fff;
        background-image: none;
        background-repeat: no-repeat;
        background-position: center center;
        background-size: cover;
    } 
</style>
<?php
$conn = mysqli_connect('localhost', 'root', '', 'linhkienmaytinh');
if (isset($_SESSION['search'])) {
    $search = $_SESSION['search'];
    unset($_SESSION['search']);
    $sql = "where tbl_dmsp.TenSP like '%$search%' or tbl_dmloai.TenLoai like '%$search%'";
} else {
    $sql = "";
}
 unset($_SESSION['search']);
$result = mysqli_query($conn, "select count(ID) as total from tbl_dmsp  INNER JOIN tbl_dmloai ON tbl_dmloai.IDLoai = tbl_dmsp.IDLoai $sql");
$row = mysqli_fetch_assoc($result);
$total_records = $row['total'];
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 12;
$total_page = ceil($total_records / $limit);
if ($current_page > $total_page) {
    $current_page = $total_page;
} else if ($current_page < 1) {
    $current_page = 1;
}
$start = ($current_page - 1) * $limit;

    $sql = "select tbl_dmsp.ID,tbl_dmsp.MaSP,tbl_dmsp.TenSP,tbl_dmsp.DienGiai,tbl_dmsp.DonGia,tbl_dmsp.SoLuong,tbl_dmsp.HinhAnh,tbl_dmsp.IDLoai,tbl_dmsp.IDHang,tbl_dmsp.TrangThai,tbl_dmsp.SoLuongBan from tbl_dmsp  INNER JOIN tbl_dmloai ON tbl_dmloai.IDLoai = tbl_dmsp.IDLoai $sql order by tbl_dmsp.ID DESC LIMIT $start, $limit ";

$result = mysqli_query($conn, $sql);

?>
<div class="alert alert-danger text-center m-1">
<h3 style="margin-top: 5px"><b>Top Sản Phẩm<b><h3>
                    <div  class="container padding">
                    <form action="" method="POST" style="display: flex;align-items: center;">
                        <p style="margin-top: 20px;text-align: left;font-size: 20px;margin-right: 10px;">sắp xếp theo</p>
                        <input type="submit" style="background-color: #fff;font-size: 18px;margin-right: 10px;" value="Bán Nhiều" name="bestsale">
                        <input type="submit" style="background-color: #fff;font-size: 18px;margin-right: 10px;" value="Số Lượng" name="bestproduct">
                    </form>  
                        <div class="row padding">
                            <?php
                            //session_start();
                            require('./connect/connect.php');
                            if(isset($_POST['bestsale']) && $_POST['bestsale']=='Bán Nhiều'){
                            $sqlhot = "select tbl_dmsp.ID,tbl_dmsp.MaSP,tbl_dmsp.TenSP,tbl_dmsp.DienGiai,tbl_dmsp.DonGia,tbl_dmsp.SoLuong,tbl_dmsp.HinhAnh,tbl_dmsp.IDLoai,tbl_dmsp.IDHang,tbl_dmsp.TrangThai,tbl_dmsp.SoLuongBan from tbl_dmsp  INNER JOIN tbl_dmloai ON tbl_dmloai.IDLoai = tbl_dmsp.IDLoai order by tbl_dmsp.SoLuongBan DESC LIMIT 4 ";
                            $resulthot = mysqli_query($conn, $sqlhot);
                            if (mysqli_query($conn, $sqlhot)) {
                                while ($rowhot = mysqli_fetch_assoc($resulthot)) {
                                    ?>
                                    <div class="col-md-3 col-12 my-2">
                                        <div class="card sp h-100">
                                            <div class="card-body">
                                                <form method="post" action="add.php?id=<?php echo $rowhot["ID"]; ?>">
                                                    <img class="card-img-top thumb" src="<?php echo $rowhot['HinhAnh'] ?>" style="height: 213px;">
                                                    <h6 class="card-title name-title" style="height: 75px;"><?php echo $rowhot['TenSP'] ?></h6>
                                                    <p class="card-text" style="font-size: 18px; font-weight: bold; color: red;">Giá: <?php echo number_format($rowhot['DonGia']) ?> đ</p>
                                                    <p class="card-text" style="font-size: 18px; font-weight: bold; color: red;">Đã Bán: <?php echo number_format($rowhot['SoLuongBan']) ?> sản phẩm</p>
                                                    <!-- <input type='submit' name='btn_dathang' class="btn btn-outline-secondary p-1 btn-muangay" value='Mua ngay'/> -->
                                                    <?php
                                                    $dem = $rowhot['SoLuong'] - $rowhot['SoLuongBan'];
                                                    if ($dem > 0) {
                                                        echo "<input type='submit' name='btn_dathang' class='btn btn-outline-secondary p-1 btn-muangay' value='Mua ngay'/>";
                                                    } else {
                                                        echo "<input type='button' class='btn btn-outline-secondary p-1 btn-hethang' value='Hết hàng'/>";
                                                    }
                                                    ?>
                                                    <?php
                                                    echo "<a href='./index.php?action=chitiet&id=" . $rowhot['ID'] . "' class='btn btn-outline-secondary p-1 btn-chitiet float-right'>Chi tiết</a>";
                                                    ?>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            } else {
                                echo "Không có dữ liệu";
                            }
                        }
                        elseif(isset($_POST['bestproduct']) && $_POST['bestproduct']=='Số Lượng'){
                            $sqlhot = "select tbl_dmsp.ID,tbl_dmsp.MaSP,tbl_dmsp.TenSP,tbl_dmsp.DienGiai,tbl_dmsp.DonGia,tbl_dmsp.SoLuong,tbl_dmsp.HinhAnh,tbl_dmsp.IDLoai,tbl_dmsp.IDHang,tbl_dmsp.TrangThai,tbl_dmsp.SoLuongBan from tbl_dmsp  INNER JOIN tbl_dmloai ON tbl_dmloai.IDLoai = tbl_dmsp.IDLoai order by tbl_dmsp.SoLuong DESC LIMIT 4 ";
                            $resulthot = mysqli_query($conn, $sqlhot);
                            if (mysqli_query($conn, $sqlhot)) {
                                while ($rowhot = mysqli_fetch_assoc($resulthot)) {
                                    ?>
                                    <div class="col-md-3 col-12 my-2">
                                        <div class="card sp h-100">
                                            <div class="card-body">
                                                <form method="post" action="add.php?id=<?php echo $rowhot["ID"]; ?>">
                                                    <img class="card-img-top thumb" src="<?php echo $rowhot['HinhAnh'] ?>" style="height: 213px;">
                                                    <h6 class="card-title name-title" style="height: 75px;"><?php echo $rowhot['TenSP'] ?></h6>
                                                    <p class="card-text" style="font-size: 18px; font-weight: bold; color: red;">Giá: <?php echo number_format($rowhot['DonGia']) ?> đ</p>
                                                    <p class="card-text" style="font-size: 18px; font-weight: bold; color: red;">Số Lượng Sản Phẩm: <?php echo number_format($rowhot['SoLuong']) ?> sản phẩm</p>
                                                    <!-- <input type='submit' name='btn_dathang' class="btn btn-outline-secondary p-1 btn-muangay" value='Mua ngay'/> -->
                                                    <?php
                                                    $dem = $rowhot['SoLuong'] - $rowhot['SoLuongBan'];
                                                    if ($dem > 0) {
                                                        echo "<input type='submit' name='btn_dathang' class='btn btn-outline-secondary p-1 btn-muangay' value='Mua ngay'/>";
                                                    } else {
                                                        echo "<input type='button' class='btn btn-outline-secondary p-1 btn-hethang' value='Hết hàng'/>";
                                                    }
                                                    ?>
                                                    <?php
                                                    echo "<a href='./index.php?action=chitiet&id=" . $rowhot['ID'] . "' class='btn btn-outline-secondary p-1 btn-chitiet float-right'>Chi tiết</a>";
                                                    ?>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            } else {
                                echo "Không có dữ liệu";
                            }
                        }
                        else{
                            $sqlhot = "select tbl_dmsp.ID,tbl_dmsp.MaSP,tbl_dmsp.TenSP,tbl_dmsp.DienGiai,tbl_dmsp.DonGia,tbl_dmsp.SoLuong,tbl_dmsp.HinhAnh,tbl_dmsp.IDLoai,tbl_dmsp.IDHang,tbl_dmsp.TrangThai,tbl_dmsp.SoLuongBan from tbl_dmsp  INNER JOIN tbl_dmloai ON tbl_dmloai.IDLoai = tbl_dmsp.IDLoai order by tbl_dmsp.SoLuongBan DESC LIMIT 4 ";
                            $resulthot = mysqli_query($conn, $sqlhot);
                            if (mysqli_query($conn, $sqlhot)) {
                                while ($rowhot = mysqli_fetch_assoc($resulthot)) {
                                    ?>
                                    <div class="col-md-3 col-12 my-2">
                                        <div class="card sp h-100">
                                            <div class="card-body">
                                                <form method="post" action="add.php?id=<?php echo $rowhot["ID"]; ?>">
                                                    <img class="card-img-top thumb" src="<?php echo $rowhot['HinhAnh'] ?>" style="height: 213px;">
                                                    <h6 class="card-title name-title" style="height: 75px;"><?php echo $rowhot['TenSP'] ?></h6>
                                                    <p class="card-text" style="font-size: 18px; font-weight: bold; color: red;">Giá: <?php echo number_format($rowhot['DonGia']) ?> đ</p>
                                                    <p class="card-text" style="font-size: 18px; font-weight: bold; color: red;">Đã Bán: <?php echo number_format($rowhot['SoLuongBan']) ?> sản phẩm</p>
                                                    <!-- <input type='submit' name='btn_dathang' class="btn btn-outline-secondary p-1 btn-muangay" value='Mua ngay'/> -->
                                                    <?php
                                                    $dem = $rowhot['SoLuong'] - $rowhot['SoLuongBan'];
                                                    if ($dem > 0) {
                                                        echo "<input type='submit' name='btn_dathang' class='btn btn-outline-secondary p-1 btn-muangay' value='Mua ngay'/>";
                                                    } else {
                                                        echo "<input type='button' class='btn btn-outline-secondary p-1 btn-hethang' value='Hết hàng'/>";
                                                    }
                                                    ?>
                                                    <?php
                                                    echo "<a href='./index.php?action=chitiet&id=" . $rowhot['ID'] . "' class='btn btn-outline-secondary p-1 btn-chitiet float-right'>Chi tiết</a>";
                                                    ?>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            } else {
                                echo "Không có dữ liệu";
                            }
                        }
                            ?>
                        </div>
                    </div>
                    </div>
                    <div  class="container padding">
                    <h3 style="margin-top: 20px;text-align: center;"><b>Tất Cả Sản Phẩm<b><h3>
                        <div class="row padding">
                            <?php
                            //session_start();
                            require('./connect/connect.php');
                            if (mysqli_query($conn, $sql)) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <div class="col-md-3 col-12 my-2">
                                        <div class="card sp h-100">
                                            <div class="card-body">
                                                <form method="post" action="add.php?id=<?php echo $row["ID"]; ?>">
                                                    <img class="card-img-top thumb" src="<?php echo $row['HinhAnh'] ?>" style="height: 213px;">
                                                    <h6 class="card-title name-title" style="height: 75px;"><?php echo $row['TenSP'] ?></h6>
                                                    <p class="card-text" style="font-size: 18px; font-weight: bold; color: red;">Giá: <?php echo number_format($row['DonGia']) ?> đ</p>
                                                    <!-- <input type='submit' name='btn_dathang' class="btn btn-outline-secondary p-1 btn-muangay" value='Mua ngay'/> -->
                                                    <?php
                                                    $dem = $row['SoLuong'] - $row['SoLuongBan'];
                                                    if ($dem > 0) {
                                                        echo "<input type='submit' name='btn_dathang' class='btn btn-outline-secondary p-1 btn-muangay' value='Mua ngay'/>";
                                                    } else {
                                                        echo "<input type='button' class='btn btn-outline-secondary p-1 btn-hethang' value='Hết hàng'/>";
                                                    }
                                                    ?>
                                                    <?php
                                                    echo "<a href='./index.php?action=chitiet&id=" . $row['ID'] . "' class='btn btn-outline-secondary p-1 btn-chitiet float-right'>Chi tiết</a>";
                                                    ?>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            } else {
                                echo "Không có dữ liệu";
                            }
                            ?>
                        </div>
                    </div>

                    <!-- page -->
                    <div class="container-fluid ">
                        <nav aria-label="page navigation example" class="my-3">
                            <ul class="pagination justify-content-center">
                                <?php
                                if ($current_page > 1 && $total_page > 1) {
                                    echo '<li class="page-item"><a class="page-link" href="index.php?page=' . ($current_page - 1) . '">Previous</a></li> ';
                                }
                                for ($i = 1; $i <= $total_page; $i++) {
                                    if ($i == $current_page) {
                                        echo '<li class="page-item active"><span class="page-link">' . $i . '</span></li> ';
                                    } else {
                                        echo '<li class="page-item"><a class="page-link" href="index.php?page=' . $i . '">' . $i . '</a> </li>';
                                    }
                                }
                                if ($current_page < $total_page && $total_page > 1) {
                                    echo '<li class="page-item"><a class="page-link" href="index.php?page=' . ($current_page + 1) . '">Next</a></li> ';
                                }
                                ?>
                            </ul>
                        </nav>
                    </div>
                    <!-- end page -->