<?php
// db에 저장된 id, pwd로 로그인이 완료되면, 나타나는 View 페이지
// 정보 수정, 로그아웃, 탈퇴 기능이 있다.

if($_SERVER['REQUEST_METHOD']=='POST'){
	print "<script>alert('".$this->data."');</script>";
}

if(session_status() != PHP_SESSION_ACTIVE){
	session_start();
}
if(isset($_SESSION['id'])){
	print $_SESSION['id']."님이 접속중입니다... <br><br>";
}else{
	header("Location:loginForm.php");
}
?>
<a href="index.php?action=myInfo&id=<?php print $_SESSION['id']; ?>">내정보 수정</a><br>
<a href="index.php?action=logout">로그아웃</a><br>
<a href="index.php?action=out">탈퇴</a><br>