<x-app-layout>

    <x-slot name="header">
        <div class="flex  justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __($community->name) }}
            </h2>
            
            <div class="flex space-x-2">
                @auth
                    @if ($community->users->contains(auth()->user()))
                        <form method="post" action="{{ route('communities.leave', ['community' => $community->id]) }}">
                            @csrf
                            <x-danger-button>
                                退出
                            </x-danger-button>
                        </form>
                    @else
                        <form method="post" action="{{ route('communities.join', ['community' => $community->id]) }}">
                            @csrf
                            <x-primary-button>
                                参加
                            </x-primary-button>
                        </form>
                    @endif
                @endauth
                <div x-data="">
                    <x-secondary-button x-on:click.prevent="$dispatch('open-modal', 'upload-performance')">
                        タイトルを保存
                    </x-secondary-button>
                </div>
            </div>
        </div>   
            
        
    </x-slot>

    <!--楽曲を保存-->
    <x-modal name="upload-performance"  focusable>
        <div class=" sm:justify-center items-center px-10">
            <h2>Upload performance</h2>
        <form method="POST" action="{{ route('communities.upload_performance', ['community' => $community->id])}}" enctype="multipart/form-data">
            @csrf
    
            <!-- Title -->
            <div>
                <x-input-label for="title" :value="__('Title')" class="mt-10"/>
                <x-text-input id="title" class="block mt-1 w-full" type="text" name="performance[title]" :value="old('title')" required autofocus autocomplete="title" />
            </div>
            
            <!-- Comment -->
            <div>
                <x-input-label for="comment" :value="__('Comment')" class="mt-2" />
                <textarea  id="comment" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"  name="performance[comment]"  required autofocus autocomplete="comment" ></textarea>
            </div>
            
            <!-- Instrument -->
            <div>
                <x-input-label for="instrument" :value="__('Instrument')" class="mt-2" />
                <x-text-input id="instrument" class="block mt-1 w-full" type="text" name="performance[instrument]" :value="old('instrument')" required autofocus autocomplete="instrument" />
            </div>
            
            <!-- file -->
            <div>
                <x-input-label for="file_input" :value="__('Upload file')" class="mt-2" />
                <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                       id="file_input"  type="file" name="audio"  
                />
            </div>
           
            <!-- upload button -->
            <div class="flex items-center justify-end mt-4 mb-7">
                <x-primary-button class="ml-4">
                    {{ __('Upload') }}
                </x-primary-button>
            </div>
        </form>
        </div>
    </x-modal>
    
    @foreach($performances as $performance)
        <div class="py-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <a href="/practicenote/performance/{{$performance->id}}">
                            <h4>{{$performance->title}}</h4>
                            <audio controls controlslist="nodownload" class="group-hover:text-white" src="{{$performance->url}}"></audio>
                            <p>{{$performance->comment}}</p>
                            <p>使用楽器：{{$performance->instrument}}</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    </div>
                        
    

    <script>
      /* オーディオ要素のリスト*/
      var audios = document.querySelectorAll("audio");
    
      /* 一つだけ再生する */
      for (var i = 0; i < audios.length; i++) {
        audios[i].addEventListener("play", function () {
          for (var j = 0; j < audios.length; j++) {
            if (audios[j] != this) {
              audios[j].pause();
            }
          }
        }, false);
      }
    </script>
      
</x-app-layout>