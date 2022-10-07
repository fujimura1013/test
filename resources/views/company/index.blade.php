<p>ようこそ、{{ Auth::user()->name }}さん</p>
<h1>
    <a href="{{ route('company.job') }}">求人管理</a>
</h1>
<h1>
    <a href="{{ route('company.entry') }}">応募管理</a>
</h1>
<a href="{{ route('index') }}" style="margin-top: 40px; display: block"><< トップページに戻る</a>
