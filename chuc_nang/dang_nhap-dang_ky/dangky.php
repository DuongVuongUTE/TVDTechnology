<form method="POST" action="index.php">
        <div id="dangky" class="modal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Đăng ký tài khoản</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="container-fluid bg">
                            <div class="row justify-content-center">
                                <div class="col-12 row-container">
                                    <form>
                                        <div class="form-group">
                                            <label for="email">Username</label>
                                            <input type="text" name="txt_tendn" class="form-control" id="email" placeholder="Tên đăng nhập">
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" name="txt_pass" class="form-control" id="password"
                                                placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Họ và tên</label>
                                            <input type="text" name="txt_hoten" class="form-control" id="email" placeholder="Họ và tên">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Địa chỉ</label>
                                            <input type="text" name="txt_diachi" class="form-control" id="email" placeholder="Địa chỉ">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Số điện thoại</label>
                                            <input type="text" name="txt_sdt" class="form-control" id="email" placeholder="Số điện thoại">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="text" name="txt_email" class="form-control" id="email" placeholder="Email enter">
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="rememberMe">
                                            <label class="form-check-label" for="rememberMe">Check me out</label>
                                        </div>
                                        <button type="submit" name="btn_dangky" class="btn btn-primary btn-block my-3">Đăng ký</button>
                                    </form>
                                </div>    
                            </div>
                        </div>
                    </div>
                    <?php
                        require("xuli_dangky.php");
                    ?>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>
    </form>