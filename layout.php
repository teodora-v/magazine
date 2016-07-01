<?php include 'php/instances.php';
if(isset($_POST['logout'])) {
	$user->logout();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Web Magazine</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/agency.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" style="background-color: black;">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                	<?php if($user->isLogged()) {?>
	            	<li><a class="page-scroll" href="#"><?php echo 'Добре дошли, '.$user->getUserName();?></a></li>
	            	<li><a class="page-scroll" href="adminList.php">Админ панел </a></li>
	            	<?php }?>
                    <li>
                        <a class="page-scroll" href="index.php">Новини</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="uni.php">ФМИ</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="internet.php">Интернет</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="mobile.php">Мобилен свят</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="about.php">За мен</a>
                    </li>
                    <li id="button_account">
                    	<a class="page-scroll" href="login.php" data-toggle="tooltip" title="Вход" ><i class="glyphicon glyphicon-user"></i></a> 
                    </li>
                    <li id="button_reg">
                    	<a class="page-scroll" href="signup.php" data-toggle="tooltip" title="Регистрация"><i class="glyphicon glyphicon-plus-sign"></i></a> 
                    </li>
                    <?php if($user->isLogged()) {?>   
                    <li id="logout">
                    	<form action="index.php" method="post">
	                    	<a><button class="btn btn-primary" type="submit" name="logout">
	                    	<i class="glyphicon glyphicon-log-out" data-toggle="tooltip" title="Изход"></i>
	                    	</button></a>
                    	</form>
                    </li>  
                    <?php }?>             
                </ul>
            </div>
        </div>
    </nav>
    <?php 
    
    ?>
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/classie.js"></script>
    <script src="js/cbpAnimatedHeader.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/agency.js"></script>
	<script>
		<?php if($user->isLogged()) {?>
		document.querySelector("#button_account").style.display = 'none';
		document.querySelector("#button_reg").style.display = 'none';
		
		<?php } else {?>
		document.querySelector("#button_account").style.display = 'block';
		document.querySelector("#button_reg").style.display = 'block';
		<?php }?>
	</script>
</body>

</html>
