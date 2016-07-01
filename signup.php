<?php include 'php/instances.php';
if(isset($_POST['signup'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$confirm = $_POST['confirmpassword'];
	$errors = array();
	if(validateSignUp($username, $password, $confirm, $errors)) {
		$password = password_hash($password, PASSWORD_DEFAULT);
		$user->addUser($username, $password);
		header('Location: login.php');
	} 
}
function validateSignUp($username, $password, $confirm, &$errors) {
	$messages = array('username'=>  'РњРѕР»СЏ РІСЉРІРµРґРµС‚Рµ РїРѕС‚СЂРµР±РёС‚РµР»СЃРєРѕ РёРјРµ!', 'password'=>'РњРѕР»СЏ РІСЉРІРµРґРµС‚Рµ РїР°СЂРѕР»Р°!' );
	if ($password !== $confirm) {
		$messages['confirm'] = 'РџР°СЂРѕР»РёС‚Рµ РЅe СЃСЉРІРїР°РґР°С‚!';
	}
	foreach ($messages as $message) {
		if(empty($password) || empty($username)) {
			$errors[] = $message;
		}
	}
	return empty($errors);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<link href="css/login.css" rel="stylesheet">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<script src="js/jquery.js"></script>
</head>
<body>
	<div class="login-page">
  <div class="form">
    <form class="login-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <input type="text" placeholder="Потребителско име" name="username" id="username"/>
      <input type="password" placeholder="Парола" name="password" id="password"/>
      <input type="password" placeholder="Повторете паролата" name="confirmpassword" id="confirmpassword" onkeyup="checkPasswordMatch(); return false;"/>
      <span id="confirmMessage"></span>
      <button type="submit" name ="signup">Регистрация</button>
      <?php if(!empty($errors)) {
      			echo '<span class="alert alert-danger">'.implode('', $errors) .'</span>';  
      		}?>
    </form>
  </div>
</div>
<script>
function checkPasswordMatch() {
	        var password = $("#password").val();
	        var confirmPassword = $("#confirmpassword").val();	
	        if (password != confirmPassword) {
	        	$('#confirmpassword').css('border', '1px solid #ef4750');
	        	$('#confirmMessage').css('color', '#ef4750');	
	        	$('#confirmMessage').html('<?php echo 'Passwords do not match!'?>'); 
	        } else {
	        	$('#confirmpassword').css('border', '1px solid green');
	        	$('#confirmMessage').css('color', 'green');
	        	$('#confirmMessage').html('<?php echo 'Passwords match!'?>');
	        }
	    }
</script>
</body>
