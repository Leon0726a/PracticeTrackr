<x-app-layout>
    <x-slot name="header">
        <div class="flex  justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Community') }}
            </h2>
    </x-slot>

        <form method="POST" action="{{ route('store_community') }}" enctype="multipart/form-data">
            @csrf
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                        <!--Community Name-->
                        <div class="max-w-xl">
                            <x-input-label for="community_name" :value="__('CommunityName')" />
                            <x-text-input id="community_name" class="block mt-1 w-full" type="text" name="community[name]" :value="old('community_name')" required autofocus autocomplete="community_name" />
                        </div>
                        <!--explanation-->
                        <div class="max-w-xl">
                            <x-input-label for="community_explanation" :value="__('Explanation')" />
                            <x-text-input id="community_explanation" class="block mt-1 w-full" type="text" name="community[explanation]" :value="old('community_explanation')" required autofocus autocomplete="community_name" />
                        </div>
                        <!--image-->    
                        <div class="max-w-xl">
                            <x-input-label for="community_image" :value="__('upload image')" />
                            <input id="community_image" name="image" type="file" class="block w-full text-sm file:mr-4 file:rounded-md file:border file:border-gray-300 file:py-2 file:px-4 file:text-sm file:font-semibold file:text-gray-700 hover:file:bg-gray-50 focus:outline-none disabled:pointer-events-none disabled:opacity-150" />
                        </div>
                        
                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-4">
                                {{ __('Save') }}
                            </x-primary-button>
                        </div>  
                    </div>
                </div>
            </div>
        </form>

</x-app-layout>
