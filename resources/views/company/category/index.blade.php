<h1>職種（タグカテゴリー）一覧</h1>
<h3><a href="{{ route('company.category.create') }}">新規追加</a></h3>
<table style="text-align: center">
    <thead>
        <th>ID</th>
        <th>職種</th>
    </thead>
    <tbody>
        @foreach ($categories as $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->name }}</td>
            <td>
                <form action="{{ route('company.category.delete', ['id'=>$category->id]) }}" method="POST" style="margin-bottom: 0">
                    @csrf
                    <button>削除</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<a href="{{ route('company.job') }}" style="margin-top: 40px; display: block"><< 求人一覧に戻る</a>
