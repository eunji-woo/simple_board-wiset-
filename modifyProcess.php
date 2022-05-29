<?php
$conn = mysqli_connect('localhost', 'root', '', 'board');

$number = $_POST['number'];
$title = $_POST['title'];
$content = $_POST['content'];


$sql = "update board set title='$title', content='$content' where number=$number";
$result = mysqli_query($conn, $sql);

if ($result) {
?>
    <script>
        alert("수정되었습니다.");
        location.replace("read.php?index=<?=$number?>");
    </script>
<?php } else {
    echo "다시 시도해주세요.";
}
?>