<x-app-layout>

    <x-slot name="target_styles">
        <link rel="stylesheet" href="{{ mix("css/app.css") }}">
        <link rel="stylesheet" href="{{ mix("css/auth_old.css") }}">
    </x-slot>
    <x-slot name="title">| Калькулятор</x-slot>

<div class="top20_line">
    <div>
        <h1 id="line1">
        </h1>
        <h1 id="line2">
        </h1>
    </div>
</div>

<div class="m_wrap">
    <div class="center_wrap">
        <!-- Калькулятор -->
        <div class="calc">
            <div class="title_center_cont">Калькулятор</div>

            <div class="calc_market">
                <p class="title">Выберите рынок:</p>
                <select id="chose_market" onchange="check_market()">
                    <option value="crypto">Криптовалюта</option>
                    <option value="forex">Форекс</option>
                    <!-- <option value="stoks">Акции</option> -->
                    <!-- <option value="future">Фьючерсы</option> -->
                </select>
            </div>

            <div id="calc_inputs">
                <div id="crypto_wrap" class="calc_input_active">
                    <div class="line">
                        <div class="line_item">
                            <p class="title">Стиль торговли:</p>
                            <select id="crypto_chose_style_trade" onchange="calc_crypto()">
                                <option value="breakdown">Пробой</option>
                                <option value="fake_breakdown">Ложный пробой</option>
                                <option value="rebound">Отбой от уровня</option>
                                <option value="indicators">Индикаторы</option>
                                <option value="patterns">Паттерны</option>
                                <option value="user_style">Собственный стиль</option>
                            </select>
                        </div>
                        <div class="line_item">
                            <p class="title">Символ:</p>
                            <select id="crypto_chose_symbol"  name="state" onchange="calc_crypto()">
                                <option value="BTC">BTC/USDT</option>
                                <option value="ETH">ETH/USDT</option>
                                <option value="TUSD">TUSD/USDT</option>
                                <option value="BUSD">BUSD/USDT</option>
                                <option value="BNB">BNB/USDT</option>
                                <option value="XRP">XRP/USDT</option>
                                <option value="RAD">RAD/USDT</option>
                                <option value="ARB">ARB/USDT</option>
                                <option value="EDU">EDU/USDT</option>
                                <option value="IDEX">IDEX/USDT</option>
                                <option value="SOL">SOL/USDT</option>
                                <option value="RNDR">RNDR/USDT</option>
                                <option value="LTC">LTC/USDT</option>
                                <option value="DOGE">DOGE/USDT</option>
                                <option value="ID">ID/USDT</option>
                                <option value="MATIC">MATIC/USDT</option>
                                <option value="INJ">INJ/USDT</option>
                                <option value="CFX">CFX/USDT</option>
                                <option value="EUR">EUR/USDT</option>
                                <option value="ADA">ADA/USDT</option>
                                <option value="TRX">TRX/USDT</option>
                                <option value="APT">APT/USDT</option>
                                <option value="BETA">BETA/USDT</option>
                                <option value="FTM">FTM/USDT</option>
                                <option value="ICP">ICP/USDT</option>
                                <option value="UMA">UMA/USDT</option>
                                <option value="SHIB">SHIB/USDT</option>
                                <option value="FIL">FIL/USDT</option>
                                <option value="SXP">SXP/USDT</option>
                                <option value="GALA">GALA/USDT</option>
                                <option value="AVAX">AVAX/USDT</option>
                                <option value="ATOM">ATOM/USDT</option>
                                <option value="DOT">DOT/USDT</option>
                                <option value="RLC">RLC/USDT</option>
                                <option value="CTSI">CTSI/USDT</option>
                                <option value="OP">OP/USDT</option>
                                <option value="LINK">LINK/USDT</option>
                                <option value="RDNT">RDNT/USDT</option>
                                <option value="DYDX">DYDX/USDT</option>
                                <option value="USDP">USDP/USDT</option>
                                <option value="AUD">AUD/USDT</option>
                                <option value="CHZ">CHZ/USDT</option>
                                <option value="JASMY">JASMY/USDT</option>
                                <option value="EGLD">EGLD/USDT</option>
                                <option value="AGIX">AGIX/USDT</option>
                                <option value="NEAR">NEAR/USDT</option>
                                <option value="XMR">XMR/USDT</option>
                                <option value="COCOS">COCOS/USDT</option>
                                <option value="SAND">SAND/USDT</option>
                                <option value="HOOK">HOOK/USDT</option>
                                <option value="MASK">MASK/USDT</option>
                                <option value="CAKE">CAKE/USDT</option>
                                <option value="OG">OG/USDT</option>
                                <option value="FET">FET/USDT</option>
                                <option value="WOO">WOO/USDT</option>
                                <option value="VET">VET/USDT</option>
                                <option value="LINA">LINA/USDT</option>
                                <option value="OAX">OAX/USDT</option>
                                <option value="ALPHA">ALPHA/USDT</option>
                                <option value="AUCTION">AUCTION/USDT</option>
                                <option value="LUNC">LUNC/USDT</option>
                                <option value="TOMO">TOMO/USDT</option>
                                <option value="MDT">MDT/USDT</option>
                                <option value="POLYX">POLYX/USDT</option>
                                <option value="MAGIC">MAGIC/USDT</option>
                                <option value="PEOPLE">PEOPLE/USDT</option>
                                <option value="APE">APE/USDT</option>
                                <option value="OMG">OMG/USDT</option>
                                <option value="KAVA">KAVA/USDT</option>
                                <option value="GRT">GRT/USDT</option>
                                <option value="LDO">LDO/USDT</option>
                                <option value="ROSE">ROSE/USDT</option>
                                <option value="LQTY">LQTY/USDT</option>
                                <option value="DEGO">DEGO/USDT</option>
                                <option value="ACH">ACH/USDT</option>
                                <option value="EOS">EOS/USDT</option>
                                <option value="VGX">VGX/USDT</option>
                                <option value="WAVES">WAVES/USDT</option>
                                <option value="HBAR">HBAR/USDT</option>
                                <option value="STX">STX/USDT</option>
                                <option value="HFT">HFT/USDT</option>
                                <option value="CRV">CRV/USDT</option>
                                <option value="IMX">IMX/USDT</option>
                                <option value="MINA">MINA/USDT</option>
                                <option value="GMT">GMT/USDT</option>
                                <option value="ETC">ETC/USDT</option>
                                <option value="NEO">NEO/USDT</option>
                                <option value="STG">STG/USDT</option>
                                <option value="JOE">JOE/USDT</option>
                                <option value="GBP">GBP/USDT</option>
                                <option value="UNFI">UNFI/USDT</option>
                                <option value="MANA">MANA/USDT</option>
                                <option value="ZIL">ZIL/USDT</option>
                                <option value="GTC">GTC/USDT</option>
                                <option value="MKR">MKR/USDT</option>
                                <option value="SNX">SNX/USDT</option>
                                <option value="AR">AR/USDT</option>
                                <option value="SSV">SSV/USDT</option>
                                <option value="RARE">RARE/USDT</option>
                                <option value="BNX">BNX/USDT</option>
                                <option value="GMX">GMX/USDT</option>
                                <option value="HIGH">HIGH/USDT</option>
                                <option value="UNI">UNI/USDT</option>
                                <option value="KSM">KSM/USDT</option>
                                <option value="ALGO">ALGO/USDT</option>
                                <option value="RUNE">RUNE/USDT</option>
                                <option value="JST">JST/USDT</option>
                                <option value="FLOW">FLOW/USDT</option>
                                <option value="ONE">ONE/USDT</option>
                                <option value="AXS">AXS/USDT</option>
                                <option value="LUNA">LUNA/USDT</option>
                                <option value="FXS">FXS/USDT</option>
                                <option value="CELR">CELR/USDT</option>
                                <option value="QNT">QNT/USDT</option>
                                <option value="BCH">BCH/USDT</option>
                                <option value="TVK">TVK/USDT</option>
                                <option value="AAVE">AAVE/USDT</option>
                                <option value="PAXG">PAXG/USDT</option>
                                <option value="ICX">ICX/USDT</option>
                                <option value="OCEAN">OCEAN/USDT</option>
                                <option value="ASTR">ASTR/USDT</option>
                                <option value="GAL">GAL/USDT</option>
                                <option value="ANKR">ANKR/USDT</option>
                                <option value="BAR">BAR/USDT</option>
                                <option value="POLS">POLS/USDT</option>
                                <option value="JUV">JUV/USDT</option>
                                <option value="XLM">XLM/USDT</option>
                                <option value="ACM">ACM/USDT</option>
                                <option value="DASH">DASH/USDT</option>
                                <option value="KLAY">KLAY/USDT</option>
                                <option value="THETA">THETA/USDT</option>
                                <option value="SUSHI">SUSHI/USDT</option>
                                <option value="BURGER">BURGER/USDT</option>
                                <option value="ZEC">ZEC/USDT</option>
                                <option value="TWT">TWT/USDT</option>
                                <option value="USTC">USTC/USDT</option>
                                <option value="BEL">BEL/USDT</option>
                                <option value="RIF">RIF/USDT</option>
                                <option value="VIDT">VIDT/USDT</option>
                                <option value="LRC">LRC/USDT</option>
                                <option value="SYN">SYN/USDT</option>
                                <option value="GNS">GNS/USDT</option>
                                <option value="HOT">HOT/USDT</option>
                                <option value="ALPINE">ALPINE/USDT</option>
                                <option value="HIFI">HIFI/USDT</option>
                                <option value="ERN">ERN/USDT</option>
                                <option value="KEY">KEY/USDT</option>
                                <option value="COTI">COTI/USDT</option>
                                <option value="RSR">RSR/USDT</option>
                                <option value="KDA">KDA/USDT</option>
                                <option value="BETH">BETH/USDT</option>
                                <option value="AUDIO">AUDIO/USDT</option>
                                <option value="IOTA">IOTA/USDT</option>
                                <option value="ORN">ORN/USDT</option>
                                <option value="SUN">SUN/USDT</option>
                                <option value="YFI">YFI/USDT</option>
                                <option value="ONT">ONT/USDT</option>
                                <option value="XTZ">XTZ/USDT</option>
                                <option value="ACA">ACA/USDT</option>
                                <option value="PHB">PHB/USDT</option>
                                <option value="ASR">ASR/USDT</option>
                                <option value="REEF">REEF/USDT</option>
                                <option value="BSW">BSW/USDT</option>
                                <option value="TRU">TRU/USDT</option>
                                <option value="CITY">CITY/USDT</option>
                                <option value="GLMR">GLMR/USDT</option>
                                <option value="PERP">PERP/USDT</option>
                                <option value="ENJ">ENJ/USDT</option>
                                <option value="CKB">CKB/USDT</option>
                                <option value="SLP">SLP/USDT</option>
                                <option value="BAND">BAND/USDT</option>
                                <option value="ATM">ATM/USDT</option>
                                <option value="ENS">ENS/USDT</option>
                                <option value="LIT">LIT/USDT</option>
                                <option value="RVN">RVN/USDT</option>
                                <option value="STRAX">STRAX/USDT</option>
                                <option value="C98">C98/USDT</option>
                                <option value="SANTOS">SANTOS/USDT</option>
                                <option value="CELO">CELO/USDT</option>
                                <option value="DREP">DREP/USDT</option>
                                <option value="XVS">XVS/USDT</option>
                                <option value="T">T/USDT</option>
                                <option value="LTO">LTO/USDT</option>
                                <option value="API3">API3/USDT</option>
                                <option value="DENT">DENT/USDT</option>
                                <option value="LEVER">LEVER/USDT</option>
                                <option value="FIDA">FIDA/USDT</option>
                                <option value="CHR">CHR/USDT</option>
                                <option value="VOXEL">VOXEL/USDT</option>
                                <option value="DODO">DODO/USDT</option>
                                <option value="QI">QI/USDT</option>
                                <option value="CLV">CLV/USDT</option>
                                <option value="ZEN">ZEN/USDT</option>
                                <option value="IOTX">IOTX/USDT</option>
                                <option value="COMP">COMP/USDT</option>
                                <option value="ALICE">ALICE/USDT</option>
                                <option value="1INCH">1INCH/USDT</option>
                                <option value="DAR">DAR/USDT</option>
                                <option value="LAZIO">LAZIO/USDT</option>
                                <option value="OSMO">OSMO/USDT</option>
                                <option value="POND">POND/USDT</option>
                                <option value="PORTO">PORTO/USDT</option>
                                <option value="BOND">BOND/USDT</option>
                                <option value="RPL">RPL/USDT</option>
                                <option value="KMD">KMD/USDT</option>
                                <option value="DUSK">DUSK/USDT</option>
                                <option value="TLM">TLM/USDT</option>
                                <option value="BTTC">BTTC/USDT</option>
                                <option value="BAT">BAT/USDT</option>
                                <option value="SKL">SKL/USDT</option>
                                <option value="PYR">PYR/USDT</option>
                                <option value="ARPA">ARPA/USDT</option>
                                <option value="CHESS">CHESS/USDT</option>
                                <option value="AKRO">AKRO/USDT</option>
                                <option value="QTUM">QTUM/USDT</option>
                                <option value="NULS">NULS/USDT</option>
                                <option value="XEM">XEM/USDT</option>
                                <option value="IOST">IOST/USDT</option>
                                <option value="ANT">ANT/USDT</option>
                                <option value="STMX">STMX/USDT</option>
                                <option value="OGN">OGN/USDT</option>
                                <option value="REN">REN/USDT</option>
                                <option value="FLUX">FLUX/USDT</option>
                                <option value="REQ">REQ/USDT</option>
                                <option value="WING">WING/USDT</option>
                                <option value="MOB">MOB/USDT</option>
                                <option value="VIB">VIB/USDT</option>
                                <option value="PSG">PSG/USDT</option>
                                <option value="KNC">KNC/USDT</option>
                                <option value="AGLD">AGLD/USDT</option>
                                <option value="BADGER">BADGER/USDT</option>
                                <option value="GAS">GAS/USDT</option>
                                <option value="BLZ">BLZ/USDT</option>
                                <option value="QUICK">QUICK/USDT</option>
                                <option value="PERL">PERL/USDT</option>
                                <option value="SUPER">SUPER/USDT</option>
                                <option value="NKN">NKN/USDT</option>
                                <option value="ZRX">ZRX/USDT</option>
                                <option value="AMP">AMP/USDT</option>
                                <option value="UTK">UTK/USDT</option>
                                <option value="PHA">PHA/USDT</option>
                                <option value="SPELL">SPELL/USDT</option>
                                <option value="CTXC">CTXC/USDT</option>
                                <option value="MBOX">MBOX/USDT</option>
                                <option value="WIN">WIN/USDT</option>
                                <option value="MOVR">MOVR/USDT</option>
                                <option value="YGG">YGG/USDT</option>
                                <option value="ILV">ILV/USDT</option>
                                <option value="DIA">DIA/USDT</option>
                                <option value="TKO">TKO/USDT</option>
                                <option value="AMB">AMB/USDT</option>
                                <option value="BICO">BICO/USDT</option>
                                <option value="FORTH">FORTH/USDT</option>
                                <option value="XEC">XEC/USDT</option>
                                <option value="CVP">CVP/USDT</option>
                                <option value="UFT">UFT/USDT</option>
                                <option value="TFUEL">TFUEL/USDT</option>
                                <option value="WNXM">WNXM/USDT</option>
                                <option value="BAKE">BAKE/USDT</option>
                                <option value="WAXP">WAXP/USDT</option>
                                <option value="PROM">PROM/USDT</option>
                                <option value="RAY">RAY/USDT</option>
                                <option value="LOKA">LOKA/USDT</option>
                                <option value="REI">REI/USDT</option>
                                <option value="LPT">LPT/USDT</option>
                                <option value="IRIS">IRIS/USDT</option>
                                <option value="MC">MC/USDT</option>
                                <option value="VTHO">VTHO/USDT</option>
                                <option value="CTK">CTK/USDT</option>
                                <option value="MULTI">MULTI/USDT</option>
                                <option value="CVX">CVX/USDT</option>
                                <option value="DEXE">DEXE/USDT</option>
                                <option value="FIRO">FIRO/USDT</option>
                                <option value="SFP">SFP/USDT</option>
                                <option value="YFII">YFII/USDT</option>
                                <option value="FIS">FIS/USDT</option>
                                <option value="MDX">MDX/USDT</option>
                                <option value="OM">OM/USDT</option>
                                <option value="KP3R">KP3R/USDT</option>
                                <option value="NEXO">NEXO/USDT</option>
                                <option value="OOKI">OOKI/USDT</option>
                                <option value="FLM">FLM/USDT</option>
                                <option value="SCRT">SCRT/USDT</option>
                                <option value="MTL">MTL/USDT</option>
                                <option value="PROS">PROS/USDT</option>
                                <option value="HIVE">HIVE/USDT</option>
                                <option value="AVA">AVA/USDT</option>
                                <option value="FRONT">FRONT/USDT</option>
                                <option value="SC">SC/USDT</option>
                                <option value="DATA">DATA/USDT</option>
                                <option value="GNO">GNO/USDT</option>
                                <option value="DF">DF/USDT</option>
                                <option value="COS">COS/USDT</option>
                                <option value="SYS">SYS/USDT</option>
                                <option value="STEEM">STEEM/USDT</option>
                                <option value="STPT">STPT/USDT</option>
                                <option value="PLA">PLA/USDT</option>
                                <option value="TRB">TRB/USDT</option>
                                <option value="BNT">BNT/USDT</option>
                                <option value="BAL">BAL/USDT</option>
                                <option value="DGB">DGB/USDT</option>
                                <option value="ADX">ADX/USDT</option>
                                <option value="FIO">FIO/USDT</option>
                                <option value="WRX">WRX/USDT</option>
                                <option value="WTC">WTC/USDT</option>
                                <option value="GHST">GHST/USDT</option>
                                <option value="HARD">HARD/USDT</option>
                                <option value="NMR">NMR/USDT</option>
                                <option value="XNO">XNO/USDT</option>
                                <option value="TROY">TROY/USDT</option>
                                <option value="FARM">FARM/USDT</option>
                                <option value="STORJ">STORJ/USDT</option>
                                <option value="LOOM">LOOM/USDT</option>
                                <option value="GLM">GLM/USDT</option>
                                <option value="MBL">MBL/USDT</option>
                                <option value="OXT">OXT/USDT</option>
                                <option value="DCR">DCR/USDT</option>
                                <option value="EPX">EPX/USDT</option>
                                <option value="ARDR">ARDR/USDT</option>
                                <option value="PNT">PNT/USDT</option>
                                <option value="XVG">XVG/USDT</option>
                                <option value="ELF">ELF/USDT</option>
                                <option value="ALCX">ALCX/USDT</option>
                                <option value="VITE">VITE/USDT</option>
                                <option value="PUNDIX">PUNDIX/USDT</option>
                                <option value="WAN">WAN/USDT</option>
                                <option value="FOR">FOR/USDT</option>
                                <option value="POWR">POWR/USDT</option>
                                <option value="DOCK">DOCK/USDT</option>
                                <option value="BTS">BTS/USDT</option>
                                <option value="QKC">QKC/USDT</option>
                                <option value="ONG">ONG/USDT</option>
                                <option value="LSK">LSK/USDT</option>
                                <option value="ALPACA">ALPACA/USDT</option>
                                <option value="FUN">FUN/USDT</option>
                                <option value="MLN">MLN/USDT</option>
                                <option value="BIFI">BIFI/USDT</option>
                                <option value="WBTC">WBTC/USDT</option>
                            </select>
                        </div>
                        <div class="line_item">
                            <p class="title">Депозит:</p>
                            <input placeholder="1000" type="number" id="crypto_dep">
                        </div>
                        <div class="line_item">
                            <p class="title">Процент риска:</p>
                            <input placeholder="0.1" type="number" id="crypto_risk">
                        </div>
                    </div>
                    <div class="line_crypto_open_stop">
                        <div class="line_item_crypto_open_stop">
                            <p class="title">Цена открытия:</p>
                            <input placeholder="100" type="number" id="crypto_open">
                        </div>
                        <div class="line_item_crypto_open_stop">
                            <p class="title">Цена стоп-лосса:</p>
                            <input placeholder="100" type="number" id="crypto_stoploss">
                        </div>
                    </div>
                </div>
                <div id="forex_wrap" class="calc_input_disactive">
                    <div class="line">
                        <div class="line_item">
                            <p class="title">Валюта:</p>
                            <select id="forex_chose_cur" onchange="calc_forex()">
                                <option value="USD">USD</option>
                                <option value="RUB">RUB</option>
                            </select>
                        </div>
                        <div class="line_item">
                            <p class="title">Пара:</p>
                            <select id="forex_chose_paire" onchange="calc_forex()">
                                <option value="AUD/CAD">AUD/CAD</option>
                                <option value="AUD/CHF">AUD/CHF</option>
                                <option value="AUD/JPY">AUD/JPY</option>
                                <option value="AUD/USD">AUD/USD</option>
                                <option value="CAD/CHF">CAD/CHF</option>
                                <option value="CAD/JPY">CAD/JPY</option>
                                <option value="CHF/JPY">CHF/JPY</option>
                                <option value="EUR/AUD">EUR/AUD</option>
                                <option value="EUR/CAD">EUR/CAD</option>
                                <option value="EUR/CHF">EUR/CHF</option>
                                <option value="EUR/GBP">EUR/GBP</option>
                                <option value="EUR/JPY">EUR/JPY</option>
                                <option value="EUR/NZD">EUR/NZD</option>
                                <option value="EUR/USD">EUR/USD</option>
                                <option value="GBP/AUD">GBP/AUD</option>
                                <option value="GBP/CAD">GBP/CAD</option>
                                <option value="GBP/CHF">GBP/CHF</option>
                                <option value="GBP/JPY">GBP/JPY</option>
                                <option value="GBP/NZD">GBP/NZD</option>
                                <option value="GBP/USD">GBP/USD</option>
                                <option value="NZD/CAD">NZD/CAD</option>
                                <option value="NZD/CHF">NZD/CHF</option>
                                <option value="NZD/JPY">NZD/JPY</option>
                                <option value="NZD/USD">NZD/USD</option>
                                <option value="USD/CAD">USD/CAD</option>
                                <option value="USD/CHF">USD/CHF</option>
                                <option value="USD/JPY">USD/JPY</option>
                            </select>
                        </div>
                    </div>
                    <div class="line">
                        <div class="line_item">
                            <p class="title">Депозит:</p>
                            <input placeholder="1000" type="number" id="forex_dep">
                        </div>
                        <div class="line_item">
                            <p class="title">Процент риска:</p>
                            <input placeholder="0.1" type="number" id="forex_risk">
                        </div>
                    </div>

                    <div class="line">
                        <div class="line_item">
                            <p class="title">Цена открытия:</p>
                            <input placeholder="100" type="number" id="forex_open">
                        </div>
                        <div class="line_item">
                            <p class="title">Цена стоп-лосса:</p>
                            <input placeholder="100" type="number" id="forex_stoploss">
                        </div>
                    </div>

                </div>



                <div id="stoks_wrap" class="calc_input_disactive">
                    <div class="line">
                        <div class="line_item">
                            <p class="title">Депозит:</p>
                            <input placeholder="1000" type="number" id="stoks_dep">
                        </div>
                        <div class="line_item">
                            <p class="title">Процент риска:</p>
                            <input placeholder="0.1" type="number" id="stoks_risk">
                        </div>
                    </div>
                    <div class="line">
                        <div class="line_item">
                            <p class="title">Цена открытия:</p>
                            <input placeholder="100" type="number" id="stoks_open">
                        </div>
                        <div class="line_item">
                            <p class="title">Цена стоп-лосса:</p>
                            <input placeholder="100" type="number" id="stoks_stoploss">
                        </div>
                    </div>
                </div>

            </div>


        </div>

        <!-- Резульататы -->
        <div class="results">
            <div class="title_center_cont_res">
                <p class="res_title">Расчёт</p>
                <img src="{{ asset('storage/img/arrow_long.png') }}" id="res_arrow_up" class="res_arrow" alt="long">
                <img src="{{ asset('storage/img/arrow_short.png') }}" id="res_arrow_down" class="ord_wrap_hidn" alt="short">
            </div>

            <div id='calc_result'>
                <!-- ФОрекс -->
                <div id="forex_res_wrap" class="active_res">
                    <div class="res_item gray_line">
                        <div class="label_wrap gray_label">
                            <p class="calc_text_res_label">Лот:</p>
                        </div>

                        <p class="calc_text_res" id='f_res_lot'>1</p>
                    </div>
                    <div class="res_item">
                        <div class="label_wrap">
                            <p class="calc_text_res_label">Stop Loss:</p>
                            <p class="calc_text_res_label_bot">(цена)</p>
                        </div>
                        <p class="calc_text_res" id='f_res_stop_price'></p>
                    </div>
                    <div class="res_item gray_line">
                        <div class="label_wrap gray_label">
                            <p class="calc_text_res_label">Take Profit:</p>
                            <p class="calc_text_res_label_bot">(цена)</p>
                        </div>
                        <div class='f_res_tp_price_wrap'>
                            <div class="f_res_tp_price_item">
                                <p class="f_res_tp1_price f_res_tp" id="f_res_tp1_price"></p>
                            </div>
                            <div class="f_res_tp_price_item">
                                <p class="f_res_tp2_price f_res_tp" id="f_res_tp2_price"></p>
                            </div>
                            <div class="f_res_tp_price_item">
                                <p class="f_res_tp3_price f_res_tp" id="f_res_tp3_price"></p>
                            </div>
                        </div>
                    </div>
                    <div class="res_item ">
                        <div class="label_wrap">
                            <p class="calc_text_res_label">Риск на</p>
                            <p class="calc_text_res_label_bot">сделку:</p>
                        </div>
                        <p class="calc_text_res" id='f_res_risk_money'></p>
                    </div>
                    <div class="res_item gray_line">
                        <div class="label_wrap gray_label">
                            <p class="calc_text_res_label">Прибыль:</p>
                        </div>
                        <div class='f_res_tp_price_wrap'>
                            <div class="f_res_tp_price_item">
                                <p class="f_res_tp1_money f_res_tp" id="f_res_tp1_money"></p>
                            </div>
                            <div class="f_res_tp_price_item">
                                <p class="f_res_tp2_money f_res_tp" id="f_res_tp2_money"></p>
                            </div>
                            <div class="f_res_tp_price_item">
                                <p class="f_res_tp3_money f_res_tp" id="f_res_tp3_money"></p>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- КРИПТА -->
                <div id="crypto_res_wrap" class="disactive_res">

                    <div class="res_item gray_line">
                        <div class="label_wrap gray_label">
                            <p class="calc_text_res_label">Количество (шт.): </p>
                        </div>
                        <p class="calc_text_res" id='crypto_res_bay_all'></p>
                    </div>

                    <div class="res_item">
                        <div class="label_wrap">
                            <p class="calc_text_res_label">Сумма покупки: </p>
                        </div>
                        <p class="calc_text_res" id='crypto_res_bay'></p>
                    </div>

                    <div class="res_item gray_line">
                        <div class="label_wrap gray_label">
                            <p class="calc_text_res_label">Take Profit:</p>
                            <p class="calc_text_res_label_bot">(цена)</p>
                        </div>
                        <div class='f_res_tp_price_wrap'>
                            <div class="f_res_tp_price_item">
                                <p class="f_res_tp1_price f_res_tp" id="crypto_res_tp1_price"></p>
                            </div>
                            <div class="f_res_tp_price_item">
                                <p class="f_res_tp2_price f_res_tp" id="crypto_res_tp2_price"></p>
                            </div>
                            <div class="f_res_tp_price_item">
                                <p class="f_res_tp3_price f_res_tp" id="crypto_res_tp3_price"></p>
                            </div>
                        </div>
                    </div>

                    <div class="res_item">
                        <div class="label_wrap">
                            <p class="calc_text_res_label">Кредитное плечо:</p>
                        </div>
                        <p class="calc_text_res" id='crypto_res_credit'></p>
                    </div>

                    <div class="res_item gray_line">
                        <div class="label_wrap gray_label">
                            <p class="calc_text_res_label">Риск на</p>
                            <p class="calc_text_res_label_bot">сделку:</p>
                        </div>
                        <p class="calc_text_res" id='crypto_res_risk_money'></p>
                    </div>
                    <div class="res_item">
                        <div class="label_wrap">
                            <p class="calc_text_res_label">Прибыль:</p>
                        </div>
                        <div class='f_res_tp_price_wrap'>
                            <div class="f_res_tp_price_item">
                                <p class="f_res_tp1_money f_res_tp" id="crypto_res_tp1_money"></p>
                            </div>
                            <div class="f_res_tp_price_item">
                                <p class="f_res_tp2_money f_res_tp" id="crypto_res_tp2_money"></p>
                            </div>
                            <div class="f_res_tp_price_item">
                                <p class="f_res_tp3_money f_res_tp" id="crypto_res_tp3_money"></p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Акции -->
                <div id="stoks_res_wrap" class="disactive_res">
                    <div class="res_item gray_line">
                        <div class="label_wrap gray_label">
                            <p class="calc_text_res_label">Покупаем: </p>
                        </div>
                        <p class="calc_text_res" id='stoks_res_bay_all'></p>
                    </div>

                    <!-- <div class="res_item">
                        <div class="label_wrap">
                            <p class="calc_text_res_label">Приобретаем на: </p>
                        </div>
                        <p class="calc_text_res" id='stoks_res_bay'></p>
                    </div> -->

                    <div class="res_item ">
                        <div class="label_wrap">
                            <p class="calc_text_res_label">Take Profit:</p>
                            <p class="calc_text_res_label_bot">(цена)</p>
                        </div>
                        <div class='f_res_tp_price_wrap'>
                            <div class="f_res_tp_price_item">
                                <p class="head">3 к 1</p>
                                <p class="f_res_tp1_price f_res_tp" id="stoks_res_tp1_price">1.000 |</p>
                            </div>
                            <div class="f_res_tp_price_item">
                                <p class="head">4 к 1</p>
                                <p class="f_res_tp2_price f_res_tp" id="stoks_res_tp2_price">1.000 |</p>
                            </div>
                            <div class="f_res_tp_price_item">
                                <p class="head">5 к 1</p>
                                <p class="f_res_tp3_price f_res_tp" id="stoks_res_tp3_price">1.000</p>
                            </div>
                        </div>
                    </div>

                    <div class="res_item gray_line">
                        <div class="label_wrap gray_label">
                            <p class="calc_text_res_label">Кредитное плечо: </p>
                        </div>
                        <p class="calc_text_res" id='stoks_res_credit'></p>
                    </div>

                    <div class="res_item ">
                        <div class="label_wrap">
                            <p class="calc_text_res_label">Риск на</p>
                            <p class="calc_text_res_label_bot">сделку:</p>
                        </div>
                        <p class="calc_text_res" id='stoks_res_risk_money'></p>
                    </div>
                    <div class="res_item gray_line">
                        <div class="label_wrap gray_label">
                            <p class="calc_text_res_label">Take Profit:</p>
                            <p class="calc_text_res_label_bot">(цена)</p>
                        </div>
                        <div class='f_res_tp_price_wrap'>
                            <div class="f_res_tp_price_item">
                                <p class="head">3 к 1</p>
                                <p class="f_res_tp1_money f_res_tp" id="stoks_res_tp1_money">1000 |</p>
                            </div>
                            <div class="f_res_tp_price_item">
                                <p class="head">4 к 1</p>
                                <p class="f_res_tp2_money f_res_tp" id="stoks_res_tp2_money">1000 |</p>
                            </div>
                            <div class="f_res_tp_price_item">
                                <p class="head">5 к 1</p>
                                <p class="f_res_tp3_money f_res_tp" id="stoks_res_tp3_money">1000</p>
                            </div>
                        </div>
                    </div>
                </div>


                <a  class="btn_save_public" id="btn_save_order" href="login" >
                    Сохранить сделку
                </a>
            </div>


        </div>

        <!-- Статистика -->
        <div class="stat">
            <div class="stat_wrap_title">
                <div class="title_center_cont">Статистика</div>
                <select id="chose_stat_time">
                    <option value="all_time">Всё время</option>
                </select>
            </div>
            @guest
            <div class="public_calc_glassmorh">
                <p class="title">Для доступа к дополнительным функциям, авторизуйтесь или пройдите регистрацию</p>
                <div class="btns">
                    <a class='go_log' href="login" >Авторизация</a>
                    <a class = 'go_reg' href="register">Регистрация</a>
                </div>
            </div>
            @endguest
            <div class="stat_wrap">
                <div class="stat_line gray_line">
                    <p class="title">Всего сделок:</p>
                    <p id="stat_total" class="stat_text_right">15</p>
                </div>
                <div class="stat_line">
                    <p class="title">Средний депозит: </p>
                    <p id="stat_dep" class="stat_text_right">10000</p>
                </div>
                <div class="stat_line gray_line">
                    <p class="title">Средний % риска:</p>
                    <p id="stat_risk" class="stat_text_right">3.5</p>
                </div>
                <div class="stat_line">
                    <p class="title">Long-сделки:</p>
                    <p id="stat_long" class="stat_text_right">8</p>
                </div>
                <div class="stat_line gray_line">
                    <p class="title">Short-сделки:</p>
                    <p id="stat_short" class="stat_text_right">7</p>
                </div>

            </div>
        </div>
    </div>

    <!-- Краткая статистика аккаунта -->
    <div class="center_stat_wrap">
        <div class="item">
            <div class="title">Активных сделок</div>
            <div class="res" id="stat_count_active_orders">0</div>
        </div>
        <div class="item">
            <div class="title">Изменение в %</div>
            <div class="res" id="stat_risk_percent_center">0%</div>
        </div>
        <div class="item">
            <div class="title">Средний процент риска
                на сделку
            </div>
            <div class="res" id="stat_risk_center">0</div>
        </div>
        <div class="item">
            <div class="title">Риск/Прибыль</div>
            <div class="res" id="stat_risk_profit_center">0</div>
        </div>
    </div>
    <!-- Вторая строка -->
    <div class="center_stat_wrap">
        <div class="item">
            <div class="title">Общий процент риска от депозита за сегодня</div>
            <div class="res" id="stat_percent_risk_24">0</div>
        </div>
        <div class="item">
            <div class="title">Максимальная просадка депозита</div>
            <div class="res" id="stat_drawdownr">0</div>
        </div>
        <div class="item">
            <div class="title">Максимальный профит на депозит
            </div>
            <div class="res" id="stat_max_profit">0</div>
        </div>
        <div class="item">
            <div class="title">Средняя прибыль</div>
            <div class="res" id="stat_midle_profit">0</div>
        </div>
    </div>
    <!-- Третья строка -->
    <div class="center_stat_wrap">
        <div class="item">
            <div class="title">Сделок за сегодня</div>
            <div class="res" id="stat_count_orders_today">0</div>
        </div>
        <div class="item">
            <div class="title">Торговых дней</div>
            <div class="res" id="stat_count_trade_days">0</div>
        </div>
        <div class="item">
            <div class="title">Максимальный убыток в серии сделок
            </div>
            <div class="res" id="stat_max_losses_in_strick">0</div>
        </div>
        <div class="item">
            <div class="title">Среднее время удержание сделки</div>
            <div class="res" id="stat_midle_hold_time">0</div>
        </div>
    </div>
    <!-- Сигналы -->
    <div class="signals">
        <div class="first">
            <div class="title">Крайние сигналы от Трейдеров</div>
            <div class="right">
                <img src="{{ asset('storage/img/icon_tg.png') }}" alt="tg">
                <a href="https://t.me/ForPeoplePrivate_bot" class="link">Подписаться</a>
            </div>
        </div>
        <div class="second">
            <div class="left">
                <div class="top">
                    <div class="date">07.03.2023</div>
                    <div class="disc">В рамках спецификации современных стандартов, диаграммы связей освещают чрезвычайно интересные особенности картины в целом, однако конкретные выводы, разумеется, смешаны с не уникальными данными</div>
                    <a href="" class="more">Посмотреть полностью</a>
                </div>
                <div class="bottom">
                    <div class="first">
                        <div class="title">Цена входа: </div>
                        <div class="black">2 000₽ </div>
                    </div>
                    <div class="second">
                        <div class="title">Направление: </div>
                        <div class="black">Лонг </div>
                    </div>
                </div>

            </div>
            <img src="{{ asset('storage/img/signals.png') }}" alt="signals">
        </div>
        <div class="third">
            <div class="all_signal">
                Все сигналы
            </div>
        </div>
    </div>
    <x-footer-view></x-footer-view>
    <x-footer-scripts-app></x-footer-scripts-app>
</div>
</div>
</x-app-layout>