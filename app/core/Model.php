<?php

namespace app\core; // Включение в пространство имен

use app\lib\Db; // Использование класса для работы с базой данных 

abstract class Model { // Создаем абстрактный класс
	
    public $db = []; // Публичное свойство содержащее массив

    public function __construct() {
    	 
    	$this->db = new Db; // Создаем объект экземпляра для работы с базой данных
    }
}