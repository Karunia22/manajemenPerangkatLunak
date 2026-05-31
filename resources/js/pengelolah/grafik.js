import Chart from 'chart.js/auto';

// =============================================
// GRAFIK PENGELOLA - Visitor Chart
// =============================================
const visitorCtx = document.getElementById('visitorChart');

if (visitorCtx) {
    const rawData = visitorCtx.getAttribute('data-stats');
    const visitorData = rawData
        ? JSON.parse(rawData)
        : Array(12).fill(0);

    const labels = [
        'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun',
        'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'
    ];

    const existingChart = Chart.getChart(visitorCtx);

    if (existingChart) {
        existingChart.destroy();
    }

    const myMuseumChart = new Chart(visitorCtx, {
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
                legend: {
                    labels: {
                        color: '#d1d5db'
                    }
                }
            },
            scales: {
                x: {
                    ticks: {
                        color: '#9ca3af'
                    },
                    grid: {
                        color: 'rgba(255,255,255,0.05)'
                    }
                },
                y: {
                    beginAtZero: true,
                    ticks: {
                        color: '#9ca3af',
                        callback: value =>
                            Number.isInteger(value) ? value : null
                    },
                    grid: {
                        color: 'rgba(255,255,255,0.05)'
                    }
                }
            }
        }
    });

    function updateEl(id, value) {
        const el = document.getElementById(id);

        if (el && value !== undefined && value !== null) {
            el.innerText = value;
        }
    }

    function fetchTerbaru() {
        fetch('/pengelola/api/live-stats', {
            headers: {
                Accept: 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
            .then(res => {
                if (res.status === 401 || res.redirected) {
                    clearInterval(pollingInterval);
                    window.location.href = '/login';
                    return null;
                }

                if (!res.ok) {
                    throw new Error(`Status: ${res.status}`);
                }

                return res.json();
            })
            .then(data => {
                if (!data) return;

                updateEl('stat-total-pengunjung', data.total);
                updateEl('stat-pengunjung-hari-ini', data.hari_ini);

                updateEl('stat-total-koleksi', data.total_koleksi);
                updateEl('stat-total-kategori', data.total_kategori);
                updateEl('stat-koleksi-baru', data.koleksi_baru);

                const grafik = Array.isArray(data.grafik)
                    ? data.grafik
                    : Array(12).fill(0);

                if (grafik.some(v => v > 0)) {
                    myMuseumChart.data.datasets[0].data = grafik;
                    myMuseumChart.update();
                }
            })
            .catch(err => {
                console.error('Gagal memuat data real-time:', err);
            });
    }

    const pollingInterval = setInterval(fetchTerbaru, 5000);
}

// =============================================
// GRAFIK ADMIN - Account Chart
// =============================================
const accountCtx = document.getElementById('accountChart');

if (accountCtx) {
    const dataPengelola = JSON.parse(
        accountCtx.getAttribute('data-pengelola') || 'null'
    ) || Array(12).fill(0);

    const dataPengunjung = JSON.parse(
        accountCtx.getAttribute('data-pengunjung') || 'null'
    ) || Array(12).fill(0);

    const existingChart = Chart.getChart(accountCtx);

    if (existingChart) {
        existingChart.destroy();
    }

    const myAccountChart = new Chart(accountCtx, {
        type: 'bar',
        data: {
            labels: [
                'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun',
                'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'
            ],
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
                legend: {
                    labels: {
                        color: '#d1d5db'
                    }
                }
            },
            scales: {
                x: {
                    ticks: {
                        color: '#9ca3af'
                    },
                    grid: {
                        color: 'rgba(255,255,255,0.05)'
                    }
                },
                y: {
                    beginAtZero: true,
                    ticks: {
                        color: '#9ca3af'
                    },
                    grid: {
                        color: 'rgba(255,255,255,0.05)'
                    }
                }
            }
        }
    });

    function updateEl(id, value) {
        const el = document.getElementById(id);

        if (el && value !== undefined && value !== null) {
            el.innerText = value;
        }
    }

    function fetchAkunTerbaru() {
        fetch('/admin/api/live-stats', {
            headers: {
                Accept: 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
            .then(res => {
                if (res.status === 401 || res.redirected) {
                    clearInterval(accountPolling);
                    window.location.href = '/login';
                    return null;
                }

                if (!res.ok) {
                    throw new Error(`Status: ${res.status}`);
                }

                return res.json();
            })
            .then(data => {
                if (!data) return;

                console.log('Live Stats Admin:', data);

                updateEl('stat-total-pengelola', data.total_pengelola);
                updateEl('stat-total-pengunjung', data.total_pengunjung);
                updateEl('stat-total-user', data.total_user);

                const pengelola = Array.isArray(data.pengelola)
                    ? data.pengelola
                    : Array(12).fill(0);

                const pengunjung = Array.isArray(data.pengunjung)
                    ? data.pengunjung
                    : Array(12).fill(0);

                const adaData =
                    pengelola.some(v => v > 0) ||
                    pengunjung.some(v => v > 0);

                if (adaData) {
                    myAccountChart.data.datasets[0].data = pengelola;
                    myAccountChart.data.datasets[1].data = pengunjung;
                    myAccountChart.update();
                }
            })
            .catch(err => {
                console.error('Gagal fetch akun:', err);
            });
    }

    const accountPolling = setInterval(fetchAkunTerbaru, 5000);
}
