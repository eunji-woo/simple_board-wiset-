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
    <form method="post" action="writeProcess.php">
        <table style="padding-top:50px" align=center width=auto border=0 cellpadding=2>
            <tr>
                <td style="height:40; float:center; background-color:#618291">
                    <p style="font-size:25px; text-align:center; color:white; margin-top:15px; margin-bottom:15px"><b>글 작성</b></p>
                </td>
            </tr>
            <tr>
                <td bgcolor=white>
                    <table class="table2">
                        <tr>
                            <td>제목</td>
                            <td><input type="text" name="title" id="title" size=70></td>
                        </tr>

                        <tr>
                            <td>내용</td>
                            <td><textarea name="content" id="content" cols=75 rows=15 maxlength=999></textarea></td>
                        </tr>

                        <tr>
                            <td>비밀번호</td>
                            <td><input type="password" name="passwd" id="passwd" size=15 maxlength=30></td>
                        </tr>
                    </table>

                    <center>
                        <input style="height:26px; width:47px; color:#618291; font-size:16px;" type="submit" value="작성">
                    </center>
                </td>
            </tr>
        </table>
    </form>
	<header align=center>
	  <h1>
		<a href="index.php">메인 페이지로 가기</a>
	  </h1>
	</header>
</body>

</html>