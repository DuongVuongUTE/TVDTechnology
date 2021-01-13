<!DOCTYPE html>
<html lang="en">        
<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>

<body>
    <div>
        <div class="row justify-content-center">
            <div class="col-md-3 col-sm-6 col-10 row-container">
                <form action="login_admin.php" method="post">
                    <h1>Login</h1>
                    <div class="form-group">
                        <label for="email">Tên đăng nhập</label>
                        <input type="text" name="txt_tendn" class="form-control" id="email" placeholder="Nhập tên đăng nhập">
                        <p class="emailError"></p>
                    </div>
                    <div class="form-group">
                        <label for="password">Mật khẩu</label>
                        <input type="password" name="txt_pass" class="form-control" id="password" placeholder="Mật khẩu">
                        <p class="passwordError"></p>
                    </div>
                    <button type="submit" name="btn_login" class="btn btn-primary btn-block my-3">Login</button>
                    
                    <?php
                        require("xuly_login_admin.php");
                    ?>
                </form>
            </div>
        </div>
    </div>
</body>
</html>