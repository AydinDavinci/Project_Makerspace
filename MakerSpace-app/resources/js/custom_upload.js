const input = document.getElementById('file-upload');
const filenameDisplay = document.getElementById('filename-display');
const uploadButton = document.querySelector('.upload_img'); // Assuming .upload_img is your custom button

// Trigger file input when custom button is clicked
uploadButton.addEventListener('click', () => {
    input.click();
});

// Handle file selection
input.addEventListener('change', () => {
    if (input.files.length > 0) {
        filenameDisplay.textContent = "Selected file: " + input.files[0].name;
    } else {
        filenameDisplay.textContent = "No file selected";
    }
});