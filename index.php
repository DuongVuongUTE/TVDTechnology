<?php session_start();
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <title>TVD Technology</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="./images/logo.ico">
        <link rel="stylesheet" type="text/css" href="css/bootstrap-grid.min.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap-grid.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap-reboot.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap-reboot.min.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/styles.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <style>
            .menuleft{
                border-right: #fff 1px solid;
            }
            .menuleft li.nav-item:hover{
                background-color: #fff;
                color: #040b3c;
            }
            .menuleft li.nav-item a{
                color: #fff;
                font-size: 18px;
            }
            .menuleft li.nav-item a:hover{
                background-color: #fff;
                color: #040b3c;
            }
            .menuleft li.nav-item{
                position: relative;
            }
            .hang{
                display: none;
                padding: 0;
                margin: 0;
                width: 200px;
                list-style: none;
                position: absolute;
                left: 100%;
                top: -1px;
                background-color: #040b3c;
                color: #fff;
                z-index: 1000;
            }
            .hang li:hover{
                background-color: #fff;
                color: #040b3c;
            }
            .hover_nav:hover ~ .hang{
                display: block;
            }
        </style>
    </head>

    <body style="font-family: arial sans-serif;background: #fff">
        <!-- navbar -->
        <nav class="navbar navbar-expand-md sticky-top fixed-top p-0 border-bottom">
            <a class="navbar-brand p-0" href="index.php">
                <img style="margin: 15px 15px 15px 26px;
                     width: 50px;
                     border-radius: 50%;" src="https://static.wixstatic.com/media/48fd8b_d958459cd7e249878304ab579bc59f73~mv2.png/v1/fill/w_600%2Ch_600%2Cal_c%2Cq_90/file.jpg" width="100"><span class="logo_name">TVD Technology</span>
            </a>
            <form style="margin-left: 207px;" class="form-inline my-2 my-lg-0" action="" method="POST">
                <input style="width: 325px;" class="form-control mr-sm-2" name="search" type="text" placeholder="Tìm kiếm sản phẩm" aria-label="Search">
                <input class="btn btn-outline-success my-2 my-sm-0" type="submit" value="Tìm kiếm"/>
            </form>
            <?php
            if (isset($_POST['search'])) {
                $_SESSION['search'] = $_POST['search'];
            }
            
            ?>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div style="margin-right: 30px" class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link active" style="font-size: 16px ;margin-right: 5px"; href="index.php"><i class='fas fa-home mr-1'></i>Trang chủ</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" style="font-size: 16px" href="#" id="navbardrop" data-toggle="dropdown">
                            Hãng sản xuất
                        </a>
                        <div class="dropdown-menu" style="background-color: #040b3c;">
<?php
require('./connect/connect.php');
$sql = "Select * from tbl_hangsx where TrangThai = 1 order by IDHang asc";
$query = mysqli_query($con, $sql);
if (mysqli_num_rows($query) > 0) {
    while ($rows = mysqli_fetch_array($query)) {
        ?>
                                    <a class="dropdown-item" st href="index.php?action=hang&idhang=<?php echo $rows['IDHang']; ?>"><?php echo $rows['TenHang']; ?></a><?php
                                }
                            } else
                                echo "Không ó dữ liệu";
                            ?>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" style="font-size: 16px" href="#" id="navbardrop" data-toggle="dropdown">
                            Loại sản phẩm
                        </a>
                        <div class="dropdown-menu" style="background-color: #040b3c;">
<?php
require('./connect/connect.php');
$sql = "Select * from tbl_dmloai where TrangThai = 1 order by IDLoai asc";
$query = mysqli_query($con, $sql);
if (mysqli_num_rows($query) > 0) {
    while ($rows = mysqli_fetch_array($query)) {
        ?>
                                    <a class="dropdown-item" st href="index.php?action=loaisp&idloai=<?php echo $rows['IDLoai']; ?>"><?php echo $rows['TenLoai']; ?></a><?php
                                }
                            } else
                                echo "Không ó dữ liệu";
                            ?>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="font-size: 16px" href="index.php?action=tintuc">Tin tức</a>
                    </li>
                    <li class="nav-item">
