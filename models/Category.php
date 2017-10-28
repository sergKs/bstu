<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * Class Category
 *
 * @property News[] $news
 */
class Category extends ActiveRecord
{
	public static function tableName()
	{
		return 'categories';
	}

	public function rules()
	{
		return [
			['name', 'required'],
			['name', 'string', 'max' => 256]
		];
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getNews()
	{
		return $this->hasMany(News::className(), ['categoryId' => 'id']);
	}

	/**
	 * @return array
	 */
	public static function map()
	{
		return ArrayHelper::map(Category::find()->all(), 'id', 'name');
	}
}