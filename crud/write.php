<?php 
	include "../lib.php";

	$title = $_POST['title'];
	$contents = $_POST['contents'];
	$login = $_SESSION['login'];

	$file_tmp = $_FILES['file']['tmp_name'];
	$file_name = $_FILES['file']['name'];


	if(move_uploaded_file($file_tmp, "./file/".$file_name))
	{
		$sql = "INSERT INTO board (title,contents,time,user,file,like_board) VALUES('$title','$contents',NOW(),'$login','$file_name',0)";
		mysqli_query($connect,$sql);
	}
	else
	{
		$sql = "INSERT INTO board (title,contents,time,user,like_board) VALUES('$title','$contents',NOW(),'$login',0)";
		mysqli_query($connect,$sql);
	}
	?>
	<script type="text/javascript">
		location.href = "../board.php";
	</script>
	<?


?>