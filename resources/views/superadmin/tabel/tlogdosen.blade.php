<table class="table table-striped dataTable no-footer" id="table-1" role="grid" aria-describedby="table-1_info">
    <thead>
        <tr role="row">
            <th class="text-center sorting_asc" tabindex="0" aria-controls="table-1" rowspan="1" colspan="1"
                aria-sort="ascending" aria-label="#: activate to sort column descending" style="width: 35.9px;">#</th>
            <th class="sorting" tabindex="1" aria-controls="table-1" rowspan="1" colspan="1"
                aria-label="Nama: activate to sort column ascending" style="width: 182.087px;">Nama</th>
            <th class="sorting" tabindex="1" aria-controls="table-1" rowspan="1" colspan="1"
                aria-label="Nama: activate to sort column ascending" style="width: 182.087px;">Jabatan</th>
            <th class="sorting" tabindex="0" aria-controls="table-1" rowspan="1" colspan="1"
		aria-label="ID Lab: activate to sort column ascending" style="width: 182.087px;">Lab</th>
		<th class="sorting" tabindex="0" aria-controls="table-1" rowspan="1" colspan="1"
		aria-label="ID Lab: activate to sort column ascending" style="width: 182.087px;">Kelas</th>
	<th class="sorting" tabindex="0" aria-controls="table-1" rowspan="1" colspan="1"
                aria-label="ID Lab: activate to sort column ascending" style="width: 182.087px;">Tanggal</th>
            <th class="sorting" tabindex="0" aria-controls="table-1" rowspan="1" colspan="1"
                aria-label="Jam Masuk: activate to sort column ascending" style="width: 182.087px;">Jam Masuk</th>
            <th class="sorting" tabindex="0" aria-controls="table-1" rowspan="1" colspan="1"
                aria-label="Jam Keluar: activate to sort column ascending" style="width: 182.087px;">Matkul</th>
            <th class="sorting" tabindex="0" aria-controls="table-1" rowspan="1" colspan="1"
                aria-label="Keterangan: activate to sort column ascending" style="width: 182.087px;">Keterangan</th>
            <th class="sorting" tabindex="0" aria-controls="table-1" rowspan="1" colspan="1"
                aria-label="Jumlah Mahasiswa: activate to sort column ascending" style="width: 182.087px;">Jumlah
                Mahasiswa</th>
            <th class="sorting" tabindex="0" aria-controls="table-1" rowspan="1" colspan="1"
                aria-label="Durasi: activate to sort column ascending" style="width: 182.087px;">Durasi</th>
            <th class="sorting" tabindex="0" aria-controls="table-1" rowspan="1" colspan="1"
                aria-label="Aksi: activate to sort column ascending" style="width: 182.087px;">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($data as $index => $logKeg)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $logKeg->nama }}</td>
            <td>{{ $logKeg->jabatan }}</td>
	    <td>{{ $logKeg->ruang_lab }}</td>
	<td>{{ $logKeg->nama_kelas }}</td>
	 <td>{{ $logKeg->tanggal }}</td>
            <td>{{ $logKeg->jamMasuk }}</td>
            <td>{{ $logKeg->matkul }}</td>
            <td>{{ $logKeg->keterangan }}</td>
            <td>{{ $logKeg->jumlahMhs }}</td>
            <td>{{ $logKeg->durasi }} Menit</td>
            <td class="text-center">
                <button type="button" class="btn btn-sm btn-info" data-toggle="modal"
                    data-target="#viewModal{{ $logKeg->id_logkul }}">
                    <i class="fa fa-eye" aria-hidden="true"></i>
                </button>
                <form style="display: inline-block;" onsubmit="return confirm('Apakah Anda Yakin ?');"
                    action="{{ route('kuliahDosen.destroy', $logKeg->id_logkul) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="7" class="text-center">
                <div class="alert alert-danger">
                    Data logbook kegiatan belum tersedia.
                </div>
            </td>
        </tr>
        @endforelse
    </tbody>
</table>
