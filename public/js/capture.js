const absenMasukBtn = document.getElementById('absenMasukBtn');
const absenPulangBtn = document.getElementById('absenPulangBtn');
const captureContainer = document.getElementById('captureContainer');
const formMasuk = document.getElementById('absenMasukForm');
const formPulang = document.getElementById('absenPulangForm');
const video = document.getElementById('camera');
const canvas = document.getElementById('snapshot');
const previewContainer = document.getElementById('preview-container');
const previewImage = document.getElementById('preview');
const retakeButton = document.getElementById('retake');
const submitFoto = document.getElementById('submitFoto');
let activeForm = null; // Form yang aktif (Absen Masuk atau Pulang)

const fotoMasukInput = document.getElementById('fotoMasuk');
const fotoPulangInput = document.getElementById('fotoPulang');

function startCapture(form) {
    activeForm = form;
    captureContainer.classList.remove('hidden');
    navigator.mediaDevices.getUserMedia({ video: true }).then(stream => {
        video.srcObject = stream;
    }).catch(err => {
        alert("Gagal mengakses kamera.");
        console.error(err);
    });
}

function takeSnapshot() {
    const context = canvas.getContext('2d');
    canvas.width = video.videoWidth;
    canvas.height = video.videoHeight;
    context.drawImage(video, 0, 0, canvas.width, canvas.height);
    const imageData = canvas.toDataURL('image/png');

    if (activeForm === formMasuk) {
        fotoMasukInput.value = imageData;
    } else if (activeForm === formPulang) {
        fotoPulangInput.value = imageData;
    }

    previewImage.src = imageData;
    previewContainer.classList.remove('hidden');
    video.classList.add('hidden');
    submitFoto.classList.remove('hidden');
}

absenMasukBtn.addEventListener('click', () => startCapture(formMasuk));
absenPulangBtn.addEventListener('click', () => startCapture(formPulang));

video.addEventListener('click', takeSnapshot);

retakeButton.addEventListener('click', () => {
    video.classList.remove('hidden');
    previewContainer.classList.add('hidden');
    submitFoto.classList.add('hidden');

    if (activeForm === formMasuk) {
        fotoMasukInput.value = '';
    } else if (activeForm === formPulang) {
        fotoPulangInput.value = '';
    }
});

submitFoto.addEventListener('click', () => {
    if (activeForm) {
        activeForm.submit();
    }
});
