<?php 
	include "../lib.php";

	$idx = $_SESSION['idx'];

	$query = "SELECT * FROM board WHERE idx='$idx'";
	$result = mysqli_query($connect,$query);
	$data = mysqli_fetch_array($result);

	$like = $data['like_board'] + 1;

	$query = "UPDATE board set like_board='$like' WHERE idx = '$idx'";

	mysqli_query($connect,$query);


	?>
	<script type="text/javascript">
		location.href="read.php?idx=<?= $data['idx'] ?>"
	</script>
	<?php 




?>