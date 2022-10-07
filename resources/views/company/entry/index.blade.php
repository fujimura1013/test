<h1>応募一覧</h1>
<table>
    <thead>
        <tr>
            <th>名前</th>
            <th>求人</th>
            <th>メールアドレス</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($entries as $entry)
        <tr>
            <td>
                <a href="{{ route('company.entry.message', ['id'=>$entry->user_id]) }}">{{ $entry->name }}</a>
            </td>
            <td>{{ App\Models\Job::find($entry->job_id)->title }}</td>
            <td>{{ $entry->email }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
