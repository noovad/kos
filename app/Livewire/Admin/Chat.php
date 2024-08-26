<?php

namespace App\Livewire\Admin;

use App\Models\User;
use App\Models\Message;
use Livewire\Component;
use App\Events\GotMessage;
use App\Models\GroupAccess;
use Livewire\Attributes\On;
use App\Events\IndicatorEvent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class Chat extends Component
{
    public $message;
    public $receiver;

    public function mount(string $name): void
    {
        $this->receiver = $name;

        if (!in_array($name, ['admin', 'group'])) {
            $user = User::where('name', $name)->first();
            if ($user) {
                $this->receiver = $user->id;
                Message::where('is_admin', false)
                    ->where('is_group', false)
                    ->where('sender_id', $this->receiver)
                    ->latest('created_at')
                    ->first()?->update(['is_read' => true]);
            }
        } else {
            GroupAccess::updateOrCreate([
                'type' => $name,
                'user_id' => Auth::id(),
            ], [
                'last_access' => now(),
            ]);
        }
    }

    protected function getMessagesQuery()
    {
        return Message::query()
            ->when($this->receiver == 'group', fn($query) => $query->where('is_group', true))
            ->when($this->receiver == 'admin', fn($query) => $query->where('is_admin', true))
            ->when(
                !in_array($this->receiver, ['group', 'admin']),
                fn($query) =>
                $query->where('is_admin', false)
                    ->where('is_group', false)
                    ->where(fn($query) => $query->where('sender_id', $this->receiver)
                        ->orWhere('receiver_id', $this->receiver))
            )
            ->oldest('created_at');
    }

    public function messages()
    {
        return $this->getMessagesQuery()->get()->groupBy(fn($message) => $message->created_at->format('Y-m-d'));
    }

    public function sendMessage()
    {
        if (empty($this->message)) {
            return;
        }

        IndicatorEvent::dispatch('Perbarui Indicator');
        GotMessage::dispatch($this->message);

        try {
            Message::create([
                'sender_id' => Auth::id(),
                'receiver_id' => !in_array($this->receiver, ['admin', 'group']) ? $this->receiver : null,
                'message' => $this->message,
                'is_group' => $this->receiver == 'group',
                'is_admin' => $this->receiver == 'admin',
            ]);
        } catch (\Exception $e) {
            throw ValidationException::withMessages(['message' => 'Pesan gagal dikirim.']);
        }

        $this->message = '';
    }

    #[On('echo:chatroom,GotMessage')]
    public function render()
    {
        return view('livewire.admin.chat', ['chat' => $this->messages(), 'user' => $this->receiver]);
    }
}
