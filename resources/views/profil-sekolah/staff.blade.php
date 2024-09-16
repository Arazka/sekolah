@extends('layouts.app')

@section('main')
    
    <div class="relative w-full mt-[4.5rem] shadow-lg">
        <div class="relative h-96 overflow-hidden">
            <div>
              <img src="{{ asset('storage/'.$profil->first()->foto) }}" class="absolute block object-cover w-full h-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="..." />
                <div class="absolute top-0 -left-0 w-full h-full bg-black bg-opacity-40">
                    <div class="mx-auto max-w-screen-xl h-full flex flex-col justify-center items-center p-2">
                        <div data-aos="fade-up" data-aos-delay="100" data-aos-duration="500" class="text-center text-3xl sm:text-5xl font-bold text-white mb-8 tracking-normal">Kepala Sekolah dan Staff</div>
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
                                <span class="ml-1 text-sm font-medium text-gray-400 md:ml-2 dark:text-gray-400">Kepala Sekolah dan Staff</span>
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
        <div class="mx-auto max-w-screen-xss sm:max-w-screen-sm md:max-w-screen-md xl:max-w-screen-xl px-2">
            <div class="flex justify-center mb-8">
                <div class="xl:max-w-[25rem] sm:max-w-[18rem] max-w-md bg-white shadow-lg group">
                  <div class="block relative overflow-hidden transform">
                    <img class="w-full h-auto transition-transform transform group-hover:scale-105 duration-500" src="{{ asset('storage/'.$kepsek->foto) }}" alt="{{ $kepsek->nama }}"/>
                  </div>
                  <div class="p-5 text-center">
                    <div>
                      <h5 class="mb-2 text-2xl font-semibold tracking-wide text-gray-900">{{ $kepsek->nama }}</h5>
                    </div>
                    <p class="my-2 uppercase font-medium tracking-widest text-gray-400 text-sm">{{ $kepsek->nama_jabatan }}</p>
                  </div>
                </div>
            </div>
            <div class="flex justify-center mb-8">
                <div class="xl:max-w-[25rem] sm:max-w-[18rem] max-w-md bg-white shadow-lg group">
                  <div class="block relative overflow-hidden transform">
                    <img class="w-full h-auto transition-transform transform group-hover:scale-105 duration-500" src="{{ asset('storage/'.$wakil->foto) }}" alt="{{ $wakil->nama }}" />
                  </div>
                  <div class="p-5 text-center">
                    <div>
                      <h5 class="mb-2 text-2xl font-semibold tracking-wide text-gray-900">{{ $wakil->nama }}</h5>
                    </div>
                    <p class="my-2 uppercase font-medium tracking-widest text-gray-400 text-sm">{{ $wakil->nama_jabatan }}</p>
                  </div>
                </div>
            </div>
        </div>
        {{-- grid grid-cols-1 justify-center mx-auto max-w-screen-xss md:grid-cols-3 sm:grid-cols-2 sm:max-w-screen-sm md:max-w-screen-md xl:max-w-screen-xl gap-8" --}}
        <div class="mx-auto max-w-screen-xss sm:max-w-screen-sm md:max-w-screen-md xl:max-w-screen-xl px-2">
          <div class="grid grid-cols-1 md:grid-cols-3 sm:grid-cols-2 gap-8">
            @foreach ($staff as $pegawai)
            <div class="md:max-w-[30rem] max-w-md bg-white shadow-lg group">
              <div class="block relative overflow-hidden transform">
                <img class="w-full h-auto transition-transform transform group-hover:scale-105 duration-500" src="{{ asset('storage/'.$pegawai->foto) }}" alt="{{ $pegawai->nama }}" />
              </div>
              <div class="p-5 text-center">
                <div>
                  <h5 class="mb-2 text-2xl font-semibold tracking-wide text-gray-900">{{ $pegawai->nama }}</h5>
                </div>
                <p class="my-2 uppercase font-medium tracking-widest text-gray-400 text-sm">{{ $pegawai->nama_jabatan }}</p>
              </div>
            </div>
            @endforeach
          </div>
        </div>
    </div>
    
@endsection