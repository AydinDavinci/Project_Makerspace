const hiddenSettings = document.querySelector('.advanced_settings');
const hiddenSupportSettings = document.querySelector('.advanced_support_settings');
const hiddenInfilSettings = document.querySelector('.advanced_infill_settings');

const checkbox = document.getElementById('advanced_settings_checkbox');
const supportCheckbox = document.getElementById('advanced_support_settings_checkbox');
const infillCheckbox = document.getElementById('advanced_infill_settings_checkbox');
const slider = document.getElementById("myRange");
const output = document.getElementById("rangeValue");

const supportDropdown = document.getElementById('print_support_dropdown');
const supportWarning = document.getElementById('support_warning');

supportDropdown.addEventListener('change', function() {
    if (this.value === 'none') {
        supportWarning.innerHTML = "<strong>Warning:</strong> Disabling supports may lead to print failure for complex models.";
    } else {
        supportWarning.textContent = "";
    }
});


ToggleHiddenSettings(checkbox, hiddenSettings);
ToggleHiddenSettings(supportCheckbox, hiddenSupportSettings);
ToggleHiddenSettings(infillCheckbox, hiddenInfilSettings);



function ToggleHiddenSettings(checkbox, section) {
    checkbox.addEventListener('change', function() {
        if (this.checked) {
            section.style.display = 'block';
        } else {
            section.style.display = 'none';
        }
    });
}

output.textContent = slider.value + "% infill density selected";

slider.addEventListener("input", function(){
    output.textContent = slider.value + "% infill density selected";
})


