<h2>会社名【{{ $company }}】</h2>
<h2>募集職種【{{ $job->title }}】</h2>
<form action="{{ route('user.store', ['id'=>$job->id]) }}" method="POST">
    @csrf
    <label>
        名前：<br>
        <input type="text" value="{{ auth('web')->user()->name }}" name="name" required>
    </label>
    <br>
    <br>
    <label>
        メールアドレス：<br>
        <input type="email" value="{{ auth('web')->user()->email }}" name="email" required>
    </label>
    <br>
    <br>
    <label>
        いきごみ：<br>
        <input type="text" name="ikigomi" required>
    </label>
    <br>
    <br>
    <button type="submit">応募する</button>
</form>
