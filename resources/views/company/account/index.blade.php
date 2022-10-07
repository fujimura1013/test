<h1>アカウント一覧</h1>
<table>
    <thead>
        <tr>
            <th>メールアドレス</th>
            <th>パスワード</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ auth('companyUser')->user()->email }}</td>
            <td>{{ auth('companyUser')->user()->password }}</td>
        </tr>
        @foreach ($staffList as $staff)
            <tr>
                <td>{{ $staff->email }}</td>
                <td>{{ $staff->password }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
<h1>新規作成</h1>
<form action="{{ route('company.account.store') }}" method="POST">
    @csrf
    <label>
        <p>email：</p>
        <input type="email" name="email">
    </label>
    <label>
        <p>password：</p>
        <input type="password" name="password">
    </label>
    <br>
    <br>
    <button type="submit">新規作成</button>
</form>
<br>
    <br>
<a href="{{ route('company.index') }}">戻る</a>