<?php
//Đếm số sản phảm trong giỏ hàng
// session_start();
if (isset($_SESSION["giohang"]) && $_SESSION["giohang"] != null) {
    $count = count($_SESSION["giohang"]);
} else {
    $count = 0;
}
?>
                        <a class="nav-link active" style="font-size: 16px" href="index.php?action=giohang"><i class='fas fa-cart-plus mr-1'></i>Giỏ hàng <?php echo $count; ?></a>
                    </li>
<?php if (isset($_SESSION['tendn']) && $_SESSION['tendn']) { ?>
                        <li class="nav-item dropdown mr-2">
                            <a class="nav-link dropdown-toggle size" style="font-size: 16px" href="#" id="navbardrop" data-toggle="dropdown">
                                <i class='fas fa-user-alt mr-1'></i><?php echo $_SESSION['tendn']; ?>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right bg-dark">
                                <a class="dropdown-item" href="index.php?action=donhang">
                                    <i class="fas fa-sign-out"></i> Đơn hàng của tôi
                                </a>
                                <a class="dropdown-item" href="chuc_nang/dang_nhap-dang_ky/logout.php">
                                    <i class="fas fa-sign-out"></i> Đăng xuất
                                </a>
                            </div>
                        </li>
<?php } else { ?>
                        <li class="nav-item"><a style="font-size: 16px" class="nav-link" data-toggle="modal" data-target="#login" href=" #">Đăng nhập</a></li>
                        <li class="nav-item"><a style="font-size: 16px" class="nav-link" data-toggle="modal" data-target="#dangky" href=" #">Đăng ký</a></li>
    <?php
}
?>
                </ul>
            </div>
        </nav>
        <!-- end navbar -->
<?php require('chuc_nang/dang_nhap-dang_ky/login.php'); ?>
        <?php require('chuc_nang/dang_nhap-dang_ky/dangky.php'); ?>
        <!-- start carousel -->
        <div style="display: flex;">

                <ul class="menuleft" style="width: 20%;display: flex;flex-direction: column;list-style: none;padding: 0;margin: 0; background-color: #040b3c;">
                    <li style="font-size: 24px;padding: 1rem 2rem;color: #fff;">Danh Mục Sản Phẩm</li>
                    <?php
                    require('./connect/connect.php');
                    $sql = "Select * from tbl_dmloai order by IDLoai asc";
                    $query = mysqli_query($con, $sql);
                    if (mysqli_num_rows($query) > 0) {
                        while ($rows = mysqli_fetch_array($query)) { ?>
                            <li class="nav-item hover_nav"><a  class="nav-link" style="padding: 0.5rem 2rem;" href="index.php?action=loaisp&idloai=<?php echo $rows['IDLoai']; ?>"><?php echo $rows['TenLoai']; ?></a>
                            <ul class="hang">
                                    <?php
                                    require('./connect/connect.php');
                                    $sql1 = "Select * from tbl_hangsx order by IDHang asc";
                                    $query1 = mysqli_query($con, $sql1);
                                    if (mysqli_num_rows($query1) > 0) {
                                        while ($rows1 = mysqli_fetch_array($query1)) { ?>
                                    <li class="nav-item"><a class="nav-link" style="padding: 0.5rem 2rem;" href="index.php?action=hang&idhang=<?php echo $rows1['IDHang']; ?>"><?php echo $rows1['TenHang']; ?></a></li><?php
                                        }
                                    } else echo "Không có dữ liệu";
                                    ?>
                                </ul>
                            </li><?php
                        }
                    } else echo "Không có dữ liệu";
                    ?>
                </ul>
        <div style="width: 80%;" id="carouselExampleIndicators" class="carousel carousel-fade slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            </ol>
            <div class="carousel-inner" style="width: 100%; margin: 0 0 0 auto;">
                <div class="carousel-item active">
                    <img src="./img/slide1.jpg" class="d-block w-100">
                </div>
                <div class="carousel-item">
                    <img src="./img/slide2.jpg" class="d-block w-100">
                </div>
                <div class="carousel-item">
                    <img src="./img/slide3.jpg" class="d-block w-100">
                </div>
                <div class="carousel-item">
                    <img src="./img/slide4.png" class="d-block w-100">
                </div>
            </div>
            <a class="carousel-control-prev" style="left: 20px;width: auto;" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" style="right: -5%;" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        </div>
        <!-- end carousel -->
        <!--  DANH SÁCH SẢN PHẨM -->
