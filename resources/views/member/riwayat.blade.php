<x-layout title="Riwayat Peminjaman — Perpustakaan">
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Riwayat Peminjaman</h1>
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <li class="breadcrumb-item text-muted">
                        <a href="/dashboard" class="text-muted text-hover-primary">Beranda</a>
                    </li>
                    <li class="breadcrumb-item"><span class="bullet bg-gray-400 w-5px h-2px"></span></li>
                    <li class="breadcrumb-item text-muted">Riwayat</li>
                </ul>
            </div>
            <div class="d-flex align-items-center gap-2 gap-lg-3">
                <button type="button" class="btn btn-sm btn-light-primary" id="btn-refresh">
                    <i class="ki-duotone ki-arrows-loop fs-2"><span class="path1"></span><span class="path2"></span></i> Refresh
                </button>
            </div>
        </div>
    </div>

    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-fluid">
            
            <div class="card">
                <div class="card-header border-0 pt-6">
                    <div class="card-title">
                        <h3 class="fw-bold m-0">Daftar Peminjaman Saya</h3>
                    </div>
                </div>
                <div class="card-body py-4">
                    <div class="table-responsive">
                        <table class="table align-middle table-row-dashed fs-6 gy-5">
                            <thead>
                                <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                    <th class="w-10px pe-2">No</th>
                                    <th class="min-w-200px">Buku</th>
                                    <th class="min-w-125px">Tgl Pinjam</th>
                                    <th class="min-w-125px">Jatuh Tempo</th>
                                    <th class="min-w-100px">Status</th>
                                    <th class="text-end min-w-100px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 fw-semibold" id="tbody-riwayat">
                                <tr><td colspan="6" class="text-center py-10"><div class="spinner-border text-primary" role="status"></div></td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

    @push('scripts')
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const token = localStorage.getItem('auth_token');
        if (!token) { window.location.href = '/login'; return; }

        let currentMember = null;
        const tbody = document.getElementById('tbody-riwayat');

        const statusMap = {
            pending:   { label: 'Pending',      badge: 'badge-light-warning' },
            borrowed:  { label: 'Dipinjam',     badge: 'badge-light-info' },
            returned:  { label: 'Dikembalikan', badge: 'badge-light-success' },
            cancelled: { label: 'Dibatalkan',   badge: 'badge-light-danger' },
        };

        async function init() {
            try {
                const resUser = await fetch('/api/user', {
                    headers: { 'Accept': 'application/json', 'Authorization': `Bearer ${token}` }
                });
                const userData = await resUser.json();
                currentMember = userData.member;
                
                if (currentMember) {
                    fetchRiwayat();
                } else {
                    tbody.innerHTML = `<tr><td colspan="6" class="text-center py-10">Data member tidak ditemukan.</td></tr>`;
                }
            } catch (e) {
                console.error(e);
            }
        }

        async function fetchRiwayat() {
            try {
                const res = await fetch(`/api/member/my-loans/${currentMember.id}`, {
                    headers: { 'Accept': 'application/json', 'Authorization': `Bearer ${token}` }
                });
                const json = await res.json();
                
                if (json.success) {
                    renderTable(json.data);
                } else {
                    tbody.innerHTML = `<tr><td colspan="6" class="text-center py-10">Gagal mengambil riwayat.</td></tr>`;
                }
            } catch (e) {
                console.error(e);
            }
        }

        function renderTable(loans) {
            if (!loans.length) {
                tbody.innerHTML = `<tr><td colspan="6" class="text-center py-10">Belum ada riwayat peminjaman.</td></tr>`;
                return;
            }

            tbody.innerHTML = loans.map((loan, i) => {
                const st = statusMap[loan.status] || { label: loan.status, badge: 'badge-light' };
                const loanDate = loan.loan_date ? new Date(loan.loan_date).toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric' }) : '-';
                const dueDate = loan.due_date ? new Date(loan.due_date).toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric' }) : '-';
                const isOverdue = loan.status === 'borrowed' && loan.due_date && new Date(loan.due_date) < new Date();

                return `
                <tr>
                    <td>${i + 1}</td>
                    <td>
                        <span class="text-gray-800 fw-bold d-block">${loan.book ? esc(loan.book.title) : '-'}</span>
                        <span class="text-muted fs-7">${loan.book ? esc(loan.book.author) : ''}</span>
                    </td>
                    <td><span class="text-gray-800">${loanDate}</span></td>
                    <td>
                        <span class="${isOverdue ? 'text-danger fw-bold' : 'text-gray-800'}">${dueDate}</span>
                        ${isOverdue ? '<div class="badge badge-light-danger fs-8 mt-1">Terlambat</div>' : ''}
                    </td>
                    <td><span class="badge ${st.badge}">${st.label}</span></td>
                    <td class="text-end">
                        ${loan.status === 'pending' 
                            ? `<button class="btn btn-sm btn-light-danger" onclick="batalkan(${loan.id})"><i class="ki-duotone ki-cross-circle fs-2"><span class="path1"></span><span class="path2"></span></i> Batal</button>`
                            : `<span class="text-muted italic fs-8">-</span>`
                        }
                    </td>
                </tr>`;
            }).join('');
        }

        window.batalkan = function(id) {
            Swal.fire({
                title: 'Batalkan Peminjaman?',
                text: "Permintaan peminjaman buku ini akan dibatalkan.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Batal',
                cancelButtonText: 'Kembali',
                customClass: { confirmButton: 'btn btn-danger', cancelButton: 'btn btn-light' }
            }).then(async (result) => {
                if (result.isConfirmed) {
                    try {
                        const res = await fetch(`/api/member/batalkan-loan/${id}`, {
                            method: 'PUT',
                            headers: { 
                                'Accept': 'application/json',
                                'Authorization': `Bearer ${token}`,
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content 
                            }
                        });
                        const data = await res.json();
                        
                        if (data.success) {
                            Swal.fire({ icon: 'success', title: 'Dibatalkan!', text: data.message, timer: 1500, showConfirmButton: false });
                            fetchRiwayat();
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

        document.getElementById('btn-refresh').addEventListener('click', fetchRiwayat);

        init();
    });
    </script>
    @endpush
</x-layout>
