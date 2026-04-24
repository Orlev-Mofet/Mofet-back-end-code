@extends('admin.layouts.master')
@section('style')
<link href="https://cdnjs.cloudflare.com/ajax/libs/inter-ui/3.19.3/inter.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ol@v7.4.0/ol.css">

@endsection
@section('content')

<div>
    <div class="sm:col-span-6 flex flex-col col-span-full bg-white shadow-lg border border-gray-200">
        <header class="px-5 py-4 border-b border-gray-100 flex items-center justify-between">
            <h2 class="font-semibold text-gray-800"> Contact Us </h2>

        </header>
        <div class="flex-grow overflow-auto">
            <table class="min-w-full text-left text-sm font-light mt-4">
                <thead class="border-b font-medium dark:border-neutral-500">
                    <tr>
                        <th scope="col" class="px-6">#</th>
                            @php
                                $currentSort = request('sort', 'desc');
                                $nextSort = $currentSort === 'asc' ? 'desc' : 'asc';
                            @endphp

                            <th class="px-6 w-40">
                                <a href="{{ route('contact_us.index', array_merge(request()->all(), ['sort' => $nextSort])) }}"
                                class="flex items-center gap-1">

                                    time

                                    @if($currentSort === 'asc')
                                        ↑
                                    @else
                                        ↓
                                    @endif

                                </a>
                            </th>
                        <th scope="col" class="px-6">user</th>
                        <th scope="col" class="px-6">content</th>
                    </tr>
                </thead>
                <form action="{{ route('contact_us.index') }}" method="GET">
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

                    {{-- USER --}}
                    <td class="px-2 py-4 w-48">
                        <input type="text"
                               name="user"
                               value="{{ request('user') }}"
                               class="block w-full rounded-md border-0 py-1.5 pl-2 text-gray-900 ring-1 ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm"
                               placeholder="User">
                    </td>

                    {{-- CONTENT --}}
                    <td colspan="3" class="px-2 py-4">
                        <input type="text"
                               name="content"
                               value="{{ request('content') }}"
                               class="block w-full rounded-md border-0 py-1.5 pl-2 text-gray-900 ring-1 ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm"
                               placeholder="Content">
                    </td>
                </tr>
            </form>
                <tbody>

                    <?php $i = 1; ?>
                    @foreach($contact_us as $item)
                    <tr class="border-b dark:border-neutral-500">
                        <td class="whitespace-nowrap px-6 py-4 font-medium">{{$i}}</td>
                        <td class="whitespace-nowrap px-6 py-4">{{ $item->time }}</td>
                        <td class="whitespace-nowrap px-6 py-4">
                            @if($item->user)
                                {{ $item->user->first_name }} ({{ $item->user->school_name }} {{ $item->user->city }})
                            @endif
                        </td>
                        <td class="whitespace-nowrap px-6 py-4 w-3/4">{{ $item->content }}</td>
                       
                    </tr>
                    <?php $i ++; ?>
                    @endforeach

                    <tr class="border-b dark:border-neutral-500">
                        <td class="whitespace-nowrap px-6 py-4 font-medium"></td>
                        <td class="whitespace-nowrap px-6 py-4"></td>
                        <td class="whitespace-nowrap px-6 py-4"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@section('script')

@endsection
