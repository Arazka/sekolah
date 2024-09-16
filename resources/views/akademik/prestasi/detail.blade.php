@extends('layouts.app')

@section('main')
    
    <div class="relative w-full mt-[4.5rem] shadow-lg">
        <div class="relative h-96 overflow-hidden">
            <div>
            <img src="{{ asset('storage/'.$profil->foto) }}" class="absolute block object-cover w-full h-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="..." />
                <div class="absolute top-0 -left-0 w-full h-full bg-black bg-opacity-40">
                    <div class="mx-auto max-w-screen-xl h-full flex flex-col justify-center items-center p-2">
                        <div data-aos="fade-up" data-aos-delay="100" data-aos-duration="500" class="text-center text-3xl sm:text-5xl font-bold text-white mb-8 tracking-normal">Prestasi Terbaru</div>
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
                                <span class="ml-1 text-sm font-medium text-gray-400 md:ml-2 dark:text-gray-400">Prestasi Terbaru</span>
                                </div>
                            </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mx-auto max-w-screen-xl py-16 px-2">
        <div class="mx-auto max-w-screen-xss sm:max-w-screen-sm md:max-w-screen-md xl:max-w-screen-xl">
                <div class="grid grid-cols-1 md:grid-cols-3 md:gap-14">
                    <div id="detail-prestasi" class="mb-8 md:mb-0 md:col-span-2">
                        <div class="w-full max-w-full md:h-96 h-auto overflow-hidden rounded-md">
                            <img class="object-cover w-full h-full" src="{{ asset('storage/'.$prestasi->foto) }}" alt="{{ $prestasi->nama }}" />
                        </div>                     
                        {{-- <img class="h-auto max-w-full rounded-md object-cover" src="{{ asset('storage/'.$prestasi->foto) }}" alt="{{ $prestasi->nama }}"/> --}}
                        <div class="my-4 xss:my-6">
                            <h5 class="text-2xl md:text-4xl font-medium tracking-tight text-gray-900">{{ $prestasi->nama }}</h5>
                        </div>
                        <div class="w-full text-left mb-6 font-normal text-gray-700">
                           {!! $prestasi->deskripsi !!}
                        </div>
                        <div class="w-full text-left bg-slate-100 p-8 rounded-md sm:bg-white sm:p-0 sm:rounded-none">
                            <div class="flex items-center mb-4 flex-col sm:mb-0 sm:flex-row">
                                <span class="font-semibold sm:w-48">Nama Penerima Prestasi </span>
                                <span class="font-normal capitalize text-gray-700 text-center"><span class="hidden sm:inline">:</span> {{ $prestasi->nama_penerima }}</span>
                            </div>
                            <div class="flex items-center mb-4 flex-col sm:mb-0 sm:flex-row">
                                <span class="font-semibold sm:w-48">Tingkat Prestasi </span>
                                <span class="font-normal capitalize text-gray-700 text-center"><span class="hidden sm:inline">:</span> {{ $prestasi->level_pencapaian }}</span>
                            </div>
                            <div class="flex items-center mb-4 flex-col sm:mb-0 sm:flex-row">
                                <span class="font-semibold sm:w-48">Kategori Prestasi </span>
                                <span class="font-normal capitalize text-gray-700 text-center"><span class="hidden sm:inline">:</span> {{ $prestasi->kategori }}</span>
                            </div>
                            <div class="flex items-center flex-col sm:mb-0 sm:flex-row">
                                <span class="font-semibold sm:w-48">Tanggal Pencapaian </span>
                                <span class="font-normal capitalize text-gray-700 text-center"><span class="hidden sm:inline">:</span> {{ date('d F Y', strtotime($prestasi->tanggal)) }}</span>
                            </div>
                        </div>                        
                    </div>
                    <div id="another-prestasi" class="w-full">
                        <div class="">
                            <div class="text-2xl text-left font-medium"><span class="text-blue-700">Prestasi</span> Terkini</div>
                            <hr class="h-px mt-2 bg-gray-200 border-0 dark:bg-gray-700">
                            @if ($terkini->count() > 0)
                            @foreach ($terkini as $item)
                            <a href="{{ url('prestasi/'.$item->nama) }}" class="flex items-center group w-full mt-6 rounded-md overflow-hidden hover:shadow-lg transition-transform transform hover:scale-105">
                                <img class="h-[3.7rem] max-w-full rounded-sm object-cover" src="{{ asset('storage/'.$item->foto) }}" alt="{{ $item->nama }}" width="90"/>
                                <h5 class="text-sm px-4 font-[500] text-gray-900 group-hover:text-blue-700 transition duration-500">{{ Str::limit($item->nama, 55) }}</h5>
                            </a>
                            @endforeach
                            @else
                            <div role="status" class="mt-6 animate-pulse space-y-0 space-x-8 rtl:space-x-reverse flex items-center">
                                <div class="flex items-center h-14 max-w-full rounded-sm">
                                    <svg class="w-10 h-10 text-gray-200 dark:text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                        <path d="M18 0H2a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-5.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm4.376 10.481A1 1 0 0 1 16 15H4a1 1 0 0 1-.895-1.447l3.5-7A1 1 0 0 1 7.468 6a.965.965 0 0 1 .9.5l2.775 4.757 1.546-1.887a1 1 0 0 1 1.618.1l2.541 4a1 1 0 0 1 .028 1.011Z"/>
                                    </svg>
                                </div>
                                <div class="w-full">
                                    <div class="h-2 bg-gray-200 rounded-full dark:bg-gray-700 mb-2.5"></div>
                                    <div class="h-2 bg-gray-200 rounded-full dark:bg-gray-700 max-w-[360px]"></div>
                                </div>
                                <span class="sr-only">Loading...</span>
                            </div>
                            <div role="status" class="mt-6 animate-pulse space-y-0 space-x-8 rtl:space-x-reverse flex items-center">
                                <div class="flex items-center h-14 max-w-full rounded-sm">
                                    <svg class="w-10 h-10 text-gray-200 dark:text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                        <path d="M18 0H2a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-5.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm4.376 10.481A1 1 0 0 1 16 15H4a1 1 0 0 1-.895-1.447l3.5-7A1 1 0 0 1 7.468 6a.965.965 0 0 1 .9.5l2.775 4.757 1.546-1.887a1 1 0 0 1 1.618.1l2.541 4a1 1 0 0 1 .028 1.011Z"/>
                                    </svg>
                                </div>
                                <div class="w-full">
                                    <div class="h-2 bg-gray-200 rounded-full dark:bg-gray-700 mb-2.5"></div>
                                    <div class="h-2 bg-gray-200 rounded-full dark:bg-gray-700 max-w-[360px]"></div>
                                </div>
                                <span class="sr-only">Loading...</span>
                            </div>
                            <div role="status" class="mt-6 animate-pulse space-y-0 space-x-8 rtl:space-x-reverse flex items-center">
                                <div class="flex items-center h-14 max-w-full rounded-sm">
                                    <svg class="w-10 h-10 text-gray-200 dark:text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                        <path d="M18 0H2a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-5.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm4.376 10.481A1 1 0 0 1 16 15H4a1 1 0 0 1-.895-1.447l3.5-7A1 1 0 0 1 7.468 6a.965.965 0 0 1 .9.5l2.775 4.757 1.546-1.887a1 1 0 0 1 1.618.1l2.541 4a1 1 0 0 1 .028 1.011Z"/>
                                    </svg>
                                </div>
                                <div class="w-full">
                                    <div class="h-2 bg-gray-200 rounded-full dark:bg-gray-700 mb-2.5"></div>
                                    <div class="h-2 bg-gray-200 rounded-full dark:bg-gray-700 max-w-[360px]"></div>
                                </div>
                                <span class="sr-only">Loading...</span>
                            </div>
                            <div role="status" class="mt-6 animate-pulse space-y-0 space-x-8 rtl:space-x-reverse flex items-center">
                                <div class="flex items-center h-14 max-w-full rounded-sm">
                                    <svg class="w-10 h-10 text-gray-200 dark:text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                        <path d="M18 0H2a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-5.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm4.376 10.481A1 1 0 0 1 16 15H4a1 1 0 0 1-.895-1.447l3.5-7A1 1 0 0 1 7.468 6a.965.965 0 0 1 .9.5l2.775 4.757 1.546-1.887a1 1 0 0 1 1.618.1l2.541 4a1 1 0 0 1 .028 1.011Z"/>
                                    </svg>
                                </div>
                                <div class="w-full">
                                    <div class="h-2 bg-gray-200 rounded-full dark:bg-gray-700 mb-2.5"></div>
                                    <div class="h-2 bg-gray-200 rounded-full dark:bg-gray-700 max-w-[360px]"></div>
                                </div>
                                <span class="sr-only">Loading...</span>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
        </div>
    </div>
    
@endsection