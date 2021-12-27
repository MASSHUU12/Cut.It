@extends("master") @section("content")
<div class="home-container">
    <div class="home-desc">
        <h1>Cut.It</h1>
        <p>{{ __("Most link shorteners do too much.") }}</p>
        <p>{{ __("This one just makes your links shorter.") }}</p>
    </div>
    <div class="home-form">
        <form action="/shorten" method="post">
            @csrf
            <input
                type="url"
                name="url"
                placeholder="{{ __('Type your link here') }}..."
                maxlength="255"
                required
            />
            <input type="submit" name="submit" value="Cut.It" />
        </form>
    </div>

    @if (session("status") == "Shortened successfully")
    <div class="home-result">
        <div class="home-result-main">
            <p id="shortened-link">{{ session("url") }}</p>
            <span
                class="iconify"
                data-icon="ant-design:copy-filled"
                id="copy-link"
            ></span>
        </div>
        <p id="qr-show">Show QR code</p>
        <img id="qr-qr" src="{{ session('qr') }}" alt="Your QR code" />
    </div>
    @elseif (session("status") == "Invalid URL")
    <div class="home-result">
        <p>{{ session("status") }}</p>
    </div>
    @endif

    <div class="home-info">
        <h1>{{ __("How does it work?") }}</h1>
        <p>
            {{
                __(
                    "For a link to be shortened, you must provide it in the correct form. The site accepts links like: https://example.com, http://example.com or ftp://example.com."
                )
            }}
        </p>
        <p>
            {{
                __(
                    "When you click the Cut.It button, your link is saved in the database, and shortened. The shortened link will be deleted from our database if it is not used at least once during 30 days. The counter resets after each use of the link."
                )
            }}
        </p>
        <p>
            {{
                __(
                    "Thanks to this solution our database will not be clogged with unused
            links."
                )
            }}
        </p>
    </div>
</div>
@endsection @section("scripts")
<script src="{{ asset('js/copyShortenedLink.js') }}"></script>
<script src="{{ asset('js/manageQRCodes.js') }}"></script>
@endsection
