<?php 
if($_SERVER['REQUEST_METHOD']=='POST' && $this->action=='login'){
	print "<script>alert('".$this->data."');</script>";
}
?>
<html>
<body>

<h3>로그인</h3>
<form action="/web1/member/index.php?action=login" method="post">
<pre>
 id:<input type="text" name="id"><br>
pwd:<input type="text" name="pwd"><br>
                <input type="submit" value="login"><br>
                <a href="/web1/member/index.php?action=joinForm">회원가입</a>
</pre>
</form>
</body>
</html>