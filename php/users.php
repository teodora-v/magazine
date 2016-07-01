<?php
class Users extends Db{
	public  $isLogged = false;
	public  $userData = array();
	
	public function login($username, $password) {
		//session_start();
		$status = false;
		$query = "SELECT * FROM `users` WHERE `username`='".$username."'"; 
		$result = $this->select($query); 
		if(!empty($result)) {
			$userData = $result[0];
		} 
		if(!empty($userData)) {
			$status = true;
			if(!password_verify($password, $userData['password'])) {
				$status = false;
				$this->userData = array();
				$this->isLogged = $status;
			} else {
				$status = true;
				$this->isLogged = $status;
 				$this->userData = $userData;
			}
		} 
		setcookie('username', $userData['username']); 
		$this->isLogged = (bool) $status;
		return $this->isLogged;
	}
	
	public function isLogged() {
		return $this->isLogged;
	}
	public function getUserData() {
		return $this->userData;
	}
	public function logout(){
		unset($_COOKIE['username']);
		setcookie('username', '', time() - 700000, '/');
		$this->isLogged = false;
		$this->userData = array();
		//session_destroy();
	}
	public function getUserName() {
		return $this->userData['username'];
	}
	public function addUser($username, $password) {
		$query = "INSERT into `users`(`username`, `password`) VALUES ('".$username."', '".$password."')";
		$this->query($query);
	}
}