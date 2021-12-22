<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
                <a href="/privacy">{{ __("Privacy Policy") }}</a>
                <a href="/cookie">{{ __("Cookie Policy") }}</a>
            </div>
            <div class="footer-right">
                <h1>{{ __("Love what I do?") }}</h1>
                <p>
                    {{ __("Please, consider buying me a") }}
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
                    <a href="/language/pl">
                        <span
                            class="iconify"
                            data-icon="twemoji:flag-for-flag-poland"
                            data-width="38"
                        ></span>
                    </a>
                    <a href="/language/en">
                        <span
                            class="iconify"
                            data-icon="twemoji:flag-for-flag-united-states"
                            data-width="38"
                        ></span>
                    </a>
                </div>
            </div>
        </footer>

        <script
            src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
            crossorigin="anonymous"
        ></script>
        <script src="https://code.iconify.design/2/2.1.0/iconify.min.js"></script>

        <script src="{{ asset('js/langDetection.js') }}"></script>
        @yield("scripts")
    </body>
</html>