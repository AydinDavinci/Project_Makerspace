function toggleInput(checkbox) {
    const numberField = checkbox.closest('.Toggle-Input-Group').querySelector('.Number-Field');
    numberField.disabled = !checkbox.checked;
}