@extends('layouts.app')

@section('main')
    
    <div class="relative w-full mt-[4.5rem] shadow-lg">
        <div class="relative h-96 overflow-hidden">
            <div>
              <img src="{{ asset('storage/'.$profil->first()->foto) }}" class="absolute block object-cover w-full h-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="..." />
                <div class="absolute top-0 -left-0 w-full h-full bg-black bg-opacity-40">
                    <div class="mx-auto max-w-screen-xl h-full flex flex-col justify-center items-center p-2">
                        <div data-aos="fade-up" data-aos-delay="100" data-aos-duration="500" class="text-center text-3xl sm:text-5xl font-bold text-white mb-8 tracking-normal">Berita Terbaru</div>
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
                                <span class="ml-1 text-sm font-medium text-gray-400 md:ml-2 dark:text-gray-400">Berita Terbaru</span>
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
                <div class="grid grid-cols-1 md:grid-cols-2 sm:grid-cols-1 gap-8">
                  @foreach ($beritas as $item)
                  <div class="group flex flex-col bg-white shadow-lg sm:flex-row md:max-w-2xl">
                    <a href="{{ url('berita/'.$item->judul_berita) }}" class="block relative overflow-hidden transform md:w-[30rem]">
                      <img class="object-cover w-full h-auto sm:h-80 sm:w-full transition-transform transform group-hover:scale-110 duration-500" src="{{ asset('storage/'.$item->foto) }}" alt="{{ $item->judul_berita }}"/>
                    </a>
                    <div class="flex flex-col p-5 leading-normal">
                      <a href="{{ url('berita/'.$item->judul_berita) }}">
                        <h5 class="mb-4 text-2xl font-medium tracking-tight text-gray-900 group-hover:text-blue-700 transition duration-500 capitalize">{{ Str::limit($item->judul_berita, 55) }}</h5>
                      </a>
                      <div class="flex mb-4">
                        <div class="flex items-center">
                          <svg class="w-3 h-3 text-slate-400 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                              d="M0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm14-7.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm-5-4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm-5-4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1ZM20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4Z"
                            />
                          </svg>
                          <div class="text-slate-400 text-sm font-normal px-1.5 pt-1 uppercase">{{ date('d-m-Y', strtotime($item->tanggal_publikasi)) }}</div>
                        </div>
                        <div class="flex ml-4 items-center">
                          <svg class="w-3 h-3 text-slate-400 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 14 18">
                            <path d="M7 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9Zm2 1H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                          </svg>
                          <div class="text-slate-400 text-sm font-normal px-1.5 pt-1 capitalize">{{ $item->username }}</div>
                        </div>
                      </div>
                      <p class="mb-4 font-normal text-gray-700 dark:text-gray-400">{!! Str::limit(strip_tags($item->deskripsi), 120) !!}</p>
                      <a href="{{ url('berita/'.$item->judul_berita) }}" class="inline-flex items-center font-medium text-blue-700 hover:underline"> Read more </a>
                    </div>
                  </div>
                  @endforeach
                </div>
                @if ($beritas->hasPages())
                <div class="justify-center flex mt-16">
                  {{ $beritas->links('pagination.pagination-1') }}
                </div>
                @endif
        </div>
    </div>
@endsection