<x-layout title="Koleksi Buku — Perpustakaan">
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Koleksi Buku</h1>
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <li class="breadcrumb-item text-muted">
                        <a href="/dashboard" class="text-muted text-hover-primary">Beranda</a>
                    </li>
                    <li class="breadcrumb-item"><span class="bullet bg-gray-400 w-5px h-2px"></span></li>
                    <li class="breadcrumb-item text-muted">Koleksi Buku</li>
                </ul>
            </div>
            <div class="d-flex align-items-center gap-2 gap-lg-3">
                <div class="m-0">
                    <input type="text" id="search-buku" class="form-control form-control-solid w-250px ps-13" placeholder="Cari judul buku..." />
                </div>
                <div class="m-0">
                    <select id="filter-kategori" class="form-select form-select-solid w-150px">
                        <option value="">Semua Kategori</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-fluid">
            <div class="row g-5 g-xl-8" id="buku-container">
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-detail" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-800px">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="fw-bold" id="detail-title">Detail Buku</h2>
                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                    </div>
                </div>
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                    <div class="d-flex flex-column flex-xl-row">
                        <div class="flex-column flex-lg-row-auto w-100 w-xl-250px mb-10">
                            <div class="card mb-5 mb-xl-8">
                                <div class="card-body d-flex flex-center flex-column p-9">
                                    <div class="symbol symbol-150px symbol-2by3 mb-5">
                                        <div class="symbol-label fs-1 bg-light-primary text-primary" id="detail-cover-text">?</div>
                                        <img src="" id="detail-cover-img" class="d-none w-100 h-100 object-fit-cover rounded" alt="Cover" />
                                    </div>
                                    <span class="badge badge-light-success mb-2" id="detail-stock">Stok: 0</span>
                                    <span class="badge badge-light-info" id="detail-category">Kategori</span>
                                </div>
                            </div>
                        </div>
                        <div class="flex-lg-row-fluid ms-lg-15">
                            <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-8">
                                <li class="nav-item">
                                    <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab" href="#tab_informasi">Informasi</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#tab_review">Review</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="tab_informasi" role="tabpanel">
                                    <div class="row mb-7">
                                        <label class="col-lg-4 fw-semibold text-muted">Judul Buku</label>
                                        <div class="col-lg-8"><span class="fw-bold fs-6 text-gray-800" id="info-title"></span></div>
                                    </div>
                                    <div class="row mb-7">
                                        <label class="col-lg-4 fw-semibold text-muted">Penulis</label>
                                        <div class="col-lg-8"><span class="fw-bold fs-6 text-gray-800" id="info-author"></span></div>
                                    </div>
                                    <div class="row mb-7">
                                        <label class="col-lg-4 fw-semibold text-muted">Penerbit</label>
                                        <div class="col-lg-8"><span class="fw-bold fs-6 text-gray-800" id="info-publisher"></span></div>
                                    </div>
                                    <div class="row mb-7">
                                        <label class="col-lg-4 fw-semibold text-muted">Tahun Terbit</label>
                                        <div class="col-lg-8"><span class="fw-bold fs-6 text-gray-800" id="info-year"></span></div>
                                    </div>
                                    <div class="row mb-7">
                                        <label class="col-lg-4 fw-semibold text-muted">ISBN</label>
                                        <div class="col-lg-8"><span class="fw-bold fs-6 text-gray-800" id="info-isbn"></span></div>
                                    </div>
                                    <div class="row mb-7">
                                        <label class="col-lg-12 fw-semibold text-muted">Deskripsi</label>
                                        <div class="col-lg-12 mt-2"><span class="fw-semibold fs-6 text-gray-800" id="info-desc"></span></div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab_review" role="tabpanel">
                                    <div id="reviews-container"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer flex-center" id="action-footer">
                    <button type="button" class="btn btn-light me-3" data-bs-dismiss="modal">Tutup</button>
                    
                    <div id="admin-action-container" class="d-none d-flex align-items-center gap-3">
                        <select id="select-member" class="form-select form-select-solid w-200px" data-control="select2" data-placeholder="Cari Member..." data-dropdown-parent="#modal-detail">
                            <option></option>
                        </select>
                        <button type="button" id="btn-force-pinjam" class="btn btn-danger d-none">
                            <span class="indicator-label">Force Pinjam</span>
                            <span class="indicator-progress">Memproses...<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                        <button type="button" id="btn-staff-pinjam" class="btn btn-primary d-none">
                            <span class="indicator-label">Pinjam Buku</span>
                            <span class="indicator-progress">Memproses...<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>

                    <div id="member-action-container" class="d-none">
                        <button type="button" id="btn-pinjam" class="btn btn-primary">
                            <span class="indicator-label">Pinjam Buku</span>
                            <span class="indicator-progress">Memproses...<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
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

        let currentUser = null;
        let currentMember = null;
        let allBooks = [];
        let allCategories = [];
        let allMembers = [];
        let selectedBookId = null;

        const container = document.getElementById('buku-container');
        const searchInput = document.getElementById('search-buku');
        const filterCat = document.getElementById('filter-kategori');
        const modalEl = document.getElementById('modal-detail');
        const modal = new bootstrap.Modal(modalEl);

        const btnForcePinjam = document.getElementById('btn-force-pinjam');
        const btnStaffPinjam = document.getElementById('btn-staff-pinjam');
        const btnPinjam = document.getElementById('btn-pinjam');
        const selectMember = document.getElementById('select-member');

        async function init() {
            try {
                const resUser = await fetch('/api/user', {
                    headers: { 'Accept': 'application/json', 'Authorization': `Bearer ${token}` }
                });
                const userData = await resUser.json();
                currentUser = userData.user;
                currentMember = userData.member;

                if (isAdmin() || isStaff()) {
                    document.getElementById('admin-action-container').classList.remove('d-none');
                    if (isAdmin()) {
                        btnForcePinjam.classList.remove('d-none');
                    } else {
                        btnStaffPinjam.classList.remove('d-none');
                    }
                    fetchMembers();
                } else if (isMember()) {
                    document.getElementById('member-action-container').classList.remove('d-none');
                }

                await fetchCategories();
                await fetchBooks();
            } catch (e) {
                console.error(e);
            }
        }

        function isAdmin() {
            return currentUser && currentUser.roles && currentUser.roles.some(r => r.name === 'admin');
        }

        function isStaff() {
            return currentUser && currentUser.roles && currentUser.roles.some(r => r.name === 'staff');
        }

        function isMember() {
            return currentUser && currentUser.roles && currentUser.roles.some(r => r.name === 'member');
        }

        async function fetchCategories() {
            const res = await fetch('/api/semua-categories', {
                headers: { 'Accept': 'application/json', 'Authorization': `Bearer ${token}` }
            });
            const json = await res.json();
            if (json.success) {
                allCategories = json.data;
                allCategories.forEach(c => {
                    const opt = document.createElement('option');
                    opt.value = c.id;
                    opt.textContent = c.name;
                    filterCat.appendChild(opt);
                });
            }
        }

        async function fetchMembers() {
            const res = await fetch('/api/semua-members', {
                headers: { 'Accept': 'application/json', 'Authorization': `Bearer ${token}` }
            });
            const json = await res.json();
            if (json.success) {
                allMembers = json.data;
                allMembers.forEach(m => {
                    const opt = document.createElement('option');
                    opt.value = m.id;
                    opt.textContent = `${m.member_code} - ${m.name}`;
                    selectMember.appendChild(opt);
                });
                if (typeof $ !== 'undefined') {
                    $(selectMember).select2({
                        dropdownParent: $('#modal-detail')
                    });
                }
            }
        }

        async function fetchBooks() {
            const res = await fetch('/api/semua-buku', {
                headers: { 'Accept': 'application/json', 'Authorization': `Bearer ${token}` }
            });
            const json = await res.json();
            if (json.success) {
                allBooks = json.data;
                renderBooks();
            }
        }

        function renderBooks() {
            const q = searchInput.value.toLowerCase();
            const c = filterCat.value;

            let filtered = allBooks;
            if (c) filtered = filtered.filter(b => b.category_id == c);
            if (q) filtered = filtered.filter(b => b.title.toLowerCase().includes(q) || b.author.toLowerCase().includes(q));

            if (!filtered.length) {
                container.innerHTML = `<div class="col-12 text-center py-10"><span class="text-muted fs-4">Tidak ada buku ditemukan.</span></div>`;
                return;
            }

            container.innerHTML = filtered.map(b => {
                const coverChar = b.title.charAt(0).toUpperCase();
                const stockBadge = b.stock > 0 
                    ? `<span class="badge badge-light-success fw-bold px-4 py-3">Stok: ${b.stock}</span>`
                    : `<span class="badge badge-light-danger fw-bold px-4 py-3">Habis</span>`;

                return `
                <div class="col-md-4 col-lg-3">
                    <div class="card h-100 shadow-sm hover-elevate-up">
                        <div class="card-body p-5 text-center d-flex flex-column">
                            <div class="symbol symbol-150px symbol-2by3 mx-auto mb-5">
                                ${b.cover_image 
                                    ? `<img src="/storage/${b.cover_image}" alt="cover" class="w-100 h-100 object-fit-cover rounded">`
                                    : `<div class="symbol-label fs-1 bg-light-primary text-primary">${coverChar}</div>`
                                }
                            </div>
                            <a href="#" class="text-gray-800 text-hover-primary fs-4 fw-bold mb-2 text-truncate" style="max-width: 100%; display: inline-block;">${esc(b.title)}</a>
                            <span class="text-muted fs-6 fw-semibold mb-5 text-truncate">${esc(b.author)}</span>
                            <div class="d-flex justify-content-center align-items-center mb-5 mt-auto">
                                ${stockBadge}
                            </div>
                            <button class="btn btn-sm btn-light-primary w-100" onclick="showDetail(${b.id})">Lihat Detail</button>
                        </div>
                    </div>
                </div>`;
            }).join('');
        }

        searchInput.addEventListener('input', renderBooks);
        filterCat.addEventListener('change', renderBooks);

        window.showDetail = function(id) {
            const b = allBooks.find(x => x.id === id);
            if (!b) return;

            selectedBookId = b.id;

            document.getElementById('detail-title').textContent = esc(b.title);
            document.getElementById('info-title').textContent = esc(b.title);
            document.getElementById('info-author').textContent = esc(b.author);
            document.getElementById('info-publisher').textContent = esc(b.publisher || '-');
            document.getElementById('info-year').textContent = esc(b.published_year || '-');
            document.getElementById('info-isbn').textContent = esc(b.isbn || '-');
            document.getElementById('info-desc').textContent = esc(b.description || '-');
            document.getElementById('detail-stock').textContent = `Stok: ${b.stock}`;
            document.getElementById('detail-category').textContent = b.category ? esc(b.category.name) : '-';

            const coverImg = document.getElementById('detail-cover-img');
            const coverText = document.getElementById('detail-cover-text');
            if (b.cover_image) {
                coverImg.src = `/storage/${b.cover_image}`;
                coverImg.classList.remove('d-none');
                coverText.classList.add('d-none');
            } else {
                coverText.textContent = b.title.charAt(0).toUpperCase();
                coverText.classList.remove('d-none');
                coverImg.classList.add('d-none');
            }

            const rc = document.getElementById('reviews-container');
            if (b.reviews && b.reviews.length) {
                rc.innerHTML = b.reviews.map(r => `
                    <div class="border border-dashed border-gray-300 rounded px-7 py-3 mb-5">
                        <div class="d-flex flex-stack mb-3">
                            <div class="me-3">
                                <span class="text-gray-800 fw-bold">${r.member ? esc(r.member.name) : 'Member'}</span>
                            </div>
                            <div class="m-0">
                                ${Array(5).fill(0).map((_, i) => `<i class="ki-duotone ki-star fs-4 ${i < r.rating ? 'text-warning' : 'text-muted'}"></i>`).join('')}
                            </div>
                        </div>
                        <div class="fs-6 fw-normal text-gray-700">${esc(r.comment || '')}</div>
                    </div>
                `).join('');
            } else {
                rc.innerHTML = `<div class="text-muted text-center py-5">Belum ada review untuk buku ini.</div>`;
            }

            if (isAdmin() || isStaff()) {
                if (typeof $ !== 'undefined') {
                    $(selectMember).val(null).trigger('change');
                } else {
                    selectMember.value = "";
                }
                if (isAdmin()) {
                    btnForcePinjam.disabled = (b.stock <= 0);
                } else {
                    btnStaffPinjam.disabled = (b.stock <= 0);
                }
            }
            if (isMember()) {
                btnPinjam.disabled = (b.stock <= 0);
            }

            modal.show();
        };

        if (btnForcePinjam) {
            btnForcePinjam.addEventListener('click', async function() {
                if (!selectedBookId) return;
                const mid = selectMember.value;
                if (!mid) {
                    Swal.fire({icon: 'warning', title: 'Perhatian', text: 'Pilih member terlebih dahulu!'});
                    return;
                }

                this.setAttribute('data-kt-indicator', 'on');
                this.disabled = true;

                try {
                    const res = await fetch('/api/admin/force-pinjam', {
                        method: 'POST',
                        headers: { 
                            'Content-Type': 'application/json', 
                            'Accept': 'application/json',
                            'Authorization': `Bearer ${token}`,
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        },
                        body: JSON.stringify({ book_id: selectedBookId, member_id: mid })
                    });
                    const json = await res.json();
                    if (json.success) {
                        modal.hide();
                        Swal.fire({icon: 'success', title: 'Berhasil', text: 'Force pinjam berhasil dilakukan!'});
                        fetchBooks();
                    } else {
                        Swal.fire({icon: 'error', title: 'Gagal', text: json.message || 'Terjadi kesalahan'});
                    }
                } catch (e) {
                    Swal.fire({icon: 'error', title: 'Error', text: 'Koneksi gagal.'});
                } finally {
                    this.removeAttribute('data-kt-indicator');
                    this.disabled = false;
                }
            });
        }

        if (btnStaffPinjam) {
            btnStaffPinjam.addEventListener('click', async function() {
                if (!selectedBookId) return;
                const mid = selectMember.value;
                if (!mid) {
                    Swal.fire({icon: 'warning', title: 'Perhatian', text: 'Pilih member terlebih dahulu!'});
                    return;
                }

                this.setAttribute('data-kt-indicator', 'on');
                this.disabled = true;

                try {
                    const res = await fetch('/api/staff/pinjam-buku', {
                        method: 'POST',
                        headers: { 
                            'Content-Type': 'application/json', 
                            'Accept': 'application/json',
                            'Authorization': `Bearer ${token}`,
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        },
                        body: JSON.stringify({ book_id: selectedBookId, member_id: mid })
                    });
                    const json = await res.json();
                    if (json.success) {
                        modal.hide();
                        Swal.fire({icon: 'success', title: 'Berhasil', text: 'Peminjaman buku berhasil dicatat!'});
                        fetchBooks();
                    } else {
                        Swal.fire({icon: 'error', title: 'Gagal', text: json.message || 'Terjadi kesalahan'});
                    }
                } catch (e) {
                    Swal.fire({icon: 'error', title: 'Error', text: 'Koneksi gagal.'});
                } finally {
                    this.removeAttribute('data-kt-indicator');
                    this.disabled = false;
                }
            });
        }

        if (btnPinjam) {
            btnPinjam.addEventListener('click', async function() {
                if (!currentMember) {
                    Swal.fire({icon: 'error', title: 'Data Member Tidak Ditemukan', text: 'Akun Anda belum ditautkan dengan data Member di sistem. Silakan hubungi admin.'});
                    return;
                }
                if (!selectedBookId) return;

                this.setAttribute('data-kt-indicator', 'on');
                this.disabled = true;

                try {
                    const res = await fetch('/api/member/request-pinjam', {
                        method: 'POST',
                        headers: { 
                            'Content-Type': 'application/json', 
                            'Accept': 'application/json',
                            'Authorization': `Bearer ${token}`,
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        },
                        body: JSON.stringify({ book_id: selectedBookId, member_id: currentMember.id })
                    });
                    const json = await res.json();
                    if (json.success) {
                        modal.hide();
                        Swal.fire({icon: 'success', title: 'Berhasil', text: 'Request peminjaman berhasil dibuat. Silakan ambil buku di perpustakaan.'});
                        fetchBooks();
                    } else {
                        Swal.fire({icon: 'error', title: 'Gagal', text: json.message || 'Terjadi kesalahan'});
                    }
                } catch (e) {
                    Swal.fire({icon: 'error', title: 'Error', text: 'Koneksi gagal.'});
                } finally {
                    this.removeAttribute('data-kt-indicator');
                    this.disabled = false;
                }
            });
        }

        function esc(s) {
            if (!s) return '';
            const d = document.createElement('div');
            d.textContent = s;
            return d.innerHTML;
        }

        init();
    });
    </script>
    @endpush
</x-layout>
