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


    //Старт страницы
    window.onload = start_page
    function start_page() {


        let forex = <%- forex %>
        strat_line()
        // console.log(forex[0].paire);
        //document.getElementById('chose_market').value = 'forex';
        check_market();
        // document.getElementById('crypto_chose_symbol').select2
        document.getElementById('forex_chose_cur').value = 'RUB';
        document.getElementById('forex_chose_paire').value = 'EUR/USD';
    }

    //Бегущая строка
    function strat_line(){
        let top20 = <%- top20 %>;
        res_text = ''
        line1 = document.getElementById('line1')
        line2 = document.getElementById('line2')
        for(i=0; i <top20.length; i++){
            console.log(top20[i]['name'])
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
            index = <%-forex%>.findIndex(p => p.paire == "USD/RUB");
            f_usd_rub = parseFloat(<%-forex%>[index].price)
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
                    index = <%-forex%>.findIndex(p => p.paire == "NZD/USD");
                    price_helper = parseFloat(<%-forex%>[index].price)
                }
                if (chose_paire == 'EUR/GBP') {
                    type_paire = 'CROSSxxx/USD'
                    index = <%-forex%>.findIndex(p => p.paire == "GBP/USD");
                    price_helper = parseFloat(<%-forex%>[index].price)
                }

                if (chose_paire == 'EUR/AUD' || chose_paire == 'GBP/AUD') {
                    type_paire = 'CROSSxxx/USD'
                    index = <%-forex%>.findIndex(p => p.paire == "AUD/USD");
                    price_helper = parseFloat(<%-forex%>[index].price)
                }

                if (chose_paire == 'AUD/JPY' || chose_paire == 'CAD/JPY' || chose_paire == 'CHF/JPY' || chose_paire == 'EUR/JPY' || chose_paire == 'GBP/JPY' || chose_paire == 'NZD/JPY') {
                    type_paire = 'USD/CROSSxxx'
                    index = <%-forex%>.findIndex(p => p.paire == "USD/JPY");
                    price_helper = parseFloat(<%-forex%>[index].price)
                }
                if (chose_paire == 'AUD/CHF' || chose_paire == 'CAD/CHF' || chose_paire == 'EUR/CHF' || chose_paire == 'GBP/CHF' || chose_paire == 'NZD/CHF') {
                    index = <%-forex%>.findIndex(p => p.paire == "USD/CHF");
                    price_helper = parseFloat(<%-forex%>[index].price)
                }
                if (chose_paire == 'AUD/CAD' || chose_paire == 'EUR/CAD' || chose_paire == 'GBP/CAD' || chose_paire == 'NZD/CAD') {
                    index = <%-forex%>.findIndex(p => p.paire == "USD/CAD");
                    price_helper = parseFloat(<%-forex%>[index].price)
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



        }

    }

    function calc_crypto(){
        if (document.getElementById('crypto_dep').value != '' && document.getElementById('crypto_risk').value != '' && document.getElementById('crypto_open').value != '' && document.getElementById('crypto_stoploss').value != '') {
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

            count_number = 0
            if(f_open.toString().includes('.')){
                count_number = f_open.toString().split('.').pop().length
            }

            document.getElementById('crypto_res_bay_all').innerHTML = count_bet.toFixed(2)
            document.getElementById('crypto_res_bay').innerHTML = (count_bet * f_open).toFixed(2)
            document.getElementById('crypto_res_tp1_price').innerHTML ='x3 | '+ tp1.toFixed(count_number)
            document.getElementById('crypto_res_tp2_price').innerHTML = 'x4 | '+tp2.toFixed(count_number)
            document.getElementById('crypto_res_tp3_price').innerHTML = 'x5 | '+tp3.toFixed(count_number)
            document.getElementById('crypto_res_credit').innerHTML = Math.ceil(credit) + ' к 1'
            document.getElementById('crypto_res_risk_money').innerHTML = risk_count.toFixed(2)
            document.getElementById('crypto_res_tp1_money').innerHTML = 'x3 | '+ (risk_count * 3).toFixed(2)
            document.getElementById('crypto_res_tp2_money').innerHTML = 'x4 | '+ (risk_count * 4).toFixed(2)
            document.getElementById('crypto_res_tp3_money').innerHTML = 'x5 | '+ (risk_count * 5).toFixed(2)


        }
    }
</script>