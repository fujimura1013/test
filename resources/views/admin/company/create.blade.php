<h1>企業新規追加</h1>
<form action="{{ route('admin.company.store') }}" method="POST">
    @csrf
    <div>
        <p>企業名：</p>
        <input type="text" name="name" required>
    </div>
    <br>
    <div>
        <p>メールアドレス：</p>
        <input type="email" name="email" required>
    </div>
    <br>
    <div>
        <p>パスワード</p>
        <input type="password" name="password">
    </div>
    <div>
        <button style="margin-top: 50px">新規追加</button>
    </div>
</form>
<a href="{{ route('admin.company') }}" style="margin-top: 40px; display: block"><< 企業一覧に戻る</a>
