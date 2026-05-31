document.addEventListener("DOMContentLoaded", () => {

    const gambarInput = document.getElementById("gambar");
    const uploadText = document.getElementById("uploadText");
    const fileName = document.getElementById("fileName");
    const preview = document.getElementById("preview");

    if (!gambarInput) return;

    gambarInput.addEventListener("change", function () {

        const file = this.files[0];

        if (!file) return;

        // Ubah judul upload
        if (uploadText) {
            uploadText.textContent = "Gambar Berhasil Dipilih";
        }

        // Tampilkan nama file
        if (fileName) {
            fileName.textContent = file.name;
            fileName.classList.remove("text-gray-400");
            fileName.classList.add("text-green-400");
        }

        // Preview gambar
        if (preview) {
            preview.src = URL.createObjectURL(file);
            preview.classList.remove("hidden");
        }

    });

});

document.addEventListener('DOMContentLoaded', () => {

    const inputGambar = document.getElementById('gambar');
    const namaFile = document.getElementById('nama-file');

    if (inputGambar) {

        inputGambar.addEventListener('change', function () {

            if (this.files.length > 0) {

                namaFile.textContent =
                    '✓ Gambar dipilih: ' + this.files[0].name;

                namaFile.classList.remove('text-gray-400');
                namaFile.classList.add('text-green-400');

            } else {

                namaFile.textContent =
                    'PNG, JPG maksimal 5MB';

                namaFile.classList.remove('text-green-400');
                namaFile.classList.add('text-gray-400');
            }

        });

    }

});
