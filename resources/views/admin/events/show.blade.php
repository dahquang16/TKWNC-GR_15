@extends('admin.layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">

                <nav class="flex mb-6" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3">
                        <li class="inline-flex items-center">
                            <a href="{{ route('admin.events.index') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                                Quản lý sự kiện
                            </a>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                </svg>
                                <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">Chi tiết sự kiện</span>
                            </div>
                        </li>
                    </ol>
                </nav>

                <div class="flex justify-between items-center mb-8">
                    <h1 class="text-3xl font-bold text-gray-900">{{ $event->title }}</h1>
                    <div class="flex space-x-4">
                        <a href="{{ route('admin.events.edit', $event) }}" 
                           class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                            ✏️ Chỉnh sửa
                        </a>
                        <a href="{{ route('admin.registrations.show', $event) }}" 
                           class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            👥 Xem đăng ký
                        </a>
                    </div>
                </div>

                <div class="mb-6">
                    @if($event->status == 'upcoming')
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                            🕐 Sắp tới
                        </span>
                    @elseif($event->status == 'ongoing')
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                            🟢 Đang diễn ra
                        </span>
                    @else
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-gray-100 text-gray-800">
                            ⚫ Đã kết thúc
                        </span>
                    @endif
                    @if(!$event->is_active)
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800 ml-2">
                            ❌ Không hoạt động
                        </span>
                    @endif
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <div class="lg:col-span-2">
                        <div class="mb-8">
                            <h2 class="text-xl font-semibold text-gray-900 mb-4">Mô tả sự kiện</h2>
                            <div class="prose max-w-none">
                                <p class="text-gray-700 leading-relaxed">{{ $event->description }}</p>
                            </div>
                        </div>

                        <div class="bg-gray-50 rounded-lg p-6">
                            <h2 class="text-xl font-semibold text-gray-900 mb-4">Thông tin chi tiết</h2>
                            <div class="space-y-4">
                                <div class="flex items-start">
                                    <div class="flex-shrink-0">
                                        <svg class="w-5 h-5 text-gray-400 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-gray-900">Thời gian</p>
                                        <p class="text-sm text-gray-600">
                                            {{ $event->start_time->format('d/m/Y H:i') }} - {{ $event->end_time->format('H:i') }}
                                        </p>
                                    </div>
                                </div>

                                <div class="flex items-start">
                                    <div class="flex-shrink-0">
                                        <svg class="w-5 h-5 text-gray-400 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-gray-900">Địa điểm</p>
                                        <p class="text-sm text-gray-600">{{ $event->location }}</p>
                                    </div>
                                </div>

                                @if($event->max_participants)
                                    <div class="flex items-start">
                                        <div class="flex-shrink-0">
                                            <svg class="w-5 h-5 text-gray-400 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                                            </svg>
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-sm font-medium text-gray-900">Số lượng tham gia</p>
                                            <p class="text-sm text-gray-600">
                                                {{ $event->registered_count }}/{{ $event->max_participants }} người
                                                @if($event->is_full)
                                                    <span class="text-red-500 font-semibold">(Đã đầy)</span>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                @endif

                                <div class="flex items-start">
                                    <div class="flex-shrink-0">
                                        <svg class="w-5 h-5 text-gray-400 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-gray-900">Ngày tạo</p>
                                        <p class="text-sm text-gray-600">{{ $event->created_at->format('d/m/Y H:i') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="lg:col-span-1">
                        <div class="bg-white border border-gray-200 rounded-lg p-6 sticky top-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Thống kê</h3>
                            
                            <div class="space-y-4">
                                <div class="flex justify-between">
                                    <span class="text-sm text-gray-600">Tổng đăng ký:</span>
                                    <span class="text-sm font-semibold text-gray-900">{{ $registrations->count() }}</span>
                                </div>
                                
                                @if($event->max_participants)
                                    <div class="flex justify-between">
                                        <span class="text-sm text-gray-600">Tỷ lệ đăng ký:</span>
                                        <span class="text-sm font-semibold text-gray-900">
                                            {{ round(($event->registered_count / $event->max_participants) * 100, 1) }}%
                                        </span>
                                    </div>
                                @endif

                                <div class="flex justify-between">
                                    <span class="text-sm text-gray-600">Trạng thái:</span>
                                    <span class="text-sm font-semibold text-gray-900">
                                        @if($event->status == 'upcoming')
                                            Sắp tới
                                        @elseif($event->status == 'ongoing')
                                            Đang diễn ra
                                        @else
                                            Đã kết thúc
                                        @endif
                                    </span>
                                </div>
                            </div>

                            <div class="mt-6 pt-6 border-t border-gray-200">
                                <h4 class="text-sm font-medium text-gray-900 mb-3">Đăng ký gần đây</h4>
                                @if($registrations->count() > 0)
                                    <div class="space-y-2">
                                        @foreach($registrations->take(5) as $registration)
                                            <div class="flex items-center justify-between text-sm">
                                                <span class="text-gray-600">{{ $registration->user->name }}</span>
                                                <span class="text-gray-500">{{ $registration->registered_at->format('d/m H:i') }}</span>
                                            </div>
                                        @endforeach
                                    </div>
                                    @if($registrations->count() > 5)
                                        <a href="{{ route('admin.registrations.show', $event) }}" 
                                           class="text-blue-600 hover:text-blue-800 text-sm mt-2 inline-block">
                                            Xem tất cả ({{ $registrations->count() }})
                                        </a>
                                    @endif
                                @else
                                    <p class="text-gray-500 text-sm">Chưa có đăng ký nào</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

