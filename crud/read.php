<?php 
	include '../lib.php';
	
	$idx = $_GET['idx'];
	$_SESSION['idx'] = $idx;
	$query = "SELECT * FROM board WHERE idx=$idx";
	$result = mysqli_query($connect,$query);
	$data = mysqli_fetch_array($result);

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>게시판</title>
	<link href="../table.css" rel="stylesheet">
</head>
<body>
	<table  width="800">
		<tr>
			<th width="100px">제목</th>
			<td> <?=$data['title']?></td>
		</tr>

		<tr>
			<th>내용</th>
			<td><?= nl2br($data['contents'])?></td>
		</tr>

			<?php 
				if($data['file'])
				{
					?>
					<tr>
					<th>파일</th>
						<td><a href="./file/<?=$data['file']?>" download><?=$data['file']?></a></td>
					</tr>
					<?php
				}
			?>
			

		<tr>
			<th>추천</th>
			<td><?= $data['like_board']?></td>	
			<td>
				<form action="like.php" method="post">
					<input type="submit" value="추천하기">
				</form>
			</td>
		</tr>
		
	</table>
	<p>
		<a href="../board.php">게시판</a>
		<?php 
			if ($_SESSION['login'] == $data['user']) {
			?> <a href="delete.php?idx=<?=$idx?>">글 삭제</a>
			<?php }
		?>
		
	</p>
	<form action="comment.php" method="post">
		<h3>댓글 작성</h3>
		<p><textarea rows="5" cols="50" name = "contents-comment"></textarea></p>
		<input type="submit" value="댓글 작성" style="padding-right: 15px;padding-left: 15px;">
	</form>
	<h3>댓글 목록</h3>
	<?php 
	$query = "SELECT * FROM comment WHERE idx_comment=$idx order by idx desc";
	$result_comment = mysqli_query($connect,$query);
	while($data_comment = mysqli_fetch_array($result_comment)) {
		?>

		<div style="border: 1px solid black;">
			<h4>ID : <?=$data_comment['user']?></h6>
			<h3><?=$data_comment['contents']?></h3>
		</div>
		<?php

	}

	?>

	<?php 
		$idx = $_GET['idx'];
		if(!isset($_COOKIE['board_'.$idx]))
		{
			$view = $data['view'] + 1;
			$sql = "UPDATE board  set view='$view' WHERE idx='$idx'";
			mysqli_query($connect,$sql);
			setcookie('board_'.$idx,$idx,time() + 3600);
		}
		
		
	?>
	
</body>
</html>