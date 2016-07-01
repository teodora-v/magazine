<?php
class Articles extends Db {
	
	public function addRow($data){
		$query = "INSERT into `articles` (`title`, `firstname`, `lastname`, `content`, `category`, `image`,
										`imgname`, `uploaded`, `uploadedby`)
					VALUES ('".$data['title']."', '".$data['firstname']."', '".$data['lastname']."', '".$data['content']."', 
							".$data['category'].", '{$data['image']}', '{$data['imgname']}' ,
							'".$data['uploaded']."', '".$data['uploadedby']."')"; 
		return $this->query($query);
		
	}
	
	public function getRowsByID($id) {
		$query = "SELECT * FROM `articles` WHERE `id`=$id;";
		$result = $this->select($query);
		return $result[0];
	}
	
	public function getAllRowsByUser($username) {
		$query = "SELECT * FROM `articles` WHERE `uploadedby` = '".$username."';";
		$result = $this->query($query);
		return $result;
	}
	
	public function modRow($data, $id) {
		$query = "UPDATE `articles` SET `title`='".$data['title']."', `firstname`='".$data['firstname']."', 
				`lastname`= '".$data['lastname']."', `content`='".$data['content']."', `category`='".$data['category']."' 
				WHERE `id`=".$id;
		return $this->query($query);
	}
	
	public function delRow($id) {
		$query = "DELETE FROM `articles` WHERE `id` = $id";
		return $this->query($query);
	}
	
	public function listItems() {
		$query = 'SELECT * FROM `articles` order by uploaded desc;';
		$result = $this->select($query);
		return $result;
	}
	
	public function listByCategory($category) {
		$query = 'SELECT * FROM `articles` where category='.$category.' order by uploaded desc;';
		$result = $this->select($query);
		return $result;
	}
}
