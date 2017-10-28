<?php

use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $models \app\models\News[] */

?>

<p>
	<?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
</p>

<ul>
	<?php foreach ($models as $model): ?>
		<li>
			<?= $model->title ?>
		</li>
	<?php endforeach; ?>
</ul>
