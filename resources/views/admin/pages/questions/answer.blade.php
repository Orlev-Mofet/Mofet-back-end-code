@extends('admin.layouts.master')

@section('content')

<div>
    <div class="sm:col-span-6 flex flex-col col-span-full bg-white shadow-lg border border-gray-200">
        <header class="px-5 py-4 border-b border-gray-100 flex items-center justify-between">
            <h2 class="font-semibold text-gray-800"> Edit Answer </h2>
            <a
                type="button"
                href="{{ url()->previous() }}"
                class="flex items-center px-4 py-2 bg-indigo-400 hover:bg-indigo-500 text-white text-sm font-medium rounded-md">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9.75 14.25 12m0 0 2.25 2.25M14.25 12l2.25-2.25M14.25 12 12 14.25m-2.58 4.92-6.374-6.375a1.125 1.125 0 0 1 0-1.59L9.42 4.83c.21-.211.497-.33.795-.33H19.5a2.25 2.25 0 0 1 2.25 2.25v10.5a2.25 2.25 0 0 1-2.25 2.25h-9.284c-.298 0-.585-.119-.795-.33Z" />
                </svg>
                  
                {{__('Back')}}
            </a>
        </header>
        <form method="POST" class="p-4" action="{{ route('questions.answer.update', $answer->id) }}">
        @csrf
        @method('PUT')

        <textarea
    name="answer"
    id="answer"
    rows="5"
    class="block w-full rounded-md border-0 py-1.5 pl-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
>{{ $answer->answer }}</textarea>
<input type="hidden" name="page" value="{{ request('page') }}">
<input type="hidden" name="questionId" value="{{ request('questionId') }}">
        <button
            type="submit"
            class="mt-4 px-4 py-2 bg-indigo-500 text-white rounded"
        >
            Save
        </button>

    </form>

</div>
</div>

@endsection