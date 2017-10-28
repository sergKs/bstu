<?php

namespace app\modules\admin\controllers;

use app\models\Image;
use app\models\News;
use Yii;
use yii\helpers\Json;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

class NewsController extends AdminController
{
	public function actionFileUpload($newsIds)
	{
		$file = UploadedFile::getInstanceByName('file');

		if ($file !== null) {
			$filename = md5($file->name . time()) . '.' . $file->extension;
			$file->saveAs(Yii::$app->params['uploadsPath'] . '/' . $filename);

			$model = new Image();
			$model->newsId = $newsIds;
			$model->filename = $filename;
			$model->save(false);

			echo Json::encode(['filename' => $filename]); exit;
		}
	}

	/**
	 * Спсок всех новостей.
	 *
	 * @return string
	 */
	public function actionIndex()
	{
		$models = News::find()->all();

		return $this->render('index', [
			'models' => $models
		]);
	}

	/**
	 * Добавление нвовости.
	 *
	 * @return string
	 */
	public function actionCreate()
	{
		$model = new News();

		if ($model->load(Yii::$app->request->post()) && $model->save()) {

			$file = UploadedFile::getInstance($model, 'image');
			$filename = md5($file->name . time()). '.' . $file->extension;
			$file->saveAs(Yii::$app->params['uploadsPath'] . "/$filename");

			$model->image = $filename;
			$model->save(false);

			Yii::$app->session->setFlash('success', 'Новость добавлена.');
			$this->refresh();
		}

		return $this->render('create', [
			'model' => $model
		]);
	}

	/**
	 * Изменение новости.
	 *
	 * @param $id
	 * @return string|\yii\web\Response
	 */
	public function actionUpdate($id)
	{
		$model = $this->findModel($id);

		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			return $this->redirect(['index']);
		}

		return $this->render('update', [
			'model' => $model
		]);
	}

	/**
	 * Удаление новости.
	 *
	 * @param $id
	 * @return \yii\web\Response
	 */
	public function actionDelete($id)
	{
		$model = $this->findModel($id);
		$model->delete();
		return $this->redirect(['index']);
	}

	/**
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