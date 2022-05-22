<h1>Top</h1>

これはTOPです。
<a href="{{ url('/sub') }}">sub</a>

@if(session("simple_auth"))
    <p>認証済です。</p>

    <form method="post" action="{{ url('logout') }}">
    @csrf
    <input type="submit" value="ログアウト" />
    </form>

@else

    @include("part.login_form")

@endif