<p>ようこそ、{{ auth('companyUser')->user()->name }}さん</p>
<h1>求人一覧</h1>
<h3><a href="{{ route('company.job.create') }}">新規追加</a></h3>
<h3><a href="{{ route('company.category') }}">職種（タグカテゴリー）一覧</a></h3>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>職種</th>
            <th>タイトル</th>
            <th>カテゴリー</th>
            <th>登録日</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($jobs as $job)
        <tr>
            <td>{{ $job->id }}</td>
            <td>{{ $job->job }}</td>
            <td>
                <a href="{{ route('company.job.detail', ['id'=>$job->id]) }}">
                    {{ $job->title }}
                </a>
            </td>
            <td>
            @foreach ($job->categories as $category)
            {{ $category->name }}<br>
            @endforeach
            </td>
            <td>{{ $job->created_at }}</td>
            <td>
                <form action="{{ route('company.job.delete', ['id'=>$job->id]) }}" method="POST" style="margin: 0">
                    @csrf
                    <button>削除</button>
                </form>
            </td>
            <td>
                <button type="button" onclick="location.href='{{ route('company.job.edit', ['id'=>$job->id]) }}' ">編集</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<a href="{{ route('company.index') }}" style="margin-top: 40px; display: block"><< トップ画面に戻る（会社側）</a>
