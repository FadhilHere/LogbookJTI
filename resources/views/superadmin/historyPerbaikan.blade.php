<html lang="en"><!-- datatables.html  21 Nov 2019 03:55:21 GMT -->

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>History Perbaikan</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/app.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bundles/datatables/datatables.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <link rel="icon" href="{{ asset('CALTEX-RIAU-LOGO.png') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <style>
        .modal {
            z-index: 1500;
            /* Sesuaikan nilainya sesuai kebutuhan */
        }

        .custom-badge-style {
            margin-right: 5px;
        }

        .custom-text-style {
            text-transform: uppercase;
            font-size: 10px;
            font-family: 'Poppins', sans-serif;
        }
    </style>

</head>

<body class="light light-sidebar theme-white">
    <div class="loader" style="display: none;"></div>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar sticky">
                <div class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-align-justify">
                                    <line x1="21" y1="10" x2="3" y2="10"></line>
                                    <line x1="21" y1="6" x2="3" y2="6"></line>
                                    <line x1="21" y1="14" x2="3" y2="14"></line>
                                    <line x1="21" y1="18" x2="3" y2="18"></line>
                                </svg></a></li>
                        <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-maximize">
                                    <path
                                        d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3">
                                    </path>
                                </svg>
                            </a></li>

                    </ul>
                </div>
                <span class="badge badge-secondary custom-badge-style">
                    <span
                        class="d-sm-none d-lg-inline-block custom-text-style">{{ strtoupper(session('username')) }}</span>
                </span>

                <ul class="navbar-nav navbar-right">

                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="{{ asset('assets/img/profil1.jpg') }}"
                                class="user-img-radious-style">

                        </a>

                        <div class="dropdown-menu dropdown-menu-right pullDown">
                            <div class="dropdown-title">Hello {{ strtoupper(session('username')) }}</div>

                            <div class="dropdown-divider"></div>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                            <a href="#" id="logout-link" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2" tabindex="1" style="overflow: hidden; outline: none;">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand" style="text-align: center;">
                        <a href="{{ route('superadmin.dashboard') }}">
                            <img alt="image" src="{{ asset('assets/img/logopcr.png') }}" class="header-logo"
                                style="max-width: 90%; height: auto; margin-top: 15; margin-left: 1;">
                        </a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="dropdown">
                            <a href="{{ route('superadmin.dashboard') }}" class="nav-link toggled"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-monitor">
                                    <rect x="2" y="3" width="20" height="14" rx="2" ry="2">
                                    </rect>
                                    <line x1="8" y1="21" x2="16" y2="21"></line>
                                    <line x1="12" y1="17" x2="12" y2="21"></line>
                                </svg><span>Dashboard</span></a>
                        </li>
                        <li class="menu-header">Table</li>
                        <li class="dropdown active">
                            <a href="#" class="menu-toggle nav-link has-dropdown toggled"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid">
                                    <rect x="3" y="3" width="7" height="7"></rect>
                                    <rect x="14" y="3" width="7" height="7"></rect>
                                    <rect x="14" y="14" width="7" height="7"></rect>
                                    <rect x="3" y="14" width="7" height="7"></rect>
                                </svg><span>Tables</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="{{ route('kuliahDosen.index') }}">Log Dosen</a></li>
                                <li><a class="nav-link" href="{{ route('kuliahDosen.kuliah') }}">Log Kuliah</a></li>
                                <li><a class="nav-link " href="{{ route('kegiatan.index') }}">Log
                                        Kegiatan</a></li>
                                <li><a class="nav-link " href="{{ route('labpc.index') }}">Lab & Kelas</a></li>
                                <li><a class="nav-link " href="{{ route('matkul.index') }}">Mata Kuliah</a></li>
                                <li>
                                    <a class="nav-link" href="{{ route('historyMatkul') }}">History Mata
                                        Kuliah</a>
                                </li>
                                <li>
                                    <a class="nav-link" href="{{ route('perbaikan.index') }}">List Perbaikan</a>
                                </li>
                                <li class="active">
                                    <a class="nav-link" href="{{ route('historyPerbaikan') }}">History
                                        Perbaikan</a>
                                </li>
                                <li>
                                    <a class="nav-link" href="{{ route('peminjaman.index') }}">History
                                        Peminjaman Lab</a>
                                </li>
                                <li><a class="nav-link " href="{{ route('user.index') }}">User</a></li>
                            </ul>
                        </li>
                    </ul>
                </aside>
            </div>
            <!-- Main Content -->
            <div class="main-content" style="min-height: 612px;">
                <section class="section">
                    <div class="section-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Log Kuliah Mahasiswa</h4>
                                    </div>
                                    <div class="card-body">

                                        <div class="row mb-3">
                                            <div class="col-md-6 d-flex align-items-end ">
                                                <div class="dropdown">
                                                    <button class="btn btn-success dropdown-toggle" type="button"
                                                        id="labFilterDropdown" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        Filter Lab
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="labFilterDropdown">
                                                        <a class="dropdown-item lab-filter-dropdown-item"
                                                            href="#" data-value="semua_lab">Semua Lab</a>
                                                        @foreach ($listRuangLab as $ruangLab)
                                                            <a class="dropdown-item lab-filter-dropdown-item"
                                                                href="#"
                                                                data-value="{{ $ruangLab }}">{{ $ruangLab }}</a>
                                                        @endforeach
                                                    </div>
                                                </div>

                                                <div class="dropdown ml-2">
                                                    <button class="btn btn-info dropdown-toggle" type="button"
                                                        id="kelasFilterDropdown" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        Filter Kelas
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="kelasFilterDropdown">
                                                        <a class="dropdown-item kelas-filter-dropdown-item"
                                                            href="#" data-value="semua_kelas">Semua Kelas</a>
                                                        @foreach ($listKelas as $kelas)
                                                            <a class="dropdown-item kelas-filter-dropdown-item"
                                                                href="#"
                                                                data-value="{{ $kelas }}">{{ $kelas }}</a>
                                                        @endforeach
                                                    </div>
                                                </div>

                                                <form id="filterForm" class="ml-2">
                                                    <input type="hidden" id="labFilter" name="labFilter"
                                                        value="{{ $labFilter ?? '' }}">
                                                    <input type="hidden" id="kelasFilter" name="kelasFilter"
                                                        value="{{ $kelasFilter ?? '' }}">
                                                </form>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <div id="table-1_wrapper"
                                                class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                                                <div class="row">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <table class="table table-striped dataTable no-footer" id="table-1"
                                                role="grid" aria-describedby="table-1_info">
                                                <thead>
                                                    <tr role="row">
                                                        <th class="text-center sorting_asc" tabindex="0"
                                                            aria-controls="table-1" rowspan="1" colspan="1"
                                                            aria-sort="ascending"
                                                            aria-label="#: activate to sort column descending"
                                                            style="width: 35.9px;">#</th>
                                                        <th class="sorting" tabindex="0" aria-controls="table-1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Task Name: activate to sort column ascending"
                                                            style="width: 182.087px;">Nama
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="table-1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Nomor PC: activate to sort column ascending"
                                                            style="width: 182.087px;">Nomor PC</th>
                                                        <th class="sorting" tabindex="0" aria-controls="table-1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Ruang Lab: activate to sort column ascending"
                                                            style="width: 182.087px;">Ruang Lab</th>
                                                        <th class="sorting" tabindex="1" aria-controls="table-1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Task Name: activate to sort column ascending"
                                                            style="width: 182.087px;">Nim
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="table-1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Task Name: activate to sort column ascending"
                                                            style="width: 182.087px;">
                                                            Kelas</th>
                                                        <th class="sorting" tabindex="0" aria-controls="table-1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Task Name: activate to sort column ascending"
                                                            style="width: 182.087px;">
                                                            Tanggal Masuk</th>
                                                        <th class="sorting" tabindex="0" aria-controls="table-1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Task Name: activate to sort column ascending"
                                                            style="width: 182.087px;">
                                                            Tanggal Perbaikan</th>
                                                        <th class="sorting" tabindex="0" aria-controls="table-1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Task Name: activate to sort column ascending"
                                                            style="width: 182.087px;">Jam
                                                            Masuk</th>

                                                        <th class="sorting" tabindex="0" aria-controls="table-1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Task Name: activate to sort column ascending"
                                                            style="width: 182.087px;">
                                                            Monitor</th>
                                                        <th class="sorting" tabindex="0" aria-controls="table-1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Task Name: activate to sort column ascending"
                                                            style="width: 182.087px;">
                                                            Keyboard</th>
                                                        <th class="sorting" tabindex="0" aria-controls="table-1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Task Name: activate to sort column ascending"
                                                            style="width: 182.087px;">
                                                            Mouse</th>
                                                        <th class="sorting" tabindex="0" aria-controls="table-1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Task Name: activate to sort column ascending"
                                                            style="width: 182.087px;">
                                                            Jaringan</th>

                                                        <th class="sorting" tabindex="0" aria-controls="table-1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Task Name: activate to sort column ascending"
                                                            style="width: 182.087px;">
                                                            Keterangan</th>
                                                        <th class="sorting" tabindex="0" aria-controls="table-1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Task Name: activate to sort column ascending"
                                                            style="width: 182.087px;">Aksi
                                                        </th>
                                                </thead>
                                                <tbody>
                                                    @forelse ($data as $index => $perbaikan)
                                                        <tr>
                                                            <td>{{ $index + 1 }}</td>
                                                            <td>{{ $perbaikan->nama }}</td>
                                                            <td>{{ $perbaikan->pc }}</td>
                                                            <td>{{ $perbaikan->ruang_lab }}</td>
                                                            <td>{{ $perbaikan->nim }}</td>
                                                            <td>{{ $perbaikan->nama_kelas }}</td>
                                                            <td>{{ $perbaikan->tanggalMasuk }}</td>
                                                            <td>{{ $perbaikan->tanggal }}</td>
                                                            <td>{{ $perbaikan->jamMasuk }}</td>
                                                            <td>
                                                                @if ($perbaikan->monitor == 'bagus')
                                                                    <span
                                                                        class="badge badge-success">{{ $perbaikan->monitor }}</span>
                                                                @elseif($perbaikan->monitor == 'rusak')
                                                                    <span
                                                                        class="badge badge-danger">{{ $perbaikan->monitor }}</span>
                                                                @else
                                                                    {{ $perbaikan->monitor }}
                                                                @endif
                                                            </td>

                                                            <td>
                                                                @if ($perbaikan->keyboard == 'bagus')
                                                                    <span
                                                                        class="badge badge-success">{{ $perbaikan->keyboard }}</span>
                                                                @elseif($perbaikan->keyboard == 'rusak')
                                                                    <span
                                                                        class="badge badge-danger">{{ $perbaikan->keyboard }}</span>
                                                                @else
                                                                    {{ $perbaikan->keyboard }}
                                                                @endif
                                                            </td>

                                                            <td>
                                                                @if ($perbaikan->mouse == 'bagus')
                                                                    <span
                                                                        class="badge badge-success">{{ $perbaikan->mouse }}</span>
                                                                @elseif($perbaikan->mouse == 'rusak')
                                                                    <span
                                                                        class="badge badge-danger">{{ $perbaikan->mouse }}</span>
                                                                @else
                                                                    {{ $perbaikan->mouse }}
                                                                @endif
                                                            </td>

                                                            <td>
                                                                @if ($perbaikan->jaringan == 'bagus')
                                                                    <span
                                                                        class="badge badge-success">{{ $perbaikan->jaringan }}</span>
                                                                @elseif($perbaikan->jaringan == 'rusak')
                                                                    <span
                                                                        class="badge badge-danger">{{ $perbaikan->jaringan }}</span>
                                                                @else
                                                                    {{ $perbaikan->jaringan }}
                                                                @endif
                                                            </td>

                                                            <td>{{ $perbaikan->keterangan }}</td>
                                                            <td class="text-center">
                                                                <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                                    action="{{ route('perbaikan.destroy', $perbaikan->id) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                        class="btn btn-sm btn-danger" title="Hapus">
                                                                        <i class="fa fa-trash"></i>
                                                                    </button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="10" class="text-center">
                                                                <div class="alert alert-danger">
                                                                    Data history perbaikan belum Tersedia.
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>



                @foreach ($data as $perbaikan)
                    <!-- Modal -->
                    <div class="modal fade" id="viewModal{{ $perbaikan->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="viewModalLabel{{ $perbaikan->id }}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="viewModalLabel{{ $perbaikan->id }}">View
                                        Details
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p><strong>Nama:</strong> {{ $perbaikan->nama }}</p>
                                            <p><strong>NIM:</strong> {{ $perbaikan->nim }}</p>
                                            <p><strong>Kelas:</strong> {{ $perbaikan->kelas }}</p>
                                            <p><strong>Nomor Pc:</strong> {{ $perbaikan->pc }}</p>
                                            <p><strong>Ruang Lab:</strong> {{ $perbaikan->ruang_lab }}</p>
                                        </div>
                                        <div class="col-md-4">
                                            {{-- <p><strong>Matakuliah:</strong> {{ $perbaikan->matkul }}</p> --}}
                                            <p><strong>Jam Masuk:</strong> {{ $perbaikan->jamMasuk }}</p>
                                            {{-- <p><strong>Jam Keluar:</strong> {{ $perbaikan->jamKeluar }}</p> --}}
                                            <p><strong>Tanggal:</strong> {{ $perbaikan->tanggal }}</p>
                                            <p><strong>Keterangan:</strong> {{ $perbaikan->keterangan }}</p>
                                            {{-- <p><strong>Alat:</strong> {{ $perbaikan->alat }}</p> --}}
                                        </div>
                                        <div class="col-md-4">
                                            <p><strong>Mouse:</strong> {{ $perbaikan->mouse }}</p>
                                            <p><strong>Keyboard:</strong> {{ $perbaikan->keyboard }}</p>
                                            <p><strong>Monitor:</strong> {{ $perbaikan->monitor }}</p>
                                            <p><strong>Jaringan:</strong> {{ $perbaikan->jaringan }}</p>
                                            {{-- <p><strong>Durasi:</strong> {{ $perbaikan->durasi }} Menit</p> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="settingSidebar">
                    <a href="javascript:void(0)" class="settingPanelToggle"> <i class="fa fa-spin fa-cog"></i>
                    </a>
                    <div class="settingSidebar-body ps-container ps-theme-default" tabindex="2"
                        style="overflow: hidden; outline: none;">
                        <div class=" fade show active">
                            <div class="setting-panel-header">Setting Panel
                            </div>
                            <div class="p-15 border-bottom">
                                <h6 class="font-medium m-b-10">Select Layout</h6>
                                <div class="selectgroup layout-color w-50">
                                    <label class="selectgroup-item">
                                        <input type="radio" name="value" value="1"
                                            class="selectgroup-input-radio select-layout" checked="">
                                        <span class="selectgroup-button">Light</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="value" value="2"
                                            class="selectgroup-input-radio select-layout">
                                        <span class="selectgroup-button">Dark</span>
                                    </label>
                                </div>
                            </div>
                            <div class="p-15 border-bottom">
                                <h6 class="font-medium m-b-10">Sidebar Color</h6>
                                <div class="selectgroup selectgroup-pills sidebar-color">
                                    <label class="selectgroup-item">
                                        <input type="radio" name="icon-input" value="1"
                                            class="selectgroup-input select-sidebar">
                                        <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                                            data-original-title="Light Sidebar"><i class="fas fa-sun"></i></span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="icon-input" value="2"
                                            class="selectgroup-input select-sidebar" checked="">
                                        <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                                            data-original-title="Dark Sidebar"><i class="fas fa-moon"></i></span>
                                    </label>
                                </div>
                            </div>
                            <div class="p-15 border-bottom">
                                <h6 class="font-medium m-b-10">Color Theme</h6>
                                <div class="theme-setting-options">
                                    <ul class="choose-theme list-unstyled mb-0">
                                        <li title="white" class="active">
                                            <div class="white"></div>
                                        </li>
                                        <li title="cyan">
                                            <div class="cyan"></div>
                                        </li>
                                        <li title="black">
                                            <div class="black"></div>
                                        </li>
                                        <li title="purple">
                                            <div class="purple"></div>
                                        </li>
                                        <li title="orange">
                                            <div class="orange"></div>
                                        </li>
                                        <li title="green">
                                            <div class="green"></div>
                                        </li>
                                        <li title="red">
                                            <div class="red"></div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="p-15 border-bottom">
                                <div class="theme-setting-options">
                                    <label class="m-b-0">
                                        <input type="checkbox" name="custom-switch-checkbox"
                                            class="custom-switch-input" id="mini_sidebar_setting">
                                        <span class="custom-switch-indicator"></span>
                                        <span class="control-label p-l-10">Mini Sidebar</span>
                                    </label>
                                </div>
                            </div>
                            <div class="p-15 border-bottom">
                                <div class="theme-setting-options">
                                    <label class="m-b-0">
                                        <input type="checkbox" name="custom-switch-checkbox"
                                            class="custom-switch-input" id="sticky_header_setting">
                                        <span class="custom-switch-indicator"></span>
                                        <span class="control-label p-l-10">Sticky Header</span>
                                    </label>
                                </div>
                            </div>
                            <div class="mt-4 mb-4 p-3 align-center rt-sidebar-last-ele">
                                <a href="#" class="btn btn-icon icon-left btn-primary btn-restore-theme">
                                    <i class="fas fa-undo"></i> Restore Default
                                </a>
                            </div>
                        </div>
                    </div>
                    <div id="ascrail2001" class="nicescroll-rails nicescroll-rails-vr"
                        style="width: 8px; z-index: 999; cursor: default; position: absolute; top: 0px; left: 272px; height: 707.2px; display: none;">
                        <div class="nicescroll-cursors"
                            style="position: relative; top: 0px; float: right; width: 6px; height: 0px; background-color: rgb(66, 66, 66); border: 1px solid rgb(255, 255, 255); background-clip: padding-box; border-radius: 5px;">
                        </div>
                    </div>
                    <div id="ascrail2001-hr" class="nicescroll-rails nicescroll-rails-hr"
                        style="height: 8px; z-index: 999; top: 699.2px; left: 0px; position: absolute; cursor: default; display: none;">
                        <div class="nicescroll-cursors"
                            style="position: absolute; top: 0px; height: 6px; width: 0px; background-color: rgb(66, 66, 66); border: 1px solid rgb(255, 255, 255); background-clip: padding-box; border-radius: 5px;">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- General JS Scripts -->
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
    <!-- JS Libraries -->
    <script src="{{ asset('assets/bundles/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/bundles/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Page Specific JS File -->
    <script src="{{ asset('assets/js/page/datatables.js') }}"></script>
    <!-- Template JS File -->
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <script src="{{ asset('assets/bundles/datatables/export-tables/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/bundles/datatables/export-tables/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('assets/bundles/datatables/export-tables/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/bundles/datatables/export-tables/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/bundles/datatables/export-tables/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/bundles/datatables/export-tables/buttons.print.min.js') }}"></script>

    <!-- Custom JS File -->
    <script src="{{ asset('assets/js/custom.js') }}"></script>

    <script>
        $(document).ready(function() {
            // Handle logout link click
            $('a#logout-link').click(function(event) {
                event.preventDefault(); // Prevent default link behavior
                $('#logout-form').submit(); // Submit the form
            });
        });
    </script>

    <!-- <script>
        $(document).ready(function() {
            $('.lab-filter-dropdown-item').on('click', function(e) {
                e.preventDefault();
                var selectedValue = $(this).data('value');
                $('#labFilter').val(selectedValue);
                $('#filterForm').submit();
            });
        });
    </script> -->

    <script>
        $(document).ready(function() {
            // Filter Lab
            $('.lab-filter-dropdown-item').on('click', function(e) {
                e.preventDefault();
                var selectedValue = $(this).data('value');
                $('#labFilter').val(selectedValue);
                $('#filterForm').submit();
            });

            // Filter Kelas
            $('.kelas-filter-dropdown-item').on('click', function(e) {
                e.preventDefault();
                var selectedValue = $(this).data('value');
                $('#kelasFilter').val(selectedValue);
                $('#filterForm').submit();
            });
        });
    </script>









    <div id="ascrail2000" class="nicescroll-rails nicescroll-rails-vr"
        style="width: 8px; z-index: 892; cursor: default; position: fixed; top: 0px; left: 242px; height: 707px; display: block; opacity: 0;">
        <div class="nicescroll-cursors"
            style="position: relative; top: 0px; float: right; width: 6px; height: 333px; background-color: rgb(66, 66, 66); border: 1px solid rgb(255, 255, 255); background-clip: padding-box; border-radius: 5px;">
        </div>
    </div>
    <div id="ascrail2000-hr" class="nicescroll-rails nicescroll-rails-hr"
        style="height: 8px; z-index: 892; top: 699.2px; left: 0px; position: fixed; cursor: default; display: none; width: 242px; opacity: 0;">
        <div class="nicescroll-cursors"
            style="position: absolute; top: 0px; height: 6px; width: 250px; background-color: rgb(66, 66, 66); border: 1px solid rgb(255, 255, 255); background-clip: padding-box; border-radius: 5px; left: 0px;">
        </div>
    </div>
</body>



<!-- datatables.html  21 Nov 2019 03:55:25 GMT -->

</html>
