<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class KuliahExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        $currentDate = now();
        $lastWeekDate = now()->subWeek();

        $data = DB::table('logkuliah')
            ->join('lab', 'logkuliah.id_lab', '=', 'lab.id_lab')
	  ->join('matakuliah', 'logkuliah.matkul', '=', 'matakuliah.id_matakuliah')
	    ->join('kelas', 'logkuliah.kelas', '=', 'kelas.id_kelas')
            ->select(
                'logkuliah.nama',
                'logkuliah.nim',
                'kelas.nama_kelas',
                'logkuliah.pc',
		'lab.ruang_lab',
		'matakuliah.semester',
		DB::raw('YEAR(logkuliah.tanggal) as tahun'),
                'logkuliah.jamMasuk',
                'logkuliah.jamKeluar',
                'logkuliah.tanggal',
		'logkuliah.dosen',
	                       'logkuliah.ail',	
		'logkuliah.keterangan',
                'logkuliah.alat',
                'logkuliah.mouse',
                'logkuliah.keyboard',
                'logkuliah.monitor',
                'logkuliah.jaringan',
                'logkuliah.durasi'
                // ... tambahkan atribut lain sesuai kebutuhan
            )
            ->whereNull('logkuliah.SKS')
            ->whereBetween('logkuliah.tanggal', [$lastWeekDate, $currentDate])
            ->orderBy('logkuliah.id_logkul', 'desc')
            ->get();

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
	    'Semester',
	                'Tahun',
            'Jam Masuk',
            'Jam Keluar',
            'Tanggal',
	     'Dosen',
	                 'AIL',
	    'Keterangan',
            'Alat',
            'Mouse',
            'Keyboard',
            'Monitor',
            'Jaringan',
            'Durasi'
            // ... tambahkan atribut lain sesuai kebutuhan
        ];
    }

}
