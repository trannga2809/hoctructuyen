<?php

require('config.php') ;
$id=$_GET['id2'];
$link=mysqli_connect($host,$user,$pass,$db);
if(!$link){
	echo 'ket noi that bai';
}else{
	mysqli_set_charset($link,'UTF8');
	//tạo câu truy vấn
	$sql="select * from monan2 where id='$id'";
	//thực hiện truy vấn
	$kq=mysqli_query($link,$sql);
	if(mysqli_num_rows($kq)>0){
		while ($row=mysqli_fetch_assoc($kq)) {
			$nl=explode('|', $row['nguyenlieu']);
			$nlhienthi="";
			for($x = 0; $x < count($nl); $x++) {
				    $nlhienthi=$nlhienthi.($x+1).") ".$nl[$x].'<br>';
				}


			

			$cl=explode('|', $row['cachlam']);
			$clhienthi="";
			for($x = 0; $x < count($cl); $x++) {
				    $clhienthi=$clhienthi.'Bước '.($x+1).": ".$cl[$x].'<br>';
				}



			$hienthi=	'<div class="container">
							<div class="header">
							<h1>'.$row['ten'].'</h1>
							</div>
							<div class="content">
								<img src="'."../".''.$row['img'].'" alt="">
								<div class="noidung">
									<h3>Nguyên liệu cho món ăn :</h3>
									<p>'.$nlhienthi.'</p>
									<h3>Cách thực hiện món ăn :</h3>
									<p>'.$clhienthi.'</p>
								</div>
							</div>
							<div class="image"> 

							</div>
							<div class="footer"><p>
								Mỹ nhân vào bếp là một trang web tổng hợp về nấu nướng với những cô
								thức do chính các thành viên chia sẻ.  Các bài hướng dẫn đều được viết
								rất ngắn gọn, dễ hiểu, hình minh họa đầy đủ, sinh động.<br></br>
								hotline: 0167876980<br>
								Liên hệ chúng tôi:
								Dương Thị Yến<br>Dương Thị Thúy<br>Trần Thị Nga
							</p></div>

						</div>';
			echo $hienthi;
		}
	}else{
		echo 'k co mon an'.$id;
	}
} 
?>