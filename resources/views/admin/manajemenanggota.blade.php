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
                                    <tbody class="text-gray-600 fw-semibold">
                                        <tr>
                                            <td>1</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                                        <div class="symbol-label fs-3 bg-light-primary text-primary">A</div>
                                                    </div>
                                                    <div class="d-flex flex-column">
                                                        <a href="#" class="text-gray-800 text-hover-primary mb-1 fw-bold">Andi Saputra</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>andi@example.com</td>
                                            <td>081234567890</td>
                                            <td><span class="badge badge-light-success">Aktif</span></td>
                                            <td class="text-end">
                                                <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Aksi <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                                    <div class="menu-item px-3"><a href="#" class="menu-link px-3"><i class="ki-duotone ki-eye fs-6 me-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i> Detail</a></div>
                                                    <div class="menu-item px-3"><a href="#" class="menu-link px-3"><i class="ki-duotone ki-pencil fs-6 me-2"><span class="path1"></span><span class="path2"></span></i> Edit</a></div>
                                                    <div class="menu-item px-3"><a href="#" class="menu-link px-3 text-danger"><i class="ki-duotone ki-trash fs-6 me-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i> Hapus</a></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                                        <div class="symbol-label fs-3 bg-light-danger text-danger">B</div>
                                                    </div>
                                                    <div class="d-flex flex-column">
                                                        <a href="#" class="text-gray-800 text-hover-primary mb-1 fw-bold">Budi Santoso</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>budi@example.com</td>
                                            <td>089876543210</td>
                                            <td><span class="badge badge-light-danger">Nonaktif</span></td>
                                            <td class="text-end">
                                                <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Aksi <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                                    <div class="menu-item px-3"><a href="#" class="menu-link px-3"><i class="ki-duotone ki-eye fs-6 me-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i> Detail</a></div>
                                                    <div class="menu-item px-3"><a href="#" class="menu-link px-3"><i class="ki-duotone ki-pencil fs-6 me-2"><span class="path1"></span><span class="path2"></span></i> Edit</a></div>
                                                    <div class="menu-item px-3"><a href="#" class="menu-link px-3 text-danger"><i class="ki-duotone ki-trash fs-6 me-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i> Hapus</a></div>
                                                </div>
                                            </td>
                                        </tr>
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
                    <h2 class="fw-bold">Tambah Anggota</h2>
                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                    </div>
                </div>
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                    <form>
                        <div class="fv-row mb-7">
                            <label class="required fw-semibold fs-6 mb-2">Nama Anggota</label>
                            <input type="text" class="form-control form-control-solid" placeholder="Masukkan nama anggota" />
                        </div>
                        <div class="fv-row mb-7">
                            <label class="required fw-semibold fs-6 mb-2">Email</label>
                            <input type="email" class="form-control form-control-solid" placeholder="Masukkan alamat email" />
                        </div>
                        <div class="fv-row mb-7">
                            <label class="required fw-semibold fs-6 mb-2">No. Telepon</label>
                            <input type="text" class="form-control form-control-solid" placeholder="Masukkan nomor telepon" />
                        </div>
                        <div class="fv-row mb-7">
                            <label class="required fw-semibold fs-6 mb-2">Alamat</label>
                            <textarea class="form-control form-control-solid" rows="3" placeholder="Masukkan alamat lengkap"></textarea>
                        </div>
                        <div class="fv-row mb-7">
                            <label class="required fw-semibold fs-6 mb-2">Status</label>
                            <select class="form-select form-select-solid">
                                <option value="active">Aktif</option>
                                <option value="inactive">Nonaktif</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer flex-center">
                    <button type="button" class="btn btn-light me-3" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">
                        <span class="indicator-label">Simpan</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-layout>
