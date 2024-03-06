
<div id="modal_filters">

    <div class="title">Настройка публикации</div>
    <div class="line">
        <div class="title">
            Время публикации
        </div>
        <div class="btn">
            <div class="text" id="datetime_create">Сейчас</div>
            <img src="{{ asset('storage/img/arrow_right.png') }}" alt="arrow_right">
        </div>
    </div>

    <div class="line" onclick="open_modal('show_who')">
        <div class="title">
            Кто видит статью
        </div>
        <div class="btn">
            <div class="text" id="show_all_filters">Все</div>
            <img src="{{ asset('storage/img/arrow_right.png') }}" alt="arrow_right">
        </div>
    </div>

    <div class="line" onclick="open_modal('comment_who')">
        <div class="title">
            Кто может комментировать
        </div>
        <div class="btn">
            <div class="text" id="comment_all_filters">Все</div>
            <img src="{{ asset('storage/img/arrow_right.png') }}" alt="arrow_right">
        </div>
    </div>
</div>

<div id="show_who">
    <div class="title_wrap" onclick="close_modal('show_who')">
        <img src="{{ asset('storage/img/arrow_back.png') }}" alt="arrow_back" >

        <div class="title">Кто видит публикацию</div>

    </div>

    <div class="line" onclick="chose_show_modal('show_chose_all')">
        <div class="title">Все</div>
        <img src="{{ asset('storage/img/arrow_chose.png') }}" alt="arrow_chose" id="show_chose_all">
    </div>

    <div class="line" onclick="chose_show_modal('show_chose_subscribe')">
        <div class="title">Подписчики</div>
        <img src="{{ asset('storage/img/arrow_chose.png') }}" alt="arrow_chose"  id="show_chose_subscribe">
    </div>

    <div class="line" onclick="chose_show_modal('show_chose_none')">
        <div class="title">Никто</div>
        <img src="{{ asset('storage/img/arrow_chose.png') }}" alt="arrow_chose"  id="show_chose_none">
    </div>
</div>

<div id="comment_who">
    <div class="title_wrap" onclick="close_modal('comment_who')">
        <img src="{{ asset('storage/img/arrow_back.png') }}" alt="arrow_back" >

        <div class="title">Кто может комментировать</div>

    </div>

    <div class="line" onclick="comment_show_modal('comment_chose_all')">
        <div class="title">Все</div>
        <img src="{{ asset('storage/img/arrow_chose.png') }}" alt="arrow_chose" id="comment_chose_all">
    </div>

    <div class="line" onclick="comment_show_modal('comment_chose_subscribe')">
        <div class="title">Подписчики</div>
        <img src="{{ asset('storage/img/arrow_chose.png') }}" alt="arrow_chose"  id="comment_chose_subscribe">
    </div>

    <div class="line" onclick="comment_show_modal('comment_chose_none')">
        <div class="title">Никто</div>
        <img src="{{ asset('storage/img/arrow_chose.png') }}" alt="arrow_chose"  id="comment_chose_none">
    </div>
</div>


<!-- ФОРМА сохранение статьи ПЕРЕД ПРОВЕРКОЙ -->
<div id="modal_create_article" style="display: none;">
    <div class="wrap">
        <form method="post" class="request_ajax_form">
            @method('PUT')
            <div class="head">
                <div class="title">Написать статью</div>
                <div class="close_modal" onclick="close_modal('modal_create_article')">
                    <img src="{{ asset('storage/img/close_modal.png') }}" alt="close modal">
                </div>

            </div>

            <div class="name">
                <div class="sub_title">Название статьи</div>
                <input type="text" name="name_post" placeholder="Название статьи" id="name_post_create">
            </div>

            <div class="dis_wrap">
                <div class="sub_title">Краткое описание</div>
                <textarea id='dis_text_create' class="dis" name="short_desc" cols="30" rows="10" placeholder="Краткое описание"></textarea>
            </div>


            <div class="article_text_wrap">
                <div class="name_head">
                    <div class="sub_title">Текст статьи</div>
                    <div class="editor_btns">
                        <div class="item_editor" onclick="add_style_text('def')">
                            <img src="{{ asset('storage/img/editor_def.png') }}" alt="editor_bold">
                        </div>

                        <div class="item_editor" onclick="add_style_text('bold')">
                            <img src="{{ asset('storage/img/editor_bold.png') }}" alt="editor_bold">
                        </div>

                        <div class="item_editor" onclick="add_style_text('greenLine')">
                            <img src="{{ asset('storage/img/editor_green.png') }}" alt="editor_bold">
                        </div>


                    </div>
                </div>
                {{--<div class="article_text" id="article_text"  contenteditable >
                        <!-- <div class="placeholder" id="article_text_placeholder" >Здесь вы можете написать все что угодно</div> -->
                        <!-- <span class="text_def">DEFAULD</span>
                        <br>
                        <span class="text_bold">BOLD TEXT</span>
                        <br>
                        <p class="text_green_line">GREEN LINE</p> -->

                </div>--}}
                 <textarea class="article_text" name="content" id="" cols="30" rows="10" placeholder="Здесь вы можете написать все что угодно"></textarea>
            </div>



            <div class="cover">
                <div class="sub_title">Добавьте обложку</div>
                <div class="input_img" id="input_img">

                    <input type="file" name="cover" id="cover" class="cover_input" multiple>
                    <label for="cover">
                        <img src="{{ asset('storage/img/upload_img.png') }}" alt="upload_img"  id="img_prev_1">
                    </label>
                </div>

            </div>

            <div class="tags">
                <div class="sub_title">Добавьте тэги через запятую</div>
                <input type="text" placeholder="Добавьте теги" name="seo_tags" id="tags_create">
            </div>

            <div class="recoments_tags">
                <div class="sub_title">Рекомендованные тэги</div>
                <div class="wrap_recoments_tags">
                    <div class="item_tags"># Крипторынок</div>
                    <div class="item_tags"># Крипторынок</div>
                    <div class="item_tags"># Крипторынок</div>
                </div>
            </div>

            <div class="btns">
                <div class="settings_wrap" onclick="show_disable_modal('modal_filters')">
                    <img src="{{ asset('storage/img/settings.png') }}" alt="settings">
                </div>

                {{--<div class="btn_publish" onclick="switching_modals('checking')" >Опубликовать</div>--}}
                <div class="btn_publish save_btn" data-request-url="/post/store">Опубликовать</div>
            </div>
        </form>

    </div>
