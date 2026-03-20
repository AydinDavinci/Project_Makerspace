<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    <link rel="stylesheet" href="{{ asset('../css/settings.css') }}">
</head>
<body>
    @include("partials.header")
    <!-- account details -->
    <div class="Box">
        <p class="Titel">Account</p>
        <div class="Wrap-Box">
            <div class="Info-Field">
                <p>Email:</p>
                <!-- <p class="Fill-in-Field">example Email</p> -->
                <input class="Fill-in-Field" placeholder="example Email">
            </div>
            <div class="Info-Field">
                <p>Da Vinci Number:</p>
                <!-- <p class="Fill-in-Field">example Number</p> -->
                <input class="Fill-in-Field" placeholder="example Number">
            </div>
            <div class="Info-Field">
                <p>Account Name:</p>
                <!-- <p class="Fill-in-Field">example Name</p> -->
                <input class="Fill-in-Field" placeholder="example Name">
            </div>
            <div class="Info-Field">
                <p>Phonenumber:</p>
                <p class="Fill-in-Field">example Phonenumber</p>
            </div>
            <button class="Save-Button">Save</button>
        </div>
    </div>

    <!-- account settings -->
    <div class="Box-Settings">
        <p class="Titel">Algemeen</p>
        <p class="Small-Titel">Notification Settings</p>
        <div class="Toggle-Field">
            <p>Receive Email for every request</p>
            <label class="Toggle">
                <input type="checkbox">
                <span class="Slider"></span>
            </label>
        </div>
        <div class="Toggle-Field">
            <p>Email limit before going silent</p>
            <div class="Toggle-Input-Group">
                <input type="number" class="Number-Field" disabled placeholder="0">
                <label class="Toggle">
                    <input type="checkbox" onchange="toggleInput(this)">
                    <span class="Slider"></span>
                </label>
            </div>
        </div>
        <div class="Toggle-Field">
            <p>Send notification per sms</p>
            <label class="Toggle">
                <input type="checkbox">
                <span class="Slider"></span>
            </label>
        </div>
    </div>
</body>
<script src="{{ asset('../js/settings.js') }}"></script>
</html>