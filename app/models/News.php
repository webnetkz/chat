<?php

namespace app\models; // Включение в пространство имен

use app\core\Model;// Использование дополнительных классов
use app\lib\Db;

class News extends Model { // Создаем наследуемый класс
	
	public function getNews() { // Создаем публичный метод получения новостей
		 
    	$result = $this->db->row('SELECT * FROM news'); // Получаем все новости методом db->row  
    	return $result; // Возвращаем результат
    }
}