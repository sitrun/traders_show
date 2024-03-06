<script>
    // Обновление депозита
    document.querySelector('#deposit_update_block')
        .addEventListener('input', e => {
            update_deposite_and_cur(1)
        })

    document.querySelector('#deposit_update_block_2')
        .addEventListener('input', e => {
            update_deposite_and_cur(2)
        })

    function update_deposite_and_cur(number){
        user_id = window.user_id;
        if(number == 1){
            save_link = window.location.href
            save_link = save_link.replace('profile','update_user_dep')
            val = document.getElementById('deposit_update_block').value
            cur = document.getElementById('user_cur').value
            mode = 'hand'
            if(document.getElementById('mode_save_orders').checked){
                mode='auto'
            }
            save_link = save_link+'/'+user_id+'/'+val+'/'+cur+'/'+mode

            document.getElementById('update_deposit').href=save_link;
        }
        if(number == 2){
            save_link = window.location.href
            save_link = save_link.replace('profile','update_user_dep')
            val = document.getElementById('deposit_update_block_2').value
            cur = document.getElementById('user_cur_2').value
            mode = 'hand'
            if(document.getElementById('mode_save_orders_2').checked){
                mode='auto'
            }
            save_link = save_link+'/'+user_id+'/'+val+'/'+cur+'/'+mode


            document.getElementById('update_deposit_2').href=save_link;
        }

        let form = document.getElementById('update_user_info')
        form.deposit.value = val
        form.currency.value = cur
        form.def_save_order.value = mode

    }



    document.querySelector('#new_name')
        .addEventListener('input', e => {
            user_id = window.user_id;
            save_link = window.location.href
            save_link = save_link.replace('profile','update_user_name')
            val = document.getElementById('new_name').value
            save_link = save_link+'/'+user_id+'/'+val
            document.getElementById('save_name_link').href=save_link;

            let form = document.getElementById('update_user_info')
            form.name.value = val
        })

    document.querySelector('#new_email')
        .addEventListener('input', e => {
            user_id = window.user_id;
            save_link = window.location.href
            save_link = save_link.replace('profile','update_user_email')
            val = document.getElementById('new_email').value
            save_link = save_link+'/'+user_id+'/'+val
            document.getElementById('save_email_link').href=save_link;

            let form = document.getElementById('update_user_info')
            form.email.value = val
        })

    document.querySelector('#new_pass_2')
        .addEventListener('input', e => {
            user_id = window.user_id;
            save_link = window.location.href
            save_link = save_link.replace('profile','update_user_pass')
            val = document.getElementById('new_pass_2').value
            save_link = save_link+'/'+user_id+'/'+val
            document.getElementById('save_pass_link').href=save_link;
        })

    function update_notifications(){

        save_link = ''
        save_link = window.location.href
        save_link = save_link.replace('profile','update_user_not')

        if(document.querySelector('#dis_all_not').checked == true){

            save_link = save_link+'/'+user_id+'/'+'OFF/OFF/OFF'

            let form = document.getElementById('update_user_info')
            form.not_news.value = 'OFF'
            form.not_signals.value = 'OFF'
            form.not_orders.value = 'OFF'
        }
        else{
            news = 'OFF'
            signals = 'OFF'
            orders ='OFF'
            if(document.getElementById('not_news').checked){
                news = 'ON'
            }
            if(document.getElementById('not_signals').checked){
                signals = 'ON'
            }
            if(document.getElementById('not_orders').checked){
                orders = 'ON'
            }
            save_link = save_link+'/'+user_id+'/'+news+'/'+signals+'/'+orders

            let form = document.getElementById('update_user_info')
            form.not_news.value = news
            form.not_signals.value = signals
            form.not_orders.value = orders

        }
        document.getElementById('btn_save_updates').href = save_link


    }


    //Старт страницы
    window.onload = start_page
    function start_page() {
        //Открыть окно сохранения пароля
        if (window.open_profile_modal_old_pass) {
            OpenModal('old_pass');
        }


        user_id = window.user_id;
        user_info = window.user_info;
        // Требуем подклчение телеграмм если не подключен
        if(user_info['id_telegram'] == 0 ){
        //if(user_info[0]['id_telegram'] == 0 ){
            document.getElementById('connect_tg').classList.remove('update_profile_dis_block')
            document.getElementById('connect_tg').classList.add('update_profile_active_block')
            document.getElementById('checkboxes_wrap').classList.remove('update_profile_active_block')
            document.getElementById('checkboxes_wrap').classList.add('update_profile_dis_block')
            document.getElementById('connect_tg_link').href = 'https://t.me/peopleinviting_bot/?start=connect_tg'+user_id.toString()
        }else{
            document.getElementById('update_tg').href = 'https://t.me/peopleinviting_bot/?start=connect_tg'+user_id.toString()
        }

        if(user_info['not_news'] != 'OFF'){
        // if(user_info[0]['not_news'] != 'OFF'){
            document.getElementById('not_news').checked = true
        }
        if(user_info['not_signals'] != 'OFF'){
        // if(user_info[0]['not_signals'] != 'OFF'){
            document.getElementById('not_signals').checked = true
        }
        if(user_info['not_orders'] != 'OFF'){
        // if(user_info[0]['not_orders'] != 'OFF'){
            document.getElementById('not_orders').checked = true
        }
        if(user_info['def_save_order'] =='auto'){
        // if(user_info[0]['def_save_order'] =='auto'){
            document.getElementById('mode_save_orders').checked = true
            document.getElementById('mode_save_orders_2').checked = true
        }
        document.getElementById('name').innerHTML += user_info['name']
        // document.getElementById('name').innerHTML += user_info[0]['name']
        document.getElementById('name_update_block').innerHTML += user_info['name']
        // document.getElementById('name_update_block').innerHTML += user_info[0]['name']
        document.getElementById('name_update_block_2').innerHTML += user_info['name']
        // document.getElementById('name_update_block_2').innerHTML += user_info[0]['name']
        document.getElementById('email').innerHTML += user_info['email']
        // document.getElementById('email').innerHTML += user_info[0]['email']
        document.getElementById('email_update_block').innerHTML += user_info['email']
        // document.getElementById('email_update_block').innerHTML += user_info[0]['email']
        document.getElementById('email_update_block_2').innerHTML += user_info['email']
        // document.getElementById('email_update_block_2').innerHTML += user_info[0]['email']

        document.getElementById('user_cur').value  = user_info['currency']
        // document.getElementById('user_cur').value  = user_info[0]['currency']
        document.getElementById('user_cur_2').value  = user_info['currency']
        // document.getElementById('user_cur_2').value  = user_info[0]['currency']
        document.getElementById('deposit_update_block').value = user_info['deposit']
        // document.getElementById('deposit_update_block').value = user_info[0]['deposit']
        document.getElementById('deposit_update_block_2').value = user_info['deposit']
        // document.getElementById('deposit_update_block_2').value = user_info[0]['deposit']
        document.getElementById('date_reg').innerHTML+= user_info['date_register']
        // document.getElementById('date_reg').innerHTML+= user_info[0]['date_register']
        document.getElementById('date_reg_update_block').innerHTML+= user_info['date_register']
        // document.getElementById('date_reg_update_block').innerHTML+= user_info[0]['date_register']
        document.getElementById('balance').innerHTML = user_info['balance']+'₽'
        // document.getElementById('balance').innerHTML = user_info[0]['balance']+'₽'


    }

    //Вход/Выход из режим редактирования профиля
    function change_blocks(status){
        if(status=='start_update'){
            document.getElementById('main_info').classList.remove('active_block_profile')
            document.getElementById('main_info').classList.add('disactive_block_profile')

            document.getElementById('main_info_update').classList.remove('disactive_block_profile')
            document.getElementById('main_info_update').classList.add('active_block_profile')
        }
        if(status =='cancel_update'){
            document.getElementById('main_info').classList.remove('disactive_block_profile')
            document.getElementById('main_info').classList.add('active_block_profile')

            document.getElementById('main_info_update').classList.remove('active_block_profile')
            document.getElementById('main_info_update').classList.add('disactive_block_profile')
        }

    }

    //Модальные окна
    function OpenModal(type){
        if(type == 'name'){
            document.getElementById('profile_modal_name').classList.remove('profile_dis_modal')
            document.getElementById('profile_modal_name').classList.add('profile_active_modal')

        }
        if(type == 'email'){
            document.getElementById('profile_modal_email').classList.remove('profile_dis_modal')
            document.getElementById('profile_modal_email').classList.add('profile_active_modal')

        }
        if(type=='old_pass'){
            document.getElementById('profile_modal_old_pass').classList.remove('profile_dis_modal')
            document.getElementById('profile_modal_old_pass').classList.add('profile_active_modal')

        }
        if(type=='new_pass'){
            document.getElementById('profile_modal_new_pass').classList.remove('profile_dis_modal')
            document.getElementById('profile_modal_new_pass').classList.add('profile_active_modal')

        }
    }

    //Модальные окна
    function CloseModal(type){
        if(type == 'name'){
            document.getElementById('profile_modal_name').classList.remove('profile_active_modal')
            document.getElementById('profile_modal_name').classList.add('profile_dis_modal')
            document.getElementById('new_name').value=''
        }
        if(type == 'email'){
            document.getElementById('profile_modal_email').classList.remove('profile_active_modal')
            document.getElementById('profile_modal_email').classList.add('profile_dis_modal')
            document.getElementById('new_email').value=''
        }
        if(type=='old_pass'){
            document.getElementById('profile_modal_old_pass').classList.remove('profile_active_modal')
            document.getElementById('profile_modal_old_pass').classList.add('profile_dis_modal')
            document.getElementById('old_pass').value=''
        }
        if(type=='new_pass'){
            document.getElementById('profile_modal_new_pass').classList.remove('profile_active_modal')
            document.getElementById('profile_modal_new_pass').classList.add('profile_dis_modal')
            document.getElementById('new_pass').value=''
            document.getElementById('new_pass_2').value=''
        }
    }

    function verifyPass(){
        user_info = window.user_info;
        old_pass = user_info['password']
        // old_pass = user_info[0]['password']
        old_pass_input = document.getElementById('old_pass').value
        if(old_pass_input.toString() != old_pass.toString()){
            document.getElementById('error_old_pass').innerHTML ='Неверный старый пароль!'
        }
        else{

            CloseModal('old_pass')
            OpenModal('new_pass')
        }
    }

    //Запрос на изменение пароля
    /*function confirmResetPassword() {
        let resetOk = confirm('{{ __('Are you want reset password by email?') }}');
        // let resetOk = confirm('Хотите сбросить пароль через email?');
        if (resetOk) {
            window.location.href = '{{ route('password.email') }}'
        }

    }*/

    $(document).ready(function() {

        //Запрос сохранение данных пользователя
        $(document).on('click', '.btn_save_user_data',function(e){
            e = e || window.e;
            e.preventDefault ? e.preventDefault() : (e.returnValue=false);
            //event.stopPropagation ? event.stopPropagation() : (event.cancelBubble=true);//"всплытие" запретить

            console.groupCollapsed("--Сохранение ордера-- #btn_save_order");

            var ob = $(this)
                ,cls = ob.attr('class')? ob.attr('class').split(/\s+/) : 'нет классов'
                //,par = ob.closest('form')
            ;


            // console.log(" document.getElementsByTagName(\"META\")['csrf-token'].content: ",document.getElementsByTagName("META")['csrf-token'].content);

            //Отправляем запрос на сервер
            var
                result = ''
                ,res = ''
                ,items = ''
                // ,par = ob.closest(ob.data('parent'))
                ,par = $(ob.data('form_custom'))
            ;

            // data_ajax.action = ob.data('request-direct');
            // data_ajax.type = ob.data('request-type');
            //data_ajax.id = ob.data('id');
            // data_ajax.sform = ((par && par.length > 0) ? par.serializeDomOb() : {});
            data_ajax = ((par && par.length > 0) ? par.serializeDomOb() : {});
            data_ajax._token = document.getElementsByTagName("META")['csrf-token'].content
            data_ajax.type = 'save_user_data'
            data_ajax.type_update = ob.data('type')
            if (data_ajax.type_update == 'update_notifications') {
                update_notifications();
            }

            console.log("Отправляем данные на сервер data_ajax: ");
            console.log(data_ajax);
            let url_update = '{{ route('profile.update_ones')  }}'
            if (data_ajax.type_update == 'update_email') {
                url_update = '{{ route('profile.update_ones_email')  }}'
            }
            
            $.post( url_update, data_ajax, function(response) {

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
                    //window.location.reload();
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

</script>