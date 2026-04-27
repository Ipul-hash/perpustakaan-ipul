<x-layout title="Dashboard Member — Perpustakaan">
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Selamat Datang di Perpustakaan</h1>
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <li class="breadcrumb-item text-muted">Beranda</li>
                </ul>
            </div>
        </div>
    </div>

    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-fluid">
            <div class="row g-5 g-xl-8">
                <!-- Info Welcome -->
                <div class="col-xl-12">
                    <div class="card bg-primary text-white">
                        <div class="card-body p-9">
                            <div class="d-flex align-items-center mb-5">
                                <div class="symbol symbol-50px me-4">
                                    <span class="symbol-label bg-white text-primary fw-bold fs-3" id="welcome-initial">?</span>
                                </div>
                                <h2 class="text-white mb-0" id="welcome-name">Memuat...</h2>
                            </div>
                            <p class="fs-5 m-0">Selamat datang di sistem manajemen perpustakaan kami. Silakan cari buku di menu <b>Koleksi Buku</b> dan ajukan peminjaman dengan mudah. Jika butuh bantuan, hubungi petugas kami di meja administrasi.</p>
                        </div>
                    </div>
                </div>

                <!-- Stats -->
                <div class="col-md-6">
                    <div class="card bg-light-info hoverable h-100">
                        <div class="card-body p-9">
                            <div class="fs-2hx fw-bold text-info mb-2" id="stat-active">0</div>
                            <div class="fs-4 fw-semibold text-gray-600">Buku Sedang Dipinjam</div>
                            <div class="fw-semibold text-gray-500 mt-5">Termasuk buku yang sedang menunggu persetujuan (Pending).</div>
                            <a href="/member/riwayat" class="btn btn-sm btn-info mt-5">Lihat Riwayat</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card bg-light-danger hoverable h-100">
                        <div class="card-body p-9">
                            <div class="fs-2hx fw-bold text-danger mb-2" id="stat-fines">Rp 0</div>
                            <div class="fs-4 fw-semibold text-gray-600">Total Denda (Belum Lunas)</div>
                            <div class="fw-semibold text-gray-500 mt-5">Silakan bayar denda di meja administrasi jika ada tunggakan.</div>
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
        if (!token) { window.location.href = '/login'; return; }

        let currentMember = null;

        async function init() {
            try {
                // Get User Info
                const resUser = await fetch('/api/user', {
                    headers: { 'Accept': 'application/json', 'Authorization': `Bearer ${token}` }
                });
                const userData = await resUser.json();
                currentMember = userData.member;

                if (currentMember) {
                    document.getElementById('welcome-name').textContent = `Halo, ${currentMember.name}!`;
                    document.getElementById('welcome-initial').textContent = currentMember.name.charAt(0).toUpperCase();
                    
                    fetchStats();
                }
            } catch (e) {
                console.error(e);
            }
        }

        async function fetchStats() {
            try {
                // Fetch Loans
                const resLoans = await fetch(`/api/member/my-loans/${currentMember.id}`, {
                    headers: { 'Accept': 'application/json', 'Authorization': `Bearer ${token}` }
                });
                const jsonLoans = await resLoans.json();
                
                if (jsonLoans.success) {
                    const active = jsonLoans.data.filter(l => l.status === 'pending' || l.status === 'borrowed').length;
                    document.getElementById('stat-active').textContent = active;
                }

                // Fetch Fines
                const resFines = await fetch(`/api/member/denda/${currentMember.id}`, {
                    headers: { 'Accept': 'application/json', 'Authorization': `Bearer ${token}` }
                });
                const jsonFines = await resFines.json();
                
                if (jsonFines.success) {
                    const unpaid = jsonFines.data.filter(f => f.payment_status === 'unpaid');
                    const totalUnpaid = unpaid.reduce((sum, f) => sum + parseFloat(f.amount), 0);
                    document.getElementById('stat-fines').textContent = `Rp ${totalUnpaid.toLocaleString('id-ID')}`;
                }
            } catch (e) {
                console.error(e);
            }
        }

        init();
    });
    </script>
    @endpush
</x-layout>
