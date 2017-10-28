<?php

use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $models \app\models\News[] */

?>

<ul>
	<?php foreach ($models as $model): ?>
		<li>
			<?= Html::a($model->title, ['view', 'id' => $model->id]) ?><br>
			<div><?= $model->category->name ?></div>
			<div>
				<?php if (strlen($model->image) > 0): ?>
					<?= Html::img('@web/' . Yii::$app->params['uploadsPath'] . '/' .$model->image, [
						'class' => 'img-full',
						'alt' => 'utusgjgdjhs'
					]) ?>
				<?php endif; ?>
			</div>
		</li>
	<?php endforeach; ?>
</ul>
