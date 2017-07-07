<?php
class Hobby{
	private $id;
	private $name;
	
	public function __construct($id, $name){
		$this->id = $id;
		$this->name = $name;
	}
	
	public function setId($id){
		$this->id = $id;
	}
	public function getId(){
		return $this->id;
	}
	public function setName($name){
		$this->name = $name;
	}
	public function getName(){
		return $this->name;
	}
}

class Member{
	private $id;
	private $pwd;
	private $name;
	private $email;
	private $hobby;
	private $msg;
	
	public function __construct($id, $pwd, $name, $email, $hobby, $msg){
		$this->id = $id;
		$this->pwd = $pwd;
		$this->name = $name;
		$this->email = $email;
		$this->hobby = $hobby;
		$this->msg = $msg;
	}
	
	public function setId($id){
		$this->id = $id;
	}
	public function getId(){
		return $this->id;
	}
	public function setPwd($pwd){
		$this->pwd = $pwd;
	}
	public function getPwd(){
		return $this->pwd;
	}
	public function setName($name){
		$this->name = $name;
	}
	public function getName(){
		return $this->name;
	}
	public function setEmail($email){
		$this->email = $email;
	}
	public function getEmail(){
		return $this->email;
	}
	public function setHobby($hobby){
		$this->hobby = $hobby;
	}
	public function getHobby(){
		return $this->hobby;
	}
	public function setMsg($msg){
		$this->msg = $msg;
	}
	public function getMsg(){
		return $this->msg;
	}
}
?>












