<?php
use yii\helpers\Html;
?>

<div class="post">
	<div class="title">
		<h2><a href="<?= $model->url;?>"><?= Html::encode($model->title);?></a></h2>
	
		<span class="glyphicon glyphicon-time" aria-hidden="true"></span><em><?= date('Y-m-d H:i:s',$model->create_time)."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";?></em>
		<span class="glyphicon glyphicon-user" aria-hidden="true"></span><em><?= Html::encode($model->author->nickname);?></em>
		
	</div>
	
	<br>
	<div class="content">
	<?= $model->beginning;?>	
	</div>
	
	<br>
	
	<div class="nav">
		<div class="tag">
			<span class="glyphicon glyphicon-tag" aria-hidden="true"></span>
			<?= implode(', ',$model->tagLinks);?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		</div>
		<div>
			<?= Html::a("评论 ({$model->commentCount})",$model->url.'#comments')?>&nbsp;&nbsp;&nbsp;&nbsp;最后修改于 <?= date('Y-m-s H:i:s',$model->update_time);?>
		</div>
		
	</div>
	
</div>