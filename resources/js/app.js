import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

document.addEventListener('DOMContentLoaded', function () {
    const rows = document.querySelectorAll('.clickable-row');
    rows.forEach(row => {
        row.addEventListener('click', () => {
            window.location.href = row.dataset.href;
        });
    });
});


function togglePopupDisplay() {
    const popup = document.querySelector(".warning-popup");

    if (popup.style.display === "none" || popup.style.display === "") {
        popup.style.display = "flex";
    } else {
        popup.style.display = "none";
    }
}
window.togglePopupDisplay = togglePopupDisplay;

function checkCompanyName(expectedName) {
    const input = document.getElementById('confirm-name');
    const deleteBtn = document.getElementById('delete-btn');

    if (input && input.value.trim() === expectedName) {
        deleteBtn.removeAttribute('disabled');
        deleteBtn.classList.remove('opacity-50', 'cursor-not-allowed');
    } else {
        deleteBtn.setAttribute('disabled', 'true');
        deleteBtn.classList.add('opacity-50', 'cursor-not-allowed');
    }
}
window.checkCompanyName = checkCompanyName;

document.addEventListener('DOMContentLoaded', function () {
    const createForm = document.getElementById('create');
    const createBtn = document.getElementById('create-btn');
    if (createForm && createBtn) {
        createForm.addEventListener('submit', function () {
            createBtn.disabled = true;
        });
    }
});

