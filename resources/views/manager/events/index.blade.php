<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            イベント管理
        </h2>
    </x-slot> --}}
    <div class="py-4">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <section class="text-gray-600 body-font">
                    <div class="container px-5 py-4 mx-auto">
                        @if (session('status'))
                            <div class="mb-4 font-medium text-sm text-purple-400">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="w-full mx-auto overflow-auto">
                            <table class="table-auto w-full text-left whitespace-no-wrap">
                                <thead>
                                    <tr>
                                        <th class="px-4 py-3 text-center title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">イベント名</th>
                                        <th class="px-4 py-3 text-center title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">開始日時</th>
                                        <th class="px-4 py-3 text-center title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">終了日時</th>
                                        <th class="px-4 py-3 text-center title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">予約人数</th>
                                        <th class="px-4 py-3 text-center title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">定員</th>
                                        <th class="px-4 py-3 text-center title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">表示/非表示</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($events as $event)
                                    <tr>
                                        <td class="px-4 text-center py-3 text-purple-400"><a href="{{ route('events.show', ['event' => $event->id]) }}">{{ $event->name }}</a></td>
                                        <td class="px-4 text-center py-3">{{ $event->start_date }}</td>
                                        <td class="px-4 text-center py-3">{{ $event->end_date }}</td>
                                        <td class="px-4 text-center py-3">
                                            @if (is_null( $event->number_of_people ))
                                            0
                                            @else
                                            {{ $event->number_of_people }}
                                            @endif
                                        </td>
                                        <td class="px-4 text-center py-3">{{ $event->max_people }}</td>
                                        <td class="px-4 text-center py-3">{{ $event->is_visible }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $events->links() }}
                        </div>
                    </div>
                    <div class="flex justify-center">
                        <button onclick="location.href='{{ route('events.past') }}'" class="ml-4 m-5 px-10 py-2.5 font-medium bg-purple-300 hover:bg-purple-100 hover:text-purple-600 text-white rounded-lg text-sm">過去のイベント</button>
                        <button onclick="location.href='{{ route('events.create') }}'" class="ml-4 m-5 px-10 py-2.5 font-medium bg-purple-300 hover:bg-purple-100 hover:text-purple-600 text-white rounded-lg text-sm">新規投稿</button>
                    </div>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>
