<?php
include  'Db.php';
include 'twoWayEncryption.php';
include 'articles.php';
include 'users.php';
$db = new Db();
$crypt = new Crypt();
$article = new Articles();
$user = new Users();
$db->connect();

$categories = array(
		1=>'ФМИ',
		2=>	'Интернет',
		3=>'Мобилен свят',
);
if(isset($_COOKIE['username'])) {
	$user->userData['username'] = $_COOKIE['username'];
	$user->isLogged = true;
}