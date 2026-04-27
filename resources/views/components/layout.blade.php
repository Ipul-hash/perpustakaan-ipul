<!DOCTYPE html>
<html lang="id" data-bs-theme="light">
<script>
    // Terapin tema sebelum halaman kerender biar ga flash putih/hitam
    (function() {
        const stored = localStorage.getItem('data-bs-theme');
        let theme = stored || 'light';

        if (theme === 'system') {
            theme = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
        }

        document.documentElement.setAttribute('data-bs-theme', theme);
    })();
</script>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Perpustakaan' }}</title>
    <meta name="description" content="Sistem Manajemen Perpustakaan">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />

    <!-- Global Stylesheets Bundle -->
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
</head>
<body id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" class="app-default">

    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <div class="app-page flex-column flex-column-fluid" id="kt_app_page">

            {{-- ============ HEADER ============ --}}
            <div id="kt_app_header" class="app-header">
                <div class="app-container container-fluid d-flex align-items-stretch justify-content-between" id="kt_app_header_container">

                    {{-- Mobile sidebar toggle --}}
                    <div class="d-flex align-items-center d-lg-none ms-n3 me-1" title="Show sidebar menu">
                        <div class="btn btn-icon btn-active-color-primary w-35px h-35px" id="kt_app_sidebar_mobile_toggle">
                            <i class="ki-duotone ki-abstract-14 fs-2hx">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </div>
                    </div>

                    {{-- Mobile logo --}}
                    <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
                        <a href="/dashboard" class="d-lg-none">
                            <img alt="Logo" src="{{ asset('assets/media/logos/default-small.svg') }}" class="h-30px" />
                        </a>
                    </div>

                    {{-- Header wrapper --}}
                    <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1" id="kt_app_header_wrapper">
                        {{-- Header menu --}}
                        <div class="app-header-menu app-header-mobile-drawer align-items-stretch" data-kt-drawer="true" data-kt-drawer-name="app-header-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="250px" data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_app_header_menu_toggle" data-kt-swapper="true" data-kt-swapper-mode="{default: 'append', lg: 'prepend'}" data-kt-swapper-parent="{default: '#kt_app_body', lg: '#kt_app_header_wrapper'}">
                        </div>

                        {{-- Navbar --}}
                        <div class="app-navbar flex-shrink-0">
                            {{-- Search --}}
                            <div class="app-navbar-item d-flex align-items-center ms-1 ms-md-3">
                                <div class="btn btn-icon btn-custom btn-icon-muted btn-active-light btn-active-color-primary w-35px h-35px w-md-40px h-md-40px">
                                    <i class="ki-duotone ki-magnifier fs-1">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </div>
                            </div>

                            {{-- Notifications --}}
                            <div class="app-navbar-item ms-1 ms-md-3">
                                <div class="btn btn-icon btn-custom btn-icon-muted btn-active-light btn-active-color-primary w-35px h-35px w-md-40px h-md-40px position-relative">
                                    <i class="ki-duotone ki-notification-status fs-1">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                        <span class="path4"></span>
                                    </i>
                                </div>
                            </div>

                            {{-- Theme toggle --}}
                            <x-theme-toggle />

                            {{-- User avatar --}}
                            <div class="app-navbar-item ms-1 ms-md-3" id="kt_header_user_menu_toggle">
                                <div class="cursor-pointer symbol symbol-35px symbol-md-40px" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                                    <img src="{{ asset('assets/media/avatars/300-1.jpg') }}" alt="user" />
                                </div>

                                {{-- User dropdown --}}
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px" data-kt-menu="true">
                                    <div class="menu-item px-3">
                                        <div class="menu-content d-flex align-items-center px-3">
                                            <div class="symbol symbol-50px me-5">
                                                <img alt="Avatar" src="{{ asset('assets/media/avatars/300-1.jpg') }}" />
                                            </div>
                                            <div class="d-flex flex-column">
                                                <div class="fw-bold d-flex align-items-center fs-5">Admin Perpustakaan</div>
                                                <a href="#" class="fw-semibold text-muted text-hover-primary fs-7">admin@perpustakaan.id</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="separator my-2"></div>
                                    <div class="menu-item px-5">
                                        <a href="#" class="menu-link px-5">Profil Saya</a>
                                    </div>
                                    <div class="menu-item px-5">
                                        <a href="#" class="menu-link px-5">Keluar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ============ WRAPPER ============ --}}
            <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
                <x-sidebar />

                <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                    <div class="d-flex flex-column flex-column-fluid">
                        {{ $slot }}
                    </div>

                    {{-- Footer --}}
                    <div id="kt_app_footer" class="app-footer">
                        <div class="app-container container-fluid d-flex flex-column flex-md-row flex-center flex-md-stack py-3">
                            <div class="text-dark order-2 order-md-1">
                                <span class="text-muted fw-semibold me-1">2024 &copy;</span>
                                <a href="#" class="text-gray-800 text-hover-primary">Perpustakaan</a>
                            </div>
                            <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
                                <li class="menu-item"><a href="#" class="menu-link px-2">Tentang</a></li>
                                <li class="menu-item"><a href="#" class="menu-link px-2">Bantuan</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Global Javascript Bundle -->
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>

    <!-- Theme Switcher -->
    <script>
    (function() {
        const THEME_KEY = 'data-bs-theme';
        const htmlEl = document.documentElement;

        function getSystemTheme() {
            return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
        }

        function applyTheme(mode) {
            const actual = mode === 'system' ? getSystemTheme() : mode;
            htmlEl.setAttribute('data-bs-theme', actual);
            updateToggleUI(mode);
        }

        function updateToggleUI(mode) {
            // Toggle icon di tombol utama
            document.querySelectorAll('.theme-light-show').forEach(el => {
                el.style.display = (mode === 'dark') ? 'none' : '';
            });
            document.querySelectorAll('.theme-dark-show').forEach(el => {
                el.style.display = (mode === 'dark') ? '' : 'none';
            });

            // Active state di dropdown
            document.querySelectorAll('[data-kt-element="mode"]').forEach(el => {
                el.classList.remove('active');
                if (el.getAttribute('data-kt-value') === mode) {
                    el.classList.add('active');
                }
            });
        }

        // Init
        const stored = localStorage.getItem(THEME_KEY) || 'light';
        applyTheme(stored);

        // Klik menu dropdown
        document.querySelectorAll('[data-kt-element="mode"]').forEach(el => {
            el.addEventListener('click', function(e) {
                e.preventDefault();
                const mode = this.getAttribute('data-kt-value');
                localStorage.setItem(THEME_KEY, mode);
                applyTheme(mode);
            });
        });

        // Kalau user pilih "System", ikutin perubahan OS
        window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
            if (localStorage.getItem(THEME_KEY) === 'system') {
                applyTheme('system');
            }
        });
    })();
    </script>

    @stack('scripts')
</body>
</html>
