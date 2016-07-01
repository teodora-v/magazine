<?php
require 'layout.php';
$results = $article->listByCategory(3);
?>
<section id="internet">
        <div class="container">
          
                <div class="col-lg-12 text-center">
                    <h3>Мобилен свят</h3>
                </div>
     
  	<div class="col-lg-12">       
<?php 
foreach ($results as $result) {
?>
	<div class="form-group article">
			<input class="<?php echo $result['id'];?>" type="hidden" value="<?php echo $result['id'];?>" />
	    	<div class="title"><h4><?php echo $result['title'];?></h4></div>
	    	<div id="content_<?php echo $result['id']?>" class="test collapse">
	    		<?php echo '&emsp;&emsp;'.$crypt->encrypt_decrypt('decrypt', $result['content']);?>
	    	</div><br>
	    	<?php if(!empty($result['image'])) {?>
	    	<div id="image_<?php echo $result['id']?>" class="test collapse">
	    		
	    		<?php echo '<img class="uploaded-images" src="data:image;base64,'.$result['image'].'">';?>
	    	</div><br>
	    	<?php }?>
	    	<label for="author" class="text-muted"><?php echo 'Автор: ';?></label>
	    	<div id="author" style="display: inline;"><?php echo $result['firstname'] .' '. $result['lastname'];?></div><br>
	    	<label for="upl" class="text-muted"><?php echo 'Качено: ';?></label>
            <div id="upl" style="display: inline;"><?php echo $result['uploaded'];?></div><br>
            <label for="upl" class="text-muted"><?php echo 'Качено от: ';?></label>
            <div id="upl" style="display: inline;"><?php echo $result['uploadedby'];?></div>   
            <input id="<?php echo $result['id'];?>" type="button" name="details" class="btn details btn-xm btn-primary pull-right btnpos" value="Details"/>                     
    	</div>
		<script>
		var els = document.getElementsByClassName('<?php echo $result['id']?>');
		var button = $('input#<?php echo $result['id'];?>');
		$(button).click(function() {
			$('div#content_<?php echo $result['id']?>').toggleClass('collapse');
			$('div#image_<?php echo $result['id']?>').toggleClass('collapse');
		});
		</script>
<?php 
}
?>
	</div>
</div>
</section>