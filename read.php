<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>

    <style>
        .read_table {
            border: 1px solid #444444;
            margin-top: 30px;
        }

        .read_title {
            height: 45px;
            font-size: 23.5px;
            text-align: center;
            background-color: #3C3C3C;
            color: white;
            width: 1000px;
        }

        .read_id {
            text-align: center;
            background-color: #EEEEEE;
            width: 30px;
            height: 33px;
        }

        .read_id2 {
            background-color: white;
            width: 60px;
            height: 33px;
            padding-left: 10px;
        }

        .read_hit {
            background-color: #EEEEEE;
            width: 30px;
            text-align: center;
            height: 33px;
        }

        .read_hit2 {
            background-color: white;
            width: 60px;
            height: 33px;
            padding-left: 10px;
        }

        .read_content {
            padding: 20px;
            border-top: 1px solid #444444;
            height: 500px;
        }

        .read_btn {
            width: 700px;
            height: 200px;
            text-align: center;
            margin: auto;
            margin-top: 50px;
        }

        .read_btn1 {
            height: 50px;
            width: 100px;
            font-size: 20px;
            text-align: center;
            background-color: white;
            border: 2px solid black;
            border-radius: 10px;
        }

        .read_comment_input {
            width: 700px;
            height: 500px;
            text-align: center;
            margin: auto;
        }

        .read_text3 {
            font-weight: bold;
            float: left;
            margin-left: 20px;
        }

        .read_com_id {
            width: 100px;
        }

        .read_comment {
            width: 500px;
        }
    </style>
</head>

<body>
    <?php
    $conn = mysqli_connect('localhost', 'root', '', 'board');
    $index = $_GET['index'];  // GET 방식 사용
    session_start();
    $sql = "select * from board where number = $index";
    $result = mysqli_query($conn, $sql);
	$row=mysqli_fetch_array($result);
    ?>

    <table class="read_table" align=center>
        <tr>
            <td colspan="4" class="read_title" style="background-color:#618291"><?php echo $row['title'] ?></td>
        </tr>
        <tr>
            <td class="read_id">작성자</td>
            <td class="read_id2"><?php echo $row['id'] ?></td>
        </tr>


        <tr>
            <td colspan="4" class="read_content" valign="top">
                <?php echo $row['content'] ?></td>
        </tr>
    </table>

    <div class="read_btn">
        <button class="read_btn1" onclick="location.href='./index.php'">목록</button>&nbsp;&nbsp;
        <button class="read_btn1" onclick="location.href='./modify.php?number=<?= $row['number'] ?>'">수정</button>&nbsp;&nbsp;
		<button class="read_btn1" a onclick="ask();">삭제</button>

            <script>
                function ask() {
                    if (confirm("게시물을 삭제하시겠습니까?")) {
                        window.location = "./delete.php?number=<?= $row['number'] ?>"
                    }
                }
            </script>
    </div>
	
	<header align=center>
	  <h1>
		<a href="index.php">메인 페이지로 가기</a>
	  </h1>
	</header>
</body>

</html>