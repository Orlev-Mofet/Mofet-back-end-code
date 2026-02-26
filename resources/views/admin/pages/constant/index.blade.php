@extends('admin.layouts.master')
@section('style')
<link href="https://cdnjs.cloudflare.com/ajax/libs/inter-ui/3.19.3/inter.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ol@v7.4.0/ol.css">

@endsection
@section('content')

<div>
    <div class="sm:col-span-6 flex flex-col col-span-full bg-white shadow-lg border border-gray-200">
        <header class="px-5 py-4 border-b border-gray-100 flex items-center justify-between">
            <h2 class="font-semibold text-gray-800"> Constants </h2>
            
        </header>
        <div class="flex-grow overflow-auto">
            <table class="min-w-full text-left text-sm font-light mt-4">
                <thead class="border-b font-medium dark:border-neutral-500">
                    <tr>
                        <th scope="col" class="px-6">#</th>
                        <th scope="col" class="px-6">Action</th>
                        <th scope="col" class="px-6">key</th>
                        <th scope="col" class="px-6">value</th>
                    </tr>
                </thead>
                <tbody>

                    <?php $i = 1; ?>
                    @foreach($constants as $constant)
                    <tr class="border-b dark:border-neutral-500">
                        <td class="whitespace-nowrap px-6 py-4 font-medium">{{$i}}</td>
                        <td class="whitespace-nowrap px-6 py-4">
                            <a rel="tooltip" class="inline-block items-center px-4 py-2 bg-indigo-400 hover:bg-indigo-500 text-white text-sm font-medium rounded-md mb_-9"
                                href="{{ route('constant.edit', $constant->id) }}" >
                                <svg class="h-3.5 w-3.5"  viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M9 7 h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />  <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />  <line x1="16" y1="5" x2="19" y2="8" /></svg>
                            </a>
                        </td>
                        <td class="whitespace-nowrap px-6 py-4">{{ $constant->key }}</td>
                        <td class="whitespace-nowrap px-6 py-4">{{ $constant->value }}</td>
                    </tr>
                    <?php $i ++; ?>
                    @endforeach

                    <tr class="border-b dark:border-neutral-500">
                        <td class="whitespace-nowrap px-6 py-4 font-medium"></td>
                        <td class="whitespace-nowrap px-6 py-4"></td>
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
