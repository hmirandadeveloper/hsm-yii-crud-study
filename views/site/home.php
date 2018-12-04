<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Yii2 CRUD Application';
?>
<div class="site-index">

	<?php if(Yii::$app->getSession()->hasFlash('message')): ?>
		<div class="alert alert-dismissible alert-success">
		  <button type="button" class="close" data-dismiss="alert">&times;</button>
		  	<?= Yii::$app->getSession()->getFlash('message') ?>
		</div>
	<?php endif; ?>
    <div class="jumbotron">
        <h1 style="color: #337ab7">Yii2 CRUD Application tutorial</h1>
    </div>

    <div class="row">
    	<span style="margin-bottom: 20px">
    		<?= Html::a('Create', ['/site/create'], ['class' => 'btn btn-primary'])?>		
    	</span>
    </div>

    <div class="body-content">

        <div class="row">
        	<table class="table table-hover">
			  <thead>
			    <tr>
			      <th scope="col">ID</th>
			      <th scope="col">Title</th>
			      <th scope="col">Description</th>
			      <th scope="col">Category</th>
			      <th scope="col">Action</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php if(count($posts) > 0): ?>
			  		<?php foreach($posts as $post): ?>
					    <tr class="table-active">
					      <th scope="row"><?php echo $post->id; ?></th>
					      <td><?php echo $post->title; ?></td>
					      <td><?php echo $post->description; ?></td>
					      <td><?php echo $post->category; ?></td>
					      <td>
					      	<span>
					      		<?= Html::a(
					      			'View', 
					      			['view', 'id' => $post->id], 
					      			['class' => 'label label-primary']
					      		); ?>
					      	</span>
					      	<span>
					      		<?= Html::a(
					      			'Update', 
					      			['update', 'id' => $post->id], 
					      			['class' => 'label label-default']
					      		); ?>
					      	</span>
					      	<span>
					      		<?= Html::a(
					      			'Delete', 
					      			['delete', 'id' => $post->id], 
					      			['class' => 'label label-danger']
					      		); ?>
					      	</span>
					      </td>
					    </tr>
					<?php endforeach; ?>
			    <?php else: ?>
			    	<tr>
			    		<td>No records found</td>
			    	</tr>
				<?php endif; ?>
			  </tbody>
			</table>
        </div>

    </div>
</div>
