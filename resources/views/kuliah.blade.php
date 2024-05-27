<html class="no-js" lang="en">

<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="ThemeMarch">
    <!-- Favicon Icon -->
    <link rel="icon" href="assets/img/favicon.png">
    <!-- Site Title -->
    <title>Logbook</title>
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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <style>
        body {
            margin-top: 0;

            /* height: 100vh; */
            /* display: flex; */
            align-items: center;
            justify-content: center;
            /* color: #fff; */
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

        .custom-select {
            width: 100%;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            text-align: center;
            /* Teks di tengah dropdown */
        }

        .custom-select:focus {
            border-color: #80bdff;
            outline: 0;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        .custom-select2 {
            width: 100%;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            /* text-align: center; */
            /* Teks di tengah dropdown */
        }

        .custom-select2:focus {
            border-color: #80bdff;
            outline: 0;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        /* Untuk teks placeholder yang ada di tengah dropdown */
        .select2-container .select2-selection--single .select2-selection__placeholder {
            margin-left: 15px;
            line-height: 3;
            /* Sesuaikan nilai line-height sesuai kebutuhan */
        }

        /* Teks hasil seleksi di tengah dropdown */
        .select2-container .select2-selection--single .select2-selection__rendered {
            margin-left: 15px;
            line-height: 3;
            /* Sesuaikan nilai line-height sesuai kebutuhan */
        }

        /* Pastikan placeholder tidak muncul sebagai hasil seleksi */
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            margin-left: 15px;
            padding-left: 0;
            line-height: 3;
            /* Sesuaikan nilai line-height sesuai kebutuhan */
        }
    </style>

</head>

<body>
    <div class="cs-preloader cs-white_bg cs-center" style="display: none;">
        <div class="cs-preloader_in" style="display: none;">
            <img src="{{ asset('assetsLanding/img/logo_mini.svg') }}" alt="Logo">
        </div>
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
                    <div class="cs-main_header_center">
                    </div>
                    <div class="cs-main_header_right">
                        <a href="{{ route('login') }}" class="cs-toolbox">
                            <span class="cs-btn cs-color1"><span>Login</span></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div id="home">
        <!-- <section class="cs-bg" data-src="{{ asset('assetsLanding/img/latarAbu.jpg') }}" id="pricing"
            style="background-image: url('{{ asset('assetsLanding/img/latarAbu.jpg') }}');">
        </section> -->
        <div class="main">
            <div class="custom-form-container">
                <section class="section">
                    <div class="section-body">
                        <div class="row">
                            <div class="col-12 col-md-12 col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Form Perkuliahan</h4>

                                    </div>
                                    <div class="card-body">
                                        <form action="{{ route('kuliah.store') }}" method="post">
                                            <div class="alert alert-danger" id="alertJamMasuk" style="display:none;">
                                                Belum waktunya masuk kelas!
                                            </div>
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="nama">Nama kamuh:</label>
                                                        <input type="text" name="nama" id="nama"
                                                            class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="nim">Nim:</label>
                                                        <input type="text" name="nim" id="nim"
                                                            class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="pc">Nomor PC:</label>
                                                        <div class="position-relative">
                                                            <select name="pc" id="pc"
                                                                class="form-control custom-select2">
                                                                @for ($i = 1; $i <= 40; $i++)
                                                                    <option value="{{ $i }}">
                                                                        {{ $i }}</option>
                                                                @endfor
                                                            </select>
                                                            <span
                                                                class="position-absolute top-50 end-0 translate-middle-y mr-2">
                                                                <i class="fas fa-chevron-down"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="loker">No Loker:</label>
                                                        <div class="position-relative">
                                                            <select name="loker"
                                                                class="form-control custom-select2">
                                                                <option value="" disabled selected hidden>Nomor
                                                                    Loker</option>
                                                                @for ($i = 1; $i <= 40; $i++)
                                                                    <option value="{{ $i }}">
                                                                        {{ $i }}</option>
                                                                @endfor
                                                            </select>
                                                            <span
                                                                class="position-absolute top-50 end-0 translate-middle-y mr-2">
                                                                <i class="fas fa-chevron-down"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="lab">Ruang Lab:</label>
                                                        <select name="lab" id="lab" class="form-control">
                                                            <option value="" selected disabled>Pilih Lab</option>
                                                            @foreach ($labs as $lab)
                                                                <option value="{{ $lab->id_lab }}">
                                                                    {{ $lab->ruang_lab }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="kelas">Kelas:</label>
                                                        <select name="kelas" id="kelas"
                                                            class="form-control custom-select" disabled>
                                                        </select>
                                                    </div>
                                                </div>


                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="tanggal">Tanggal:</label>
                                                        <input type="date" name="tanggal" id="tanggal"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="matkul">Matakuliah:</label>
                                                        <select name="matkul" id="matkul" class="form-control">
                                                            <option value="">Pilih Matakuliah</option>
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="dosen">Dosen:</label>
                                                        <input type="text" name="dosen" id="dosen"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="ail">AIL:</label>
                                                        <input type="text" name="ail" id="ail"
                                                            class="form-control">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="jamMasuk">Jam Masuk:</label>
                                                        <input type="time" name="jamMasuk" id="jamMasuk"
                                                            class="form-control"
                                                            value="{{ $matkulInfo->jamMasuk ?? '' }}">
                                                    </div>
                                                </div>


                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="jamKeluar">Jam Keluar:</label>
                                                        <input type="time" name="jamKeluar" id="jamKeluar"
                                                            class="form-control"
                                                            value="{{ $matkulInfo->jamKeluar ?? '' }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">

                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="monitor">Monitor:</label>
                                                        <div>
                                                            <label class="mr-2">
                                                                <input type="radio" name="monitor" value="bagus">
                                                                Bagus
                                                            </label>
                                                            <label>
                                                                <input type="radio" name="monitor" value="rusak">
                                                                Rusak
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="keyboard">Keyboard:</label>
                                                        <div>
                                                            <label class="mr-2">
                                                                <input type="radio" name="keyboard" value="bagus">
                                                                Bagus
                                                            </label>
                                                            <label>
                                                                <input type="radio" name="keyboard" value="rusak">
                                                                Rusak
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="mouse">Mouse:</label>
                                                        <div>
                                                            <label class="mr-2">
                                                                <input type="radio" name="mouse" value="bagus">
                                                                Bagus
                                                            </label>
                                                            <label>
                                                                <input type="radio" name="mouse" value="rusak">
                                                                Rusak
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="jaringan">Jaringan:</label>
                                                        <div>
                                                            <label class="mr-2">
                                                                <input type="radio" name="jaringan" value="bagus">
                                                                Bagus
                                                            </label>
                                                            <label>
                                                                <input type="radio" name="jaringan" value="rusak">
                                                                Rusak
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="keterangan">Keterangan:</label>
                                                        <textarea name="keterangan" id="keterangan" class="form-control"
                                                            placeholder="Contoh: Kursi goyang, jaringan tidak stabil"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="alat">Alat:</label>
                                                        <input type="text" name="alat" id="alat"
                                                            class="form-control"
                                                            placeholder="Contoh: Kabel LAN, Switch, Router">
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
            </div>

        </div>
    </div>

    <!-- Script -->
    <script src="{{ asset('assetsLanding/js/plugins/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assetsLanding/js/plugins/jquery.slick.min.js') }}"></script>
    <script src="{{ asset('assetsLanding/js/plugins/jquery.counter.min.js') }}"></script>
    <script src="{{ asset('assetsLanding/js/plugins/wow.min.js') }}"></script>
    <script src="{{ asset('assetsLanding/js/main.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/js/select2.min.js"></script>


    <script>
        $(document).ready(function() {

            $('#kelas').select2({
                placeholder: 'Pilih kelas',
                allowClear: true,
                width: '100%',
                dropdownAutoWidth: true,
                minimumInputLength: 0,
                ajax: {
                    url: '/get-kelas-data',
                    dataType: 'json',
                    delay: 250,
                    processResults: function(data) {
                        return {
                            results: data
                        };
                    },
                    cache: true
                },
            });
            $('#kelas').prop('disabled', true);
            $('#lab').change(function() {
                var labId = $(this).val();
                if (labId) {
                    $('#kelas').prop('disabled', false);
                } else {
                    $('#kelas').prop('disabled', true);
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#lab').on('change', function() {
                var labId = $(this).val();

                if (labId) {

                    $.ajax({
                        type: 'GET',
                        url: '/get-kelas-list/' + labId,
                        success: function(data) {

                            $('#kelas').empty();


                            $('#kelas').append($('<option>', {
                                value: '',
                                text: 'Pilih Kelas'
                            }));


                            $.each(data, function(key, value) {
                                $('#kelas').append($('<option>', {
                                    value: value.id_kelas,
                                    text: value.nama_kelas
                                }));
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                } else {

                    console.log('Pilih lab terlebih dahulu');
                }
            });


            $('#kelas').on('change', function() {
                var labId = $('#lab').val();
                var kelasId = $(this).val();

                if (labId && kelasId) {

                    $.ajax({
                        type: 'GET',
                        url: '/get-matkul-list/' + labId + '/' + kelasId,
                        success: function(data) {

                            $('#matkul').empty();


                            $('#matkul').append($('<option>', {
                                value: '',
                                text: 'Pilih Matakuliah'
                            }));


                            $.each(data, function(key, value) {
                                $('#matkul').append($('<option>', {
                                    value: value.id_matakuliah,
                                    text: value.matkul
                                }));
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                } else {

                    console.log('Pilih lab dan kelas terlebih dahulu');
                }
            });

            $('#matkul').on('change', function() {
                var labId = $('#lab').val();
                var selectedMatkul = $(this).val();

                if (labId && selectedMatkul) {

                    $.ajax({
                        type: 'GET',
                        url: '/get-matkul-info/' + labId + '/' + selectedMatkul,
                        success: function(data) {
                            console.log(data);
                            if (data) {
                                $('#jamMasuk').val(data.jamMasuk);
                                $('#jamKeluar').val(data.jamKeluar);
                                $('#sks').val(data.sks);
                                $('#dosen').val(data.dosen);
                                $('#ail').val(data.ail);

                                var jamMasuk = data.jamMasuk;
                                var jamKeluar = data.jamKeluar;


                                var saatIni = new Date();
                                var jamSekarang = saatIni.getHours() + ':' + (saatIni
                                    .getMinutes() < 10 ? '0' : '') + saatIni.getMinutes();


                                var jamMasukSplit = jamMasuk.split(':');
                                var jamKeluarSplit = jamKeluar.split(':');
                                var jamSekarangSplit = jamSekarang.split(':');


                                var jamMasukDate = new Date(0, 0, 0, jamMasukSplit[0],
                                    jamMasukSplit[1], 0);
                                var jamKeluarDate = new Date(0, 0, 0, jamKeluarSplit[0],
                                    jamKeluarSplit[1], 0);
                                var jamSekarangDate = new Date(0, 0, 0, jamSekarangSplit[0],
                                    jamSekarangSplit[1], 0);


                                if (jamSekarangDate < jamMasukDate || jamSekarangDate >=
                                    jamKeluarDate) {
                                    $('#alertJamMasuk').show();
                                } else {
                                    $('#alertJamMasuk').hide();
                                }

                            } else {

                                console.log('Data matakuliah tidak ditemukan');
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });

                } else {

                    console.log('Pilih lab dan matkul terlebih dahulu');
                }
            });
        });
    </script>

    <script>
        var tanggalInput = document.getElementById('tanggal');


        var today = new Date();


        var year = today.getFullYear();
        var month = (today.getMonth() + 1).toString().padStart(2, '0');
        var day = today.getDate().toString().padStart(2, '0');

        var formattedDate = year + '-' + month + '-' + day;


        tanggalInput.value = formattedDate;
    </script>


</body>

</html>
