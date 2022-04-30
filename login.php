<?php 
	include "lib.php";

	$id = $_POST['Id'];
	$pw = $_POST['Password'];


	$id = mysqli_real_escape_string($connect,$id);
	$pw = mysqli_real_escape_string($connect,$pw);


	$sql = "SELECT * FROM login WHERE id='$id'and password='$pw'";

	$data = mysqli_query($connect,$sql);
	$result = mysqli_fetch_array($data);
	



	if($result) {
		$_SESSION['login'] = $id;
		?>
		<script type="text/javascript">
			alert("로그인 성공 !");
			location.href="board.php";
		</script>
		<?php
	} else {
		?>
		<script type="text/javascript">
			alert("회원 정보가 잘못되었습니다 !");
			location.href="login.html";
		</script>
		<?php 

	}

?>