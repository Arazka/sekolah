@extends('layouts.app')

@section('main')

    {{-- <div class="py-36 mt-14 sm:mt-[4.5rem] bg-blue-500">
        <div class="mx-auto max-w-screen-xl flex flex-col justify-center items-center px-2">
            <div class="text-center text-3xl sm:text-5xl font-bold text-white mb-8">Sejarah Visi dan Misi</div>
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('beranda') }}" class="inline-flex items-center text-sm font-medium text-white hover:underline">
                    <svg class="w-3 h-3 mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                    </svg>
                    Beranda
                    </a>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                    <svg class="w-3 h-3 text-white mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    <span class="ml-1 text-sm font-medium text-blue-700 md:ml-2 dark:text-gray-400">Sejarah Visi dan Misi</span>
                    </div>
                </li>
                </ol>
            </nav>
        </div>
    </div> --}}
    
    <div class="relative w-full mt-[4.5rem] shadow-lg">
        <div class="relative h-96 overflow-hidden">
            <div>
              <img src="{{ asset('storage/'.$profil->first()->foto) }}" class="absolute block object-cover w-full h-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="..." />
                <div class="absolute top-0 -left-0 w-full h-full bg-black bg-opacity-40">
                    <div class="mx-auto max-w-screen-xl h-full flex flex-col justify-center items-center p-2">
                        <div data-aos="fade-up" data-aos-delay="100" data-aos-duration="500" class="text-center text-3xl sm:text-5xl font-bold text-white tracking-normal mb-8">Sejarah Visi dan Misi</div>
                        <nav class="flex" aria-label="Breadcrumb">
                            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                            <li data-aos="fade-up" data-aos-delay="100" data-aos-duration="500" class="inline-flex items-center">
                                <a href="{{ route('beranda') }}" class="inline-flex items-center text-sm font-medium text-white hover:underline">
                                <svg class="w-3 h-3 mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                                </svg>
                                Beranda
                                </a>
                            </li>
                            <li data-aos="fade-up" data-aos-delay="100" data-aos-duration="500" aria-current="page">
                                <div class="flex items-center">
                                <svg class="w-3 h-3 text-white mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                </svg>
                                <span class="ml-1 text-sm font-medium text-gray-400 md:ml-2 dark:text-gray-400">Sejarah Visi dan Misi</span>
                                </div>
                            </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="py-16">
        @foreach ($profil as $profils)
        <div class="mx-auto max-w-screen-xss text-left sm:max-w-screen-sm md:max-w-screen-md xl:max-w-screen-xl px-2">
            <div id="sejarah" class="mb-12">
                <div class="text-3xl sm:text-4xl mb-1 text-gray-900 tracking-normal font-medium">Sejarah</div>
                <div class="text-xs text-slate-400 sm:text-base mb-2">Berikut adalah sejarah dari SD Muhammadiyah Tamanagung</div>
                <hr class="h-px bg-gray-200 border-0 dark:bg-gray-700 mb-2">
                <div class="text-gray-700 text-base font-normal">{!! $profils->sejarah !!}</div>
            </div>
            <div id="visi" class="mb-12">
                <div class="text-3xl sm:text-4xl mb-1 text-gray-900 tracking-normal font-medium">Visi</div>
                <div class="text-xs text-slate-400 sm:text-base mb-2">Berikut adalah visi dari SD Muhammadiyah Tamanagung</div>
                <hr class="h-[0.5px] bg-gray-200 border-0 dark:bg-gray-700 mb-2">
                <div class="text-gray-700 text-base font-normal">{!! $profils->visi !!}</div>
            </div>
            <div id="misi">
                <div class="text-3xl sm:text-4xl mb-1 text-gray-900 tracking-normal font-medium">Misi</div>
                <div class="text-xs text-slate-400 sm:text-base mb-2">Berikut adalah misi dari SD Muhammadiyah Tamanagung</div>
                <hr class="h-px bg-gray-200 border-0 dark:bg-gray-700 mb-2">
                <div class="text-gray-700 text-base font-normal">
                    {{-- {!! str_replace('<ol>', '<ol class="mt-2 space-y-4 list-decimal list-inside">', $profils->misi) !!}  --}}
                    {!! $profils->misi !!}
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <script>
        const sejarahContent = document.querySelector('#sejarah .text-gray-700');
        const SejarahOlElements = sejarahContent.querySelectorAll('ol');
        const SejarahUlElements = sejarahContent.querySelectorAll('ul');

        const visiContent = document.querySelector('#visi .text-gray-700');
        const VisiOlElements = visiContent.querySelectorAll('ol');
        const VisiUlElements = visiContent.querySelectorAll('ul');

        const misiContent = document.querySelector('#misi .text-gray-700');
        const MisiOlElements = misiContent.querySelectorAll('ol');
        const MisiUlElements = misiContent.querySelectorAll('ul');
    
        SejarahOlElements.forEach((ol) => {
            ol.classList.add('mt-2', 'space-y-2', 'list-decimal', 'list-outside', 'pl-4');
        });
        SejarahUlElements.forEach((ul) => {
            ul.classList.add('mt-2', 'space-y-2', 'list-disc', 'list-outside', 'pl-4');
        });

        VisiOlElements.forEach((ol) => {
            ol.classList.add('mt-2', 'space-y-2', 'list-decimal', 'list-outside', 'pl-4');
        });
        VisiUlElements.forEach((ul) => {
            ul.classList.add('mt-2', 'space-y-2', 'list-disc', 'list-outside', 'pl-4');
        });

        MisiOlElements.forEach((ol) => {
            ol.classList.add('mt-2', 'space-y-2', 'list-decimal', 'list-outside', 'pl-4');
        });
        MisiUlElements.forEach((ul) => {
            ul.classList.add('mt-2', 'space-y-2', 'list-disc', 'list-outside', 'pl-4');
        });
    </script>
@endsection