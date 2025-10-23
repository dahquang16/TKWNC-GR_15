<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventRegistration;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function index()
    {
        $registrations = EventRegistration::with(['user', 'event'])
                                        ->orderBy('created_at', 'desc')
                                        ->paginate(20);
        
        return view('admin.registrations.index', compact('registrations'));
    }

    public function show(Event $event)
    {
        $registrations = $event->registrations()->with('user')->get();
        return view('admin.registrations.show', compact('event', 'registrations'));
    }

    public function destroy(EventRegistration $registration)
    {
        $registration->delete();

        return redirect()->back()->with('success', 'Đăng ký đã được xóa thành công!');
    }
}