</div>

<!-- ФОРМА ОТПРАВКИ статьи после проверки -->
<div id="modal_create_article_red">
    <div class="wrap">
        <div class="head">
            <div class="title">Написать статью</div>
            <div class="close_modal" onclick="close_modal('modal_create_article')">
                <a href="article_main.html"><img src="{{ asset('storage/img/close_modal.png') }}" alt="close modal"></a>
            </div>

        </div>

        <div class="name">
            <div class="sub_title">
                Название статьи
            </div>
            <textarea name="name_article" id="name_article" cols="30" rows="3" placeholder="Название статьи" wrap="hard"></textarea>
        </div>

        <div class="dis_wrap">
            <div class="sub_title">Краткое описание</div>
            <textarea id= 'dis_text_create' class="dis" name="dis" id="dis" cols="30" rows="10" placeholder="Краткое описание"></textarea>
        </div>

        <div class="article_wrap">
            <div class="sub_title">
                Текст статьи
            </div>
            <div class="text_acrticle" id="text_article_all">

                <div class="standart item_article" id="1">
                    <p contenteditable>Здесь вы можете написать все что угодно</p>
                    <div class="btns">
                        <div class="editor_item" onclick="change_style(1,'standart')">
                            <img src="{{ asset('storage/img/editor_def.png') }}" alt="editor_def">
                        </div>
                        <div class="editor_item" onclick="change_style(1,'bold')">
                            <img src="{{ asset('storage/img/editor_bold.png') }}" alt="editor_bold">
                        </div>
                        <div class="editor_item" onclick="change_style(1,'green_line')">
                            <img src="{{ asset('storage/img/editor_green.png') }}" alt="editor_green">
                        </div>

                    </div>
                </div>

                <div id="btn_add_line" onclick="add_line()">
                    <img src="{{ asset('storage/img/add_icon.png') }}" alt="add_icon">
                </div>

                <!-- <div class="bold">
                    <p contenteditable>ТЕСТ</p>
                    <div class="btns">
                        <div class="editor_item">
                            <img src="{{ asset('storage/img/editor_def.png') }}" alt="editor_def">
                        </div>
                        <div class="editor_item">
                            <img src="{{ asset('storage/img/editor_bold.png') }}" alt="editor_bold">
                        </div>
                        <div class="editor_item">
                            <img src="{{ asset('storage/img/editor_green.png') }}" alt="editor_green">
                        </div>
                    </div>
                </div>

                <div class="green_line">
                    <p contenteditable>ТЕСТ</p>
                    <div class="btns">
                        <div class="editor_item">
                            <img src="{{ asset('storage/img/editor_def.png') }}" alt="editor_def">
                        </div>
                        <div class="editor_item">
                            <img src="{{ asset('storage/img/editor_bold.png') }}" alt="editor_bold">
                        </div>
                        <div class="editor_item">
                            <img src="{{ asset('storage/img/editor_green.png') }}" alt="editor_green">
                        </div>
                    </div>
                </div> -->
            </div>

        </div>


        <div class="cover">
            <div class="sub_title">Добавьте обложку</div>
            <div class="input_img" id="input_img">

                <input type="file" name="cover" id="cover" class="cover_input" multiple>
                <label for="cover">
                    <img src="{{ asset('storage/img/upload_img.png') }}" alt="upload_img"  id="img_prev_1">
                </label>
            </div>

        </div>

        <div class="tags_wrap">
            <div class="sub_title">Добавьте теги через запятую</div>
            <input type="text" id="tags" placeholder="Добавьте теги">
        </div>

        <div class="tags_recomend">
            <div class="sub_title">Рекомендованные теги</div>
            <div class="wrap_tags">
                <div class="item_tag"># Криптовалюта</div>
                <div class="item_tag"># Форекс</div>
            </div>
        </div>

        <div class="filters">
            <div class="item_filter">
                <div id="modal_date">
                    <div class="title">
                        <div class="arrow_back" onclick="close_modal('modal_date')">
                            <img src="{{ asset('storage/img/arrow_back.png') }}" alt="arrow_back">
                        </div>
                        <div class="sub_title">Дата публикации</div>
                    </div>

                    <div class="line" onclick="chose_arrow('modal_date','publish_now')">
                        <p class="text">Сейчас</p>
                        <img src="{{ asset('storage/img/arrow_chose.png') }}" alt="arrow_chose" id="publish_now">
                    </div>

                    <div class="line" onclick="chose_arrow('modal_date','publish_date')">
                        <input type="datetime-local" id="publish_date_input">
                        <img  src="{{ asset('storage/img/arrow_chose.png') }}" alt="arrow_chose" id="publish_date">
                    </div>
                </div>
                <div class="preview_wrap">
                    <div class="sub_title">Дата публикации</div>
                    <div class="btn_wrap" onclick="open_modal('modal_date')">
                        <p id="publish_final_chose">Сейчас</p>
                        <img src="{{ asset('storage/img/arrow_down.png') }}" alt="arrow_down">
                    </div>
                </div>

            </div>

            <div class="item_filter">
                <div id="modal_show">
                    <div class="title">
                        <div class="arrow_back" onclick="close_modal('modal_show')">
                            <img src="{{ asset('storage/img/arrow_back.png') }}" alt="arrow_back">
                        </div>
                        <div class="sub_title">Кто видит статью?</div>
                    </div>

                    <div class="line" onclick="chose_arrow('modal_show','show_all')">
                        <p class="text">Все</p>
                        <img src="{{ asset('storage/img/arrow_chose.png') }}" alt="arrow_chose" id="show_all">
                    </div>

                    <div class="line" onclick="chose_arrow('modal_show','show_subscribe')">
                        <p class="text">Подписчики</p>
                        <img src="{{ asset('storage/img/arrow_chose.png') }}" alt="arrow_chose" id="show_subscribe">
                    </div>

                    <div class="line" onclick="chose_arrow('modal_show','show_something')">
                        <p class="text">Никто</p>
                        <img src="{{ asset('storage/img/arrow_chose.png') }}" alt="arrow_chose" id="show_something">
                    </div>


                </div>
                <div class="preview_wrap">
                    <div class="sub_title">Кто видит статью</div>
                    <div class="btn_wrap" onclick="open_modal('modal_show')">
                        <p id="show_final_chose">Все</p>
                        <img src="{{ asset('storage/img/arrow_down.png') }}" alt="arrow_down">
                    </div>
                </div>

            </div>

            <div class="item_filter">
                <div id="modal_comment">
                    <div class="title">
                        <div class="arrow_back" onclick="close_modal('modal_comment')">
                            <img src="{{ asset('storage/img/arrow_back.png') }}" alt="arrow_back">
                        </div>
                        <div class="sub_title">Кто может комментировать?</div>
                    </div>

                    <div class="line" onclick="chose_arrow('modal_comment','comment_all')">
                        <p class="text">Все</p>
                        <img src="{{ asset('storage/img/arrow_chose.png') }}" alt="arrow_chose" id="comment_all">
                    </div>

                    <div class="line" onclick="chose_arrow('modal_comment','comment_subscribe')">
                        <p class="text">Подписчики</p>
                        <img src="{{ asset('storage/img/arrow_chose.png') }}" alt="arrow_chose" id="comment_subscribe">
                    </div>

                    <div class="line" onclick="chose_arrow('modal_comment','comment_something')">
                        <p class="text">Никто</p>
                        <img src="{{ asset('storage/img/arrow_chose.png') }}" alt="arrow_chose" id="comment_something">
                    </div>


                </div>

                <div class="preview_wrap">
                    <div class="sub_title">Кто может комментировать</div>
                    <div class="btn_wrap" onclick="open_modal('modal_comment')">
                        <p id="comment_final_chose">Все</p>
                        <img src="{{ asset('storage/img/arrow_down.png') }}" alt="arrow_down">
                    </div>
                </div>

            </div>


        </div>

        <div class="btn_publish">
            Опубликровать
        </div>
    </div>
</div>
