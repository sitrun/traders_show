<script>
    var flag_modal_head = false
    var flag_modal_empty = false
    var flag_modal_chose_filters = false

    function show_disable_modal(id){
        if(id == 'modal_head'){
            if(flag_modal_head){
                document.getElementById('modal_head').style.display = 'none'
                flag_modal_head = false
            }else{
                document.getElementById('modal_head').style.display = 'flex'
                flag_modal_head = true
            }
        }
        if(id =='modal_empty'){
            if(flag_modal_empty){
                document.getElementById('modal_empty').style.display = 'none'
                flag_modal_empty = false
            }else{
                document.getElementById('modal_empty').style.display = 'flex'
                flag_modal_empty = true
            }
        }

        if(id== 'modal_filters'){
            if(flag_modal_chose_filters){
                document.getElementById('modal_filters').style.display = 'none'
                flag_modal_chose_filters = false
            }else{
                document.getElementById('modal_filters').style.display = 'flex'
                flag_modal_chose_filters = true
            }
        }
    }

    /*document.getElementById('cover').onchange = function () {
        var src = URL.createObjectURL(this.files[0])
        document.getElementById('img_prev_1').src = src
        document.getElementById('input_img').style.alignItems='flex-start'
        document.getElementById('input_img').style.background='none'
    }*/

    function open_modal(id){
        document.getElementById(id).style.display ='flex'
        document.getElementById('modal_head').style.display ='none'
        document.getElementById('modal_empty').style.display ='none'
        flag_modal_head = false
        flag_modal_empty = false
    }

    /*function close_modal(id){
        document.getElementById(id).style.display = 'none'
    }*/

    function chose_show_modal(id){
        document.getElementById(id).style.display='block'
        if(id == 'show_chose_all'){
            document.getElementById('show_all_filters').innerHTML ='Все'
            document.getElementById('show_chose_subscribe').style.display='none'
            document.getElementById('show_chose_none').style.display='none'
        }

        if(id == 'show_chose_subscribe'){
            document.getElementById('show_all_filters').innerHTML ='Подписчики'
            document.getElementById('show_chose_all').style.display='none'
            document.getElementById('show_chose_none').style.display='none'
        }

        if(id == 'show_chose_none'){
            document.getElementById('show_all_filters').innerHTML ='Никто'
            document.getElementById('show_chose_all').style.display='none'
            document.getElementById('show_chose_subscribe').style.display='none'
        }

        close_modal('show_who')
    }

    function comment_show_modal(id){
        document.getElementById(id).style.display='block'
        if(id == 'comment_chose_all'){
            document.getElementById('comment_all_filters').innerHTML ='Все'
            document.getElementById('comment_chose_subscribe').style.display='none'
            document.getElementById('comment_chose_none').style.display='none'
        }

        if(id == 'comment_chose_subscribe'){
            document.getElementById('comment_all_filters').innerHTML ='Подписчики'
            document.getElementById('comment_chose_all').style.display='none'
            document.getElementById('comment_chose_none').style.display='none'
        }

        if(id == 'comment_chose_none'){
            document.getElementById('comment_all_filters').innerHTML ='Никто'
            document.getElementById('comment_chose_subscribe').style.display='none'
            document.getElementById('comment_chose_subscribe').style.display='none'
        }

        close_modal('comment_who')
    }


    function switching_modals(typeSwitch){

        if(typeSwitch =='checking'){
            close_modal('modal_create_article')
            open_modal('modal_create_article_red')

            document.getElementById('name_text_check').innerHTML = document.getElementById('name_post_create').value

            document.getElementById('dis_text_check').innerHTML = document.getElementById('dis_text_create').value

            document.getElementById('img_check').src = document.getElementById('img_prev_1').src


            tags = document.getElementById('tags_create').value
            tags = tags.split(',')


            final_text_tags = ''
            for(i = 0; i< tags.length; i++){
                final_text_tags +=
                    '<div class="item_tags"># '+
                    tags[i]+
                    '</div>'
            }

            document.getElementById('wrap_recoments_tags_check').innerHTML = final_text_tags


            document.getElementById('date_check').innerHTML = document.getElementById('datetime_create').textContent
            document.getElementById('show_check').innerHTML = document.getElementById('show_all_filters').textContent
            document.getElementById('comment_check').innerHTML = document.getElementById('comment_all_filters').textContent

        }

        if(typeSwitch =='create'){
            close_modal('modal_create_article_red')
            open_modal('modal_create_article')
        }
    }


    //РЕДАКТОР
    var selected_text = ''

    function click_article_text(){
        document.getElementById('article_text_placeholder').style.display = 'none'
    }




    function add_style_text(style){
        text_div =  document.getElementById('article_text')
        old_text =text_div.innerHTML



        old_text = old_text.replaceAll('<div>','<p>')
        old_text = old_text.replaceAll('</div>','</p>')
        new_text = ''
        // for(i = 0; i<selected_text.length - 1; i++){
        //     new_text += selected_text[i]+'<br>'
        //     old_text = old_text.replace(selected_text[i],'')
        // }
        // alert(new_text)

        if(style == 'bold'){

            old_text = old_text.replaceAll('<p>'+selected_text+'</p>','<p class="text_bold">'+selected_text+'</p>')
            old_text = old_text.replaceAll('<p class="text_green_line">'+selected_text+'</p>','<p class="text_bold">'+selected_text+'</p>')


        }
        if(style == 'greenLine'){
            old_text = old_text.replaceAll('<p>'+selected_text+'</p>','<p class="text_green_line">'+selected_text+'</p>')
            old_text = old_text.replaceAll('<p class="text_bold">'+selected_text+'</p>','<p class="text_green_line">'+selected_text+'</p>')

        }
        if(style == 'def'){
            old_text = old_text.replaceAll('<p class="text_green_line">'+selected_text+'</p>','<p>'+selected_text+'</p>')
            old_text = old_text.replaceAll('<p class="text_bold">'+selected_text+'</p>','<p>'+selected_text+'</p>')

        }

        text_div.innerHTML = old_text

    }


    function getSelectedText() {
        var text = "";
        if (typeof window.getSelection != "undefined") {
            text = window.getSelection().toString();
        } else if (typeof document.selection != "undefined" && document.selection.type == "Text") {
            text = document.selection.createRange().text;
        }
        return text;
    }

    function doSomethingWithSelectedText() {
        var selectedText = getSelectedText();
        if (selectedText) {
            selected_text= selectedText;

        }
    }
    document.getElementById('article_text').onmouseup = doSomethingWithSelectedText;
    document.getElementById('article_text').onkeyup = doSomethingWithSelectedText;


    /* !! Скрипты для отдельного окна создания статьи */
    function add_line(){
        parent = document.getElementById('text_article_all')
        child = document.getElementById('btn_add_line')
        parent.removeChild(child)

        count = document.querySelectorAll('#text_article_all > div.item_article')

        id = count[count.length-1].id + 1
        bold = 'bold'
        standart = 'standart'
        green_line = 'green_line'

        parent.innerHTML +=
            '<div class="standart item_article" id="'+id+'">'+
            '<p contenteditable></p>'+
            ' <div class="btns">'+
            ' <div class="editor_item" onclick="change_style('+id+','+standart+')">'+
            '<img src="{{ asset('storage/img/editor_def.png') }}" alt="editor_def">'+
            '</div>'+
            '<div class="editor_item" onclick="change_style('+id+','+bold+')">'+
            '<img src="{{ asset('storage/img/editor_bold.png') }}" alt="editor_bold">'+
            ' </div>'+
            '<div class="editor_item" onclick="change_style('+id+','+green_line+')">'+
            '<img src="{{ asset('storage/img/editor_green.png') }}" alt="editor_green">'+
            '</div>'+
            '<div class="delete_item" onclick="delete_line('+id+')">'+
            '<img src="{{ asset('storage/img/delete_icon.png') }}" alt="delete_icon">'+
            '</div>'+
            '</div>'+
            '</div>'+
            '<div id="btn_add_line" onclick="add_line()">'+
            '<img src="{{ asset('storage/img/add_icon.png') }}" alt="add_icon">'+
            '</div>'

    }

    function change_style(id, style){
        elem = document.getElementById(id)
        elem.classList.remove('standart')
        elem.classList.remove('bold')
        elem.classList.remove('green_line')
        if(style == 'bold'){
            elem.classList.add('bold')
        }
        if(style == 'standart'){
            elem.classList.add('standart')
        }
        if(style == 'green_line'){
            elem.classList.add('green_line')
        }
    }

    function delete_line(id){
        parent = document.getElementById('text_article_all')
        child = document.getElementById(id)
        parent.removeChild(child)
    }


    document.getElementById('cover').onchange = function () {
        var src = URL.createObjectURL(this.files[0])
        document.getElementById('img_prev_1').src = src

        document.getElementById('img_prev_1').style.height = '200px'
        document.getElementById('input_img').style.alignItems='flex-start'
        document.getElementById('input_img').style.background='none'
    }

    function chose_arrow(name_modal,chose){
        if(name_modal == 'modal_date'){
            document.getElementById('publish_now').style.display = 'none'
            document.getElementById('publish_date').style.display = 'none'
            document.getElementById(chose).style.display = 'block'
        }
        if(name_modal == 'modal_show'){
            document.getElementById('show_all').style.display = 'none'
            document.getElementById('show_subscribe').style.display = 'none'
            document.getElementById('show_something').style.display = 'none'
            document.getElementById(chose).style.display = 'block'
        }
        if(name_modal == 'modal_comment'){
            document.getElementById('comment_all').style.display = 'none'
            document.getElementById('comment_subscribe').style.display = 'none'
            document.getElementById('comment_something').style.display = 'none'
            document.getElementById(chose).style.display = 'block'
        }



    }

    function close_modal(name_modal){
        document.getElementById(name_modal).style.display = 'none'
        if(name_modal == 'modal_date')
        {
            if(document.getElementById('publish_now').style.display == 'none'){
                datetime = document.getElementById('publish_date_input').value
                datetime = datetime.replace('T',' ')

                document.getElementById('publish_final_chose').innerHTML = datetime
            }
            else{
                document.getElementById('publish_final_chose').innerHTML = 'Сейчас'
            }
        }

        if(name_modal == 'modal_show')
        {
            if(document.getElementById('show_all').style.display != 'none'){
                document.getElementById('show_final_chose').innerHTML = 'Все'
            }
            if(document.getElementById('show_subscribe').style.display != 'none'){
                document.getElementById('show_final_chose').innerHTML = 'Подписчики'
            }
            if(document.getElementById('show_something').style.display != 'none'){
                document.getElementById('show_final_chose').innerHTML = 'Никто'
            }
        }

        if(name_modal == 'modal_comment')
        {
            if(document.getElementById('comment_all').style.display != 'none'){
                document.getElementById('comment_final_chose').innerHTML = 'Все'
            }
            if(document.getElementById('comment_subscribe').style.display != 'none'){
                document.getElementById('comment_final_chose').innerHTML = 'Подписчики'
            }
            if(document.getElementById('comment_something').style.display != 'none'){
                document.getElementById('comment_final_chose').innerHTML = 'Никто'
            }
        }
    }


</script>