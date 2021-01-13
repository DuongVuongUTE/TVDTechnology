<?php
	require("../connect/connect.php");
	if(isset($_POST['btn_themhsx'])){
		echo "Đã bấm nút thêm";
		if($_POST['txt_TenHang']!=""){
			$tenHang=$_POST['txt_TenHang'];
			$nuoc=$_POST['txt_Nuoc'];
			$trangThai = $_POST['txt_TrangThai'];
			
			$sql="INSERT INTO tbl_hangsx(IDHang,TenHang,Nuoc,TrangThai) VALUES(Null,'$tenHang','$nuoc','$trangThai')";
			$row = mysqli_query($con,$sql);		
			header("location: index.php?nc=hsx");
		}else{
			echo "Bạn phải nhập tên hãng.";
		}
        }
    
    //code xóa sản phẩm
	if(isset($_GET["action"]))  
    {  
     if($_GET["action"] == "deletehsx")  
     {
         $id_item = $_GET["id"];
         $sql = "DELETE from tbl_hangsx where IDHang=".$id_item."";
         $ketqua = mysqli_query($con,$sql);
         if($ketqua > 0){
                 echo '<script>window.location="index.php?nc=hsx"</script>';
         }
     }  
    }
   
   //code sửa HSX
   if(isset($_POST['btn_SuaHSX']))
   {
           $tem_id = $_POST["txt_id"];
           $tenHang_sua=$_POST['txt_TenHang'];
           $nuoc_sua=$_POST['txt_Nuoc'];
           $trangthai_sua=$_POST['txt_TrangThai'];
           
       $sql_suahsx = "UPDATE tbl_hangsx SET TenHang = '$tenHang_sua', Nuoc = '$nuoc_sua', TrangThai = '$trangthai_sua' where IDHang=".$tem_id."";
       $row = mysqli_query($con,$sql_suahsx);
       if($row>0){
        echo "
        <script language='javascript'>
                alert('Cập nhật thành công');
                window.open('index.php?nc=hsx','_self',3);
        </script>";
           
       } else
       {
        echo "
        <script language='javascript'>
                alert('Vui lòng nhập đầy đủ thông tin!');
        </script>";
       }
   }
?>