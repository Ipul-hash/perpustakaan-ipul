<x-layout title="Manajemen Anggota — Perpustakaan">
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Manajemen Anggota</h1>
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <li class="breadcrumb-item text-muted">
                        <a href="/dashboard" class="text-muted text-hover-primary">Beranda</a>
                    </li>
                    <li class="breadcrumb-item"><span class="bullet bg-gray-400 w-5px h-2px"></span></li>
                    <li class="breadcrumb-item text-muted">Master Data</li>
                    <li class="breadcrumb-item"><span class="bullet bg-gray-400 w-5px h-2px"></span></li>
                    <li class="breadcrumb-item text-muted">Manajemen Anggota</li>
                </ul>
            </div>
            <div class="d-flex align-items-center gap-2 gap-lg-3">
                <button type="button" class="btn btn-sm fw-bold btn-primary" data-bs-toggle="modal" data-bs-target="#modal-anggota">
                    <i class="ki-duotone ki-plus fs-2"></i> Tambah Anggota
                </button>
            </div>
        </div>
    </div>
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-fluid">
            <div class="row g-5 g-xl-8">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header border-0 pt-6">
                            <div class="card-title">
                                <div class="d-flex align-items-center position-relative my-1">
                                    <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
                                        <span class="path1"></span><span class="path2"></span>
                                    </i>
                                    <input type="text" class="form-control form-control-solid w-250px ps-13" placeholder="Cari anggota..." />
                                </div>
                            </div>
                            <div class="card-toolbar">
                                <div class="d-flex justify-content-end align-items-center gap-3">
                                    <select class="form-select form-select-solid w-175px">
                                        <option value="">Semua Status</option>
                                        <option value="active">Aktif</option>
                                        <option value="inactive">Nonaktif</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card-body py-4">
                            <div class="table-responsive">
                                <table class="table align-middle table-row-dashed fs-6 gy-5">
                                    <thead>
                                        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                            <th class="w-10px pe-2">No</th>
                                            <th class="min-w-200px">Nama Anggota</th>
                                            <th class="min-w-125px">Email</th>
                                            <th class="min-w-125px">No. Telepon</th>
                                            <th class="min-w-100px">Status</th>
                                            <th class="text-end min-w-100px">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-gray-600 fw-semibold" id="tbody-petugas">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-anggota" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="fw-bold" id="modal-title">Tambah Petugas</h2>
                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                    </div>
                </div>
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                    <form id="form-petugas">
                        <input type="hidden" id="form-id" />
                        <div class="fv-row mb-7">
                            <label class="required fw-semibold fs-6 mb-2">Nama Anggota</label>
                            <input type="text" id="form-name" class="form-control form-control-solid" placeholder="Masukkan nama petugas" />
                        </div>
                        <div class="fv-row mb-7">
                            <label class="required fw-semibold fs-6 mb-2">Email</label>
                            <input type="email" id="form-email" class="form-control form-control-solid" placeholder="Masukkan alamat email" />
                        </div>
                        <div class="fv-row mb-7">
                            <label class="required fw-semibold fs-6 mb-2">Password</label>
                            <input type="password" id="form-password" class="form-control form-control-solid" placeholder="Masukkan password (minimal 6 karakter)" />
                            <div class="form-text">Kosongkan jika tidak ingin mengubah password saat edit.</div>
                        </div>
                        <div class="fv-row mb-7">
                            <label class="required fw-semibold fs-6 mb-2">No. Telepon</label>
                            <input type="text" id="form-phone" class="form-control form-control-solid" placeholder="Masukkan nomor telepon" />
                        </div>
                        <div class="fv-row mb-7">
                            <label class="fw-semibold fs-6 mb-2">Alamat</label>
                            <textarea id="form-address" class="form-control form-control-solid" rows="3" placeholder="Masukkan alamat lengkap"></textarea>
                        </div>
                        <div class="fv-row mb-7">
                            <label class="required fw-semibold fs-6 mb-2">Status</label>
                            <select id="form-status" class="form-select form-select-solid">
                                <option value="active">Aktif</option>
                                <option value="inactive">Nonaktif</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer flex-center">
                    <button type="button" class="btn btn-light me-3" data-bs-dismiss="modal">Batal</button>
                    <button type="button" id="btn-simpan" class="btn btn-primary">
                        <span class="indicator-label">Simpan</span>
                        <span class="indicator-progress">Menyimpan...<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const API = '/api/admin';
        let allPetugas = [];
        
        const tbody = document.getElementById('tbody-petugas');
        const modalEl = document.getElementById('modal-anggota');
        const modal = new bootstrap.Modal(modalEl);
        const searchInput = document.querySelector('input[placeholder="Cari anggota..."]');
        const statusFilter = document.querySelector('select:not(#form-status)');
        
        async function fetchData() {
            try {
                const token = localStorage.getItem('auth_token');
                if (!token) { window.location.href = '/login'; return; }
                
                const res = await fetch(`${API}/semua-petugas`, {
                    headers: { 'Accept': 'application/json', 'Authorization': `Bearer ${token}` }
                });
                const json = await res.json();
                if (json.success) {
                    allPetugas = json.data;
                    renderTable();
                }
            } catch (e) {
                console.error(e);
            }
        }

        function renderTable() {
            const q = searchInput.value.toLowerCase();
            const s = statusFilter.value;
            
            let filtered = allPetugas;
            if (s) filtered = filtered.filter(p => p.status === s);
            if (q) filtered = filtered.filter(p => 
                (p.name && p.name.toLowerCase().includes(q)) || 
                (p.email && p.email.toLowerCase().includes(q))
            );
            
            if (!filtered.length) {
                tbody.innerHTML = `<tr><td colspan="6" class="text-center text-muted py-5">Belum ada data petugas.</td></tr>`;
                return;
            }
            
            tbody.innerHTML = filtered.map((p, i) => `
                <tr>
                    <td>${i + 1}</td>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                <div class="symbol-label fs-3 bg-light-primary text-primary">${p.name ? p.name.charAt(0).toUpperCase() : '?'}</div>
                            </div>
                            <div class="d-flex flex-column">
                                <span class="text-gray-800 fw-bold mb-1">${esc(p.name)}</span>
                            </div>
                        </div>
                    </td>
                    <td>${esc(p.email)}</td>
                    <td>${esc(p.phone || '-')}</td>
                    <td><span class="badge ${p.status === 'active' ? 'badge-light-success' : 'badge-light-danger'}">${p.status === 'active' ? 'Aktif' : 'Nonaktif'}</span></td>
                    <td class="text-end">
                        <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Aksi <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                            <div class="menu-item px-3"><a href="#" class="menu-link px-3" onclick="editPetugas(${p.id}); return false;"><i class="ki-duotone ki-pencil fs-6 me-2"></i> Edit</a></div>
                            <div class="menu-item px-3"><a href="#" class="menu-link px-3 text-danger" onclick="hapusPetugas(${p.id}, '${esc(p.name)}'); return false;"><i class="ki-duotone ki-trash fs-6 me-2"></i> Hapus</a></div>
                        </div>
                    </td>
                </tr>
            `).join('');
            
            KTMenu.init();
        }

        searchInput.addEventListener('input', renderTable);
        statusFilter.addEventListener('change', renderTable);

        document.querySelector('button[data-bs-target="#modal-anggota"]').addEventListener('click', () => {
            document.getElementById('form-petugas').reset();
            document.getElementById('form-id').value = '';
            document.getElementById('modal-title').textContent = 'Tambah Petugas';
        });

        document.getElementById('btn-simpan').addEventListener('click', async function () {
            const btn = this;
            const id = document.getElementById('form-id').value;
            const payload = {
                name: document.getElementById('form-name').value,
                email: document.getElementById('form-email').value,
                phone: document.getElementById('form-phone').value,
                address: document.getElementById('form-address').value,
                status: document.getElementById('form-status').value
            };
            
            const password = document.getElementById('form-password').value;
            if (password) {
                payload.password = password;
            }
            
            if (!payload.name || !payload.email) {
                Swal.fire({ icon: 'warning', title: 'Oops', text: 'Nama dan Email wajib diisi.' });
                return;
            }

            if (!id && !payload.password) {
                Swal.fire({ icon: 'warning', title: 'Oops', text: 'Password wajib diisi untuk anggota baru.' });
                return;
            }
            
            btn.setAttribute('data-kt-indicator', 'on');
            btn.disabled = true;
            
            try {
                const token = localStorage.getItem('auth_token');
                const url = id ? `${API}/update-petugas/${id}` : `${API}/tambah-petugas`;
                const method = id ? 'PUT' : 'POST';
                
                const res = await fetch(url, {
                    method,
                    headers: { 
                        'Content-Type': 'application/json', 
                        'Accept': 'application/json',
                        'Authorization': `Bearer ${token}`,
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify(payload)
                });
                const json = await res.json();
                
                if (json.success) {
                    modal.hide();
                    Swal.fire({ icon: 'success', title: 'Berhasil!', text: json.message, timer: 1500, showConfirmButton: false });
                    fetchData();
                } else {
                    Swal.fire({ icon: 'error', title: 'Gagal', text: json.message || 'Terjadi kesalahan.' });
                }
            } catch (e) {
                Swal.fire({ icon: 'error', title: 'Error', text: 'Tidak bisa terhubung ke server.' });
            } finally {
                btn.removeAttribute('data-kt-indicator');
                btn.disabled = false;
            }
        });

        window.editPetugas = function (id) {
            const p = allPetugas.find(x => x.id === id);
            if (!p) return;
            
            document.getElementById('form-id').value = p.id;
            document.getElementById('form-name').value = p.name;
            document.getElementById('form-email').value = p.email;
            document.getElementById('form-password').value = '';
            document.getElementById('form-phone').value = p.phone || '';
            document.getElementById('form-address').value = p.address || '';
            document.getElementById('form-status').value = p.status || 'active';
            
            document.getElementById('modal-title').textContent = 'Edit Petugas';
            modal.show();
        };

        window.hapusPetugas = function (id, name) {
            Swal.fire({
                title: 'Hapus Petugas?',
                text: `Petugas ${name} akan dihapus.`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Hapus',
                cancelButtonText: 'Batal',
                customClass: { confirmButton: 'btn btn-danger', cancelButton: 'btn btn-light' }
            }).then(async (r) => {
                if (r.isConfirmed) {
                    try {
                        const token = localStorage.getItem('auth_token');
                        const res = await fetch(`${API}/hapus-petugas/${id}`, {
                            method: 'DELETE',
                            headers: { 
                                'Accept': 'application/json',
                                'Authorization': `Bearer ${token}`,
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                            }
                        });
                        const json = await res.json();
                        if (json.success) {
                            Swal.fire({ icon: 'success', title: 'Terhapus!', text: json.message, timer: 1500, showConfirmButton: false });
                            fetchData();
                        } else {
                            Swal.fire({ icon: 'error', title: 'Gagal', text: json.message });
                        }
                    } catch (e) {
                        Swal.fire({ icon: 'error', title: 'Error', text: 'Tidak bisa terhubung.' });
                    }
                }
            });
        };

        function esc(s) {
            if (!s) return '';
            const d = document.createElement('div');
            d.textContent = s;
            return d.innerHTML;
        }

        fetchData();
    });
    </script>
    @endpush
</x-layout>
