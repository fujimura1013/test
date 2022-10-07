<form action="{{ route('company.entry.message.store', ['id'=>$id]) }}" method="POST">
    @csrf
    <textarea rows="5" style="width: 50%" name="message" required></textarea>
    <br>
    <br>
    <button type="submit">メッセージ送信</button>
</form>
<br>
<br>
    @foreach ($messageList as $message)
        {{ $message->name }}：{{ $message->message }}<br>
    @endforeach
<br>
<br>
<a href="{{ route('company.entry') }}">戻る</a>
