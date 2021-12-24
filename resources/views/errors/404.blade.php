@extends("master") @section("title") {{ __("Oh no!") }} @endsection
@section("content")
<div class="err-container">
    <div class="err-left">
        <h1>{{ __("This page has been abducted!") }}</h1>
        <p>{{ __("Let's head back home and try that again.") }}</p>
        <p>{{ __("The truth is out there...") }}</p>
        <button><a href="/">Home</a></button>
    </div>
    <div class="err-right">
        <span
            class="iconify"
            data-icon="mdi:ufo-outline"
            data-width="256"
        ></span>
        <h2>404</h2>
    </div>
</div>
@endsection
