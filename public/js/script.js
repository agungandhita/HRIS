const jobDescriptionContainer = document.getElementById('jobDescriptionContainer');
const addJobDescriptionBtn = document.getElementById('addJobDescriptionBtn');
const removeJobDescriptionBtn = document.getElementById('removeJobDescriptionBtn');

let jobDescriptionCount = 1;

addJobDescriptionBtn.addEventListener('click', (event) => {

    event.preventDefault();

    jobDescriptionCount++;

    const newJobDescriptionDiv = document.createElement('div');
    newJobDescriptionDiv.classList.add('relative', 'flex', 'items-center', 'mb-4', 'job-description-item');

    const newJobDescriptionTextarea = document.createElement('textarea');
    newJobDescriptionTextarea.name = 'job_description[]';
    newJobDescriptionTextarea.id = `job_description_${jobDescriptionCount}`;
    newJobDescriptionTextarea.classList.add('form-control', 'textarea', 'textarea-warning', 'w-full', 'text-lg', 'rounded-lg');
    newJobDescriptionTextarea.placeholder = 'Masukkan deskripsi pekerjaan...';

    newJobDescriptionDiv.appendChild(newJobDescriptionTextarea);

    jobDescriptionContainer.appendChild(newJobDescriptionDiv);
});

removeJobDescriptionBtn.addEventListener('click', (event) => {
    event.preventDefault();

    const jobDescriptionItems = document.querySelectorAll('.job-description-item');

    if (jobDescriptionItems.length > 1) {
        jobDescriptionContainer.removeChild(jobDescriptionItems[jobDescriptionItems.length - 1]);
    } else {
        alert('Minimal satu deskripsi pekerjaan harus ada.');
    }
});
