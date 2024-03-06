<div id="page_trader_signals" class="profile_page">
    <div class="left">
        <form action="POST">
            <p class="title mobile_title">Сигналы</p>
            <p class="dis">Выберите рынок:</p>
            <select name="market" id="c_market" class="input" onchange="document.getElementById('market').innerHTML=document.getElementById('c_market').value">
                <option value="Форекс">Форекс</option>
                <option value="Крипта">Крипта</option>
            </select>
            <p class="dis">Выберите инструмент:</p>
            <select name="paire" id="" class="input">
                <option value="chose">Выбрать</option>
            </select>
            <p class="dis">Выберите стиль торговли:</p>
            <select name="style_trading" id="" class="input">
                <option value="chose">Выбрать</option>
            </select>
            <p class="dis">Цена входа:</p>
            <select name="price_open" id="" class="input">
                <option value="chose">Выбрать</option>
            </select>
            <p class="dis">Stop Loss:</p>
            <select name="price_stop" id="" class="input">
                <option value="chose">Выбрать</option>
            </select>
            <p class="dis">Take Profit:</p>
            <select name="price_takeProfit" id="" class="input">
                <option value="chose">Выбрать</option>
            </select>

            <input type="submit" value="Выложить сделку" class="btn_send_signal">

        </form>

    </div>

    <div class="right">
        <p class="title">Результаты</p>
        <p class="dis">Рынок:</p>
        <p class="black" id="market">Выбранный</p>
        <p class="dis">Иснтрумент:</p>
        <p class="black">Выбранный</p>
        <p class="dis">Стиль торговли:</p>
        <p class="black">Выбранный</p>
        <p class="dis">Цена входа:</p>
        <p class="black">Выбранный</p>
        <p class="dis">Stop Loss:</p>
        <p class="black">Выбранный</p>
        <p class="dis">Take Profit</p>
        <p class="black">Выбранный</p>
    </div>
</div>