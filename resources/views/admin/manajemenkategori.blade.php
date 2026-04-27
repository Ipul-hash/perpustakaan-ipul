<x-layout title="Manajemen Kategori — Perpustakaan">

    {{-- Toolbar --}}
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Manajemen Kategori</h1>
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <li class="breadcrumb-item text-muted">
                        <a href="/dashboard" class="text-muted text-hover-primary">Beranda</a>
                    </li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-muted">Master Data</li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-muted">Manajemen Kategori</li>
                </ul>
            </div>
            <div class="d-flex align-items-center gap-2 gap-lg-3">
                <button type="button" class="btn btn-sm fw-bold btn-primary" id="btn-tambah-kategori">
                    <i class="ki-duotone ki-plus fs-2"></i>
                    Tambah Kategori
                </button>
            </div>
        </div>
    </div>

    {{-- Content --}}
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-fluid">

            <div class="row g-5 g-xl-8">
                {{-- Card Tabel --}}
                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-header border-0 pt-6">
                            <div class="card-title">
                                <div class="d-flex align-items-center position-relative my-1">
                                    <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                    <input type="text" class="form-control form-control-solid w-250px ps-13" placeholder="Cari kategori..." id="input-search" />
                                </div>
                            </div>
                            <div class="card-toolbar">
                                <button type="button" class="btn btn-light-primary me-3" id="btn-refresh">
                                    <i class="ki-duotone ki-arrows-loop fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                    Refresh
                                </button>
                            </div>
                        </div>

                        <div class="card-body py-4">
                            {{-- Loading --}}
                            <div class="d-flex justify-content-center py-10" id="loading-spinner">
                                <div class="spinner-border text-primary" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </div>

                            {{-- Empty --}}
                            <div class="d-none text-center py-10" id="empty-state">
                                <img src="{{ asset('assets/media/illustrations/sketchy-1/5.png') }}" alt="empty" class="w-200px mb-7" />
                                <div class="fw-semibold fs-4 text-gray-600">Belum ada data kategori.</div>
                                <div class="text-muted fs-7">Klik "Tambah Kategori" untuk memulai.</div>
                            </div>

                            {{-- Table --}}
                            <div class="table-responsive d-none" id="table-wrapper">
                                <table class="table align-middle table-row-dashed fs-6 gy-5" id="tabel-kategori">
                                    <thead>
                                        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                            <th class="w-10px pe-2">No</th>
                                            <th class="min-w-200px">Nama Kategori</th>
                                            <th class="min-w-125px">Slug</th>
                                            <th class="min-w-100px">Jumlah Buku</th>
                                            <th class="text-end min-w-100px">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-gray-600 fw-semibold" id="tbody-kategori">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Card Ringkasan --}}
                <div class="col-xl-4">
                    <div class="card mb-5 mb-xl-8">
                        <div class="card-header border-0">
                            <h3 class="card-title fw-bold text-dark">Ringkasan Kategori</h3>
                        </div>
                        <div class="card-body pt-2" id="ringkasan-body">
                            <div class="d-flex justify-content-center py-5">
                                <span class="text-muted fs-7">Memuat data...</span>
                            </div>
                        </div>
                    </div>

                    {{-- Info Card --}}
                    <div class="card bg-light-primary">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-4">
                                <div class="symbol symbol-40px me-4">
                                    <span class="symbol-label bg-primary">
                                        <i class="ki-duotone ki-information-3 fs-2 text-white">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </span>
                                </div>
                                <div class="fw-bold text-primary fs-5">Informasi</div>
                            </div>
                            <div class="fs-7 text-gray-700">
                                Kategori digunakan untuk mengelompokkan buku agar lebih mudah dicari. Setiap buku hanya bisa memiliki satu kategori.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    {{-- ============================================================= --}}
    {{-- MODAL TAMBAH / EDIT KATEGORI --}}
    {{-- ============================================================= --}}
    <div class="modal fade" id="modal-kategori" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-500px">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="fw-bold" id="modal-kategori-title">Tambah Kategori</h2>
                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </div>
                </div>
                <div class="modal-body scroll-y mx-5 mx-xl-10 my-7">
                    <form id="form-kategori">
                        <input type="hidden" id="form-kategori-id" />

                        <div class="fv-row mb-7">
                            <label class="required fw-semibold fs-6 mb-2">Nama Kategori</label>
                            <input type="text" id="form-name" class="form-control form-control-solid" placeholder="Contoh: Fiksi, Programming, Sejarah..." />
                        </div>

                        <div class="fv-row mb-7">
                            <label class="fw-semibold fs-6 mb-2">Slug</label>
                            <input type="text" id="form-slug" class="form-control form-control-solid" placeholder="Otomatis dari nama (opsional)" />
                            <div class="form-text">Biarkan kosong untuk generate otomatis dari nama.</div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer flex-center">
                    <button type="button" class="btn btn-light me-3" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" id="btn-simpan">
                        <span class="indicator-label">Simpan</span>
                        <span class="indicator-progress">Menyimpan...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- ============================================================= --}}
    {{-- JAVASCRIPT --}}
    {{-- ============================================================= --}}
    @push('scripts')
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const API_BASE    = '/api';
        const tbody       = document.getElementById('tbody-kategori');
        const spinner     = document.getElementById('loading-spinner');
        const emptyState  = document.getElementById('empty-state');
        const tableWrap   = document.getElementById('table-wrapper');
        const searchInput = document.getElementById('input-search');
        const nameInput   = document.getElementById('form-name');
        const slugInput   = document.getElementById('form-slug');

        const modalEl = document.getElementById('modal-kategori');
        const modal   = new bootstrap.Modal(modalEl);

        let allCategories = [];

        // Warna badge yang bergilir biar ga monoton
        const badgeColors = ['primary', 'success', 'info', 'warning', 'danger'];

        // ==========================================
        // FETCH SEMUA KATEGORI
        // ==========================================
        async function fetchCategories() {
            showLoading();
            try {
                const res  = await fetch(`${API_BASE}/semua-categories`);
                const json = await res.json();

                if (json.success) {
                    allCategories = json.data;
                    renderTable(allCategories);
                    renderRingkasan(allCategories);
                } else {
                    showEmpty();
                }
            } catch (err) {
                console.error('Gagal fetch kategori:', err);
                showEmpty();
            }
        }

        // ==========================================
        // RENDER TABLE
        // ==========================================
        function renderTable(categories) {
            if (!categories.length) {
                showEmpty();
                renderRingkasan([]);
                return;
            }

            spinner.classList.add('d-none');
            emptyState.classList.add('d-none');
            tableWrap.classList.remove('d-none');

            tbody.innerHTML = categories.map((cat, i) => {
                const color = badgeColors[i % badgeColors.length];
                const bookCount = cat.books_count !== undefined ? cat.books_count : (cat.books ? cat.books.length : '-');
                return `
                <tr>
                    <td>${i + 1}</td>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="symbol symbol-circle symbol-40px overflow-hidden me-3">
                                <div class="symbol-label bg-light-${color} text-${color} fw-bold fs-6">
                                    ${escHtml(cat.name.charAt(0).toUpperCase())}
                                </div>
                            </div>
                            <span class="text-gray-800 fw-bold">${escHtml(cat.name)}</span>
                        </div>
                    </td>
                    <td><code class="text-muted">${escHtml(cat.slug || '-')}</code></td>
                    <td>
                        <span class="badge badge-light-${color} fs-7">${bookCount} buku</span>
                    </td>
                    <td class="text-end">
                        <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                            Aksi
                            <i class="ki-duotone ki-down fs-5 ms-1"></i>
                        </a>
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3" onclick="editCategory(${cat.id}); return false;">
                                    <i class="ki-duotone ki-pencil fs-6 me-2"><span class="path1"></span><span class="path2"></span></i> Edit
                                </a>
                            </div>
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3 text-danger" onclick="deleteCategory(${cat.id}, '${escHtml(cat.name)}'); return false;">
                                    <i class="ki-duotone ki-trash fs-6 me-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i> Hapus
                                </a>
                            </div>
                        </div>
                    </td>
                </tr>`;
            }).join('');

            KTMenu.init();
        }

        // ==========================================
        // RENDER RINGKASAN (sidebar kanan)
        // ==========================================
        function renderRingkasan(categories) {
            const body = document.getElementById('ringkasan-body');

            if (!categories.length) {
                body.innerHTML = '<div class="text-center py-5 text-muted fs-7">Belum ada data.</div>';
                return;
            }

            const total = categories.length;
            body.innerHTML = `
                <div class="d-flex align-items-center mb-5">
                    <div class="border border-gray-300 border-dashed rounded py-3 px-4 w-100">
                        <div class="fs-2 fw-bold text-gray-800">${total}</div>
                        <div class="fw-semibold text-gray-400 fs-7">Total Kategori</div>
                    </div>
                </div>
                <div class="separator separator-dashed my-4"></div>
                <div class="fw-semibold text-gray-600 fs-7 mb-3">Daftar Kategori:</div>
                ${categories.slice(0, 10).map((cat, i) => {
                    const color = badgeColors[i % badgeColors.length];
                    const bookCount = cat.books_count !== undefined ? cat.books_count : (cat.books ? cat.books.length : 0);
                    return `
                    <div class="d-flex align-items-center mb-4">
                        <span class="bullet bullet-vertical h-25px bg-${color} me-3"></span>
                        <div class="flex-grow-1">
                            <span class="text-gray-800 fw-semibold fs-6">${escHtml(cat.name)}</span>
                        </div>
                        <span class="badge badge-light-${color} fs-8">${bookCount}</span>
                    </div>`;
                }).join('')}
                ${categories.length > 10 ? `<div class="text-muted fs-8 mt-2">...dan ${categories.length - 10} lainnya</div>` : ''}
            `;
        }

        // ==========================================
        // SHOW LOADING / EMPTY
        // ==========================================
        function showLoading() {
            spinner.classList.remove('d-none');
            emptyState.classList.add('d-none');
            tableWrap.classList.add('d-none');
        }

        function showEmpty() {
            spinner.classList.add('d-none');
            emptyState.classList.remove('d-none');
            tableWrap.classList.add('d-none');
        }

        // ==========================================
        // SEARCH
        // ==========================================
        searchInput.addEventListener('keyup', function () {
            const q = this.value.toLowerCase();
            const filtered = allCategories.filter(c =>
                c.name.toLowerCase().includes(q) ||
                (c.slug && c.slug.toLowerCase().includes(q))
            );
            renderTable(filtered);
        });

        // ==========================================
        // AUTO-SLUG dari nama
        // ==========================================
        nameInput.addEventListener('keyup', function () {
            if (!document.getElementById('form-kategori-id').value) {
                slugInput.value = this.value
                    .toLowerCase()
                    .replace(/[^a-z0-9\s-]/g, '')
                    .replace(/\s+/g, '-')
                    .replace(/-+/g, '-');
            }
        });

        // ==========================================
        // TAMBAH — buka modal kosong
        // ==========================================
        document.getElementById('btn-tambah-kategori').addEventListener('click', function () {
            resetForm();
            document.getElementById('modal-kategori-title').textContent = 'Tambah Kategori';
            modal.show();
        });

        // ==========================================
        // SIMPAN (Tambah / Update)
        // ==========================================
        document.getElementById('btn-simpan').addEventListener('click', async function () {
            const btn = this;
            const id  = document.getElementById('form-kategori-id').value;

            const payload = {
                name: nameInput.value.trim(),
                slug: slugInput.value.trim(),
            };

            if (!payload.name) {
                Swal.fire({ icon: 'warning', title: 'Oops', text: 'Nama kategori wajib diisi.' });
                return;
            }

            if (!payload.slug) {
                payload.slug = payload.name.toLowerCase().replace(/[^a-z0-9\s-]/g, '').replace(/\s+/g, '-').replace(/-+/g, '-');
            }

            btn.setAttribute('data-kt-indicator', 'on');
            btn.disabled = true;

            try {
                let url, method;
                if (id) {
                    url    = `${API_BASE}/update-category/${id}`;
                    method = 'PUT';
                } else {
                    url    = `${API_BASE}/tambah-category`;
                    method = 'POST';
                }

                const res = await fetch(url, {
                    method,
                    headers: {
                        'Content-Type':  'application/json',
                        'Accept':        'application/json',
                        'X-CSRF-TOKEN':  document.querySelector('meta[name="csrf-token"]')?.content || '',
                    },
                    body: JSON.stringify(payload),
                });
                const json = await res.json();

                if (json.success) {
                    modal.hide();
                    Swal.fire({ icon: 'success', title: 'Berhasil!', text: json.message, timer: 1500, showConfirmButton: false });
                    fetchCategories();
                } else {
                    Swal.fire({ icon: 'error', title: 'Gagal', text: json.message || 'Terjadi kesalahan.' });
                }
            } catch (err) {
                Swal.fire({ icon: 'error', title: 'Error', text: 'Tidak bisa terhubung ke server.' });
                console.error(err);
            } finally {
                btn.removeAttribute('data-kt-indicator');
                btn.disabled = false;
            }
        });

        // ==========================================
        // EDIT
        // ==========================================
        window.editCategory = function (id) {
            const cat = allCategories.find(c => c.id === id);
            if (!cat) return;

            resetForm();
            document.getElementById('modal-kategori-title').textContent = 'Edit Kategori';
            document.getElementById('form-kategori-id').value = cat.id;
            nameInput.value = cat.name;
            slugInput.value = cat.slug || '';
            modal.show();
        };

        // ==========================================
        // DELETE
        // ==========================================
        window.deleteCategory = function (id, name) {
            Swal.fire({
                title: 'Hapus kategori ini?',
                html:  `Kategori <strong>${escHtml(name)}</strong> akan dihapus permanen.`,
                icon:  'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, hapus',
                cancelButtonText: 'Batal',
                customClass: {
                    confirmButton: 'btn btn-danger',
                    cancelButton:  'btn btn-light',
                },
            }).then(async (result) => {
                if (result.isConfirmed) {
                    try {
                        const res = await fetch(`${API_BASE}/hapus-category/${id}`, {
                            method: 'DELETE',
                            headers: {
                                'Accept': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || '',
                            },
                        });
                        const json = await res.json();
                        Swal.fire({ icon: 'success', title: 'Dihapus!', text: json.message, timer: 1500, showConfirmButton: false });
                        fetchCategories();
                    } catch (err) {
                        Swal.fire({ icon: 'error', title: 'Gagal', text: 'Tidak bisa menghapus kategori.' });
                    }
                }
            });
        };

        // ==========================================
        // HELPERS
        // ==========================================
        function resetForm() {
            document.getElementById('form-kategori').reset();
            document.getElementById('form-kategori-id').value = '';
        }

        function escHtml(str) {
            if (!str) return '';
            const div = document.createElement('div');
            div.textContent = str;
            return div.innerHTML;
        }

        // ==========================================
        // REFRESH & INIT
        // ==========================================
        document.getElementById('btn-refresh').addEventListener('click', fetchCategories);
        fetchCategories();
    });
    </script>
    @endpush
</x-layout>
