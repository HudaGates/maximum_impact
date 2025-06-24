<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\User; // Import model User

class UserRegisteredForApproval extends Notification
{
    use Queueable;

    protected $newUser;

    // Kita akan menerima data user baru melalui constructor
    public function __construct(User $newUser)
    {
        $this->newUser = $newUser;
    }

    // Tentukan channel pengiriman notifikasi, 'database' untuk ikon lonceng
    public function via(object $notifiable): array
    {
        return ['database']; // Bisa juga ['database', 'mail'] jika ingin kirim email juga
    }

    // Definisikan data yang akan disimpan di database
    public function toDatabase(object $notifiable): array
    {
        return [
            'message' => 'Pengguna baru telah mendaftar: ' . $this->newUser->name,
            'user_id' => $this->newUser->id,
            'user_name' => $this->newUser->name,
            'action_approve_url' => route('admin.users.approve', $this->newUser->id), // Link untuk approve
            'action_reject_url' => route('admin.users.reject', $this->newUser->id),   // Link untuk reject
        ];
    }
}