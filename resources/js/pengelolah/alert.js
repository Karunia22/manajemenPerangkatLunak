document.addEventListener('DOMContentLoaded', function () {
    // Cari tombol close berdasarkan ID atau class penanda di dalam alert
    const alertBox = document.getElementById('success-alert');

    if (alertBox) {
        // Cari tombol di dalam alertBox yang memiliki tag button
        const closeBtn = alertBox.querySelector('button');

        if (closeBtn) {
            closeBtn.addEventListener('click', function (e) {
                e.preventDefault(); // Mengamankan tombol agar tidak memicu submit form

                // Memberikan efek fade out sebelum dihapus
                alertBox.style.opacity = '0';

                setTimeout(() => {
                    alertBox.remove();
                }, 300); // Menunggu 0.3 detik sampai animasi selesai
            });
        }
    }
});
