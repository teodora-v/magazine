<?php
include 'layout.php';
$id = $_GET['articleID'];
$result = $article->getRowsByID($id);
?>
<section class="admin">
	<div class="container form-horizontal">
		<div class="row">
       		<div class="col-lg-12 text-center">
            	<h2 class="section-heading">Преглед на статия</h2>
           	</div>
           	<div class="form-group">
           		<label for="author" class="col-md-2">Заглавие: </label>
           		<div id="author" class="col-md-9"><?php echo $result['title'];?></div>
           	</div>
           	<div class="form-group">
           		<label for="author" class="col-md-2">Автор: </label>
           		<div id="author" class="col-md-9"><?php echo $result['firstname'].' '.$result['lastname'];?></div>
           	</div>
           	<div class="form-group">
           		<label for="author" class="col-md-2">Категория: </label>
           		<div id="author" class="col-md-9">
           		<?php foreach ($categories as $k=>$v) {
					if($k==$result['category']) {
						echo $v;
					}
				}?>
				</div>
           	</div>
           	<div class="form-group">
           		<label for="author" class="col-md-2">Съдържание: </label>
           		<div id="author" class="col-md-9"><?php echo $crypt->encrypt_decrypt('decrypt', $result['content']);?></div>
           	</div>
           	<div class="form-group">
           		<label for="author" class="col-md-2">Изображение: </label>
           		<div id="author" class="col-md-9"><?php 
           			echo '<img class="uploaded-images" src="data:image;base64,'.$result['image'].'">';
           		?></div>
           	</div>
           	<div class="form-group">
           		<label for="author" class="col-md-2">Качена: </label>
           		<div id="author" class="col-md-9"><?php echo $result['uploaded'];?></div>
           	</div>
           	<div class="form-group">
           		<label for="author" class="col-md-2">Качена от: </label>
           		<div id="author" class="col-md-9"><?php echo $result['uploadedby'];?></div>
           	</div>
        </div>
        <div class="row text-center">
          	<a href="adminEdit.php?articleID=<?php echo $id?>"><input type="button" class="btn btn-primary" value="Редакция" /></a>
        </div>
    </div>
</section>