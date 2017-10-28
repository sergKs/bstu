<?php

/* @var $models \app\models\Category[] */

?>

<ul>
	<?php foreach ($models as $model): ?>
		<li>
			<h3><?= $model->name ?></h3>
			<p>
				<?php foreach ($model->news as $news): ?>
					<span><?= $news->title ?></span><br>
				<?php endforeach; ?>
			</p>
		</li>
	<?php endforeach; ?>
</ul>
