<script>	
const data = confirm("로그아웃 하시겠습니까?");
if (data) {
	<?php
		session_start();
		session_destroy();
	?>
	location.href = "index.php";
}

else{
	location.href = "index.php";
}
</script>