<?php

use app\components\FormHelper;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this View */
/* @var $model app\models\Item */
/* @var $form ActiveForm */
?>

<div class="form" style="width:60%">

	<?php $form = ActiveForm::begin(); ?>
	
	<?= $form->errorSummary($model, ['class' => 'callout callout-danger', 'header' => '<h4>Please fix the following errors:</h4>']) ?>

	<div class="row">
		<div class="col-md-12">
			<?= FormHelper::render($formFields[2], $form, $model); ?>
		</div>

		<?php foreach ($formFields as $field): ?>
			<?php if($field['name']=='immobilization') continue; ?>
			<div class="col-md-6">
			<?= FormHelper::render($field, $form, $model); ?>
			</div>
		<?php endforeach ?>
	</div>

	<div class="row">
	<?php if (!Yii::$app->request->isAjax) { ?>
		<div class="form-group">
			<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		</div>
		<?php } ?>
	</div>

		<?php ActiveForm::end(); ?>

	</div>
</div>
<style>
	ul{list-style:none;}
</style>