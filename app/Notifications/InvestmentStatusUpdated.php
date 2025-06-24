<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Investment; // Import model Investment

class InvestmentStatusUpdated extends Notification
{
    use Queueable;

    protected $investment;

    public function __construct(Investment $investment)
    {
        $this->investment = $investment;
    }

    public function via(object $notifiable): array
    {
        return ['database']; // Kirim ke database untuk ikon lonceng
    }

    public function toDatabase(object $notifiable): array
    {
        $status = $this->investment->status;
        $message = '';

        // Buat pesan yang berbeda berdasarkan status
        if ($status === 'Approved') {
            $message = 'Selamat! Investasi Anda pada proyek "' . $this->investment->project . '" telah disetujui.';
        } elseif ($status === 'Rejected') {
            $message = 'Mohon maaf, investasi Anda pada proyek "' . $this->investment->project . '" telah ditolak.';
        }

        return [
            'message'       => $message,
            'status'        => $status,
            // Kita juga sertakan link agar user bisa langsung melihat statusnya
            'action_url'    => route('investment.show_status', $this->investment->id),
        ];
    }
}