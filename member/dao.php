<?php
require_once 'dto.php';
class HobbyDao {
	private $conn = null;
	public function connect() {
		try {
			$this->conn = new PDO ( 'mysql:host=localhost;dbname=mydb;charset=utf8', 'hr', 'hr' );
			$this->conn->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			$this->conn->setAttribute ( PDO::ATTR_EMULATE_PREPARES, false );
		} catch ( PDOException $e ) {
			print $e->getMessage ();
		}
	}
	public function disconnect() {
		$this->conn = null;
	}
	public function selectAll() {
		$arr = array ();
		$this->connect ();
		$sql = "select * from hobby";
		$result = null;
		try {
			$result = $this->conn->query ( $sql );
			$cnt = $result->rowCount ();
			if ($cnt > 0) {
				while ( $row = $result->fetch ( PDO::FETCH_ASSOC ) ) {
					$arr [] = new Hobby ( $row ['id'], $row ['name'] );
				}
			}
		} catch ( Exception $e ) {
			print $e->getMessage ();
		}
		$this->disconnect ();
		return $arr;
	}
}
class MemberDao {
	private $conn = null;
	public function connect() {
		try {
			$this->conn = new PDO ( 'mysql:host=localhost;dbname=mydb;charset=utf8', 'hr', 'hr' );
			$this->conn->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			$this->conn->setAttribute ( PDO::ATTR_EMULATE_PREPARES, false );
		} catch ( PDOException $e ) {
			print $e->getMessage ();
		}
	}
	public function disconnect() {
		$this->conn = null;
	}
	public function insert($m) {
		$this->connect();
		try {
			$sql = "insert into member values(?,?,?,?,?,?)";
			$stm = $this->conn->prepare ( $sql );
			$stm->bindValue ( 1, $m->getId () );
			$stm->bindValue ( 2, $m->getPwd () );
			$stm->bindValue ( 3, $m->getName () );
			$stm->bindValue ( 4, $m->getEmail () );
			$stm->bindValue ( 5, $m->getHobby () );
			$stm->bindValue ( 6, $m->getMsg () );
			$stm->execute ();
		} catch ( PDOException $e ) {
			print $e->getMessage ();
		}
		$this->disconnect();
	}
	public function select($id) {
		$m = null;
		$this->connect();
		try {
			$sql = "select * from member where id=?";
			$stm = $this->conn->prepare ( $sql );
			$stm->bindValue ( 1, $id );			
			$stm->execute ();
			$cnt = $stm->rowCount();
			if($cnt > 0){
				$row = $stm->fetch(PDO::FETCH_ASSOC);
				$m = new Member($row['id'],$row['pwd'],$row['name'],
						$row['email'],$row['hobby'],$row['msg']);
			}
		} catch ( PDOException $e ) {
			print $e->getMessage ();
		}
		$this->disconnect();
		return $m;
	}
	public function update($m) {
		$this->connect();
		try {
			$sql = "update member set pwd=?, email=?, hobby=?, msg=? where id=?";
			$stm = $this->conn->prepare ( $sql );
			$stm->bindValue ( 1, $m->getPwd () );
			$stm->bindValue ( 2, $m->getEmail () );
			$stm->bindValue ( 3, $m->getHobby () );
			$stm->bindValue ( 4, $m->getMsg () );
			$stm->bindValue ( 5, $m->getId () );
			$stm->execute();
		} catch ( PDOException $e ) {
			print $e->getMessage ();
		}
		$this->disconnect();
	}
	public function delete($id) {
		$this->connect();
		try {
			$sql = "delete from member where id=?";
			$stm = $this->conn->prepare ( $sql );
			$stm->bindValue ( 1, $id );
			$stm->execute ();
		} catch ( PDOException $e ) {
			print $e->getMessage ();
		}
		$this->disconnect();
	}
}
?>






