<?php

session_start();

include_once "../database.php";

if (!$_REQUEST) {
  // if ($_SESSION['isLogin'] === true) {
  //   exit;
  // }
  header('Location: login.htm');
  exit;
}

$username = $_REQUEST['loginFormUsername'];
$password = $_REQUEST['loginFormPassword'];

$query = "select * from `User` where TenUser = '" . $username . "' and MatKhau = '" . $password . "'";

$db_result = $db->query($query)->fetchAll(PDO::FETCH_ASSOC);

if (count($db_result) <= 0) {
  header('Location: login.html');
  exit;
}

$_SESSION['username'] = $username;
$_SESSION['isLogin'] = true;

header('Location: ../book/Sach.php');