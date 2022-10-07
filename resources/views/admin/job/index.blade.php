<h1>求人一覧</h1>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>職種</th>
            <th>タイトル</th>
            <th>カテゴリー</th>
            <th>会社名</th>
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
            <td>{{ App\Models\CompanyUser::find($job->company_id)->name }}</td>
            <td>{{ $job->created_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<a href="{{ route('admin.index') }}" style="margin-top: 40px; display: block"><< トップページ（管理画面）に戻る</a>
