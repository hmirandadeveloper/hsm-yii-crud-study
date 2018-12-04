<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Yii2 CRUD Application | Create a new Post';
?>
<div class="site-index">

	<h1>View the Post:</h1>
    
    <div class="body-content">
		<ul class="list-group">
		  <li class="list-group-item d-flex justify-content-between align-items-center">
		    <?= $post->title ?>
		  </li>
		  <li class="list-group-item d-flex justify-content-between align-items-center">
		    <?= $post->description ?>
		  </li>
		  <li class="list-group-item d-flex justify-content-between align-items-center">
		    <?= $post->category ?>
		  </li>
		</ul>

		<div class="row">
			<a href="<?php echo(Yii::$app->homeUrl); ?>" class="btn btn-default">Back</a>
		</div>    	
    </div>
</div>
