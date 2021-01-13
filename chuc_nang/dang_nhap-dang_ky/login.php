<form action="index.php" method="POST">
    <!-- The Modal -->
    <div class="modal fade" id="login">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Đăng nhập</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-group">
                        <label for="email">Tài khoản</label>
                        <input type="text" class="form-control" id="Username" name="txt_tendn" placeholder="Nhập username">
                        <p class="emailError"></p>
                    </div>
                    <div class="form-group">
                        <label for="password">Nhập mật khẩu</label>
                        <input type="password" class="form-control" id="password" name="txt_pass" placeholder="Nhập password">
                        <p class="passwordError"></p>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="rememberMe">
                                <label class="form-check-label" for="rememberMe">Check me out</label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" name="btn_dangnhap" class="btn btn-success btn-block my-3">Đăng nhập</button>
                    <?php
                    require("xuly_login.php");
                    ?>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
</form>