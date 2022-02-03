<?php

namespace App\Http\Livewire\Chat;

use App\Models\Message;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Form extends Component
{
    public string $username = '';

    public string $message = '';

    public function render(): View
    {
        return view('livewire.chat.form');
    }

    public function cleanUp(): void
    {
        $this->username = '';

        $this->message = '';
    }

    public function submit(): void
    {
        $message = Message::create([
            'username' => $this->username,
            'message' => $this->message,
        ]);

        $this->cleanUp();

        $this->emit('messageCreated', $message);
    }
}
