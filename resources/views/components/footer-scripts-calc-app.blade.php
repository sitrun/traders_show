<script>
    $(document).ready(function() { $("#crypto_chose_symbol").select2({ width:390 }); });
    $(document).ready(function() { $("#forex_chose_paire").select2({ width:190}); });
    //Слушатели
    //ФОРЕКС
    document.querySelector('#forex_dep')
        .addEventListener('input', e => {
            calc_forex();
        })
    document.querySelector('#forex_risk')
        .addEventListener('input', e => {
            calc_forex();
        })
    document.querySelector('#forex_open')
        .addEventListener('input', e => {
            calc_forex();
        })
    document.querySelector('#forex_stoploss')
        .addEventListener('input', e => {
            calc_forex();
        })

    // CRYPTO

    document.querySelector('#crypto_dep')
        .addEventListener('input', e => {
            calc_crypto();
        })
    document.querySelector('#crypto_risk')
        .addEventListener('input', e => {
            calc_crypto();
        })
    document.querySelector('#crypto_open')
        .addEventListener('input', e => {
            calc_crypto();
        })
    document.querySelector('#crypto_stoploss')
        .addEventListener('input', e => {
            calc_crypto();
        })


    // // Фильтр истории по дате
    // document.querySelector('#history_filter_date_day')
    //     .addEventListener('input', e => {
    //         filet_history_date();
    //     })

    // document.querySelector('#history_filter_date_mounth')
    // .addEventListener('input', e => {
    //     filet_history_date();
    // })
    // document.querySelector('#history_filter_date_year')
    // .addEventListener('input', e => {
    //     filet_history_date();
    // })


    //Старт страницы
    window.onload = start_page
    function start_page() {
        let orders = window.orders;
        let user_info = window.user_info;
        //user_info[0] на user_info
        if(user_info.def_save_order == 'auto'){
            document.getElementById('mode_auto').classList.add('mode_green')
            document.getElementById('mode_hand').classList.add('mode_gray')
        }
        else{
            document.getElementById('mode_auto').classList.add('mode_gray')
            document.getElementById('mode_hand').classList.add('mode_green')
        }
        //user_info[0] на user_info
        console.log('dep:'+user_info.deposit)
        strat_line()
        check_market();
        getOrders(orders)
        let forex = window.forex;

        //document.getElementById('chose_market').value = 'forex';

        document.getElementById('forex_chose_cur').value = 'RUB';
        document.getElementById('forex_chose_paire').value = 'EUR/USD';
        //user_info[0] на user_info
        document.getElementById('crypto_dep').value = user_info.deposit;
    }

    //Бегущая строка
    function strat_line(){
        let top20 = window.top20
        res_text = ''
        line1 = document.getElementById('line1')
        line2 = document.getElementById('line2')
        for(i=0; i <top20.length; i++){

            res_text +=
                '<div class="item">'+
                '<p class="name">'+top20[i]['name']+'</p>'+
                '<p class="price">'+top20[i]['price']+'</p>'
            if (parseFloat(top20[i]['percent']) > 0){
                res_text += '<p class="percent_green">'+top20[i]['percent']+'</p>'
            }
            else{
                res_text += '<p class="percent_red">'+top20[i]['percent']+'</p>'
            }

            res_text +=  '</div>'
        }
        line1.innerHTML = res_text
        line2.innerHTML = res_text
    }

    //Смена режима сохранения сделок
    function change_save_mode(green, gray){
        document.getElementById(green).classList.add('mode_green')
        document.getElementById(green).classList.remove('mode_gray')
        document.getElementById(gray).classList.add('mode_gray')
        document.getElementById(gray).classList.remove('mode_green')
        create_link_save_crypto()
    }

    //Выбор времени жини сделки
    function change_time_order_life(active){

        mas =['rc_24','rc_48','rc_week','rc_mounth']
        for(i =0; i<mas.length; i++){
            if(mas[i] == active){

                document.getElementById(active).classList.add('active')
            }
            else{
                document.getElementById(mas[i]).classList.remove('active')
            }
        }
        create_link_save_crypto()
    }

    // показываем страницы в ИСТОРЯИ СДЕЛОК
    function load_page(page){
        //Открываем следующую страницу
        document.getElementById('orders_page_'+page).classList.remove('ord_wrap_hidn')
        document.getElementById('orders_page_'+page).classList.add('orders_content_wrap')

        //Скрываем прошлую кнопку
        document.getElementById('next_page_btn_'+page).classList.add('ord_wrap_hidn')
        document.getElementById('next_page_btn_'+page).classList.remove('more_btn')
        //Показываем новую
        var next_page = page + 1
        document.getElementById('next_page_btn_'+next_page).classList.remove('ord_wrap_hidn')
        document.getElementById('next_page_btn_'+next_page).classList.add('more_btn')

        //ссылка на все сделки
    }

    //Филтр истории сделок по дате
    function filet_history_date(){
        var orders = window.orders;
        if(document.getElementById('history_filter_date_day').value.length==2 && document.getElementById('history_filter_date_mounth').value.length == 2 &&document.getElementById('history_filter_date_year').value.length == 4){
            var res_mas = [];

            var input_date = document.getElementById('history_filter_date_day').value + '.'+document.getElementById('history_filter_date_mounth').value +'.'+ document.getElementById('history_filter_date_year').value
            console.log(input_date)
            for(var i = 0; i<orders.length; i++){
                if(orders[i]['date'] == input_date){
                    res_mas.push(orders[i])
                }

            }
            getOrders(res_mas)

        }
        else{
            console.log('no')
            getOrders(orders)
        }
    }
    //Фильтр в истории  сдлеок
    function history_filter_markets(){
        var res_mas = [];
        var orders = window.orders;
        let chose_filter = document.getElementById('chose_history_market').value;
        console.log(chose_filter)
        if (chose_filter == 'history_crypto'){
            console.log('crypto')
            for(var i = 0; i < orders.length; i++){
                if(orders[i]['market'] == 'Crypto'){
                    console.log('yes')
                    res_mas.push(orders[i])
                }
            }
        }
        if (chose_filter == 'history_forex'){
            for(var i = 0; i < orders.length; i++){
                if(orders[i]['market'] == 'Forex'){
                    console.log(orders[i])
                    res_mas.push(orders[i])
                }
            }
        }

        if (chose_filter == 'all_history_markets'){
            for(var i = 0; i < orders.length; i++){
                res_mas.push(orders[i])
            }
        }

        getOrders(res_mas)
    }

    //Временной фильтр на истории сделок
    function history_filter_time(){
        let orders = window.orders;
        let chose_filter = document.getElementById('chose_history_older').value;
        console.log(chose_filter)
        var res_orders = []



        if (chose_filter == '24h'){

            for(var i = 0; i<orders.length;i++){
                var now = new Date();

                day = now.getDate()
                if (day < 10) day = '0'+day
                mounth = now.getMonth() + 1

                if (mounth < 10) mounth = '0'+mounth
                date_now_normal = day+'.'+mounth+'.'+now.getFullYear()
                // console.log(_year)
                // console.log(_mounth)
                // console.log(_day)
                // console.log(_hourse)
                // console.log(_minute)
                date_order = new Date(_year,_mounth,_day,_hourse,_minute).getTime()

                now_date = Date.now()
                console.log(date_now_normal +' '+orders[i].date)
                if (orders[i].date== date_now_normal){
                    res_orders.push(orders[i])
                }
            }
        }
        if (chose_filter =='48h'){
            for(var i = 0; i<orders.length;i++){
                _year = orders[i]['date'].split('.')[2]
                _mounth= orders[i]['date'].split('.')[1] - 1
                _day= orders[i]['date'].split('.')[0]
                _hourse = orders[i]['time'].split(':')[0]
                _minute = orders[i]['time'].split(':')[1]
                // console.log(_year)
                // console.log(_mounth)
                // console.log(_day)
                // console.log(_hourse)
                // console.log(_minute)
                date_order = new Date(_year,_mounth,_day,_hourse,_minute).getTime()
                console.log(date_order)
                now_date = Date.now()
                console.log(now_date)
                if (date_order >= now_date - 24 * 60 * 60 * 1000 * 2){
                    res_orders.push(orders[i])
                }
            }
        }
        if (chose_filter =='week'){
            for(var i = 0; i<orders.length;i++){
                _year = orders[i]['date'].split('.')[2]
                _mounth= orders[i]['date'].split('.')[1] - 1
                _day= orders[i]['date'].split('.')[0]
                _hourse = orders[i]['time'].split(':')[0]
                _minute = orders[i]['time'].split(':')[1]
                // console.log(_year)
                // console.log(_mounth)
                // console.log(_day)
                // console.log(_hourse)
                // console.log(_minute)
                date_order = new Date(_year,_mounth,_day,_hourse,_minute).getTime()
                console.log(date_order)
                now_date = Date.now()
                console.log(now_date)
                if (date_order >= now_date - 24 * 60 * 60 * 1000 * 7){
                    res_orders.push(orders[i])
                }
            }
        }
        if (chose_filter =='mounth'){
            for(var i = 0; i<orders.length;i++){
                _year = orders[i]['date'].split('.')[2]
                _mounth= orders[i]['date'].split('.')[1] - 1
                _day= orders[i]['date'].split('.')[0]
                _hourse = orders[i]['time'].split(':')[0]
                _minute = orders[i]['time'].split(':')[1]
                // console.log(_year)
                // console.log(_mounth)
                // console.log(_day)
                // console.log(_hourse)
                // console.log(_minute)
                date_order = new Date(_year,_mounth,_day,_hourse,_minute).getTime()
                console.log(date_order)
                now_date = Date.now()
                console.log(now_date)
                if (date_order >= now_date - 24 * 60 * 60 * 1000 * 30){
                    res_orders.push(orders[i])
                }
            }
        }

        if (chose_filter =='all'){
            res_orders.length = 0
            for(var i = 0; i<orders.length;i++){
                res_orders.push(orders[i])
            }
        }
        getOrders(res_orders)


    }

    // фильтр в статистике сделок
    function stat_filter(){
        let orders = window.orders;
        let chose_filter = document.getElementById('chose_stat_time').value;
        console.log(chose_filter)
        var res_orders = []

        if (chose_filter == '1_hourse'){
            for(var i = 0; i<orders.length;i++){
                _year = orders[i]['date'].split('.')[2]
                _mounth= orders[i]['date'].split('.')[1] - 1
                _day= orders[i]['date'].split('.')[0]
                _hourse = orders[i]['time'].split(':')[0]
                _minute = orders[i]['time'].split(':')[1]
                // console.log(_year)
                // console.log(_mounth)
                // console.log(_day)
                // console.log(_hourse)
                // console.log(_minute)
                date_order = new Date(_year,_mounth,_day,_hourse,_minute).getTime()
                now_date = Date.now()
                if (date_order >= now_date - 60 * 60 * 1000){
                    console.log('big')
                    res_orders.push(orders[i])
                }
            }
        }

        if (chose_filter == '12_hourse'){
            for(var i = 0; i<orders.length;i++){
                _year = orders[i]['date'].split('.')[2]
                _mounth= orders[i]['date'].split('.')[1] - 1
                _day= orders[i]['date'].split('.')[0]
                _hourse = orders[i]['time'].split(':')[0]
                _minute = orders[i]['time'].split(':')[1]
                // console.log(_year)
                // console.log(_mounth)
                // console.log(_day)
                // console.log(_hourse)
                // console.log(_minute)
                date_order = new Date(_year,_mounth,_day,_hourse,_minute).getTime()
                now_date = Date.now()
                if (date_order >= now_date - 12 * 60 * 60 * 1000){
                    console.log('big')
                    res_orders.push(orders[i])
                }
            }
        }

        if (chose_filter == '24_hourse'){

            for(var i = 0; i<orders.length;i++){
                var now = new Date();

                day = now.getDate()
                if (day < 10) day = '0'+day
                mounth = now.getMonth() + 1

                if (mounth < 10) mounth = '0'+mounth
                date_now_normal = day+'.'+mounth+'.'+now.getFullYear()
                // console.log(_year)
                // console.log(_mounth)
                // console.log(_day)
                // console.log(_hourse)
                // console.log(_minute)
                date_order = new Date(_year,_mounth,_day,_hourse,_minute).getTime()

                now_date = Date.now()
                console.log(date_now_normal +' '+orders[i].date)
                if (orders[i].date== date_now_normal){
                    res_orders.push(orders[i])
                }
            }
        }
        if (chose_filter =='1_week'){
            for(var i = 0; i<orders.length;i++){
                _year = orders[i]['date'].split('.')[2]
                _mounth= orders[i]['date'].split('.')[1] - 1
                _day= orders[i]['date'].split('.')[0]
                _hourse = orders[i]['time'].split(':')[0]
                _minute = orders[i]['time'].split(':')[1]
                // console.log(_year)
                // console.log(_mounth)
                // console.log(_day)
                // console.log(_hourse)
                // console.log(_minute)
                date_order = new Date(_year,_mounth,_day,_hourse,_minute).getTime()
                console.log(date_order)
                now_date = Date.now()
                console.log(now_date)
                if (date_order >= now_date - 24 * 60 * 60 * 1000 * 7){
                    res_orders.push(orders[i])
                }
            }
        }
        if (chose_filter =='1_mounth'){
            for(var i = 0; i<orders.length;i++){
                _year = orders[i]['date'].split('.')[2]
                _mounth= orders[i]['date'].split('.')[1] - 1
                _day= orders[i]['date'].split('.')[0]
                _hourse = orders[i]['time'].split(':')[0]
                _minute = orders[i]['time'].split(':')[1]
                // console.log(_year)
                // console.log(_mounth)
                // console.log(_day)
                // console.log(_hourse)
                // console.log(_minute)
                date_order = new Date(_year,_mounth,_day,_hourse,_minute).getTime()
                console.log(date_order)
                now_date = Date.now()
                console.log(now_date)
                if (date_order >= now_date - 24 * 60 * 60 * 1000 * 30){
                    res_orders.push(orders[i])
                }
            }
        }
        if (chose_filter =='3_mounth'){
            for(var i = 0; i<orders.length;i++){
                _year = orders[i]['date'].split('.')[2]
                _mounth= orders[i]['date'].split('.')[1] - 1
                _day= orders[i]['date'].split('.')[0]
                _hourse = orders[i]['time'].split(':')[0]
                _minute = orders[i]['time'].split(':')[1]
                // console.log(_year)
                // console.log(_mounth)
                // console.log(_day)
                // console.log(_hourse)
                // console.log(_minute)
                date_order = new Date(_year,_mounth,_day,_hourse,_minute).getTime()
                console.log(date_order)
                now_date = Date.now()
                console.log(now_date)
                if (date_order >= now_date - 24 * 60 * 60 * 1000 * 90){
                    res_orders.push(orders[i])
                }
            }
        }
        if (chose_filter =='all_time'){
            res_orders.length = 0
            for(var i = 0; i<orders.length;i++){
                res_orders.push(orders[i])
            }
        }
        getOrders(res_orders)
    }
    //Получем сделки
    function getOrders(orders){
        del_link = window.location.href;
        del_link = '{{ route('delete_order', '') }}';
        update_link = '';
        update_link_loss = '{{ route('update_order_loss', '') }}';
        update_link_profit = '{{ route('update_order_profit', '') }}';

        console.log(orders)
        console.log('len: '+orders.length)

        orders = orders.reverse()
        let user_info = window.user_info;

        //Подгружаем последний рынок
        old_market = ''
        if(orders.length != 0){
            if(orders[0].market == 'Forex') {
                old_market = 'forex';
                document.getElementById('forex_dep').value = parseFloat(orders[0].dep)
                document.getElementById('forex_risk').value = parseFloat(orders[0].risk)*100
                document.getElementById('forex_chose_cur').value = orders[0].cur
            }
            if(orders[0].market == 'Crypto') {
                old_market = 'crypto';
                document.getElementById('crypto_dep').value = parseFloat(orders[0].dep)
                document.getElementById('crypto_risk').value = parseFloat(orders[0].risk)
            }
            document.getElementById('chose_market').value = old_market
            check_market()
        }



        order_wrap = document.getElementById('history_wrap')
        order_wrap.innerHTML = ''
        var add_orders = ''
        var stop = orders.length
        var count_order = 0
        var page = 1
        var max_page = Math.ceil(orders.length/4)
        var count_active_orders = 0
        if (max_page > 5) max_page=5;

        if (orders.length > 20){
            stop = 20
        }

        //для статистики
        var now = new Date();

        day = now.getDate()
        if (day < 10) day = '0'+day
        mounth = now.getMonth() + 1

        if (mounth < 10) mounth = '0'+mounth
        date_now_normal = day+'.'+mounth+'.'+now.getFullYear()

        var count_longs = 0
        var count_shorts = 0
        var count_profit = 0
        var count_loss = 0
        var sum_dep = 0
        var sum_risk = 0
        var sum_risk_24 = 0
        var profit_percent = 0
        var riskprofit = 0
        var max_drowdown = 0
        var profit_all = 0
        var count_today = 0
        var trade_days = 0
        var max_looses = 0
        var time_hold = 0
        //Переменные
        losses = 0

        for(i = 0; i<orders.length; i++){
            if(i>=1 && orders[i]['date'] != orders[i-1]['date']){
                trade_days += 1
            }
            sum_dep += parseFloat(orders[i].dep)
            // Общий процент риска на сделку 24 часа
            _year = orders[i]['date'].split('.')[2]
            _mounth= orders[i]['date'].split('.')[1]
            _day= orders[i]['date'].split('.')[0]
            _hourse = orders[i]['time'].split(':')[0]
            _minute = orders[i]['time'].split(':')[1]

            date_order = new Date(_year,_mounth,_day,_hourse,_minute).getTime()

            now_date = Date.now()

            if (orders[i]['date'] == date_now_normal){
                count_today += 1
                sum_risk_24 += parseFloat(orders[i]['risk'])
            }

            if (parseFloat(orders[i].open) > parseFloat(orders[i].stop)){
                count_longs += 1
            }
            if(parseFloat(orders[i].open) < parseFloat(orders[i].stop)){
                count_shorts += 1
            }
            if (orders[i].market == 'Forex'){
                sum_risk += parseFloat(orders[i].risk)*100
            }
            if (orders[i].market == 'Crypto'){
                sum_risk += parseFloat(orders[i].risk)
            }
            if(orders[i].status == 'active'){
                count_active_orders += 1
            }


            if(orders[i].status == 'profit' && orders[i].date_die !='no'){
                profit_percent += parseFloat(orders[i].risk)*5
                count_profit += 1
                riskprofit += parseFloat(orders[i].multiplier)
                profit_all += parseFloat(orders[i].risk_money)*parseFloat(orders[i].multiplier)

                if(losses < max_looses){
                    max_looses = losses
                }

                losses = 0

                _year_die = orders[i]['date_die'].split('.')[2]
                _mounth_die = orders[i]['date_die'].split('.')[1]
                _day_die = orders[i]['date_die'].split('.')[0]
                _hourse_die = orders[i]['time_die'].split(':')[0]
                _minute_die = orders[i]['time_die'].split(':')[1]
                date_order_die = new Date(_year_die,_mounth_die,_day_die,_hourse_die,_minute_die).getTime()
                difference = date_order_die - date_order

                if(difference != 0){
                    time_hold += (date_order_die - date_order)/1000/60

                }

            }

            if(orders[i].status == 'loss' && orders[i].date_die !='no'){
                losses -= parseFloat(orders[i].risk_money)
                profit_percent -= parseFloat(orders[i].risk)
                count_loss += 1
                riskprofit -= 1
                max_drowdown -= parseFloat(orders[i].risk_money)
                console.log(orders[i].date_die)
                _year_die = orders[i]['date_die'].split('.')[2]
                _mounth_die = orders[i]['date_die'].split('.')[1]
                _day_die = orders[i]['date_die'].split('.')[0]
                _hourse_die = orders[i]['time_die'].split(':')[0]
                _minute_die = orders[i]['time_die'].split(':')[1]
                date_order_die = new Date(_year_die,_mounth_die,_day_die,_hourse_die,_minute_die).getTime()
                difference = date_order_die - date_order

                if(difference != 0){
                    time_hold += (date_order_die - date_order)/1000/60

                }

            }

        }
        var percent_profit = 0
        if(count_profit != 0 || count_loss != 0)
            percent_profit =  count_profit * 100 / (count_profit +count_loss)

        if(orders.length == 0){

            if(sum_dep != 0) sum_dep =0
            if(sum_risk != 0) sum_risk =0
        }
        else{
            sum_dep /= orders.length
            sum_risk /= orders.length
        }

        mdle_profit = 0
        if(count_profit > 0 ){
            mdle_profit =profit_all.toFixed(2) / count_profit.toFixed(2)
        }
        // Открываем страницу

        add_orders+='<div class="orders_content_wrap" id="orders_page_'+page+'">'

        for (i = 0; i != stop; i++){

            add_orders +=
                '<div class="order_wrap">'+
                '<div class="head">'+
                '<p class="title">Рынок:</p>'
            if(orders[i].market =='Crypto'){
                add_orders += '<p class="market_crypto">Крипта</p>'
            }
            else{
                add_orders += '<p class="market_forex">Форекс</p>'
            }
            if(orders[i].open > orders[i].stop){
                add_orders += '<img src="'+arrow_long_img+'" id="res_arrow_up" class="res_arrow" alt="long">'
            }
            else{
                add_orders += '<img src="'+arrow_short_img+'" id="res_arrow_up" class="res_arrow" alt="long">'
            }
            add_orders +='</div>'+
                '<div class="datetime">'+
                '<p>'+orders[i].date+' '+orders[i].time+'</p>'+

                '</div>'+
                '<div class="line">'+
                '<p class="title">Депозит:</p>'+
                '<p class="text">'+orders[i].dep+'</p>'+
                '</div>'
            if(orders[i].style_trade == 'breakdown'){
                add_orders +=
                    '<div class="line">'+
                    '<p class="title">Стиль торговли:</p>'+
                    '<p class="text">Пробой</p>'+
                    '</div>'
            }
            if(orders[i].style_trade == 'fake_breakdown'){
                add_orders +=
                    '<div class="line">'+
                    '<p class="title">Стиль торговли:</p>'+
                    '<p class="text">Ложный пробой</p>'+
                    '</div>'
            }
            if(orders[i].style_trade == 'rebound'){
                add_orders +=
                    '<div class="line">'+
                    '<p class="title">Стиль торговли:</p>'+
                    '<p class="text">Отбой от уровня</p>'+
                    '</div>'
            }
            if(orders[i].style_trade == 'indicators'){
                add_orders +=
                    '<div class="line">'+
                    '<p class="title">Стиль торговли:</p>'+
                    '<p class="text">Индикаторы</p>'+
                    '</div>'
            }
            if(orders[i].style_trade == 'patterns'){
                add_orders +=
                    '<div class="line">'+
                    '<p class="title">Стиль торговли:</p>'+
                    '<p class="text">Паттерны</p>'+
                    '</div>'
            }
            if(orders[i].style_trade == 'user_style'){
                add_orders +=
                    '<div class="line">'+
                    '<p class="title">Стиль торговли:</p>'+
                    '<p class="text">Собственный стиль</p>'+
                    '</div>'
            }

            if (orders[i].market == 'Forex'){
                add_orders +=
                    '<div class="line">'+
                    '<p class="title">Риск в %:</p>'+
                    '<p class="text">'+(orders[i].risk*100)+'</p>'+
                    '</div>'
                add_orders +=
                    '<div class="line">'+
                    '<p class="title">Валютная пара:</p>'+
                    '<p class="text">'+orders[i].paire.replace(':','/')+'</p>'+
                    '</div>'
            }
            if (orders[i].market == 'Crypto'){
                add_orders +=
                    '<div class="line">'+
                    '<p class="title">Символ:</p>'+
                    '<p class="text">'+orders[i].symbol+'</p>'+
                    '</div>'
                add_orders +=
                    '<div class="line">'+
                    '<p class="title">Риск в %:</p>'+
                    '<p class="text">'+orders[i].risk+'</p>'+
                    '</div>'
            }
            add_orders +=
                '<div class="line">'+
                '<p class="title">Цена открытия:</p>'+
                '<p class="text">'+orders[i].open+'</p>'+
                '</div>'+
                '<div class="line">'+
                '<p class="title">Цена StopLose:</p>'+
                '<p class="text">'+orders[i].stop+'</p>'+
                '</div>'

            if (orders[i].market == 'Forex'){

                add_orders +=
                    '<div class="line">'+
                    '<p class="title">StopLose в пунктах:</p>'+
                    '<p class="text">'+orders[i].pips+'</p>'+
                    '</div>'
            }
            if (orders[i].market == 'Crypto'){

                add_orders +=
                    '<div class="line">'+
                    '<p class="title">Объём:</p>'+
                    '<p class="text">'+orders[i].volume+'</p>'+
                    '</div>'+
                    '<div class="line">'+
                    '<p class="title">Приобретаем на:</p>'+
                    '<p class="text">'+orders[i].bay_on+'</p>'+
                    '</div>'
            }
            add_orders+=
                '<div class="line">'+
                '<p class="title">Цена TakeProfit:</p>'+
                '<div class="tp_wrap">'+
                '<p class="text"><b>x'+orders[i].multiplier+' | </b>'+orders[i].tp_price+'</p>'+
                '</div>'+
                '</div>'
            if (orders[i].market == 'Forex'){
                add_orders +=
                    '<div class="line">'+
                    '<p class="title">Риск в '+orders[i].cur+':</p>'+
                    '<p class="text">'+orders[i].risk_money+'</p>'+
                    '</div>'+
                    '<div class="line">'+
                    '<p class="title">Лот:</p>'+
                    '<p class="text">'+orders[i].lot+'</p>'+
                    '</div>'
            }
            if (orders[i].market == 'Crypto'){
                add_orders +=
                    '<div class="line">'+
                    '<p class="title">Кредитное плечо:</p>'+
                    '<p class="text">1 к '+orders[i].credit+'</p>'+
                    '</div>'+
                    '<div class="line">'+
                    '<p class="title">Риск на сделку:</p>'+
                    '<p class="text">'+orders[i].risk_money+'</p>'+
                    '</div>'
            }
            add_orders+=
                '<div class="line">'+
                '<p class="title">Прибыль:</p>'+
                '<div class="tp_wrap">'+
                '<p class="text"><b>x'+orders[i].multiplier+'| </b>'+orders[i].tp_money+'</p>'+

                '</div>'+
                '</div>'
            if(orders[i].status == 'disactive'){
                add_orders +=
                    '<div class="line">'+
                    '<p class="title">Статус:</p>'+
                    '<p class="text status_disactive">Не активна</p>'+
                    '</div>'
            }
            if(orders[i].status == 'active'){

                add_orders +=
                    '<div class="line">'+
                    '<p class="title">Статус:</p>'+
                    '<p class="text status_active">Активна</p>'+
                    '</div>'
            }
            if(orders[i].status == 'profit'){

                add_orders +=
                    '<div class="line">'+
                    '<p class="title">Статус:</p>'+
                    '<p class="text status_profit">Прибыль</p>'+
                    '</div>'
            }
            if(orders[i].status == 'loss'){


                add_orders +=
                    '<div class="line">'+
                    '<p class="title">Статус:</p>'+
                    '<p class="text status_loss">Убыток</p>'+
                    '</div>'
            }

            add_orders +='<div class="btns_wrap">'

            if(orders[i].save_mode == 'hand'){
                add_orders +=
                    '<a id = "order_loss" class="order_hand_res" href="'+update_link_loss+'/'+orders[i].id+'">Убыток</a>'+
                    '<a id = "order_profit" class="order_hand_res" href="'+update_link_profit+'/'+orders[i].id+'">Прибыль</a>'+
                    //'<a href="'+del_link+'/'+orders[i].id+'" class="delete_order"><img class="hand_img" src="'+btn_img_del+'" alt="delete_order"></a>'
                    '<a href="'+del_link +'/'+orders[i].id+'" class="delete_order"><img class="hand_img" src="'+btn_img_del+'" alt="delete_order"></a>'
            }
            else{
                // add_orders += '<a href="'+del_link+'del_order/'+orders[i].id+'" class="delete_order"><img src="'+btn_img_del+'" alt="delete_order"></a>'
                add_orders += '<a href="'+del_link +'/'+orders[i].id+'" class="delete_order"><img src="'+btn_img_del+'" alt="delete_order"></a>'

            }


            add_orders +='</div>'+
                '</div>'
            count_order += 1
            if(count_order == 4){

                count_order = 0
                page += 1
                // Закрываем страницу
                add_orders+='</div>'
                // Кнопка с ссылкой на следующую страницу
                //Если первая станицу то показываем
                if(page-1 == 1) {
                    add_orders+='<p  id="next_page_btn_'+page+'" class="more_btn" onclick="load_page('+page+')"> Показать ещё</p>'
                }
                if(page-1 !=1 && page != max_page+1){
                    add_orders+='<p  class="ord_wrap_hidn" id="next_page_btn_'+page+'" onclick="load_page('+page+')"> Показать ещё</p>'
                }
                if(page == max_page+1){
                    add_orders+='<a class="ord_wrap_hidn" id="next_page_btn_'+page+'">Показать всё</a>'
                }


                // Открываем следующую
                add_orders+='<div class="ord_wrap_hidn" id="orders_page_'+page+'">'
            }

        }
        order_wrap.innerHTML += add_orders
        cur = '₽'
        //user_info[0] на user_info
        if(user_info.currency == 'USD') cur = '$'

        document.getElementById('stat_long').innerHTML =""
        document.getElementById('stat_short').innerHTML =""
        document.getElementById('stat_total').innerHTML =""
        document.getElementById('stat_dep').innerHTML =""
        document.getElementById('stat_risk').innerHTML =""

        document.getElementById('stat_profit').innerHTML =count_profit
        document.getElementById('stat_loss').innerHTML =count_loss
        document.getElementById('stat_percent_profit').innerHTML =percent_profit.toFixed(2)

        document.getElementById('stat_long').innerHTML += count_longs
        document.getElementById('stat_short').innerHTML += count_shorts
        document.getElementById('stat_total').innerHTML += orders.length
        document.getElementById('stat_count_active_orders').innerHTML = count_active_orders
        document.getElementById('stat_dep').innerHTML += sum_dep.toFixed(2)
        document.getElementById('stat_risk').innerHTML += sum_risk.toFixed(2)
        document.getElementById('stat_risk_center').innerHTML = sum_risk.toFixed(2)+' %'
        document.getElementById('stat_risk_percent_center').innerHTML = profit_percent.toFixed(2)+' %'
        document.getElementById('stat_risk_profit_center').innerHTML = riskprofit
        document.getElementById('stat_percent_risk_24').innerHTML = sum_risk_24 +' %'
        document.getElementById('stat_drawdownr').innerHTML = max_drowdown.toFixed(2)+' '+cur
        document.getElementById('stat_max_profit').innerHTML = profit_all.toFixed(2)+' '+cur
        document.getElementById('stat_midle_profit').innerHTML = mdle_profit.toFixed(2)+' '+cur
        document.getElementById('stat_count_orders_today').innerHTML = count_today
        document.getElementById('stat_count_trade_days').innerHTML = trade_days + 1

        document.getElementById('stat_max_losses_in_strick').innerHTML = max_looses.toFixed(2)+' '+cur
        if(time_hold !=0){
            document.getElementById('stat_midle_hold_time').innerHTML = parseInt(time_hold/orders.length)+' мин.'
        }

    }

    //переключение между Активными и Завершенными
    function change_history_active_completed(status){
        if(status =='all'){
            document.getElementById('history_all_orders').classList.add('active_item')
            document.getElementById('history_disactive_orders').classList.remove('active_item')
            document.getElementById('history_completed_orders').classList.remove('active_item')
            document.getElementById('history_active_orders').classList.remove('active_item')
            let orders = window.orders;
            getOrders(orders)

        }
        if(status == 'disactive'){
            document.getElementById('history_disactive_orders').classList.add('active_item')
            document.getElementById('history_all_orders').classList.remove('active_item')
            document.getElementById('history_completed_orders').classList.remove('active_item')
            document.getElementById('history_active_orders').classList.remove('active_item')
            let orders = window.orders;
            var res_mas = [];
            for(var i = 0; i < orders.length; i++){
                if(orders[i]['status'] == 'disactive'){
                    console.log('yes')
                    res_mas.push(orders[i])
                }
            }
            getOrders(res_mas)
        }
        if(status == 'active'){
            document.getElementById('history_active_orders').classList.add('active_item')
            document.getElementById('history_completed_orders').classList.remove('active_item')
            document.getElementById('history_disactive_orders').classList.remove('active_item')
            document.getElementById('history_all_orders').classList.remove('active_item')
            let orders = window.orders;
            var res_mas = [];
            for(var i = 0; i < orders.length; i++){
                if(orders[i]['status'] == 'active'){
                    console.log('yes')
                    res_mas.push(orders[i])
                }
            }
            getOrders(res_mas)
        }
        if (status  =='completed'){
            document.getElementById('history_completed_orders').classList.add('active_item')
            document.getElementById('history_active_orders').classList.remove('active_item')
            document.getElementById('history_disactive_orders').classList.remove('active_item')
            document.getElementById('history_all_orders').classList.remove('active_item')

            let orders = window.orders;
            var res_mas = [];
            for(var i = 0; i < orders.length; i++){
                if(orders[i]['status'] == 'profit' || orders[i]['status'] == 'loss'){
                    console.log('yes')
                    res_mas.push(orders[i])
                }
            }
            getOrders(res_mas)
        }
    }


    //Переключение между кнопкам иобнул.стат.
    function switchReset(type){
        if(type == 'start'){
            document.getElementById('btn_stat_wrap_yes_no').classList.remove('ord_wrap_hidn')
            document.getElementById('btn_stat_wrap_yes_no').classList.add('btn_stat_wrap_yes_no')

            document.getElementById('btn_stat_start_reset').classList.add('ord_wrap_hidn')
            document.getElementById('btn_stat_start_reset').classList.remove('btn_stat_start_reset')
        }
        else{
            document.getElementById('btn_stat_start_reset').classList.remove('ord_wrap_hidn')
            document.getElementById('btn_stat_start_reset').classList.add('btn_stat_start_reset')

            document.getElementById('btn_stat_wrap_yes_no').classList.add('ord_wrap_hidn')
            document.getElementById('btn_stat_wrap_yes_no').classList.remove('btn_stat_wrap_yes_no')
        }
    }

    //Смена между рынками
    function check_market() {
        let chose_market = document.getElementById('chose_market').value;
        switch (chose_market) {
            case 'forex':

                document.getElementById("forex_wrap").classList.add('calc_input_active');
                document.getElementById("forex_wrap").classList.remove('calc_input_disactive');
                document.getElementById("forex_res_wrap").classList.add('active_res');
                document.getElementById("forex_res_wrap").classList.remove('disactive_res');


                document.getElementById("crypto_wrap").classList.remove('calc_input_active');
                document.getElementById("crypto_wrap").classList.add('calc_input_disactive');
                document.getElementById("crypto_res_wrap").classList.remove('active_res');
                document.getElementById("crypto_res_wrap").classList.add('disactive_res');

                document.getElementById("stoks_wrap").classList.remove('calc_input_active');
                document.getElementById("stoks_wrap").classList.add('calc_input_disactive');
                document.getElementById("stoks_res_wrap").classList.remove('active_res');
                document.getElementById("stoks_res_wrap").classList.add('disactive_res');

                // document.getElementById("future_wrap").classList.remove('calc_input_active');
                // document.getElementById("future_wrap").classList.add('calc_input_disactive');
                // document.getElementById("future_res_wrap").classList.remove('active_res');
                // document.getElementById("future_res_wrap").classList.add('disactive_res');

                break;
            case 'crypto':
                document.getElementById('chose_market').value = 'crypto'
                document.getElementById("crypto_wrap").classList.add('calc_input_active');
                document.getElementById("crypto_wrap").classList.remove('calc_input_disactive');
                document.getElementById("crypto_res_wrap").classList.add('active_res');
                document.getElementById("crypto_res_wrap").classList.remove('disactive_res');

                document.getElementById("forex_wrap").classList.remove('calc_input_active');
                document.getElementById("forex_wrap").classList.add('calc_input_disactive');
                document.getElementById("forex_res_wrap").classList.remove('active_res');
                document.getElementById("forex_res_wrap").classList.add('disactive_res');

                document.getElementById("stoks_wrap").classList.remove('calc_input_active');
                document.getElementById("stoks_wrap").classList.add('calc_input_disactive');
                document.getElementById("stoks_res_wrap").classList.remove('active_res');
                document.getElementById("stoks_res_wrap").classList.add('disactive_res');

                // document.getElementById("future_wrap").classList.remove('calc_input_active');
                // document.getElementById("future_wrap").classList.add('calc_input_disactive');
                // document.getElementById("future_res_wrap").classList.remove('active_res');
                // document.getElementById("future_res_wrap").classList.add('disactive_res');
                break;
            case 'stoks':

                document.getElementById("stoks_wrap").classList.add('calc_input_active');
                document.getElementById("stoks_wrap").classList.remove('calc_input_disactive');
                document.getElementById("stoks_res_wrap").classList.add('active_res');
                document.getElementById("stoks_res_wrap").classList.remove('disactive_res');

                document.getElementById("forex_wrap").classList.remove('calc_input_active');
                document.getElementById("forex_wrap").classList.add('calc_input_disactive');
                document.getElementById("forex_res_wrap").classList.remove('active_res');
                document.getElementById("forex_res_wrap").classList.add('disactive_res');

                document.getElementById("crypto_wrap").classList.remove('calc_input_active');
                document.getElementById("crypto_wrap").classList.add('calc_input_disactive');
                document.getElementById("crypto_res_wrap").classList.remove('active_res');
                document.getElementById("crypto_res_wrap").classList.add('disactive_res');


                // document.getElementById("future_wrap").classList.remove('calc_input_active');
                // document.getElementById("future_wrap").classList.add('calc_input_disactive');
                // document.getElementById("future_res_wrap").classList.remove('active_res');
                // document.getElementById("future_res_wrap").classList.add('disactive_res');
                break;
        }
    }

    //Переключение стрелок в РАСЧЁТ
    function display_arraow_res(type){
        if (type == 'long'){
            document.getElementById('res_arrow_up').classList.remove('ord_wrap_hidn')
            document.getElementById('res_arrow_up').classList.add('res_arrow')

            document.getElementById('res_arrow_down').classList.remove('res_arrow')
            document.getElementById('res_arrow_down').classList.add('ord_wrap_hidn')
        }
        else{
            document.getElementById('res_arrow_down').classList.remove('ord_wrap_hidn')
            document.getElementById('res_arrow_down').classList.add('res_arrow')

            document.getElementById('res_arrow_up').classList.remove('res_arrow')
            document.getElementById('res_arrow_up').classList.add('ord_wrap_hidn')
        }
    }
    function calc_forex() {
        if (document.getElementById('forex_dep').value != '' && document.getElementById('forex_risk').value != '' && document.getElementById('forex_open').value != '' && document.getElementById('forex_stoploss').value != '') {
            index = [{"paire":"AUD/CAD","price":"0","help_paire":"USD/CAD"},{"paire":"AUD/CHF","price":"0","help_paire":"USD/CHF"},{"paire":"AUD/JPY","price":"0","help_paire":"USD/JPY"},{"paire":"CAD/CHF","price":"0","help_paire":"USD/CHF"},{"paire":"CAD/JPY","price":"0","help_paire":"USD/JPY"},{"paire":"CHF/JPY","price":"0","help_paire":"USD/JPY"},{"paire":"EUR/AUD","price":"0","help_paire":"AUD/USD"},{"paire":"EUR/CAD","price":"0","help_paire":"USD/CAD"},{"paire":"EUR/CHF","price":"0","help_paire":"USD/CHF"},{"paire":"EUR/GBP","price":"0","help_paire":"GBP/USD"},{"paire":"EUR/JPY","price":"0","help_paire":"USD/JPY"},{"paire":"EUR/NZD","price":"0","help_paire":"NZD/USD"},{"paire":"GBP/AUD","price":"0","help_paire":"AUD/USD"},{"paire":"GBP/CAD","price":"0","help_paire":"USD/CAD"},{"paire":"GBP/CHF","price":"0","help_paire":"USD/CHF"},{"paire":"GBP/JPY","price":"0","help_paire":"USD/JPY"},{"paire":"GBP/NZD","price":"0","help_paire":"NZD/USD"},{"paire":"NZD/CAD","price":"0","help_paire":"USD/CAD"},{"paire":"NZD/CHF","price":"0","help_paire":"USD/CHF"},{"paire":"NZD/JPY","price":"0","help_paire":"USD/JPY"},{"paire":"NZD/USD","price":"0.62625","help_paire":""},{"paire":"GBP/USD","price":"1.2936","help_paire":""},{"paire":"EUR/USD","price":"1.12044","help_paire":""},{"paire":"AUD/USD","price":"0.677","help_paire":""},{"paire":"USD/JPY","price":"139.608","help_paire":""},{"paire":"USD/CHF","price":"0.85793","help_paire":""},{"paire":"USD/CAD","price":"1.31632","help_paire":""},{"paire":"USD/RUB","price":"91.9445","help_paire":""}].findIndex(p => p.paire == "USD/RUB");
            f_usd_rub = parseFloat([{"paire":"AUD/CAD","price":"0","help_paire":"USD/CAD"},{"paire":"AUD/CHF","price":"0","help_paire":"USD/CHF"},{"paire":"AUD/JPY","price":"0","help_paire":"USD/JPY"},{"paire":"CAD/CHF","price":"0","help_paire":"USD/CHF"},{"paire":"CAD/JPY","price":"0","help_paire":"USD/JPY"},{"paire":"CHF/JPY","price":"0","help_paire":"USD/JPY"},{"paire":"EUR/AUD","price":"0","help_paire":"AUD/USD"},{"paire":"EUR/CAD","price":"0","help_paire":"USD/CAD"},{"paire":"EUR/CHF","price":"0","help_paire":"USD/CHF"},{"paire":"EUR/GBP","price":"0","help_paire":"GBP/USD"},{"paire":"EUR/JPY","price":"0","help_paire":"USD/JPY"},{"paire":"EUR/NZD","price":"0","help_paire":"NZD/USD"},{"paire":"GBP/AUD","price":"0","help_paire":"AUD/USD"},{"paire":"GBP/CAD","price":"0","help_paire":"USD/CAD"},{"paire":"GBP/CHF","price":"0","help_paire":"USD/CHF"},{"paire":"GBP/JPY","price":"0","help_paire":"USD/JPY"},{"paire":"GBP/NZD","price":"0","help_paire":"NZD/USD"},{"paire":"NZD/CAD","price":"0","help_paire":"USD/CAD"},{"paire":"NZD/CHF","price":"0","help_paire":"USD/CHF"},{"paire":"NZD/JPY","price":"0","help_paire":"USD/JPY"},{"paire":"NZD/USD","price":"0.62625","help_paire":""},{"paire":"GBP/USD","price":"1.2936","help_paire":""},{"paire":"EUR/USD","price":"1.12044","help_paire":""},{"paire":"AUD/USD","price":"0.677","help_paire":""},{"paire":"USD/JPY","price":"139.608","help_paire":""},{"paire":"USD/CHF","price":"0.85793","help_paire":""},{"paire":"USD/CAD","price":"1.31632","help_paire":""},{"paire":"USD/RUB","price":"91.9445","help_paire":""}][index].price)
            f_dep = parseFloat(document.getElementById('forex_dep').value);
            f_dep_output = f_dep
            f_risk = parseFloat(document.getElementById('forex_risk').value) / 100;
            f_open = parseFloat(document.getElementById('forex_open').value);
            f_stop = parseFloat(document.getElementById('forex_stoploss').value);
            pips = Math.abs(f_open - f_stop) * 10000
            if (f_open > f_stop){
                display_arraow_res('long')
            }
            else{
                display_arraow_res('short')
            }
            if (document.getElementById('forex_chose_cur').value == 'RUB') {
                f_dep /= f_usd_rub;
            }
            var price_helper
            let chose_paire = document.getElementById('forex_chose_paire').value;
            console.log(chose_paire)
            if (chose_paire.includes('JPY')) {
                pips /= 100
            }

            if (chose_paire.includes('/USD')) {
                lot = (f_dep * f_risk) / pips
                lot /= 10
            }
            else if (chose_paire.includes('USD/')) {
                lot = (f_dep * f_risk * f_stop) / pips
                lot /= 10
            }
            else {
                type_paire = ''
                if (chose_paire == 'EUR/NZD' || chose_paire == 'GBP/NZD') {
                    type_paire = 'CROSSxxx/USD'
                    index = [{"paire":"AUD/CAD","price":"0","help_paire":"USD/CAD"},{"paire":"AUD/CHF","price":"0","help_paire":"USD/CHF"},{"paire":"AUD/JPY","price":"0","help_paire":"USD/JPY"},{"paire":"CAD/CHF","price":"0","help_paire":"USD/CHF"},{"paire":"CAD/JPY","price":"0","help_paire":"USD/JPY"},{"paire":"CHF/JPY","price":"0","help_paire":"USD/JPY"},{"paire":"EUR/AUD","price":"0","help_paire":"AUD/USD"},{"paire":"EUR/CAD","price":"0","help_paire":"USD/CAD"},{"paire":"EUR/CHF","price":"0","help_paire":"USD/CHF"},{"paire":"EUR/GBP","price":"0","help_paire":"GBP/USD"},{"paire":"EUR/JPY","price":"0","help_paire":"USD/JPY"},{"paire":"EUR/NZD","price":"0","help_paire":"NZD/USD"},{"paire":"GBP/AUD","price":"0","help_paire":"AUD/USD"},{"paire":"GBP/CAD","price":"0","help_paire":"USD/CAD"},{"paire":"GBP/CHF","price":"0","help_paire":"USD/CHF"},{"paire":"GBP/JPY","price":"0","help_paire":"USD/JPY"},{"paire":"GBP/NZD","price":"0","help_paire":"NZD/USD"},{"paire":"NZD/CAD","price":"0","help_paire":"USD/CAD"},{"paire":"NZD/CHF","price":"0","help_paire":"USD/CHF"},{"paire":"NZD/JPY","price":"0","help_paire":"USD/JPY"},{"paire":"NZD/USD","price":"0.62625","help_paire":""},{"paire":"GBP/USD","price":"1.2936","help_paire":""},{"paire":"EUR/USD","price":"1.12044","help_paire":""},{"paire":"AUD/USD","price":"0.677","help_paire":""},{"paire":"USD/JPY","price":"139.608","help_paire":""},{"paire":"USD/CHF","price":"0.85793","help_paire":""},{"paire":"USD/CAD","price":"1.31632","help_paire":""},{"paire":"USD/RUB","price":"91.9445","help_paire":""}].findIndex(p => p.paire == "NZD/USD");
                    price_helper = parseFloat([{"paire":"AUD/CAD","price":"0","help_paire":"USD/CAD"},{"paire":"AUD/CHF","price":"0","help_paire":"USD/CHF"},{"paire":"AUD/JPY","price":"0","help_paire":"USD/JPY"},{"paire":"CAD/CHF","price":"0","help_paire":"USD/CHF"},{"paire":"CAD/JPY","price":"0","help_paire":"USD/JPY"},{"paire":"CHF/JPY","price":"0","help_paire":"USD/JPY"},{"paire":"EUR/AUD","price":"0","help_paire":"AUD/USD"},{"paire":"EUR/CAD","price":"0","help_paire":"USD/CAD"},{"paire":"EUR/CHF","price":"0","help_paire":"USD/CHF"},{"paire":"EUR/GBP","price":"0","help_paire":"GBP/USD"},{"paire":"EUR/JPY","price":"0","help_paire":"USD/JPY"},{"paire":"EUR/NZD","price":"0","help_paire":"NZD/USD"},{"paire":"GBP/AUD","price":"0","help_paire":"AUD/USD"},{"paire":"GBP/CAD","price":"0","help_paire":"USD/CAD"},{"paire":"GBP/CHF","price":"0","help_paire":"USD/CHF"},{"paire":"GBP/JPY","price":"0","help_paire":"USD/JPY"},{"paire":"GBP/NZD","price":"0","help_paire":"NZD/USD"},{"paire":"NZD/CAD","price":"0","help_paire":"USD/CAD"},{"paire":"NZD/CHF","price":"0","help_paire":"USD/CHF"},{"paire":"NZD/JPY","price":"0","help_paire":"USD/JPY"},{"paire":"NZD/USD","price":"0.62625","help_paire":""},{"paire":"GBP/USD","price":"1.2936","help_paire":""},{"paire":"EUR/USD","price":"1.12044","help_paire":""},{"paire":"AUD/USD","price":"0.677","help_paire":""},{"paire":"USD/JPY","price":"139.608","help_paire":""},{"paire":"USD/CHF","price":"0.85793","help_paire":""},{"paire":"USD/CAD","price":"1.31632","help_paire":""},{"paire":"USD/RUB","price":"91.9445","help_paire":""}][index].price)
                }
                if (chose_paire == 'EUR/GBP') {
                    type_paire = 'CROSSxxx/USD'
                    index = [{"paire":"AUD/CAD","price":"0","help_paire":"USD/CAD"},{"paire":"AUD/CHF","price":"0","help_paire":"USD/CHF"},{"paire":"AUD/JPY","price":"0","help_paire":"USD/JPY"},{"paire":"CAD/CHF","price":"0","help_paire":"USD/CHF"},{"paire":"CAD/JPY","price":"0","help_paire":"USD/JPY"},{"paire":"CHF/JPY","price":"0","help_paire":"USD/JPY"},{"paire":"EUR/AUD","price":"0","help_paire":"AUD/USD"},{"paire":"EUR/CAD","price":"0","help_paire":"USD/CAD"},{"paire":"EUR/CHF","price":"0","help_paire":"USD/CHF"},{"paire":"EUR/GBP","price":"0","help_paire":"GBP/USD"},{"paire":"EUR/JPY","price":"0","help_paire":"USD/JPY"},{"paire":"EUR/NZD","price":"0","help_paire":"NZD/USD"},{"paire":"GBP/AUD","price":"0","help_paire":"AUD/USD"},{"paire":"GBP/CAD","price":"0","help_paire":"USD/CAD"},{"paire":"GBP/CHF","price":"0","help_paire":"USD/CHF"},{"paire":"GBP/JPY","price":"0","help_paire":"USD/JPY"},{"paire":"GBP/NZD","price":"0","help_paire":"NZD/USD"},{"paire":"NZD/CAD","price":"0","help_paire":"USD/CAD"},{"paire":"NZD/CHF","price":"0","help_paire":"USD/CHF"},{"paire":"NZD/JPY","price":"0","help_paire":"USD/JPY"},{"paire":"NZD/USD","price":"0.62625","help_paire":""},{"paire":"GBP/USD","price":"1.2936","help_paire":""},{"paire":"EUR/USD","price":"1.12044","help_paire":""},{"paire":"AUD/USD","price":"0.677","help_paire":""},{"paire":"USD/JPY","price":"139.608","help_paire":""},{"paire":"USD/CHF","price":"0.85793","help_paire":""},{"paire":"USD/CAD","price":"1.31632","help_paire":""},{"paire":"USD/RUB","price":"91.9445","help_paire":""}].findIndex(p => p.paire == "GBP/USD");
                    price_helper = parseFloat([{"paire":"AUD/CAD","price":"0","help_paire":"USD/CAD"},{"paire":"AUD/CHF","price":"0","help_paire":"USD/CHF"},{"paire":"AUD/JPY","price":"0","help_paire":"USD/JPY"},{"paire":"CAD/CHF","price":"0","help_paire":"USD/CHF"},{"paire":"CAD/JPY","price":"0","help_paire":"USD/JPY"},{"paire":"CHF/JPY","price":"0","help_paire":"USD/JPY"},{"paire":"EUR/AUD","price":"0","help_paire":"AUD/USD"},{"paire":"EUR/CAD","price":"0","help_paire":"USD/CAD"},{"paire":"EUR/CHF","price":"0","help_paire":"USD/CHF"},{"paire":"EUR/GBP","price":"0","help_paire":"GBP/USD"},{"paire":"EUR/JPY","price":"0","help_paire":"USD/JPY"},{"paire":"EUR/NZD","price":"0","help_paire":"NZD/USD"},{"paire":"GBP/AUD","price":"0","help_paire":"AUD/USD"},{"paire":"GBP/CAD","price":"0","help_paire":"USD/CAD"},{"paire":"GBP/CHF","price":"0","help_paire":"USD/CHF"},{"paire":"GBP/JPY","price":"0","help_paire":"USD/JPY"},{"paire":"GBP/NZD","price":"0","help_paire":"NZD/USD"},{"paire":"NZD/CAD","price":"0","help_paire":"USD/CAD"},{"paire":"NZD/CHF","price":"0","help_paire":"USD/CHF"},{"paire":"NZD/JPY","price":"0","help_paire":"USD/JPY"},{"paire":"NZD/USD","price":"0.62625","help_paire":""},{"paire":"GBP/USD","price":"1.2936","help_paire":""},{"paire":"EUR/USD","price":"1.12044","help_paire":""},{"paire":"AUD/USD","price":"0.677","help_paire":""},{"paire":"USD/JPY","price":"139.608","help_paire":""},{"paire":"USD/CHF","price":"0.85793","help_paire":""},{"paire":"USD/CAD","price":"1.31632","help_paire":""},{"paire":"USD/RUB","price":"91.9445","help_paire":""}][index].price)
                }

                if (chose_paire == 'EUR/AUD' || chose_paire == 'GBP/AUD') {
                    type_paire = 'CROSSxxx/USD'
                    index = [{"paire":"AUD/CAD","price":"0","help_paire":"USD/CAD"},{"paire":"AUD/CHF","price":"0","help_paire":"USD/CHF"},{"paire":"AUD/JPY","price":"0","help_paire":"USD/JPY"},{"paire":"CAD/CHF","price":"0","help_paire":"USD/CHF"},{"paire":"CAD/JPY","price":"0","help_paire":"USD/JPY"},{"paire":"CHF/JPY","price":"0","help_paire":"USD/JPY"},{"paire":"EUR/AUD","price":"0","help_paire":"AUD/USD"},{"paire":"EUR/CAD","price":"0","help_paire":"USD/CAD"},{"paire":"EUR/CHF","price":"0","help_paire":"USD/CHF"},{"paire":"EUR/GBP","price":"0","help_paire":"GBP/USD"},{"paire":"EUR/JPY","price":"0","help_paire":"USD/JPY"},{"paire":"EUR/NZD","price":"0","help_paire":"NZD/USD"},{"paire":"GBP/AUD","price":"0","help_paire":"AUD/USD"},{"paire":"GBP/CAD","price":"0","help_paire":"USD/CAD"},{"paire":"GBP/CHF","price":"0","help_paire":"USD/CHF"},{"paire":"GBP/JPY","price":"0","help_paire":"USD/JPY"},{"paire":"GBP/NZD","price":"0","help_paire":"NZD/USD"},{"paire":"NZD/CAD","price":"0","help_paire":"USD/CAD"},{"paire":"NZD/CHF","price":"0","help_paire":"USD/CHF"},{"paire":"NZD/JPY","price":"0","help_paire":"USD/JPY"},{"paire":"NZD/USD","price":"0.62625","help_paire":""},{"paire":"GBP/USD","price":"1.2936","help_paire":""},{"paire":"EUR/USD","price":"1.12044","help_paire":""},{"paire":"AUD/USD","price":"0.677","help_paire":""},{"paire":"USD/JPY","price":"139.608","help_paire":""},{"paire":"USD/CHF","price":"0.85793","help_paire":""},{"paire":"USD/CAD","price":"1.31632","help_paire":""},{"paire":"USD/RUB","price":"91.9445","help_paire":""}].findIndex(p => p.paire == "AUD/USD");
                    price_helper = parseFloat([{"paire":"AUD/CAD","price":"0","help_paire":"USD/CAD"},{"paire":"AUD/CHF","price":"0","help_paire":"USD/CHF"},{"paire":"AUD/JPY","price":"0","help_paire":"USD/JPY"},{"paire":"CAD/CHF","price":"0","help_paire":"USD/CHF"},{"paire":"CAD/JPY","price":"0","help_paire":"USD/JPY"},{"paire":"CHF/JPY","price":"0","help_paire":"USD/JPY"},{"paire":"EUR/AUD","price":"0","help_paire":"AUD/USD"},{"paire":"EUR/CAD","price":"0","help_paire":"USD/CAD"},{"paire":"EUR/CHF","price":"0","help_paire":"USD/CHF"},{"paire":"EUR/GBP","price":"0","help_paire":"GBP/USD"},{"paire":"EUR/JPY","price":"0","help_paire":"USD/JPY"},{"paire":"EUR/NZD","price":"0","help_paire":"NZD/USD"},{"paire":"GBP/AUD","price":"0","help_paire":"AUD/USD"},{"paire":"GBP/CAD","price":"0","help_paire":"USD/CAD"},{"paire":"GBP/CHF","price":"0","help_paire":"USD/CHF"},{"paire":"GBP/JPY","price":"0","help_paire":"USD/JPY"},{"paire":"GBP/NZD","price":"0","help_paire":"NZD/USD"},{"paire":"NZD/CAD","price":"0","help_paire":"USD/CAD"},{"paire":"NZD/CHF","price":"0","help_paire":"USD/CHF"},{"paire":"NZD/JPY","price":"0","help_paire":"USD/JPY"},{"paire":"NZD/USD","price":"0.62625","help_paire":""},{"paire":"GBP/USD","price":"1.2936","help_paire":""},{"paire":"EUR/USD","price":"1.12044","help_paire":""},{"paire":"AUD/USD","price":"0.677","help_paire":""},{"paire":"USD/JPY","price":"139.608","help_paire":""},{"paire":"USD/CHF","price":"0.85793","help_paire":""},{"paire":"USD/CAD","price":"1.31632","help_paire":""},{"paire":"USD/RUB","price":"91.9445","help_paire":""}][index].price)
                }

                if (chose_paire == 'AUD/JPY' || chose_paire == 'CAD/JPY' || chose_paire == 'CHF/JPY' || chose_paire == 'EUR/JPY' || chose_paire == 'GBP/JPY' || chose_paire == 'NZD/JPY') {
                    type_paire = 'USD/CROSSxxx'
                    index = [{"paire":"AUD/CAD","price":"0","help_paire":"USD/CAD"},{"paire":"AUD/CHF","price":"0","help_paire":"USD/CHF"},{"paire":"AUD/JPY","price":"0","help_paire":"USD/JPY"},{"paire":"CAD/CHF","price":"0","help_paire":"USD/CHF"},{"paire":"CAD/JPY","price":"0","help_paire":"USD/JPY"},{"paire":"CHF/JPY","price":"0","help_paire":"USD/JPY"},{"paire":"EUR/AUD","price":"0","help_paire":"AUD/USD"},{"paire":"EUR/CAD","price":"0","help_paire":"USD/CAD"},{"paire":"EUR/CHF","price":"0","help_paire":"USD/CHF"},{"paire":"EUR/GBP","price":"0","help_paire":"GBP/USD"},{"paire":"EUR/JPY","price":"0","help_paire":"USD/JPY"},{"paire":"EUR/NZD","price":"0","help_paire":"NZD/USD"},{"paire":"GBP/AUD","price":"0","help_paire":"AUD/USD"},{"paire":"GBP/CAD","price":"0","help_paire":"USD/CAD"},{"paire":"GBP/CHF","price":"0","help_paire":"USD/CHF"},{"paire":"GBP/JPY","price":"0","help_paire":"USD/JPY"},{"paire":"GBP/NZD","price":"0","help_paire":"NZD/USD"},{"paire":"NZD/CAD","price":"0","help_paire":"USD/CAD"},{"paire":"NZD/CHF","price":"0","help_paire":"USD/CHF"},{"paire":"NZD/JPY","price":"0","help_paire":"USD/JPY"},{"paire":"NZD/USD","price":"0.62625","help_paire":""},{"paire":"GBP/USD","price":"1.2936","help_paire":""},{"paire":"EUR/USD","price":"1.12044","help_paire":""},{"paire":"AUD/USD","price":"0.677","help_paire":""},{"paire":"USD/JPY","price":"139.608","help_paire":""},{"paire":"USD/CHF","price":"0.85793","help_paire":""},{"paire":"USD/CAD","price":"1.31632","help_paire":""},{"paire":"USD/RUB","price":"91.9445","help_paire":""}].findIndex(p => p.paire == "USD/JPY");
                    price_helper = parseFloat([{"paire":"AUD/CAD","price":"0","help_paire":"USD/CAD"},{"paire":"AUD/CHF","price":"0","help_paire":"USD/CHF"},{"paire":"AUD/JPY","price":"0","help_paire":"USD/JPY"},{"paire":"CAD/CHF","price":"0","help_paire":"USD/CHF"},{"paire":"CAD/JPY","price":"0","help_paire":"USD/JPY"},{"paire":"CHF/JPY","price":"0","help_paire":"USD/JPY"},{"paire":"EUR/AUD","price":"0","help_paire":"AUD/USD"},{"paire":"EUR/CAD","price":"0","help_paire":"USD/CAD"},{"paire":"EUR/CHF","price":"0","help_paire":"USD/CHF"},{"paire":"EUR/GBP","price":"0","help_paire":"GBP/USD"},{"paire":"EUR/JPY","price":"0","help_paire":"USD/JPY"},{"paire":"EUR/NZD","price":"0","help_paire":"NZD/USD"},{"paire":"GBP/AUD","price":"0","help_paire":"AUD/USD"},{"paire":"GBP/CAD","price":"0","help_paire":"USD/CAD"},{"paire":"GBP/CHF","price":"0","help_paire":"USD/CHF"},{"paire":"GBP/JPY","price":"0","help_paire":"USD/JPY"},{"paire":"GBP/NZD","price":"0","help_paire":"NZD/USD"},{"paire":"NZD/CAD","price":"0","help_paire":"USD/CAD"},{"paire":"NZD/CHF","price":"0","help_paire":"USD/CHF"},{"paire":"NZD/JPY","price":"0","help_paire":"USD/JPY"},{"paire":"NZD/USD","price":"0.62625","help_paire":""},{"paire":"GBP/USD","price":"1.2936","help_paire":""},{"paire":"EUR/USD","price":"1.12044","help_paire":""},{"paire":"AUD/USD","price":"0.677","help_paire":""},{"paire":"USD/JPY","price":"139.608","help_paire":""},{"paire":"USD/CHF","price":"0.85793","help_paire":""},{"paire":"USD/CAD","price":"1.31632","help_paire":""},{"paire":"USD/RUB","price":"91.9445","help_paire":""}][index].price)
                }
                if (chose_paire == 'AUD/CHF' || chose_paire == 'CAD/CHF' || chose_paire == 'EUR/CHF' || chose_paire == 'GBP/CHF' || chose_paire == 'NZD/CHF') {
                    index = [{"paire":"AUD/CAD","price":"0","help_paire":"USD/CAD"},{"paire":"AUD/CHF","price":"0","help_paire":"USD/CHF"},{"paire":"AUD/JPY","price":"0","help_paire":"USD/JPY"},{"paire":"CAD/CHF","price":"0","help_paire":"USD/CHF"},{"paire":"CAD/JPY","price":"0","help_paire":"USD/JPY"},{"paire":"CHF/JPY","price":"0","help_paire":"USD/JPY"},{"paire":"EUR/AUD","price":"0","help_paire":"AUD/USD"},{"paire":"EUR/CAD","price":"0","help_paire":"USD/CAD"},{"paire":"EUR/CHF","price":"0","help_paire":"USD/CHF"},{"paire":"EUR/GBP","price":"0","help_paire":"GBP/USD"},{"paire":"EUR/JPY","price":"0","help_paire":"USD/JPY"},{"paire":"EUR/NZD","price":"0","help_paire":"NZD/USD"},{"paire":"GBP/AUD","price":"0","help_paire":"AUD/USD"},{"paire":"GBP/CAD","price":"0","help_paire":"USD/CAD"},{"paire":"GBP/CHF","price":"0","help_paire":"USD/CHF"},{"paire":"GBP/JPY","price":"0","help_paire":"USD/JPY"},{"paire":"GBP/NZD","price":"0","help_paire":"NZD/USD"},{"paire":"NZD/CAD","price":"0","help_paire":"USD/CAD"},{"paire":"NZD/CHF","price":"0","help_paire":"USD/CHF"},{"paire":"NZD/JPY","price":"0","help_paire":"USD/JPY"},{"paire":"NZD/USD","price":"0.62625","help_paire":""},{"paire":"GBP/USD","price":"1.2936","help_paire":""},{"paire":"EUR/USD","price":"1.12044","help_paire":""},{"paire":"AUD/USD","price":"0.677","help_paire":""},{"paire":"USD/JPY","price":"139.608","help_paire":""},{"paire":"USD/CHF","price":"0.85793","help_paire":""},{"paire":"USD/CAD","price":"1.31632","help_paire":""},{"paire":"USD/RUB","price":"91.9445","help_paire":""}].findIndex(p => p.paire == "USD/CHF");
                    price_helper = parseFloat([{"paire":"AUD/CAD","price":"0","help_paire":"USD/CAD"},{"paire":"AUD/CHF","price":"0","help_paire":"USD/CHF"},{"paire":"AUD/JPY","price":"0","help_paire":"USD/JPY"},{"paire":"CAD/CHF","price":"0","help_paire":"USD/CHF"},{"paire":"CAD/JPY","price":"0","help_paire":"USD/JPY"},{"paire":"CHF/JPY","price":"0","help_paire":"USD/JPY"},{"paire":"EUR/AUD","price":"0","help_paire":"AUD/USD"},{"paire":"EUR/CAD","price":"0","help_paire":"USD/CAD"},{"paire":"EUR/CHF","price":"0","help_paire":"USD/CHF"},{"paire":"EUR/GBP","price":"0","help_paire":"GBP/USD"},{"paire":"EUR/JPY","price":"0","help_paire":"USD/JPY"},{"paire":"EUR/NZD","price":"0","help_paire":"NZD/USD"},{"paire":"GBP/AUD","price":"0","help_paire":"AUD/USD"},{"paire":"GBP/CAD","price":"0","help_paire":"USD/CAD"},{"paire":"GBP/CHF","price":"0","help_paire":"USD/CHF"},{"paire":"GBP/JPY","price":"0","help_paire":"USD/JPY"},{"paire":"GBP/NZD","price":"0","help_paire":"NZD/USD"},{"paire":"NZD/CAD","price":"0","help_paire":"USD/CAD"},{"paire":"NZD/CHF","price":"0","help_paire":"USD/CHF"},{"paire":"NZD/JPY","price":"0","help_paire":"USD/JPY"},{"paire":"NZD/USD","price":"0.62625","help_paire":""},{"paire":"GBP/USD","price":"1.2936","help_paire":""},{"paire":"EUR/USD","price":"1.12044","help_paire":""},{"paire":"AUD/USD","price":"0.677","help_paire":""},{"paire":"USD/JPY","price":"139.608","help_paire":""},{"paire":"USD/CHF","price":"0.85793","help_paire":""},{"paire":"USD/CAD","price":"1.31632","help_paire":""},{"paire":"USD/RUB","price":"91.9445","help_paire":""}][index].price)
                }
                if (chose_paire == 'AUD/CAD' || chose_paire == 'EUR/CAD' || chose_paire == 'GBP/CAD' || chose_paire == 'NZD/CAD') {
                    index = [{"paire":"AUD/CAD","price":"0","help_paire":"USD/CAD"},{"paire":"AUD/CHF","price":"0","help_paire":"USD/CHF"},{"paire":"AUD/JPY","price":"0","help_paire":"USD/JPY"},{"paire":"CAD/CHF","price":"0","help_paire":"USD/CHF"},{"paire":"CAD/JPY","price":"0","help_paire":"USD/JPY"},{"paire":"CHF/JPY","price":"0","help_paire":"USD/JPY"},{"paire":"EUR/AUD","price":"0","help_paire":"AUD/USD"},{"paire":"EUR/CAD","price":"0","help_paire":"USD/CAD"},{"paire":"EUR/CHF","price":"0","help_paire":"USD/CHF"},{"paire":"EUR/GBP","price":"0","help_paire":"GBP/USD"},{"paire":"EUR/JPY","price":"0","help_paire":"USD/JPY"},{"paire":"EUR/NZD","price":"0","help_paire":"NZD/USD"},{"paire":"GBP/AUD","price":"0","help_paire":"AUD/USD"},{"paire":"GBP/CAD","price":"0","help_paire":"USD/CAD"},{"paire":"GBP/CHF","price":"0","help_paire":"USD/CHF"},{"paire":"GBP/JPY","price":"0","help_paire":"USD/JPY"},{"paire":"GBP/NZD","price":"0","help_paire":"NZD/USD"},{"paire":"NZD/CAD","price":"0","help_paire":"USD/CAD"},{"paire":"NZD/CHF","price":"0","help_paire":"USD/CHF"},{"paire":"NZD/JPY","price":"0","help_paire":"USD/JPY"},{"paire":"NZD/USD","price":"0.62625","help_paire":""},{"paire":"GBP/USD","price":"1.2936","help_paire":""},{"paire":"EUR/USD","price":"1.12044","help_paire":""},{"paire":"AUD/USD","price":"0.677","help_paire":""},{"paire":"USD/JPY","price":"139.608","help_paire":""},{"paire":"USD/CHF","price":"0.85793","help_paire":""},{"paire":"USD/CAD","price":"1.31632","help_paire":""},{"paire":"USD/RUB","price":"91.9445","help_paire":""}].findIndex(p => p.paire == "USD/CAD");
                    price_helper = parseFloat([{"paire":"AUD/CAD","price":"0","help_paire":"USD/CAD"},{"paire":"AUD/CHF","price":"0","help_paire":"USD/CHF"},{"paire":"AUD/JPY","price":"0","help_paire":"USD/JPY"},{"paire":"CAD/CHF","price":"0","help_paire":"USD/CHF"},{"paire":"CAD/JPY","price":"0","help_paire":"USD/JPY"},{"paire":"CHF/JPY","price":"0","help_paire":"USD/JPY"},{"paire":"EUR/AUD","price":"0","help_paire":"AUD/USD"},{"paire":"EUR/CAD","price":"0","help_paire":"USD/CAD"},{"paire":"EUR/CHF","price":"0","help_paire":"USD/CHF"},{"paire":"EUR/GBP","price":"0","help_paire":"GBP/USD"},{"paire":"EUR/JPY","price":"0","help_paire":"USD/JPY"},{"paire":"EUR/NZD","price":"0","help_paire":"NZD/USD"},{"paire":"GBP/AUD","price":"0","help_paire":"AUD/USD"},{"paire":"GBP/CAD","price":"0","help_paire":"USD/CAD"},{"paire":"GBP/CHF","price":"0","help_paire":"USD/CHF"},{"paire":"GBP/JPY","price":"0","help_paire":"USD/JPY"},{"paire":"GBP/NZD","price":"0","help_paire":"NZD/USD"},{"paire":"NZD/CAD","price":"0","help_paire":"USD/CAD"},{"paire":"NZD/CHF","price":"0","help_paire":"USD/CHF"},{"paire":"NZD/JPY","price":"0","help_paire":"USD/JPY"},{"paire":"NZD/USD","price":"0.62625","help_paire":""},{"paire":"GBP/USD","price":"1.2936","help_paire":""},{"paire":"EUR/USD","price":"1.12044","help_paire":""},{"paire":"AUD/USD","price":"0.677","help_paire":""},{"paire":"USD/JPY","price":"139.608","help_paire":""},{"paire":"USD/CHF","price":"0.85793","help_paire":""},{"paire":"USD/CAD","price":"1.31632","help_paire":""},{"paire":"USD/RUB","price":"91.9445","help_paire":""}][index].price)
                }

                if (type_paire == 'CROSSxxx/USD') {
                    lot = (f_dep * f_risk) / (pips * price_helper)
                    lot /= 10
                }
                else {
                    lot = (f_dep * f_risk * price_helper) / pips
                    lot /= 10
                }
            }
            var tp1, tp2, tp3
            if (f_stop < f_open) {
                tp1 = Math.abs(f_open - f_stop) * 3 + f_open
                tp2 = Math.abs(f_open - f_stop) * 4 + f_open
                tp3 = Math.abs(f_open - f_stop) * 5 + f_open

            }
            else {
                tp1 = f_open - Math.abs(f_open - f_stop) * 3
                tp2 = f_open - Math.abs(f_open - f_stop) * 4
                tp3 = f_open - Math.abs(f_open - f_stop) * 5
            }
            risk_money = f_dep_output * f_risk
            // console.log(pips)
            count_number = 0
            if(f_open.toString().includes('.')){
                count_number = f_open.toString().split('.').pop().length
            }

            document.getElementById('f_res_lot').innerHTML = lot.toFixed(2)
            document.getElementById('f_res_stop_price').innerHTML = f_stop
            document.getElementById('f_res_tp1_price').innerHTML = 'x3 | '+ tp1.toFixed(count_number)
            document.getElementById('f_res_tp2_price').innerHTML = 'x4 | '+ tp2.toFixed(count_number)
            document.getElementById('f_res_tp3_price').innerHTML = 'x5 | '+ tp3.toFixed(count_number)
            document.getElementById('f_res_risk_money').innerHTML = risk_money.toFixed(2)
            document.getElementById('f_res_tp1_money').innerHTML = 'x3 | '+ (risk_money * 3).toFixed(0)
            document.getElementById('f_res_tp2_money').innerHTML = 'x4 | '+ (risk_money * 4).toFixed(0)
            document.getElementById('f_res_tp3_money').innerHTML = 'x5 | '+ (risk_money * 5).toFixed(0)

            user_id = window.user_id;

            var now = new Date();
            day = now.getDate()
            if (day < 10) day = '0'+day
            mounth = now.getMonth()
            if (mounth < 10) mounth = '0'+mounth
            date = day+'.'+mounth+'.'+now.getFullYear()
            hours = now.getHours()
            if (hours < 10) hours = '0'+hours
            minutes = now.getMinutes()
            if (minutes < 10) minutes = '0'+minutes
            time = hours +':'+ minutes
            cur = document.getElementById('forex_chose_cur').value
            type_order = 'SELL'
            if(f_open > f_stop){
                type_order='BUY'
            }
            chose_paire = chose_paire.replace('/',':')
            save_link_btn = document.getElementById('btn_save_order')
            save_link = window.location.href
            save_link = save_link.replace('calc','')
            save_link = save_link.replace('#','')
            save_link = save_link +'save_order/'+user_id+
                '/Forex/' + date+'/'+time+
                '/'+f_dep_output+'/'+f_risk+'/'+chose_paire +'/none/'+
                f_open + '/'+f_stop+'/'+ pips.toFixed(2)+'/none/none/' +
                tp1.toFixed(5)+'/'+tp2.toFixed(5)+'/'+tp3.toFixed(5)+'/'+risk_money.toFixed(2)+
                '/'+cur+'/none/'+lot.toFixed(2)+'/'+
                (risk_money * 3).toFixed(0)+'/'+
                (risk_money * 4).toFixed(0) +'/'+
                (risk_money * 5).toFixed(0)+'/disactive/'+type_order
            // + '/disactive/'+type_order
            // console.log(save_link)

            let create_order_form = save_link_btn.dataset.form_custom
            let form = document.getElementById(create_order_form.replace('#',''))
            form.user_id.value = user_id
            form.market.value = 'Forex'
            form.date.value = date
            form.time.value = time
            form.dep.value = f_dep_output
            form.risk.value = f_risk
            form.paire.value = chose_paire
            form.symbol.value = 'none'
            form.open.value = f_open
            form.stop.value = f_stop
            form.pips.value = pips.toFixed(2)
            form.volume.value = 'none'
            form.bay_on.value = 'none'

            form.tp_price.value = tp1.toFixed(5)
            form.risk_money.value = tp2.toFixed(5)
            form.cur.value = tp3.toFixed(5)

            form.credit.value = risk_money.toFixed(2)
            form.lot.value = cur
            form.tp_money.value = 'none'
            form.multiplier.value = lot.toFixed(2)

            form.status.value = (risk_money * 3).toFixed(0)
            form.type_order.value = (risk_money * 4).toFixed(0)
            form.mode.value = (risk_money * 5).toFixed(0)

            form.date_die.value = 'disactive'
            form.style_trade.value = type_order

            save_link_btn.href = save_link

        }

    }

    function calc_crypto(){

        if (document.getElementById('crypto_dep').value != '' && document.getElementById('crypto_risk').value != '' && document.getElementById('crypto_open').value != '' && document.getElementById('crypto_stoploss').value != '') {
            f_symbol = document.getElementById('crypto_chose_symbol').value;
            f_dep = parseFloat(document.getElementById('crypto_dep').value)
            f_risk = parseFloat(document.getElementById('crypto_risk').value)
            f_open = parseFloat(document.getElementById('crypto_open').value)
            f_stop = parseFloat(document.getElementById('crypto_stoploss').value)
            if (f_open > f_stop){
                display_arraow_res('long')
            }
            else{
                display_arraow_res('short')
            }
            credit = 1
            risk_count = f_dep * f_risk * 0.01
            count_bet = risk_count / Math.abs(f_open - f_stop)
            if (count_bet * f_open > f_dep)
                credit = count_bet * f_open / (f_dep + 1)

            var tp3, tp4, tp5, tp6, tp7,tp8,tp9,tp10
            if (f_stop < f_open) {
                tp3 = Math.abs(f_open - f_stop) * 3 + f_open
                tp4 = Math.abs(f_open - f_stop) * 4 + f_open
                tp5 = Math.abs(f_open - f_stop) * 5 + f_open
                tp6 = Math.abs(f_open - f_stop) * 6 + f_open
                tp7 = Math.abs(f_open - f_stop) * 7 + f_open
                tp8 = Math.abs(f_open - f_stop) * 8 + f_open
                tp9 = Math.abs(f_open - f_stop) * 9 + f_open
                tp10 = Math.abs(f_open - f_stop) * 10 + f_open

            }
            else {
                tp3 = f_open - Math.abs(f_open - f_stop) * 3
                tp4 = f_open - Math.abs(f_open - f_stop) * 4
                tp5 = f_open - Math.abs(f_open - f_stop) * 5
                tp6 = f_open - Math.abs(f_open - f_stop) * 6
                tp7 = f_open - Math.abs(f_open - f_stop) * 7
                tp8 = f_open - Math.abs(f_open - f_stop) * 8
                tp9 = f_open - Math.abs(f_open - f_stop) * 9
                tp10 = f_open - Math.abs(f_open - f_stop) * 10

            }

            count_number = 0
            if(f_open.toString().includes('.')){
                count_number = f_open.toString().split('.').pop().length
            }

            document.getElementById('crypto_res_bay_all').innerHTML = count_bet.toFixed(2)
            document.getElementById('crypto_res_bay').innerHTML = (count_bet * f_open).toFixed(2)
            // document.getElementById('crypto_res_tp1_price').innerHTML ='x3 | '+ tp1.toFixed(count_number)
            // document.getElementById('crypto_res_tp2_price').innerHTML = 'x4 | '+tp2.toFixed(count_number)
            // document.getElementById('crypto_res_tp3_price').innerHTML = 'x5 | '+tp3.toFixed(count_number)
            document.getElementById('crypto_res_credit').innerHTML = Math.ceil(credit) + ' к 1'
            document.getElementById('crypto_res_risk_money').innerHTML = risk_count.toFixed(2)

            tp_money_text = ''
            tp_money_text += '<select id="calc_crypto_res_tp_money" onchange="change_crypto_tp()">'
            tp_money_text += '<option value="3x'+tp3+'">'+(risk_count * 3).toFixed(2)+' | 3x</option>'
            tp_money_text += '<option value="4x'+tp4+'">'+(risk_count * 4).toFixed(2)+' | 4x</option>'
            tp_money_text += '<option value="5x'+tp5+'">'+(risk_count * 5).toFixed(2)+' | 5x</option>'
            tp_money_text += '<option value="6x'+tp6+'">'+(risk_count * 6).toFixed(2)+' | 6x</option>'
            tp_money_text += '<option value="7x'+tp7+'">'+(risk_count * 7).toFixed(2)+' | 7x</option>'
            tp_money_text += '<option value="8x'+tp8+'">'+(risk_count * 8).toFixed(2)+' | 8x</option>'
            tp_money_text += '<option value="9x'+tp9+'">'+(risk_count * 9).toFixed(2)+' | 9x</option>'
            tp_money_text += '<option value="10x'+tp10+'">'+(risk_count * 10).toFixed(2)+' | 10x</option>'
            tp_money_text +='</select>'
            console.log(tp_money_text)
            document.getElementById('f_res_tp_crypto_price_wrap').innerHTML =  tp_money_text
            document.getElementById('crypto_res_tp_price').innerHTML = tp3




            create_link_save_crypto()


        }
    }

    function create_link_save_crypto(){
        //Дата леквидации сделки если неактивна
        var die_date = ''

        if(document.getElementById('rc_24').classList.contains('active')){
            die_date = 'rc_24'
        }
        if(document.getElementById('rc_48').classList.contains('active')){
            die_date='rc_48'
        }
        if(document.getElementById('rc_week').classList.contains('active')){
            die_date='rc_week'
        }
        if(document.getElementById('rc_mounth').classList.contains('active')){
            die_date='rc_mounth'
        }

        value_money = document.getElementById('calc_crypto_res_tp_money').value
        multiplai = parseFloat(value_money.substring(0, value_money.indexOf("x")));
        f_dep = parseFloat(document.getElementById('crypto_dep').value)
        f_risk = parseFloat(document.getElementById('crypto_risk').value)
        f_symbol = document.getElementById('crypto_chose_symbol').value;
        f_open = parseFloat(document.getElementById('crypto_open').value)
        f_stop = parseFloat(document.getElementById('crypto_stoploss').value)
        count_bet = document.getElementById('crypto_res_bay_all').textContent
        mode = ''
        if(document.getElementById('mode_auto').classList.contains('mode_green')){
            mode='auto'
        }
        else{
            mode='hand'
        }

        count_number = 0
        if(f_open.toString().includes('.')){
            count_number = f_open.toString().split('.').pop().length
        }
        tp = parseFloat(document.getElementById('crypto_res_tp_price').textContent)
        risk_count = f_dep * f_risk * 0.01
        count_bet = risk_count / Math.abs(f_open - f_stop)

        credit = 1
        if (count_bet * f_open > f_dep)
            credit = count_bet * f_open / (f_dep + 1)

        type_order = 'SELL'
        if(f_open > f_stop){
            type_order='BUY'
        }

        style_trade = document.getElementById('crypto_chose_style_trade').value;

        user_id = window.user_id;
        var now = new Date();

        day = now.getDate()
        if (day < 10) day = '0'+day
        mounth = now.getMonth() + 1

        if (mounth < 10) mounth = '0'+mounth
        date = day+'.'+mounth+'.'+now.getFullYear()

        hours = now.getHours()
        if (hours < 10) hours = '0'+hours
        minutes = now.getMinutes()
        if (minutes < 10) minutes = '0'+minutes
        time = hours +':'+ minutes
        console.log(f_symbol)
        save_link_btn = document.getElementById('btn_save_order')
        save_link = window.location.href
        save_link = save_link.replace('calc','')
        save_link = save_link.replace('calc','#')
        save_link = save_link +'save_order/'+user_id+
            '/Crypto/' + date+'/'+time+
            '/'+f_dep+'/'+f_risk+'/none/'+f_symbol+'/'+
            f_open + '/'+f_stop+'/none/'+count_bet.toFixed(2)+
            '/'+(count_bet * f_open).toFixed(2) +
            '/'+tp.toFixed(count_number)+
            '/'+risk_count.toFixed(2)+
            '/none/'+Math.ceil(credit)+'/none/'+
            (risk_count * multiplai).toFixed(2)+'/'+multiplai+'/disactive/'+type_order+'/'+mode+
            '/'+die_date+'/'+style_trade
        // console.log(save_link)

        let create_order_form = save_link_btn.dataset.form_custom
        let form = document.getElementById(create_order_form.replace('#',''))
        form.user_id.value = user_id
        form.market.value = 'Crypto'
        form.date.value = date
        form.time.value = time
        form.dep.value = f_dep
        form.risk.value = f_risk
        form.paire.value = 'none'
        form.symbol.value = f_symbol
        form.open.value = f_open
        form.stop.value = f_stop
        form.pips.value = 'none'
        form.volume.value = count_bet.toFixed(2)
        form.bay_on.value = (count_bet * f_open).toFixed(2)
        form.tp_price.value = tp.toFixed(count_number)
        form.risk_money.value = risk_count.toFixed(2)
        form.cur.value = 'none'
        form.credit.value = Math.ceil(credit)
        form.lot.value = 'none'
        form.tp_money.value = (risk_count * multiplai).toFixed(2)
        form.multiplier.value = multiplai
        form.status.value = 'disactive'
        form.type_order.value = type_order
        form.mode.value = mode
        form.date_die.value = die_date
        form.style_trade.value = style_trade

        save_link_btn.href = save_link
    }

    $(document).ready(function() {

        //Главные натройки Ajax
        var data_ajax = {
            action: '{{ route('save_order')  }}'
            ,'_token' : document.getElementsByTagName("META")['csrf-token'].content
        };

        //Сохранение ордера
        $(document).on('click', '#btn_save_order',function(e){
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
            data_ajax.type = ob.data('request-type');
            //data_ajax.id = ob.data('id');
            // data_ajax.sform = ((par && par.length > 0) ? par.serializeDomOb() : {});
            data_ajax = ((par && par.length > 0) ? par.serializeDomOb() : {});
            data_ajax._token = document.getElementsByTagName("META")['csrf-token'].content
            data_ajax.type = 'save_order'
            console.log("Отправляем данные на сервер data_ajax: ");
            console.log(data_ajax);

            $.post( '{{ route('save_order')  }}', data_ajax, function(response) {
                
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

    

    function change_crypto_tp(){
        value_money = document.getElementById('calc_crypto_res_tp_money').value
        multiplai = parseFloat(value_money.substring(0, value_money.indexOf("x")));
        f_open = parseFloat(document.getElementById('crypto_open').value)
        f_stop = parseFloat(document.getElementById('crypto_stoploss').value)
        tp = 0
        if(f_open > f_stop){
            tp = (f_open - f_stop)
            tp *= multiplai
            tp += f_open
        }
        else{
            tp = (f_stop - f_open)
            tp *= multiplai
            tp = f_open - tp
        }
        document.getElementById('crypto_res_tp_price').innerHTML = tp
        create_link_save_crypto()

    }

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