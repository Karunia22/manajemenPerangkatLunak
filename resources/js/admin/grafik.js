import Chart from 'chart.js/auto';

const accountCtx = document.getElementById('accountChart');
if (accountCtx) {
    const dataPengelola = JSON.parse(accountCtx.getAttribute('data-pengelola') || '[0,0,0,0,0,0,0,0,0,0,0,0]');
    const dataPengunjung = JSON.parse(accountCtx.getAttribute('data-pengunjung') || '[0,0,0,0,0,0,0,0,0,0,0,0]');

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

    function updateCard(id, value) {
        const el = document.getElementById(id);
        // ✅ Hanya update jika elemen ada DAN value bukan undefined/null
        if (el && value !== undefined && value !== null) {
            el.innerText = value;
        }
    }

    function fetchAkunTerbaru() {
        fetch('/admin/api/live-stats', {
            headers: {
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
            .then(response => {
                if (response.status === 401 || response.redirected) {
                    clearInterval(accountPolling);
                    window.location.href = '/login';
                    return null;
                }
                return response.json();
            })
            .then(data => {
                if (!data) return;

                updateCard('stat-total-pengelola', data.total_pengelola);
                updateCard('stat-total-pengunjung', data.total_pengunjung);
                updateCard('stat-total-user', data.total_user);

                // ✅ Hanya update grafik jika data tidak semua nol
                const adaDataPengelola = data.pengelola.some(v => v > 0);
                const adaDataPengunjung = data.pengunjung.some(v => v > 0);

                if (adaDataPengelola || adaDataPengunjung) {
                    myAccountChart.data.datasets[0].data = data.pengelola;
                    myAccountChart.data.datasets[1].data = data.pengunjung;
                    myAccountChart.update();
                }
            })
            .catch(error => console.error('Gagal fetch:', error));
    }

    const accountPolling = setInterval(fetchAkunTerbaru, 5000);
}
