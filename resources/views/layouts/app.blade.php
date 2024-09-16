<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SD Muhammadiyah Tamanagung</title>
    <link rel="icon" href="{{ asset('img/muhatama.png') }}" type="image/x-icon">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <!-- <link rel="stylesheet" href="node_modules/flowbite/dist/flowbite.min.css" /> -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet" />
  </head>
  <body class="font-[roboto]">
    <!-- navbar -->
    @include('layouts.components.client.navbar')
    <!-- navbar -->

    {{-- content --}}
    @yield('main')
    {{-- content --}}

    <!-- footer -->
    @include('layouts.components.client.footer')
    <!-- footer -->
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
    {{-- <script src="https://cdn.jsdelivr.net/gh/studio-freight/lenis@1.0.27/bundled/lenis.min.js"></script>
    <script>
      const lenis = new Lenis()

      lenis.on('scroll', (e) => {
        console.log(e)
      })

      function raf(time) {
        lenis.raf(time)
        requestAnimationFrame(raf)
      }

      requestAnimationFrame(raf)
  </script> --}}
  </body>
</html>
