<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Ext Meta --}}
    <title>@yield('page_title')</title>
    @yield('meta')
    <meta name="robots" content="noindex,nofollow">

    <!-- Web Font / @font-face : BEGIN -->
    <!-- NOTE: If web fonts are not required, lines 9 - 26 can be safely removed. -->

    <!-- Desktop Outlook chokes on web font references and defaults to Times New Roman, so we force a safe fallback font. -->
    <!--[if mso]>
    <style>
        * {
            font-family: 'Montserrat', sans-serif;
        }
    </style>
    <![endif]-->

    <!-- All other clients get the webfont reference; some will render the font and others will silently fail to the fallbacks. More on that here: http://stylecampaign.com/blog/2015/02/webfont-support-in-email/ -->
    <!--[if !mso]><!-->
    <!-- insert web font reference, eg: <link href='https://fonts.googleapis.com/css2?family=Montserrat&display=swap' rel='stylesheet' type='text/css'> -->
    <!--<![endif]-->


    {{-- Ext styles --}}
    @yield('ext_styles')
</head>
<body>
<div id="mail-app">
    <div class="header">
        <div class="header__title">{{ env('APP_NAME') }}</div>
    </div>
