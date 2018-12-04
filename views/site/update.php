<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Yii2 CRUD Application | Update a Post';
?>
<div class="site-index">

	<h1>Update a Post:</h1>
    
    <div class="body-content">
    	<?php $form = ActiveForm::begin(); ?>

        <div class="row">
        	<div class="form-group">
        		<div class="col-lg-6">
        			<?= $form->field($post, 'title'); ?>
        		</div>
        	</div>
        </div>

        <div class="row">
        	<div class="form-group">
        		<div class="col-lg-6">
        			<?= $form->field($post, 'description')->textarea(['rows' => 6]); ?>
        		</div>
        	</div>
        </div>

        <div class="row">
        	<div class="form-group">
        		<div class="col-lg-6">
        			<?php
        				$itens = [
        					'e-commerce' => 'e-commerce',
        					'CMS' => 'CMS',
        					'MVC' => 'MVC'
        				];  
        			?>

        			<?= $form->field($post, 'category')->dropDownList($itens, ['prompt' => 'Select']); ?>
        		</div>
        	</div>
        </div>

        <div class="row">
        	<div class="form-group">
        		<div class="col-lg-6">
        			<div class="col-lg-3">
        				<?= Html::submitButton('Update Post', ['class' => 'btn btn-primary']) ?>
        			</div>
        			<div class="col-lg-2">
        				<a href="<?php echo(Yii::$app->homeUrl); ?>" class="btn btn-default">Back</a>
        			</div>
        		</div>
        	</div>
        </div>

		<?php ActiveForm::end(); ?>
    </div>
</div>
