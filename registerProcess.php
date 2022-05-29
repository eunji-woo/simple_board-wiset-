<?php
$conn = mysqli_connect('localhost', 'root', '', 'user');
$sql = "
    INSERT INTO user
    (id, email, password, created)
    VALUES('{$_POST['id']}', '{$_POST['email']}', '{$_POST['password']}', NOW())";
	
$result = mysqli_query($conn, $sql);

if ($result === false) {
    echo "저장에 문제가 생겼습니다. 관리자에게 문의해주세요.";
    echo mysqli_error($conn);
} else {
?>
    <script>
        alert("회원가입이 완료되었습니다");
        location.href = "index.php";
    </script>
<?php
}
?>