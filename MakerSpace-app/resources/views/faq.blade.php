<!DOCTYPE html>
<html>
<head>
    <title>FAQ | VinciLab</title>
    <link rel="stylesheet" href="{{ asset('../css/style.css') }}">
</head>
<body>
    @include('partials.header')

    <section class="main-section">
        <div style="max-width: 600px; margin: 40px auto; padding: 20px;">
            <h2>FAQ</h2>
            <div class="faq-section">
                <details class="faq-item">
                    <summary class="faq-question">1. Heb ik een account nodig?</summary>
                    <p class="faq-answer">Ja, je hebt een account nodig, zonder een account kan je niet gebruikmaken van de website.</p>
                </details>
                <details class="faq-item">
                    <summary class="faq-question">2. Moet ik betalen?</summary>
                    <p class="faq-answer">Nee, je hoeft niet te betalen.</p>
                </details>
                <details class="faq-item">
                    <summary class="faq-question">3. Kan ik mijn bestelling later aanpassen?</summary>
                    <p class="faq-answer">Nee, als je een bestelling geplaatst hebt, is het niet aanpasbaar.</p>
                </details>
                <details class="faq-item">
                    <summary class="faq-question">4. Kan ik meerdere ontwerpen tegelijk uploaden?</summary>
                    <p class="faq-answer">Nee, je kan niet meerdere ontwerpen tegelijk uploaden.</p>
                </details>
                <details class="faq-item">
                    <summary class="faq-question">5. Is er spoedservice?</summary>
                    <p class="faq-answer">Ja, als je bestelling spoed heeft kan je dat aangeven.</p>
                </details>
                <details class="faq-item">
                    <summary class="faq-question">6. Kan ik de kleur kiezen?</summary>
                    <p class="faq-answer">Ja, je kan de kleur van je product kiezen.</p>
                </details>
                <details class="faq-item">
                    <summary class="faq-question">7. Welke formaten zijn beschikbaar?</summary>
                    <p class="faq-answer">Beschikbare formaten: .stl .cad .gcode .3mf</p>
                </details>
                <details class="faq-item">
                    <summary class="faq-question">8. Hoe kan ik contact opnemen?</summary>
                    <p class="faq-answer">
                        Bel ons op:
                        @php $phone = \App\Models\Setting::where('key', 'contact_phone')->first(); @endphp
                        {{ $phone ? $phone->value : 'Geen telefoonnummer ingesteld.' }}
                    </p>
                </details>
            </div>
        </div>
    </section>

    @include('partials.footer')
</body>
</html>