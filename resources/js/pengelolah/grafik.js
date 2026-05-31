import Chart from 'chart.js/auto';

// =============================================
// GRAFIK PENGELOLA - Visitor Chart
// =============================================
const ctx = document.getElementById('visitorChart');
if (ctx) {
    const rawData = ctx.getAttribute('data-stats');
    const visitorData = rawData ? JSON.parse(rawData) : Array(12).fill(0);
    const labels = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];

    const myMuseumChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels,
            datasets: [{
                label: 'Jumlah Pengunjung',
                data: visitorData,
                borderColor: '#f59e0b',
                backgroundColor: 'rgba(245, 158, 11, 0.2)',
                fill: true,
                tension: 0.4,
                pointBackgroundColor: '#fbbf24',
                pointBorderColor: '#fff',
                pointRadius: 5
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { labels: { color: '#d1d5db' } }
            },
            scales: {
                x: {
                    ticks: { color: '#9ca3af' },
                    grid: { color: 'rgba(255,255,255,0.05)' }
                },
                y: {
                    beginAtZero: true,
                    ticks: {
                        color: '#9ca3af',
                        callback: value => Number.isInteger(value) ? value : null
                    },
                    grid: { color: 'rgba(255,255,255,0.05)' }
                }
            }
        }
    });

    function updateEl(id, value) {
        const el = document.getElementById(id);
        if (el && value !== undefined && value !== null) el.innerText = value;
    }

    function fetchTerbaru() {
        fetch('/pengelola/api/live-stats', {
            headers: {
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
            .then(res => {
                if (res.status === 401 || res.redirected) {
                    clearInterval(pollingInterval);
                    window.location.href = '/login';
                    return null;
                }
                if (!res.ok) throw new Error('Status: ' + res.status);
                return res.json();
            })
            .then(data => {
                if (!data) return;

                // Update card pengunjung
                updateEl('stat-total-pengunjung', data.total);
                updateEl('stat-pengunjung-hari-ini', data.hari_ini);

                // ✅ Update 3 card atas
                updateEl('stat-total-koleksi', data.total_koleksi);
                updateEl('stat-total-kategori', data.total_kategori);
                updateEl('stat-koleksi-baru', data.koleksi_baru);

                // ✅ Hanya update grafik jika ada data agar tidak menimpa dengan array kosong
                const adaData = data.grafik.some(v => v > 0);
                if (adaData) {
                    myMuseumChart.data.datasets[0].data = data.grafik;
                    myMuseumChart.update();
                }
            })
            .catch(err => console.error('Gagal memuat data real-time:', err));
    }

    const pollingInterval = setInterval(fetchTerbaru, 5000);
}

// =============================================
// GRAFIK ADMIN - Account Chart
// =============================================
const accountCtx = document.getElementById('accountChart');
if (accountCtx) {
    const dataPengelola = JSON.parse(accountCtx.getAttribute('data-pengelola') || 'null') || Array(12).fill(0);
    const dataPengunjung = JSON.parse(accountCtx.getAttribute('data-pengunjung') || 'null') || Array(12).fill(0);

    const myAccountChart = new Chart(accountCtx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
            datasets: [
                {
                    label: 'Pengelola',
                    data: dataPengelola,
                    backgroundColor: '#a75502',
                    borderRadius: 10
                },
                {
                    label: 'Pengunjung',
                    data: dataPengunjung,
                    backgroundColor: '#1d4ed8',
                    borderRadius: 10
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { labels: { color: '#d1d5db' } }
            },
            scales: {
                x: {
                    ticks: { color: '#9ca3af' },
                    grid: { color: 'rgba(255,255,255,0.05)' }
                },
                y: {
                    beginAtZero: true,
                    ticks: { color: '#9ca3af' },
                    grid: { color: 'rgba(255,255,255,0.05)' }
                }
            }
        }
    });

    function updateEl(id, value) {
        const el = document.getElementById(id);
        if (el && value !== undefined && value !== null) el.innerText = value;
    }

    function fetchAkunTerbaru() {
        fetch('/admin/api/live-stats', {
            headers: {
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
            .then(res => {
                if (res.status === 401 || res.redirected) {
                    clearInterval(accountPolling);
                    window.location.href = '/login';
                    return null;
                }
                return res.json();
            })
            .then(data => {
                if (!data) return;

                updateEl('stat-total-pengelola', data.total_pengelola);
                updateEl('stat-total-pengunjung', data.total_pengunjung);
                updateEl('stat-total-user', data.total_user);

                // ✅ Hanya update grafik jika ada data
                const adaData = data.pengelola.some(v => v > 0) || data.pengunjung.some(v => v > 0);
                if (adaData) {
                    myAccountChart.data.datasets[0].data = data.pengelola;
                    myAccountChart.data.datasets[1].data = data.pengunjung;
                    myAccountChart.update();
                }
            })
            .catch(err => console.error('Gagal fetch akun:', err));
    }

    const accountPolling = setInterval(fetchAkunTerbaru, 5000);
}
