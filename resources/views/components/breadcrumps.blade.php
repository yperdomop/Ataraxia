@props(['links' => []])

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        {{--  home  --}}
        <li class="breadcrumb-item"><a href="#"></a></li>
        {{-- otros --}}
        <li class="breadcrumb-item"><a href="#">Library</a></li>
        {{-- texto --}}
        <li class="breadcrumb-item active" aria-current="page">Data</li>
    </ol>
</nav>

<nav class="mt-1">

    <ol class="flex items-center space-x-1 text-sm text-neutral-700">
        {{-- home --}}
        <li>
            <a class="block transition-colors hover:text-orange-600" href="{{ route('ecommerce.index') }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
            </a>
        </li>
        <li>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
            </svg>
        </li>
        {{-- otros --}}
        @foreach ($links as $name => $link)
            <li>
                <a class="block capitalize transition-colors hover:text-orange-600" href="{{$link}}"> {{$name}} </a>
            </li>
            <li>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                </svg>
            </li>
        @endforeach
        {{-- texto --}}
        <li>
            <div class="block capitalize"> {{$slot}} </div>
        </li>
    </ol>
</nav>