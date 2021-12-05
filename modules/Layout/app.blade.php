<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="{{$html_class ?? ''}}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @php
        $favicon = setting_item('site_favicon');
    @endphp
    @if($favicon)
        @php
            $file = (new \Modules\Media\Models\MediaFile())->findById($favicon);
        @endphp
        @if(!empty($file))
            <link rel="icon" type="{{$file['file_type']}}" href="{{asset('uploads/'.$file['file_path'])}}" />
        @else:
            <link rel="icon" type="image/png" href="{{url('images/favicon.png')}}" />
        @endif
    @endif

    @include('Layout::parts.seo-meta')

<link rel="canonical"  href="{{$seo_meta['full_url'] ?? ""}}" />
       <link rel="icon" sizes="16x16" type="image/png" href="{{asset('uploads/demo/general/favicon.png')}}" />
              <link rel="shortcut icon" type="image/png" href="{{url('uploads/demo/general/favicon.png')}}" />

<link rel="icon" sizes="57x57" type="image/png" href="{{url('uploads/demo/general/touch.png')}}" />
              <link rel="shortcut icon" type="image/png" href="{{url('uploads/demo/general/touch.png')}}" />

 

  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
   <link href='//fonts.googleapis.com/css?family=Raleway:400,600,800' rel='stylesheet' type='text/css'>


   
    <link href="{{ asset('libs/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('libs/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('libs/icofont/icofont.min.css') }}" rel="stylesheet">
    <link href="{{ asset('libs/select2/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset("libs/daterange/daterangepicker.css") }}" >
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel='stylesheet' id='google-font-css-css'  href='https://fonts.googleapis.com/css?family=Poppins%3A300%2C400%2C500%2C600' type='text/css' media='all' />
    {!! \App\Helpers\Assets::css() !!}
    {!! \App\Helpers\Assets::js() !!}
    <script>
        var bookingCore = {
            url:'{{url( app_get_locale() )}}',
            url_root:'{{ url('') }}',
            booking_decimals:{{(int)setting_item('currency_no_decimal',2)}},
            thousand_separator:'{{setting_item('currency_thousand')}}',
            decimal_separator:'{{setting_item('currency_decimal')}}',
            currency_position:'{{setting_item('currency_format')}}',
            currency_symbol:'{{currency_symbol()}}',
            date_format:'{{get_moment_date_format()}}',
            map_provider:'{{setting_item('map_provider')}}',
            map_gmap_key:'{{setting_item('map_gmap_key')}}',
            routes:{
                login:'{{route('auth.login')}}',
                register:'{{route('auth.register')}}',
            },
            currentUser:{{(int)Auth::id()}}
        };
        var i18n = {
            warning:"{{__("Warning")}}",
            success:"{{__("Success")}}",
        };
    </script>
 <script src="//ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="//www.googletagmanager.com/gtag/js?id=UA-153422580-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-153422580-3');
</script>


<script src="//www.google.com/recaptcha/api.js?render=6Lca1cUUAAAAAA27MXOGn_CLwwLI4VapsSQZcKaa
"></script>
<script>
grecaptcha.ready(function() {
    grecaptcha.execute('6Lca1cUUAAAAAA27MXOGn_CLwwLI4VapsSQZcKaa', {action: '/'}).then(function(token) {
   
    });
});
</script>




<!-- Start of HubSpot Embed Code -->
<script type="text/javascript" id="hs-script-loader" async defer src="//js.hs-scripts.com/6778134.js"></script>
<!-- End of HubSpot Embed Code -->
    <!-- Styles -->
    @yield('head')

    @include('Layout::parts.custom-css')
    <link href="{{ asset('libs/carousel-2/owl.carousel.css') }}" rel="stylesheet">
</head>
<body class="frontend-page {{$body_class ?? ''}}">
    {!! setting_item('body_scripts') !!}
    {!! setting_item_with_lang('body_scripts') !!}
    <div class="bravo_wrap">

        @include('Layout::parts.topbar')
        @include('Layout::parts.header')
        @yield('content')
        @include('Layout::parts.footer')

    </div>
    {!! setting_item('footer_scripts') !!}
    {!! setting_item_with_lang('footer_scripts') !!}
</body>
</html>
