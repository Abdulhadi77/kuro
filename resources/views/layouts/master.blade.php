<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="author" content="TechyDevs">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title> {{$settings->sitename_en}} @yield('title')</title>





    @include('layouts.head')
</head>
<div style="position: absolute;padding: 10px;text-align: center;width: 100%;z-index: 9999;background-color: #fffbdb;
border-color: #fffacc;"
     class="js-cookie-consent cookie-consent">

    <span class="cookie-consent__message">
        Your experience on this site will be improved by allowing cookies.
    </span>

    <button style="background-color: green" class=" btn theme-btn js-cookie-consent-agree cookie-consent__agree">
        Allow cookies
    </button>

</div>

<script>

    window.laravelCookieConsent = (function () {

        const COOKIE_VALUE = 1;
        const COOKIE_DOMAIN = '{{ config('session.domain') ?? request()->getHost() }}';

        function consentWithCookies() {
            setCookie('laravel_cookie_consent', COOKIE_VALUE, 365 * 20);
            hideCookieDialog();
        }

        function cookieExists(name) {
            return (document.cookie.split('; ').indexOf(name + '=' + COOKIE_VALUE) !== -1);
        }

        function hideCookieDialog() {
            const dialogs = document.getElementsByClassName('js-cookie-consent');

            for (let i = 0; i < dialogs.length; ++i) {
                dialogs[i].style.display = 'none';
            }
        }

        function setCookie(name, value, expirationInDays) {
            const date = new Date();
            date.setTime(date.getTime() + (expirationInDays * 24 * 60 * 60 * 1000));
            document.cookie = name + '=' + value
                + ';expires=' + date.toUTCString()
                + ';domain=' + COOKIE_DOMAIN
                + ';path=/{{ config('session.secure') ? ';secure' : null }}'
                + '{{ config('session.same_site') ? ';samesite='.config('session.same_site') : null }}';
        }

        if (cookieExists('laravel_cookie_consent')) {
            hideCookieDialog();
        }

        const buttons = document.getElementsByClassName('js-cookie-consent-agree');

        for (let i = 0; i < buttons.length; ++i) {
            buttons[i].addEventListener('click', consentWithCookies);
        }

        return {
            consentWithCookies: consentWithCookies,
            hideCookieDialog: hideCookieDialog
        };
    })();
</script>

{{--@include('cookieConsent::index')--}}
<body>

<div class="body">

        @include('layouts.main-header')


        <!--=================================
 Main content -->
        <!-- main-content -->


            @yield('content')

            <!--=================================
 wrapper 1111 -->

            <!--=================================
 footer -->

            @include('layouts.footer')

    </div>


    <!--=================================
 footer -->

    @include('layouts.footer-scripts')



</body>

</html>
