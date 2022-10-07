<h1>職種（タグカテゴリー）新規作成</h1>
<form action="{{ route('company.category.store') }}" method="POST">
    @csrf
    <div>
        職種：
        <input type="text" name="name" required>
    </div>
    <button style="margin-top: 40px">新規作成</button>
</form>
<a href="{{ route('company.category') }}" style="margin-top: 40px; display: block"><< 職種（タグカテゴリー）一覧に戻る</a>
