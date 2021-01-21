<?php
    $con = mysqli_connect('localhost', 'root', '', 'linhkienmaytinh');
    $mahd = $_GET['mahd'];
		$result = mysqli_query($con, "select count(MaHD) as total from tbl_hoadonchitiet where MaHD = '$mahd'");
		$row = mysqli_fetch_assoc($result);
		$total_records = $row['total'];
		$current_page = isset($_GET['nc']) ? $_GET['nc'] : 1;
		$limit = 15;
		$total_page = ceil($total_records / $limit);
		if ($current_page > $total_page){
			$current_page = $total_page;
		}
		else if ($current_page < 1){
			$current_page = 1;
		}
		$start = ($current_page - 1) * $limit;
		$result = mysqli_query($con, "SELECT * FROM tbl_hoadonchitiet where MaHD = '$mahd' LIMIT $start, $limit");
		?>
<div class="mt-3">			
<table class="table-responsive-sm table-bordered">
    <thead class="thead-light">
		<tr>
			<th colspan="6" class="text-center">DANH SÁCH SẢN PHẨM</th>
		</tr>
      <tr>
        <th>STT</th>
        <th style="text-align: center">Tên SP</th>
		<th style="text-align: center">Số lượng</th>
		<th style="text-align: center">Giá</th>
        <th style="text-align: center">Phương thức thanh toán</th>
      </tr>
    </thead>
			<?php
                require("../connect/connect.php"); 
				 $sql="select * FROM tbl_hoadonchitiet where MaHD = '$mahd'";  
                $query = mysqli_query($con,$sql);
				$i=1;
				 if(mysqli_num_rows($query)>0)
                {
                    while ($row = mysqli_fetch_assoc($result)){?>
    		<tr>
                <td class='p-2'><?php echo $i;?></td>
                <td class='p-2'><?php echo $row ['TenSP'];?></td>
                <td class='p-2'><?php echo $row ['SoLuong'];?></td>
                <td class='p-2'><?php echo $row ['Gia'];?></td>
                <td class='p-2'><?php if($row ['PTTT'] == 1){
                        echo ("Thanh toán qua bưu điện");
                    }
                    if($row ['PTTT'] == 2){
                        echo ("Thanh toán qua ATM");
                    }
                    if($row ['PTTT'] == 3){
                        echo ("Thanh toán trực tiếp");
                    }
                    ?>
                </td>
            </tr>
            <?php
			$i++;
	    }
	}
?>
</table>
</div>
