<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_time' => 'required|date|after:now',
            'end_time' => 'required|date|after:start_time',
            'location' => 'required|string|max:255',
            'max_participants' => 'nullable|integer|min:1',
        ]);

        Event::create($request->all());

        return redirect()->route('admin.events.index')
                        ->with('success', 'Sự kiện đã được tạo thành công!');
    }

    public function show(Event $event)
    {
        $registrations = $event->registrations()->with('user')->get();
        return view('admin.events.show', compact('event', 'registrations'));
    }

    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
            'location' => 'required|string|max:255',
            'max_participants' => 'nullable|integer|min:1',
            'is_active' => 'boolean',
        ]);

        $event->update($request->all());

        return redirect()->route('admin.events.index')
                        ->with('success', 'Sự kiện đã được cập nhật thành công!');
    }

    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('admin.events.index')
                        ->with('success', 'Sự kiện đã được xóa thành công!');
    }
}
