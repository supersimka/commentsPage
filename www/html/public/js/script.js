$(function(){

  var pattern = /^[a-z0-9_-]+@[a-z0-9-]+\.[a-z]{2,6}$/i;

  $("#addComment").on("submit", function(){

    //Проверяем e-mail
    if($('input[name="email"]').val().search(pattern) == 0){

      $.ajax({
        url: '/addcomment',
        method: 'post',
        dataType: 'json',
        data: $(this).serialize(),
        success: function(data){
          if(typeof data.error !== "undefined"){
            //выводим сообщение об ошибке
            $('.message').removeClass('d-none').text(data.error);
          }
          if(typeof data.result !== "undefined")
            //выводим успешное сообщение
            $('.message').removeClass('d-none').text(data.result);

            //Очищаем форму
            $('#addComment')[0].reset();

            //Вносим в таблицу
            $('#myTable').children('tbody').append('<tr><td class="sorting_1">'+data.date+'</td><td>'+data.email+'</td><td>'+data.text+'</td></tr>');
        }
      });

		}else{
        $('.message').removeClass('d-none').text('E-mail введен некорректно!');
		}

    return false;
  });
});
