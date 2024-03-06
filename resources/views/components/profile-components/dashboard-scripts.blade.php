<script>
    //Глобальная переменная для отступов
    var global_padding = 520


    // Боковая навигация
    function open_submenu(id){
        el = document.getElementById(id)
        if(getComputedStyle(el).display == 'none'){
            el.style.display = "flex";

            if(id == 'submenu_buy' || id=='submenu_ref'){
                global_padding += 100;

                change_left_nav(id)

            }

            if(id == 'submenu_trader'){
                global_padding += 250;
                change_left_nav(id)
            }

        }
        else{
            el.style.display = "none";

            if(id == 'submenu_buy' || id=='submenu_ref'){
                global_padding -= 100;
            }

            if(id == 'submenu_trader'){
                global_padding -= 250;
            }



        }
        add_paddings()



    }

    //Добавление отспупов при активации подменю в моб.версии
    function add_paddings(){
        if(window.screen.width < 768){
            mobile_title = document.querySelectorAll('.mobile_title')
            mobile_title.forEach(item => {
                item.style.marginBottom = global_padding+'px'
            })
        }

    }

    //Переход между страницами
    function open_page(id){
        pages = document.querySelectorAll('.profile_page')
        pages.forEach(el =>{
            el.style.display = "none";
        })
        document.getElementById(id).style.display = "flex";

        nav_left_item = document.querySelectorAll('.nav_left .title')
        nav_left_item.forEach(el =>{
            el.classList.remove('nav_active')
        })
        nav_left = id.replace('page_','nav_left_')
        nave_active = document.getElementById(nav_left)
        nave_active.classList.add('nav_active')
        name_nav = nave_active.textContent
        document.getElementById('nav_active_top').innerHTML = name_nav


    }

    //Переключение между пунктами меню
    function change_left_nav(id){
        nav_left_item = document.querySelectorAll('.nav_left .title')
        nav_left_item.forEach(el =>{
            el.classList.remove('nav_active')
        })
        nav_left = id.replace('page_','nav_left_')
        nave_active = document.getElementById(nav_left)
        nave_active.classList.add('nav_active')
    }
    //Функция копирования в буфер обмена
    function copy_buffer(){
        var input = document.querySelector('input[name="ref_code"]');
        navigator.clipboard.writeText(input.value)
            .catch(err => {
                console.log('Скопировать в буфер не удалось', err);
            });
    }


    //Переключение с режима отображения на режим редактирования и наоборот
    function switch_mode(id_active, id_disactive){
        document.getElementById(id_active).style.display = "flex";
        document.getElementById(id_disactive).style.display = "none";
    }

    //Включение модального окна
    function display_modal(id){
        window.scrollTo({ top: 0, behavior: 'smooth' });
        document.getElementById(id).style.display = "block";
    }

    //Выключени модального окна
    function disable_modal(id){
        document.getElementById(id).style.display = "none";
    }

    //Переключатель Главного бургер меню
    function tongle_burger(status){
        if(status == 'open'){
            document.querySelector('.header_center_wrap .nav').style.display = 'flex'
            document.querySelector('.right_btns .burger_close').style.display = 'flex'
            document.querySelector('.right_btns .burger').style.display = 'none'

            document.querySelector('.nav_left_wrap .nav_left').style.display = 'none'
            document.querySelector('.nav_left_wrap .burger_close_submenu').style.display = 'none'
            document.querySelector('.nav_left_wrap .burger_submenu').style.display = 'none'
            mobile_title = document.querySelectorAll('.mobile_title')
            mobile_title.forEach(item => {
                item.style.marginBottom = '16px'
            })
        }
        else{
            document.querySelector('.header_center_wrap .nav').style.display = 'none'
            document.querySelector('.right_btns .burger_close').style.display = 'none'
            document.querySelector('.right_btns .burger').style.display = 'flex'

            document.querySelector('.nav_left_wrap .nav_left').style.display = 'none'
            document.querySelector('.nav_left_wrap .burger_close_submenu').style.display = 'none'
            document.querySelector('.nav_left_wrap .burger_submenu').style.display = 'flex'
            mobile_title = document.querySelectorAll('.mobile_title')
            mobile_title.forEach(item => {
                item.style.marginBottom = '16px'
            })
        }

    }

    //Переключатель Второстепенного бургер меню
    function togle_berger_subnav(status){
        // document.querySelector('#'+page+' #burger_subnav_close').style.display = 'flex'
        if(status == 'open'){
            document.querySelector('.nav_left_wrap .nav_left').style.display = 'block'
            document.querySelector('.nav_left_wrap .burger_close_submenu').style.display = 'flex'
            document.querySelector('.nav_left_wrap .burger_submenu').style.display = 'none'
            document.querySelector('.mobile_title').style.marginBottom = '520px'
            mobile_title = document.querySelectorAll('.mobile_title')
            mobile_title.forEach(item => {
                item.style.marginBottom = global_padding+'px'
            })
        }
        else{
            document.querySelector('.nav_left_wrap .nav_left').style.display = 'none'
            document.querySelector('.nav_left_wrap .burger_close_submenu').style.display = 'none'
            document.querySelector('.nav_left_wrap .burger_submenu').style.display = 'flex'
            document.querySelector('.right_content .mobile_title').style.marginBottom = '16px'
            mobile_title = document.querySelectorAll('.mobile_title')
            mobile_title.forEach(item => {
                item.style.marginBottom = '16px'
            })
        }

    }

</script>