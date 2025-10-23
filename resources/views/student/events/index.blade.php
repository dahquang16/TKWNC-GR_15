@extends('student.layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h1 class="text-3xl font-bold text-gray-900 mb-8">Danh sách sự kiện</h1>

                @if($upcomingEvents->count() > 0)
                    <div class="mb-8">
                        <h2 class="text-2xl font-semibold text-blue-600 mb-4">🕐 Sự kiện sắp tới</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach($upcomingEvents as $event)
                                <div class="bg-blue-50 border border-blue-200 rounded-lg p-6 hover:shadow-lg transition-shadow">
                                    <h3 class="text-lg font-semibold text-blue-900 mb-2">{{ $event->title }}</h3>
                                    <p class="text-gray-600 text-sm mb-3">{{ Str::limit($event->description, 100) }}</p>
                                    <div class="text-sm text-gray-500 mb-3">
                                        <p><strong>Thời gian:</strong> {{ $event->start_time->format('d/m/Y H:i') }} - {{ $event->end_time->format('H:i') }}</p>
                                        <p><strong>Địa điểm:</strong> {{ $event->location }}</p>
                                        @if($event->max_participants)
                                            <p><strong>Số lượng:</strong> {{ $event->registered_count }}/{{ $event->max_participants }}</p>
                                        @endif
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <a href="{{ route('student.events.show', $event) }}" 
                                           class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md text-sm shadow-md hover:shadow-lg transition-all duration-200">
                                            Xem chi tiết
                                        </a>
                                        @if($event->max_participants && $event->is_full)
                                            <span class="text-red-600 text-sm font-semibold bg-red-100 px-2 py-1 rounded-full">Đã đầy</span>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                @if($ongoingEvents->count() > 0)
                    <div class="mb-8">
                        <h2 class="text-2xl font-semibold text-green-600 mb-4">🟢 Sự kiện đang diễn ra</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach($ongoingEvents as $event)
                                <div class="bg-green-50 border border-green-200 rounded-lg p-6 hover:shadow-lg transition-shadow">
                                    <h3 class="text-lg font-semibold text-green-900 mb-2">{{ $event->title }}</h3>
                                    <p class="text-gray-600 text-sm mb-3">{{ Str::limit($event->description, 100) }}</p>
                                    <div class="text-sm text-gray-500 mb-3">
                                        <p><strong>Thời gian:</strong> {{ $event->start_time->format('d/m/Y H:i') }} - {{ $event->end_time->format('H:i') }}</p>
                                        <p><strong>Địa điểm:</strong> {{ $event->location }}</p>
                                        @if($event->max_participants)
                                            <p><strong>Số lượng:</strong> {{ $event->registered_count }}/{{ $event->max_participants }}</p>
                                        @endif
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <a href="{{ route('student.events.show', $event) }}" 
                                           class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-md text-sm shadow-md hover:shadow-lg transition-all duration-200">
                                            Xem chi tiết
                                        </a>
                                        <span class="text-green-600 text-sm font-semibold bg-green-100 px-2 py-1 rounded-full">Đang diễn ra</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                @if($endedEvents->count() > 0)
                    <div class="mb-8">
                        <h2 class="text-2xl font-semibold text-gray-600 mb-4">⚫ Sự kiện đã kết thúc</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach($endedEvents as $event)
                                <div class="bg-gray-50 border border-gray-200 rounded-lg p-6 hover:shadow-lg transition-shadow">
                                    <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $event->title }}</h3>
                                    <p class="text-gray-600 text-sm mb-3">{{ Str::limit($event->description, 100) }}</p>
                                    <div class="text-sm text-gray-500 mb-3">
                                        <p><strong>Thời gian:</strong> {{ $event->start_time->format('d/m/Y H:i') }} - {{ $event->end_time->format('H:i') }}</p>
                                        <p><strong>Địa điểm:</strong> {{ $event->location }}</p>
                                        @if($event->max_participants)
                                            <p><strong>Số lượng:</strong> {{ $event->registered_count }}/{{ $event->max_participants }}</p>
                                        @endif
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <a href="{{ route('student.events.show', $event) }}" 
                                           class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-md text-sm shadow-md hover:shadow-lg transition-all duration-200">
                                            Xem chi tiết
                                        </a>
                                        <span class="text-gray-600 text-sm font-semibold bg-gray-100 px-2 py-1 rounded-full">Đã kết thúc</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                @if($upcomingEvents->count() == 0 && $ongoingEvents->count() == 0 && $endedEvents->count() == 0)
                    <div class="text-center py-12">
                        <p class="text-gray-500 text-lg">Hiện tại chưa có sự kiện nào.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
