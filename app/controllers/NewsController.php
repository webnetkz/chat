<?php

namespace app\controllers;

use app\core\Controller;

class NewsController extends Controller {

	public function showAction() {
		$result = $this->model->getNews();
		$vars = [
			'news' => $result,
		];
		$this->view->render('Новости', $vars);
	}
}
