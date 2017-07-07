<?php
require_once 'controller.php';
$controller = new MemberController($_GET['action']);
$controller->run();
exit;
?>