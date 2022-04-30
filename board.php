

<?php
	include "lib.php";

	$login = $_SESSION['login'];
	if(!$login) {
	?> <script type="text/javascript">
			alert("로그인을 해주세요 !");
	   </script>
	<?php
	exit;
	}
	
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>게시판</title>
	<link href="table.css" rel="stylesheet">
	<style type="text/css">
	.search {
	  position: relative;
	  width: 300px;
	  
	}

	input {
	  width: 100%;
	  border: 1px solid #bbb;
	  border-radius: 8px;
	  padding: 10px 12px;
	  font-size: 14px;
	  
	}
	

	
	</style>
</head>
<body>
	<h1>자유게시판</h1>
	<p>
		<form action="search.php" method="post">
			<div class="search">
				<select dir="rtl" name="option">
					<option value="title">제목</option>
					<option value="contents">내용</option>
					<option value="all">전체</option>
				</select>
  				<input type="text" placeholder="검색어 입력" name="search">
			</div>
		</form>
		
	</p>
	
	<table width="800">
		<tr>
			<th>번호</th>
			<th>제목</th>
			<th>작성자</th>
			<th>시간</th>
			<th>조회수</th>
		</tr>
		<?php
			include "lib.php";
			$query = "SELECT * FROM board order by idx desc";
			$result = mysqli_query($connect,$query);
			
			
			

			while($data = mysqli_fetch_array($result)) {
		?>
				<tr>
					<td> <?= $data['idx']?> </td>
			   		<td><a href="/P4C_W1-master/P4C_W1-master/crud/read.php?idx=<?= $data['idx'] ?>"><?= $data['title']?></a></td>
			   		<td><?=$data['user']?></td>
			   		<td><?= $data['time']?></td>
					<td><?= $data['view']?></td>
			   	</tr>
				
			   <?php
			}

		?>


	</table>
	<a href="crud/write.html">글쓰기</a>
</body>
</html>