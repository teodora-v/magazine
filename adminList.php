<?php
 include 'layout.php';
include 'php/create.php';
 $username = $user->getUserName();
 $items = $article->getAllRowsByUser($username);

?>
<section class="admin list">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Списък със статии</h2>
                </div>
            </div>
            <div class="row">
            	<table class="table table-hover">
            		<thead>
            			<th class="width25">Заглавие</th>
            			<th class="width20">Автор</th>
            			<th class="width15">Категория</th>
            			<th class="width15">Качена</th>
            			<th class="width25">Действия</th>
            		</thead>
            <?php 
            if(!empty($items)) {
            	foreach ($items as $item) {
            		echo '<tbody>
							<td>'.$item['title'].'</td>
							<td>'.$item['firstname'].' '.$item['lastname'].'</td>';
						foreach ($categories as $k=>$v) {
							if($k==$item['category']) {
								echo '<td>'.$v.'</td>';
							}
							
						}
							
					echo	'<td>'.$item['uploaded'].'</td>
							<td>
								<a href="adminView.php?articleID='.$item['id'].'">Преглед</a>&nbsp;&nbsp;
								<a href="adminEdit.php?articleID='.$item['id'].'">Редакция</a>&nbsp;&nbsp;
								<a href="adminList.php?deleteID='.$item['id'].'" onclick="confirmDelete()">Изтриване<i></a>
							</td>
						  </tody>';
            	}
            }
            ?>
            	</table>
            </div>
            <div class="row text-center">
            	<a href="adminCreate.php"><input type="button" class="btn btn-primary" value="Добавете статия" /></a>
            </div>
        </div>
</section>

<script>
function confirmDelete()
{
  var x = confirm("Are you sure you want to delete?");
  if (x)
      return true;
  else
    return false;
}
</script>