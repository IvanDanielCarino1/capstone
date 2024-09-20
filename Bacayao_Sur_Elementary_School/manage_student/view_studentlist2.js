function togglePopupForm() {
    var overlay = document.getElementById('overlay');
    var popup = document.getElementById('popupForm');
    overlay.style.display = 'block';
    popup.style.display = 'block';
}


function closeModal() {
    var overlay = document.getElementById('overlay');
    var popup = document.getElementById('popupForm');
    overlay.style.display = 'none';
    popup.style.display = 'none';
}


document.getElementById('addRecordButton').addEventListener('click', togglePopupForm);
