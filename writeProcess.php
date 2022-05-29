<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'board');
$conn2 = mysqli_connect('localhost', 'root', '', 'user');

$title = $_POST['title'];
$content = $_POST['content'];
$id = $_SESSION['userId'];
$passwd = $_POST['passwd'];

$sql0 = "select * from user where id ='$id'";
$result0 = mysqli_query($conn2, $sql0);
$row=mysqli_fetch_array($result0);

if( $row['password'] == $passwd){

	$sql_count = "select count(*) from board";
	$result1 = mysqli_query($conn, $sql_count);
	$number=mysqli_fetch_array($result1);


	$sql = "INSERT INTO board(number, title, content, date, id, passwd) VALUES($number[0], '$title', '$content', now(), '$id', '$passwd')";
		
	$result2 = mysqli_query($conn, $sql);

	if ($result2 === false) {
		echo "저장에 문제가 생겼습니다. 관리자에게 문의해주세요.";
		echo mysqli_error($conn); 
	} else {
	?>
		<script>
			alert("글 작성 완료!");
			location.href = "index.php";
		</script>
	<?php
	}
}
else{
	?>
	<script>
		alert("비밀번호가 일치하지 않습니다.");
		history.back();
	</script>
	<?php
}
?>