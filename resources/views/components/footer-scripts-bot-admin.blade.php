<script>

    $(document).ready(function() {

        //Главные натройки Ajax
        var data_ajax = {
            action: '{{ route('check_auth')  }}'
            ,'_token' : document.getElementsByTagName("META")['csrf-token'].content
        };

        //Проверка авторизации
        $(document).on('click', '#check_auth',function(e){
            e = e || window.e;
            e.preventDefault ? e.preventDefault() : (e.returnValue=false);
            //event.stopPropagation ? event.stopPropagation() : (event.cancelBubble=true);//"всплытие" запретить

            console.groupCollapsed("--Проверка авторизации-- #check_auth");

            var ob = $(this)
                ,cls = ob.attr('class')? ob.attr('class').split(/\s+/) : 'нет классов'
                //,par = ob.closest('form')
            ;
            //Отправляем запрос на сервер
            var
                result = ''
                ,res = ''
                ,items = ''
                // ,par = ob.closest(ob.data('parent'))
                ,par = $(ob.data('form_custom'))
            ;

            // data_ajax.action = ob.data('request-direct');
            data_ajax.type = ob.data('request-type');
            //data_ajax.id = ob.data('id');
            // data_ajax.sform = ((par && par.length > 0) ? par.serializeDomOb() : {});
            data_ajax = ((par && par.length > 0) ? par.serializeDomOb() : {});
            data_ajax._token = document.getElementsByTagName("META")['csrf-token'].content
            data_ajax.type = 'check_auth'
            console.log("Отправляем данные на сервер data_ajax: ");
            console.log(data_ajax);

            $.post( '{{ route('check_auth')  }}', data_ajax, function(response) {
                
                console.log(" response: ",response);

                // res = JSON.parse(response);
                res = JSON.parse(JSON.stringify(response));
                
                console.log(" res: ",res);
                console.log(" typeof res: ",typeof res);

                result = res._s;
                
                console.log(" result: ",result);
                console.log(" 'ok_' + data_ajax.type: ", 'ok_' + data_ajax.type);


                if (result == 'no_valid_form') {
                    //Код утарел перегружаем страницу
                    alert(res._text);
                    window.location.reload();
                    return;
                }
                if (result == 'ok_' + data_ajax.type) {
                    alert(res._text);
                    window.location.reload();
                    return;
                }
                alert(res._text);


                console.log("Получено с сервера (response):");
                console.log(response);
            })
                .fail(function(request, textStatus, errorThrown) {
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
                });

            console.groupEnd();


        });

        //Запросить по кнопке содержимое для показа
        $(document).on('click', '.get_bot_info',function(e){
            e = e || window.e;
            e.preventDefault ? e.preventDefault() : (e.returnValue=false);
            // event.stopPropagation ? event.stopPropagation() : (event.cancelBubble=true);//"всплытие" запретить

            console.groupCollapsed("--Запросить по кнопке содержимое для показа-- .get_bot_menu");

            var ob = $(this)
                ,cls = ob.attr('class')? ob.attr('class').split(/\s+/) : 'нет классов'
                //,par = ob.closest('form')
            ;

            //Отправляем запрос на сервер
            var
                result = ''
                ,res = ''
                ,items = ''
                ,par = ob.closest(ob.data('parent'))
                //,par = $(ob.data('form_custom'))
            ;

            data_ajax.action = ob.data('request-direct');
            data_ajax.type = ob.data('request-type');
            //data_ajax.id = ob.data('id');
            data_ajax.sform = ((par && par.length > 0) ? par.serializeDomOb() : {});
            console.log("Отправляем данные на сервер data_ajax: ");
            console.log(data_ajax);

            $.post( '{{ route('aj_bot_main_menu_admin')  }}', data_ajax, function(response) {
                res = JSON.parse(response);
                result = res._s;

                if (result == 'no_valid_form') {
                    //Код утарел перегружаем страницу
                    alert(res._text);
                    window.location.reload();
                    return;
                }
                if (result == 'ok_' + data_ajax.type) {
                    alert(res._text);
                    return;
                }
                alert(res._text);


                console.log("Получено с сервера (response):");
                console.log(response);
            })
            .fail(function(request, textStatus, errorThrown) {
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
            });



            console.groupEnd();


        });

        //Управление через кнпоки действий
        $(document).on('click', '.action_btn, .form_action_btn',function(e){
            e = e || window.e;
            e.preventDefault ? e.preventDefault() : (e.returnValue=false);
            //event.stopPropagation ? event.stopPropagation() : (event.cancelBubble=true);//"всплытие" запретить

            console.groupCollapsed("--Управление через кнпоки действий-- .action_btn");

            var ob = $(this)
                ,cls = ob.attr('class')? ob.attr('class').split(/\s+/) : 'нет классов'
                //,par = ob.closest('form')
            ;


            //Отправляем запрос на сервер
            var
                result = ''
                ,res = ''
                ,items = ''
                ,par = ob.closest(ob.data('parent'))
                //,par = $(ob.data('form_custom'))
            ;

            data_ajax.action = ob.data('request-direct');
            data_ajax.type = ob.data('request-type');
            data_ajax.id = ob.data('id');
            data_ajax.sform = ((par && par.length > 0) ? par.serializeDomOb() : {});
            console.log("Отправляем данные на сервер data_ajax: ");
            console.log(data_ajax);

            $.post( '{{ route('aj_bot_actions')  }}', data_ajax, function(response) {
                console.log(" response: ",response);

                // res = JSON.parse(response);
                res = JSON.parse(JSON.stringify(response));

                console.log(" res: ",res);
                console.log(" typeof res: ",typeof res);

                result = res._s;

                console.log(" result: ",result);
                console.log(" 'ok_' + data_ajax.type: ", 'ok_' + data_ajax.type);

                if (result == 'no_valid_form') {
                    //Код утарел перегружаем страницу
                    alert(res._text);
                    window.location.reload();
                    return;
                }
                if (result == 'ok_' + data_ajax.type) {
                    alert(res._text);
                    window.location.reload();
                    return;
                }
                alert(res._text);


                console.log("Получено с сервера (response):");
                console.log(response);
            })
            .fail(function(request, textStatus, errorThrown) {
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
            });

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
</script>