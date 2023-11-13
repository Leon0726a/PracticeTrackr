<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $composition_title}}
            </h2>
            <div
                x-data=""
            >
                <x-secondary-button x-on:click.prevent="$dispatch('open-modal', 'comment')">
                    コメント
                </x-secondary-button>
            </div>
        </div>
     </x-slot>
     
    <x-modal name="comment"  focusable>
        <div class=" sm:justify-center items-center px-10">
            <h2>Upload performance</h2>
        <form method="POST" action="/practicenote/performance/{{$performance}}">
            @csrf
            
            <!-- Comment -->
            <div>
                <x-input-label for="comment" :value="__('Comment')" class="mt-2" />
                <textarea  id="comment" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"  name="feedback[comment]"  required autofocus autocomplete="comment" ></textarea>
            </div>
            
            <!-- upload button -->
            <div class="flex items-center justify-end mt-4 mb-7">
                <x-primary-button class="ml-4">
                    {{ __('Send') }}
                </x-primary-button>
            </div>
        </form>
        </div>
    </x-modal>
    
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h4>{{$performance->title}}</h4>
                    <audio controls controlslist="nodownload" class="group-hover:text-white" src="{{$performance->url}}"></audio>
                    <p>{{$performance->comment}}</p>
                    <p>使用楽器：{{$performance->instrument}}</p>
                    <p>公開設定:                                 
                        @if($performance->public == 1)
                            公開
                        @else
                            非公開
                        @endif
                    </p> 
                    <a href="/practicenote/performance/{{$performance->id}}/edit">
                        <x-secondary-button>
                            編集
                        </x-secondary-button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- comment -->
    @foreach($feedbacks as $feedback)
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                  {{$feedback->comment}}
                  {{$feedback->user->name}}
                </div>
            </div>
        </div>
    </div>
    @endforeach
</x-app-layout>