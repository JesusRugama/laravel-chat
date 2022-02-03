<?php

namespace App\Http\Livewire\Chat;

use App\Events\MessageCreated;
use App\Models\Message;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Messages extends Component
{
    const MESSAGES_LIMIT = 10;

    /**
     * Chatroom messages.
     *
     * @var Message[]|null
     */
    public array $messages = [];

    /**
     * Register event listeners.
     *
     * @var array
     */
    protected $listeners = [
        'messageCreated' => 'loadMessages',
        'echo:chatroom,MessageCreated' => 'loadMessages',
    ];

    public function render(): View
    {
        $this->loadMessages();

        return view('livewire.chat.messages');
    }

    /**
     * Loads the last messages.
     *
     * @return void
     */
    public function loadMessages(): void
    {
        /** @var Collection */
        $messages = Message::query()
            ->orderByDesc('created_at')
            ->limit(self::MESSAGES_LIMIT)
            ->get();

        $this->messages = $messages->sortBy('created_at')
            ->values()
            ->all();
    }
}
