@extends("master") @section("title") Home @endsection @section("content")
<div class="home-container">
    <div class="home-desc">
        <h1>Cut.It</h1>
        <p>Most link shorteners do too much.</p>
        <p>This one just makes your links shorter.</p>
    </div>
    <div class="home-form">
        <form action="/shorten" method="post">
            @csrf
            <input
                type="text"
                name="url"
                placeholder="Type your link here..."
                maxlength="255"
                required
            />
            <input type="submit" name="submit" value="Cut.It" />
        </form>
    </div>

    @if (session("status") == "Shortened successfully")
    <div class="home-result">
        <p id="shortened-link">{{ session("url") }}</p>
        <span
            class="iconify"
            data-icon="ant-design:copy-filled"
            id="copy-link"
        ></span>
    </div>
    @elseif (session("status") == "Invalid URL")
    <div class="home-result">
        <p>{{ session("status") }}</p>
    </div>
    @endif

    <div class="home-info">
        <h1>How does it work?</h1>
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam non
            fuga quae, doloremque sit laudantium repudiandae laboriosam sint
            natus omnis, dolores molestiae libero! Error ut, possimus
            consequuntur sunt qui libero?
        </p>
    </div>
</div>
@endsection @section("scripts")
<script src="{{ asset('js/copyShortenedLink.js') }}"></script>
@endsection
