<div class="relative mt-3 md:mt-0">
    <input wire:model.debounce.500ms="search" type="text"
        class="bg-gray-800 rounded-full text-sm w-64 px-4 pl-8 py-1 focus:outline-none focus:shadow-outline"
        placeholder="Search">
    <div class="absolute top-0">
        <x-eos-search class="fill-current w-4 text-gray-500 mt-2 ml-2" />
    </div>

    <div wire:loading class="spinner top-0 right-0 mr-4 mt-3"></div>

    @if (strlen($search >= 2))
        <div class="absolute bg-gray-800 text-sm rounded w-64 mt-4">
            @if ($searchResults->count() > 0)
                <ul>
                    @foreach ($searchResults as $result)
                        <li class="border-b border-gray-700">
                            <a href="{{ route('movies.show', $result['id']) }}"
                                class="hover:bg-gray-700 px-3 py-3 flex items-center">
                                @if ($result['poster_path'])
                                    <img src="https://image.tmdb.org/t/p/w92/{{ $result['poster_path'] }}"
                                        alt="poster" class="w-8">
                                @else
                                    <img src="https://via.placeholder.com/50x75" alt="poster" class="w-8">
                                @endif

                                <span class="ml-4">{{ $result['title'] }}
                                </span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            @else
                <div class="px-3 py-3">No results for "{{ $search }}"</div>
            @endif

        </div>
    @endif
</div>
