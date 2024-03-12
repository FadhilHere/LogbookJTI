<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PICExportMonthly implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $currentDate = now();
        $lastMonthDate = now()->subMonth();

        $data = DB::table('logkegiatan')
            ->join('lab', 'logkegiatan.id_lab', '=', 'lab.id_lab')
            ->select(
                'logkegiatan.nama',
                'logkegiatan.nim',
                'logkegiatan.nohp',
                'lab.ruang_lab',
                'logkegiatan.kegiatan',
                'logkegiatan.email',
                'logkegiatan.jamMasuk',
                'logkegiatan.jamKeluar',
                'logkegiatan.tanggalMulai',
                'logkegiatan.tanggalSelesai',
                'logkegiatan.peserta',
                'logkegiatan.totalHari',
                'logkegiatan.keterangan',
                'logkegiatan.alat',
            )
            ->whereNotNull('kegiatan')
            ->whereBetween('logkegiatan.tanggalMulai', [$lastMonthDate, $currentDate])
            ->orderBy('logkegiatan.id_logke', 'desc')
            ->get();
        return $data;
    }
    public function headings(): array
    {
        return [
            'Nama',
            'NIM',
            'No. HP',
            'Ruang Lab',
            'Kegiatan',
            'Email',
            'Jam Masuk',
            'Jam Keluar',
            'Tanggal Mulai',
            'Tanggal Selesai',
            'Peserta',
            'Total Hari',
            'Keterangan',
            'Alat',
        ];
    }
}
