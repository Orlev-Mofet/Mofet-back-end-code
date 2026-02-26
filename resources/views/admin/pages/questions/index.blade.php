@extends('admin.layouts.master')
@section('style')
<link href="https://cdnjs.cloudflare.com/ajax/libs/inter-ui/3.19.3/inter.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ol@v7.4.0/ol.css">

@endsection
@section('content')

<div>
    <div class="sm:col-span-6 flex flex-col col-span-full bg-white shadow-lg border border-gray-200">
        <header class="px-5 py-4 border-b border-gray-100 flex items-center justify-between">
            <h2 class="font-semibold text-gray-800"> Question Management </h2>
            
        </header>
        <div class="flex-grow overflow-auto">
            <table class="min-w-full text-left text-sm font-light mt-4">
                <thead class="border-b font-medium dark:border-neutral-500">
                    <tr>
                        <th scope="col" class="px-6">#</th>
                        <th scope="col" class="px-6">Action</th>
                        <th scope="col" class="px-6">Field</th>
                        <th scope="col" class="px-6">User</th>
                        <th scope="col" class="px-6 w-3/4">Question</th>
                        <th scope="col" class="px-6">File Sort</th>
                        <th scope="col" class="px-6">File Name</th>
                        <th scope="col" class="px-6">Abused</th>
                    </tr>
                </thead>
                <tbody>

                    <form action="{{ route('questions.index') }}" method="GET">
                        <tr class="border-b dark:border-neutral-500">
                            <td class="whitespace-nowrap px-6 py-4 font-medium"></td>
                            <td class="whitespace-nowrap px-6 py-4">
                                <button type="submit" class="flex items-center px-3 py-1.5 bg-indigo-400 hover:bg-indigo-500 text-white text-sm font-medium rounded-md mb_-9">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                                    </svg>
                                      
                                    Search
                                </button>
                            </td>
                            <td class="whitespace-nowrap px-2 py-4">
                                <div class="relative mt-2 rounded-md shadow-sm">
                                    <input type="text" name="field" id="field" value="{{ request('field') }}" class="block w-full rounded-md border-0 py-1.5 pl-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Field">
                                </div>
                            </td>
                            <td class="whitespace-nowrap px-2 py-4">
                                <div class="relative mt-2 rounded-md shadow-sm">
                                    <input type="text" name="user" id="user" value="{{ request('user') }}" class="block w-full rounded-md border-0 py-1.5 pl-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="User">
                                </div>
                            </td>
                            <td class="whitespace-nowrap px-2 py-4">
                                <div class="relative mt-2 rounded-md shadow-sm">
                                    <input type="text" name="question" id="question" value="{{ request('question') }}" class="block w-full rounded-md border-0 py-1.5 pl-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Question">
                                </div>
                            </td>
                            <td class="whitespace-nowrap px-2 py-4">
                                <div class="relative mt-2 rounded-md shadow-sm">
                                    <input type="text" name="file_sort" id="file_sort" value="{{ request('file_sort') }}" class="block w-full rounded-md border-0 py-1.5 pl-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="File Sort">
                                </div>
                            </td>
                            <td class="whitespace-nowrap px-2 py-4">
                                <div class="relative mt-2 rounded-md shadow-sm">
                                    <input type="text" name="file_name" id="file_name" value="{{ request('file_name') }}" class="block w-full rounded-md border-0 py-1.5 pl-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="File Name">
                                </div>
                            </td>
                            <td class="whitespace-nowrap px-6 py-4">
                                <div class="mb-[0.125rem] min-h-[1.5rem] pl-[1.5rem] flex">
                                    <input 
                                        type="checkbox" 
                                        name="is_abused" 
                                        id="is_abused"
                                        {{ request()->has('is_abused') ? "checked": "" }}
                                        class="relative float-left -ml-[1.5rem] mr-[6px] mt-[0.15rem] h-[1.125rem] w-[1.125rem] appearance-none rounded-[0.25rem] border-[0.125rem] border-solid border-neutral-300 outline-none before:pointer-events-none before:absolute before:h-[0.875rem] before:w-[0.875rem] before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] checked:border-primary checked:bg-primary checked:before:opacity-[0.16] checked:after:absolute checked:after:-mt-px checked:after:ml-[0.25rem] checked:after:block checked:after:h-[0.8125rem] checked:after:w-[0.375rem] checked:after:rotate-45 checked:after:border-[0.125rem] checked:after:border-l-0 checked:after:border-t-0 checked:after:border-solid checked:after:border-white checked:after:bg-transparent checked:after:content-[''] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:shadow-none focus:transition-[border-color_0.2s] focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] focus:after:absolute focus:after:z-[1] focus:after:block focus:after:h-[0.875rem] focus:after:w-[0.875rem] focus:after:rounded-[0.125rem] focus:after:content-[''] checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:after:-mt-px checked:focus:after:ml-[0.25rem] checked:focus:after:h-[0.8125rem] checked:focus:after:w-[0.375rem] checked:focus:after:rotate-45 checked:focus:after:rounded-none checked:focus:after:border-[0.125rem] checked:focus:after:border-l-0 checked:focus:after:border-t-0 checked:focus:after:border-solid checked:focus:after:border-white checked:focus:after:bg-transparent dark:border-neutral-600 dark:checked:border-primary dark:checked:bg-primary dark:focus:before:shadow-[0px_0px_0px_13px_rgba(255,255,255,0.4)] dark:checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca]" placeholder="File Name">
                                </div>
                            </td>
                        </tr>
                    </form>

                    <?php $i = 1; ?>
                    @foreach($questions as $question)
                    <tr class="border-b dark:border-neutral-500">
                        <td class="whitespace-nowrap px-6 py-4 font-medium">{{$i}}</td>
                        <td class="whitespace-nowrap px-6 py-4">
                            <a rel="tooltip" title="Show Answers" class="inline-block items-center px-3 py-1.5 bg-indigo-400 hover:bg-indigo-500 text-white text-sm font-medium rounded-md mb_-9"
                                href="{{ route('questions.answers', "id=".$question->id) }}" >
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75a1.875 1.875 0 0 1 0 3.75H5.625a1.875 1.875 0 0 1 0-3.75Z" />
                                </svg>
                            </a>

                            <button data-te-toggle="modal"
                                data-te-target="#delete_modal_{{$question->id}}"
                                data-te-ripple-init
                                data-te-ripple-color="light" 
                                type="submit" 
                                class="inline-flex items-center px-4 py-2 bg-red-400 hover:bg-red-500 text-white text-sm font-medium rounded-md" >
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>

                            <div
                                data-te-modal-init
                                class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
                                id="delete_modal_{{$question->id}}"
                                tabindex="-1"
                                aria-labelledby="delete_modal_{{$question->id}}Label"
                                aria-hidden="true"
                            >
                                <div
                                data-te-modal-dialog-ref
                                class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]">
                                    <div
                                        class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600">
                                        
                                        <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:w-full sm:max-w-lg">
                                            <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                                              <div class="sm:flex sm:items-start">
                                                <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                                    <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                                                    </svg>
                                                </div>
                                                <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                                  <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title"> Delete Question </h3>
                                                  <div class="mt-2">
                                                    <p class="text-sm text-gray-500 text-pretty">Are you sure you want to delete question?</p>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                              
                                                <form action="{{route('questions.destroy', $question->id)}}" method="POST" class="inline-block">
                                                    {{ csrf_field() }}
                                                    {{ method_field("DELETE") }}
                                                    <button type="submit" class="inline-flex items-center px-3 py-2 bg-red-400 hover:bg-red-500 text-white text-sm font-medium rounded-md ml-2" >
                                                        Confirm
                                                    </button>
                                                </form>

                                                <button type="button" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto" data-te-modal-dismiss>Cancel</button>
                                            </div>
                                          </div>

                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="whitespace-nowrap px-6 py-4">{{ $question->field }}</td>
                        <td class="whitespace-nowrap px-6 py-4">{{ $question->user->surname }} ({{ $question->user->school_name }} {{ $question->user->city }})</td>
                        <td class="whitespace-nowrap text-wrap px-6 py-4  w-3/4">{{ $question->question }}</td>
                        <td class="whitespace-nowrap px-6 py-4">{{ $question->file_sort }}</td>
                        <td class="whitespace-nowrap px-6 py-4">
                            <a target="_blank" href="{{Storage::url($question->file_path)}}" class="text-blue-500">
                                {{ $question->file_name }}
                            </a>
                        </td>
                        <td class="whitespace-nowrap px-6 py-4 text-center flex flex-col justify-center items-center ">
                            @if($question->is_abused === "1")
                            
                            <button
                                type="button"
                                class="inline-block rounded-full bg-primary p-2 uppercase leading-normal text-red-500 shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                                data-te-toggle="modal"
                                data-te-target="#modal_{{$question->id}}"
                                data-te-ripple-init
                                data-te-ripple-color="light">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m0-10.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.75c0 5.592 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.57-.598-3.75h-.152c-3.196 0-6.1-1.25-8.25-3.286Zm0 13.036h.008v.008H12v-.008Z" />
                                </svg>
                            </button>
                            Abused by: <br/>
                                @if( isset($question->abuse_user) )
                                    {{ $question->abuse_user->first_name }} ({{ $question->abuse_user->school_name }} {{ $question->abuse_user->city }})
                                @endif
                            <!-- Modal -->
                            <div
                                data-te-modal-init
                                class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
                                id="modal_{{$question->id}}"
                                tabindex="-1"
                                aria-labelledby="modal_{{$question->id}}Label"
                                aria-hidden="true">
                                <div
                                data-te-modal-dialog-ref
                                class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]">
                                    <div
                                        class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600">
                                        
                                        <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:w-full sm:max-w-lg">
                                            <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                                              <div class="sm:flex sm:items-start">
                                                <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                                  <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                                                  </svg>
                                                </div>
                                                <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                                  <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title"> Release Abuse </h3>
                                                  <div class="mt-2">
                                                    <p class="text-sm text-gray-500 text-pretty">Are you sure you want to release abused question?</p>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                              <a type="button" href="{{ route('questions.release_abuse', "id=".$question->id) }}" class="inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto">Confirm</a>
                                              <button type="button" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto" data-te-modal-dismiss>Cancel</button>
                                            </div>
                                          </div>

                                    </div>
                                </div>
                            </div>
                            @endif
                        </td>
                    </tr>
                    <?php $i ++; ?>
                    @endforeach

                    <tr class="border-b dark:border-neutral-500">
                        <td class="whitespace-nowrap px-6 py-4 font-medium"></td>
                        <td class="whitespace-nowrap px-6 py-4"></td>
                        <td class="whitespace-nowrap px-6 py-4"></td>
                        <td class="whitespace-nowrap px-6 py-4"></td>
                        <td class="whitespace-nowrap px-6 py-4"></td>
                        <td class="whitespace-nowrap px-6 py-4"></td>
                        <td class="whitespace-nowrap px-6 py-4"></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="p-2">
            {{ $questions->links() }}
        </div>

    </div>
</div>

@endsection

@section('script')

@endsection
