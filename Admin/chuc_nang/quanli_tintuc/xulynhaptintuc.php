<?php

require("../connect/connect.php");

// thêm mới tin tức
if (isset($_POST['btn_addtt'])) {
    $ngaynhap = date('Y-m-d');

    $file_name = $_FILES['txt_AnhTinTuc']['name'];
    $file_path = $_FILES['txt_AnhTinTuc']['tmp_name'];
    if ($file_name != '') {
        $new_path = "./images/" . $file_name;
        $uploaded_file = move_uploaded_file($file_path, $new_path);
    }


    $tieude = $_POST['txt_tieude'];
    $noidung = $_POST['txt_noidung'];
    $trangthai = $_POST['txt_trangthai'];
    $sql_insert_tt = "insert into tbl_tintuc (MaTT, NgayNhap, AnhTinTuc, TieuDe, NoiDungTT, TrangThai) 
    values (null, '$ngaynhap', '$new_path', '$tieude', '$noidung', '$trangthai')";
//    header("location:?nc=tintuc");
    if (mysqli_query($con, $sql_insert_tt)) {
        $message = "Thêm Thành Công";
        echo "<script type='text/javascript'>alert('$message');</script>";
    } else {
        $message = "Thêm Không Thành Công";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
}

// sửa tin tức
if (isset($_POST['btn_updatett'])) {
    $matt_update = $_POST['txt_matt'];
    $ngaynhap = date('Y-m-d');

    $file_name = $_FILES['txt_AnhTinTuc']['name'];
    $file_path = $_FILES['txt_AnhTinTuc']['tmp_name'];
    if ($file_name != '') {
        $new_path = "./images/" . $file_name;
        $uploaded_file = move_uploaded_file($file_path, $new_path);
    }
    $tieude = $_POST['txt_tieude'];
    $noidung = $_POST['txt_noidung'];
    $trangthai = $_POST['txt_trangthai'];
    if (isset($new_path)) {
        $sql_update_tt = "update tbl_tintuc set NgayNhap = '$ngaynhap', AnhTinTuc = '$new_path',  TieuDe = '$tieude', NoiDungTT = '$noidung', TrangThai = '$trangthai' where MaTT='$matt_update'";
        mysqli_query($con, $sql_update_tt);
        $message = "Cập nhập thành công";
        echo "<script type='text/javascript'>alert('$message');</script>";
    } else {
        $message = "Cập nhập không thành công";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
}

// xóa tin tức
if (isset($_GET["action"]) && $_GET["action"] == "delete") {
        $id_item = $_GET["matt"];
        $sql = "DELETE from tbl_tintuc where MaTT=". $id_item ."";
        $ketqua = mysqli_query($con, $sql);
        if ($ketqua >0) {
            $message = "Xóa Thành Công";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
    }
?>