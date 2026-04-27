<x-layout title="Manajemen Peminjaman — Perpustakaan">

    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Manajemen Peminjaman</h1>
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <li class="breadcrumb-item text-muted"><a href="/dashboard" class="text-muted text-hover-primary">Beranda</a></li>
                    <li class="breadcrumb-item"><span class="bullet bg-gray-400 w-5px h-2px"></span></li>
                    <li class="breadcrumb-item text-muted">Sirkulasi</li>
                    <li class="breadcrumb-item"><span class="bullet bg-gray-400 w-5px h-2px"></span></li>
                    <li class="breadcrumb-item text-muted">Peminjaman</li>
                </ul>
            </div>
            <div class="d-flex align-items-center gap-2 gap-lg-3">
                <button type="button" class="btn btn-sm fw-bold btn-primary" id="btn-force-pinjam">
                    <i class="ki-duotone ki-plus fs-2"></i> Force Pinjam
                </button>
            </div>
        </div>
    </div>

    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-fluid">

            <div class="row g-5 g-xl-8 mb-5 mb-xl-8">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-light-primary hoverable">
                        <div class="card-body py-5 px-6">
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-40px me-4">
                                    <span class="symbol-label bg-primary">
                                        <i class="ki-duotone ki-handcart fs-2 text-white"><span class="path1"></span><span class="path2"></span></i>
                                    </span>
                                </div>
                                <div>
                                    <div class="fs-2 fw-bold text-primary" id="stat-total">0</div>
                                    <div class="fw-semibold text-gray-600 fs-7">Total Peminjaman</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-light-warning hoverable">
                        <div class="card-body py-5 px-6">
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-40px me-4">
                                    <span class="symbol-label bg-warning">
                                        <i class="ki-duotone ki-time fs-2 text-white"><span class="path1"></span><span class="path2"></span></i>
                                    </span>
                                </div>
                                <div>
                                    <div class="fs-2 fw-bold text-warning" id="stat-pending">0</div>
                                    <div class="fw-semibold text-gray-600 fs-7">Pending</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-light-info hoverable">
                        <div class="card-body py-5 px-6">
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-40px me-4">
                                    <span class="symbol-label bg-info">
                                        <i class="ki-duotone ki-book fs-2 text-white"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i>
                                    </span>
                                </div>
                                <div>
                                    <div class="fs-2 fw-bold text-info" id="stat-borrowed">0</div>
                                    <div class="fw-semibold text-gray-600 fs-7">Dipinjam</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-light-success hoverable">
                        <div class="card-body py-5 px-6">
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-40px me-4">
                                    <span class="symbol-label bg-success">
                                        <i class="ki-duotone ki-check-circle fs-2 text-white"><span class="path1"></span><span class="path2"></span></i>
                                    </span>
                                </div>
                                <div>
                                    <div class="fs-2 fw-bold text-success" id="stat-returned">0</div>
                                    <div class="fw-semibold text-gray-600 fs-7">Dikembalikan</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header border-0 pt-6">
                    <div class="card-title">
                        <div class="d-flex align-items-center position-relative my-1">
                            <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5"><span class="path1"></span><span class="path2"></span></i>
                            <input type="text" class="form-control form-control-solid w-250px ps-13" placeholder="Cari peminjaman..." id="input-search" />
                        </div>
                    </div>
                    <div class="card-toolbar">
                        <div class="d-flex justify-content-end align-items-center gap-3">
                            <select class="form-select form-select-solid w-150px" id="filter-status">
                                <option value="">Semua Status</option>
                                <option value="pending">Pending</option>
                                <option value="borrowed">Dipinjam</option>
                                <option value="returned">Dikembalikan</option>
                                <option value="cancelled">Dibatalkan</option>
                            </select>
                            <button type="button" class="btn btn-light-primary" id="btn-refresh">
                                <i class="ki-duotone ki-arrows-loop fs-2"><span class="path1"></span><span class="path2"></span></i> Refresh
                            </button>
                        </div>
                    </div>
                </div>

                <div class="card-body py-4">
                    <div class="d-flex justify-content-center py-10" id="loading-spinner">
                        <div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div>
                    </div>

                    <div class="d-none text-center py-10" id="empty-state">
                        <img src="{{ asset('assets/media/illustrations/sketchy-1/5.png') }}" alt="empty" class="w-200px mb-7" />
                        <div class="fw-semibold fs-4 text-gray-600">Belum ada data peminjaman.</div>
                    </div>

                    <div class="table-responsive d-none" id="table-wrapper">
                        <table class="table align-middle table-row-dashed fs-6 gy-5">
                            <thead>
                                <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                    <th class="w-10px pe-2">No</th>
                                    <th class="min-w-150px">Member</th>
                                    <th class="min-w-150px">Buku</th>
                                    <th class="min-w-100px">Tgl Pinjam</th>
                                    <th class="min-w-100px">Jatuh Tempo</th>
                                    <th class="min-w-80px">Status</th>
                                    <th class="text-end min-w-100px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 fw-semibold" id="tbody-loans"></tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="modal fade" id="modal-force" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-550px">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="fw-bold">Force Pinjam (Admin)</h2>
                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                    </div>
                </div>
                <div class="modal-body scroll-y mx-5 mx-xl-10 my-7">
                    <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed p-6 mb-7">
                        <i class="ki-duotone ki-shield-tick fs-2tx text-warning me-4"><span class="path1"></span><span class="path2"></span></i>
                        <div class="d-flex flex-stack flex-grow-1">
                            <div class="fw-semibold">
                                <div class="fs-6 text-gray-700">Mode admin: bypass validasi denda dan limit peminjaman.</div>
                            </div>
                        </div>
                    </div>
                    <form id="form-force">
                        <div class="fv-row mb-7">
                            <label class="required fw-semibold fs-6 mb-2">Member</label>
                            <select id="form-member" class="form-select form-select-solid">
                                <option value="">Pilih Member</option>
                            </select>
                        </div>
                        <div class="fv-row mb-7">
                            <label class="required fw-semibold fs-6 mb-2">Buku</label>
                            <select id="form-book" class="form-select form-select-solid">
                                <option value="">Pilih Buku</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer flex-center">
                    <button type="button" class="btn btn-light me-3" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-warning" id="btn-simpan-force">
                        <span class="indicator-label">Force Pinjam</span>
                        <span class="indicator-progress">Memproses...<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-detail" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-550px">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="fw-bold">Detail Peminjaman</h2>
                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                    </div>
                </div>
                <div class="modal-body scroll-y mx-5 mx-xl-10 my-7" id="detail-body"></div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const API = '/api';
        const tbody = document.getElementById('tbody-loans');
        const spinner = document.getElementById('loading-spinner');
        const emptyState = document.getElementById('empty-state');
        const tableWrap = document.getElementById('table-wrapper');
        const searchInput = document.getElementById('input-search');
        const filterStatus = document.getElementById('filter-status');

        const forceModal = new bootstrap.Modal(document.getElementById('modal-force'));
        const detailModal = new bootstrap.Modal(document.getElementById('modal-detail'));

        let allLoans = [];
        let allMembers = [];
        let allBooks = [];

        const statusMap = {
            pending:   { label: 'Pending',      badge: 'badge-light-warning' },
            borrowed:  { label: 'Dipinjam',     badge: 'badge-light-info' },
            returned:  { label: 'Dikembalikan', badge: 'badge-light-success' },
            cancelled: { label: 'Dibatalkan',   badge: 'badge-light-danger' },
        };

        async function fetchLoans() {
            showLoading();
            try {
                const res = await fetch(`${API}/admin/semua-loans`);
                const json = await res.json();
                if (json.success) {
                    allLoans = json.data;
                    updateStats();
                    applyFilters();
                } else { showEmpty(); }
            } catch (e) { console.error(e); showEmpty(); }
        }

        async function fetchMembers() {
            try {
                const res = await fetch(`${API}/semua-members`);
                const json = await res.json();
                if (json.success) allMembers = json.data;
            } catch (e) { console.error(e); }
        }

        async function fetchBooks() {
            try {
                const res = await fetch(`${API}/semua-buku`);
                const json = await res.json();
                if (json.success) allBooks = json.data;
            } catch (e) { console.error(e); }
        }

        function updateStats() {
            document.getElementById('stat-total').textContent = allLoans.length;
            document.getElementById('stat-pending').textContent = allLoans.filter(l => l.status === 'pending').length;
            document.getElementById('stat-borrowed').textContent = allLoans.filter(l => l.status === 'borrowed').length;
            document.getElementById('stat-returned').textContent = allLoans.filter(l => l.status === 'returned').length;
        }

        function applyFilters() {
            const q = searchInput.value.toLowerCase();
            const s = filterStatus.value;

            let filtered = allLoans;
            if (s) filtered = filtered.filter(l => l.status === s);
            if (q) filtered = filtered.filter(l =>
                (l.member && l.member.name.toLowerCase().includes(q)) ||
                (l.book && l.book.title.toLowerCase().includes(q))
            );
            renderTable(filtered);
        }

        searchInput.addEventListener('keyup', applyFilters);
        filterStatus.addEventListener('change', applyFilters);

        function renderTable(loans) {
            if (!loans.length) { showEmpty(); return; }
            spinner.classList.add('d-none');
            emptyState.classList.add('d-none');
            tableWrap.classList.remove('d-none');

            tbody.innerHTML = loans.map((loan, i) => {
                const st = statusMap[loan.status] || { label: loan.status, badge: 'badge-light' };
                const loanDate = loan.loan_date ? new Date(loan.loan_date).toLocaleDateString('id-ID') : '-';
                const dueDate = loan.due_date ? new Date(loan.due_date).toLocaleDateString('id-ID') : '-';
                const isOverdue = loan.status === 'borrowed' && loan.due_date && new Date(loan.due_date) < new Date();

                return `
                <tr>
                    <td>${i + 1}</td>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="symbol symbol-circle symbol-40px overflow-hidden me-3">
                                <div class="symbol-label bg-light-primary text-primary fw-bold fs-6">${loan.member ? esc(loan.member.name.charAt(0)) : '?'}</div>
                            </div>
                            <div>
                                <span class="text-gray-800 fw-bold">${loan.member ? esc(loan.member.name) : '-'}</span>
                                <span class="d-block text-muted fs-7">${loan.member ? esc(loan.member.member_code || '') : ''}</span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="text-gray-800 fw-semibold">${loan.book ? esc(loan.book.title) : '-'}</span>
                    </td>
                    <td class="text-muted">${loanDate}</td>
                    <td>
                        <span class="${isOverdue ? 'text-danger fw-bold' : 'text-muted'}">${dueDate}</span>
                        ${isOverdue ? '<span class="badge badge-light-danger fs-8 ms-2">Terlambat</span>' : ''}
                    </td>
                    <td><span class="badge ${st.badge} fs-7">${st.label}</span></td>
                    <td class="text-end">
                        <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Aksi <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-175px py-4" data-kt-menu="true">
                            <div class="menu-item px-3"><a href="#" class="menu-link px-3" onclick="showDetail(${loan.id}); return false;"><i class="ki-duotone ki-eye fs-6 me-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i> Detail</a></div>
                            ${loan.status === 'pending' ? `<div class="menu-item px-3"><a href="#" class="menu-link px-3 text-danger" onclick="batalkan(${loan.id}); return false;"><i class="ki-duotone ki-cross-circle fs-6 me-2"><span class="path1"></span><span class="path2"></span></i> Batalkan</a></div>` : ''}
                        </div>
                    </td>
                </tr>`;
            }).join('');

            KTMenu.init();
        }

        function showLoading() { spinner.classList.remove('d-none'); emptyState.classList.add('d-none'); tableWrap.classList.add('d-none'); }
        function showEmpty() { spinner.classList.add('d-none'); emptyState.classList.remove('d-none'); tableWrap.classList.add('d-none'); }

        document.getElementById('btn-force-pinjam').addEventListener('click', function () {
            const selMember = document.getElementById('form-member');
            const selBook = document.getElementById('form-book');

            selMember.innerHTML = '<option value="">Pilih Member</option>';
            allMembers.forEach(m => { selMember.innerHTML += `<option value="${m.id}">${esc(m.name)} (${esc(m.member_code || '')})</option>`; });

            selBook.innerHTML = '<option value="">Pilih Buku</option>';
            allBooks.filter(b => b.stock > 0).forEach(b => { selBook.innerHTML += `<option value="${b.id}">${esc(b.title)} — Stok: ${b.stock}</option>`; });

            document.getElementById('form-force').reset();
            forceModal.show();
        });

        document.getElementById('btn-simpan-force').addEventListener('click', async function () {
            const btn = this;
            const memberId = document.getElementById('form-member').value;
            const bookId = document.getElementById('form-book').value;

            if (!memberId || !bookId) {
                Swal.fire({ icon: 'warning', title: 'Oops', text: 'Pilih member dan buku terlebih dahulu.' });
                return;
            }

            btn.setAttribute('data-kt-indicator', 'on');
            btn.disabled = true;

            try {
                const res = await fetch(`${API}/admin/force-pinjam`, {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json', 'Accept': 'application/json', 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || '' },
                    body: JSON.stringify({ member_id: memberId, book_id: bookId }),
                });
                const json = await res.json();

                if (json.success) {
                    forceModal.hide();
                    Swal.fire({ icon: 'success', title: 'Berhasil!', text: json.message, timer: 1500, showConfirmButton: false });
                    fetchLoans();
                    fetchBooks();
                } else {
                    Swal.fire({ icon: 'error', title: 'Gagal', text: json.message });
                }
            } catch (e) {
                Swal.fire({ icon: 'error', title: 'Error', text: 'Tidak bisa terhubung ke server.' });
            } finally {
                btn.removeAttribute('data-kt-indicator');
                btn.disabled = false;
            }
        });

        window.showDetail = function (id) {
            const loan = allLoans.find(l => l.id === id);
            if (!loan) return;

            const st = statusMap[loan.status] || { label: loan.status, badge: 'badge-light' };
            const loanDate = loan.loan_date ? new Date(loan.loan_date).toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric' }) : '-';
            const dueDate = loan.due_date ? new Date(loan.due_date).toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric' }) : '-';
            const returnDate = loan.return_date ? new Date(loan.return_date).toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric' }) : '-';

            document.getElementById('detail-body').innerHTML = `
                <div class="d-flex align-items-center mb-7">
                    <div class="symbol symbol-60px symbol-circle me-5"><div class="symbol-label fs-1 bg-light-primary text-primary fw-bold">${loan.member ? esc(loan.member.name.charAt(0)) : '?'}</div></div>
                    <div>
                        <div class="fs-4 fw-bold text-gray-800">${loan.member ? esc(loan.member.name) : '-'}</div>
                        <div class="text-muted fs-7">${loan.member ? esc(loan.member.member_code || '') : ''}</div>
                    </div>
                </div>
                <div class="separator separator-dashed my-5"></div>
                <div class="row mb-5"><label class="col-lg-4 fw-semibold text-muted">Buku</label><div class="col-lg-8 fw-bold text-gray-800">${loan.book ? esc(loan.book.title) : '-'}</div></div>
                <div class="row mb-5"><label class="col-lg-4 fw-semibold text-muted">Tanggal Pinjam</label><div class="col-lg-8 fw-bold text-gray-800">${loanDate}</div></div>
                <div class="row mb-5"><label class="col-lg-4 fw-semibold text-muted">Jatuh Tempo</label><div class="col-lg-8 fw-bold text-gray-800">${dueDate}</div></div>
                <div class="row mb-5"><label class="col-lg-4 fw-semibold text-muted">Tanggal Kembali</label><div class="col-lg-8 fw-bold text-gray-800">${returnDate}</div></div>
                <div class="row mb-5"><label class="col-lg-4 fw-semibold text-muted">Status</label><div class="col-lg-8"><span class="badge ${st.badge} fs-6">${st.label}</span></div></div>
                ${loan.fine ? `<div class="row mb-5"><label class="col-lg-4 fw-semibold text-muted">Denda</label><div class="col-lg-8"><span class="badge badge-light-danger fs-6">Rp ${Number(loan.fine.amount).toLocaleString('id-ID')} — ${loan.fine.payment_status}</span></div></div>` : ''}
            `;
            detailModal.show();
        };

        window.batalkan = function (id) {
            Swal.fire({
                title: 'Batalkan peminjaman ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, batalkan',
                cancelButtonText: 'Tidak',
                customClass: { confirmButton: 'btn btn-danger', cancelButton: 'btn btn-light' },
            }).then(async (r) => {
                if (r.isConfirmed) {
                    try {
                        const res = await fetch(`${API}/admin/batalkan-loan/${id}`, {
                            method: 'PUT',
                            headers: { 'Accept': 'application/json', 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || '' },
                        });
                        const json = await res.json();
                        Swal.fire({ icon: 'success', title: 'Dibatalkan!', text: json.message, timer: 1500, showConfirmButton: false });
                        fetchLoans();
                    } catch (e) {
                        Swal.fire({ icon: 'error', title: 'Gagal', text: 'Tidak bisa membatalkan.' });
                    }
                }
            });
        };

        function esc(s) { if (!s) return ''; const d = document.createElement('div'); d.textContent = s; return d.innerHTML; }

        document.getElementById('btn-refresh').addEventListener('click', () => { fetchLoans(); });

        Promise.all([fetchMembers(), fetchBooks()]).then(() => fetchLoans());
    });
    </script>
    @endpush
</x-layout>
