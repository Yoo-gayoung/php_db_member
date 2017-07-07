<?php
require_once 'service.php';
class MemberController{
	private $hService;
	private $mService;
	private $action;
	private $data;
	private $view;
	private $m;
	
	public function __construct($action){
		$this->hService = new HobbyService();
		$this->mService = new MemberService();
		$this->action = $action;
	}
	public function run(){
		switch ($this->action){
			case "join":
				$this->join();
				break;
			case "login":
				$this->login();
				break;
			case "editInfo":
				$this->editInfo();
				break;
			case "myInfo":
				$this->myInfo();
				break;
			case "logout":
				$this->logout();
				break;
			case "out":
				$this->out();
				break;
			case "joinForm":
				$this->joinForm();
				break;
		}
		require 'view/'.$this->view;
	}
	public function join(){
		$str = implode(",", $_POST['hobby']);
		$m = new Member($_POST['id'],$_POST['pwd'],$_POST['name'],
				$_POST['email'],$str,$_POST['msg']);
		$this->mService->join($m);
		$this->data = "가입되었습니다.";
		$this->view = "loginForm.php";
	}
	public function hobbyList(){
		$this->data = $this->hService->getAll();
	}
	
	public function joinForm(){
		$this->hobbyList();
		$this->view = "joinForm.php";
	}
	
	public function login(){
		$tmp=$this->mService->login($_POST['id'],$_POST['pwd']);
		if($tmp==1){
			// 아이디가 존재하지 않음.
			$this->data = "없는 아이디입니다.";
			$this->view = "loginForm.php";
		}else if($tmp==2){
			// 패스워드 틀림.
			$this->data = "잘못된 패스워드입니다.";
			$this->view = "loginForm.php";
		}else{
			$this->data = "로그인에 성공하였습니다.";
			$this->view = "main.php";
		}
	}
	
	public function logout(){
		$this->mService->logout();
		$this->view = "loginForm.php";
	}
	
	public function myInfo(){
		$id=$_GET['id'];
		$this->m = $this->mService->getMember($id);
		$this->hobbyList();
		$this->view = "editForm.php";
	}
	
	public function out(){
		$this->mService->out();
		$this->data = "탈퇴되었습니다.";
		$this->view = "loginForm.php";
	}
	
	public function editInfo(){
		$str = implode(",", $_POST['hobby']);
		$mem = new Member($_GET['id'],$_POST['pwd'],$_POST['name'],$_POST['email'],$str,$_POST['msg']);
		$this->mService->editInfo($mem);
		$this->data = "수정되었습니다.";
		$this->view = "main.php";
	}
	
}
?>