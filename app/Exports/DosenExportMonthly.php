<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class DosenExportMonthly implements FromCollection, WithHeadings
{

    public function collection()
    {
        $currentDate = now();
        $lastMonthDate = now()->subMonth();

        $data = DB::table('logkuliah')
            ->join('lab', 'logkuliah.id_lab', '=', 'lab.id_lab')
            ->join('matakuliah', 'logkuliah.matkul', '=', 'matakuliah.id_matakuliah')
            ->select(
                'logkuliah.nama',
                'lab.ruang_lab as "Ruang Lab"',
                'logkuliah.jamMasuk as "Jam Masuk"',
                'logkuliah.jamKeluar as "Jam Keluar"',
                'logkuliah.keterangan',
                'logkuliah.hadir as "Hadir"',
                'logkuliah.tidakhadir as "Tidak Hadir"',
                'matakuliah.matkul as "Mata Kuliah"',
                'logkuliah.sks as "SKS"',
                'logkuliah.tanggal',
                'logkuliah.jumlahMhs as "Jumlah Mahasiswa"',
                'logkuliah.durasi as "Durasi"'
                // ... tambahkan atribut lain sesuai kebutuhan
            )
            ->whereNotNull('logkuliah.SKS')
            ->whereBetween('logkuliah.tanggal', [$lastMonthDate, $currentDate])
            ->orderBy('logkuliah.tanggal', 'asc')
            ->get();

        return $data;
    }


    public function headings(): array
    {
        return [
            'Nama',
            'Ruang Lab',
            'Jam Masuk',
            'Jam Keluar',
            'Keterangan',
            'Hadir',
            'Tidak Hadir',
            'Mata Kuliah',
            'SKS',
            'Tanggal',
            'Jumlah Mahasiswa',
            'Durasi',
            // ... sesuaikan dengan atribut lainnya
        ];
    }


}
