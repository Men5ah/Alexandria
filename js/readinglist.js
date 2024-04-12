// Get references to the button and overlay elements
const togglePopupButton = document.getElementById('togglePopup');
const overlay = document.getElementById('overlay');
const overlay2 = document.getElementById('overlay2');
const popupForm = document.getElementById('popupForm');
const toggleModifyButton = document.getElementById('toggleModify');
const popupFormModify = document.getElementById('popupFormModify');

// Event listener for the button to toggle the popup form
togglePopupButton.addEventListener('click', () => {
    popupForm.style.display = 'block';
    overlay.style.display = 'block';
});

// Event listener for the overlay to close the popup form
overlay.addEventListener('click', () => {
    popupForm.style.display = 'none';
    overlay.style.display = 'none';
});

toggleModifyButton.addEventListener('click', () => {
    popupFormModify.style.display = 'block';
    overlay.style.display = 'block';
});

overlay2.addEventListener('click', () => {
    popupForm.style.display = 'none';
    overlay2.style.display = 'none';
});