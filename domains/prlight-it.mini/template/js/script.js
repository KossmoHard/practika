function validate(){
		//Считаем значения из полей q и date в переменные x и y
		var x=document.forms['form']['q'].value;
		var y=document.forms['form']['date'].value;
		//Если поле q пустое выведем сообщение и предотвратим отправку формы
			if (x.length <= 3){
				document.getElementById('e_city').innerHTML='*данное поле обязательно для заполнения';
				return false;
			}else{
				document.getElementById('e_city').innerHTML='Верно!';
			}
	//Если поле data пустое выведем сообщение и предотвратим отправку формы
	if (y.length == 0){
	document.getElementById('e_data').innerHTML='*данное поле обязательно для заполнения';
	return false;
	}else{
		document.getElementById('e_data').innerHTML='Верно!';
		}	
	var reg = /[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])/
	var arr=reg.test(y);
	if(arr == false){
		document.getElementById('e_data').innerHTML='*Дата введена не верно, формат даты YYYY-mm-dd';
		return false;
	}else{
		document.getElementById('e_data').innerHTML='Верно!';
	}
}

//Инициализация виджета "Bootstrap datetimepicker"
$(function(){
	  //Идентификатор элемента HTML (например: #datetimepicker1), для которого необходимо инициализировать виджет "Bootstrap datetimepicker"
	$('#datetimepicker1').datetimepicker();
	});
	
$(function() {
	$('#datep').datepicker({
		monthNames: ['Январь', 'Февраль', 'Март', 'Апрель',
					'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь',
					'Октябрь', 'Ноябрь', 'Декабрь'],
		dayNamesMin: ['Вс','Пн','Вт','Ср','Чт','Пт','Сб'],
		firstDay: 1,
		dateFormat: 'yy-mm-dd',
		minDate: 0,
	});
});
