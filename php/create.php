<?php 
$uploadedBy = $user->getUserName();
if(isset($_POST['add'])) {
	$title = $_POST['title'];
	$content = $crypt->encrypt_decrypt('encrypt', $_POST['content']);
	$data = array();
	if(getimagesize($_FILES['pic']['tmp_name']) == false){
		error_log('Please select an image!');
	} else {
		$image = addslashes($_FILES['pic']['tmp_name']);
		$name = addslashes($_FILES['pic']['name']);
		$image = file_get_contents($image);
		$image = base64_encode($image);
	}
	$data = array('title'=>$title, 
				'firstname'=>$_POST['firstname'],
				'lastname'=>$_POST['lastname'],
				'content'=>$content,
				'category'=> $_POST['category'],
				'image'=>$image,
				'imgname'=>$name,
				'uploaded'=>date('Y-m-d h:i:s', time()),
				'uploadedby'=>$uploadedBy
	);
	
	if($article->addRow($data)){
		echo '<script>window.location = "adminList.php"</script>';
	}

}


if(isset($_GET['deleteID'])) {
	$id=$_GET['deleteID'];
	$query = "DELETE FROM `articles` WHERE id=$id";

	if($article->delRow($id)){
		echo '<script>window.location="adminList.php"</script>';
	}
}
