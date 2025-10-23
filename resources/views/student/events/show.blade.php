@extends('student.layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <nav class="flex mb-6" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3">
                        <li class="inline-flex items-center">
                            <a href="{{ route('student.events.index') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                                <svg class="w-3 h-3 mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                                </svg>
                                Danh sách sự kiện
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
                </div>


                <h1 class="text-3xl font-bold text-gray-900 mb-6">{{ $event->title }}</h1>

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
                            </div>
                        </div>
                    </div>

                    <div class="lg:col-span-1">
                        <div class="bg-white border border-gray-200 rounded-lg p-6 sticky top-6">
                            @auth
                                @if($event->status == 'ended')
                                    <p class="text-gray-500 text-center">Sự kiện đã kết thúc</p>
                                @elseif($isRegistered)
                                    <div class="text-center">
                                        <div class="mb-4">
                                            <svg class="w-12 h-12 text-green-500 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <p class="text-green-600 font-semibold">Bạn đã đăng ký</p>
                                        </div>
                                        <form method="POST" action="{{ route('student.events.unregister', $event) }}" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="bg-red-600 hover:bg-red-700 text-white font-bold py-3 px-6 rounded-md w-full shadow-md hover:shadow-lg transition-all duration-200"
                                                    onclick="return confirm('Bạn có chắc chắn muốn hủy đăng ký?')">
                                                Hủy đăng ký
                                            </button>
                                        </form>
                                    </div>
                                @elseif($event->is_full)
                                    <div class="text-center">
                                        <svg class="w-12 h-12 text-red-500 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.732-.833-2.5 0L4.268 19.5c-.77.833.192 2.5 1.732 2.5z"></path>
                                        </svg>
                                        <p class="text-red-600 font-semibold">Sự kiện đã đầy</p>
                                    </div>
                                @else
                                    <form method="POST" action="{{ route('student.events.register', $event) }}">
                                        @csrf
                                        <button type="submit" 
                                                class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-md w-full text-lg shadow-md hover:shadow-lg transition-all duration-200"
                                                onclick="return confirm('Bạn có chắc chắn muốn đăng ký sự kiện này?')">
                                            Đăng ký tham gia
                                        </button>
                                    </form>
                                @endif
                            @else
                                <div class="text-center">
                                    <p class="text-gray-600 mb-4">Đăng nhập để đăng ký tham gia</p>
                                    <a href="{{ route('login') }}" 
                                       class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-md w-full inline-block shadow-md hover:shadow-lg transition-all duration-200">
                                        Đăng nhập
                                    </a>
                                </div>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
