//function luôn chạy
$(function(){
	// gọi hàm getIDType
	getIdType($('.menu-item').attr('value'));
	//khi phần tử có class là menu-item đc click thì làm lệnh trong hàm
	$('.menu-item').click(function() {
		// thay đổ phần text của title bằng phần text của thằng menu
		$('.title').text($(this).text());
		getIdType($(this).attr('value'));
	});
});
//hàm nhận vào một id , trả về một đoạn text để đưa vào html
function getIdType(id){
	var myid=id;
	var http=new XMLHttpRequest();
	http.onreadystatechange=function(){
		if(http.readyState==4&&http.status==200){
			var kq=http.responseText;
			$(".list-item-daily").html(kq);
		}
	}
	// gửi bằng phương thức GET, Gủi cho file getItemDaily.php id bên trên
	http.open('GET','php/getItemDaily.php?m='+myid,true);
	http.send();
}