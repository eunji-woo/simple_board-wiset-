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

    if ($_SESSION['userId']) 
	{
		if ($_SESSION['userId'] == $userid){
			echo "권한이 있습니다1.";
		}
	}	
	else {
		echo $_SESSION['userId'];
		echo "$userid";
	}
    ?>
</body>

</html>