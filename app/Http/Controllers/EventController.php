<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Event;
use Illuminate\Support\Facades\DB;
use View;
use Carbon\Carbon;


class EventController extends Controller
{
    public function index()
    {
        $today = Carbon::today();

        $reservedPeople = DB::table('reservations')
        ->select('event_id' , DB::raw('sum(number_of_people) as number_of_people'))
        ->groupBy('event_id');

        $events = DB::table('events')
        ->leftJoinSub($reservedPeople, 'reservedPeople', function($join){
            $join->on('events.id' , '=', 'reservedPeople.event_id');
            })
        ->whereDate('events.start_date' , '>=' , $today)
        ->orderBy('events.start_date' , 'asc')
        ->paginate(10);
        
        return view('manager.events.index' ,compact('events'));
    }

    public function create()
    {
        return view('manager.events.create');
    }


    public function store(StoreEventRequest $request)
    {
        $start = $request['event_date'] . " " . $request['start_time'];
        $startDate = Carbon::createFromFormat(
            'Y-m-d H:i' , $start
        );

        $end = $request['event_date'] . " " . $request['end_time'];
        $endDate = Carbon::createFromFormat(
            'Y-m-d H:i' , $end
        );

        Event::create([
            'name' => $request['event_name'],
            'information' => $request['information'],
            'start_date' => $startDate,
            'end_date' => $endDate,
            'max_people' => $request['max_people'],
            'is_visible' => $request['is_visible'],
        ]);

        session()->flash('status','登録OK');

        return to_route('events.index');
    }

    public function show(Event $event)
    {
        $event = Event::findOrFail($event->id);
        $users = $event->users;
        $eventDate = $event->eventDate;
        $startTime = $event->startTime;
        $endTime = $event->endTime;

        return view('manager.events.show' , compact('event' ,'users', 'eventDate' , 'startTime' , 'endTime'));
    }

    
    public function edit(Event $event)
    {
        $event = Event::findOrFail($event->id);
        $user = $event->users;
        $eventDate = $event->editEventDate;
        $startTime = $event->startTime;
        $endTime = $event->endTime;

        return view('manager.events.edit' , compact('event' , 'eventDate' , 'startTime' , 'endTime'));        
    }

    public function update(UpdateEventRequest $request, Event $event)
    {
        $start = $request['event_date'] . " " . $request['start_time'];
        $startDate = Carbon::createFromFormat(
            'Y-m-d H:i' , $start
        );

        $end = $request['event_date'] . " " . $request['end_time'];
        $endDate = Carbon::createFromFormat(
            'Y-m-d H:i' , $end
        );

        $event = Event::findOrFail($event->id);
        $event->name = $request['event_name'];
        $event->information = $request['information'];
        $event->start_date = $startDate;
        $event->end_date = $endDate;
        $event->max_people = $request['max_people'];
        $event->is_visible = $request['is_visible'];
        $event->save();

        session()->flash('status','更新OK');

        return to_route('events.index');
    }

    public function past()
    {
        $today = Carbon::today();

        $reservedPeople = DB::table('reservations')
        ->select('event_id' , DB::raw('sum(number_of_people) as number_of_people'))
        ->groupBy('event_id');
        
        $events = DB::table('events')
        ->leftJoinSub($reservedPeople, 'reservedPeople', function($join){
            $join->on('events.id' , '=', 'reservedPeople.event_id');
            })
        ->whereDate('events.start_date' , '<' , $today)
        ->orderBy('events.start_date' , 'desc')
        ->paginate(10);

        return view('manager.events.past' , compact('events'));
    }
    public function destroy(Event $event)
    {
        //
    }
}
