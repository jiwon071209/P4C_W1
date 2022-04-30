<?php 
	include "../lib.php";

	$idx = $_GET['idx'];
	$sql = "DELETE FROM board WHERE idx=$idx";
	$result = mysqli_query($connect,$sql);
?> <script type="text/javascript">
		location.href = "../board.php";
   </script>
