<?php

namespace app\core; // Включение в пространство имен

use app\core\View; // Изпользование класса View

abstract class Controller { // Создаем абстрактный класс

	public $route; // Публичное свойство хранящее 
	public $view;
	public $ac;

	public function __construct($route) {
		$this->route = $route;
			 // Проверка доступа
			if (!$this->checkAc()) {
				View::errorCode(403);
			}

		$this->view = new View($route);
		$this->model = $this->loadModel($route['controller']);
	}

	 // Метод автозакгрузки модели
	 // Он универсален и способен принимать значение имени модели
	public function loadModel($name) {
		 // Путь к модели, название начинается с верхнего регистра
		$path = 'app\models\\'.ucfirst($name);
		 // Если класс модели существует, возвращаем экземпляр класса
		if(class_exists($path)) {
			return new $path;
		}
	}
 	 // Публичный метод для проверки доступности страниц
	public function checkAc() {
		$this->ac = require 'app/ac/'.$this->route['controller'].'.php';
		if ($this->isAc('all')) {
			return true;
		}
		elseif (isset($_SESSION['authorize']['id']) and $this->isAc('authorize')) {
			return true;
		}
		elseif (isset($_SESSION['authorize']['id']) and $this->isAc('guest')) {
			return true;
		}
		elseif (isset($_SESSION['admin']) and $this->isAc('admin')) {
			return true;
		}
		return false;
	}
	 // Публичный метод для перебора экшена, для доступа
	public function isAc($key) {
		return in_array($this->route['action'], $this->ac[$key]);
	}
}