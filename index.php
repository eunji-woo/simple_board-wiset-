<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WISET</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css" integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js" integrity="sha384-BOsAfwzjNJHrJ8cZidOg56tcQWfp6y72vEJ8xQ9w6Quywb24iOsW913URv1IS4GD" crossorigin="anonymous"></script>
	
	<style>
	.sub_news,.sub_news th,.sub_news td{border:0}
	.sub_news a{color:#383838;text-decoration:none}
	.sub_news{width:100%;border-bottom:1px solid #999;color:#666;font-size:12px;table-layout:fixed}
	.sub_news caption{display:none}
	.sub_news th{padding:5px 0 6px;border-top:solid 1px #999;border-bottom:solid 1px #b2b2b2;background-color:#f1f1f4;color:#333;font-weight:bold;line-height:20px;vertical-align:top}
	.sub_news td{padding:8px 0 9px;border-bottom:solid 1px #d2d2d2;text-align:center;line-height:18px;}
	.sub_news .date,.sub_news .hit{padding:0;font-family:Tahoma;font-size:11px;line-height:normal}
	.sub_news .title{text-align:left; padding-left:15px; font-size:13px;}
	.sub_news .title .pic,.sub_news .title .new{margin:0 0 2px;vertical-align:middle}
	.sub_news .title a.comment{padding:0;background:none;color:#f00;font-size:12px;font-weight:bold}
	.sub_news tr.reply .title a{padding-left:16px;background:url(첨부파일/ic_reply.png) 0 1px no-repeat}

	</style>

</head>

<body>

	<br>
    <ul class="nav justify-content-end">
        <?php
        if (isset($_SESSION['userId'])) {
            echo "{$_SESSION['userId']}님 환영합니다  ";
        ?>
            <li class="nav-item">
			   <a class="nav-link active" aria-current="page" href="logoutProcess.php">로그아웃 </a>
        <?php
        } else {
        ?>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="register.php">회원가입 </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="login.php">로그인</a>
            </li>

        <?php
        }
        ?>
    </ul>
	
	<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #618291;">
	  <div class="container-fluid">
		<a class="navbar-brand" href="" style="color:white;">WISET</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		  <span class="navbar-toggler-icon"></span>
		</button>
		<?php
        if (isset($_SESSION['userId'])) {
        ?>
		<div class="collapse navbar-collapse" id="navbarNav">
		  <ul class="navbar-nav">
			<li class="nav-item">
			  <a class="nav-link active" aria-current="page" href="write.php" style="color:white;">글쓰기</a>
			</li>
		  </ul>
		</div>
		<?php
		} else
			echo "로그인 후 글 작성이 가능합니다.";
		?>
	  </div>
	</nav>
	
	<table class="sub_news" border="1" cellspacing="0" summary="게시판의 글제목 리스트">
		<caption>게시판 리스트</caption>
		<colgroup>
		<col width="150">
		<col width="18">
		<col width="18">
		</colgroup>
		<thead>
		<br><br>
		<tr>
		<th scope="col">제목</th>
		<th scope="col">글쓴이</th>
		<th scope="col">날짜</th>
		</tr>
		</thead>
		<?php
			$conn = mysqli_connect('localhost', 'root', '', 'board');
			$sql = "select * from board";
			$result = mysqli_query($conn, $sql);
			while($board=mysqli_fetch_array($result)){
		?>
		<tbody>
		<tr>
		<td class="title">
		<a href="read.php?index=<?=$board['number']?>"><?php echo $board['title']?></a>
		</td>
		<td class="name"><?php echo $board['id']?></td>
		<td class="date"><?php echo $board['date']?></td>
		</tr>
		</tbody>
		<?php
			}
		?>
	</table>
</body>

</html>