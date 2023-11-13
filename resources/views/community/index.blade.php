<x-app-layout>
    <x-slot name="header">
        <div class="flex  justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Community') }}
            </h2>
            
            <div>
                <a href="">
                    <x-secondary-button>
                        コミュニティを探す
                    </x-secondary-button>
                </a>
                <a href="{{route('create_community')}}">
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
    @foreach($communities as $community)
            <a href="" class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-s-lg" src="{{$community->url}}" alt="画像が読み込めません">
                <div class="flex flex-col justify-between p-4 leading-normal">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$community->name}}</h5>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$community->explanation}}</p>
                </div>
            </a>
    @endforeach
    </div>
    </div>
    </div>
    </div>
  
</x-app-layout>