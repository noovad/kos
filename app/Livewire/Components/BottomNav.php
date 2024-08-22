<?php

namespace App\Livewire\Components;

use App\Models\Message;
use Livewire\Component;
use App\Models\GroupAccess;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;

class BottomNav extends Component
{
    public $indicator = false; // Indicator untuk pesan
    public $paymentIndicator = 'success'; // Indicator untuk transaksi

    public function mount()
    {
        $this->checkUnreadMessages();
        $this->checkPaymentStatus();
    }

    public function checkUnreadMessages()
    {
        // Cek Pesan Grup
        $lastGroupMessage = Message::where('is_admin', false)
            ->where('is_group', true)
            ->latest('created_at')
            ->first();

        if ($lastGroupMessage && $groupAccess = GroupAccess::where('user_id', Auth::id())->where('type', 'group')->first()) {
            if (
                $lastGroupMessage->sender_id != Auth::id()
                && $lastGroupMessage->created_at > $groupAccess->last_access
            ) {
                $this->indicator = true;
                return; // Keluar jika indikator sudah true, tidak perlu cek lebih lanjut
            }
        }

        // Cek Pesan Admin
        if (Auth::user()->role === 'admin') {
            $lastAdminMessage = Message::where('is_admin', true)
                ->where('is_group', false)
                ->latest('created_at')
                ->first();

            if ($lastAdminMessage && $adminAccess = GroupAccess::where('user_id', Auth::id())->where('type', 'admin')->first()) {
                if (
                    $lastAdminMessage->sender_id != Auth::id()
                    && $lastAdminMessage->created_at > $adminAccess->last_access
                ) {
                    $this->indicator = true;
                    return; // Keluar jika indikator sudah true, tidak perlu cek lebih lanjut
                }
            }
        }

        // Cek Pesan Pribadi untuk User
        $lastMessage = Message::where('is_admin', false)
            ->where('is_group', false)
            ->where(function ($query) {
                $query->where('sender_id', Auth::id())
                    ->orWhere('receiver_id', Auth::id());
            })
            ->latest('created_at')
            ->first();

        if ($lastMessage && $lastMessage->sender_id != Auth::id() && !$lastMessage->is_read) {
            $this->indicator = true;
        }
    }
    public function checkPaymentStatus()
    {
        $not = Transaction::where('user_id', auth()->id())->where('status', 'tidak dibayar')->count();
        $notYet = Transaction::where('user_id', auth()->id())->where('status', 'belum dibayar')->count();

        $this->paymentIndicator = $not > 0 ? 'danger' : ($notYet > 0 ? 'warning' : 'success');
    }

    public function render()
    {
        return view('livewire.components.bottom-nav', [
            'indicator' => $this->indicator,
            'paymentIndicator' => $this->paymentIndicator,
        ]);
    }
}
