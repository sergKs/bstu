<?php

use app\models\Category;
use dosamigos\ckeditor\CKEditor;
use kartik\select2\Select2;
use vova07\imperavi\Widget;
use yii\helpers\Html;

/* @var $model \app\models\News */

?>

<?php $form = \yii\widgets\ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

	<?= $form->field($model, 'title')->textInput() ?>

	<?= $form->field($model, 'categoryId')->widget(Select2::classname(), [
		'data' => Category::map(),
		'options' => ['placeholder' => 'Select a state ...'],
		'pluginOptions' => [
			'allowClear' => true
		],
	]); ?>

	<?= $form->field($model, 'description')->textarea() ?>

	<?= $form->field($model, 'text')->widget(CKEditor::className(), [
		'options' => ['rows' => 6],
		'preset' => 'full'
	]) ?>

	<div class="form-group">
		<?= Html::submitButton('Добавить', ['class' => 'btn btn-success']) ?>
	</div>

<?php \yii\widgets\ActiveForm::end() ?>