@extends('admin.layouts.master')
@section('style')

@endsection
@section('content')

<div>
    <div class="sm:col-span-6 flex flex-col col-span-full bg-white shadow-lg border border-gray-200">
        <header class="px-5 py-4 border-b border-gray-100 flex items-center justify-between">
            <h2 class="font-semibold text-gray-800"> Constant Edit </h2>
            <div class="flex gap-x-6">
                
                <a
                    type="button"
                    href="{{ route('constant.index') }}"
                    class="items-center px-4 py-2 bg-indigo-400 hover:bg-indigo-500 text-white text-sm font-medium rounded-md flex">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9.75 14.25 12m0 0 2.25 2.25M14.25 12l2.25-2.25M14.25 12 12 14.25m-2.58 4.92-6.374-6.375a1.125 1.125 0 0 1 0-1.59L9.42 4.83c.21-.211.497-.33.795-.33H19.5a2.25 2.25 0 0 1 2.25 2.25v10.5a2.25 2.25 0 0 1-2.25 2.25h-9.284c-.298 0-.585-.119-.795-.33Z" />
                    </svg>
                    &nbsp;
                    {{__('Back')}}
                </a>
            </div>
        </header>
        <form method="POST" action="{{ route('constant.update', $constant->id) }}" enctype="multipart/form-data">
            @csrf
            {{method_field('PATCH')}}
            <div class="grid grid-cols-1 gap-x-6 gap-y-3 p-10">
                <div class="sm:col-span-3">
                    <label for="key" class="block text-sm font-medium leading-6 text-gray-900">Key:</label>
                    <div class="mt-2">
                        <input readonly type="text" name="key" id="key" autocomplete="key" value="{{ old('key', $constant->key) }}" class="pl-4 focus:outline-none block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 focus-visible:border sm:text-sm sm:leading-6">
                    </div>
                    @error('key')
                        <label class="block text-sm font-medium leading-6 text-red-700">{{ $message }}</label>
                    @enderror
                </div>

                <div class="sm:col-span-3">
                    <label for="en" class="block text-sm font-medium leading-6 text-gray-900">Value:</label>
                    <div class="mt-2">
                        <textarea  name="value" id="value" rows="3" class="px-4 focus:outline-none block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 focus-visible:border sm:text-sm sm:leading-6">{{ old('value', $constant->value) }}</textarea>
                    </div>
                    @error('value')
                        <label class="block text-sm font-medium leading-6 text-red-700">{{ $message }}</label>
                    @enderror
                </div>

                
                <div class="sm:col-span-3 flex justify-end">
                    <button
                        type="submit"
                        class="items-center px-4 py-2 bg-[#5495A9] hover:bg-[#1485A3] text-white text-sm font-medium rounded-md flex">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                        </svg>
                        &nbsp;
                        {{__('Update')}}
                    </button>
                </div>
            </div>

        </form>
        
    </div>
</div>

@endsection

@section('script')

@endsection
