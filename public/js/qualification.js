const qualificationsContainer = document.getElementById('qualifications-container');
const addQualificationButton = document.getElementById('add-qualification');
const removeQualificationButton = document.getElementById('remove-qualification');

addQualificationButton.addEventListener('click', () => {
    if (qualificationsContainer.children.length >= 8) {
        alert('Batas maksimal 10 kualifikasi tercapai.');
        return;
    }
    const newQualificationDiv = document.createElement('div');
    newQualificationDiv.classList.add('relative', 'flex', 'items-center', 'mb-4');

    const newQualificationTextarea = document.createElement('textarea');

    newQualificationTextarea.name = 'qualifications[]';
    newQualificationTextarea.classList.add('form-control', 'textarea', 'textarea-warning', 'w-full', 'text-lg', 'rounded-lg');
    newQualificationTextarea.placeholder = 'Masukkan kualifikasi...';

    newQualificationDiv.appendChild(newQualificationTextarea);

    qualificationsContainer.appendChild(newQualificationDiv);
});

removeQualificationButton.addEventListener('click', () => {
    const qualificationDivs = qualificationsContainer.querySelectorAll('div');

    if (qualificationDivs.length > 1) {
        qualificationsContainer.removeChild(qualificationDivs[qualificationDivs.length - 1]);
    } else {
        alert('Minimal satu kualifikasi harus ada.');
    }
});
