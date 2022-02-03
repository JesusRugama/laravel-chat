<div class="container">
    <ol>
    @foreach($messages as $message)
        <li>
            <div class="message">
                <div class="message__body">
                    {{ $message->message }}
                </div>
                <span class="message__author">{{ $message->username }}</span>
                <date>{{ $message->created_at->format('Y-m-d') }}</date>
            </div>
        </li>
    @endforeach
    </ol>

    <livewire:chat.form />
</div>
