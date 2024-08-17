<?php

namespace App\Livewire\Admin;

use App\Models\Message;
use Livewire\Component;
use App\Jobs\SendMessage;
use Illuminate\Support\Facades\DB;

class ChatMenu extends Component
{
    public $title = 'Chat';
    public $display = 'group';

    public function messages()
    {
        $messages = Message::with('user')->get()->append('time');
    }

    public function message()
    {
        $message = Message::create([
            'user_id' => 12,
            'type' => 'admin',
            'text' => "abc",
        ]);
        SendMessage::dispatch($message);
    }

    public function messageIndex()
    {
        $userId = auth()->id();

        $chats = Message::select('id', 'sender_id', 'receiver_id', 'message', 'created_at')
        ->where(function ($query) use ($userId) {
            $query->where('receiver_id', $userId)
                  ->orWhere('sender_id', $userId);
        })
        ->where('is_group_chat', false)
        ->whereIn('id', function ($query) use ($userId) {
            $query->select(DB::raw('MAX(id)'))
                ->from('messages')
                ->where(function ($query) use ($userId) {
                    $query->where('receiver_id', $userId)
                          ->orWhere('sender_id', $userId);
                })
                ->groupBy(DB::raw('CASE WHEN sender_id = ' . $userId . ' THEN receiver_id ELSE sender_id END'));
        })
        ->latest('created_at')
        ->with(['receiver', 'sender']) // Ensure relationships are eager-loaded
        ->get();

        return $chats;
    }

    public function render()
    {
        $chat = $this->messageIndex();
        return view('livewire.admin.chat-menu', ['chat' => $chat]);
    }
}
