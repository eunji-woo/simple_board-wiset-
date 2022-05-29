<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <style>
        table.table2 {
            border-collapse: separate;
            border-spacing: 1px;
            text-align: left;
            line-height: 1.5;
            border-top: 1px solid #ccc;
            margin: 20px 10px;
        }

        table.table2 tr {
            width: 50px;
            padding: 10px;
            font-weight: bold;
            vertical-align: top;
            border-bottom: 1px solid #ccc;
        }

        table.table2 td {
            width: 100px;
            padding: 10px;
            vertical-align: top;
            border-bottom: 1px solid #ccc;
        }
    </style>
</head>

<body>
    <?php
    $conn = mysqli_connect('localhost', 'root', '', 'board');
    $number = $_GET['number'];
    $sql = "select * from board where number = $number";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    $title = $row['title'];
    $content = $row['content'];
    $userid = $row['id'];

    session_start();

    $URL = "./index.php"; 

    if (!$_SESSION['userId']) { 
    ?> <script>
            alert("로그인 후 이용해주세요.");
            location.replace("login.php");
        </script>
    <?php   } else if ($_SESSION['userId'] == $userid) {
    ?>
        <form method="POST" action="modifyProcess.php">
            <table style="padding-top:50px" align=center width=auto border=0 cellpadding=2>
                <tr>
                    <td style="height:40; float:center; background-color:#3C3C3C">
                        <p style="font-size:25px; text-align:center; color:white; margin-top:15px; margin-bottom:15px"><b>게시글 수정하기</b></p>
                    </td>
                </tr>
                <tr>
                    <td bgcolor=white>
                        <table class="table2">
                            <tr>
                                <td>작성자</td>
                                <td><input type="hidden" name="id" value="<?= $_SESSION['userId'] ?>"><?= $_SESSION['userId'] ?></td>
                            </tr>

                            <tr>
                                <td>제목</td>
                                <td><input type=text name=title size=87 value="<?= $title ?>"></td>
                            </tr>

                            <tr>
                                <td>내용</td>
                                <td><textarea name=content cols=75 rows=15><?= $content ?></textarea></td>
                            </tr>

                        </table>

                        <center>
                            <input type="hidden" name="number" value="<?= $number ?>">
                            <input style="height:26px; width:47px; font-size:16px;" type="submit" value="수정">
                        </center>
                    </td>
                </tr>
            </table>
        </form>
    <?php   } else {
    ?> <script>
            alert("권한이 없습니다.");
            location.replace("<?php echo $URL ?>");
        </script>
    <?php   }
    ?>
	
	<header align=center>
	  <h1>
		<a href="index.php">메인 페이지로 가기</a>
	  </h1>
	</header>
</body>

</html>