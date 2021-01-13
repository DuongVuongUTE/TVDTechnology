<meta charset="utf-8" />
<?php
require('connect/connect.php');
// if (isset($_POST["btn_dathang"])) {
$id = $_GET['id'];
$sql = mysqli_query($con, "select * from tbl_dmsp where ID=$id order by ID desc");
// echo "<h2>Chi tiết sản phẩm </h2>".$sql['TenSP'];
// echo $id;
while ($row = mysqli_fetch_array($sql)) {
?>
    <div class="alert alert-danger text-center" style="margin-bottom: 0px !important; padding: 5px 1.5rem 0px;">
        <h4 style="margin-bottom: 0px;"><b>CHI TIẾT SẢN PHẨM<b><h4>
    </div>
<div class="container bg-white" style="font-weight: normal">
        <div class="row">
            <div class="col-md-4 col-12 text-center">
                <img class="img-fluid border" width="100%" src="<?php echo $row['HinhAnh']; ?>" />
            </div>
            <div class="col-md-8 col-12">
                <form method="post" action="add.php?id=<?php echo $row["ID"]; ?>">
                    <H2><?php echo $row['TenSP'] ?></H2>
                    <p class="card-text" style="font-weight: bold; font-size: 17px; color: red">Giá: <?php echo number_format($row['DonGia']) ?> đ</p>
                    <div style="margin-bottom: 32px;">
                        <span style="font-weight: bold; font-size: 18px; ">MÔ TẢ SẢN PHẨM</span>
                        <div style="margin-top: 5px;">
                        <p style="margin-bottom: 0px">CPU: Intel Core i7-10750H (2.60GHz upto 5.00GHz, 12MB) 6 Nhân 12 Luồng</p>
                        <p style="margin-bottom: 0px">RAM: 8GB (2x4GB) DDR4 2666Mhz (Miễn phí nâng cấp Ram 16GB)</p>
                        <p style="margin-bottom: 0px">SSD: SSD 512GB M.2 PCIe NVMe (+1 Slot M.2 PCIe)</p>
                        <p style="margin-bottom: 0px">VGA: NVIDIA GeForce RTX 2060 6GB GDDR6</p>
                        <p style="margin-bottom: 0px">LCD: 15.6" Full HD (1920*1080) 120Hz WVA Anti-Glare LED Backlit</p>
                        <p style="margin-bottom: 0px">PIN: 4 Cells 68 Whr</p>
                        <p style="margin-bottom: 0px">OS: Windows 10 Bản Quyền</p>
                        </div>
                    </div>
                    <?php
                    $dem = $row['SoLuong'] - $row['SoLuongBan'];
                    if ($dem > 0) {
                        echo "<input type='submit' name='btn_dathang' class='btn btn-outline-secondary p-1 btn-muangay' value='Mua ngay'/>";
                    } else {
                        echo "<input type='button' class='btn btn-outline-secondary p-1 btn-hethang' value='Hết hàng'/>";
                    }
                    ?>
                </form>
            </div>
        </div>
        <div class="row px-5 py-3">
            <p><?php echo $row['DienGiai'] ?></P>
        </div>
    </div>
    <div class="alert alert-success text-center m-1 mt-3">
        <strong>SẢN PHẨM TƯƠNG TỰ</strong>
    </div>
    <?php require('sanphamtuongtu.php'); ?>
<?php } ?>