<?php

namespace app\models;

use Yii;
use yii\db\Expression;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property string $title Заголовок
 * @property string $description Описание
 * @property string $text Текст
 * @property string $createdAt Дата создания
 *
 * @property Category $category
 * @property Image[] $images
 */
class News extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'news';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['title', 'text'], 'required'],
			[['categoryId'], 'integer'],
			[['description', 'text', 'image'], 'string'],
			[['createdAt'], 'safe'],
			[['title'], 'string', 'max' => 255],
		];
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getCategory()
	{
		return $this->hasOne(Category::className(), ['id' => 'categoryId']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getImages()
	{
		return $this->hasMany(Image::className(), ['newsId' => 'id']);
	}

	/**
	 * @inheritdoc
	 */
	public function beforeSave($insert)
	{
		if (!parent::beforeSave($insert)) {
			return false;
		}

		$this->createdAt = new Expression('now()');

		return true;
	}
}