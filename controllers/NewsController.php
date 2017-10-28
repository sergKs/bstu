<?php

namespace app\controllers;

use app\models\Category;
use app\models\News;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class NewsController extends Controller
{
	public function actionCategories()
	{
		$models = Category::find()->with('news')->all();

		return $this->render('categories', [
			'models' => $models
		]);
	}

	/**
	 * Список всех новостей.
	 *
	 * @return string
	 */
	public function actionIndex()
	{
		$models = News::find()->with('category')->all();

		return $this->render('index', [
			'models' => $models
		]);
	}

	/**
	 * Просмотр новости по ID.
	 *
	 * @param $id
	 * @return string
	 */
	public function actionView($id)
	{
		$model = $this->findModel($id);

		return $this->render('view', [
			'model' => $model
		]);
	}

	/**
	 * Возвращает модель по ID.
	 *
	 * @param $id
	 * @return News
	 * @throws NotFoundHttpException
	 */
	protected function findModel($id)
	{
		$model = News::findOne($id);

		if ($model === null) {
			throw new NotFoundHttpException('Новость не найдена.');
		}

		return $model;
	}
}