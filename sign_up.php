<?php 
	include "lib.php";

	$name = $_POST['Name'];
	$id = $_POST['Id'];
	$password = $_POST['Password'];
	$email = $_POST['Email'];

	# 문자열 필터링
	$name = mysqli_real_escape_string($connect,$name);
	$id = mysqli_real_escape_string($connect,$id);
	$password = mysqli_real_escape_string($connect,$password);
	$email = mysqli_real_escape_string($connect,$email);

	# DB에 회원정보 추가	
	$sql = "INSERT INTO login (id,name,password,email) VALUE('$id','$name','$password','$email')";
	$result = mysqli_query($connect,$sql);


	if($result == true) {
		?>
		<script type="text/javascript">
			alert("회원가입 성공");
			location.href="login.html";
		</script>
		<?php 
	}

?>