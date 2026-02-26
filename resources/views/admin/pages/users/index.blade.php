@extends('admin.layouts.master')
@section('style')
<link href="https://cdnjs.cloudflare.com/ajax/libs/inter-ui/3.19.3/inter.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ol@v7.4.0/ol.css">

@endsection
@section('content')

<div>
    <div class="sm:col-span-6 flex flex-col col-span-full bg-white shadow-lg border border-gray-200">
        <header class="px-5 py-4 border-b border-gray-100 flex items-center justify-between">
            <h2 class="font-semibold text-gray-800"> User Management </h2>
            
            <a
                type="button"
                href="{{ route('users.excel') }}"
                class="flex items-center px-4 py-2 bg-indigo-400 hover:bg-indigo-500 text-white text-sm font-medium rounded-md">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                </svg>
                  
                  
                {{__('Excel')}}
            </a>

        </header>
        <div class="flex-grow overflow-auto">
            <table class="min-w-full text-left text-sm font-light mt-4">
                <thead class="border-b font-medium dark:border-neutral-500">
                    <tr>
                        <th scope="col" class="px-6">#</th>
                        <th scope="col" class="px-6">Action</th>
                        <th scope="col" class="px-6">Phone Number</th>
                        <th scope="col" class="px-6">Email</th>
                        <th scope="col" class="px-6">First Name</th>
                        <th scope="col" class="px-6">Surname</th>
                        <th scope="col" class="px-6">Year Of Birth</th>
                        <th scope="col" class="px-6">School Name</th>
                        <th scope="col" class="px-6">City</th>
                        <th scope="col" class="px-6">Gender</th>
                        <th scope="col" class="px-6">Grade</th>
                        <th scope="col" class="px-6">Field Of Interest</th>
                        <th scope="col" class="px-6"> Counts </th>
                    </tr>
                </thead>
                <tbody>
                    <form action="{{ route('users.index') }}" method="GET">
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
                                    <input type="text" name="phone_number" id="phone_number" value="{{ request('phone_number') }}" class="block w-full rounded-md border-0 py-1.5 pl-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Phone Number">
                                </div>
                            </td>
                            <td class="whitespace-nowrap px-2 py-4">
                                <div class="relative mt-2 rounded-md shadow-sm">
                                    <input type="text" name="email" id="email" value="{{ request('email') }}" class="block w-full rounded-md border-0 py-1.5 pl-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Email">
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
                            <div class="d-flex">
                                <a rel="tooltip" title="Show Questions" class="inline-block items-center px-3 py-1.5 bg-indigo-400 hover:bg-indigo-500 text-white text-sm font-medium rounded-md mb_-9"
                                    href="{{ route('users.questions', "id=".$user->id) }}" >
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 5.25h.008v.008H12v-.008Z" />
                                    </svg>
                                </a>
                                <a rel="tooltip" title="Show Answers" class="inline-block items-center px-3 py-1.5 bg-indigo-400 hover:bg-indigo-500 text-white text-sm font-medium rounded-md mb_-9"
                                    href="{{ route('users.answers', "id=".$user->id) }}" >
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75a1.875 1.875 0 0 1 0 3.75H5.625a1.875 1.875 0 0 1 0-3.75Z" />
                                    </svg>
                                      
                                </a>
                                <button data-te-toggle="modal"
                                data-te-target="#delete_modal_{{$user->id}}"
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
                                    id="delete_modal_{{$user->id}}"
                                    tabindex="-1"
                                    aria-labelledby="delete_modal_{{$user->id}}Label"
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
                                                    <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title"> Delete User </h3>
                                                    <div class="mt-2">
                                                        <p class="text-sm text-gray-500 text-pretty">Are you sure you want to delete user?</p>
                                                    </div>
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                                
                                                    <form action="{{route('users.destroy', $user->id)}}" method="POST" class="inline-block">
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
                            </div>
                        </td>
                        <td class="whitespace-nowrap px-6 py-4">{{ $user->phone_code }} {{ $user->phone_number }}</td>
                        <td class="whitespace-nowrap px-6 py-4">{{ $user->email }}</td>
                        <td class="whitespace-nowrap px-6 py-4">{{ $user->first_name }}</td>
                        <td class="whitespace-nowrap px-6 py-4">{{ $user->surname }}</td>
                        <td class="whitespace-nowrap px-6 py-4">{{ $user->year_of_birth }}</td>
                        <td class="whitespace-nowrap px-6 py-4">{{ $user->school_name }}</td>
                        <td class="whitespace-nowrap px-6 py-4">{{ $user->city }}</td>
                        <td class="whitespace-nowrap px-6 py-4">{{ $user->gender }}</td>
                        <td class="whitespace-nowrap px-6 py-4">{{ $user->grade }}</td>
                        <td class="whitespace-nowrap px-6 py-4">{{ $user->field_of_interest }}</td>
                        <td class="whitespace-nowrap px-6 py-4">
                            Questions: {{ $user->questions ? count($user->questions) : 0 }}
                            <br/>
                            Answers: {{ $user->answers ? count($user->answers) : 0 }}
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
</div>

@endsection

@section('script')

@endsection
