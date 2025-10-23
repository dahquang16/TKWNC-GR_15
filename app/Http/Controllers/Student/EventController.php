<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::where('is_active', true)
                      ->orderBy('start_time', 'asc')
                      ->get();

        $upcomingEvents = $events->where('status', 'upcoming');
        $ongoingEvents = $events->where('status', 'ongoing');
        $endedEvents = $events->where('status', 'ended');

        return view('student.events.index', compact('upcomingEvents', 'ongoingEvents', 'endedEvents'));
    }

    public function show(Event $event)
    {
        $user = Auth::user();
        $isRegistered = false;
        
        if ($user) {
            $isRegistered = $user->events()->where('event_id', $event->id)->exists();
        }

        return view('student.events.show', compact('event', 'isRegistered'));
    }

    public function register(Event $event)
    {
        $user = Auth::user();
        
        // Kiểm tra xem user đã đăng ký chưa
        if ($user->events()->where('event_id', $event->id)->exists()) {
            return redirect()->back()->with('error', 'Bạn đã đăng ký sự kiện này rồi!');
        }

        // Kiểm tra xem sự kiện còn chỗ không
        if ($event->is_full) {
            return redirect()->back()->with('error', 'Sự kiện đã đầy!');
        }

        // Kiểm tra xem sự kiện còn active không
        if (!$event->is_active) {
            return redirect()->back()->with('error', 'Sự kiện không còn hoạt động!');
        }

        // Đăng ký sự kiện
        EventRegistration::create([
            'user_id' => $user->id,
            'event_id' => $event->id,
            'registered_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Đăng ký thành công!');
    }

    public function unregister(Event $event)
    {
        $user = Auth::user();
        
        $registration = EventRegistration::where('user_id', $user->id)
                                       ->where('event_id', $event->id)
                                       ->first();

        if ($registration) {
            $registration->delete();
            return redirect()->back()->with('success', 'Hủy đăng ký thành công!');
        }

        return redirect()->back()->with('error', 'Bạn chưa đăng ký sự kiện này!');
    }

    public function myEvents()
    {
        $user = Auth::user();
        $registrations = $user->registrations()->with('event')->get();
        
        return view('student.events.my-events', compact('registrations'));
    }
}
