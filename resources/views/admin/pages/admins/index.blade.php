@extends('admin.layouts.master')
@section('style')
<link href="https://cdnjs.cloudflare.com/ajax/libs/inter-ui/3.19.3/inter.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ol@v7.4.0/ol.css">

@endsection
@section('content')

<div>
    <div class="sm:col-span-6 flex flex-col col-span-full bg-white shadow-lg border border-gray-200">
        <header class="px-5 py-4 border-b border-gray-100 flex items-center justify-between">
            <h2 class="font-semibold text-gray-800"> Admin Management </h2>
            
        </header>
        <div class="flex-grow overflow-auto">
            <table class="min-w-full text-left text-sm font-light mt-4">
                <thead class="border-b font-medium dark:border-neutral-500">
                    <tr>
                        <th scope="col" class="px-6">#</th>
                        <th scope="col" class="px-6">Action</th>
                        <th scope="col" class="px-6">Name</th>
                        <th scope="col" class="px-6">Email</th>
                        <th scope="col" class="px-6">Role</th>
                        <th scope="col" class="px-6">State</th>
                    </tr>
                </thead>
                <tbody>

                    <?php $i = 1; ?>
                    @foreach($admins as $admin)
                    <tr class="border-b dark:border-neutral-500">
                        <td class="whitespace-nowrap px-6 py-4 font-medium">{{$i}}</td>
                        <td class="whitespace-nowrap px-6 py-4">
                            <div class="d-flex">
                                @if($admin->active === "1")
                                <a rel="tooltip" class="inline-block items-center px-3 py-1.5 bg-slate-400 hover:bg-slate-500 text-white text-sm font-medium rounded-md mb_-9"
                                    href="{{ route('admins.inactive', "id=".$admin->id) }}" >
                                    inactive
                                </a>
                                @elseif($admin->active === "0")
                                <a rel="tooltip" class="inline-block items-center px-3 py-1.5 bg-green-500 hover:bg-green-600 text-white text-sm font-medium rounded-md mb_-9"
                                    href="{{ route('admins.active', "id=".$admin->id) }}" >
                                    active
                                </a>
                                @endif

                                <button data-te-toggle="modal"
                                    data-te-target="#delete_modal_{{$admin->id}}"
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
                                    id="delete_modal_{{$admin->id}}"
                                    tabindex="-1"
                                    aria-labelledby="delete_modal_{{$admin->id}}Label"
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
                                                    <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title"> Delete Admin </h3>
                                                    <div class="mt-2">
                                                        <p class="text-sm text-gray-500 text-pretty">Are you sure you want to delete admin?</p>
                                                    </div>
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                                
                                                    <form action="{{route('admins.destroy', $admin->id)}}" method="POST" class="inline-block">
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
                        <td class="whitespace-nowrap px-6 py-4">{{ $admin->name }}</td>
                        <td class="whitespace-nowrap px-6 py-4">{{ $admin->email }}</td>
                        <td class="whitespace-nowrap px-6 py-4">{{ $admin->role }}</td>
                        <td class="whitespace-nowrap px-6 py-4">
                            @if($admin->active === "1")
                                Actived
                            @else 
                                Inactived
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
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="p-2">
        </div>
    </div>
</div>

@endsection

@section('script')

@endsection
