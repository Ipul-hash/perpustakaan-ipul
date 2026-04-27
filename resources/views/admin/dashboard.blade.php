<x-layout title="Dashboard — Perpustakaan">

    {{-- Toolbar --}}
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Dashboard</h1>
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <li class="breadcrumb-item text-muted">
                        <a href="/dashboard" class="text-muted text-hover-primary">Beranda</a>
                    </li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-muted">Dashboard</li>
                </ul>
            </div>
            <div class="d-flex align-items-center gap-2 gap-lg-3">
                <a href="#" class="btn btn-sm fw-bold btn-primary">
                    <i class="ki-duotone ki-plus fs-2"></i>
                    Tambah Buku
                </a>
            </div>
        </div>
    </div>

    {{-- Content --}}
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-fluid">

            {{-- Welcome Banner --}}
            <div class="card mb-5 mb-xl-10">
                <div class="card-body pt-9 pb-0">
                    <div class="d-flex flex-wrap flex-sm-nowrap">
                        <div class="me-7 mb-4">
                            <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                                <img src="{{ asset('assets/media/avatars/300-1.jpg') }}" alt="avatar" />
                                <div class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-body h-20px w-20px"></div>
                            </div>
                        </div>
                        <div class="flex-grow-1">
                            <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                <div class="d-flex flex-column">
                                    <div class="d-flex align-items-center mb-2">
                                        <a href="#" class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">Selamat Datang, Admin</a>
                                        <i class="ki-duotone ki-verify fs-1 text-primary">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </div>
                                    <div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">
                                        <a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                            <i class="ki-duotone ki-profile-circle fs-4 me-1">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                            </i>
                                            Pustakawan
                                        </a>
                                        <a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                            <i class="ki-duotone ki-geolocation fs-4 me-1">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                            Jakarta, Indonesia
                                        </a>
                                        <a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
                                            <i class="ki-duotone ki-sms fs-4 me-1">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                            admin@perpustakaan.id
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-wrap flex-stack">
                                <div class="d-flex flex-column flex-grow-1 pe-8">
                                    <div class="d-flex flex-wrap">
                                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                            <div class="d-flex align-items-center">
                                                <i class="ki-duotone ki-arrow-up fs-3 text-success me-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                                <div class="fs-2 fw-bold" data-kt-countup="true" data-kt-countup-value="42">0</div>
                                            </div>
                                            <div class="fw-semibold fs-6 text-gray-400">Pinjaman Aktif</div>
                                        </div>
                                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                            <div class="d-flex align-items-center">
                                                <i class="ki-duotone ki-arrow-down fs-3 text-danger me-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                                <div class="fs-2 fw-bold" data-kt-countup="true" data-kt-countup-value="7">0</div>
                                            </div>
                                            <div class="fw-semibold fs-6 text-gray-400">Terlambat</div>
                                        </div>
                                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                            <div class="d-flex align-items-center">
                                                <i class="ki-duotone ki-arrow-up fs-3 text-success me-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                                <div class="fs-2 fw-bold" data-kt-countup="true" data-kt-countup-value="128">0</div>
                                            </div>
                                            <div class="fw-semibold fs-6 text-gray-400">Dikembalikan Bulan Ini</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
                        <li class="nav-item mt-2">
                            <a class="nav-link text-active-primary ms-0 me-10 py-5 active" href="#">Ringkasan</a>
                        </li>
                        <li class="nav-item mt-2">
                            <a class="nav-link text-active-primary ms-0 me-10 py-5" href="#">Statistik</a>
                        </li>
                        <li class="nav-item mt-2">
                            <a class="nav-link text-active-primary ms-0 me-10 py-5" href="#">Aktivitas</a>
                        </li>
                    </ul>
                </div>
            </div>

            {{-- Stat Cards --}}
            <div class="row g-5 g-xl-8 mb-5 mb-xl-8">
                {{-- Total Buku --}}
                <div class="col-xl-3">
                    <a href="#" class="card bg-body hoverable card-xl-stretch mb-xl-8">
                        <div class="card-body">
                            <i class="ki-duotone ki-book text-primary fs-2hx ms-n1">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                                <span class="path4"></span>
                            </i>
                            <div class="text-gray-900 fw-bold fs-2 mb-2 mt-5">1,240</div>
                            <div class="fw-semibold text-gray-400">Total Buku</div>
                        </div>
                    </a>
                </div>

                {{-- Anggota --}}
                <div class="col-xl-3">
                    <a href="#" class="card bg-body hoverable card-xl-stretch mb-xl-8">
                        <div class="card-body">
                            <i class="ki-duotone ki-people text-success fs-2hx ms-n1">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                                <span class="path4"></span>
                                <span class="path5"></span>
                            </i>
                            <div class="text-gray-900 fw-bold fs-2 mb-2 mt-5">385</div>
                            <div class="fw-semibold text-gray-400">Anggota Terdaftar</div>
                        </div>
                    </a>
                </div>

                {{-- Sedang Dipinjam --}}
                <div class="col-xl-3">
                    <a href="#" class="card bg-body hoverable card-xl-stretch mb-xl-8">
                        <div class="card-body">
                            <i class="ki-duotone ki-handcart text-warning fs-2hx ms-n1">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                            <div class="text-gray-900 fw-bold fs-2 mb-2 mt-5">42</div>
                            <div class="fw-semibold text-gray-400">Sedang Dipinjam</div>
                        </div>
                    </a>
                </div>

                {{-- Buku Baru --}}
                <div class="col-xl-3">
                    <a href="#" class="card bg-body hoverable card-xl-stretch mb-xl-8">
                        <div class="card-body">
                            <i class="ki-duotone ki-chart-simple text-info fs-2hx ms-n1">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                                <span class="path4"></span>
                            </i>
                            <div class="text-gray-900 fw-bold fs-2 mb-2 mt-5">15</div>
                            <div class="fw-semibold text-gray-400">Buku Baru Bulan Ini</div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="row g-5 g-xl-8">
                {{-- Tabel Aktivitas Terkini --}}
                <div class="col-xl-8">
                    <div class="card card-xl-stretch mb-5 mb-xl-8">
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold fs-3 mb-1">Aktivitas Terkini</span>
                                <span class="text-muted mt-1 fw-semibold fs-7">Peminjaman & pengembalian terakhir</span>
                            </h3>
                            <div class="card-toolbar">
                                <ul class="nav">
                                    <li class="nav-item">
                                        <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light-primary active fw-bold px-4 me-1" data-bs-toggle="tab" href="#">Bulan</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light-primary fw-bold px-4 me-1" data-bs-toggle="tab" href="#">Minggu</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light-primary fw-bold px-4" data-bs-toggle="tab" href="#">Hari</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body py-3">
                            <div class="table-responsive">
                                <table class="table table-row-dashed table-row-gray-200 align-middle gs-0 gy-4">
                                    <thead>
                                        <tr class="border-0">
                                            <th class="p-0 w-50px"></th>
                                            <th class="p-0 min-w-150px"></th>
                                            <th class="p-0 min-w-140px"></th>
                                            <th class="p-0 min-w-110px"></th>
                                            <th class="p-0 min-w-50px"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="symbol symbol-45px me-2">
                                                    <span class="symbol-label">
                                                        <img src="{{ asset('assets/media/avatars/300-3.jpg') }}" class="h-50 align-self-center" alt="" />
                                                    </span>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="#" class="text-dark fw-bold text-hover-primary mb-1 fs-6">Budi Santoso</a>
                                                <span class="text-muted fw-semibold d-block">Anggota sejak 2023</span>
                                            </td>
                                            <td class="text-end text-muted fw-semibold">Laskar Pelangi</td>
                                            <td class="text-end">
                                                <span class="badge badge-light-success">Meminjam</span>
                                            </td>
                                            <td class="text-end">
                                                <span class="text-muted fw-semibold">10 menit lalu</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="symbol symbol-45px me-2">
                                                    <span class="symbol-label">
                                                        <img src="{{ asset('assets/media/avatars/300-5.jpg') }}" class="h-50 align-self-center" alt="" />
                                                    </span>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="#" class="text-dark fw-bold text-hover-primary mb-1 fs-6">Siti Aminah</a>
                                                <span class="text-muted fw-semibold d-block">Anggota sejak 2022</span>
                                            </td>
                                            <td class="text-end text-muted fw-semibold">Bumi Manusia</td>
                                            <td class="text-end">
                                                <span class="badge badge-light-primary">Mengembalikan</span>
                                            </td>
                                            <td class="text-end">
                                                <span class="text-muted fw-semibold">1 jam lalu</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="symbol symbol-45px me-2">
                                                    <span class="symbol-label">
                                                        <img src="{{ asset('assets/media/avatars/300-12.jpg') }}" class="h-50 align-self-center" alt="" />
                                                    </span>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="#" class="text-dark fw-bold text-hover-primary mb-1 fs-6">Andi Susanto</a>
                                                <span class="text-muted fw-semibold d-block">Anggota baru</span>
                                            </td>
                                            <td class="text-end text-muted fw-semibold">Filosofi Teras</td>
                                            <td class="text-end">
                                                <span class="badge badge-light-warning">Meminjam</span>
                                            </td>
                                            <td class="text-end">
                                                <span class="text-muted fw-semibold">3 jam lalu</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="symbol symbol-45px me-2">
                                                    <span class="symbol-label">
                                                        <img src="{{ asset('assets/media/avatars/300-20.jpg') }}" class="h-50 align-self-center" alt="" />
                                                    </span>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="#" class="text-dark fw-bold text-hover-primary mb-1 fs-6">Dewi Lestari</a>
                                                <span class="text-muted fw-semibold d-block">Anggota sejak 2021</span>
                                            </td>
                                            <td class="text-end text-muted fw-semibold">Supernova</td>
                                            <td class="text-end">
                                                <span class="badge badge-light-danger">Terlambat</span>
                                            </td>
                                            <td class="text-end">
                                                <span class="text-muted fw-semibold">Kemarin</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="symbol symbol-45px me-2">
                                                    <span class="symbol-label">
                                                        <img src="{{ asset('assets/media/avatars/300-23.jpg') }}" class="h-50 align-self-center" alt="" />
                                                    </span>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="#" class="text-dark fw-bold text-hover-primary mb-1 fs-6">Rizky Pratama</a>
                                                <span class="text-muted fw-semibold d-block">Anggota sejak 2024</span>
                                            </td>
                                            <td class="text-end text-muted fw-semibold">Atomic Habits</td>
                                            <td class="text-end">
                                                <span class="badge badge-light-primary">Mengembalikan</span>
                                            </td>
                                            <td class="text-end">
                                                <span class="text-muted fw-semibold">Kemarin</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Sidebar kanan: Buku Populer --}}
                <div class="col-xl-4">
                    {{-- Buku Populer --}}
                    <div class="card card-xl-stretch mb-5 mb-xl-8">
                        <div class="card-header border-0">
                            <h3 class="card-title fw-bold text-dark">Buku Paling Diminati</h3>
                            <div class="card-toolbar">
                                <button type="button" class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                    <i class="ki-duotone ki-category fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                        <span class="path4"></span>
                                    </i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="d-flex align-items-center bg-light-warning rounded p-5 mb-7">
                                <span class="svg-icon svg-icon-warning me-5">
                                    <i class="ki-duotone ki-book-open fs-1 text-warning">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                        <span class="path4"></span>
                                    </i>
                                </span>
                                <div class="flex-grow-1 me-2">
                                    <a href="#" class="fw-bold text-gray-800 text-hover-primary fs-6">Laskar Pelangi</a>
                                    <span class="text-muted fw-semibold d-block">Andrea Hirata</span>
                                </div>
                                <span class="fw-bold text-warning py-1">32x</span>
                            </div>
                            <div class="d-flex align-items-center bg-light-success rounded p-5 mb-7">
                                <span class="svg-icon svg-icon-success me-5">
                                    <i class="ki-duotone ki-book-open fs-1 text-success">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                        <span class="path4"></span>
                                    </i>
                                </span>
                                <div class="flex-grow-1 me-2">
                                    <a href="#" class="fw-bold text-gray-800 text-hover-primary fs-6">Bumi Manusia</a>
                                    <span class="text-muted fw-semibold d-block">Pramoedya A. Toer</span>
                                </div>
                                <span class="fw-bold text-success py-1">28x</span>
                            </div>
                            <div class="d-flex align-items-center bg-light-primary rounded p-5 mb-7">
                                <span class="svg-icon svg-icon-primary me-5">
                                    <i class="ki-duotone ki-book-open fs-1 text-primary">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                        <span class="path4"></span>
                                    </i>
                                </span>
                                <div class="flex-grow-1 me-2">
                                    <a href="#" class="fw-bold text-gray-800 text-hover-primary fs-6">Filosofi Teras</a>
                                    <span class="text-muted fw-semibold d-block">Henry Manampiring</span>
                                </div>
                                <span class="fw-bold text-primary py-1">24x</span>
                            </div>
                            <div class="d-flex align-items-center bg-light-danger rounded p-5 mb-7">
                                <span class="svg-icon svg-icon-danger me-5">
                                    <i class="ki-duotone ki-book-open fs-1 text-danger">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                        <span class="path4"></span>
                                    </i>
                                </span>
                                <div class="flex-grow-1 me-2">
                                    <a href="#" class="fw-bold text-gray-800 text-hover-primary fs-6">Atomic Habits</a>
                                    <span class="text-muted fw-semibold d-block">James Clear</span>
                                </div>
                                <span class="fw-bold text-danger py-1">21x</span>
                            </div>
                            <div class="d-flex align-items-center bg-light-info rounded p-5">
                                <span class="svg-icon svg-icon-info me-5">
                                    <i class="ki-duotone ki-book-open fs-1 text-info">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                        <span class="path4"></span>
                                    </i>
                                </span>
                                <div class="flex-grow-1 me-2">
                                    <a href="#" class="fw-bold text-gray-800 text-hover-primary fs-6">Supernova</a>
                                    <span class="text-muted fw-semibold d-block">Dee Lestari</span>
                                </div>
                                <span class="fw-bold text-info py-1">18x</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-layout>
