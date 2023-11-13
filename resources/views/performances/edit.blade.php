<x-app-layout>
    <x-slot name="header">
        <div class="flex  justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $performance->compositionTitle->title}}
            </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">   
                <form method="POST" action="/practicenote/performance/{{$performance->id}}">
                    @csrf
                    @method('PUT')
                    <!-- Title -->
                    <div class="max-w-xl">
                        <x-input-label for="title" :value="__('Title')" class="mt-10"/>
                        <x-text-input id="title" class="block mt-1 w-full" type="text" name="performance[title]"  value="{{$performance->title}}" required autofocus autocomplete="title" />
                    </div>
                    
                    <!-- Comment -->
                    <div class="max-w-xl">
                        <x-input-label for="comment" :value="__('Comment')" class="mt-2" />
                        <textarea  id="comment" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"  name="performance[comment]"  required autofocus autocomplete="comment" >{{$performance->comment}}</textarea>
                    </div>
                    
                    <!-- Instrument -->
                    <div class="max-w-xl">
                        <x-input-label for="instrument" :value="__('Instrument')" class="mt-2" />
                        <x-text-input id="instrument" class="block mt-1 w-full" type="text" name="performance[instrument]" value="{{$performance->instrument}}" required autofocus autocomplete="instrument" />
                    </div>
                    
                    
                    
                    <!-- composition_title_id -->
                    <input id="composition_title_id" type="hidden" name="performance[composition_title_id]" value="{{ $performance->composition_title_id }}">
                   
                   
                    <!-- upload button -->
                    <div class="flex items-center justify-end mt-4 mb-7">
                        <x-primary-button class="ml-4">
                            {{ __('保存') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>