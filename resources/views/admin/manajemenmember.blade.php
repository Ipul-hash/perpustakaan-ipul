<x-layout title="Manajemen Member — Perpustakaan">
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Manajemen Member</h1>
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <li class="breadcrumb-item text-muted">
                        <a href="/dashboard" class="text-muted text-hover-primary">Beranda</a>
                    </li>
                    <li class="breadcrumb-item"><span class="bullet bg-gray-400 w-5px h-2px"></span></li>
                    <li class="breadcrumb-item text-muted">Member</li>
                </ul>
            </div>
            <div class="d-flex align-items-center gap-2 gap-lg-3">
                <button type="button" class="btn btn-sm fw-bold btn-primary" onclick="openAddModal()">
                    <i class="ki-duotone ki-plus fs-2"></i> Tambah Member
                </button>
            </div>
        </div>
    </div>

    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-fluid">
            <div class="card">
                <div class="card-header border-0 pt-6">
                    <div class="card-title">
                        <div class="d-flex align-items-center position-relative my-1">
                            <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
                                <span class="path1"></span><span class="path2"></span>
                            </i>
                            <input type="text" class="form-control form-control-solid w-250px ps-13" placeholder="Cari member..." />
                        </div>
                    </div>
                </div>
                <div class="card-body py-4">
                    <div class="table-responsive">
                        <table class="table align-middle table-row-dashed fs-6 gy-5">
                            <thead>
                                <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                    <th>Member ID</th>
                                    <th>Nama Lengkap</th>
                                    <th>Email</th>
                                    <th>No. HP</th>
                                    <th>Status</th>
                                    <th class="text-end">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><span class="fw-bold text-gray-800">MBR-0001</span></td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                                <div class="symbol-label fs-3 bg-light-primary text-primary">R</div>
                                            </div>
                                            <div class="d-flex flex-column">
                                                <a href="#" class="text-gray-800 text-hover-primary mb-1 fw-bold">Reza Gunawan</a>
                                            </div>
                                        </div>
                                    </td>
                                    <td>reza@example.com</td>
                                    <td>0812-3456-7890</td>
                                    <td><span class="badge badge-light-success">Aktif</span></td>
                                    <td class="text-end">
                                        <button class="btn btn-sm btn-light btn-active-light-primary">Detail</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal_add_member" tabindex="-1" aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered mw-1000px">
            <div class="modal-content overflow-hidden">
                <div class="row g-0">
                    <div class="col-lg-7 py-10 px-10 px-lg-15">
                        <div class="d-flex justify-content-between align-items-center mb-8">
                            <h2 class="fw-bold m-0" id="modal_title">Pendaftaran Member Baru</h2>
                            <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                                <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                            </div>
                        </div>

                        <div id="step_form">
                            <form id="form_add_member">
                                <h4 class="text-gray-800 fw-bold mb-5">1. Akun Akses</h4>
                                <div class="fv-row mb-7">
                                    <label class="required fw-semibold fs-6 mb-2">Alamat Email</label>
                                    <div class="position-relative">
                                        <input type="email" class="form-control form-control-solid" id="input_email" placeholder="email@contoh.com" autocomplete="off" />
                                        <div id="email_feedback" class="position-absolute top-50 end-0 translate-middle-y me-3 d-none">
                                            <i class="ki-duotone ki-cross-circle text-danger fs-2"><span class="path1"></span><span class="path2"></span></i>
                                        </div>
                                    </div>
                                    <div class="text-danger fs-7 mt-2 d-none" id="email_error">Email ini sudah jadi member, bro!</div>
                                </div>
                                <div class="fv-row mb-10">
                                    <label class="required fw-semibold fs-6 mb-2">Password</label>
                                    <div class="input-group input-group-solid">
                                        <input type="text" class="form-control form-control-solid" id="input_password" placeholder="Password akun" autocomplete="off" />
                                        <button type="button" class="btn btn-light-primary fw-bold" onclick="generatePassword()">Auto-generate</button>
                                    </div>
                                </div>

                                <h4 class="text-gray-800 fw-bold mb-5">2. Profil Pribadi</h4>
                                <div class="fv-row mb-7">
                                    <label class="required fw-semibold fs-6 mb-2">Nama Lengkap</label>
                                    <input type="text" class="form-control form-control-solid" id="input_nama" placeholder="Masukkan nama lengkap" autocomplete="off" />
                                </div>
                                <div class="fv-row mb-7">
                                    <label class="required fw-semibold fs-6 mb-2">No. Handphone (WhatsApp)</label>
                                    <input type="text" class="form-control form-control-solid" id="input_hp" placeholder="08XX-XXXX-XXXX" autocomplete="off" />
                                </div>
                                <div class="fv-row mb-10">
                                    <label class="fw-semibold fs-6 mb-2">Alamat Domisili</label>
                                    <textarea class="form-control form-control-solid" id="input_alamat" rows="2" placeholder="Masukkan alamat lengkap"></textarea>
                                </div>

                                <div class="d-flex justify-content-end pt-5">
                                    <button type="button" class="btn btn-light me-3" data-bs-dismiss="modal">Batal</button>
                                    <button type="button" class="btn btn-primary" id="btn_simpan" onclick="simpanMember()">
                                        <span class="indicator-label">Simpan Member</span>
                                        <span class="indicator-progress">Memproses... <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    </button>
                                </div>
                            </form>
                        </div>

                        <div id="step_success" class="d-none text-center pt-5">
                            <i class="ki-duotone ki-check-circle text-success fs-5x mb-5"><span class="path1"></span><span class="path2"></span></i>
                            <h2 class="fw-bold text-dark mb-2">Berhasil Didaftarkan!</h2>
                            <div class="text-muted fs-6 mb-8">Data member telah tersimpan di sistem.</div>
                            
                            <div class="row g-4 justify-content-center mb-8">
                                <div class="col-6">
                                    <button class="btn btn-outline btn-outline-dashed btn-outline-primary btn-active-light-primary w-100 d-flex flex-column align-items-center py-4" onclick="printCard()">
                                        <i class="ki-duotone ki-printer fs-2x mb-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>
                                        <span class="fw-bold fs-6">Print ID Card</span>
                                    </button>
                                </div>
                                <div class="col-6">
                                    <button class="btn btn-outline btn-outline-dashed btn-outline-info btn-active-light-info w-100 d-flex flex-column align-items-center py-4" onclick="copyCredentials()">
                                        <i class="ki-duotone ki-copy fs-2x mb-2"><span class="path1"></span><span class="path2"></span></i>
                                        <span class="fw-bold fs-6">Copy WA Akun</span>
                                    </button>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-light-success w-100 d-flex flex-center py-4" onclick="directLoan()">
                                        <i class="ki-duotone ki-book-open fs-2 mb-0 me-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i>
                                        <span class="fw-bold fs-6">Langsung Pinjam Buku</span>
                                    </button>
                                </div>
                            </div>
                            
                            <div class="bg-light-primary rounded p-5 text-start d-flex align-items-center mb-5">
                                <div class="symbol symbol-60px me-4">
                                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=100x100&data=https://play.google.com/store/apps/details?id=com.perpustakaan" alt="QR APK" class="rounded" />
                                </div>
                                <div>
                                    <h5 class="fw-bold text-gray-800 mb-1 fs-6">Aplikasi Member</h5>
                                    <div class="fs-7 text-gray-600">Beritahu member login dengan <strong id="success_email"></strong> dan ganti password saat pertama kali masuk aplikasi.</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5 bg-light-primary p-10 d-flex flex-column justify-content-center align-items-center position-relative">
                        <div class="position-absolute top-0 end-0 w-200px h-200px bg-primary opacity-10 rounded-circle" style="transform: translate(30%, -30%);"></div>
                        <div class="position-absolute bottom-0 start-0 w-250px h-250px bg-primary opacity-10 rounded-circle" style="transform: translate(-30%, 30%);"></div>

                        <div class="text-center mb-10 z-index-1">
                            <h3 class="fw-bold text-primary mb-1">Live Preview</h3>
                            <div class="text-muted fs-7">Virtual Member Card</div>
                        </div>

                        <div class="card bg-dark border-0 shadow-lg rounded-4 w-100 mw-350px p-0 overflow-hidden position-relative z-index-1" style="aspect-ratio: 1.586/1; transition: all 0.3s ease;" id="virtual_card">
                            <div class="position-absolute top-0 end-0 w-100px h-100px bg-white opacity-10 rounded-circle" style="transform: translate(30%, -30%);"></div>
                            <div class="position-absolute bottom-0 start-0 w-150px h-150px bg-white opacity-5 rounded-circle" style="transform: translate(-30%, 30%);"></div>
                            
                            <div class="card-body d-flex flex-column justify-content-between p-6">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <div class="fs-5 text-white fw-bold tracking-tight">Perpustakaan</div>
                                        <div class="fs-8 text-white opacity-50">Member Card</div>
                                    </div>
                                    <i class="ki-duotone ki-abstract-14 fs-2x text-white"><span class="path1"></span><span class="path2"></span></i>
                                </div>
                                <div class="d-flex justify-content-between align-items-end">
                                    <div>
                                        <div class="fs-8 text-white opacity-50 mb-1">Nama Lengkap</div>
                                        <div class="fs-3 text-white fw-bold mb-3" id="preview_nama">John Doe</div>
                                        <div class="fs-6 text-white text-uppercase tracking-widest font-monospace" id="preview_id">####-####</div>
                                    </div>
                                    <div class="bg-white p-1 rounded d-none" id="preview_qr">
                                        <img src="https://api.qrserver.com/v1/create-qr-code/?size=60x60&data=MBR-NEW" alt="QR" class="w-60px h-60px" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        const modalEl = document.getElementById('modal_add_member');
        const modal = new bootstrap.Modal(modalEl);
        
        const inNama = document.getElementById('input_nama');
        const inHp = document.getElementById('input_hp');
        const inEmail = document.getElementById('input_email');
        const inPass = document.getElementById('input_password');
        const inAlamat = document.getElementById('input_alamat');
        
        const previewNama = document.getElementById('preview_nama');
        const previewId = document.getElementById('preview_id');
        const previewQr = document.getElementById('preview_qr');
        
        const emailError = document.getElementById('email_error');
        const emailFeedback = document.getElementById('email_feedback');
        const btnSimpan = document.getElementById('btn_simpan');
        
        const stepForm = document.getElementById('step_form');
        const stepSuccess = document.getElementById('step_success');
        const successEmail = document.getElementById('success_email');
        const modalTitle = document.getElementById('modal_title');

        modalEl.addEventListener('shown.bs.modal', function () {
            inNama.focus();
        });

        function openAddModal() {
            resetForm();
            modal.show();
        }

        inNama.addEventListener('input', function() {
            previewNama.textContent = this.value || 'John Doe';
        });

        inHp.addEventListener('input', function(e) {
            let x = e.target.value.replace(/\D/g, '').match(/(\d{0,4})(\d{0,4})(\d{0,4})/);
            e.target.value = !x[2] ? x[1] : x[1] + '-' + x[2] + (x[3] ? '-' + x[3] : '');
        });

        inEmail.addEventListener('input', function() {
            const val = this.value;
            if (val === 'admin@admin.com' || val === 'sudah@member.com') {
                this.classList.add('is-invalid');
                emailError.classList.remove('d-none');
                emailFeedback.classList.remove('d-none');
            } else {
                this.classList.remove('is-invalid');
                emailError.classList.add('d-none');
                emailFeedback.classList.add('d-none');
            }
        });

        function generatePassword() {
            const chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#";
            let pass = "";
            for (let i = 0; i < 8; i++) {
                pass += chars.charAt(Math.floor(Math.random() * chars.length));
            }
            inPass.value = pass;
        }

        function simpanMember() {
            if(!inNama.value || !inEmail.value || !inHp.value || !inPass.value) {
                Swal.fire('Oops!', 'Harap lengkapi semua data wajib.', 'warning');
                return;
            }
            if(inEmail.classList.contains('is-invalid')) {
                Swal.fire('Oops!', 'Gunakan email lain.', 'warning');
                return;
            }

            btnSimpan.setAttribute('data-kt-indicator', 'on');
            btnSimpan.disabled = true;

            setTimeout(() => {
                btnSimpan.removeAttribute('data-kt-indicator');
                btnSimpan.disabled = false;
                
                successEmail.textContent = inEmail.value;
                stepForm.classList.add('d-none');
                stepSuccess.classList.remove('d-none');
                
                modalTitle.textContent = "Pendaftaran Sukses";
                previewId.textContent = "MBR-" + Math.floor(1000 + Math.random() * 9000);
                previewQr.classList.remove('d-none');
                
            }, 1200);
        }

        function resetForm() {
            inNama.value = '';
            inHp.value = '';
            inEmail.value = '';
            inPass.value = '';
            inAlamat.value = '';
            
            previewNama.textContent = 'John Doe';
            previewId.textContent = '####-####';
            previewQr.classList.add('d-none');
            modalTitle.textContent = "Pendaftaran Member Baru";
            
            inEmail.classList.remove('is-invalid');
            emailError.classList.add('d-none');
            emailFeedback.classList.add('d-none');
            
            stepForm.classList.remove('d-none');
            stepSuccess.classList.add('d-none');
        }

        function printCard() {
            Swal.fire('Mencetak...', 'Sedang memproses ID Card fisik...', 'info');
        }

        function copyCredentials() {
            const text = `Halo ${inNama.value},\n\nAkun perpustakaan Anda telah aktif.\nEmail: ${inEmail.value}\nPassword: ${inPass.value}\n\nHarap ganti password saat login pertama kali.`;
            navigator.clipboard.writeText(text).then(() => {
                Swal.fire('Tercopy!', 'Kredensial siap di-paste ke WhatsApp.', 'success');
            });
        }

        function directLoan() {
            modal.hide();
            Swal.fire('Direct Loan', `Membuka menu peminjaman untuk ${inNama.value}...`, 'success');
        }
    </script>
    @endpush
</x-layout>
