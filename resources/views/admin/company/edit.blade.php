<h1>企業編集</h1>
<form action="{{ route('admin.company.update', ['id'=>$company->id]) }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <p>企業名：</p>
        <input type="text" name="name" value="{{ old('name', $company->name) }}">
    </div>
    <br>
    <div>
        <p>メールアドレス：</p>
        <input type="email" name="email" value="{{ old('mail', $company->email) }}">
    </div>
    <br>
    <div>
        <p>パスワード</p>
        <input type="password" name="password" value="{{ old('password', $company->password) }}">
    </div>
    {{-- <div>
        <p>詳細：</p>
        <textarea name="detail" value="{{ old('detail', $company->detail) }}">{{ old('detail', $company->detail) }}</textarea>
    </div> --}}
    <div>
        <button style="margin-top:50px">更新</button>
    </div>
</form>
<a href="{{ route('admin.company') }}" style="margin-top: 40px; display: block"><< 企業一覧に戻る</a>
