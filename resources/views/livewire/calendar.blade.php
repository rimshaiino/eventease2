<div>
    <input id="calendar" class="block mt-1 mb-2 mx-auto py-3 px-4  border-gray-300 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400" type="text" name="calendar" value="{{ $currentDate }}" wire:change="getDate($event.target.value)"/>
    <div class="flex">
        <x-calendar-time/>
        @for ($i = 0; $i < 7; $i++)
            <div class="w-32">
                <div class="py-1 px-2 border border-gray-200 text-center italic">{{ $currentWeek[$i]['day'] }}</div>
                <div class="py-1 px-2 border border-gray-200 text-center italic">{{ $currentWeek[$i]['dayOfWeek'] }}</div>
                @for ($j = 0; $j < 21; $j++)
                    @if ($events->isNotEmpty())
                        @if (!is_null($events->firstWhere('start_date',$currentWeek[$i]['checkDay']. " " . Constant::EVENT_TIME[$j])))
                            @php
                                $eventId = $events->firstWhere('start_date',$currentWeek[$i]['checkDay']. " " . Constant::EVENT_TIME[$j])->id;
                                $eventName = $events->firstWhere('start_date',$currentWeek[$i]['checkDay']. " " . Constant::EVENT_TIME[$j])->name;
                                $eventInfo = $events->firstWhere('start_date',$currentWeek[$i]['checkDay']. " " . Constant::EVENT_TIME[$j]);
                                $eventPeriod = \Carbon\Carbon::parse($eventInfo->start_date)->diffInMinutes($eventInfo->end_date) / 30 - 1;
                            @endphp
                            <a href="{{ route('events.detail', ['id' => $eventId]) }}">
                            <div class="py-1 px-2 h-8 border border-gray-200 text-xs bg-purple-100 italic">{{ $eventName }}</div>
                            </a>
                            @if ( $eventPeriod > 0 )
                                @for($k = 0; $k < $eventPeriod; $k++)
                                <div class="py-1 px-2 h-8 border border-gray-200 bg-purple-100 italic"></div>
                                @endfor
                                @php $j += $eventPeriod @endphp
                            @endif
                        @else    
                            <div class="py-1 px-2 h-8 border border-gray-200 italic"></div>
                        @endif
                    @else
                        <div class="py-1 px-2 h-8 border border-gray-200 italic"></div>
                    @endif
                @endfor
            </div>
        @endfor
    </div>
</div>
