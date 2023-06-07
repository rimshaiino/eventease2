<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            イベント内容
        </h2>
    </x-slot> --}}

    <div class="pt-4 pb-2">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div>
                <div class="max-w-2xl  py-4 mx-auto">
                    <x-validation-errors class="mb-4" />

                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-purple-300">
                            {{ session('status') }}
                        </div>
                    @endif
                    <section>
                        <div class="mx-auto flex w-80 flex-col justify-center bg-white rounded-2xl shadow-xl shadow-gray-400/20">
                            <img class="aspect-video w-80 rounded-t-2xl object-cover object-center" src="{{ asset("images/Appロゴ/yoga.png") }}">
                            <div class="p-6">
                                <div class="">
                                    <div class="flex justify-center text-4xl">
                                        {{ $event->name }}
                                        {{-- <x-label for="event_name"  class="mr-10"/> --}}
                                    </div>
                                    <div class="flex justify-center">
                                        {{-- <x-label for="event_date" class="mr-10"/> --}}
                                        {{ $event->eventDate }}
                                    </div>
                                    <div class="mt-7 flex justify-center">
                                        <x-label for="information" value="イベント詳細" class="mr-10"/>
                                        {!! nl2br(e($event->information)) !!}
                                    </div>
                                    <div class="mt-7 flex justify-center">
                                        <x-label for="start_time" value="開始時間" class="mr-10"/>
                                        {{ $event->startTime }}
                                    </div>
                                    <div class="mt-7 flex justify-center">
                                        <x-label for="end_time" value="終了時間" class="mr-10"/>
                                        {{ $event->endTime }}
                                    </div>
                                </div>

                                <form id="cancel_{{ $event->id }}" method="post" action="{{ route('mypage.cancel' ,['id' => $event->id]) }}">
                                    @csrf
                                    <div class="mt-7 pr-8 flex justify-center">
                                        <x-label value="予約人数" class="mr-12"/>
                                        {{ $reservation->number_of_people }}
                                    </div>
                                    {{-- @if($event->eventDate < \Carbon\Carbon::today()->format('Y/m/d')) --}}
                                    <div class="md:flex justify-center">
                                        <button type="submit" date-id="{{ $event->id }}" onclick="cancelPost(this)" class="px-12 mt-7 py-2.5 font-medium bg-purple-300 hover:bg-purple-100 hover:text-purple-600 text-white rounded-lg text-sm">
                                            Cancel
                                        </button>
                                        {{-- @endif --}}
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <script>
        function cancelPost(e) {
            'use strict';
            if(confirm('本当にキャンセルしますか？')){
                document.getElementById('cancel_' + e.dateset.id).submit();
            }
        }
    </script>
</x-app-layout>
