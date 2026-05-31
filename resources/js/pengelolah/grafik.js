import Chart from 'chart.js/auto';

const ctx = document.getElementById('visitorChart');

if (ctx) {
    // 1. Ambil data awal dari atribut HTML canvas
    const rawData = ctx.getAttribute('data-stats');
    let visitorData = rawData ? JSON.parse(rawData) : [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
    let labels = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];

    // 2. Buat objek grafik dan simpan ke dalam variabel 'myMuseumChart'
    const myMuseumChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
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
            plugins: {
                legend: { labels: { color: '#d1d5db' } }
            },
            maintainAspectRatio: false,
            scales: {
                x: {
                    ticks: { color: '#9ca3af' },
                    grid: { color: 'rgba(255,255,255,0.05)' }
                },
                y: {
                    beginAtZero: true,
                    ticks: {
                        color: '#9ca3af',
                        callback: function (value) { if (value % 1 === 0) { return value; } }
                    },
                    grid: { color: 'rgba(255,255,255,0.05)' }
                }
            }
        }
    });

    function fetchTerbaru() {
        fetch('/pengelola/api/live-stats', {
            headers: {
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
            .then(response => {
                if (response.status === 401 || response.redirected) {
                    clearInterval(pollingInterval);
                    window.location.href = '/login';
                    return null;
                }
                if (!response.ok) throw new Error('Status: ' + response.status);
                return response.json();
            })
            .then(data => {
                if (!data) return;
                const elementTotal = document.getElementById('stat-total-pengunjung');
                const elementHariIni = document.getElementById('stat-pengunjung-hari-ini');
                if (elementTotal) elementTotal.innerText = data.total;
                if (elementHariIni) elementHariIni.innerText = data.hari_ini;
                myMuseumChart.data.datasets[0].data = data.grafik;
                myMuseumChart.update();
            })
            .catch(error => console.error('Gagal memuat data real-time:', error));
    }

    const pollingInterval = setInterval(fetchTerbaru, 5000);
}
