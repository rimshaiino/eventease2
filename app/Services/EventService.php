<?php
namespace App\Services;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

Class EventService
{
    public static function getWeekEvents($startDate, $endDate)
    {
        $reservedPeople = DB::table('reservations')
        ->select('event_id' , DB::raw('sum(number_of_people) as number_of_people'))
        ->groupBy('event_id');

        return DB::table('events')
        ->leftJoinSub($reservedPeople, 'reservedPeople', function($join){
            $join->on('events.id' , '=', 'reservedPeople.event_id');
            })
        ->whereBetween('events.start_date' ,[$startDate , $endDate])
        ->orderBy('events.start_date' , 'asc')
        ->get();
    }
}


