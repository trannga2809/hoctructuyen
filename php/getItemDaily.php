<?php

require('config.php') ;

$link=mysqli_connect($host,$user,$pass,$db);
if(!$link){
	echo 'ket noi that bai';
}
else{ 
	// nhận giá trị gửi đến bằng phương thức GET vơi định danh là m
	$id=$_GET['m'];
	//định dạng dữ liệu trả về định dạng UTF8
	mysqli_set_charset($link,'UTF8');
	// tạo câu lệnh truy vấn sql
	$sql="select * from monan2 where type='$id'";
	// THực hiện truy vấn và gán dữ liệu trả về vào biến kq
	$kq=mysqli_query($link,$sql);
	// nếu kết quả trả về có ít nhất 1 bản ghi thì ...
	if(mysqli_num_rows($kq)>0){
		while ($row=mysqli_fetch_assoc($kq)) {
			// sau mỗi vòng lặp , biến hiển thị được gán một đoạn văn bản để trả về
			// $hienthi='<a href="view/detailitem.php?id2='.$row['id'].'"><div class="item" value="111111111111" style="cursor:pointer;" ><div class="imgfood" style="background-image: url('."'".$row['img']."'".');"></div><p>'.$row['type'].'</p><h2>'.$row['ten'].'</h2></div></a>';
			$hienthi='<a href="view/detailitem.php?id2='.$row['id'].'">
				<div class="item" value="111111111111" style="cursor:pointer;" >
					<div class="imgfood" style="background-image: url('."'".$row['img']."'".');">
						
					</div>
					<p>'.$row['type'].'</p>
					<h2>'.$row['ten'].'</h2>
				</div>
			</a>';
			echo $hienthi;
		}
	}else{
		echo 'k co mon an';
	}
}
mysqli_close($link);
 ?>
 <!-- value="'.$row['id'].'" -->