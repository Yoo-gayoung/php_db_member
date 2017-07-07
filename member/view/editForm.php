<?php
// db에 저장된 정보들을 수정하기 위해 정보를 입력받을 View 페이지
?>
<html>
<body>
	<form action="/db_member/index.php?action=editInfo&id=<?php print $this->m->getId(); ?>" method="post" name="f">
		<table border="0" cellspacing="2">
			<caption>
				<h3>회원 정보 수정</h3>
			</caption>
			<tr>
				<td>id</td>
				<td><?php print $this->m->getId(); ?><br></td>
			</tr>

			<tr>
				<td>pwd</td>
				<td><input type="text" name="pwd" value="<?php print $this->m->getPwd(); ?>" ><br></td>
			</tr>

			<tr>
				<td>name</td>
				<td><input type="text" name="name" value="<?php print $this->m->getName();?>" readonly><br></td>
			</tr>

			<tr>
				<td>email</td>
				<td><input type="text" name="email" value="<?php print $this->m->getEmail();?>"><br></td>
			</tr>

			<tr>
				<td>취미</td>
				<td>
				<?php 
				$arr = explode(",",$this->m->getHobby());
				$opt="";
				foreach($this->data as $v){
					foreach($arr as $num){
						if($v->getId()==$num){
							$opt="checked";
						}
					}
					print "<input type='checkbox' name='hobby[]' value='".$v->getId()."' ".$opt.">".$v->getName();
					foreach($arr as $num){
						if($v->getID()==$num){
							$opt="";
						}
					}
				}
				?>
				
				</td>
			</tr>
			<tr>
				<td>가입인사</td>
				<td><textarea cols="45" rows="5" name="msg" ><?php print $this->m->getMsg(); ?></textarea><br></td>
			</tr>

			<tr>
				<td>
				<input type="submit" value="수정"> 
				<input type="reset" value="취소">
				</td>
			</tr>
		</table>
	</form>
</body>
</html>
