<!DOCTYPE html>
<html>
<head>
    <title>Instellingen | VinciLab</title>
    <link rel="stylesheet" href="{{ asset('../css/style.css') }}">
</head>
<body>
    @include('partials.header')

    <section class="main-section">
        <div style="max-width: 600px; margin: 40px auto; padding: 20px;">
            <h2>Instellingen</h2>

            @if(session('success'))
                <div style="color: green; margin-bottom: 16px;">{{ session('success') }}</div>
            @endif

            <form method="POST" action="{{ route('settings.update') }}">
                @csrf
                <div style="margin-bottom: 16px;">
                    <label for="phone">Telefoonnummer contact</label><br>
                    <input type="text" name="phone" id="phone" value="{{ $phone }}" 
                        style="width: 100%; padding: 8px; margin-top: 8px;">
                    @error('phone')
                        <div style="color: red;">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit">Opslaan</button>
            </form>
        </div>
    </section>

    @include('partials.footer')
</body>
</html>