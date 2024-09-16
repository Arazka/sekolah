@if ($paginator->hasPages())
    <paginator class="hidden sm:block">
        <nav class="flex items-center space-x-1.5" aria-label="Page navigation example">
            @if ($paginator->onFirstPage())    
            <span class="flex items-center justify-center w-10 h-10 bg-white text-gray-500 border border-gray-300 rounded-full">
                <span class="sr-only">Previous</span>
                <svg class="w-2 h-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                </svg>
            </span>
            @else
            <a href="{{ $paginator->previousPageUrl() }}" class="flex items-center justify-center w-10 h-10 bg-white text-gray-500 border border-gray-300 rounded-full focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                <span class="sr-only">Previous</span>
                <svg class="w-2 h-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                </svg>
            </a>
            @endif
    
            @foreach ($paginator->getUrlRange(1, $paginator->lastPage()) as $page => $url)
            <a href="{{ $url }}" class="flex items-center justify-center w-10 h-10 leading-tight border border-gray-300 rounded-full hover:bg-blue-700 transition duration-150 hover:text-white hover:border-none focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 ease-in-out @if ($paginator->currentPage() == $page) bg-blue-700 text-white border-none @endif">
                <div class="text-sm">{{ $page }}</div>
            </a>
            @endforeach
    
            @if ($paginator->hasMorePages())    
            <a href="{{ $paginator->nextPageUrl() }}" class="flex items-center justify-center w-10 h-10 bg-white text-gray-500 border border-gray-300 rounded-full focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                <span class="sr-only">Next</span>
                <svg class="w-2 h-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
            </a>
            @else
            <span class="flex items-center justify-center w-10 h-10 bg-white text-gray-500 border border-gray-300 rounded-full focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                <span class="sr-only">Next</span>
                <svg class="w-2 h-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
            </span>
            @endif
        </nav>
    </paginator>
    <paginator class="sm:hidden">
        <nav class="flex items-center space-x-4" aria-label="Page navigation example">
            @if ($paginator->onFirstPage())
                <span class="flex items-center justify-center w-10 h-10 bg-white text-gray-500 border border-gray-300 rounded-full">
                    <span class="sr-only">Previous</span>
                    <svg class="w-2 h-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                    </svg>
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="flex items-center justify-center w-10 h-10 bg-white text-gray-500 border border-gray-300 rounded-full focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                    <span class="sr-only">Previous</span>
                    <svg class="w-2 h-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                    </svg>
                </a>
            @endif
        
            <div class="text-sm">Halaman {{ $paginator->currentPage() }}</div>
        
            @if ($paginator->hasMorePages())    
                <a href="{{ $paginator->nextPageUrl() }}" class="flex items-center justify-center w-10 h-10 bg-white text-gray-500 border border-gray-300 rounded-full focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                    <span class="sr-only">Next</span>
                    <svg class="w-2 h-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                </a>
            @else
                <span class="flex items-center justify-center w-10 h-10 bg-white text-gray-500 border border-gray-300 rounded-full focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                    <span class="sr-only">Next</span>
                    <svg class="w-2 h-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                </span>
            @endif
        </nav>
    </paginator>
@endif
