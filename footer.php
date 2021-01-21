<footer style="background-color:#040b3c">
    <div class="container-fluid padding">
        <div class="row text-center">
                        <div class="col-md-2 p-0">
                <h5 class="mt-3">Hãng Sản Xuất</h5>
                <hr class="light">
                <ul class="nav flex-column">
                    <?php
                    require('./connect/connect.php');
                    $sql = "Select * from tbl_hangsx order by IDHang asc";
                    $query = mysqli_query($con, $sql);
                    if (mysqli_num_rows($query) > 0) {
                        while ($rows = mysqli_fetch_array($query)) { ?>
                    <li class="nav-item"><a class="nav-link" style="padding: 0.3rem 1rem;" href="index.php?action=hang&idhang=<?php echo $rows['IDHang']; ?>"><?php echo $rows['TenHang']; ?></a></li><?php
                        }
                    } else echo "Không có dữ liệu";
                    ?>
                </ul>
            </div>      
            <div class="col-md-2 p-0">
                <h5 class="mt-3">Loại Sản Phẩm</h5>
                <hr class="light">
                <ul class="nav flex-column">
                    <?php
                    require('./connect/connect.php');
                    $sql = "Select * from tbl_dmloai order by IDLoai asc";
                    $query = mysqli_query($con, $sql);
                    if (mysqli_num_rows($query) > 0) {
                        while ($rows = mysqli_fetch_array($query)) { ?>
                            <li class="nav-item"><a  class="nav-link" style="padding: 0.3rem 1rem;" href="index.php?action=loaisp&idloai=<?php echo $rows['IDLoai']; ?>"><?php echo $rows['TenLoai']; ?></a></li><?php
                        }
                    } else echo "Không có dữ liệu";
                    ?>
            </div>
            </ul>
            <div class="col-md-4 p-0">
                <h5 class="mt-3">ĐIỀU KHOẢN MUA BÁN</h5>
                <hr class="light">
                <p>Điều Khoản Bảo Mật</p>
                <p>Hình Thức Giao Hàng</p>
                <p>Hình Thức Thanh Toán</p>
                <p>Hoãn Hủy Thay Đổi Sản Phẩm</p>
            </div>
            <div class="col-md-4 p-0">
                <h5 class="mt-3">CÔNG TY TNHH TVD TECHNOLOGY</h5>
                <hr class="light">
                <p>Trụ sở chính: K45/4 Phan Tứ - Đà Nẵng</p>
                <p>Tel: 0346.996951 - 0944.912121</p>
                <p>Facebook: https://www.facebook.com/SyDung2222000/</p>
                <p>Gmail: sydung2222000@gmail.com.vn </p>
                <div class="col-12 social padding">
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
            <div class="col-12">
                <hr class="light-100">
                <h5>&copy; Design By Vương, Dũng, Duy Thanh</h5>
            </div>
        </div>
    </div>
    <!-- Load Facebook SDK for JavaScript -->
    <div id="fb-root"></div>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v9.0'
          });
        };

        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>

      <!-- Your Chat Plugin code -->
      <div class="fb-customerchat"
        attribution=setup_tool
        page_id="105700158164793"
  logged_in_greeting="Chào bạn! Đội ngũ TVD Technology có thể giúp gì cho bạn?"
  logged_out_greeting="Chào bạn! Đội ngũ TVD Technology có thể giúp gì cho bạn?">
      </div>
</footer>