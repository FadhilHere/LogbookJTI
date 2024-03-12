<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log Kegiatan</title>
    <link rel="stylesheet" href="{{ asset('assetsLanding/css/plugins/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assetsLanding/css/plugins/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assetsLanding/css/plugins/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assetsLanding/css/style.css') }}">
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha384-rp5p/6u+HtYYeIwLthETeflCUdEcAl1z9vDZZQRHE8tvW6FQNK5IRG9e9GXs2QfP" crossorigin="anonymous">
    <style>
        /* body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: space-around;
            align-items: center;
            height: 100vh;
            margin: 0;
        } */

        body {
            margin-top: 0;
        }

        .cs-site_header {
            position: static;
        }

        h1 {
            font-weight: bold;
        }

        .main {
            display: flex;
            justify-content: center;
            /* align-items: center; */
            margin-top: 100px;
            min-height: 150vh;
            width: 100%;
            /* Ensure at least the height of the viewport */
        }

        .content-container {
            max-width: 1000px;
            width: 100%;
            padding: 20px;

            /* Tambahkan padding jika perlu */
            box-sizing: border-box;
        }

        .cs-site_header {
            margin-bottom: 0;
        }

        .custom-form-container {
            max-width: 1000px;
            width: 100%;
            padding: 20px;
            box-sizing: border-box;
            margin-top: 20px;
            /* Atur margin atas sesuai kebutuhan */
        }

        @media (max-width: 767px) {
            .content-container {
                margin-top: 0;
                /* Reset the top margin for smaller screens */
            }

        }
    </style>
</head>

