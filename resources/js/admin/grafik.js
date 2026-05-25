import Chart from 'chart.js/auto';

const accountCtx = document.getElementById('accountChart');

if (accountCtx) {

    new Chart(accountCtx, {

        type: 'bar',

        data: {

            labels: [
                'Jan',
                'Feb',
                'Mar',
                'Apr',
                'Mei',
                'Jun',
                'Jul'
            ],

            datasets: [{
                label: 'Pembuatan Akun',

                data: [
                    12,
                    25,
                    40,
                    32,
                    50,
                    70,
                    90
                ],

                backgroundColor: [
                    '#a75502',
                    '#a75502',
                    '#a75502',
                    '#a75502',
                    '#a75502',
                    '#a75502',
                    '#a75502'
                ],

                borderRadius: 10
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