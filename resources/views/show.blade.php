@extends('layouts.base')
@section('content')
    <div class="movie-info border-b border-gray-800">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
            <img src="{{ 'https://image.tmdb.org/t/p/w500/' . $movieDetails['poster_path'] }}" alt="poster"
                class="w-64 md:w-96 ">
            <div class="md:ml-24">
                <h2 class="text-4xl font-semibold mt-2">{{ $movieDetails['title'] }}</h2>
                <div class="flex flex-wrap items-center text-gray-400 text-sm mt-6 md:mt-2">
                    <x-eos-star class="fill-current text-teal-500 w-5" />
                    <span class="ml-1">{{ $movieDetails['vote_average'] * 10 }}%</span>
                    <span class="mx-2">|</span>
                    <span>{{ \Carbon\Carbon::parse($movieDetails['release_date'])->format('M d, Y') }}</span>
                    <span class="mx-2">|</span>
                    <span>
                        @foreach ($movieDetails['genres'] as $item)
                            {{ $item['name'] }}@if (!$loop->last)
                                ,
                            @endif
                        @endforeach
                    </span>
                </div>

                <p class="text-gray-300 mt-8">{{ $movieDetails['overview'] }}
                <div class="mt-12">
                    <h4 class="text-white font-semibold">Featured Cast</h4>
                    <div class="flex mt-4">
                        @foreach ($movieDetails['credits']['crew'] as $item)
                            @if ($item['job'] == 'Director' || $item['job'] == 'Producer')
                                <div class="mr-8">
                                    <div> {{ $item['name'] }}</div>
                                    <div class="text-sm text-gray-400">{{ $item['job'] }}</div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="flex mt-12">
                    <a href="https://youtube.com/watch?v={{ $trailer }}"
                        class=" inline-flex items-center bg-teal-500 text-gray-900 rounded font-semibold px-5 py-4
                        hover:bg-teal-600 transition ease-in-out duration-200">
                        <x-eos-play-circle class="w-6 fill-current" />
                        <span class="ml-2 font-semibold">Play Trailer</span>
                    </a>
                    <a href="https://www.imdb.com/title/{{ $movieDetails['imdb_id'] }}"
                        class="flex items-center ml-6 bg-teal-500 text-gray-900 rounded font-semibold px-5 py-4
                    hover:bg-teal-600 transition ease-in-out duration-200">
                        <x-fab-imdb class="w-6 fill-current" />
                        <span class="ml-2 font-semibold">IMDb</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    {{-- end-movie-info --}}

    <div class="movie-cast border-b border-gray-800">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Cast</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach ($movieDetails['credits']['cast'] as $cast)
                    @if ($loop->index < 5)
                        <div class="mt-8">
                            <a href="#">
                                <img src="{{ 'https://image.tmdb.org/t/p/w500/' . $cast['profile_path'] }}"
                                    alt="parasite" class="hover:opacity-75 transition ease-in-out duration-200">
                            </a>
                            <div class="mt-2">
                                <a href="#" class="text-lg mt-2 hover:text-gray-300">{{ $cast['name'] }}</a>
                            </div>
                            <div class="text-gray-400 text-sm">
                                {{ $cast['character'] }}
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    {{-- end-cast-info --}}

    <div class="iamges border-b border-gray-800">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Images</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-8">
                @foreach ($movieDetails['images']['backdrops'] as $image)
                    @if ($loop->index < 6)
                        <div class="mt-8">
                            <a href="#">
                                <img src="{{ 'https://image.tmdb.org/t/p/w500/' . $image['file_path'] }}" alt="parasite"
                                    class="hover:opacity-75 transition ease-in-out duration-200">
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection
