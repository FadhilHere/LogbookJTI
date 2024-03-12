<?php
// app/Http/Controllers/ExportController.php
namespace App\Http\Controllers;

use App\Exports\DosenExport;
use App\Exports\DosenExportMonthly;
use App\Exports\KegiatanExport;
use App\Exports\KegiatanExportMonthly;
use App\Exports\KuliahExport;
use App\Exports\KuliahExportMonthly;
use App\Exports\PICExport;
use App\Exports\PICExportMonthly;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function exportExcel()
    {
        return Excel::download(new KuliahExport, 'kuliah_data.xlsx');
    }
    public function exportExcelKuliahBulan()
    {
        return Excel::download(new KuliahExportMonthly, 'kuliah_data_per_bulan.xlsx');
    }
    public function exportExcelDosenMinggu()
    {
        return Excel::download(new DosenExport, 'dosen_data_per_minggu.xlsx');
    }
    public function exportExcelDosenBulan()
    {
        return Excel::download(new DosenExportMonthly, 'dosen_data_per_bulan.xlsx');
    }
    public function exportExcelKegiatanMinggu()
    {
        return Excel::download(new KegiatanExport, 'kegiatan_data_per_minggu.xlsx');
    }
    public function exportExcelKegiatanBulan()
    {
        return Excel::download(new KegiatanExportMonthly, 'kegiatan_data_per_bulan.xlsx');
    }
    public function exportExcelKegiatanPicMinggu()
    {
        return Excel::download(new PICExport, 'kegiatan_dataPIC_per_minggu.xlsx');
    }
    public function exportExcelKegiatanPicBulan()
    {
        return Excel::download(new PICExportMonthly, 'kegiatan_dataPIC_per_bulan.xlsx');
    }
}
