<h2>news</h2>
<hr>
<?php
 // Отображение новостей
foreach($news as $value) {
	echo '<h4>'. $value['title'] .'</h4>';
	echo '<p>'. $value['description'] .'</p><hr>';
}
?>