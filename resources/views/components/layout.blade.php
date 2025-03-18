<html lang="it" data-bs-theme="auto">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{$title ?? "Titolo di Default"}}</title>

    <!-- FAVICON -->
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">

    <!-- Google Fonts : Poppins &  Playfair Display -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- CSS Custom -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body>
    <x-back />

    <x-navbar />
    @if (session('message'))
    <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
        {{ session('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif


    <div class="min-vh-100">
        {{$slot}}
    </div>

    <x-footer />

    @livewireScripts

    <script src="/js/main.js"></script>
    <script>
        function getRandomPastelColor() {
            let hue = Math.floor(Math.random() * 360);
            return `hsl(${hue}, 80%, 85%)`;
        }

        document.addEventListener("DOMContentLoaded", function() {
            let spikeColor = getRandomPastelColor();
            let spikeElement = document.querySelector(".spikes");

            spikeElement.style.background = spikeColor;

            let afterStyle = `linear-gradient(135deg, ${spikeColor} 25%, transparent 25%), linear-gradient(225deg, ${spikeColor} 25%, transparent 25%)`;
            spikeElement.style.setProperty('--spike-color', spikeColor);

            let styleSheet = document.styleSheets[0];
            styleSheet.insertRule(`
            .spikes::after {
                background-image: ${afterStyle};
            }
        `, styleSheet.cssRules.length);
        });
    </script>
</body>

</html>