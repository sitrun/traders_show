
$(document).ready(function() {

    //Главные натройки Ajax
    var ajax_settings = {
        'action': window.location.href
        ,'_token' : document.getElementsByTagName("META")['csrf-token'].content
    };

    //Отправка формы сохранения
    $(document).on('click', '.request_ajax_form .save_btn',function(e){
        e = e || window.e;
        e.preventDefault ? e.preventDefault() : (e.returnValue=false);
        //event.stopPropagation ? event.stopPropagation() : (event.cancelBubble=true);//"всплытие" запретить

        console.groupCollapsed("--Сохранение Отправка формы сохранения-- .request_ajax_form .save_btn");

        var ob = $(this)
            ,cls = ob.attr('class')? ob.attr('class').split(/\s+/) : 'нет классов'
            ,par = ob.closest('form')
        ;


        // console.log(" document.getElementsByTagName(\"META\")['csrf-token'].content: ",document.getElementsByTagName("META")['csrf-token'].content);

        //Отправляем запрос на сервер
        var
            result = ''
            ,res = ''
            ,items = ''
            // ,par = ob.closest(ob.data('parent'))
            //,par = $(ob.data('form_custom'))
        ;

        data_ajax = ((par && par.length > 0) ? par.serializeDomOb() : {});
        //data_ajax._token = document.getElementsByTagName("META")['csrf-token'].content
        data_ajax.type = ob.data('request-type');
        data_ajax.type = data_ajax.type || 'save_order';
        data_ajax._token = ajax_settings._token;

        console.log(" before ajax_settings: ",ajax_settings);

        ajax_settings.action = ob.data('request-url') ? ob.data('request-url') : ajax_settings.action;
        
        console.log(" ajax_settings: ",ajax_settings);
        
        console.log(" ob.data('request-url'): ",ob.data('request-url'));
        
        

        //Очищаем ошибки после запроса
        par.find('.error-message').remove();

        //Запрос к серверу
        $.post( ajax_settings.action, data_ajax, function(response) {

            // res = JSON.parse(response);
            res = JSON.parse(JSON.stringify(response));
            result = res._s;

            if (result == 'no_valid_form') {
                //Код утарел перегружаем страницу
                alert(res._text);
                window.location.reload();
                return;
            }
            if (result == 'ok_' + data_ajax.type) {
                alert(res._text);
                //window.location.reload();
                return;
            }
            alert(res._text);

            console.log("Получено с сервера (response):");
            console.log(response);


        }).fail(function(request, textStatus, errorThrown) {
            console.log("Ошибка запроа status|request:");
            console.log(request.status);
            console.log(request);
            if (request.status == 500) {
                alert(" Что-то с сервером ошибка 500!");
                console.log(" Что-то с сервером ошибка 500:");
            }else{
                console.log(" Другая ошибка = " + request.status);
            }
            if (request.status == 400) {
                var reloadOn = confirm('Форма устарела, ПЕРЕГРУЖАЕМ СТРАНИЦУ!');
                if (reloadOn) {
                    window.location.reload();
                }
                return;

            }
            if (request.status == 422) {

                let err_show;
                err_show = request.responseJSON.errors;

                //Собираем свойства для валиадации
                for (var key in err_show) {

                    //Распределяем ошибки по полям
                    par.find('[name="'+key+'"]').closest('line');
                    let err_class = 'error-message err_' + key;

                    const $newErrMessage = document.createElement('div');
                    $newErrMessage.className = err_class;
                    $newErrMessage.textContent = err_show[key][0];

                    console.log(" par.find(err_class).length: ",par.find(err_class).length);
                    console.log(" par.find(err_class): ",par.find(err_class));

                    if (par.find('.'+ err_class).length) {
                        par.find('.'+ err_class).text( err_show[key][0]);
                    }else par.find('[name="'+key+'"]').closest('.line').append( $newErrMessage );

                    console.log(" key: ",key);
                    console.log(" err_show[key]: ",err_show[key][0]);

                }
            }
        });


        //Html эелемент DOM вызвавщий событие
        console.log(" e.target:", e.target);

        //Оборачиваем вызвавший элемент в JQuery
        console.log(" $(e.target):", $(e.target));

        //Получаем класс вызвавшего элемента
        console.log(" $(e.target).hasClass():", $(e.target).hasClass());
        console.log("Классы объекта ob:",cls);

        console.groupEnd();


    });

});

//Серриализация DOM объекта из элементов input,textarea,select
$.fn.serializeDomOb = function()
{
    //Протестировать разного типа input-ы, textarea
    //обработатать свойста data-xxx (опционально)
    //обработать классы (опционально)
    var o = {};
    var value = '';
    var a = this.find('input,textarea,select');
    $.each(a, function() {

        value = this.value;
        if (this.type == 'checkbox') {
            if (!this.checked) {
                value = '';
            }
        }
        if (this.type == 'radio') {

            if (!this.checked) {
                value = '';
            }
        }
        if (this.type == 'select') {
            if (this.find('option:selected')) {
                value = this.find('option:selected').val();
            }
            /* console.groupCollapsed("--serializeDomOb--");
             console.log(" value: ",value);

             console.log(" this: ",this);
             console.groupEnd();*/



        }

        //Новое поле в настройках
        if (o[this.name] !== undefined) {

            if (this.type == 'radio') {
                if (value) {
                    o[this.name] = value;
                }
            }else{
                //Поле существует
                if (!o[this.name].push) {
                    o[this.name] = [o[this.name]];
                }

                //Добавляем значение в поле
                o[this.name].push(value || '');
            }

        } else {
            //Создаем поле
            o[this.name] = value || '';
        }
    });
    return o;
};