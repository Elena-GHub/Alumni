<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{

    public function index()
    {
        $events = Event::all();
        return view('event.index', ['events'=>$events]);
    }


    public function create()
    {
        return view('event.create');
    }


    public function store(Request $request)
    {
        Event::create([
            'name' => request('name'),
            'group' => request('group'),
            'language' => request('language'),
            'description' => request('description'),
            'user_id' => auth()->id()
        ]);
        return redirect('/event');
    }


    public function show(Event $event)
    {
        //
    }


    public function edit(Event $event)
    {
        return view('event.edit', ['event'=>$event]);
    }


    public function update(Request $request, Event $event)
    {
        $event->update($request->all());
        return redirect(route('event.index'));
    }


    public function destroy(Event $event)
    {
        $event->delete();
        return redirect(route('event.index'));
    }
}
