<h1>求人編集</h1>
<form action="{{ route('company.job.update', ['id'=>$job->id]) }}" method="POST">
    @csrf
    <div>
        <p>職種：</p>
        <label>
            <input type="radio" name="job" value="営業" {{ old ('job', $job->job) == '営業' ? 'checked' : '' }}>
            営業
        </label>
        <label>
            <input type="radio" name="job" value="エンジニア" {{ old ('job', $job->job) == 'エンジニア' ? 'checked' : '' }}>
            エンジニア
        </label>
        <label>
            <input type="radio" name="job" value="新卒" {{ old ('job', $job->job) == '新卒' ? 'checked' : '' }}>
            新卒
        </label>
    </div>
    <div>
        <p>タイトル：</p>
        <input type="text" name="title" required value="{{ old('title', $job->title) }}">
    </div>
    <br>
    <div>
        <p>詳細：</p>
        <textarea name="detail" required>{{ old('detail', $job->detail) }}</textarea>
    </div>
    <br>
    <div>
        <p>カテゴリー:</p>
        @foreach ($categories as $key => $value)
            <input type="checkbox" name="category_ids[]" value="{{ $value->id }}" id="tag_{{$value->id}}" @foreach ($job->categories as $cotegory) {{ old ('category_ids[]', $cotegory->id) == $value->id ? 'checked' : '' }} @endforeach>
            <label for="category_{{ $value->id }}">{{ $value->name }}</label>
        @endforeach
    </div>
    <div>
        <button style="margin-top: 50px">新規追加</button>
    </div>
</form>
<a href="{{ route('company.job') }}" style="margin-top: 40px; display: block"><< 求人一覧に戻る</a>
