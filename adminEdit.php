<?php
include 'layout.php';
include 'php/edit.php';
$id = $_GET['articleID'];
$result = $article->getRowsByID($id);
?>
<section class="admin">
	<div class="container form-horizontal">
		<div class="row">
       		<div class="col-lg-12 text-center">
            	<h2 class="section-heading">Редакция</h2>
           	</div>
           	<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
           		<input type="hidden" name="id" value="<?php echo $result['id'];?>" />
	           	<div class="form-group">
	           		<label for="author" class="col-md-2">Заглавие: </label>
	           		<div id="author" class="col-md-9">
	           			<input class="form-control" name="title" value="<?php echo $result['title'];?>" />
	           		</div>
	           	</div>
	           	<div class="form-group">
	           		<label for="author" class="col-md-2">Автор(име): </label>
	           		<div id="author" class="col-md-9">
	           			<input class="form-control" name="firstname" value="<?php echo $result['firstname'];?>" />
	           		</div>
	           	</div>
	           	<div class="form-group">
	           		<label for="author" class="col-md-2">Автор(фамилия) </label>
	           		<div id="author" class="col-md-9">
	           			<input class="form-control" name="lastname" value="<?php echo $result['lastname'];?>" />
	           		</div>
	           	</div>
	           	<div class="form-group">
	           		<label for="author" class="col-md-2">Категория: </label>
	           		<div class="col-md-9">
	           			<select class="form-control" name="category">
	           			<?php 
	           			foreach ($categories as $k=>$v){
	           				echo '<option value="'.$k.'"'.($k==$result['category'] ? 'selected="selected"' : '').'>'.htmlspecialchars($v).'</option>';
	           			}
	           			?>
	           			</select>
					</div>
	           	</div>
	           	<div class="form-group">
	           		<label for="author" class="col-md-2">Съдържание: </label>
	           		<div id="author" class="col-md-9">
	           			<textarea name="content" class="autoExpand form-control" rows="3" data-min-rows="3"><?php echo $crypt->encrypt_decrypt('decrypt', $result['content']);?></textarea>      		
	           		</div>
	           	</div>
	           	<div class="form-group">
	           		<label for="author" class="col-md-2">Качена: </label>
	           		<div id="author" class="col-md-9"><?php echo $result['uploaded'];?></div>
	           	</div>
				<div class="form-group">
	           		<label for="author" class="col-md-2">Качена от: </label>
	           		<div id="author" class="col-md-9"><?php echo $result['uploadedby'];?></div>
	           	</div>
	           	<div class="col-lg-12 text-center">
                	<input type="submit" name="edit" class="btn btn-primary" value="Запази"/>
                </div>
           	</form>
        </div>
    </div>
</section>
<script>
$(document)
.one('focus.textarea', '.autoExpand', function(){
	var savedValue = this.value;
	this.value = '';
	this.baseScrollHeight = this.scrollHeight;
	this.value = savedValue;
})
.on('input.textarea', '.autoExpand', function(){
	var minRows = this.getAttribute('data-min-rows')|0,
		 rows;
	this.rows = minRows;
console.log(this.scrollHeight , this.baseScrollHeight);
	rows = Math.ceil((this.scrollHeight - this.baseScrollHeight) / 17);
	this.rows = minRows + rows;
});
</script>