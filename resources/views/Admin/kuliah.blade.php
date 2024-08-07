<html lang="en"><!-- datatables.html  21 Nov 2019 03:55:21 GMT -->

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Admin Log Book</title>
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
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">
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

        .modal-dialog-centered {
            display: flex;
            align-items: center;
            min-height: calc(100% - 1rem);
        }

        /* .modal.fade.show {
            display: flex !important;
        } */

        .modal-dialog {
            max-width: 60%;
            /* Sesuaikan dengan lebar yang diinginkan, misalnya 80% dari lebar layar */
        }

        .modal-content {
            width: 100%;
            /* Pastikan konten modal mengisi seluruh lebar yang tersedia */
        }

        /* Tambahkan CSS untuk media query jika diinginkan */
        @media (min-width: 768px) {
            .modal-dialog {
                max-width: 40%;
                /* Sesuaikan dengan lebar yang diinginkan pada layar yang lebih besar */
            }
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
									collapse-btn"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-align-justify">
                                    <line x1="21" y1="10" x2="3" y2="10"></line>
                                    <line x1="21" y1="6" x2="3" y2="6"></line>
                                    <line x1="21" y1="14" x2="3" y2="14"></line>
                                    <line x1="21" y1="18" x2="3" y2="18"></line>
                                </svg></a></li>
                        <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-maximize">
                                    <path
                                        d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3">
                                    </path>
                                </svg>
                            </a></li>

                    </ul>
                </div>
                <span class="badge badge-secondary custom-badge-style">
                    <span class="d-sm-none d-lg-inline-block custom-text-style">{{ strtoupper(session('username'))
                        }}</span>
                </span>

                <ul class="navbar-nav navbar-right">

                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="{{ asset('assets/img/profil1.jpg') }}" class="user-img-radious-style">

                        </a>

                        <div class="dropdown-menu dropdown-menu-right pullDown">
                            <div class="dropdown-title">Hello {{ strtoupper(session('username'))
                                }}</div>

                            <div class="dropdown-divider"></div>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
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
                        <a href="{{ route('admin.index') }}">
                            <img alt="image" src="{{ asset('assets/img/logopcr.png') }}" class="header-logo"
                                style="max-width: 90%; height: auto; margin-top: 15; margin-left: 1;">
                        </a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="dropdown active">
                            <a href="#" class="menu-toggle nav-link has-dropdown toggled"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-grid">
                                    <rect x="3" y="3" width="7" height="7"></rect>
                                    <rect x="14" y="3" width="7" height="7"></rect>
                                    <rect x="14" y="14" width="7" height="7"></rect>
                                    <rect x="3" y="14" width="7" height="7"></rect>
                                </svg><span>Tables</span></a>
                            <ul class="dropdown-menu">

                                <li class="active"><a class="nav-link" href="{{ route('admin.index') }}">Log Kuliah</a>
                                </li>
                                <li><a class="nav-link " href="{{ route('admin.create') }}">Isi Logbook</a></li>
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
                                        <div class="table-responsive">
                                            <div id="table-1_wrapper"
                                                class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                                                <div class="row">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
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
                                                                Tanggal</th>				
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
                                                                style="width: 182.087px;">Aksi
                                                            </th>
                                                    </thead>
                                                    <tbody>
                                                        @forelse ($data as $index => $logKeg)
                                                        <tr>
                                                            <td>{{ $index + 1 }}</td>
                                                            <td>{{ $logKeg->nama }}</td>
                                                            <td>{{ $logKeg->pc }}</td>
                                                            <td>{{ $logKeg->ruang_lab }}</td>
                                                            <td>{{ $logKeg->nim }}</td>
							    <td>{{ $logKeg->nama_kelas }}</td>
								<td>{{ $logKeg->tanggal }}</td>
                                                            <td>{{ $logKeg->jamMasuk }}</td>
                                                            <td>
                                                                @if($logKeg->monitor == 'bagus')
                                                                <span class="badge badge-success">{{ $logKeg->monitor
                                                                    }}</span>
                                                                @elseif($logKeg->monitor == 'rusak')
                                                                <span class="badge badge-danger">{{ $logKeg->monitor
                                                                    }}</span>
                                                                @else
                                                                {{ $logKeg->monitor }}
                                                                @endif
                                                            </td>

                                                            <td>
                                                                @if($logKeg->keyboard == 'bagus')
                                                                <span class="badge badge-success">{{ $logKeg->keyboard
                                                                    }}</span>
                                                                @elseif($logKeg->keyboard == 'rusak')
                                                                <span class="badge badge-danger">{{ $logKeg->keyboard
                                                                    }}</span>
                                                                @else
                                                                {{ $logKeg->keyboard }}
                                                                @endif
                                                            </td>

                                                            <td>
                                                                @if($logKeg->mouse == 'bagus')
                                                                <span class="badge badge-success">{{ $logKeg->mouse
                                                                    }}</span>
                                                                @elseif($logKeg->mouse == 'rusak')
                                                                <span class="badge badge-danger">{{ $logKeg->mouse
                                                                    }}</span>
                                                                @else
                                                                {{ $logKeg->mouse }}
                                                                @endif
                                                            </td>

                                                            <td>
                                                                @if($logKeg->jaringan == 'bagus')
                                                                <span class="badge badge-success">{{ $logKeg->jaringan
                                                                    }}</span>
                                                                @elseif($logKeg->jaringan == 'rusak')
                                                                <span class="badge badge-danger">{{ $logKeg->jaringan
                                                                    }}</span>
                                                                @else
                                                                {{ $logKeg->jaringan }}
                                                                @endif
                                                            </td>
                                                            <td class="text-center">

                                                                <button type="button" class="btn btn-sm btn-info"
                                                                    data-toggle="modal"
                                                                    data-target="#viewModal{{ $logKeg->id_logkul }}"
                                                                    title="Detail">
                                                                    <i class="fa fa-eye"></i>
                                                                </button>
                                                                <form style="display: inline-block;"
                                                                    onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                                    action="{{ route('admin.destroy', $logKeg->id_logkul) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-sm btn-danger"
                                                                        title="Hapus">
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
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </section>
                @foreach ($data as $logKeg)
                <!-- Modal -->
                <div class="modal fade" id="viewModal{{ $logKeg->id_logkul }}" tabindex="-1" role="dialog"
                    aria-labelledby="viewModalLabel{{ $logKeg->id_logkul }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="viewModalLabel{{ $logKeg->id_logkul }}">View Details</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <p><strong>Nama:</strong> {{ $logKeg->nama }}</p>
                                        <p><strong>NIM:</strong> {{ $logKeg->nim }}</p>
                                        <p><strong>Kelas:</strong> {{ $logKeg->kelas }}</p>
                                        <p><strong>Nomor Pc:</strong> {{ $logKeg->pc }}</p>
                                        <p><strong>Ruang Lab:</strong> {{ $logKeg->ruang_lab }}</p>
                                        <p><strong>Mata Kuliah:</strong> {{ $logKeg->matkul }}</p>
                                        <p><strong>Dosen:</strong> {{ $logKeg->dosen }}</p>
                                        <p><strong>AIL:</strong> {{ $logKeg->ail }}</p>
                                    </div>
                                    <div class="col-md-4">
                                        <p><strong>Mouse:</strong> {{ $logKeg->mouse }}</p>
                                        <p><strong>Keyboard:</strong> {{ $logKeg->keyboard }}</p>
                                        <p><strong>Monitor:</strong> {{ $logKeg->monitor }}</p>
                                        <p><strong>Jaringan:</strong> {{ $logKeg->jaringan }}</p>
                                        <p><strong>Durasi:</strong> {{ $logKeg->durasi }} Menit</p>
                                    </div>
                                    <div class="col-md-4">
                                        <p><strong>Jam Masuk:</strong> {{ $logKeg->jamMasuk }}</p>
                                        <p><strong>Jam Keluar:</strong> {{ $logKeg->jamKeluar }}</p>
                                        <p><strong>Tanggal:</strong> {{ $logKeg->tanggal }}</p>
                                        <p><strong>Keterangan:</strong> {{ $logKeg->keterangan }}</p>
                                        <p><strong>Alat:</strong> {{ $logKeg->alat }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                                        <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                                            id="mini_sidebar_setting">
                                        <span class="custom-switch-indicator"></span>
                                        <span class="control-label p-l-10">Mini Sidebar</span>
                                    </label>
                                </div>
                            </div>
                            <div class="p-15 border-bottom">
                                <div class="theme-setting-options">
                                    <label class="m-b-0">
                                        <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                                            id="sticky_header_setting">
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
    <!-- Custom JS File -->
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script>
        $(document).ready(function () {
            // Handle logout link click
            $('a#logout-link').click(function (event) {
                event.preventDefault(); // Prevent default link behavior
                $('#logout-form').submit(); // Submit the form
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 1100
            });
        @elseif(session('error'))
        Swal.fire({
            icon: 'error',
            title: '{{ session('error') }}',
            showConfirmButton: false,
            timer: 1100
        });
        @endif
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
