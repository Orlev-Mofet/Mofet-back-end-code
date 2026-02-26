@extends('admin.layouts.master')
@section('style')
<link href="https://cdnjs.cloudflare.com/ajax/libs/inter-ui/3.19.3/inter.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ol@v7.4.0/ol.css">

@endsection
@section('content')

<div class="flex gap-2">
    <div class="sm:col-span-6 flex flex-col col-span-full bg-white shadow-lg border border-gray-200 max-w-[50%]">
        <header class="px-5 py-4 border-b border-gray-100 flex items-center justify-between">
            <h2 class="font-semibold text-gray-800"> USER LIST </h2>
        </header>
        <div class="flex-grow overflow-auto">
            <table class="min-w-full text-left text-sm font-light mt-4">
                <thead class="border-b font-medium dark:border-neutral-500">
                    <tr>
                        <th scope="col" class="px-6">#</th>
                        <th scope="col" class="px-6">Phone Number</th>
                        <th scope="col" class="px-6">First Name</th>
                        <th scope="col" class="px-6">Surname</th>
                        <th scope="col" class="px-6">Year Of Birth</th>
                        <th scope="col" class="px-6">School Name</th>
                        <th scope="col" class="px-6">City</th>
                        <th scope="col" class="px-6">Gender</th>
                        <th scope="col" class="px-6">Grade</th>
                        <th scope="col" class="px-6">Field Of Interest</th>
                    </tr>
                </thead>
                <tbody>
                    <form action="{{ route('users.show_all_data') }}" method="GET">
                        <tr class="border-b dark:border-neutral-500">
                            <td class="whitespace-nowrap px-6 py-4">
                                <button type="submit" class="flex items-center px-3 py-1.5 bg-indigo-400 hover:bg-indigo-500 text-white text-sm font-medium rounded-md mb_-9">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                                    </svg>
                                </button>
                            </td>
                            <td class="whitespace-nowrap px-2 py-4">
                                <div class="relative mt-2 rounded-md shadow-sm">
                                    <input type="text" name="phone_number" id="phone_number" value="{{ request('phone_number') }}" class="block w-full rounded-md border-0 py-1.5 pl-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Phone Number">
                                </div>
                            </td>
                            <td class="whitespace-nowrap px-2 py-4">
                                <div class="relative mt-2 rounded-md shadow-sm">
                                    <input type="text" name="first_name" id="first_name" value="{{ request('first_name') }}" class="block w-full rounded-md border-0 py-1.5 pl-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="First Name">
                                </div>
                            </td>
                            <td class="whitespace-nowrap px-2 py-4">
                                <div class="relative mt-2 rounded-md shadow-sm">
                                    <input type="text" name="surname" id="surname" value="{{ request('surname') }}" class="block w-full rounded-md border-0 py-1.5 pl-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Surname">
                                </div>
                            </td>
                            <td class="whitespace-nowrap px-2 py-4">
                                <div class="relative mt-2 rounded-md shadow-sm">
                                    <input type="text" name="year_of_birth" id="year_of_birth" value="{{ request('year_of_birth') }}" class="block w-full rounded-md border-0 py-1.5 pl-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Year">
                                </div>
                            </td>
                            <td class="whitespace-nowrap px-2 py-4">
                                <div class="relative mt-2 rounded-md shadow-sm">
                                    <input type="text" name="school_name" id="school_name" value="{{ request('school_name') }}" class="block w-full rounded-md border-0 py-1.5 pl-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="School Name">
                                </div>
                            </td>
                            <td class="whitespace-nowrap px-2 py-4">
                                <div class="relative mt-2 rounded-md shadow-sm">
                                    <input type="text" name="city" id="city" value="{{ request('city') }}" class="block w-full rounded-md border-0 py-1.5 pl-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="City">
                                </div>
                            </td>
                            <td class="whitespace-nowrap px-2 py-4">
                                <div class="relative mt-2 rounded-md shadow-sm">
                                    <input type="text" name="gender" id="gender" value="{{ request('gender') }}" class="block w-full rounded-md border-0 py-1.5 pl-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Gender">
                                </div>
                            </td>
                            <td class="whitespace-nowrap px-2 py-4">
                                <div class="relative mt-2 rounded-md shadow-sm">
                                    <input type="text" name="grade" id="grade" value="{{ request('grade') }}" class="block w-full rounded-md border-0 py-1.5 pl-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Grade">
                                </div>
                            </td>
                            <td class="whitespace-nowrap px-2 py-4">
                                <div class="relative mt-2 rounded-md shadow-sm">
                                    <input type="text" name="field_of_interest" id="field_of_interest" value="{{ request('field_of_interest') }}" class="block w-full rounded-md border-0 py-1.5 pl-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Field">
                                </div>
                            </td>
                            <td class="whitespace-nowrap px-2 py-4"></td>
                        </tr>
                    </form>

                    <?php $i = 1; ?>
                    @foreach($users as $user)
                    <tr class="border-b dark:border-neutral-500">
                            
                            <td class="whitespace-nowrap px-6 py-4 font-medium">{{$i}}</td>
                            <td class="whitespace-nowrap px-6 py-4">
                                <a href="{{ route('users.show_all_data', [...request()->query(), 'user_id' => ($user->id)]) }}" class=" text-blue-700" >    
                                    {{ $user->phone_code }} {{ $user->phone_number }}
                                </a>
                            </td>
                            <td class="whitespace-nowrap px-6 py-4">{{ $user->first_name }}</td>
                            <td class="whitespace-nowrap px-6 py-4">{{ $user->surname }}</td>
                            <td class="whitespace-nowrap px-6 py-4">{{ $user->year_of_birth }}</td>
                            <td class="whitespace-nowrap px-6 py-4">{{ $user->school_name }}</td>
                            <td class="whitespace-nowrap px-6 py-4">{{ $user->city }}</td>
                            <td class="whitespace-nowrap px-6 py-4">{{ $user->gender }}</td>
                            <td class="whitespace-nowrap px-6 py-4">{{ $user->grade }}</td>
                            <td class="whitespace-nowrap px-6 py-4">{{ $user->field_of_interest }}</td>
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
                        <td class="whitespace-nowrap px-6 py-4"></td>
                        <td class="whitespace-nowrap px-6 py-4"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="p-2">
            {{ $users->links() }}
        </div>
    </div>


    <div class="flex flex-col gap-2 max-w-[50%]">
    
        <div class="sm:col-span-6 flex flex-col col-span-full bg-white shadow-lg border border-gray-200 max-h-[400px] w-full">
            <header class="px-5 py-4 border-b border-gray-100 flex items-center justify-between">
                <h2 class="font-semibold text-gray-800"> QUESTIONS </h2>
               
            </header>
            <div class="flex-grow overflow-auto">
                <table class="min-w-full text-left text-sm font-light mt-4">
                    <thead class="border-b font-medium dark:border-neutral-500">
                        <tr>
                            <th scope="col" class="px-6">#</th>
                            <th scope="col" class="px-2 w-3/4">Question</th>
                            <th scope="col" class="px-2">File Sort</th>
                            <th scope="col" class="px-2">File Name</th>
                            <th scope="col" class="px-2">Abused</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach($questions as $question)
                        <tr class="border-b dark:border-neutral-500">
                            <td class="whitespace-nowrap px-6 py-4 font-medium">{{$i}}</td>
                            
                            <td class="whitespace-nowrap px-2 py-4 w-3/4 text-wrap">
                                <a href="{{ route('users.show_all_data', [...request()->query(), 'question_id' => ($question->id)]) }}" class="text-blue-700" >    
                                {{ $question->question }}
                                </a>
                            </td>
                            <td class="whitespace-nowrap px-2 py-4">{{ $question->file_sort }}</td>
                            <td class="whitespace-nowrap px-2 py-4">
                                <a target="_blank" href="{{Storage::url($question->file_path)}}" class="text-blue-500">
                                    {{ $question->file_name }}
                                </a>
                            </td>
                            <td class="whitespace-nowrap px-2 py-4 text-center flex flex-col justify-center items-center ">
                                @if($question->is_abused === "1")
                                
                                <button
                                    type="button"
                                    class="inline-block rounded-full bg-primary p-2 uppercase leading-normal text-red-500 shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                                    data-te-toggle="modal"
                                    data-te-target="#modal_question_{{$question->id}}"
                                    data-te-ripple-init
                                    data-te-ripple-color="light">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m0-10.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.75c0 5.592 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.57-.598-3.75h-.152c-3.196 0-6.1-1.25-8.25-3.286Zm0 13.036h.008v.008H12v-.008Z" />
                                    </svg>
                                </button>

                                <!-- Modal -->
                                <div
                                    data-te-modal-init
                                    class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
                                    id="modal_question_{{$question->id}}"
                                    tabindex="-1"
                                    aria-labelledby="modal_question_{{$question->id}}Label"
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

                    </tbody>
                </table>
            </div>
        </div>






        <div class="sm:col-span-6 flex flex-col col-span-full bg-white shadow-lg border border-gray-200">
            <header class="px-5 py-4 border-b border-gray-100 flex items-center justify-between">
                <h2 class="font-semibold text-gray-800"> ANSWERS </h2>
                
            </header>
            <div class="flex-grow overflow-auto">
                <table class="min-w-full text-left text-sm font-light mt-4">
                    <thead class="border-b font-medium dark:border-neutral-500">
                        <tr>
                            <th scope="col" class="px-6">#</th>
                            <th scope="col" class="px-6">Field</th>
                            <th scope="col" class="px-6 w-3/4">Answer</th>
                            <th scope="col" class="px-6">File Sort</th>
                            <th scope="col" class="px-6">File Name</th>
                            <th scope="col" class="px-6">Abused</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $i = 1; ?>
                        @foreach($answers as $answer)
                        <tr class="border-b dark:border-neutral-500">
                            <td class="whitespace-nowrap px-6 py-4 font-medium">{{$i}}</td>

                            <td class="whitespace-nowrap px-6 py-4">{{ $answer->field }}</td>
                            <td class="whitespace-nowrap px-6 py-4 w-3/4 text-wrap">
                                {{ $answer->answer }}
                            </td>
                            <td class="whitespace-nowrap px-6 py-4">{{ $answer->file_sort }}</td>
                            <td class="whitespace-nowrap px-6 py-4">
                                <a target="_blank" href="{{Storage::url($answer->file_path)}}" class="text-blue-500">
                                    {{ $answer->file_name }}
                                </a>
                            </td>
                            <td class="whitespace-nowrap px-6 py-4 text-center flex flex-col justify-center items-center ">
                                @if($answer->is_abused === "1")
                                
                                <button
                                    type="button"
                                    class="inline-block rounded-full bg-primary p-2 uppercase leading-normal text-red-500 shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                                    data-te-toggle="modal"
                                    data-te-target="#modal_answer_{{$answer->id}}"
                                    data-te-ripple-init
                                    data-te-ripple-color="light">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m0-10.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.75c0 5.592 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.57-.598-3.75h-.152c-3.196 0-6.1-1.25-8.25-3.286Zm0 13.036h.008v.008H12v-.008Z" />
                                    </svg>
                                </button>

                                <!-- Modal -->
                                <div
                                    data-te-modal-init
                                    class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
                                    id="modal_answer_{{$answer->id}}"
                                    tabindex="-1"
                                    aria-labelledby="modal_answer_{{$answer->id}}Label"
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
                                                        <p class="text-sm text-gray-500 text-pretty">Are you sure you want to release abused answer?</p>
                                                    </div>
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                                <a type="button" href="{{ route('answers.release_abuse', "id=".$answer->id) }}" class="inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto">Confirm</a>
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
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')

@endsection
