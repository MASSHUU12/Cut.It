@extends("master") @section("title") Short | Home @endsection
@section("content")
<form action="/shorten" method="post">
    @csrf
    <input type="text" name="url" placeholder="Type your URL..." />
    <input type="submit" name="submit" />
</form>
@endsection
