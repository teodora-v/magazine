<?php
include 'layout.php';
include 'php/create.php';
?>
<section class="admin">
	<div class="container form-horizontal">
		<div class="row">
       		<div class="col-lg-12 text-center">
            	<h2 class="section-heading">Добави статия</h2>
           	</div>
           	<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
	           	<div class="form-group">
	           		<label for="author" class="col-md-2">Заглавие: </label>
	           		<div id="author" class="col-md-9">
	           			<input class="form-control" name="title"/>
	           		</div>
	           	</div>
	           	<div class="form-group">
	           		<label for="author" class="col-md-2">Автор (име): </label>
	           		<div id="author" class="col-md-9">
	           			<input class="form-control" name="firstname" />
	           		</div>
	           	</div>
	           	<div class="form-group">
	           		<label for="author" class="col-md-2">Автор (фамилия): </label>
	           		<div id="author" class="col-md-9">
	           			<input class="form-control" name="lastname" />
	           		</div>
	           	</div>
	           	<div class="form-group">
	           		<label for="author" class="col-md-2">Категория: </label>
	           		<div class="col-md-9">
	           			<select class="form-control" name="category">
	           				<option value="0" selected disabled >Моля изберете категория ... </option>
	           			<?php 
	           			foreach ($categories as $k=>$v){
	           				echo '<option value="'.$k.'">'.htmlspecialchars($v).'</option>';
	           			}
	           			?>
	           			</select>
					</div>
	           	</div>
	           	<div class="form-group">
	           		<label for="author" class="col-md-2">Съдържание: </label>
	           		<div id="author" class="col-md-9">
	           			<textarea name="content" class="autoExpand form-control" rows="3" data-min-rows="3" placeholder="Article Body"></textarea>      		
	           		</div>
	           	</div>
	           	<div class="form-group">
	           		<label for="img" class="col-md-2">Изображение: </label>
	           		<div id="img" class="col-md-9">
	           			<input class="form-control" type="file" name="pic" />
	           		</div>
	           	</div>
	           	<div class="col-lg-12 text-center">
                	<input type="submit" name="add" class="btn btn-primary" value="Запази"/>
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