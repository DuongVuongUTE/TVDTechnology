<?php
	require("../connect/connect.php");
	if(isset($_POST['btn_them'])){
            $sql_tangma = "SELECT * FROM tbl_dmsp WHERE MaSP in (SELECT max(MaSP) FROM tbl_dmsp)";
            $result_tangma = mysqli_query($con, $sql_tangma);
            $fetch_array = mysqli_fetch_array($result_tangma);
            $ma = 1;
            $tangma = $fetch_array['MaSP'];
            $catString = substr($tangma, 2, 3) + $ma;
            if ($catString < 10) {
                $masp = "SP00$catString";
            } else if ($catString < 100) {
                $masp = "SP0$catString";
            } else {
                $masp = "SP$catString";
            }
			$Tensp=$_POST['txt_TenSP'];
			$DienGiai=$_POST['txt_diengiai'];
			$chitiet=$_POST['txt_chitiet'];
			$DonGia = $_POST['txt_DonGia'];
			$anh=$_FILES['txt_HinhDaiDien']['name'];
			if($anh!=''){
				$dich = "./images/".$anh;
				move_uploaded_file($_FILES['txt_HinhDaiDien']['name'],$dich);
				$dich=substr($dich,0);
			}
			$IDHSX = $_POST['txt_IDHSX'];
			$IDChungLoai = $_POST['txt_IDChungLoai'];
			$TrangThai = $_POST['txt_trangthai'];
			$SoLuong = $_POST['txt_SoLuong'];
			$sql="INSERT INTO tbl_dmsp(MaSP,TenSP,DienGiai,DonGia,HinhAnh,IDLoai,IDHang,TrangThai,SoLuong,SoLuongBan,chitiet) 
            VALUES('$masp','$Tensp','$DienGiai','$DonGia','$dich','$IDChungLoai','$IDHSX','$TrangThai','$SoLuong','0','$chitiet')";
            $row = mysqli_query($con,$sql);	
            echo '<script>alert("Đã thêm sản phẩm mới thành công!")</script>';  
            echo '<script>window.location="index.php?nc=nhapsp"</script>';
		}else{
			
		}
    
    //code xóa sản phẩm
    
	if(isset($_GET["action"]))  
    {  
     if($_GET["action"] == "delete")  
     {
         $id_item = $_GET["id"];
         $sql = "DELETE from tbl_dmsp where ID=".$id_item."";
         $ketqua = mysqli_query($con,$sql);
         if($ketqua > 0){  
                 echo '<script>window.location="index.php?nc=nhapsp"</script>';
         }
     }  
    }
   
   //code sửa sản phẩm

   if(isset($_POST['btn_SuaSP']))
   {
           $tem_id = $_POST["txt_id"];
           $MaSP_sua=$_POST['txt_MaSP'];
           $Tensp_sua=$_POST['txt_TenSP'];
           $DienGiai_sua=$_POST['txt_diengiai'];
           $chitiet_update=$_POST['txt_chitietsp'];
           $SoLuong_sua = $_POST['txt_SoLuong'];
           $DonGia_sua = $_POST['txt_DonGia'];
           $anh=$_FILES['txt_HinhAnh']['name'];
           if($anh!=''){
               $dich = "./images/".$anh;
               move_uploaded_file($_FILES['txt_HinhAnh']['name'],$dich);
               $dich=substr($dich,0);
           }
           $IDHSX_sua = $_POST['txt_IDHSX'];
           $IDChungLoai_sua = $_POST['txt_IDChungLoai'];
           $TrangThai_sua = $_POST['txt_trangthai'];
       $sql_suasp = "UPDATE tbl_dmsp SET MaSP = '$MaSP_sua', TenSP = '$Tensp_sua', DienGiai = '$DienGiai_sua', DonGia = $DonGia_sua, HinhAnh = '$dich', IDLoai = $IDChungLoai_sua, IDHang = $IDHSX_sua, TrangThai = $TrangThai_sua , SoLuong = $SoLuong_sua where ID=".$tem_id."";
       $row = mysqli_query($con,$sql_suasp);
       if($row>0){
        echo "
        <script language='javascript'>
                alert('Cập nhật thành công');
                window.open('index.php?nc=nhapsp','_self',3);
        </script>";
           
       } else
       {
        echo "
        <script language='javascript'>
                alert('Vui lòng nhập đầy đủ thông tin!');
        </script>";
       }
   }
