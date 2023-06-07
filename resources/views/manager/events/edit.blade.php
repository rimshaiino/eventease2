<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            イベント編集
        </h2>
    </x-slot> --}}

    <div class="py-4">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container px-5 py-4 mx-auto">
                    <x-validation-errors class="mb-4" />

                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-purple-400">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <form method="POST" action="{{ route('events.update' , [ 'event' => $event->id ]) }}">
                        @csrf
                        @method('put')
                        <div class="mt-5 mx-7">
                            <div >
                                <x-label for="event_name" value="イベント名" />
                                <x-input id="event_name" class="block mt-1 w-full  focus:border-purple-300 focus:ring-purple-300" type="text" name="event_name" value="{{ $event->name }}" required autofocus autocomplete="username" />
                            </div>

                            <div class="mt-4">
                                <x-label for="information" value="イベント詳細" />
                                <x-textarea row="3" id="information" name="information" class="block mt-1 w-full  focus:border-purple-300 focus:ring-purple-300">{{ $event->information }}</x-textarea>
                            </div>
                            <div class="mt-4">
                                <x-label for="event_date" value="イベント日付" />
                                <x-input id="event_date" class="block mt-1 w-full  focus:border-purple-300 focus:ring-purple-300" type="text" name="event_date" value="{{ $eventDate }}" required/>
                            </div>

                            <div class="mt-4">
                                <x-label for="start_time" value="開始時間" />
                                <x-input id="start_time" class="block mt-1 w-full  focus:border-purple-300 focus:ring-purple-300" type="text" name="start_time" value="{{ $startTime }}" required/>
                            </div>

                            <div class="mt-4">
                                <x-label for="end_time" value="終了時間" />
                                <x-input id="end_time" class="block mt-1 w-full  focus:border-purple-300 focus:ring-purple-300" type="text" name="end_time" value="{{ $endTime }}" required/>
                            </div>
                        </div>

                        <div class="md:flex justify-around mb-7">
                            <div class="mt-4">
                                <x-label for="max_people" value="定員数" />
                                <x-input id="max_people" class="block mt-1 w-full  focus:border-purple-300 focus:ring-purple-300" type="number" name="max_people" value="{{ $event->max_people }}" required/>
                            </div>
                            <div class="flex space-x-4 justify-around mt-10  focus:border-purple-300 focus:ring-purple-300">
                                <input type="radio" name="is_visible" value="1" class=" focus:border-purple-300 focus:ring-purple-300" @if($event->is_visible === 1){ checked } @endif/>表示
                                <input type="radio" name="is_visible" value="0" class=" focus:border-purple-300 focus:ring-purple-300" @if($event->is_visible === 0){ checked } @endif/>非表示
                            </div>
                            <x-button class="px-12 mt-7 flex justify-center py-2.5 font-medium bg-purple-300 hover:bg-purple-100 hover:text-purple-600 text-white rounded-lg text-sm">
                                更新
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
