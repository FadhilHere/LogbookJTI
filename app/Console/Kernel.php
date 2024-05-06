<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            $peminjamanDijadwalkan = DB::table('history_peminjaman')
                ->where('status', 'Dijadwalkan')
                ->orWhere('status', 'On Progress')
                ->get();
            foreach ($peminjamanDijadwalkan as $peminjaman) {
                $now = Carbon::now();
                $tanggalMulai = Carbon::parse($peminjaman->tanggalMulai);
                $tanggalSelesai = Carbon::parse($peminjaman->tanggalSelesai);
                $jamMulai = Carbon::parse($peminjaman->jamMulai);
                $jamSelesai = Carbon::parse($peminjaman->jamSelesai);
                if (
                    $now->gt(Carbon::parse($tanggalMulai)) &&
                    $now->between(Carbon::parse($jamMulai), Carbon::parse($jamSelesai))
                ) {
                    // Ubah status menjadi 'On Progress'
                    DB::table('history_peminjaman')
                        ->where('id_peminjaman', $peminjaman->id_peminjaman)
                        ->update(['status' => 'On Progress']);
                } elseif ($now->gt($tanggalSelesai) && $now->gt($jamSelesai)) {
                    // Ubah status menjadi 'Selesai'
                    DB::table('history_peminjaman')
                        ->where('id_peminjaman', $peminjaman->id_peminjaman)
                        ->update(['status' => 'Selesai']);
                }
            }
        })->everyMinute();
    }
    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