<body>
    <div class="cs-preloader cs-white_bg cs-center" style="display: none;">
        <div class="cs-preloader_in" style="display: none;">
            <img src="{{ asset('assetsLanding/img/logo_mini.svg') }}" alt="Logo">
        </div>
    </div>

    <!-- Start Header Section -->
    <header class="cs-site_header cs-style1 cs-sticky-header cs-primary_color cs-white_bg">
        <div class="cs-main_header">
            <div class="container">
                <div class="cs-main_header_in">
                    <div class="cs-main_header_left">
                        <a class="cs-site_branding cs-accent_color" href="{{ url('/') }}">
                            <img src="{{ asset('Politeknik_Caltex_Riau.png') }}" alt="Logo"
                                style="width: 255px; height: auto;">
                        </a>
                    </div>
                    <div class="cs-main_header_center"></div>
                    <div class="cs-main_header_right">
                        <a href="{{ route('login') }}" class="cs-toolbox">
                            <span class="cs-btn cs-color1"><span>Login</span></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- <div class="col-md-6">
                <div class="card">
                    <h2>Peserta</h2>
                    <p>Informasi peserta kegiatan.</p>
                    <button type="button" class="btn btn-primary" data-toggle="modal"
                        data-target="#pesertaModal">Peserta</button>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <h2>PIC</h2>
                    <p>Informasi PIC kegiatan.</p>
                    <button type="button" class="btn btn-primary" data-toggle="modal"
                        data-target="#inputKegiatanModal">PIC</button>
                </div>
            </div> -->
    <div class="container">
        <div id="home">
            <div class="main">
                <section class="section">
                    <div class="section-body">

                        <div class="cs-seciton_heading cs-style1 text-center" style="margin-top: 55px;">

                            <div class="cs-height_10 cs-height_lg_10"></div>
                            <h3 class="cs-section_title">Persiapkan langkah pertamamu! Isi logbook sekarang sebelum
                                memulai kegiatan.</h3>
                        </div>
                        <div class="cs-height_50 cs-height_lg_40"></div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="cs-pricing_table cs-style1">
                                    <div class="cs-pricing_head">
                                        <div class="cs-pricing_heading">
                                            <div class="cs-pricing_icon cs-center">
                                                <img src="{{ asset('assetsLanding/img/icons/peserta.jpg') }}" alt="Icon"
                                                    data-pagespeed-url-hash="559393397"
                                                    onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                                            </div>
                                            <h2 class="cs-pricing_title cs-m0">Peserta</h2>
                                        </div>
                                    </div>
                                    <div class="cs-pricing_body">
                                        <p>Klik untuk mengisi logbook sebagai peserta.</p>
                                        <button type="button" class="btn btn-primary cs-size_md" data-toggle="modal"
                                            data-target="#pesertaModal">Peserta</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="cs-pricing_table cs-style1">
                                    <div class="cs-pricing_head">
                                        <div class="cs-pricing_heading">
                                            <div class="cs-pricing_icon cs-center">
                                                <img src="{{ asset('assetsLanding/img/icons/pic.jpg') }}" alt="Icon"
                                                    data-pagespeed-url-hash="1148393239"
                                                    onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                                            </div>
                                            <h2 class="cs-pricing_title cs-m0">PIC</h2>
                                        </div>
                                    </div>
                                    <div class="cs-pricing_body">
                                        <p>Klik untuk mengisi logbook sebagai PIC.</p>
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#inputKegiatanModal">PIC</button>
                                    </div>
                                </div>
                                <div class="cs-height_25 cs-height_lg_25"></div>
                            </div>
                        </div>
                        <div class="cs-height_75 cs-height_lg_45"></div>

                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="pesertaModal" tabindex="-1" role="dialog" aria-labelledby="pesertaModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pesertaModalLabel">Log Peserta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Form untuk menambah peserta -->
                    <form action="{{ route('Lkegiatan.store') }}" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="nama">Nama:</label>
                            <input type="text" name="nama" id="nama" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="nim">NIM/NIP:</label>
                            <input type="text" name="nim" id="nim" class="form-control"
                                placeholder="jika bukan civitas pcr tidak perlu di isi">
                        </div>
                        <div class="form-group">
                            <label for="kelas">Kelas:</label>
                            <input type="text" name="kelas" id="kelas" class="form-control"
                                placeholder="jika bukan civitas pcr tidak perlu di isi"></input>
                        </div>
                        <div class="form-group">
                            <label for="pc">Nomor PC:</label>
                            <select name="pc" id="pc" class="form-control">
                                @for ($i = 1; $i <= 40; $i++) <option value="{{ $i }}">
                                    {{ $i }}</option>
                                    @endfor
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="lab">Ruang Lab:</label>
                            <select name="lab" id="lab" class="form-control">
                                @foreach ($labs as $lab)
                                <option value="{{ $lab->id_lab }}">{{ $lab->ruang_lab }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <label for="tanggal">Tanggal:</label>
                                <input type="date" name="tanggal" id="tanggal" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jamMasuk">Jam Masuk:</label>
                                    <input type="time" name="jamMasuk" id="jamMasuk" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jamKeluar">Jam Keluar:</label>
                                    <input type="time" name="jamKeluar" id="jamKeluar" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <!-- Tambahkan opsi "bagus" atau "rusak" untuk monitor, keyboard, mouse, dan jaringan -->
                        <div class="form-row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Monitor:</label><br>
                                    <input type="radio" id="monitor_bagus" name="monitor" value="bagus" required>
                                    <label for="monitor_bagus">Bagus</label>

                                    <input type="radio" id="monitor_rusak" name="monitor" value="rusak">
                                    <label for="monitor_rusak">Rusak</label>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Keyboard:</label><br>
                                    <input type="radio" id="keyboard_bagus" name="keyboard" value="bagus" required>
                                    <label for="keyboard_bagus">Bagus</label>

                                    <input type="radio" id="keyboard_rusak" name="keyboard" value="rusak">
                                    <label for="keyboard_rusak">Rusak</label>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Mouse:</label><br>
                                    <input type="radio" id="mouse_bagus" name="mouse" value="bagus" required>
                                    <label for="mouse_bagus">Bagus</label>

                                    <input type="radio" id="mouse_rusak" name="mouse" value="rusak">
                                    <label for="mouse_rusak">Rusak</label>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Jaringan:</label><br>
                                    <input type="radio" id="jaringan_bagus" name="jaringan" value="bagus" required>
                                    <label for="jaringan_bagus">Bagus</label>

                                    <input type="radio" id="jaringan_rusak" name="jaringan" value="rusak">
                                    <label for="jaringan_rusak">Rusak</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="keterangan">Keterangan:</label>
                            <textarea name="keterangan" id="keterangan" class="form-control"
                                placeholder="Contoh: Kursi goyang, jaringan tidak stabil"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="alat">Alat:</label>
                            <input type="text" name="alat" id="alat" class="form-control"
                                placeholder="Contoh: Kabel LAN, Switch, Router">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="inputKegiatanModal" tabindex="-1" role="dialog"
        aria-labelledby="inputKegiatanModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="inputKegiatanModalLabel">Data PIC</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('Lkegiatan.storePIC') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="lab">Lab:</label>
                            <select name="lab" id="lab" class="form-control" required>
                                @foreach ($labs as $lab)
                                <option value="{{ $lab->id_lab }}">{{ $lab->ruang_lab }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama:</label>
                            <input type="text" name="nama" id="nama" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="nim">NIM/NIP:</label>
                            <input type="text" name="nim" id="nim" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="nohp">Nomor HP:</label>
                            <input type="text" name="nohp" id="nohp" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="kegiatan">Kegiatan:</label>
                            <input type="text" name="kegiatan" id="kegiatan" class="form-control"
                                placeholder="Contoh: Pelatihan Rutin UKM">
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="tanggalMulai">Tanggal Mulai:</label>
                                    <input type="date" name="tanggalMulai" id="tanggalMulai" class="form-control"
                                        required>
                                </div>
                                <div class="col-md-6">
                                    <label for="tanggalSelesai">Tanggal Selesai:</label>
                                    <input type="date" name="tanggalSelesai" id="tanggalSelesai" class="form-control"
                                        required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="jamMasuk">Jam Masuk:</label>
                                    <input type="time" name="jamMasuk" id="jamMasuk" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="jamKeluar">Jam Keluar:</label>
                                    <input type="time" name="jamKeluar" id="jamKeluar" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="peserta">Jumlah Peserta:</label>
                            <input type="number" name="peserta" id="peserta" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan:</label>
                            <textarea name="keterangan" id="keterangan" class="form-control"
                                placeholder="Contoh: Pelatihan Rutin UKM 2023/2024"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="alat">Alat:</label>
                            <input type="text" name="alat" id="alat" class="form-control"
                                placeholder="Contoh: Kabel LAN, Switch, Router">
                        </div>
                        <div class="form-group">
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

</body>


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
    // Mendapatkan elemen input tanggal berdasarkan ID
    var tanggalInput = document.getElementById('tanggal');

    // Mendapatkan tanggal saat ini
    var today = new Date();

    // Mendapatkan tahun, bulan, dan tanggal
    var year = today.getFullYear();
    var month = (today.getMonth() + 1).toString().padStart(2, '0'); // Tambah '0' di depan jika bulan < 10
    var day = today.getDate().toString().padStart(2, '0'); // Tambah '0' di depan jika tanggal < 10

    // Format tanggal untuk diisi ke input
    var formattedDate = year + '-' + month + '-' + day;

    // Mengatur nilai input tanggal dengan tanggal saat ini
    tanggalInput.value = formattedDate;
</script>

</html>
