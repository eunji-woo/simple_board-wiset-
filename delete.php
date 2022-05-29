<?php
$conn = mysqli_connect('localhost', 'root', '', 'board');
$number = $_GET['number'];

$sql1 = "select id from board where number = $number";
$result1 = mysqli_query($conn, $sql1);
$row = mysqli_fetch_array($result1);

$userid = $row['id'];

session_start();

$URL = "./index.php";
?>

<?php
if (!isset($_SESSION['userId'])) {
?> <script>
        alert("권한이 없습니다.");
        location.replace("<?php echo $URL ?>");
    </script>

<?php } else if ($_SESSION['userId'] == $userid) {
    $sql2 = "delete from board where number = $number";
    $result2 = mysqli_query($conn, $sql2); ?>
    <script>
        alert("게시글이 삭제되었습니다.");
        location.replace("<?php echo $URL ?>");
    </script>

<?php } else { ?>
    <script>
        alert("권한이 없습니다.");
        location.replace("<?php echo $URL ?>");
    </script>
<?php }
?>