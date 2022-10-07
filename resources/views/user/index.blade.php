<p>ようこそ、{{ Auth::user()->name }}さん</p>
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
            <td>
                <a href="{{ route('user.message', ['id'=>$job->company_id]) }}">{{ App\Models\CompanyUser::find($job->company_id)->name }}</a>
            </td>
            <td>{{ $job->created_at }}</td>
            <td>
                <button type="button" onclick="location.href='{{ route('user.form', ['id'=>$job->id]) }}'">応募する</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<a href="/" style="margin-top: 40px; display: block"><< トップページに戻る</a>
