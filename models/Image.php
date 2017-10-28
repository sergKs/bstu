<?php

namespace app\models;

use yii\db\ActiveRecord;

class Image extends ActiveRecord
{
	public static function tableName()
	{
		return 'images';
	}

	public function rules()
	{
		return [
			[['newsId', 'filename'], 'required'],
			[['newsId'], 'integer'],
			[['filename'], 'string', 'max' => 256]
		];
	}
}