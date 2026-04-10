const input = document.getElementById('file-upload');
const filenameDisplay = document.getElementById('filename-display');


// Handle file selection
input.addEventListener('change', () => {
    if (input.files.length > 0) {
        filenameDisplay.textContent = "Selected file: " + input.files[0].name;
    } else {
        filenameDisplay.textContent = "No file selected";
    }
});