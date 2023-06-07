<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            予約済みのイベント
        </h2>
    </x-slot> --}}
    <div class="">    
        <div class="py-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div>
                    <h2 class="text-center py-2">これからのイベント</h2>
                    <section class="text-gray-600 body-font">
                        <div class="container px-5 py-4 mx-auto">
                            @if (session('status'))
                                <div class="mb-4 font-medium text-sm text-purple-400">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <div class="flex w-full justify-center">
                                @foreach ($fromTodayEvents as $event)
                                <a  href="{{ route('mypage.show', ['id' => $event['id'] ]) }}">
                                    <div class="flex flex-col items-start m-1 transition duration-300 ease-in-out delay-150 transform bg-white shadow-2xl rounded-xl md:w-80 md:-ml-16 md:hover:-translate-x-16 md:hover:-translate-y-8">
                                        {{-- <img class="aspect-video w-80 rounded-t-2xl object-cover object-center" src="{{ asset("images/Appロゴ/beige.png") }}" > --}}
                                        <div class="p-6 ">
                                            <h1 class="text-2xl  text-purple-300 pb-2 mb-4  font-bold leading-none tracking-tight dark:text-white">{{ $event['name'] }}</h1>
                                            <div class="">
                                                <x-label value="start" class="mr-12"/>
                                                <div class="px-4 pb-7 py-3">{{ $event['start_date'] }}</div>
                                            </div>
                                            <div>
                                                <x-label value="end" class="mr-12"/>
                                                <div class="px-4 pb-7 py-3">{{ $event['end_date'] }}</div>
                                            </div>
                                            <div>
                                                <x-label value="予約人数" class="mr-12"/>
                                                <div class="px-4 pb-7 py-3">{{ $event['number_of_people'] }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                @endforeach
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>


            
        <div class="py-4">
            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div >
                    <h2 class="text-center py-2">過去のイベント</h2>
                    <section class="text-gray-600 body-font">
                        <div class="container px-5 py-4 mx-auto">
                            @if (session('status'))
                            <div class="mb-4 font-medium text-sm text-purple-400">
                                {{ session('status') }}
                            </div>
                            @endif
                            <div class="flex break-hoge justify-center">
                                @foreach ($pastEvents as $event)
                                <a href="{{ route('mypage.show', ['id' => $event['id'] ]) }}">
                                    <div class="flex flex-col items-start m-1 transition duration-300 ease-in-out delay-150 transform bg-white shadow-2xl rounded-xl md:w-80 md:-ml-16 md:hover:-translate-x-16 md:hover:-translate-y-8">
                                        {{-- <img class="aspect-video w-80 rounded-t-2xl object-cover object-center" src="{{ asset("images/Appロゴ/beige.png") }}" > --}}
                                        <div class="p-6 ">
                                            <h1 class="text-2xl  text-purple-300 pb-2 mb-4  font-bold leading-none tracking-tight dark:text-white">{{ $event['name'] }}</h1>
                                            <div class="">
                                                <x-label value="start" class="mr-12"/>
                                                <div class="px-4 pb-7 py-3">{{ $event['start_date'] }}</div>
                                            </div>
                                            <div>
                                                <x-label value="end" class="mr-12"/>
                                                <div class="px-4 pb-7 py-3">{{ $event['end_date'] }}</div>
                                            </div>
                                            <div>
                                                <x-label value="予約人数" class="mr-12"/>
                                                <div class="px-4 pb-7 py-3">{{ $event['number_of_people'] }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                @endforeach
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
