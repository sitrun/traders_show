let mix = require('laravel-mix');



mix.js('resources/js/app.js', 'js')
    //.js('resources/js/jquery-3.6.4.js','js/jquery-3.6.4.js')
    .js('resources/js/auth.js','js/auth.js')
    .copy('resources/js/forms.js','public/js')
    .sass('resources/sass/app.sass', 'css')
    .less('resources/less/app.less', 'css').options({
        processCssUrls: false
    })
    // .less('resources/less/create_article.less', 'css').options({
    //     processCssUrls: false
    // })
    .less('resources/less/auth_old.less', 'css').options({
        processCssUrls: false
    })
    .postCss('resources/css/app.css', 'css')
    .postCss('resources/css/bot_admin.css', 'css')
    .postCss('resources/css/article.css', 'css')
    .postCss('resources/css/education.css', 'css')
    .postCss('resources/css/article_main.css', 'css')
    .postCss('resources/css/create_article.css', 'css')

    .setPublicPath('public/');

mix.copy('resources/js/jquery-3.6.4.min.js', 'js/jquery-3.6.4.min.js').setPublicPath('public/');