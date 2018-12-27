<?php

namespace app\controllers;

use app\core\Controller;

// Создание класса который наследует все у родительского класса
class AccountController extends Controller {

	public function loginAction() {
		if (!empty($_POST)) {
			$this->view->message('Errors', 'message');
		}
		$this->view->render('Авторизация');
	}

	public function registerAction() {
		$this->view->render('Регистрация');
	}

}
