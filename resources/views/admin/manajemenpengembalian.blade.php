<x-layout title="Manajemen Pengembalian — Perpustakaan">

    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Manajemen Pengembalian</h1>
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <li class="breadcrumb-item text-muted"><a href="/dashboard" class="text-muted text-hover-primary">Beranda</a></li>
                    <li class="breadcrumb-item"><span class="bullet bg-gray-400 w-5px h-2px"></span></li>
                    <li class="breadcrumb-item text-muted">Sirkulasi</li>
                    <li class="breadcrumb-item"><span class="bullet bg-gray-400 w-5px h-2px"></span></li>
                    <li class="breadcrumb-item text-muted">Pengembalian</li>
                </ul>
            </div>
            <div class="d-flex align-items-center gap-2 gap-lg-3">
                <button type="button" class="btn btn-sm btn-light-primary" id="btn-refresh">
                    <i class="ki-duotone ki-arrows-loop fs-2"><span class="path1"></span><span class="path2"></span></i> Refresh Data
                </button>
            </div>
        </div>
    </div>

    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-fluid">

            <div class="card mb-5 mb-xl-10">
                <div class="card-header card-header-stretch pb-0">
                    <div class="card-title">
                        <h3 class="m-0">Menu Pengembalian</h3>
                    </div>
                    <div class="card-toolbar m-0">
                        <ul class="nav nav-stretch nav-line-tabs border-transparent" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a id="tab_active_loans" class="nav-link fs-5 fw-bold me-5 active" data-bs-toggle="tab" role="tab" href="#kt_tab_pane_1">
                                    Buku Sedang Dipinjam
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a id="tab_history_returns" class="nav-link fs-5 fw-bold" data-bs-toggle="tab" role="tab" href="#kt_tab_pane_2">
                                    Riwayat & Denda
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <div class="card-body">
                    <div class="tab-content" id="myTabContent">
                        
                        {{-- TAB 1: BUKU SEDANG DIPINJAM --}}
                        <div class="tab-pane fade show active" id="kt_tab_pane_1" role="tabpanel">
                            <div class="d-flex justify-content-between align-items-center mb-6">
                                <h3 class="card-title fw-bold text-gray-800">Daftar Buku Dipinjam</h3>
                                <div class="position-relative my-1">
                                    <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-4 top-50 translate-middle-y"><span class="path1"></span><span class="path2"></span></i>
                                    <input type="text" class="form-control form-control-solid w-250px ps-12" placeholder="Cari member/buku..." id="search-active" />
                                </div>
                            </div>
                            
                            <div class="table-responsive">
                                <table class="table align-middle table-row-dashed fs-6 gy-5">
                                    <thead>
                                        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                            <th class="w-10px pe-2">No</th>
                                            <th class="min-w-150px">Member</th>
                                            <th class="min-w-150px">Buku</th>
                                            <th class="min-w-100px">Jatuh Tempo</th>
                                            <th class="min-w-80px">Status</th>
                                            <th class="text-end min-w-100px">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-gray-600 fw-semibold" id="tbody-active">
                                        <tr><td colspan="6" class="text-center py-10"><div class="spinner-border text-primary" role="status"></div></td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        {{-- TAB 2: RIWAYAT & DENDA --}}
                        <div class="tab-pane fade" id="kt_tab_pane_2" role="tabpanel">
                            <div class="d-flex justify-content-between align-items-center mb-6">
                                <h3 class="card-title fw-bold text-gray-800">Riwayat Pengembalian</h3>
                                <div class="position-relative my-1">
                                    <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-4 top-50 translate-middle-y"><span class="path1"></span><span class="path2"></span></i>
                                    <input type="text" class="form-control form-control-solid w-250px ps-12" placeholder="Cari riwayat..." id="search-history" />
                                </div>
                            </div>
                            
                            <div class="table-responsive">
                                <table class="table align-middle table-row-dashed fs-6 gy-5">
                                    <thead>
                                        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                            <th class="w-10px pe-2">No</th>
                                            <th class="min-w-150px">Member</th>
                                            <th class="min-w-150px">Buku</th>
                                            <th class="min-w-100px">Tgl Kembali</th>
                                            <th class="min-w-150px">Status Denda</th>
                                            <th class="text-end min-w-100px">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-gray-600 fw-semibold" id="tbody-history">
                                        <tr><td colspan="6" class="text-center py-10"><div class="spinner-border text-primary" role="status"></div></td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>

        </div>
    </div>

    @push('scripts')
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const userDataStr = localStorage.getItem('user_data');
        let isAdmin = false;
        if (userDataStr) {
            const user = JSON.parse(userDataStr);
            isAdmin = user.roles && user.roles.includes('admin');
        }
        
        const API = isAdmin ? '/api/admin' : '/api/staff';
        
        let activeLoans = [];
        let historyReturns = [];

        const tbodyActive = document.getElementById('tbody-active');
        const tbodyHistory = document.getElementById('tbody-history');
        const searchActive = document.getElementById('search-active');
        const searchHistory = document.getElementById('search-history');

        async function fetchActiveLoans() {
            try {
                const token = localStorage.getItem('auth_token');
                if (!token) { window.location.href = '/login'; return; }
                const res = await fetch(`${API}/loans-dipinjam`, {
                    headers: { 'Accept': 'application/json', 'Authorization': `Bearer ${token}` }
                });
                const json = await res.json();
                if (json.success) {
                    activeLoans = json.data;
                    renderActiveLoans();
                }
            } catch (e) {
                console.error(e);
            }
        }

        async function fetchHistoryReturns() {
            try {
                const token = localStorage.getItem('auth_token');
                const res = await fetch(`${API}/semua-returns`, {
                    headers: { 'Accept': 'application/json', 'Authorization': `Bearer ${token}` }
                });
                const json = await res.json();
                if (json.success) {
                    historyReturns = json.data;
                    renderHistoryReturns();
                }
            } catch (e) {
                console.error(e);
            }
        }

        function renderActiveLoans() {
            const q = searchActive.value.toLowerCase();
            const filtered = activeLoans.filter(l => 
                (l.member && l.member.name.toLowerCase().includes(q)) || 
                (l.book && l.book.title.toLowerCase().includes(q))
            );

            if (!filtered.length) {
                tbodyActive.innerHTML = `<tr><td colspan="6" class="text-center text-muted py-5">Tidak ada data buku yang sedang dipinjam.</td></tr>`;
                return;
            }

            tbodyActive.innerHTML = filtered.map((loan, i) => {
                const dueDate = new Date(loan.due_date);
                const isOverdue = dueDate < new Date();
                const dueDateStr = dueDate.toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric' });
                
                return `
                <tr>
                    <td>${i + 1}</td>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="symbol symbol-circle symbol-40px overflow-hidden me-3">
                                <div class="symbol-label bg-light-primary text-primary fw-bold fs-6">${loan.member ? esc(loan.member.name.charAt(0)) : '?'}</div>
                            </div>
                            <div>
                                <span class="text-gray-800 fw-bold d-block">${loan.member ? esc(loan.member.name) : '-'}</span>
                                <span class="text-muted fs-8">${loan.member ? esc(loan.member.member_code) : ''}</span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="text-gray-800 fw-semibold d-block">${loan.book ? esc(loan.book.title) : '-'}</span>
                    </td>
                    <td>
                        <span class="${isOverdue ? 'text-danger fw-bold' : 'text-gray-800'}">${dueDateStr}</span>
                    </td>
                    <td>
                        ${isOverdue 
                            ? `<span class="badge badge-light-danger">Terlambat</span>` 
                            : `<span class="badge badge-light-success">Aman</span>`
                        }
                    </td>
                    <td class="text-end">
                        <button class="btn btn-sm btn-primary" onclick="prosesKembali(${loan.id})">
                            <i class="ki-duotone ki-check fs-2"></i> Proses Kembali
                        </button>
                    </td>
                </tr>`;
            }).join('');
        }

        function renderHistoryReturns() {
            const q = searchHistory.value.toLowerCase();
            const filtered = historyReturns.filter(l => 
                (l.member && l.member.name.toLowerCase().includes(q)) || 
                (l.book && l.book.title.toLowerCase().includes(q))
            );

            if (!filtered.length) {
                tbodyHistory.innerHTML = `<tr><td colspan="6" class="text-center text-muted py-5">Belum ada riwayat pengembalian.</td></tr>`;
                return;
            }

            tbodyHistory.innerHTML = filtered.map((loan, i) => {
                const returnDate = loan.return_date ? new Date(loan.return_date).toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric' }) : '-';
                
                let fineStatusHtml = '<span class="text-muted italic">Tidak ada denda</span>';
                let actionBtn = '';

                if (loan.fine) {
                    const amountStr = Number(loan.fine.amount).toLocaleString('id-ID');
                    if (loan.fine.payment_status === 'unpaid') {
                        fineStatusHtml = `<span class="badge badge-light-danger fw-bold px-3 py-2">Rp ${amountStr} (Belum Lunas)</span>`;
                        actionBtn = `<button class="btn btn-sm btn-light-success" onclick="bayarDenda(${loan.fine.id}, ${loan.fine.amount})">
                                        <i class="ki-duotone ki-wallet fs-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i> Terima Pembayaran
                                    </button>`;
                    } else {
                        fineStatusHtml = `<span class="badge badge-light-success fw-bold px-3 py-2">Rp ${amountStr} (Lunas)</span>`;
                    }
                }

                return `
                <tr>
                    <td>${i + 1}</td>
                    <td>
                        <span class="text-gray-800 fw-bold d-block">${loan.member ? esc(loan.member.name) : '-'}</span>
                    </td>
                    <td>
                        <span class="text-gray-800 fw-semibold d-block">${loan.book ? esc(loan.book.title) : '-'}</span>
                    </td>
                    <td><span class="text-gray-800">${returnDate}</span></td>
                    <td>${fineStatusHtml}</td>
                    <td class="text-end">${actionBtn || '-'}</td>
                </tr>`;
            }).join('');
        }

        window.prosesKembali = function(id) {
            Swal.fire({
                title: 'Proses Pengembalian?',
                text: "Pastikan buku fisik sudah Anda terima.",
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Ya, Proses',
                cancelButtonText: 'Batal',
                customClass: { confirmButton: 'btn btn-primary', cancelButton: 'btn btn-light' }
            }).then(async (result) => {
                if (result.isConfirmed) {
                    try {
                        const token = localStorage.getItem('auth_token');
                        const res = await fetch(`${API}/proses-pengembalian/${id}`, {
                            method: 'PUT',
                            headers: { 
                                'Accept': 'application/json',
                                'Authorization': `Bearer ${token}`,
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content 
                            }
                        });
                        const data = await res.json();
                        
                        if (data.success) {
                            Swal.fire({ icon: 'success', title: 'Berhasil!', text: data.message });
                            refreshAll();
                        } else {
                            Swal.fire({ icon: 'error', title: 'Gagal', text: data.message });
                        }
                    } catch (e) {
                        Swal.fire({ icon: 'error', title: 'Error', text: 'Terjadi kesalahan sistem.' });
                    }
                }
            });
        };

        window.bayarDenda = function(fineId, amount) {
            const amountStr = Number(amount).toLocaleString('id-ID');
            Swal.fire({
                title: 'Terima Pembayaran Denda?',
                text: `Pastikan member sudah membayar denda sebesar Rp ${amountStr}.`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Lunas',
                cancelButtonText: 'Batal',
                customClass: { confirmButton: 'btn btn-success', cancelButton: 'btn btn-light' }
            }).then(async (result) => {
                if (result.isConfirmed) {
                    try {
                        const token = localStorage.getItem('auth_token');
                        const res = await fetch(`${API}/bayar-denda/${fineId}`, {
                            method: 'PUT',
                            headers: { 
                                'Accept': 'application/json',
                                'Authorization': `Bearer ${token}`,
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content 
                            }
                        });
                        const data = await res.json();
                        
                        if (data.success) {
                            Swal.fire({ icon: 'success', title: 'Berhasil!', text: 'Denda berhasil dilunaskan.' });
                            fetchHistoryReturns();
                        } else {
                            Swal.fire({ icon: 'error', title: 'Gagal', text: data.message });
                        }
                    } catch (e) {
                        Swal.fire({ icon: 'error', title: 'Error', text: 'Terjadi kesalahan sistem.' });
                    }
                }
            });
        };

        function esc(s) { if (!s) return ''; const d = document.createElement('div'); d.textContent = s; return d.innerHTML; }

        function refreshAll() {
            fetchActiveLoans();
            fetchHistoryReturns();
        }

        searchActive.addEventListener('input', renderActiveLoans);
        searchHistory.addEventListener('input', renderHistoryReturns);
        document.getElementById('btn-refresh').addEventListener('click', refreshAll);

        refreshAll();
    });
    </script>
    @endpush
</x-layout>
