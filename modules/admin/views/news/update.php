<?php

use kartik\file\FileInput;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $model \app\models\News */

?>

<?php $form = \yii\widgets\ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

	<?= $form->field($model, 'title')->textInput() ?>

	<?= $form->field($model, 'description')->textarea() ?>

	<?= $form->field($model, 'text')->textarea() ?>

	<?= FileInput::widget([
		'name' => 'file',
		'options'=>[
			'multiple'=>true
		],
		'pluginOptions' => [
			'async' => true,
			'uploadUrl' => Url::to(['news/file-upload', 'newsId' => $model->id]),
		]
	]); ?>

	<div class="form-group">
		<?= Html::submitButton('Изменить', ['class' => 'btn btn-success']) ?>
	</div>

<?php \yii\widgets\ActiveForm::end() ?>