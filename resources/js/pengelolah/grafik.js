import Chart from 'chart.js/auto';

const ctx = document.getElementById('visitorChart');

if (ctx) {

    // Dummy data default
    let labels = [
        'Jan',
        'Feb',
        'Mar',
        'Apr',
        'Mei',
        'Jun',
        'Jul'
    ];

    let visitorData = [
        0,
        0,
        0,
        0,
        0,
        0,
        0
    ];

    new Chart(ctx, {
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
                legend: {
                    labels: {
                        color: '#d1d5db'
                    }
                }
            },
            maintainAspectRatio: false,
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
}
