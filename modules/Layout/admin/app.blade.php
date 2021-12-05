<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--Recommended Meta Tags -->

<meta name="author" content="Booki">
<meta name="designer" content="Booki">
<meta name="publisher" content="Booki">
<meta name="news_keywords" content="New Version released on 29th of November 2019">

<!--Search Engine Optimization Meta Tags -->

<meta name="description" content="Booki #1 Booking software to manage your hotel"> 
<meta name="robots" content="index,follow">
<meta name="revisit-after" content="7 days">
<meta name="distribution" content="web">
<meta name="robots" content="noodp">

<!--Optional Meta Tags -->

<meta name="distribution" content="web">
<meta name="keywords" content="hotel, booking sofware, tour, tour management, flyght booking">
<meta name="web_author" content="Booki">
<meta name="rating" content="100/100 Google Page insight">
<meta name="rating" content="100/100 Google Schema">
<meta name="subject" content="Corporate">
<meta name="copyright" content="Booki">
<meta name="reply-to" content="email">
<meta name="city" content="London">
<meta name="country" content="United Kingdom">
<meta name="distribution" content="global">
<meta name="classification" content="Booking Management System"> <!-- upto 150 characters-->

    {{-- Facebook share --}}
<meta property="og:url" content="{{$seo_meta['full_url'] ?? ""}}"/>
<meta property="og:type" content="article"/>
<meta property="og:title" content="Booki- All-in-one Booking Management Software"/>
<meta property="og:description" content="Need customer freindly booking management software 
for your hotel and travel agency, Booki is all-in-one for your 
hotel and tour management software."/>
    <meta property="og:image" content="{{asset('uploads/demo/general/logo.svg')}}"/>
    {{-- Twitter share --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Booki- All-in-one Booking Management Software">
    <meta name="twitter:description" content="Need customer freindly booking management software 
for your hotel and travel agency, Booki is all-in-one for your 
hotel and tour management software.">
    <meta name="twitter:image" content="{{asset('uploads/demo/general/logo.svg')}}">

    <!-- location meta tags -->  

 <meta name="geo.placename" content="United Kingdom" />
 <meta name="geo.region" content="GB" />
 <meta name="geo.position" content="55.3780518,-3.4359729" />
 <meta name="Booki" content="55.3780518,-3.4359729" />

    <!-- Schema.org markup for Google+ -->

 <meta itemprop="name" content="Booki">
 <meta itemprop="description" content="Booki is a hotel reservation system and tour management system that works for all types 
of accommodation: hotels, motels, hostels, B&Bs, lodges & guest houses.Your bookings are 
easily accessible anytime and anywhere. No installations or updates needed."/>
 <meta itemprop="image" content="{{asset('uploads/demo/general/logo.svg')}}" />
    
    <!--Meta Tags for HTML pages on Mobile-->

 <meta name="format-detection" content="telephone=yes" />
 <meta name="HandheldFriendly" content="true" />

    <!--http-equiv Tags-->
 <meta http-equiv="Content-Style-Type" content="text/css">
 <meta http-equiv="Content-Script-Type" content="text/javascript">

    <!-- Cache control -->
 <meta http-equiv="cache-control" content="no-cache"/>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $page_title ?? 'Dashboard'}} - {{setting_item('site_title') ?? 'Booki'}}</title>
    <link rel="icon" type="image/png" href="{{url('images/favicon.png')}}" />

    <meta name="robots" content="noindex, nofollow" />
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Styles -->
    <link href="{{ asset('libs/select2/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('libs/flags/css/flag-icon.min.css') }}" rel="stylesheet">

    <link href="{{ asset('dist/admin/css/vendors.css') }}" rel="stylesheet">
    <link href="{{ asset('dist/admin/css/app.css') }}" rel="stylesheet">
    {!! \App\Helpers\Assets::css() !!}
    {!! \App\Helpers\Assets::js() !!}
    <script>
        var bookingCore  = {
            url:'{{url('/')}}',
            map_provider:'{{setting_item('map_provider')}}',
            map_gmap_key:'{{setting_item('map_gmap_key')}}',
            csrf:'{{csrf_token()}}'
        };
        var i18n = {
            warning:"{{__("Warning")}}",
            success:"{{__("Success")}}",
            confirm_delete:"{{__("Do you want to delete?")}}",
            confirm:"{{__("Confirm")}}",
            cancel:"{{__("Cancel")}}",
        };
        var bookingCoreApp ={
            showSuccess:function (configs){
                var args = {};
                if(typeof configs == 'object')
                {
                    args = configs;
                }else{
                    args.message = configs;
                }
                if(!args.title){
                    args.title = i18n.success;
                }
                bootbox.alert(args);
            },
            showError:function (configs) {
                var args = {};
                if(typeof configs == 'object')
                {
                    args = configs;
                }else{
                    args.message = configs;
                }
                if(!args.title){
                    args.title = i18n.warning;
                }
                bootbox.alert(args);
            },
            showAjaxError:function (e) {
                if(typeof e.responseJSON !='undefined' && e.responseJSON.message){
                    return this.showError(e.responseJSON.message);
                }
                if(e.responseText){
                    return this.showError(e.responseText);
                }
            },
            showConfirm:function (configs) {
                var args = {};
                if(typeof configs == 'object')
                {
                    args = configs;
                }
                args.buttons = {
                    confirm: {
                        label: '<i class="fa fa-check"></i> '+i18n.confirm,
                    },
                    cancel: {
                        label: '<i class="fa fa-times"></i> '+i18n.cancel,
                    }
                }
                bootbox.confirm(args);
            }
        };
    </script>
    <script src="{{ asset('libs/tinymce/js/tinymce/tinymce.min.js') }}" ></script>
    @yield('script.head')

</head>
<body class="{{($enable_multi_lang ?? '') ? 'enable_multi_lang' : '' }} @if(setting_item('site_enable_multi_lang')) site_enable_multi_lang @endif">
<div id="app">
    <div class="main-header d-flex">
        @include('Layout::admin.parts.header')
    </div>
    <div class="main-sidebar">
        @include('Layout::admin.parts.sidebar')
    </div>
    <div class="main-content">
        @include('Layout::admin.parts.bc')
        @yield('content')
        <footer class="main-footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 copy-right" >
                        {{date('Y')}} &copy; Booki<a href="//booki.ggtasker.co.uk" target="_blank">Booki</a>
                    </div>
                    <div class="col-md-6">
                        <div class="text-md-right footer-links d-none d-sm-block">
                            <a href="//booki.ggtasker.co.uk" target="_blank">About Us</a>
                            <a href="//booki.ggtasker.co.uk" target="_blank">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <div class="backdrop-sidebar-mobile"></div>
</div>

@include('Media::browser')

<!-- Scripts -->
{!! \App\Helpers\Assets::css(true) !!}

<script src="{{ asset('dist/admin/js/manifest.js?_ver='.config('app.version')) }}" ></script>
<script src="{{ asset('dist/admin/js/vendor.js?_ver='.config('app.version')) }}" ></script>

<script src="{{ asset('dist/admin/js/app.js?_ver='.config('app.version')) }}" ></script>

<script src="{{ asset('libs/select2/js/select2.min.js') }}" ></script>
<script src="{{ asset('libs/bootbox/bootbox.min.js') }}"></script>

{!! \App\Helpers\Assets::js(true) !!}

@yield('script.body')

</body>
</html>
