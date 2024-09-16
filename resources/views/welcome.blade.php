@extends('layouts.app')

@section('main')
    
      <!-- carousel -->
      <div id="default-carousel" class="relative w-full mt-[4.5rem]" data-carousel="slide">
        <!-- Carousel wrapper -->
        <div class="relative h-48 xs:h-[15rem] sm:h-[27rem] md:h-[38rem] lg:h-[42rem] xxl:h-[55rem] overflow-hidden shadow-lg">
          @foreach ($banner as $banners)
          <div class="hidden duration-700 ease-in-out" data-carousel-item>
              <img src="{{ asset('storage/'.$banners->foto) }}" class="absolute block object-cover w-full h-full max-w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="..." />
              <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-40">
                  <div class="text-white mx-auto max-w-screen-xl h-full flex items-center p-2">
                      <p class="w-full sm:w-2/3 md:w-3/4 text-xl sm:text-3xl md:text-6xl font-bold tracking-tight font-sans">{{ $banners->judul_banner }}</p>
                  </div>
              </div>
          </div>
          @endforeach
        </div>      
        <!-- Slider indicators -->
        <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-2 left-1/2 sm:hidden">
          <button type="button" class="w-2 h-2 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
          <button type="button" class="w-2 h-2 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
          <button type="button" class="w-2 h-2 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
          <button type="button" class="w-2 h-2 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
          <button type="button" class="w-2 h-2 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
        </div>
        <!-- Slider controls -->
        <div class="hidden sm:block">
          <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
            <span
              class="inline-flex items-center justify-center w-7 h-7 sm:w-10 sm:h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none"
            >
              <svg class="w-2 h-2 sm:w-4 sm:h-4 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4" />
              </svg>
              <span class="sr-only">Previous</span>
            </span>
          </button>
        </div>
        <div class="hidden sm:block">
          <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
            <span
              class="inline-flex items-center justify-center w-7 h-7 sm:w-10 sm:h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none"
            >
              <svg class="w-2 h-2 sm:w-4 sm:h-4 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
              </svg>
              <span class="sr-only">Next</span>
            </span>
          </button>
        </div>
      </div>
      <!-- carousel -->
  
      <!-- Motto -->
      <div class="mx-auto max-w-screen-xl mt-10 px-2 md:mt-24">
        <div class="text-center mb-4 sm:mb-12">
          <div class="text-3xl sm:text-5xl font-normal tracking-tight mb-2"><span class="text-blue-700">MUHA</span>TAMA</div>
          <div class="text-xs text-slate-400 sm:text-base">Selamat Datang di Sekolah Unggulan, Tempat Membentuk Prestasi dan Karakter Terbaik</div>
        </div>
        <div class="grid grid-cols-1 max-w-screen-xss sm:grid-cols-2 sm:max-w-screen-sm mx-auto md:max-w-screen-md xl:max-w-screen-xl md:grid-cols-4 gap-4 text-center mb-4 sm:mb-8">
          <div class="block max-w-md md:hover:-translate-y-4 p-6 bg-slate-50 shadow-md group hover:bg-blue-400 transition ease-in-out duration-300 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <!-- <h5 class="mb-2 text-xl sm:text-xl font-medium tracking-tight text-black group-hover:text-gray-50 transition duration-300 dark:text-white">Eksplorasi Ilmu di Lingkungan Pendidikan yang Inspiratif</h5> -->
            <div class="flex justify-center mb-6">
              <svg class="w-[50px] h-[50px] text-blue-400 group-hover:text-white transition duration-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                <path
                  d="M9 1.334C7.06.594 1.646-.84.293.653a1.158 1.158 0 0 0-.293.77v13.973c0 .193.046.383.134.55.088.167.214.306.366.403a.932.932 0 0 0 .5.147c.176 0 .348-.05.5-.147 1.059-.32 6.265.851 7.5 1.65V1.334ZM19.707.653C18.353-.84 12.94.593 11 1.333V18c1.234-.799 6.436-1.968 7.5-1.65a.931.931 0 0 0 .5.147.931.931 0 0 0 .5-.148c.152-.096.279-.235.366-.403.088-.167.134-.357.134-.55V1.423a1.158 1.158 0 0 0-.293-.77Z"
                />
              </svg>
            </div>
            <p class="font-medium text-gray-700 dark:text-gray-400 group-hover:text-white transition duration-300">Eksplorasi Ilmu di Lingkungan Pendidikan yang Inspiratif</p>
          </div>
          <div class="block max-w-md md:hover:-translate-y-4 p-6 bg-slate-50 shadow-md group hover:bg-blue-400 transition ease-in-out duration-300 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <div class="flex justify-center mb-6">
              <svg class="w-[50px] h-[50px] text-blue-400 group-hover:text-white transition duration-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path
                  d="m13.835 7.578-.005.007-7.137 7.137 2.139 2.138 7.143-7.142-2.14-2.14Zm-10.696 3.59 2.139 2.14 7.138-7.137.007-.005-2.141-2.141-7.143 7.143Zm1.433 4.261L2 12.852.051 18.684a1 1 0 0 0 1.265 1.264L7.147 18l-2.575-2.571Zm14.249-14.25a4.03 4.03 0 0 0-5.693 0L11.7 2.611 17.389 8.3l1.432-1.432a4.029 4.029 0 0 0 0-5.689Z"
                />
              </svg>
            </div>
            <p class="font-medium text-gray-700 dark:text-gray-400 group-hover:text-white transition duration-300">Mendidik Generasi Penerus yang Kreatif dan Berwawasan</p>
          </div>
          <div class="block max-w-md md:hover:-translate-y-4 p-6 bg-slate-50 shadow-md group hover:bg-blue-400 transition ease-in-out duration-300 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <div class="flex justify-center mb-6">
              <svg class="w-[50px] h-[50px] text-blue-400 group-hover:text-white transition duration-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path
                  d="M10 15a5 5 0 1 0 0-10 5 5 0 0 0 0 10Zm0-11a1 1 0 0 0 1-1V1a1 1 0 0 0-2 0v2a1 1 0 0 0 1 1Zm0 12a1 1 0 0 0-1 1v2a1 1 0 1 0 2 0v-2a1 1 0 0 0-1-1ZM4.343 5.757a1 1 0 0 0 1.414-1.414L4.343 2.929a1 1 0 0 0-1.414 1.414l1.414 1.414Zm11.314 8.486a1 1 0 0 0-1.414 1.414l1.414 1.414a1 1 0 0 0 1.414-1.414l-1.414-1.414ZM4 10a1 1 0 0 0-1-1H1a1 1 0 0 0 0 2h2a1 1 0 0 0 1-1Zm15-1h-2a1 1 0 1 0 0 2h2a1 1 0 0 0 0-2ZM4.343 14.243l-1.414 1.414a1 1 0 1 0 1.414 1.414l1.414-1.414a1 1 0 0 0-1.414-1.414ZM14.95 6.05a1 1 0 0 0 .707-.293l1.414-1.414a1 1 0 1 0-1.414-1.414l-1.414 1.414a1 1 0 0 0 .707 1.707Z"
                />
              </svg>
            </div>
            <p class="font-medium text-gray-700 dark:text-gray-400 group-hover:text-white transition duration-300">Pusat Pendidikan Berkualitas untuk Masa Depan yang Cerah</p>
          </div>
          <div class="block max-w-md md:hover:-translate-y-4 p-6 bg-slate-50 shadow-md group hover:bg-blue-400 transition ease-in-out duration-300 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <div class="flex justify-center mb-6">
              <svg class="w-[50px] h-[50px] text-blue-400 group-hover:text-white transition duration-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                <path
                  d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"
                />
              </svg>
            </div>
            <p class="font-medium text-gray-700 dark:text-gray-400 group-hover:text-white transition duration-300">Bersama Kami, Anak Anda Akan Meraih Prestasi Luar Biasa</p>
          </div>
        </div>
      </div>
      <!-- Motto -->
  
      <!-- about -->
      <div class="py-16 sm:py-32 mt-10 md:mt-32 bg-sky-50">
        <div class="mx-auto max-w-screen-xl px-2">
          <!-- grid grid-cols-1 md:grid-cols-2 gap-7 max-w-screen-sm mx-auto md:max-w-screen-xl -->
          <div class="grid grid-cols-1 md:grid-cols-2 gap-7 max-w-screen-xss sm:max-w-screen-sm mx-auto md:max-w-screen-md xl:max-w-screen-xl px-2">
            <div class="mb-2 max-w-2xl">
              <img class="h-auto max-w-full" src="{{ asset('storage/'.$profil->first()->foto) }}" alt="image description"/>
            </div>
            <div>
              <div class="mb-4">
                <div class="text-3xl sm:text-5xl font-normal tracking-tight text-left md:text-left mb-1">Tentang <span class="text-blue-700">Kami</span></div>
                <div class="text-xs text-slate-400 sm:text-base">Merentangkan sayap kami di dunia pendidikan</div>
              </div>
              <div class="w-full text-left mb-5 font-normal text-gray-700">
                {{ Str::limit(strip_tags($profil->first()->sejarah), 580) }}
              </div>
              <div class="text-left md:text-left">
                <a
                  href="{{ route('sejarah') }}"
                  class="inline-flex group items-center px-3 py-2 md:px-5 md:py-2.5 text-sm font-medium transition duration-300 text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                >
                  Read more
                  <svg class="w-3.5 h-3.5 ml-2 md:group-hover:translate-x-1 transition duration-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                  </svg>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- about -->
  
      <!-- prestasi -->
      <div class="mx-auto max-w-screen-xl py-16 sm:py-32 px-2">
        <div class="mb-4 text-left md:mb-8 mx-auto max-w-screen-xss sm:max-w-screen-sm md:max-w-screen-md xl:max-w-screen-xl">
            <div class="text-3xl sm:text-5xl font-normal tracking-tight mb-1"><span class="text-blue-700">Prestasi</span> Terbaru</div>
            <div class="text-xs text-slate-400 sm:text-base">Prestasi terbaru yang berhasil kami raih dalam beberapa bulan terakhir</div>
        </div>
        <div class="grid grid-cols-1 mx-auto max-w-screen-xss md:grid-cols-3 sm:grid-cols-2 sm:max-w-screen-sm md:max-w-screen-md xl:max-w-screen-xl gap-8">
            @foreach ($prestasi as $prestasis)
            <div class="max-w-md bg-white shadow-lg group">
                <a href="{{ url('prestasi/'.$prestasis->nama) }}" class="block relative overflow-hidden transform">
                    <img class="max-w-full transition-transform transform group-hover:scale-110 duration-500" src="{{ asset('storage/'.$prestasis->foto) }}" alt="{{ $prestasis->nama }}"/>
                </a>
                <div class="p-5">
                    <a href="{{ url('prestasi/'.$prestasis->nama) }}">
                        <h5 class="mb-2 text-2xl font-medium tracking-tight text-gray-900 group-hover:text-blue-700 transition duration-500">{{ Str::limit($prestasis->nama, 45) }}</h5>
                    </a>
                    <p class="my-4 font-normal text-gray-700 dark:text-gray-400">{{ Str::limit(strip_tags($prestasis->deskripsi), 120) }}</p>
                    <a href="{{ url('prestasi/'.$prestasis->nama) }}" class="inline-flex items-center font-medium text-blue-700 hover:underline"> Read more </a>
                </div>
            </div>
            @endforeach
        </div>
      </div>    
      <!-- prestasi -->
  
      <!-- berita -->
      <div class="py-16 sm:py-32 bg-sky-50">
        <div class="mb-4 md:mb-8 mx-auto max-w-screen-xss text-left sm:max-w-screen-sm md:max-w-screen-md xl:max-w-screen-xl px-2">
          <div class="text-3xl sm:text-5xl font-normal tracking-tight mb-1"><span class="text-blue-700">Berita</span> Terbaru</div>
          <div class="text-xs text-slate-400 sm:text-base">Update berita terbaru dan terkini seputar sekolah</div>
        </div>
        <div class="grid grid-cols-1 mx-auto max-w-screen-xss md:grid-cols-2 sm:grid-cols-1 sm:max-w-screen-sm md:max-w-screen-md xl:max-w-screen-xl gap-8 px-2">
          @foreach ($berita as $beritas)
          @if ($beritas->status === 'publish')
          <div class="group flex flex-col bg-white shadow-lg sm:flex-row md:max-w-2xl">
            <a href="{{ url('berita/'.$beritas->judul_berita) }}" class="block relative overflow-hidden transform md:w-[30rem]">
              <img class="object-cover w-full h-auto sm:h-80 sm:w-full transition-transform transform group-hover:scale-110 duration-500" src="{{ asset('storage/'.$beritas->foto) }}" alt="{{ $beritas->judul_berita }}"/>
            </a>
            <div class="flex flex-col p-5 leading-normal">
              <a href="{{ url('berita/'.$beritas->judul_berita) }}">
                <h5 class="mb-4 text-2xl font-medium tracking-tight text-gray-900 group-hover:text-blue-700 transition duration-500 capitalize">{{ Str::limit($beritas->judul_berita, 45) }}</h5>
              </a>
              <div class="flex mb-4">
                <div class="flex items-center">
                  <svg class="w-3 h-3 text-slate-400 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path
                      d="M0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm14-7.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm-5-4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm-5-4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1ZM20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4Z"
                    />
                  </svg>
                  <div class="text-slate-400 text-sm font-normal px-1.5 pt-1 uppercase">{{ date('d-m-Y', strtotime($beritas->tanggal_publikasi)) }}</div>
                </div>
                <div class="flex ml-4 items-center">
                  <svg class="w-3 h-3 text-slate-400 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 14 18">
                    <path d="M7 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9Zm2 1H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                  </svg>
                  <div class="text-slate-400 text-sm font-normal px-1.5 pt-1 capitalize">{{ $beritas->username }}</div>
                </div>
              </div>
              <p class="mb-4 font-normal text-gray-700 dark:text-gray-400">{!! Str::limit(strip_tags($beritas->deskripsi), 120) !!}</p>
              <a href="{{ url('berita/'.$beritas->judul_berita) }}" class="inline-flex items-center font-medium text-blue-700 hover:underline"> Read more </a>
            </div>
          </div>
          @endif
          @endforeach
        </div>
      </div>
      <!-- berita -->
  
      <!-- fasilitas -->
      <div class="mx-auto max-w-screen-xl py-16 sm:py-32 px-2">
        <div class="mb-4 md:mb-8 mx-auto max-w-screen-xss sm:max-w-screen-sm md:max-w-screen-md xl:max-w-screen-xl">
          <div class="text-3xl sm:text-5xl font-normal tracking-tight text-center mb-1"><span class="text-blue-700">Fasilitas</span> Sekolah</div>
          <div class="text-xs text-slate-400 text-center sm:text-base">Fasilitas lengkap untuk menunjang kegiatan belajar menagajar</div>
        </div>
        <div class="grid grid-cols-1 max-w-screen-xss sm:grid-cols-2 sm:max-w-screen-sm mx-auto md:max-w-screen-md xl:max-w-screen-xl md:grid-cols-4 gap-4 text-center mb-4 sm:mb-8">
          @foreach ($fasilitas as $fasilitases)
          <a href="{{ url('fasilitas/'.$fasilitases->nama_fasilitas) }}" class="group relative max-w-md">
            <img class="rounded-lg h-full" src="{{ asset('storage/'.$fasilitases->foto) }}" alt="{{ $fasilitases->nama_fasilitas }}" width="500" height="400"/>
            <figcaption class="absolute rounded-lg text-xl font-semibold text-white inset-0 flex justify-center items-center bg-black bg-opacity-40">
              <p class="group-hover:scale-150 transition duration-500 capitalize">{{ $fasilitases->nama_fasilitas }}</p>
            </figcaption>
          </a>
          @endforeach
        </div>
      </div>
      <!-- fasilitas -->

      {{-- <script>
        const prestasiDeksripsi = document.getElementById('prestasiDeksripsi');
 
        prestasiDeksripsi.classList.add('my-4', 'font-normal', 'text-gray-700', 'dark:text-gray-400', 'h-20');
      </script> --}}
      {{-- <script>
        const images = document.querySelectorAll('img');

        const options = {
          root: null, // Pengamatan dilakukan terhadap viewport
          rootMargin: '0px',
          threshold: 0.1 // Ketika 10% elemen masuk dalam viewport, maka gambar dimuat
        };

        const observer = new IntersectionObserver((entries, observer) => {
          entries.forEach((entry) => {
            if (entry.isIntersecting) {
              const img = entry.target;
              img.src = img.dataset.src;
              img.loading = 'eager'; // Setel loading ke "eager" untuk memuat gambar segera
              observer.unobserve(img); // Hentikan pengamatan
            }
          });
        }, options);

        images.forEach((img) => {
          observer.observe(img);
        });
      </script> --}}
@endsection