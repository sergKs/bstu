<?php

namespace app\commands;

use Yii;
use yii\rbac\Rule;
use app\models\User;

/**
 * UserRule проверка прав доступа
 */
class UserRule extends Rule
{
	/**
	 * @inheritdoc
	 */
	public $name = 'role';

	/**
	 * @inheritdoc
	 */
	public function execute($user, $item, $params)
	{
		if (Yii::$app->user->isGuest) {
			return false;
		}

		/** @var $user User */
		$user = Yii::$app->user->identity;
		if ($item->name === 'admin') {
			return $user->role === 'admin';
		} elseif ($item->name === 'user') {
			return $user->role === 'admin' || $user->role === 'user';
		}

		return false;
	}
}
