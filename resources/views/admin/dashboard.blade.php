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
                <a href="/manajemen-buku" class="btn btn-sm fw-bold btn-primary">
                    <i class="ki-duotone ki-plus fs-2"></i>
                    Manajemen Buku
                </a>
            </div>
        </div>
    </div>

    {{-- Content --}}
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-fluid">

            {{-- Welcome Banner --}}
            <div class="card mb-5 mb-xl-10 border-0 shadow-sm">
                <div class="card-body pt-9 pb-0">
                    <div class="d-flex flex-wrap flex-sm-nowrap">
                        <div class="me-7 mb-4">
                            <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                                <div class="symbol-label fs-1 bg-light-primary text-primary fw-bolder" id="profile-initial">?</div>
                                <div class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-body h-20px w-20px"></div>
                            </div>
                        </div>
                        <div class="flex-grow-1">
                            <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                <div class="d-flex flex-column">
                                    <div class="d-flex align-items-center mb-2">
                                        <a href="#" class="text-gray-900 text-hover-primary fs-2 fw-bold me-1" id="profile-name">Memuat...</a>
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
                                            <span id="profile-role">Admin</span>
                                        </a>
                                        <a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
                                            <i class="ki-duotone ki-sms fs-4 me-1">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                            <span id="profile-email">admin@perpustakaan.id</span>
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
                                                <div class="fs-2 fw-bold" id="stat-active-loans">0</div>
                                            </div>
                                            <div class="fw-semibold fs-6 text-gray-400">Pinjaman Aktif</div>
                                        </div>
                                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                            <div class="d-flex align-items-center">
                                                <i class="ki-duotone ki-arrow-down fs-3 text-danger me-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                                <div class="fs-2 fw-bold" id="stat-overdue-loans">0</div>
                                            </div>
                                            <div class="fw-semibold fs-6 text-gray-400">Terlambat</div>
                                        </div>
                                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                            <div class="d-flex align-items-center">
                                                <i class="ki-duotone ki-time fs-3 text-warning me-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                                <div class="fs-2 fw-bold" id="stat-pending-loans">0</div>
                                            </div>
                                            <div class="fw-semibold fs-6 text-gray-400">Menunggu Approval</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold mt-5">
                        <li class="nav-item">
                            <a class="nav-link text-active-primary ms-0 me-10 py-5 active" href="#">Ringkasan</a>
                        </li>
                    </ul>
                </div>
            </div>

            {{-- Stat Cards --}}
            <div class="row g-5 g-xl-8 mb-5 mb-xl-8">
                {{-- Total Buku --}}
                <div class="col-xl-6">
                    <a href="/manajemen-buku" class="card bg-light-primary hoverable card-xl-stretch mb-xl-8 border-0">
                        <div class="card-body">
                            <i class="ki-duotone ki-book text-primary fs-2hx ms-n1">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                                <span class="path4"></span>
                            </i>
                            <div class="text-gray-900 fw-bold fs-2 mb-2 mt-5" id="stat-total-books">0</div>
                            <div class="fw-semibold text-gray-600">Total Buku Terdaftar</div>
                        </div>
                    </a>
                </div>

                {{-- Anggota --}}
                <div class="col-xl-6">
                    <a href="/manajemen-member" class="card bg-light-success hoverable card-xl-stretch mb-xl-8 border-0">
                        <div class="card-body">
                            <i class="ki-duotone ki-people text-success fs-2hx ms-n1">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                                <span class="path4"></span>
                                <span class="path5"></span>
                            </i>
                            <div class="text-gray-900 fw-bold fs-2 mb-2 mt-5" id="stat-total-members">0</div>
                            <div class="fw-semibold text-gray-600">Anggota Terdaftar</div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="row g-5 g-xl-8">
                {{-- Tabel Aktivitas Terkini --}}
                <div class="col-xl-8">
                    <div class="card card-xl-stretch mb-5 mb-xl-8 border-0 shadow-sm">
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold fs-3 mb-1">Aktivitas Terkini</span>
                                <span class="text-muted mt-1 fw-semibold fs-7">Peminjaman terakhir di sistem</span>
                            </h3>
                        </div>
                        <div class="card-body py-3">
                            <div class="table-responsive">
                                <table class="table table-row-dashed table-row-gray-200 align-middle gs-0 gy-4">
                                    <thead>
                                        <tr class="border-0">
                                            <th class="p-0 min-w-150px">Member</th>
                                            <th class="p-0 min-w-140px text-end">Buku</th>
                                            <th class="p-0 min-w-110px text-end">Status</th>
                                            <th class="p-0 min-w-50px text-end">Waktu</th>
                                        </tr>
                                    </thead>
                                    <tbody id="table-recent-loans">
                                        <tr><td colspan="4" class="text-center text-muted">Memuat data...</td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Sidebar kanan: Buku Populer --}}
                <div class="col-xl-4">
                    {{-- Buku Populer --}}
                    <div class="card card-xl-stretch mb-5 mb-xl-8 border-0 shadow-sm">
                        <div class="card-header border-0">
                            <h3 class="card-title fw-bold text-dark">Buku Paling Diminati</h3>
                        </div>
                        <div class="card-body pt-0" id="list-popular-books">
                            <div class="text-center text-muted py-5">Memuat data...</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    @push('scripts')
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const token = localStorage.getItem('auth_token');
        if (!token) {
            window.location.href = '/login';
            return;
        }

        async function fetchProfile() {
            try {
                const res = await fetch('/api/user', {
                    headers: { 'Accept': 'application/json', 'Authorization': `Bearer ${token}` }
                });
                const json = await res.json();
                if (json.user) {
                    const u = json.user;
                    document.getElementById('profile-name').textContent = u.name;
                    document.getElementById('profile-email').textContent = u.email;
                    document.getElementById('profile-initial').textContent = u.name.charAt(0).toUpperCase();
                    
                    if (u.roles && u.roles.length > 0) {
                        const r = u.roles[0].name;
                        document.getElementById('profile-role').textContent = r.charAt(0).toUpperCase() + r.slice(1);
                    }
                }
            } catch(e) {
                console.error('Failed to fetch profile', e);
            }
        }

        async function fetchDashboardData() {
            try {
                const res = await fetch('/api/dashboard-stats', {
                    headers: { 'Accept': 'application/json', 'Authorization': `Bearer ${token}` }
                });
                const json = await res.json();
                
                if (json.success) {
                    const d = json.data;
                    
                    animateValue('stat-active-loans', 0, d.active_loans, 1000);
                    animateValue('stat-overdue-loans', 0, d.overdue_loans, 1000);
                    animateValue('stat-pending-loans', 0, d.pending_loans, 1000);
                    animateValue('stat-total-books', 0, d.total_books, 1000);
                    animateValue('stat-total-members', 0, d.total_members, 1000);

                    renderRecentLoans(d.recent_loans);
                    renderPopularBooks(d.popular_books);
                }
            } catch(e) {
                console.error('Failed to fetch dashboard data', e);
            }
        }

        function renderRecentLoans(loans) {
            const tbody = document.getElementById('table-recent-loans');
            if (!loans || loans.length === 0) {
                tbody.innerHTML = '<tr><td colspan="4" class="text-center text-muted py-5">Belum ada aktivitas.</td></tr>';
                return;
            }

            const badges = {
                'pending': 'badge-light-warning',
                'borrowed': 'badge-light-primary',
                'returned': 'badge-light-success',
                'lost': 'badge-light-danger',
                'cancelled': 'badge-light-secondary'
            };
            const labels = {
                'pending': 'Menunggu',
                'borrowed': 'Dipinjam',
                'returned': 'Dikembalikan',
                'lost': 'Hilang',
                'cancelled': 'Dibatalkan'
            };

            tbody.innerHTML = loans.map(l => {
                const b = badges[l.status] || 'badge-light-primary';
                const s = labels[l.status] || l.status;
                const mName = l.member ? l.member.name : '-';
                const mInit = mName.charAt(0).toUpperCase();
                const bTitle = l.book ? l.book.title : '-';
                
                // Simple relative time
                const d = new Date(l.updated_at);
                const diff = Math.floor((new Date() - d) / 1000);
                let timeStr = 'Baru saja';
                if (diff > 86400) timeStr = Math.floor(diff/86400) + ' hari lalu';
                else if (diff > 3600) timeStr = Math.floor(diff/3600) + ' jam lalu';
                else if (diff > 60) timeStr = Math.floor(diff/60) + ' mnt lalu';

                return `
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="symbol symbol-45px me-3">
                                <span class="symbol-label bg-light-primary text-primary fw-bold">${mInit}</span>
                            </div>
                            <div class="d-flex flex-column">
                                <span class="text-dark fw-bold fs-6">${mName}</span>
                                <span class="text-muted fw-semibold fs-7">${l.member ? l.member.member_code : ''}</span>
                            </div>
                        </div>
                    </td>
                    <td class="text-end text-muted fw-semibold">${bTitle}</td>
                    <td class="text-end"><span class="badge ${b}">${s}</span></td>
                    <td class="text-end text-muted fw-semibold">${timeStr}</td>
                </tr>`;
            }).join('');
        }

        function renderPopularBooks(books) {
            const container = document.getElementById('list-popular-books');
            if (!books || books.length === 0) {
                container.innerHTML = '<div class="text-center text-muted py-5">Belum ada data buku populer.</div>';
                return;
            }

            const colors = ['primary', 'success', 'warning', 'danger', 'info'];

            container.innerHTML = books.map((b, i) => {
                const color = colors[i % colors.length];
                return `
                <div class="d-flex align-items-center bg-light-${color} rounded p-5 mb-5">
                    <span class="svg-icon svg-icon-${color} me-4">
                        <i class="ki-duotone ki-book-open fs-1 text-${color}">
                            <span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span>
                        </i>
                    </span>
                    <div class="flex-grow-1 me-2">
                        <span class="fw-bold text-gray-800 fs-6">${b.title}</span>
                        <span class="text-muted fw-semibold d-block fs-7">${b.author}</span>
                    </div>
                    <span class="fw-bold text-${color} py-1">${b.loans_count}x</span>
                </div>`;
            }).join('');
        }

        function animateValue(id, start, end, duration) {
            const obj = document.getElementById(id);
            if (!obj) return;
            let startTimestamp = null;
            const step = (timestamp) => {
                if (!startTimestamp) startTimestamp = timestamp;
                const progress = Math.min((timestamp - startTimestamp) / duration, 1);
                obj.innerHTML = Math.floor(progress * (end - start) + start);
                if (progress < 1) {
                    window.requestAnimationFrame(step);
                } else {
                    obj.innerHTML = end;
                }
            };
            window.requestAnimationFrame(step);
        }

        fetchProfile();
        fetchDashboardData();
    });
    </script>
    @endpush
</x-layout>
