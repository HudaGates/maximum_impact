<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Investment; // Import model Investment

class NewInvestmentReceived extends Notification
{
    use Queueable;

    protected $investment;

    public function __construct(Investment $investment)
    {
        $this->investment = $investment;
    }

    public function via(object $notifiable): array
    {
        return ['database']; // Kirim notifikasi ke database (untuk ikon lonceng)
    }

    public function toDatabase(object $notifiable): array
    {
        // Data ini yang akan disimpan di database dan ditampilkan di notifikasi
        return [
            'investment_id'   => $this->investment->id,

            // =============================================================
            // PERUBAHAN DI BARIS INI
            // =============================================================
            // Mengambil nama lengkap investor menggunakan accessor yang baru dibuat
            'investor_name'   => $this->investment->user->full_name,
            // =============================================================
            
            'amount'          => $this->investment->amount,
        ];
    }
}