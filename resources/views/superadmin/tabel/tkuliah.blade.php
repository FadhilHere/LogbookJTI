<table class="table table-striped dataTable no-footer" id="table-1" role="grid" aria-describedby="table-1_info">
    <thead>
        <tr role="row">
            <th class="text-center sorting_asc" tabindex="0" aria-controls="table-1" rowspan="1" colspan="1"
                aria-sort="ascending" aria-label="#: activate to sort column descending" style="width: 35.9px;">#</th>
            <th class="sorting" tabindex="0" aria-controls="table-1" rowspan="1" colspan="1"
                aria-label="Task Name: activate to sort column ascending" style="width: 182.087px;">Nama
            </th>
            <th class="sorting" tabindex="0" aria-controls="table-1" rowspan="1" colspan="1"
                aria-label="Nomor PC: activate to sort column ascending" style="width: 182.087px;">Nomor PC</th>
            <th class="sorting" tabindex="0" aria-controls="table-1" rowspan="1" colspan="1"
                aria-label="Ruang Lab: activate to sort column ascending" style="width: 182.087px;">Ruang Lab</th>
            <th class="sorting" tabindex="0" aria-controls="table-1" rowspan="1" colspan="1"
                aria-label="Loker: activate to sort column ascending" style="width: 182.087px;">Loker</th>
            <th class="sorting" tabindex="1" aria-controls="table-1" rowspan="1" colspan="1"
                aria-label="Task Name: activate to sort column ascending" style="width: 182.087px;">Nim
            </th>
            <th class="sorting" tabindex="0" aria-controls="table-1" rowspan="1" colspan="1"
                aria-label="Task Name: activate to sort column ascending" style="width: 182.087px;">
                Kelas</th>
            <th class="sorting" tabindex="0" aria-controls="table-1" rowspan="1" colspan="1"
                aria-label="Task Name: activate to sort column ascending" style="width: 182.087px;">
                Tanggal</th>
            <th class="sorting" tabindex="0" aria-controls="table-1" rowspan="1" colspan="1"
                aria-label="Task Name: activate to sort column ascending" style="width: 182.087px;">Jam
                Masuk</th>

            <th class="sorting" tabindex="0" aria-controls="table-1" rowspan="1" colspan="1"
                aria-label="Task Name: activate to sort column ascending" style="width: 182.087px;">
                Monitor</th>
            <th class="sorting" tabindex="0" aria-controls="table-1" rowspan="1" colspan="1"
                aria-label="Task Name: activate to sort column ascending" style="width: 182.087px;">
                Keyboard</th>
            <th class="sorting" tabindex="0" aria-controls="table-1" rowspan="1" colspan="1"
                aria-label="Task Name: activate to sort column ascending" style="width: 182.087px;">
                Mouse</th>
            <th class="sorting" tabindex="0" aria-controls="table-1" rowspan="1" colspan="1"
                aria-label="Task Name: activate to sort column ascending" style="width: 182.087px;">
                Jaringan</th>
            <th class="sorting" tabindex="0" aria-controls="table-1" rowspan="1" colspan="1"
                aria-label="Task Name: activate to sort column ascending" style="width: 182.087px;">
                Keterangan</th>
            <th class="sorting" tabindex="0" aria-controls="table-1" rowspan="1" colspan="1"
                aria-label="Task Name: activate to sort column ascending" style="width: 182.087px;">Aksi
            </th>
    </thead>
    <tbody>
        @forelse ($data as $index => $logKeg)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $logKeg->nama }}</td>
                <td>{{ $logKeg->pc }}</td>
                <td>{{ $logKeg->ruang_lab }}</td>
                <td>{{ $logKeg->loker }}</td>
                <td>{{ $logKeg->nim }}</td>
                <td>{{ $logKeg->nama_kelas }}</td>
                <td>{{ $logKeg->tanggal }}</td>
                <td>{{ $logKeg->jamMasuk }}</td>
                <td>
                    @if ($logKeg->monitor == 'bagus')
                        <span class="badge badge-success">{{ $logKeg->monitor }}</span>
                    @elseif($logKeg->monitor == 'rusak')
                        <span class="badge badge-danger">{{ $logKeg->monitor }}</span>
                    @else
                        {{ $logKeg->monitor }}
                    @endif
                </td>

                <td>
                    @if ($logKeg->keyboard == 'bagus')
                        <span class="badge badge-success">{{ $logKeg->keyboard }}</span>
                    @elseif($logKeg->keyboard == 'rusak')
                        <span class="badge badge-danger">{{ $logKeg->keyboard }}</span>
                    @else
                        {{ $logKeg->keyboard }}
                    @endif
                </td>

                <td>
                    @if ($logKeg->mouse == 'bagus')
                        <span class="badge badge-success">{{ $logKeg->mouse }}</span>
                    @elseif($logKeg->mouse == 'rusak')
                        <span class="badge badge-danger">{{ $logKeg->mouse }}</span>
                    @else
                        {{ $logKeg->mouse }}
                    @endif
                </td>

                <td>
                    @if ($logKeg->jaringan == 'bagus')
                        <span class="badge badge-success">{{ $logKeg->jaringan }}</span>
                    @elseif($logKeg->jaringan == 'rusak')
                        <span class="badge badge-danger">{{ $logKeg->jaringan }}</span>
                    @else
                        {{ $logKeg->jaringan }}
                    @endif
                </td>
                <td>{{ $logKeg->keterangan }}</td>
                <td class="text-center">
                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                        action="{{ route('kuliahDosenMhs.destroyMhs', $logKeg->id_logkul) }}" method="post">
                        <button type="button" class="btn btn-sm btn-info" data-toggle="modal"
                            data-target="#viewModal{{ $logKeg->id_logkul }}" title="Detail">
                            <i class="fa fa-eye"></i>
                        </button>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
                            <i class="fa fa-trash"></i>
                        </button>
                    </form>
                </td>

            </tr>
        @empty
            <tr>
                <td colspan="10" class="text-center">
                    <div class="alert alert-danger">
                        Data logbook kuliah belum Tersedia.
                    </div>
                </td>
            </tr>
        @endforelse
    </tbody>
</table>
