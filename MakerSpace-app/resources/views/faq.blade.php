<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('FAQ') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[var(--background-color)] overflow-hidden shadow-sm sm:rounded-lg p-8">
                <style>
                    @import url('{{ asset("css/FAQ-page-colors.css") }}');
                </style>
                <div class="faq-section" style="color: white;">
                    <details class="faq-item">
                        <summary class="faq-question" style="color: white;">1. Heb ik een account nodig?</summary>
                        <p class="faq-answer" style="color: white;">Ja, je hebt een account nodig, zonder een account kan je niet gebruikmaken van de website.</p>
                    </details>
                    <details class="faq-item">
                        <summary class="faq-question" style="color: white;">2. Moet ik betalen?</summary>
                        <p class="faq-answer" style="color: white;">Nee, je hoeft niet te betalen.</p>
                    </details>
                    <details class="faq-item">
                        <summary class="faq-question" style="color: white;">3. Kan ik mijn bestelling later aanpassen?</summary>
                        <p class="faq-answer" style="color: white;">Nee, als je een bestelling geplaatst hebt, is het niet aanpasbaar.</p>
                    </details>
                    <details class="faq-item">
                        <summary class="faq-question" style="color: white;">4. Kan ik meerdere ontwerpen tegelijk uploaden?</summary>
                        <p class="faq-answer" style="color: white;">Nee, je kan niet meerdere ontwerpen tegelijk uploaden.</p>
                    </details>
                    <details class="faq-item">
                        <summary class="faq-question" style="color: white;">5. Is er spoedservice?</summary>
                        <p class="faq-answer" style="color: white;">Ja, als je bestelling spoed heeft kan je dat aangeven.</p>
                    </details>
                    <details class="faq-item">
                        <summary class="faq-question" style="color: white;">6. Kan ik de kleur kiezen?</summary>
                        <p class="faq-answer" style="color: white;">Ja, je kan de kleur van je product kiezen.</p>
                    </details>
                    <details class="faq-item">
                        <summary class="faq-question" style="color: white;">7. Welke formaten zijn beschikbaar?</summary>
                        <p class="faq-answer" style="color: white;">Beschikbare formaten: .stl .cad .gcode .3mf</p>
                    </details>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