<?php
if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'hang': {
                include('chuc_nang/san_pham/view_theo_hangSX.php');
                break;
            }
        case 'loaisp': {
                include('chuc_nang/san_pham/view_loai_sp.php');
                break;
            }
        case 'giohang': {
                include('chuc_nang/gio_hang/view_cart.php');
                break;
            }

        case 'chitiet': {
                include('chuc_nang/san_pham/chitietsp.php');
                break;
            }
        case 'thanhtoan': {
                include('chuc_nang/gio_hang/thanhtoan.php');
                break;
            }
        case 'add': {
                include('dathang.php');
                break;
            }
        case 'tintuc': {
                include('chuc_nang/tin_tuc/tintuc.php');
                break;
            }
        case 'chitiettintuc': {
                include('chuc_nang/tin_tuc/chitiettintuc.php');
                break;
            }
        case 'donhang': {
                include('chuc_nang/gio_hang/donhangcuatoi.php');
                break;
            }
        case 'huydh': {
                include('chuc_nang/gio_hang/xulyhuydonhang.php');
                break;
            }
        case 'chitietdh': {
                include('chuc_nang/gio_hang/chitietdh.php');
                break;
            }
        default;
            break;
    }
} else {
    require('chuc_nang/san_pham/danhsachsp.php');
}
?>
        <!-- end DANH SÁCH SẢN PHẨM -->
        <!-- <div class="row fixed-bottom">
            <div class="col-md-3 col-6 mb-5 ml-2">
                <div id="tatqc" class="bg-warning text-right pr-2">
                    <a href="#" onclick="anqc()">Đóng <<</a>
                </div>
                <div id="noidungqc" class="embed-responsive embed-responsive-16by9">
                    <video class="video-fluid z-depth-1" autoplay loop controls muted>
                        <source src="https://mdbootstrap.com/img/video/Sail-Away.mp4" type="video/mp4" />
                    </video>
                </div>
                <div id="hienqc" style="display: none;" class="pl-2">
                    <a href="#" onclick="hienqc()" class="bg-warning">Hiện quảng cáo >></a>
                </div>
            </div>
        </div> -->
        <!-- start footer -->
<?php
require('footer.php');
?>
        <!-- end footer -->
        <script>
            function anqc() {
                document.getElementById("tatqc").style.display = "none";
                document.getElementById("noidungqc").style.display = "none";
                document.getElementById("hienqc").style.display = "block";
            }

            function hienqc() {
                document.getElementById("tatqc").style.display = "block";
                document.getElementById("noidungqc").style.display = "block";
                document.getElementById("hienqc").style.display = "none";
            }
        </script>
    </body>
    <!-- Messenger Chat -->
    <div id="fb-root"></div>
    <script>
        window.fbAsyncInit = function () {
            FB.init({
                xfbml: true,
                version: 'v4.0'
            });
        };

        (function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id))
                return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>

    <!-- Your customer chat code -->
    <div class="fb-customerchat" attribution=setup_tool page_id="304704343559118" theme_color="#13cf13" logged_in_greeting="Xin chào! Tôi có thể giúp gì cho ban?" logged_out_greeting="Xin chào! Tôi có thể giúp gì cho ban?">
    </div>
    <!-- end Messenger Chat -->

</html>