const mix = require('laravel-mix');


mix.setPublicPath('public/dist/admin');
mix.setResourceRoot('../');

mix.sass('resources/admin/scss/vendors.scss', 'css')
    .sass('resources/admin/scss/app.scss', 'css');

mix.js('resources/admin/js/app.js','js').extract([])

;
