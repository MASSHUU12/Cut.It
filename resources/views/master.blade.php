<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta
            name="description"
            content="Most link shorteners do too much. This one just makes your links shorter."
        />
        <meta
            name="og:title"
            property="og:title"
            content="Cut.It your link shortener"
        />
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
        <title>Cut.It | @yield("title")</title>
    </head>
    <body>
        <header>
            <a href="/">Cut.It</a>
        </header>
        @yield("content")

        <footer>
            <div class="footer-left">
                <h1>{{ __("Useful links") }}</h1>
                <a href="/">Home</a>
                <a href="/privacy" rel="nofollow">{{ __("Privacy Policy") }}</a>
                <a href="/cookie" rel="nofollow">{{ __("Cookie Policy") }}</a>
            </div>
            <div class="footer-right">
                <h1>{{ __("Love what I do?") }}</h1>
                <p>
                    {{ __("Consider buying me a") }}
                    <a
                        href="https://www.paypal.com/donate/?hosted_button_id=KWJ7PR5MACDJ8"
                        target="_blank"
                    >
                        {{ __("coffee") }}
                    </a>
                    .
                    <span
                        class="iconify"
                        data-icon="ant-design:coffee-outlined"
                    ></span>
                </p>
                <div class="footer-lang">
                    <a href="/language/pl" rel="nofollow">
                        <span
                            class="iconify"
                            data-icon="twemoji:flag-for-flag-poland"
                            data-width="38"
                        ></span>
                    </a>
                    <a href="/language/en" rel="nofollow">
                        <span
                            class="iconify"
                            data-icon="twemoji:flag-for-flag-united-states"
                            data-width="38"
                        ></span>
                    </a>
                </div>
            </div>
        </footer>

        <div class="c-consent" id="c-window">
            <div class="c-icon">
                <span
                    class="iconify"
                    data-icon="ci:cookie"
                    data-width="128"
                ></span>
            </div>
            <div class="c-content">
                <h1>Cookies!</h1>
                <p>Learn more <a href="/cookie" rel="nofollow">here</a>.</p>
            </div>
            <div class="c-btn" id="c-btn">OK</div>
        </div>

        <script
            src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
            crossorigin="anonymous"
        ></script>
        <script src="https://code.iconify.design/2/2.1.0/iconify.min.js"></script>

        <script src="{{ asset('js/langDetection.js') }}"></script>
        <script src="{{ asset('js/cConsent.js') }}"></script>
        @yield("scripts")
    </body>
</html>
