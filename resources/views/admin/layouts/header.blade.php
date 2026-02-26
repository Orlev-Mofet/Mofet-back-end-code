<nav id="main-navbar" class="fixed left-0 z-10 right-0 top-0 flex w-full flex-nowrap items-center justify-between bg-white py-[0.6rem] text-gray-500 shadow-lg hover:text-gray-700 focus:text-gray-700 dark:bg-zinc-700 lg:flex-wrap lg:justify-start xl:pl-60" data-te-navbar-ref="">
    <!-- Container wrapper -->
    <div class="flex w-full flex-wrap items-center justify-between px-4">
      <!-- Toggler -->
      <button data-te-sidenav-toggle-ref="" data-te-target="#sidenav-1" class="block border-0 bg-transparent px-2.5 text-gray-500 hover:no-underline hover:shadow-none focus:no-underline focus:shadow-none focus:outline-none focus:ring-0 xl:hidden" aria-controls="#sidenav-1" aria-haspopup="true">
        <span class="[&amp;>svg]:w-7">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-7 w-7">
            <path fill-rule="evenodd" d="M3 6.75A.75.75 0 013.75 6h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 6.75zM3 12a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 12zm0 5.25a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75z" clip-rule="evenodd"></path>
          </svg>
        </span>
      </button>

      <!-- Search form -->
      <form class="relative ml-4 mr-auto flex flex-wrap items-stretch xl:mx-0">
        <!-- <input autocomplete="off" type="search" class="focus:shadow-te-blue relative m-0 inline-block w-[1%] min-w-[225px] flex-auto rounded border border-solid border-gray-300 bg-transparent bg-clip-padding px-3 py-1.5 text-base font-normal text-gray-700 transition duration-300 ease-in-out focus:border-blue-600 focus:text-gray-700 focus:outline-none dark:text-gray-200 dark:placeholder:text-gray-200" placeholder="Search (ctrl + &quot;/&quot; to focus)">
        <span class="flex items-center whitespace-nowrap rounded px-3 py-1.5 text-center text-base font-normal text-gray-700 dark:text-gray-200 [&amp;>svg]:w-4" id="basic-addon2">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-6 w-6">
            <path fill-rule="evenodd" d="M10.5 3.75a6.75 6.75 0 100 13.5 6.75 6.75 0 000-13.5zM2.25 10.5a8.25 8.25 0 1114.59 5.28l4.69 4.69a.75.75 0 11-1.06 1.06l-4.69-4.69A8.25 8.25 0 012.25 10.5z" clip-rule="evenodd"></path>
          </svg>
        </span> -->
      </form>

      <!-- Right links -->
      <ul class="relative flex items-center">

        <!-- Avatar -->
        <li class="relative" data-te-dropdown-ref="">
          <a class="hidden-arrow flex items-center whitespace-nowrap transition duration-150 ease-in-out motion-reduce:transition-none" href="#" id="navbarDropdownMenuLink" role="button" data-te-dropdown-toggle-ref="" aria-expanded="true">
            <img src="https://tecdn.b-cdn.net/img/Photos/Avatars/img (31).webp" class="rounded-full" style="height: 22px; width: 22px" alt="Avatar" loading="lazy">
          </a>
          <ul class="absolute left-auto right-0 z-[1000] float-left m-0 mt-1 hidden min-w-[10rem] list-none overflow-hidden rounded-lg border-none bg-white bg-clip-padding text-left text-base shadow-lg dark:bg-zinc-700 [&amp;[data-te-dropdown-show]]:block" aria-labelledby="dropdownMenuButton2" data-te-dropdown-menu-ref="">
            {{-- <li>
              <a class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-gray-700 hover:bg-gray-100 active:text-zinc-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-gray-400 dark:text-gray-200 dark:hover:bg-white/30" data-te-dropdown-item-ref="">My profile</a>
            </li>
            <li>
              <a class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-gray-700 hover:bg-gray-100 active:text-zinc-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-gray-400 dark:text-gray-200 dark:hover:bg-white/30" data-te-dropdown-item-ref="">Settings</a>
            </li> --}}
            <li>
              <a href="{{route('admin.logout')}}" class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-gray-700 hover:bg-gray-100 active:text-zinc-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-gray-400 dark:text-gray-200 dark:hover:bg-white/30" data-te-dropdown-item-ref="">Logout</a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
    <!-- Container wrapper -->
  </nav>
