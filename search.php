<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>검색 결과</title> 
	<link href="table.css" rel="stylesheet">
</head>
<body>
	<h1>검색 결과</h1>
	<table width="800">
			<tr>
				<th>번호</th>
				<th>제목</th>
				<th>작성자</th>
				<th>시간</th>
			</tr>
	<?php 
		include "lib.php";

		function db($result)
		{
			while($data = mysqli_fetch_array($result)) {
				?>
				<tr>
					<td> <?= $data['idx']?> </td>
					<td><a href="/P4C_W1-master/P4C_W1-master/crud/read.php?idx=<?= $data['idx'] ?>"><?= $data['title']?></a></td>
					<td><?=$data['user']?></td>
					<td><?=$data['time']?></td>
				</tr>
				<?php
				}
		}

		$search = $_POST['search'];

		$sql = "SELECT * FROM board WHERE title = '$search'";
		$result = mysqli_query($connect,$sql);
		
		if($_POST['option'] == 'title')
		{
			db($result);
				
		}
		elseif($_POST['option'] == 'contents') {
			$sql = "SELECT * FROM board WHERE contents = '$search'";
			$result = mysqli_query($connect,$sql);
			db($result);
		}

		?>
		

		</table>

		
		
</body>
</html>