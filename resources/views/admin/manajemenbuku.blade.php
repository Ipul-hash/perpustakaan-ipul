<x-layout title="Manajemen Buku — Perpustakaan">

    {{-- Toolbar --}}
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Manajemen Buku</h1>
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <li class="breadcrumb-item text-muted">
                        <a href="/dashboard" class="text-muted text-hover-primary">Beranda</a>
                    </li>
                    <li class="breadcrumb-item"><span class="bullet bg-gray-400 w-5px h-2px"></span></li>
                    <li class="breadcrumb-item text-muted">Master Data</li>
                    <li class="breadcrumb-item"><span class="bullet bg-gray-400 w-5px h-2px"></span></li>
                    <li class="breadcrumb-item text-muted">Manajemen Buku</li>
                </ul>
            </div>
            <div class="d-flex align-items-center gap-2 gap-lg-3">
                <button type="button" class="btn btn-sm fw-bold btn-primary" id="btn-tambah-buku">
                    <i class="ki-duotone ki-plus fs-2"></i> Tambah Buku
                </button>
            </div>
        </div>
    </div>

    {{-- Content --}}
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-fluid">

            {{-- Card Buku per Kategori --}}
            <div class="row g-5 g-xl-8 mb-5 mb-xl-8" id="category-cards-row">
                {{-- Dirender via JS --}}
            </div>

            <div class="row g-5 g-xl-8">
                {{-- Card Tabel Buku --}}
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header border-0 pt-6">
                            <div class="card-title">
                                <div class="d-flex align-items-center position-relative my-1">
                                    <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
                                        <span class="path1"></span><span class="path2"></span>
                                    </i>
                                    <input type="text" class="form-control form-control-solid w-250px ps-13" placeholder="Cari buku..." id="input-search" />
                                </div>
                            </div>
                            <div class="card-toolbar">
                                <div class="d-flex justify-content-end align-items-center gap-3">
                                    {{-- Filter Kategori --}}
                                    <select class="form-select form-select-solid w-175px" id="filter-category">
                                        <option value="">Semua Kategori</option>
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
                                <div class="fw-semibold fs-4 text-gray-600">Belum ada data buku.</div>
                                <div class="text-muted fs-7">Klik tombol "Tambah Buku" untuk mulai menambahkan.</div>
                            </div>
                            <div class="table-responsive d-none" id="table-wrapper">
                                <table class="table align-middle table-row-dashed fs-6 gy-5" id="tabel-buku">
                                    <thead>
                                        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                            <th class="w-10px pe-2">No</th>
                                            <th class="min-w-200px">Judul Buku</th>
                                            <th class="min-w-125px">Penulis</th>
                                            <th class="min-w-125px">Kategori</th>
                                            <th class="min-w-100px">ISBN</th>
                                            <th class="min-w-70px">Stok</th>
                                            <th class="text-end min-w-100px">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-gray-600 fw-semibold" id="tbody-buku"></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    {{-- MODAL TAMBAH / EDIT --}}
    <div class="modal fade" id="modal-buku" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="fw-bold" id="modal-buku-title">Tambah Buku</h2>
                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                    </div>
                </div>
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                    <form id="form-buku">
                        <input type="hidden" id="form-buku-id" />
                        <div class="fv-row mb-7">
                            <label class="required fw-semibold fs-6 mb-2">Judul Buku</label>
                            <input type="text" id="form-title" class="form-control form-control-solid" placeholder="Masukkan judul buku" />
                        </div>
                        <div class="fv-row mb-7">
                            <label class="required fw-semibold fs-6 mb-2">Penulis</label>
                            <input type="text" id="form-author" class="form-control form-control-solid" placeholder="Masukkan nama penulis" />
                        </div>
                        <div class="row mb-7">
                            <div class="col-md-6 fv-row">
                                <label class="required fw-semibold fs-6 mb-2">Kategori</label>
                                <select id="form-category" class="form-select form-select-solid">
                                    <option value="">Pilih Kategori</option>
                                </select>
                            </div>
                            <div class="col-md-6 fv-row">
                                <label class="fw-semibold fs-6 mb-2">ISBN</label>
                                <input type="text" id="form-isbn" class="form-control form-control-solid" placeholder="978-xxx-xxx" />
                            </div>
                        </div>
                        <div class="fv-row mb-7">
                            <label class="required fw-semibold fs-6 mb-2">Stok</label>
                            <input type="number" id="form-stock" class="form-control form-control-solid" placeholder="0" min="0" />
                        </div>
                        <div class="fv-row mb-7">
                            <label class="fw-semibold fs-6 mb-2">Deskripsi</label>
                            <textarea id="form-description" class="form-control form-control-solid" rows="3" placeholder="Deskripsi singkat buku (opsional)"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer flex-center">
                    <button type="button" class="btn btn-light me-3" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" id="btn-simpan">
                        <span class="indicator-label">Simpan</span>
                        <span class="indicator-progress">Menyimpan...<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL DETAIL --}}
    <div class="modal fade" id="modal-detail" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="fw-bold">Detail Buku</h2>
                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                    </div>
                </div>
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7" id="detail-body"></div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const API = '/api';
        const tbody = document.getElementById('tbody-buku');
        const spinner = document.getElementById('loading-spinner');
        const emptyState = document.getElementById('empty-state');
        const tableWrap = document.getElementById('table-wrapper');
        const searchInput = document.getElementById('input-search');
        const filterCat = document.getElementById('filter-category');
        const catCardsRow = document.getElementById('category-cards-row');

        const modal = new bootstrap.Modal(document.getElementById('modal-buku'));
        const detailModal = new bootstrap.Modal(document.getElementById('modal-detail'));

        let allBooks = [];
        let allCategories = [];
        const colors = ['primary','success','info','warning','danger'];

        // ====== FETCH CATEGORIES dari API ======
        async function fetchCategories() {
            try {
                const res = await fetch(`${API}/semua-categories`);
                const json = await res.json();
                if (json.success) {
                    allCategories = json.data;
                    populateFilterDropdown();
                }
            } catch (e) { console.error('Gagal fetch kategori:', e); }
        }

        function populateFilterDropdown() {
            filterCat.innerHTML = '<option value="">Semua Kategori</option>';
            allCategories.forEach(c => {
                filterCat.innerHTML += `<option value="${c.id}">${esc(c.name)}</option>`;
            });
        }

        function populateFormSelect(selectedId) {
            const sel = document.getElementById('form-category');
            sel.innerHTML = '<option value="">Pilih Kategori</option>';
            allCategories.forEach(c => {
                sel.innerHTML += `<option value="${c.id}" ${c.id == selectedId ? 'selected' : ''}>${esc(c.name)}</option>`;
            });
        }

        // ====== FETCH BUKU ======
        async function fetchBooks() {
            showLoading();
            try {
                const res = await fetch(`${API}/semua-buku`);
                const json = await res.json();
                if (json.success) {
                    allBooks = json.data;
                    applyFilters();
                    renderCategoryCards();
                } else { showEmpty(); }
            } catch (e) { console.error(e); showEmpty(); }
        }

        // ====== CATEGORY STAT CARDS ======
        function renderCategoryCards() {
            const countMap = {};
            allBooks.forEach(b => {
                const catName = b.category ? b.category.name : 'Tanpa Kategori';
                countMap[catName] = (countMap[catName] || 0) + 1;
            });
            const entries = Object.entries(countMap).sort((a,b) => b[1] - a[1]);

            if (!entries.length) { catCardsRow.innerHTML = ''; return; }

            catCardsRow.innerHTML = entries.map(([name, count], i) => {
                const color = colors[i % colors.length];
                return `
                <div class="col-xl-3 col-md-4 col-sm-6">
                    <div class="card bg-light-${color} hoverable card-xl-stretch mb-xl-0">
                        <div class="card-body py-5 px-6">
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-40px me-4">
                                    <span class="symbol-label bg-${color}">
                                        <i class="ki-duotone ki-book fs-2 text-white"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i>
                                    </span>
                                </div>
                                <div>
                                    <div class="fs-2 fw-bold text-${color}">${count}</div>
                                    <div class="fw-semibold text-gray-600 fs-7">${esc(name)}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>`;
            }).join('');
        }

        // ====== FILTER + SEARCH ======
        function applyFilters() {
            const q = searchInput.value.toLowerCase();
            const catId = filterCat.value;

            let filtered = allBooks;
            if (catId) filtered = filtered.filter(b => b.category && b.category_id == catId);
            if (q) filtered = filtered.filter(b =>
                b.title.toLowerCase().includes(q) ||
                b.author.toLowerCase().includes(q) ||
                (b.isbn && b.isbn.toLowerCase().includes(q)) ||
                (b.category && b.category.name.toLowerCase().includes(q))
            );
            renderTable(filtered);
        }

        searchInput.addEventListener('keyup', applyFilters);
        filterCat.addEventListener('change', applyFilters);

        // ====== RENDER TABLE ======
        function renderTable(books) {
            if (!books.length) { showEmpty(); return; }
            spinner.classList.add('d-none');
            emptyState.classList.add('d-none');
            tableWrap.classList.remove('d-none');

            tbody.innerHTML = books.map((book, i) => `
                <tr>
                    <td>${i + 1}</td>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                <div class="symbol-label fs-3 bg-light-primary text-primary">
                                    <i class="ki-duotone ki-book fs-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i>
                                </div>
                            </div>
                            <div class="d-flex flex-column">
                                <a href="#" class="text-gray-800 text-hover-primary mb-1 fw-bold" onclick="showDetail(${book.id}); return false;">${esc(book.title)}</a>
                                <span class="text-muted">${book.description ? esc(book.description.substring(0, 40)) + '...' : '-'}</span>
                            </div>
                        </div>
                    </td>
                    <td>${esc(book.author)}</td>
                    <td>${book.category ? `<span class="badge badge-light-info">${esc(book.category.name)}</span>` : '<span class="badge badge-light">-</span>'}</td>
                    <td class="text-muted">${esc(book.isbn || '-')}</td>
                    <td><span class="badge ${book.stock > 5 ? 'badge-light-success' : (book.stock > 0 ? 'badge-light-warning' : 'badge-light-danger')}">${book.stock}</span></td>
                    <td class="text-end">
                        <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Aksi <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                            <div class="menu-item px-3"><a href="#" class="menu-link px-3" onclick="showDetail(${book.id}); return false;"><i class="ki-duotone ki-eye fs-6 me-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i> Detail</a></div>
                            <div class="menu-item px-3"><a href="#" class="menu-link px-3" onclick="editBook(${book.id}); return false;"><i class="ki-duotone ki-pencil fs-6 me-2"><span class="path1"></span><span class="path2"></span></i> Edit</a></div>
                            <div class="menu-item px-3"><a href="#" class="menu-link px-3 text-danger" onclick="deleteBook(${book.id}, '${esc(book.title)}'); return false;"><i class="ki-duotone ki-trash fs-6 me-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i> Hapus</a></div>
                        </div>
                    </td>
                </tr>
            `).join('');
            KTMenu.init();
        }

        function showLoading() { spinner.classList.remove('d-none'); emptyState.classList.add('d-none'); tableWrap.classList.add('d-none'); }
        function showEmpty() { spinner.classList.add('d-none'); emptyState.classList.remove('d-none'); tableWrap.classList.add('d-none'); }

        // ====== TAMBAH ======
        document.getElementById('btn-tambah-buku').addEventListener('click', function () {
            resetForm();
            document.getElementById('modal-buku-title').textContent = 'Tambah Buku';
            populateFormSelect();
            modal.show();
        });

        // ====== SIMPAN ======
        document.getElementById('btn-simpan').addEventListener('click', async function () {
            const btn = this;
            const id = document.getElementById('form-buku-id').value;
            const payload = {
                title: document.getElementById('form-title').value,
                author: document.getElementById('form-author').value,
                category_id: document.getElementById('form-category').value || null,
                isbn: document.getElementById('form-isbn').value,
                stock: parseInt(document.getElementById('form-stock').value) || 0,
                description: document.getElementById('form-description').value,
            };
            if (!payload.title || !payload.author) {
                Swal.fire({ icon: 'warning', title: 'Oops', text: 'Judul dan Penulis wajib diisi.' });
                return;
            }
            btn.setAttribute('data-kt-indicator', 'on'); btn.disabled = true;
            try {
                const url = id ? `${API}/update-buku/${id}` : `${API}/tambah-buku`;
                const method = id ? 'PUT' : 'POST';
                const res = await fetch(url, { method, headers: { 'Content-Type': 'application/json', 'Accept': 'application/json', 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || '' }, body: JSON.stringify(payload) });
                const json = await res.json();
                if (json.success) { modal.hide(); Swal.fire({ icon: 'success', title: 'Berhasil!', text: json.message, timer: 1500, showConfirmButton: false }); fetchBooks(); }
                else { Swal.fire({ icon: 'error', title: 'Gagal', text: json.message || 'Terjadi kesalahan.' }); }
            } catch (e) { Swal.fire({ icon: 'error', title: 'Error', text: 'Tidak bisa terhubung ke server.' }); }
            finally { btn.removeAttribute('data-kt-indicator'); btn.disabled = false; }
        });

        // ====== EDIT ======
        window.editBook = function (id) {
            const book = allBooks.find(b => b.id === id);
            if (!book) return;
            resetForm();
            document.getElementById('modal-buku-title').textContent = 'Edit Buku';
            populateFormSelect(book.category_id);
            document.getElementById('form-buku-id').value = book.id;
            document.getElementById('form-title').value = book.title;
            document.getElementById('form-author').value = book.author;
            document.getElementById('form-isbn').value = book.isbn || '';
            document.getElementById('form-stock').value = book.stock;
            document.getElementById('form-description').value = book.description || '';
            modal.show();
        };

        // ====== DETAIL ======
        window.showDetail = function (id) {
            const book = allBooks.find(b => b.id === id);
            if (!book) return;
            const loans = book.loans ? book.loans.length : 0;
            const reviews = book.reviews ? book.reviews.length : 0;
            const avg = reviews ? (book.reviews.reduce((s,r) => s + r.rating, 0) / reviews).toFixed(1) : '-';

            document.getElementById('detail-body').innerHTML = `
                <div class="d-flex align-items-center mb-7">
                    <div class="symbol symbol-75px symbol-circle me-5"><div class="symbol-label fs-1 bg-light-primary text-primary"><i class="ki-duotone ki-book fs-2x"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i></div></div>
                    <div><div class="fs-3 fw-bold text-gray-800">${esc(book.title)}</div><div class="text-muted fs-6">oleh ${esc(book.author)}</div></div>
                </div>
                <div class="separator separator-dashed my-5"></div>
                <div class="row mb-7"><label class="col-lg-4 fw-semibold text-muted">Kategori</label><div class="col-lg-8"><span class="fw-bold fs-6 text-gray-800">${book.category ? esc(book.category.name) : '-'}</span></div></div>
                <div class="row mb-7"><label class="col-lg-4 fw-semibold text-muted">ISBN</label><div class="col-lg-8"><span class="fw-bold fs-6 text-gray-800">${esc(book.isbn || '-')}</span></div></div>
                <div class="row mb-7"><label class="col-lg-4 fw-semibold text-muted">Stok</label><div class="col-lg-8"><span class="badge ${book.stock > 5 ? 'badge-light-success' : (book.stock > 0 ? 'badge-light-warning' : 'badge-light-danger')} fs-6">${book.stock} eksemplar</span></div></div>
                <div class="row mb-7"><label class="col-lg-4 fw-semibold text-muted">Total Peminjaman</label><div class="col-lg-8"><span class="fw-bold fs-6 text-gray-800">${loans}x</span></div></div>
                <div class="row mb-7"><label class="col-lg-4 fw-semibold text-muted">Rating</label><div class="col-lg-8"><span class="fw-bold fs-6 text-gray-800">${avg} (${reviews} review)</span></div></div>
                ${book.description ? `<div class="separator separator-dashed my-5"></div><div><label class="fw-semibold text-muted mb-2 d-block">Deskripsi</label><p class="text-gray-800 fs-6">${esc(book.description)}</p></div>` : ''}`;
            detailModal.show();
        };

        // ====== DELETE ======
        window.deleteBook = function (id, title) {
            Swal.fire({ title: 'Hapus buku ini?', html: `Buku <strong>${esc(title)}</strong> akan dihapus permanen.`, icon: 'warning', showCancelButton: true, confirmButtonText: 'Ya, hapus', cancelButtonText: 'Batal', customClass: { confirmButton: 'btn btn-danger', cancelButton: 'btn btn-light' } }).then(async (r) => {
                if (r.isConfirmed) {
                    try {
                        const res = await fetch(`${API}/hapus-buku/${id}`, { method: 'DELETE', headers: { 'Accept': 'application/json', 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || '' } });
                        const json = await res.json();
                        Swal.fire({ icon: 'success', title: 'Dihapus!', text: json.message, timer: 1500, showConfirmButton: false });
                        fetchBooks();
                    } catch (e) { Swal.fire({ icon: 'error', title: 'Gagal', text: 'Tidak bisa menghapus buku.' }); }
                }
            });
        };

        // ====== HELPERS ======
        function resetForm() { document.getElementById('form-buku').reset(); document.getElementById('form-buku-id').value = ''; }
        function esc(s) { if (!s) return ''; const d = document.createElement('div'); d.textContent = s; return d.innerHTML; }

        // ====== INIT ======
        document.getElementById('btn-refresh').addEventListener('click', () => { fetchCategories(); fetchBooks(); });
        fetchCategories().then(() => fetchBooks());
    });
    </script>
    @endpush
</x-layout>
