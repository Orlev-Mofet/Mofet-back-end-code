@extends('admin.layouts.master')

@section('style')

<link href="https://cdnjs.cloudflare.com/ajax/libs/inter-ui/3.19.3/inter.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ol@v7.4.0/ol.css">
@endsection

@section('content')

<div>
    <div class="sm:col-span-6 flex flex-col col-span-full bg-white shadow-lg border border-gray-200">

    <header class="px-5 py-4 border-b border-gray-100 flex items-center justify-between">
        <h2 class="font-semibold text-gray-800">Notifications</h2>

        <a href="{{ route('admin_notification.create') }}"
           class="flex items-center px-4 py-2 bg-indigo-400 hover:bg-indigo-500 text-white text-sm font-medium rounded-md">
            
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                 stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0M3.124 7.5A8.969 8.969 0 0 1 5.292 3m13.416 0a8.969 8.969 0 0 1 2.168 4.5" />
            </svg>

            {{ __('New Notification') }}
        </a>
    </header>

    <div class="flex-grow overflow-auto">
        <table class="min-w-full text-left text-sm font-light mt-4">

            {{-- HEADER --}}
            <thead class="border-b font-medium">
                <tr>
                    <th class="px-6 w-24">#</th>
                    @php
                        $currentSort = request('sort', 'desc');
                        $nextSort = $currentSort === 'asc' ? 'desc' : 'asc';
                    @endphp

                    <th class="px-6 w-48">
                        <a href="{{ route('admin_notification.index', array_merge(request()->all(), ['sort' => $nextSort])) }}"
                        class="flex items-center gap-1">

                            time

                            @if($currentSort === 'asc')
                                ↑
                            @else
                                ↓
                            @endif

                        </a>
                    </th>
                    <th class="px-6">content</th>
                </tr>
            </thead>

            <tbody>

            {{-- FILTER ROW --}}
            <form action="{{ route('admin_notification.index') }}" method="GET">
                <tr class="border-b">
                    <td class="px-6 py-4 w-24">
                        <button type="submit"
                                class="flex items-center px-3 py-1.5 bg-indigo-400 hover:bg-indigo-500 text-white text-sm font-medium rounded-md">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"/>
                            </svg>
                            Search
                        </button>
                    </td>

                    {{-- TIME --}}
                    <td class="px-2 py-4 w-48">
                        <input type="text"
                               name="time"
                               value="{{ request('time') }}"
                               class="block w-full rounded-md border-0 py-1.5 pl-2 text-gray-900 ring-1 ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm"
                               placeholder="2024-01-01 12:00:00">
                    </td>

                    {{-- CONTENT --}}
                    <td class="px-2 py-4">
                        <input type="text"
                               name="content"
                               value="{{ request('content') }}"
                               class="block w-full rounded-md border-0 py-1.5 pl-2 text-gray-900 ring-1 ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm"
                               placeholder="Content">
                    </td>
                </tr>
            </form>

            {{-- DATA --}}
            <?php $i = 1; ?>
            @foreach($notifications as $notification)
                <tr class="border-b">
                    <td class="px-6 py-4 font-medium w-24">{{ $i }}</td>
                    <td class="px-6 py-4 w-48 whitespace-nowrap">{{ $notification->time }}</td>
                    <td class="px-6 py-4 w-3/4">{{ $notification->content }}</td>
                </tr>
                <?php $i++; ?>
            @endforeach

            </tbody>
        </table>
    </div>
</div>

</div>

@endsection

@section('script')
@endsection
