<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class KegiatanExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $currentDate = now();
        $lastWeekDate = now()->subWeek();

        $data = DB::table('logkegiatan')
            ->join('lab', 'logkegiatan.id_lab', '=', 'lab.id_lab')

            ->select(
                'logkegiatan.nama',
                'logkegiatan.nim',
                'logkegiatan.kelas',
                'logkegiatan.pc',
                'lab.ruang_lab',
                'logkegiatan.jamMasuk',
                'logkegiatan.jamKeluar',
                'logkegiatan.tanggal',
                'logkegiatan.keterangan',
                'logkegiatan.alat',
                'logkegiatan.mouse',
                'logkegiatan.keyboard',
                'logkegiatan.monitor',
                'logkegiatan.jaringan',
                // ... tambahkan atribut lain sesuai kebutuhan
            )
            ->whereNull('kegiatan')
            ->whereBetween('logkegiatan.tanggal', [$lastWeekDate, $currentDate])
            ->orderBy('logkegiatan.id_logke', 'desc')
            ->get();
        // dd($data);
        return $data;
    }
    public function headings(): array
    {
        return [
            'Nama',
            'NIM',
            'Kelas',
            'Nomor PC',
            'Ruang Lab',
            'Jam Masuk',
            'Jam Keluar',
            'Tanggal',
            'Keterangan',
            'Alat',
            'Mouse',
            'Keyboard',
            'Monitor',
            'Jaringan',
        ];
    }
}
