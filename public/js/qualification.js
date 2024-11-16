// Ambil elemen container dan tombol
const qualificationsContainer = document.getElementById('qualifications-container');
const addQualificationButton = document.getElementById('add-qualification');
const removeQualificationButton = document.getElementById('remove-qualification');

// Fungsi untuk menambah textarea baru
addQualificationButton.addEventListener('click', () => {
    if (qualificationsContainer.children.length >= 8) {
        alert('Batas maksimal 10 kualifikasi tercapai.');
        return;
    }
    // Buat elemen div baru untuk textarea
    const newQualificationDiv = document.createElement('div');
    newQualificationDiv.classList.add('relative', 'flex', 'items-center', 'mb-4');

    // Buat textarea baru
    const newQualificationTextarea = document.createElement('textarea');

    newQualificationTextarea.name = 'qualifications[]';
    newQualificationTextarea.classList.add('form-control', 'textarea', 'textarea-warning', 'w-full', 'text-lg', 'rounded-lg');
    newQualificationTextarea.placeholder = 'Masukkan kualifikasi...';

    // Tambahkan textarea ke dalam div baru
    newQualificationDiv.appendChild(newQualificationTextarea);

    // Tambahkan div baru ke dalam container
    qualificationsContainer.appendChild(newQualificationDiv);
});

// Fungsi untuk menghapus textarea terakhir
removeQualificationButton.addEventListener('click', () => {
    // Ambil semua div kualifikasi
    const qualificationDivs = qualificationsContainer.querySelectorAll('div');

    // Hapus div terakhir jika lebih dari satu
    if (qualificationDivs.length > 1) {
        qualificationsContainer.removeChild(qualificationDivs[qualificationDivs.length - 1]);
    } else {
        alert('Minimal satu kualifikasi harus ada.');
    }
});
