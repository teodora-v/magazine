<?php 
ob_start();
include 'php/instances.php';
$error = '';
if(isset($_POST['login'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	if($user->login($username, $password)){
		header( 'Location: index.php' );
	} else {
		$error = 'Грешна парола';
	}
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
      <input type="text" placeholder="username" name="username"/>
      <input type="password" placeholder="password" name="password"/>
      <button type="submit" name ="login">Р’С…РѕРґ</button>
      <?php if($error!==''){
			echo '<span class="error-msg alert alert-danger">'.$error.'</span>';
		}?>
    </form>
  </div>
</div>
</body>
</html>