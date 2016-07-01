<?php
if(isset($_POST['edit'])) {
	$curID = $_POST['id']; 
	$title = $_POST['title'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$content = $crypt->encrypt_decrypt('encrypt', $_POST['content']);
	$category = $_POST['category'];
	
	$data = array('title'=>$title,
			'firstname'=>$firstname,
			'lastname'=>$lastname,
			'content'=>$content,
			'category'=> $category
	);
	
	if($article->modRow($data, $curID)){
		echo '<script>window.location = "adminList.php"</script>';
	}
}