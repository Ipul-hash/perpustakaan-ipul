<!DOCTYPE html>
<html lang="id" data-bs-theme="light">
<script>
    (function() {
        const stored = localStorage.getItem('data-bs-theme');
        let theme = stored || 'light';
        if (theme === 'system') theme = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
        document.documentElement.setAttribute('data-bs-theme', theme);
    })();
</script>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — Perpustakaan</title>
    <meta name="description" content="Login ke Sistem Manajemen Perpustakaan">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <style>
        body {
            background-color: #ffffff;
        }
        .login-aside {
            background: linear-gradient(135deg, #1B1464 0%, #3E97FF 100%);
        }
        .login-aside-overlay {
            position: absolute;
            inset: 0;
            background: url("{{ asset('assets/media/misc/auth-bg.png') }}") center/cover no-repeat;
            opacity: 0.06;
            pointer-events: none;
        }
    </style>
</head>
<body id="kt_body" class="app-blank">

    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <div class="d-flex flex-column flex-lg-row flex-column-fluid">

            {{-- ========================================== --}}
            {{-- KIRI: Branding / Ilustrasi --}}
            {{-- ========================================== --}}
            <div class="d-flex flex-lg-row-fluid w-lg-50 login-aside position-relative order-2 order-lg-1">
                <div class="login-aside-overlay"></div>
                <div class="d-flex flex-column flex-center py-7 py-lg-15 px-5 px-md-15 w-100 position-relative">
                    {{-- Ilustrasi --}}
                    <img class="mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20" src="{{ asset('assets/media/illustrations/sketchy-1/2.png') }}" alt="Ilustrasi Login" />

                    {{-- Heading --}}
                    <h1 class="text-white fs-2qx fw-bold text-center mb-7">Sistem Perpustakaan</h1>

                    {{-- Deskripsi --}}
                    <div class="text-white text-opacity-75 fs-base text-center fw-semibold">
                        Kelola koleksi buku, anggota, dan sirkulasi perpustakaan<br />
                        dengan mudah dalam satu platform terpadu.
                    </div>
                </div>
            </div>

            {{-- ========================================== --}}
            {{-- KANAN: Form Login --}}
            {{-- ========================================== --}}
            <div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10 order-1 order-lg-2">
                <div class="d-flex flex-center flex-column flex-lg-row-fluid">
                    <div class="w-lg-500px p-10">

                        {{-- Header --}}
                        <form class="form w-100" novalidate="novalidate" id="form-login">
                            <div class="text-center mb-11">
                                <div class="mb-5">
                                    <img alt="Logo" src="{{ asset('assets/media/logos/default.svg') }}" class="h-40px" />
                                </div>
                                <h1 class="text-dark fw-bolder mb-3">Masuk ke Akun</h1>
                                <div class="text-gray-500 fw-semibold fs-6">Masukkan email dan password untuk melanjutkan</div>
                            </div>

                            {{-- Alert error (hidden by default) --}}
                            <div class="alert alert-danger d-none align-items-center p-5 mb-7" id="alert-error">
                                <i class="ki-duotone ki-shield-cross fs-2hx text-danger me-4">
                                    <span class="path1"></span><span class="path2"></span>
                                </i>
                                <div class="d-flex flex-column">
                                    <span class="fw-semibold" id="alert-error-text">Email atau password salah.</span>
                                </div>
                            </div>

                            {{-- Email --}}
                            <div class="fv-row mb-8">
                                <input type="text" placeholder="Email" name="email" id="input-email" autocomplete="off" class="form-control bg-transparent" />
                            </div>

                            {{-- Password --}}
                            <div class="fv-row mb-3">
                                <input type="password" placeholder="Password" name="password" id="input-password" autocomplete="off" class="form-control bg-transparent" />
                            </div>

                            {{-- Lupa Password --}}
                            <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
                                <div></div>
                                <a href="#" class="link-primary">Lupa Password?</a>
                            </div>

                            {{-- Tombol Submit --}}
                            <div class="d-grid mb-10">
                                <button type="submit" id="btn-login" class="btn btn-primary">
                                    <span class="indicator-label">Masuk</span>
                                    <span class="indicator-progress">Mohon tunggu...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                    </span>
                                </button>
                            </div>

                            {{-- Info akun --}}
                            <div class="text-gray-500 text-center fw-semibold fs-6">
                                Belum punya akun?
                                <a href="#" class="link-primary" id="btn-belum-akun">Hubungi Staff</a>
                            </div>
                        </form>

                    </div>
                </div>

                {{-- Footer --}}
                <div class="d-flex flex-center flex-wrap px-5">
                    <div class="d-flex fw-semibold text-primary fs-base gap-5">
                        <a href="#" class="text-muted text-hover-primary">Syarat & Ketentuan</a>
                        <a href="#" class="text-muted text-hover-primary">Kebijakan Privasi</a>
                        <a href="#" class="text-muted text-hover-primary">Bantuan</a>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const form      = document.getElementById('form-login');
        const btn       = document.getElementById('btn-login');
        const alertBox  = document.getElementById('alert-error');
        const alertText = document.getElementById('alert-error-text');

        form.addEventListener('submit', async function (e) {
            e.preventDefault();

            const email    = document.getElementById('input-email').value.trim();
            const password = document.getElementById('input-password').value;

            if (!email || !password) {
                showError('Email dan password wajib diisi.');
                return;
            }

            btn.setAttribute('data-kt-indicator', 'on');
            btn.disabled = true;
            alertBox.classList.add('d-none');

            try {
                const response = await fetch('/api/login', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({ email, password })
                });

                const json = await response.json();

                btn.removeAttribute('data-kt-indicator');
                btn.disabled = false;

                if (response.ok && json.success) {
                    localStorage.setItem('auth_token', json.data.token);
                    localStorage.setItem('user_data', JSON.stringify(json.data.user));
                    window.location.href = '/dashboard';
                } else {
                    showError(json.message || 'Email atau password salah.');
                }
            } catch (error) {
                btn.removeAttribute('data-kt-indicator');
                btn.disabled = false;
                showError('Terjadi kesalahan jaringan.');
            }
        });

        function showError(msg) {
            alertText.textContent = msg;
            alertBox.classList.remove('d-none');
            alertBox.classList.add('d-flex');
        }

        document.getElementById('btn-belum-akun').addEventListener('click', function (e) {
            e.preventDefault();
            Swal.fire({
                icon: 'info',
                title: 'Informasi Pendaftaran',
                html: 'Akun hanya dapat dibuat oleh <strong>staff perpustakaan</strong>.<br><br>Jika Anda belum memiliki akun, silakan hubungi staff perpustakaan untuk mendapatkan akun member Anda.',
                confirmButtonText: 'Mengerti',
                customClass: { confirmButton: 'btn btn-primary' },
            });
        });
    });
    </script>
</body>
</html>
