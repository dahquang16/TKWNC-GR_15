@extends('student.layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h1 class="text-3xl font-bold text-gray-900 mb-8">Sự kiện của tôi</h1>

                @if($registrations->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($registrations as $registration)
                            @php
                                $event = $registration->event;
                            @endphp
                            <div class="bg-white border border-gray-200 rounded-lg p-6 hover:shadow-lg transition-shadow">
                                <!-- Event Status Badge -->
                                <div class="mb-4">
                                    @if($event->status == 'upcoming')
                                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                            🕐 Sắp tới
                                        </span>
                                    @elseif($event->status == 'ongoing')
                                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                            🟢 Đang diễn ra
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                            ⚫ Đã kết thúc
                                        </span>
                                    @endif
                                </div>

                                <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $event->title }}</h3>
                                <p class="text-gray-600 text-sm mb-3">{{ Str::limit($event->description, 100) }}</p>
                                
                                <div class="text-sm text-gray-500 mb-4">
                                    <p><strong>Thời gian:</strong> {{ $event->start_time->format('d/m/Y H:i') }} - {{ $event->end_time->format('H:i') }}</p>
                                    <p><strong>Địa điểm:</strong> {{ $event->location }}</p>
                                    <p><strong>Đăng ký lúc:</strong> {{ $registration->registered_at->format('d/m/Y H:i') }}</p>
                                </div>

                                <div class="flex justify-between items-center gap-2">
                                    <a href="{{ route('student.events.show', $event) }}" 
                                       class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md text-sm shadow-md hover:shadow-lg transition-all duration-200">
                                        Xem chi tiết
                                    </a>
                                    
                                    @if($event->status != 'ended')
                                        <form method="POST" action="{{ route('student.events.unregister', $event) }}" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-md text-sm shadow-md hover:shadow-lg transition-all duration-200"
                                                    onclick="return confirm('Bạn có chắc chắn muốn hủy đăng ký?')">
                                                Hủy đăng ký
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-12">
                        <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                        </svg>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">Bạn chưa đăng ký sự kiện nào</h3>
                        <p class="text-gray-500 mb-6">Hãy khám phá các sự kiện thú vị và đăng ký tham gia!</p>
                        <a href="{{ route('student.events.index') }}" 
                           class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-md shadow-md hover:shadow-lg transition-all duration-200">
                            Xem tất cả sự kiện
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
