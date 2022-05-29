<?php
$conn = mysqli_connect('localhost', 'root', '', 'user');
$id = $_POST['id'];
$password = $_POST['password'];

$sql = "SELECT * FROM user WHERE id ='{$id}' and password ='{$password}'";

if (mysqli_query($conn, $sql)) {
    session_start();
    $_SESSION['userId'] = $id;
    print_r($_SESSION);
    echo $_SESSION['userId'];
    
?>
    <script>
        alert("로그인에 성공하였습니다.")
        location.href = "index.php";
    </script>
<?php
} else {

?>
    <script>
        alert("로그인에 실패하였습니다");
    </script>
<?php
}
?>