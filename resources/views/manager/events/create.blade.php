<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            イベント新規投稿
        </h2>
    </x-slot> --}}

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="max-w-2xl  py-4 mx-auto">
                    <x-validation-errors class="mb-4" />

                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-purple-400">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <form method="POST" action="{{ route('events.store') }}" class="px-10 py-5">
                        @csrf

                            <div class="">
                                <x-label for="event_name" value="イベント名" />
                                <x-input id="event_name" class="block my-5 w-full  focus:border-purple-300 focus:ring-purple-300" type="text" name="event_name" :value="old('event_name')" required autofocus autocomplete="username" />
                            </div>

                            <div class="">
                                <x-label for="information" value="イベント詳細" />
                                <x-textarea row="3" id="information" name="information" class="block my-5 w-full  focus:border-purple-300 focus:ring-purple-300">{{ old('information') }}</x-textarea>
                            </div>
                        
                            <div class="">
                                <x-label for="event_date" value="イベント日付" />
                                <x-input id="event_date" class="block my-5 w-full  focus:border-purple-300 focus:ring-purple-300" type="text" name="event_date" required/>
                            </div>

                            <div class="">
                                <x-label for="start_time" value="開始時間" />
                                <x-input id="start_time" class="block my-5 w-full focus:border-purple-300 focus:ring-purple-300" type="text" name="start_time" required/>
                            </div>

                            <div class="">
                                <x-label for="end_time" value="終了時間" />
                                <x-input id="end_time" class="block my-5 w-full  focus:border-purple-300 focus:ring-purple-300" type="text" name="end_time" required/>
                            </div>

                            <div class="">
                                <x-label for="max_people" value="定員数" />
                                <x-input id="max_people" class="block my-5 w-full  focus:border-purple-300 focus:ring-purple-300" type="number" name="max_people" required/>
                            </div>
                        <div class="flex justify-around">
                            <div class="flex space-x-4 justify-around mt-10">
                                <input type="radio" name="is_visible" value="1" class=" focus:border-purple-300 focus:ring-purple-300" checked />表示
                                <input type="radio" name="is_visible" value="0" class=" focus:border-purple-300 focus:ring-purple-300" />非表示
                            </div>
                            <x-button class="px-12 mt-7 flex justify-center py-2.5 font-medium bg-purple-300 hover:bg-purple-100 hover:text-purple-600 text-white rounded-lg text-sm">
                                Create
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
