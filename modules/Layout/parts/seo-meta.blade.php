@if(!empty($seo_meta))
    @if(isset($seo_meta['seo_index']) and $seo_meta['seo_index'] == 0)
        <meta name="robots" content="noindex">
    @endif
    @php
        $page_title = $seo_meta['seo_title'] ?? $seo_meta['service_title'] ?? $page_title ?? "";
        if(!empty($page_title) and empty($seo_meta['is_homepage'])){
            $page_title .= " - ".setting_item_with_lang('site_title' ,false,'Booking Core');
        }
        if(empty($page_title)){
            $page_title = setting_item_with_lang('site_title' ,false,'Booking Core');
        }
    @endphp
    <title>{{ $page_title }}</title>
 
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

@else
    @php
        if(!empty($page_title)){
            $page_title .= " - ".setting_item_with_lang('site_title' ,false,'Booki');
        }else{
            $page_title = setting_item_with_lang('site_title' ,false,'Booki');
        }
    @endphp
    <title>{{ $page_title }}</title>
    
@endif
