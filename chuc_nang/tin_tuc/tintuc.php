<div class="alert alert-danger text-center m-1">
    <h3><b>TIN TỨC<b><h3>
</div>
<div class="container padding">
    <div class="row padding pt-3">
        <?php
        //session_start();
        require('./connect/connect.php');
        $sql = "select * from tbl_tintuc where TrangThai=1 order by MaTT desc";
        $query = mysqli_query($con, $sql);
        if (mysqli_num_rows($query) > 0) {
            while ($row = mysqli_fetch_assoc($query)) { ?>
                <div class="col-md-6">
                    <div class="card mb-3 shadow">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="<?php echo $row['AnhTinTuc'] ?>" class="card-img img-fluid h-100" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $row['TieuDe'] ?></h5>
                                    <a href="index.php?action=chitiettintuc&matt=<?php echo $row['MaTT'] ?>" class="btn btn-outline-primary">Xem chi tiết</a>
                                </div>
                            </div>
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