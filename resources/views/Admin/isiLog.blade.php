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
	 <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>    
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
           
        }

        .custom-select:focus {
            border-color: #80bdff;
            outline: 0;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

      
        .select2-container .select2-selection--single .select2-selection__placeholder {
            margin-left: 15px;
            line-height: 3;
         
        }

       
        .select2-container .select2-selection--single .select2-selection__rendered {
            margin-left: 15px;
            line-height: 3;
            
        }

        
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            margin-left: 15px;
            padding-left: 0;
            line-height: 3;
            
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
                                <li><a class="nav-link" href="{{ route('admin.index') }}">Log Kuliah</a></li>
                                <li class="active"><a class="nav-link " href="{{ route('admin.create') }}">Isi
                                        Logbook</a></li>
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
                            <div class="col-12 col-md-12 col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Form Logbook Dosen</h4>
				    </div>
					<div class="card-body">
                                        <form action="{{ route('admin.store') }}" method="post">
                                            @csrf

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="nama">Nama:</label>
                                                        <input type="text" name="nama" id="nama" class="form-control"
                                                            value="{{ strtoupper(session('username'))}}">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="lab">Ruang Lab:</label>
                                                        <select name="lab" id="lab" class="form-control">
                                                            @foreach ($labs as $lab)
                                                            <option value="{{ $lab->id_lab }}">{{ $lab->ruang_lab }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="kelas">Kelas Yang Diampu:</label>
                                                            <select name="kelas" id="kelas" class="form-control custom-select">
                            
                                                            </select>
                                                        </div>
                                                </div>
                                                <div class="col-md-6">
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
                                                
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="sks">SKS:</label>
                                                        <input type="text" name="sks" id="sks" class="form-control"
                                                            value="{{ $matkulInfo->sks ?? '' }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="tanggal">Tanggal:</label>
                                                        <input type="date" name="tanggal" id="tanggal" class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="hadir">Hadir:</label>
                                                        <input type="text" name="hadir" id="hadir" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="tidakhadir">Tidak Hadir:</label>
                                                        <input type="text" name="tidakhadir" id="tidakhadir"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                        <label for="keterangan">Keterangan:</label>
                                                        <textarea name="keterangan" id="keterangan"
                                                            class="form-control"></textarea>
                                                    </div>
                                            

                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                    </div>
                                </div>

                                <div class="settingSidebar">
                                    <a href="javascript:void(0)" class="settingPanelToggle"> <i
                                            class="fa fa-spin fa-cog"></i>
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
                                                        <span class="selectgroup-button selectgroup-button-icon"
                                                            data-toggle="tooltip" data-original-title="Light Sidebar"><i
                                                                class="fas fa-sun"></i></span>
                                                    </label>
                                                    <label class="selectgroup-item">
                                                        <input type="radio" name="icon-input" value="2"
                                                            class="selectgroup-input select-sidebar" checked="">
                                                        <span class="selectgroup-button selectgroup-button-icon"
                                                            data-toggle="tooltip" data-original-title="Dark Sidebar"><i
                                                                class="fas fa-moon"></i></span>
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
                                                <a href="#"
                                                    class="btn btn-icon icon-left btn-primary btn-restore-theme">
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
            </div>
            </section>
        </div>

    </div>
    </div>
	 <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script src="{{ asset('assetsLanding/js/plugins/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assetsLanding/js/plugins/jquery.slick.min.js') }}"></script>
    <script src="{{ asset('assetsLanding/js/plugins/jquery.counter.min.js') }}"></script>
    <script src="{{ asset('assetsLanding/js/plugins/wow.min.js') }}"></script>
    <script src="{{ asset('assetsLanding/js/main.js') }}"></script>
    <!-- General JS Scripts -->
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
    <!-- JS Libraries -->
    <script src="{{ asset('assets/bundles/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <!-- Page Specific JS File -->
    <script src="{{ asset('assets/js/page/datatables.js') }}"></script>
    <!-- Template JS File -->
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <!-- Custom JS File -->
    

    <script>
        $(document).ready(function () {
            
            $('a#logout-link').click(function (event) {
                event.preventDefault(); 
                $('#logout-form').submit();
            });
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/js/select2.min.js"></script>
    <script>
        $(document).ready(function () {
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
                    processResults: function (data) {
                        return {
                            results: data
                        };
                    },
                    cache: true
                },
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $('#lab').on('change', function () {
            var labId = $(this).val();

	                if (labId) {
				                
				                $.ajax({
						                    type: 'GET',
									                        url: '/get-kelas-list/' + labId,
												                    success: function (data) {
															                            
															                            $('#kelas').empty();

																		                           
																		                            $('#kelas').append($('<option>', {
																					                                value: '',
																										                            text: 'Pilih Kelas'
																													                            }));

																		                            
																		                            $.each(data, function (key, value) {
																						                                $('#kelas').append($('<option>', {
																										                                value: value.id_kelas,
																															                                text: value.nama_kelas
																																			                            }));
																										                        });
																		                        },
																					                    error: function (xhr, status, error) {
																								                            console.error(xhr.responseText);
																											                        }
								                    });
						            } else {
								                    
								                    console.log('Pilih lab terlebih dahulu');
										                }
	            });

	        
	        $('#kelas').on('change', function () {
			        var labId = $('#lab').val();
				        var kelasId = $(this).val();

				        if (labId && kelasId) {
						           
						            $.ajax({
							                    type: 'GET',
										                    url: '/get-matkul-list/' + labId + '/' + kelasId,
												                    success: function (data) {
															                       
															                        $('#matkul').empty();

																		                    
																		                    $('#matkul').append($('<option>', {
																				                            value: '',
																								                            text: 'Pilih Matakuliah'
																											                        }));

																		                    
																		                    $.each(data, function (key, value) {
																					                            $('#matkul').append($('<option>', {
																								                                value: value.id_matakuliah,
																													                            text: value.matkul
																																                            }));
																								                        });
																		                },
																				                error: function (xhr, status, error) {
																							                    console.error(xhr.responseText);
																									                    }
									                });
							            } else {
									               
									                console.log('Pilih lab dan kelas terlebih dahulu');
											        }
					    });

	                
	                $('#matkul').on('change', function () {
				                var labId = $('#lab').val();
						                var selectedMatkul = $(this).val();

						                if (labId && selectedMatkul) {
									                 
									                    $.ajax({
											                            type: 'GET',
															                            url: '/get-matkul-info/' + labId + '/' + selectedMatkul,
																		                            success: function (data) {
																						                                console.log(data);
																										                            if (data) {
																														                                    $('#jamMasuk').val(data.jamMasuk);
																																		                                    $('#jamKeluar').val(data.jamKeluar);
																																		                                    $('#sks').val(data.sks);
																																						                                } else {
																																											                              
																																											                                console.log('Data matakuliah tidak ditemukan');
																																															                            }
																										                        },
																													                        error: function (xhr, status, error) {
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
