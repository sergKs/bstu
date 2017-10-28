<?php

namespace app\commands;

use Yii;
use yii\console\Controller;

class AppController extends Controller
{
	/**
	 * Настройка приложения.
	 */
	public function actionInstall()
	{
		$auth = Yii::$app->authManager;

		$rule = new UserRule();
		$auth->add($rule);

		$user = $auth->createRole('user');
		$auth->add($user);

		$admin = $auth->createRole('admin');
		$auth->add($admin);
		$auth->addChild($admin, $user);
	}
}