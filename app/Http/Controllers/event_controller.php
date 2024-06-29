<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Member;

class event_controller extends Controller
{
    public function createEvent()
    {
        if(session('member_id') == null){
            return redirect('login')->with('error', 'Please login to access this page.');
        }
        
        return view('post.createEvent', ['header' => 'Create Event']);
    }

    public function storeEvent(Request $request)
    {
        
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_datetime' => 'required',
            'end_datetime' => 'required',
            'location' => 'required|string|max:255',
            'link' => 'required|url'
        ]);

        $event = new Event;
        $event->name = $request->title;
        $event->description = $request->description;
        $event->start_date = $request->start_datetime;
        $event->end_date = $request->end_datetime;
        $event->location = $request->location;
        $event->link = $request->link; // Make sure the column name matches
        $event->member_id = session('member_id');
        $event->save();

        return redirect('reporter/Events')->with('success', 'Event created successfully.');
    }


    public function allEvents()
    {
        if(session('member_id') == null){
            return redirect('login')->with('error', 'Please login to access this page.');
        }
        
        
        $events = Event::where('start_date', '>=', date('Y-m-d'))->where('member_id', session('member_id'))->get();
        $member = Member::find(session('member_id'));
        return view('post.events', [
            'events' => $events,
            'member' => $member,
            'type' => 'Events',
            'header' => 'Events'
        ]);
    }

    public function editEvent($id)
    {
        if(session('member_id') == null){
            return redirect('login')->with('error', 'Please login to access this page.');
        }
        
        $event = Event::find($id);
        return view('post.editEvent', ['event' => $event, 'header' => 'Edit Event']);
    }

    public function updateEvent(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_datetime' => 'required',
            'end_datetime' => 'required',
            'location' => 'required|string|max:255',
            'link' => 'required|url'
        ]);

        $event = Event::find($id);

        if($event == null){
            return redirect('reporter/Events')->with('error', 'Event not found.');
        }

        if($event->member_id != session('member_id')){
            return redirect('reporter/Events')->with('error', 'You are not authorized to edit this event.');
        }

        if($event->start_date < date('Y-m-d')){
            return redirect('reporter/Events')->with('error', 'You cannot edit past events.');
        }

        

        $event->name = $request->title;
        $event->description = $request->description;
        $event->start_date = $request->start_datetime;
        $event->end_date = $request->end_datetime;
        $event->location = $request->location;
        $event->link = $request->link; 
        $event->save();

        return redirect('reporter/Events')->with('success', 'Event updated successfully.');
    }


    public function deleteEvent($id)
    {
        $event = Event::find($id);

        if($event == null){
            return redirect('reporter/Events')->with('error', 'Event not found.');
        }

        if($event->member_id != session('member_id')){
            return redirect('reporter/Events')->with('error', 'You are not authorized to delete this event.');
        }

        if($event->start_date < date('Y-m-d')){
            return redirect('reporter/Events')->with('error', 'You cannot delete past events.');
        }

        $event->delete();

        return redirect('reporter/Events')->with('success', 'Event deleted successfully.');
    }

}
