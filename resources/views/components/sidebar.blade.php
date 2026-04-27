<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">

    {{-- Logo --}}
    <div class="app-sidebar-logo px-6" id="kt_app_sidebar_logo">
        <a href="/dashboard">
            <img alt="Logo" src="{{ asset('assets/media/logos/perpustakaan-dark.svg') }}" class="h-25px app-sidebar-logo-default" />
            <img alt="Logo" src="{{ asset('assets/media/logos/perpustakaan-small-dark.svg') }}" class="h-20px app-sidebar-logo-minimize" />
        </a>

        <div id="kt_app_sidebar_toggle" class="app-sidebar-toggle btn btn-icon btn-shadow btn-sm btn-color-muted btn-active-color-primary body-bg h-30px w-30px position-absolute top-50 start-100 translate-middle rotate" data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body" data-kt-toggle-name="app-sidebar-minimize">
            <i class="ki-duotone ki-double-left fs-2 rotate-180">
                <span class="path1"></span>
                <span class="path2"></span>
            </i>
        </div>
    </div>

    {{-- Menu --}}
    <div class="app-sidebar-menu overflow-hidden flex-column-fluid">
        <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer" data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true">
            <div class="menu menu-column menu-rounded menu-sub-indention fw-semibold px-3" id="#kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false">

                {{-- Heading: Menu Utama --}}
                <div class="menu-item pt-5">
                    <div class="menu-content">
                        <span class="menu-heading fw-bold text-uppercase fs-7">Menu Utama</span>
                    </div>
                </div>

                {{-- Dashboard --}}
                <div class="menu-item">
                    <a class="menu-link {{ request()->is('dashboard') ? 'active' : '' }}" href="/dashboard">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-element-11 fs-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                                <span class="path4"></span>
                            </i>
                        </span>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </div>

                {{-- Koleksi Buku --}}
                <div class="menu-item">
                    <a class="menu-link" href="#">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-book fs-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                                <span class="path4"></span>
                            </i>
                        </span>
                        <span class="menu-title">Koleksi Buku</span>
                    </a>
                </div>

                {{-- Heading: Master Data --}}
                <div class="menu-item pt-5">
                    <div class="menu-content">
                        <span class="menu-heading fw-bold text-uppercase fs-7">Master Data</span>
                    </div>
                </div>

                <div class="menu-item">
                    <a class="menu-link {{ request()->is('manajemen-buku') ? 'active' : '' }}" href="/manajemen-buku">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-book fs-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                                <span class="path4"></span>
                            </i>
                        </span>
                        <span class="menu-title">Manajemen Buku</span>
                    </a>
                </div>

                {{-- Manajemen Kategori --}}
                <div class="menu-item">
                    <a class="menu-link {{ request()->is('manajemen-kategori') ? 'active' : '' }}" href="/manajemen-kategori">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-category fs-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                                <span class="path4"></span>
                            </i>
                        </span>
                        <span class="menu-title">Manajemen Kategori</span>
                    </a>
                </div>

                {{-- Heading: Sirkulasi --}}
                <div class="menu-item pt-5">
                    <div class="menu-content">
                        <span class="menu-heading fw-bold text-uppercase fs-7">Sirkulasi</span>
                    </div>
                </div>

                {{-- Peminjaman --}}
                <div class="menu-item">
                    <a class="menu-link {{ request()->is('manajemen-peminjaman') ? 'active' : '' }}" href="/manajemen-peminjaman">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-handcart fs-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </span>
                        <span class="menu-title">Peminjaman</span>
                    </a>
                </div>

                {{-- Pengembalian --}}
                <div class="menu-item">
                    <a class="menu-link {{ request()->is('manajemen-pengembalian') ? 'active' : '' }}" href="/manajemen-pengembalian">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-arrows-loop fs-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </span>
                        <span class="menu-title">Pengembalian</span>
                    </a>
                </div>

                {{-- Heading: Pengguna --}}
                <div class="menu-item pt-5">
                    <div class="menu-content">
                        <span class="menu-heading fw-bold text-uppercase fs-7">Pengguna</span>
                    </div>
                </div>

                {{-- Anggota --}}
                <div class="menu-item">
                    <a class="menu-link {{ request()->is('manajemen-anggota') ? 'active' : '' }}" href="/manajemen-anggota">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-security-user fs-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </span>
                        <span class="menu-title">Petugas</span>
                    </a>
                </div>

                {{-- Petugas --}}
                <div class="menu-item">
                    <a class="menu-link {{ request()->is('manajemen-member') ? 'active' : '' }}" href="/manajemen-member">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-people fs-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                                <span class="path4"></span>
                                <span class="path5"></span>
                            </i>
                        </span>
                        
                        <span class="menu-title">Member</span>
                    </a>
                </div>

                {{-- Heading: Lainnya --}}
                <div class="menu-item pt-5">
                    <div class="menu-content">
                        <span class="menu-heading fw-bold text-uppercase fs-7">Lainnya</span>
                    </div>
                </div>

                {{-- Laporan --}}
                <div class="menu-item">
                    <a class="menu-link" href="#">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-graph-up fs-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                                <span class="path4"></span>
                                <span class="path5"></span>
                                <span class="path6"></span>
                            </i>
                        </span>
                        <span class="menu-title">Laporan</span>
                    </a>
                </div>

                {{-- Pengaturan --}}
                <div class="menu-item">
                    <a class="menu-link" href="#">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-setting-2 fs-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </span>
                        <span class="menu-title">Pengaturan</span>
                    </a>
                </div>

            </div>
        </div>
    </div>

    {{-- Footer --}}
    <div class="app-sidebar-footer flex-column-auto pt-2 pb-6 px-6" id="kt_app_sidebar_footer">
        <a href="#" class="btn btn-flex flex-center btn-custom btn-primary overflow-hidden text-nowrap px-0 h-40px w-100" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss-="click" title="Bantuan & Dukungan">
            <span class="btn-label">Butuh Bantuan?</span>
            <i class="ki-duotone ki-question-2 btn-icon fs-2 m-0 ms-2">
                <span class="path1"></span>
                <span class="path2"></span>
                <span class="path3"></span>
            </i>
        </a>
    </div>
</div>
