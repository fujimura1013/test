<h1>企業一覧</h1>
<h3><a href="{{ route('admin.company.create') }}">新規追加</a></h3>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>企業名</th>
            <th>メールアドレス</th>
            <th>登録日</th>
        </tr>
    </thead>
    <tbody>
        {{-- {{ dd($companies) }} --}}
        @foreach ($companies as $company)
        <tr>
            {{-- {{ dd($company) }} --}}
            <td>{{ $company->id }}</td>
            <td>
                <a href="{{ route('admin.company.detail', ['id'=>$company->id]) }}">{{ $company->name }}</a>
            </td>
            <td>{{ $company->email }}</td>
            <td>{{ $company->password }}</td>
            <td>{{ $company->created_at }}</td>
            <td>
                <form action="{{ route('admin.company.delete', ['id'=>$company->id]) }}" method="POST" style="margin: 0">
                    @csrf
                    <button>削除</button>
                </form>
            </td>
            <td>
                <button type="button" onclick="location.href='{{ route('admin.company.edit', ['id'=>$company->id]) }}' ">編集</button>
            </td>
            <td><button type="button" onclick="location.href='{{ route('companyUser.index') }}' ">ログイン</button></td>
        </tr>
        @endforeach
    </tbody>
</table>
<a href="{{ route('admin.index') }}" style="margin-top: 40px; display: block"><< トップページ（管理画面）に戻る</a>
