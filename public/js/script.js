// Ambil elemen container dan tombol
const jobDescriptionContainer = document.getElementById('jobDescriptionContainer');
const addJobDescriptionBtn = document.getElementById('addJobDescriptionBtn');
const removeJobDescriptionBtn = document.getElementById('removeJobDescriptionBtn');

// Hitung jumlah deskripsi pekerjaan saat ini
let jobDescriptionCount = 1;

// Fungsi untuk menambah textarea baru
addJobDescriptionBtn.addEventListener('click', (event) => {

    event.preventDefault(); // Mencegah form submit

    jobDescriptionCount++;

    // Buat elemen div baru untuk textarea
    const newJobDescriptionDiv = document.createElement('div');
    newJobDescriptionDiv.classList.add('relative', 'flex', 'items-center', 'mb-4', 'job-description-item');

    // Buat textarea baru
    const newJobDescriptionTextarea = document.createElement('textarea');
    newJobDescriptionTextarea.name = 'job_description[]';
    newJobDescriptionTextarea.id = `job_description_${jobDescriptionCount}`;
    newJobDescriptionTextarea.classList.add('form-control', 'textarea', 'textarea-warning', 'w-full', 'text-lg', 'rounded-lg');
    newJobDescriptionTextarea.placeholder = 'Masukkan deskripsi pekerjaan...';

    // Tambahkan textarea ke dalam div baru
    newJobDescriptionDiv.appendChild(newJobDescriptionTextarea);

    // Tambahkan div baru ke dalam container
    jobDescriptionContainer.appendChild(newJobDescriptionDiv);
});

// Fungsi untuk menghapus textarea terakhir
removeJobDescriptionBtn.addEventListener('click', (event) => {
    event.preventDefault(); // Mencegah form submit

    // Ambil semua div deskripsi pekerjaan
    const jobDescriptionItems = document.querySelectorAll('.job-description-item');

    // Hapus div terakhir jika lebih dari satu
    if (jobDescriptionItems.length > 1) {
        jobDescriptionContainer.removeChild(jobDescriptionItems[jobDescriptionItems.length - 1]);
    } else {
        alert('Minimal satu deskripsi pekerjaan harus ada.');
    }
});
