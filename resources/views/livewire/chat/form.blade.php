<form wire:submit.prevent="submit">
    <div>
        <label>
            Username
            <input type="text" wire:model="username" />
        </label>
    </div>

    <div>
        <label>
            Message
            <textarea wire:model="message"></textarea>
        </label>
    </div>

    <input type="submit" value="Send" />
</form>