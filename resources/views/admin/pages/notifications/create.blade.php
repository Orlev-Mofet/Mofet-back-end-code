@extends('admin.layouts.master')
@section('style')
<link href="https://cdnjs.cloudflare.com/ajax/libs/inter-ui/3.19.3/inter.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ol@v7.4.0/ol.css">

@endsection
@section('content')

<div>
    <div class="sm:col-span-6 flex flex-col col-span-full bg-white shadow-lg border border-gray-200">
        <header class="px-5 py-4 border-b border-gray-100 flex items-center justify-between">
            <h2 class="font-semibold text-gray-800"> Send Notification </h2>
            <div class="flex gap-x-6">
                
                <a
                    type="button"
                    href="{{ route('admin_notification.index') }}"
                    class="items-center px-4 py-2 bg-indigo-400 hover:bg-indigo-500 text-white text-sm font-medium rounded-md flex">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9.75 14.25 12m0 0 2.25 2.25M14.25 12l2.25-2.25M14.25 12 12 14.25m-2.58 4.92-6.374-6.375a1.125 1.125 0 0 1 0-1.59L9.42 4.83c.21-.211.497-.33.795-.33H19.5a2.25 2.25 0 0 1 2.25 2.25v10.5a2.25 2.25 0 0 1-2.25 2.25h-9.284c-.298 0-.585-.119-.795-.33Z" />
                    </svg>
                    &nbsp;
                    {{__('Back')}}
                </a>
            </div>
        </header>
        <form method="POST" action="{{ route('admin_notification.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 gap-x-6 gap-y-3 p-10">

                <div class="sm:col-span-3">
                    <label for="en" class="block text-sm font-medium leading-6 text-gray-900">Notification Content:</label>
                    <div class="mt-2">
                        <textarea  name="content" rows="8" class="px-4 focus:outline-none block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 focus-visible:border sm:text-sm sm:leading-6">{{ old('content') }}</textarea>
                    </div>
                    @error('content')
                        <label class="block text-sm font-medium leading-6 text-red-700">{{ $message }}</label>
                    @enderror
                </div>

                <div class="sm:col-span-3 flex justify-end">
                    <button
                        type="submit"
                        class="items-center px-4 py-2 bg-[#5495A9] hover:bg-[#1485A3] text-white text-sm font-medium rounded-md flex">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.59 14.37a6 6 0 0 1-5.84 7.38v-4.8m5.84-2.58a14.98 14.98 0 0 0 6.16-12.12A14.98 14.98 0 0 0 9.631 8.41m5.96 5.96a14.926 14.926 0 0 1-5.841 2.58m-.119-8.54a6 6 0 0 0-7.381 5.84h4.8m2.581-5.84a14.927 14.927 0 0 0-2.58 5.84m2.699 2.7c-.103.021-.207.041-.311.06a15.09 15.09 0 0 1-2.448-2.448 14.9 14.9 0 0 1 .06-.312m-2.24 2.39a4.493 4.493 0 0 0-1.757 4.306 4.493 4.493 0 0 0 4.306-1.758M16.5 9a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
                        </svg>
                        &nbsp;
                        {{__('Send')}}
                    </button>
                </div>
            </div>

        </form>
        
    </div>
</div>

@endsection

@section('script')

@endsection
