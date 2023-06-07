<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            イベント内容
        </h2>
    </x-slot> --}}

    <div class="py-4">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container px-5 py-4 mx-auto">
                    <x-validation-errors class="mb-4" />

                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-purple-300">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <form method="get" action="{{ route('events.edit' , [ 'event' => $event->id ]) }}">
                        
                        <div class="mt-4 flex justify-center text-4xl">
                            <x-label for="event_name" class="mb-4"/>
                            {{ $event->name }}
                        </div>
                        <div class="mt-4 flex justify-center">
                            <x-label for="event_date" class="mb-4"/>
                            {{ $event->eventDate }}
                        </div>
                        
                        
                        <div class="md:flex justify-around m-4">
                            <div class="mt-4">
                                <x-label for="information" value="イベント詳細" class="mb-4"/>
                                {!! nl2br(e($event->information)) !!}
                                
                            </div>
                            <div class="mt-4">
                                <x-label for="start_time" value="開始時間" class="mb-4"/>
                                {{ $event->startTime }}

                            </div>
                            <div class="mt-4">
                                <x-label for="end_time" value="終了時間" class="mb-4"/>
                                {{ $event->endTime }}

                            </div>
                            <div class="mt-4">
                                <x-label for="max_people" value="定員数" class="mb-4"/>
                                {{ $event->max_people }}
                                
                            </div>

                        </div>
                        <div class="flex space-x-4 justify-around mt-10">
                            @if($event->is_visible)
                                表示中
                            @else
                                非表示中
                            @endif
                            @if ($event->eventDate >= \Carbon\Carbon::today()->format('Y/m/d') )
                            <x-button class="w-1/4 flex justify-center py-2.5  font-medium bg-purple-300 hover:bg-purple-100 hover:text-purple-600 text-purple-500 rounded-lg text-sm">
                                編集
                            </x-button>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="max-w-2xl  py-4 mx-auto">
                    @if (!$users->isEmpty())
                        予約状況
                    @endif
                </div>
            </div>
        </div>
    </div> --}}
</x-app-layout>
