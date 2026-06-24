<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include("partials.header")

    <body>
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[var(--background-color)] overflow-hidden shadow-sm sm:rounded-lg p-8">
                <style>
                    @import url('{{ asset("css/FAQ-page-colors.css") }}');
                </style>
                <div class="faq-section" style="color: white;">
                    <details class="faq-item">
                        <summary class="faq-question" style="color: white;">1. Do I need an account?</summary>
                        <p class="faq-answer" style="color: white;">Yes, you need an account to use the website.</p>
                    </details>
                    <details class="faq-item">
                        <summary class="faq-question" style="color: white;">2. Do I need to pay?</summary>
                        <p class="faq-answer" style="color: white;">No, you don't need to pay.</p>
                    </details>
                    <details class="faq-item">
                        <summary class="faq-question" style="color: white;">3. Can I modify my order later?</summary>
                        <p class="faq-answer" style="color: white;">No, once you have placed an order, it cannot be modified.</p>
                    </details>
                    <details class="faq-item">
                        <summary class="faq-question" style="color: white;">4. Can I upload multiple designs at once?</summary>
                        <p class="faq-answer" style="color: white;">No, you cannot upload multiple designs at once.</p>
                    </details>
                    <details class="faq-item">
                        <summary class="faq-question" style="color: white;">5. Is there expedited service?</summary>
                        <p class="faq-answer" style="color: white;">Yes, if you have an urgent order, you can indicate this.</p>
                    </details>
                    <details class="faq-item">
                        <summary class="faq-question" style="color: white;">6. Can I choose the color?</summary>
                        <p class="faq-answer" style="color: white;">Yes, you can choose the color of your product.</p>
                    </details>
                    <details class="faq-item">
                        <summary class="faq-question" style="color: white;">7. What formats are available?</summary>
                        <p class="faq-answer" style="color: white;">Available formats: .stl .cad .gcode .3mf</p>
                    </details>
                </div>
            </div>
        </div>
    </div>
    @include("partials.footer")
    
</body>
</html>
