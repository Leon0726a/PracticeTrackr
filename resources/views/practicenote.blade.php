<x-app-layout>
    <x-slot name="header">
        <div class="flex  justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Practice Note') }}
            </h2>
            
            <div
                x-data=""
            >
                <x-secondary-button x-on:click.prevent="$dispatch('open-modal', 'save-composition-title')">
                    タイトルを保存
                </x-secondary-button>
            </div>
        </div>
    </x-slot>

    <!--楽曲名を保存-->
    <x-modal name="save-composition-title"  focusable>
        <form method="POST" action="{{ route('save_composition_title') }}">
            @csrf
    
            <!-- CompositionTitle -->
            <div>
                <x-input-label for="composition_title" :value="__('CompositionTitle')" />
                <x-text-input id="composition_title" class="block mt-1 w-full" type="text" name="composition_title[title]" :value="old('composition_title')" required autofocus autocomplete="composition_title" />
                <x-input-error :messages="$errors->get('composition_title[title]')" class="mt-2" />
            </div>
            <!--Save-->
            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-4">
                    {{ __('Save') }}
                </x-primary-button>
            </div>
        </form>
    </x-modal>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg"> 
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-4 my-3">
                    @forelse($titles as $title)
                        <a href="/practicenote/{{$title->id}}" class="group p-4 border border-gray-200 rounded-md hover:bg-gray-100 ">
                            <h4>{{$title->title}}</h4>
                        </a>
                    @empty
                </div>
                <div class="flex flex-col items-center leading-relaxed mt-6 mb-2">
                    <p class="mt-8 text-mdlg">ここでは楽曲ごとの記録を残せます。</p>
                    <p class="mt-6 text-sm text-main-700">右上のボタンから楽曲タイトルを作成しましょう。</p>
                </div>
                    @endforelse
            </div>
        </div>
    </div>
    
</x-app-layout>