<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PengajuanStatusNotification extends Notification
{
    use Queueable;

    protected $pengajuan;
    protected $status;

    protected $tipe;

    /**
     * Create a new notification instance.
     */
    public function __construct($pengajuan, $status, $tipe)
    {
        $this->pengajuan = $pengajuan;
        $this->status = $status;
        $this->tipe = $tipe;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray($notifiable)
    {
        if ($this->tipe === 'manajer') {
            return [
                'pengajuan_id' => $this->pengajuan->id,
                'tipe' => 'manajer',
                'pesan' => "Pengajuan baru dari " . $this->pengajuan->user->name,
                'detail' => [
                    'nama_pegawai' => $this->pengajuan->user->name,
                    'tanggal_pengajuan' => $this->pengajuan->created_at->format('d/m/Y H:i'),
                    'jenis_pengajuan' => $this->pengajuan->jenis,
                    // tambahkan detail lain yang diperlukan
                ],
                'tanggal' => now()->format('Y-m-d H:i:s')
            ];
        } else {
            return [
                'pengajuan_id' => $this->pengajuan->id,
                'tipe' => 'pegawai',
                'status' => $this->status,
                'pesan' => $this->getPesanPegawai(),
                'detail' => [
                    'catatan' => $this->pengajuan->catatan ?? '-',
                    'tanggal_update' => now()->format('d/m/Y H:i'),
                ],
                'tanggal' => now()->format('Y-m-d H:i:s')
            ];
        }
    }

    private function getPesanPegawai()
    {
        switch ($this->status) {
            case 'disetujui':
                return "Pengajuan Anda telah disetujui oleh manajer";
            case 'ditolak':
                return "Pengajuan Anda ditolak oleh manajer";
            default:
                return "Status pengajuan Anda: {$this->status}";
        }
    }
}
