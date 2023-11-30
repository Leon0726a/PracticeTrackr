<x-app-layout>
    <x-slot name="header">
        <div class="flex  justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Community') }}
            </h2>
            
             <div class="grow px-10">
                <form method="POST" action="{{ route('communities.search') }}">
                    @csrf   
                    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                            </svg>
                        </div>
                        <input type="search" name="search" id="default-search" class="block w-full px-4 py-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search" required>
                        <button type="submit" class="text-white absolute inset-y-0 right-0 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                    </div>
                </form>
            </div>
            
            <div>
                <a href="{{route('communities.create')}}">
                    <x-secondary-button>
                        コミュニティを作る
                    </x-secondary-button>
                </a>
            </div>
        </div>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @forelse($communities as $community)
                        <a href="/communities/{{$community->id}}" class="flex flex-row items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                            <img class="object-cover w-7/12 rounded-s-lg h-48 md:h-auto md:w-48 md:rounded-none md:rounded-s-lg" src="{{$community->url}}" alt="画像が読み込めません">
                            <div class="flex flex-col justify-between p-4 leading-normal md:w-full">
                                <h5 class="break-all mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$community->name}}</h5>
                                <p class="break-all mb-3 font-normal text-gray-700 dark:text-gray-400">{{$community->explanation}}</p>
                            </div>
                        </a>
                    @empty
                    </div>
                 <div class="flex flex-col items-center leading-relaxed mt-6 mb-2">
                    <p class="mt-6 text-sm text-main-700">コミュニティを探しましょう。</p>
                    <p class="mt-6 text-sm text-main-700">右上のボタンから新たなコミュニティの作成もできます。</p>
                </div>
            @endforelse
            </div>
        </div>
    </div>

  
</x-app-layout>