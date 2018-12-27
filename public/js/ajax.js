$(document).ready(function() {

	$('form').submit(function(event) {
		var json;
		event.preventDefault(); // Функция отмены отправки в браузере. 
	
		$.ajax({

			type: $(this).attr('method'),
			url: $(this).attr('action'), // URL-адрес, по которому будет отправлен запрос.
			data: new FormData(this), // Данные, которые будут отправлены на сервер. 
			contentType: false, // Ожидаемый тип данных, которые пришлет сервер в ответ на запрос.
			cache: false,
			processData: false,

			success: function(result){
				json = jQuery.parseJSON(result);
				if (json.url) {
					window.location.href = json.url;
				} else {
					alert(json.status + ' - ' + json.message);
				}
			},
			

		});

	});

});