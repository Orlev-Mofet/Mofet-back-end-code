<nav id="sidenav-1" class="fixed left-0 top-0 z-[1035] h-screen w-60 -translate-x-full overflow-hidden bg-white shadow-[0_4px_12px_0_rgba(0,0,0,0.07),_0_2px_4px_rgba(0,0,0,0.05)] dark:bg-zinc-800 xl:data-[te-sidenav-hidden='false']:translate-x-0 sidenav-primary group/ps [overflow-anchor:none] [overflow-style:none] touch-none" data-te-sidenav-init="" data-te-sidenav-hidden="false" data-te-sidenav-mode-breakpoint-over="0" data-te-sidenav-mode-breakpoint-side="xl" data-te-sidenav-content="#content" data-te-sidenav-accordion="true" style="width: 240px; height: 100vh; position: fixed; transition: all 0.3s linear 0s;">
    <a class="mb-3 flex items-center justify-center py-6 outline-none" href="{{route('admin-dashboard')}}" data-te-ripple-init="" data-te-ripple-color="primary">
      <img id="te-logo" class="logo-size" src="{{asset('assets/image/logo.png')}}" alt="TE Logo" draggable="false">
    </a>

    <ul class="relative m-0 list-none px-[0.2rem]" data-te-sidenav-menu-ref="">
      <li class="relative">
        <a class=" group h-12 cursor-pointer items-center truncate rounded-[5px] px-6 py-4 text-[0.875rem] text-gray-700 outline-none transition duration-300 ease-linear hover:bg-blue-400/10 hover:text-blue-600 hover:outline-none focus:bg-blue-400/10 focus:text-blue-600 focus:outline-none active:bg-blue-400/10 active:text-blue-600 active:outline-none data-[te-sidenav-state-active]:text-blue-600 data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10 relative overflow-hidden flex align-bottom" href="{{route('admin-dashboard')}}" data-te-sidenav-link-ref="">
          <span class="mr-4 [&amp;>svg]:h-3.5 [&amp;>svg]:w-3.5 [&amp;>svg]:fill-gray-700 [&amp;>svg]:transition [&amp;>svg]:duration-300 [&amp;>svg]:ease-linear group-hover:[&amp;>svg]:fill-blue-600 group-focus:[&amp;>svg]:fill-blue-600 group-active:[&amp;>svg]:fill-blue-600 group-[te-sidenav-state-active]:[&amp;>svg]:fill-blue-600 motion-reduce:[&amp;>svg]:transition-none dark:[&amp;>svg]:fill-gray-300 dark:group-hover:[&amp;>svg]:fill-gray-300 ">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-6 w-6">
              <path fill-rule="evenodd" d="M2.25 2.25a.75.75 0 000 1.5H3v10.5a3 3 0 003 3h1.21l-1.172 3.513a.75.75 0 001.424.474l.329-.987h8.418l.33.987a.75.75 0 001.422-.474l-1.17-3.513H18a3 3 0 003-3V3.75h.75a.75.75 0 000-1.5H2.25zm6.04 16.5l.5-1.5h6.42l.5 1.5H8.29zm7.46-12a.75.75 0 00-1.5 0v6a.75.75 0 001.5 0v-6zm-3 2.25a.75.75 0 00-1.5 0v3.75a.75.75 0 001.5 0V9zm-3 2.25a.75.75 0 00-1.5 0v1.5a.75.75 0 001.5 0v-1.5z" clip-rule="evenodd"></path>
            </svg>
          </span>
          <span>{{ __('Dashboard') }}</span>
        </a>
      </li>
      <li class="relative">
        <a class="{{ request()->is('admin/language*') ? 'sidebar-item-active' : '' }} group h-12 cursor-pointer items-center truncate rounded-[5px] px-6 py-4 text-[0.875rem] text-gray-700 outline-none transition duration-300 ease-linear hover:bg-blue-400/10 hover:text-blue-600 hover:outline-none focus:bg-blue-400/10 focus:text-blue-600 focus:outline-none active:bg-blue-400/10 active:text-blue-600 active:outline-none data-[te-sidenav-state-active]:text-blue-600 data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10 relative overflow-hidden flex align-bottom" href="{{route('language.index')}}" data-te-sidenav-link-ref="">
          <span class="mr-4 [&amp;>svg]:h-3.5 [&amp;>svg]:w-3.5 [&amp;>svg]:fill-gray-700 [&amp;>svg]:transition [&amp;>svg]:duration-300 [&amp;>svg]:ease-linear group-hover:[&amp;>svg]:fill-blue-600 group-focus:[&amp;>svg]:fill-blue-600 group-active:[&amp;>svg]:fill-blue-600 group-[te-sidenav-state-active]:[&amp;>svg]:fill-blue-600 motion-reduce:[&amp;>svg]:transition-none dark:[&amp;>svg]:fill-gray-300 dark:group-hover:[&amp;>svg]:fill-gray-300 ">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="m10.5 21 5.25-11.25L21 21m-9-3h7.5M3 5.621a48.474 48.474 0 0 1 6-.371m0 0c1.12 0 2.233.038 3.334.114M9 5.25V3m3.334 2.364C11.176 10.658 7.69 15.08 3 17.502m9.334-12.138c.896.061 1.785.147 2.666.257m-4.589 8.495a18.023 18.023 0 0 1-3.827-5.802" />
            </svg>
          </span>
          <span>{{ __('Language') }}</span>
        </a>
      </li>
      <li class="relative">
        <a class="{{ !request()->is('admin/users/show_all_data') && request()->is('admin/users*') ? 'sidebar-item-active' : '' }} group h-12 cursor-pointer items-center truncate rounded-[5px] px-6 py-4 text-[0.875rem] text-gray-700 outline-none transition duration-300 ease-linear hover:bg-blue-400/10 hover:text-blue-600 hover:outline-none focus:bg-blue-400/10 focus:text-blue-600 focus:outline-none active:bg-blue-400/10 active:text-blue-600 active:outline-none data-[te-sidenav-state-active]:text-blue-600 data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10 relative overflow-hidden flex align-bottom" href="{{route('users.index')}}" data-te-sidenav-link-ref="">
          <span class="mr-4 [&amp;>svg]:h-3.5 [&amp;>svg]:w-3.5 [&amp;>svg]:fill-gray-700 [&amp;>svg]:transition [&amp;>svg]:duration-300 [&amp;>svg]:ease-linear group-hover:[&amp;>svg]:fill-blue-600 group-focus:[&amp;>svg]:fill-blue-600 group-active:[&amp;>svg]:fill-blue-600 group-[te-sidenav-state-active]:[&amp;>svg]:fill-blue-600 motion-reduce:[&amp;>svg]:transition-none dark:[&amp;>svg]:fill-gray-300 dark:group-hover:[&amp;>svg]:fill-gray-300 ">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
            </svg>
          </span>
          <span>{{ __('User Management') }}</span>
        </a>
      </li>
      @if( Auth::guard('admin')->user()->role === "super_admin" )
      <li class="relative">
        <a class="{{ request()->is('admin/admins*') ? 'sidebar-item-active' : '' }} group h-12 cursor-pointer items-center truncate rounded-[5px] px-6 py-4 text-[0.875rem] text-gray-700 outline-none transition duration-300 ease-linear hover:bg-blue-400/10 hover:text-blue-600 hover:outline-none focus:bg-blue-400/10 focus:text-blue-600 focus:outline-none active:bg-blue-400/10 active:text-blue-600 active:outline-none data-[te-sidenav-state-active]:text-blue-600 data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10 relative overflow-hidden flex align-bottom" href="{{route('admins.index')}}" data-te-sidenav-link-ref="">
          <span class="mr-4 [&amp;>svg]:h-3.5 [&amp;>svg]:w-3.5 [&amp;>svg]:fill-gray-700 [&amp;>svg]:transition [&amp;>svg]:duration-300 [&amp;>svg]:ease-linear group-hover:[&amp;>svg]:fill-blue-600 group-focus:[&amp;>svg]:fill-blue-600 group-active:[&amp;>svg]:fill-blue-600 group-[te-sidenav-state-active]:[&amp;>svg]:fill-blue-600 motion-reduce:[&amp;>svg]:transition-none dark:[&amp;>svg]:fill-gray-300 dark:group-hover:[&amp;>svg]:fill-gray-300 ">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
            </svg>
          </span>
          <span>{{ __('Admin Management') }}</span>
        </a>
      </li>
      <li class="relative">
        <a class="{{ request()->is('admin/questions*') ? 'sidebar-item-active' : '' }} group h-12 cursor-pointer items-center truncate rounded-[5px] px-6 py-4 text-[0.875rem] text-gray-700 outline-none transition duration-300 ease-linear hover:bg-blue-400/10 hover:text-blue-600 hover:outline-none focus:bg-blue-400/10 focus:text-blue-600 focus:outline-none active:bg-blue-400/10 active:text-blue-600 active:outline-none data-[te-sidenav-state-active]:text-blue-600 data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10 relative overflow-hidden flex align-bottom" href="{{route('questions.index')}}" data-te-sidenav-link-ref="">
          <span class="mr-4 [&amp;>svg]:h-3.5 [&amp;>svg]:w-3.5 [&amp;>svg]:fill-gray-700 [&amp;>svg]:transition [&amp;>svg]:duration-300 [&amp;>svg]:ease-linear group-hover:[&amp;>svg]:fill-blue-600 group-focus:[&amp;>svg]:fill-blue-600 group-active:[&amp;>svg]:fill-blue-600 group-[te-sidenav-state-active]:[&amp;>svg]:fill-blue-600 motion-reduce:[&amp;>svg]:transition-none dark:[&amp;>svg]:fill-gray-300 dark:group-hover:[&amp;>svg]:fill-gray-300 ">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75a1.875 1.875 0 0 1 0 3.75H5.625a1.875 1.875 0 0 1 0-3.75Z" />
            </svg>
          </span>
          <span>{{ __('Question Management') }}</span>
        </a>
      </li>
      <li class="relative">
        <a class="{{ request()->is('admin/users/show_all_data') ? 'sidebar-item-active' : '' }} group h-12 cursor-pointer items-center truncate rounded-[5px] px-6 py-4 text-[0.875rem] text-gray-700 outline-none transition duration-300 ease-linear hover:bg-blue-400/10 hover:text-blue-600 hover:outline-none focus:bg-blue-400/10 focus:text-blue-600 focus:outline-none active:bg-blue-400/10 active:text-blue-600 active:outline-none data-[te-sidenav-state-active]:text-blue-600 data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10 relative overflow-hidden flex align-bottom" href="{{route('users.show_all_data')}}" data-te-sidenav-link-ref="">
          <span class="mr-4 [&amp;>svg]:h-3.5 [&amp;>svg]:w-3.5 [&amp;>svg]:fill-gray-700 [&amp;>svg]:transition [&amp;>svg]:duration-300 [&amp;>svg]:ease-linear group-hover:[&amp;>svg]:fill-blue-600 group-focus:[&amp;>svg]:fill-blue-600 group-active:[&amp;>svg]:fill-blue-600 group-[te-sidenav-state-active]:[&amp;>svg]:fill-blue-600 motion-reduce:[&amp;>svg]:transition-none dark:[&amp;>svg]:fill-gray-300 dark:group-hover:[&amp;>svg]:fill-gray-300 ">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75a1.875 1.875 0 0 1 0 3.75H5.625a1.875 1.875 0 0 1 0-3.75Z" />
            </svg>
          </span>
          <span>{{ __('Show All Data') }}</span>
        </a>
      </li>
      @endif
      <li class="relative">
        <a class="{{ request()->is('admin/admin_notification*') ? 'sidebar-item-active' : '' }} group h-12 cursor-pointer items-center truncate rounded-[5px] px-6 py-4 text-[0.875rem] text-gray-700 outline-none transition duration-300 ease-linear hover:bg-blue-400/10 hover:text-blue-600 hover:outline-none focus:bg-blue-400/10 focus:text-blue-600 focus:outline-none active:bg-blue-400/10 active:text-blue-600 active:outline-none data-[te-sidenav-state-active]:text-blue-600 data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10 relative overflow-hidden flex align-bottom" href="{{route('admin_notification.index')}}" data-te-sidenav-link-ref="">
          <span class="mr-4 [&amp;>svg]:h-3.5 [&amp;>svg]:w-3.5 [&amp;>svg]:fill-gray-700 [&amp;>svg]:transition [&amp;>svg]:duration-300 [&amp;>svg]:ease-linear group-hover:[&amp;>svg]:fill-blue-600 group-focus:[&amp;>svg]:fill-blue-600 group-active:[&amp;>svg]:fill-blue-600 group-[te-sidenav-state-active]:[&amp;>svg]:fill-blue-600 motion-reduce:[&amp;>svg]:transition-none dark:[&amp;>svg]:fill-gray-300 dark:group-hover:[&amp;>svg]:fill-gray-300 ">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0M3.124 7.5A8.969 8.969 0 0 1 5.292 3m13.416 0a8.969 8.969 0 0 1 2.168 4.5" />
            </svg>
          </span>
          <span>{{ __('Send Notification') }}</span>
        </a>
      </li>
      @if( Auth::guard('admin')->user()->role === "super_admin" )

      <li class="relative">
        <a class="{{ request()->is('admin/contact_us*') ? 'sidebar-item-active' : '' }} group h-12 cursor-pointer items-center truncate rounded-[5px] px-6 py-4 text-[0.875rem] text-gray-700 outline-none transition duration-300 ease-linear hover:bg-blue-400/10 hover:text-blue-600 hover:outline-none focus:bg-blue-400/10 focus:text-blue-600 focus:outline-none active:bg-blue-400/10 active:text-blue-600 active:outline-none data-[te-sidenav-state-active]:text-blue-600 data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10 relative overflow-hidden flex align-bottom" href="{{route('contact_us.index')}}" data-te-sidenav-link-ref="">
          <span class="mr-4 [&amp;>svg]:h-3.5 [&amp;>svg]:w-3.5 [&amp;>svg]:fill-gray-700 [&amp;>svg]:transition [&amp;>svg]:duration-300 [&amp;>svg]:ease-linear group-hover:[&amp;>svg]:fill-blue-600 group-focus:[&amp;>svg]:fill-blue-600 group-active:[&amp;>svg]:fill-blue-600 group-[te-sidenav-state-active]:[&amp;>svg]:fill-blue-600 motion-reduce:[&amp;>svg]:transition-none dark:[&amp;>svg]:fill-gray-300 dark:group-hover:[&amp;>svg]:fill-gray-300 ">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 8.511c.884.284 1.5 1.128 1.5 2.097v4.286c0 1.136-.847 2.1-1.98 2.193-.34.027-.68.052-1.02.072v3.091l-3-3c-1.354 0-2.694-.055-4.02-.163a2.115 2.115 0 0 1-.825-.242m9.345-8.334a2.126 2.126 0 0 0-.476-.095 48.64 48.64 0 0 0-8.048 0c-1.131.094-1.976 1.057-1.976 2.192v4.286c0 .837.46 1.58 1.155 1.951m9.345-8.334V6.637c0-1.621-1.152-3.026-2.76-3.235A48.455 48.455 0 0 0 11.25 3c-2.115 0-4.198.137-6.24.402-1.608.209-2.76 1.614-2.76 3.235v6.226c0 1.621 1.152 3.026 2.76 3.235.577.075 1.157.14 1.74.194V21l4.155-4.155" />
            </svg>
          </span>
          <span>{{ __('Contact Us') }}</span>
        </a>
      </li>
      <li class="relative">
        <a class="{{ request()->is('admin/constant*') ? 'sidebar-item-active' : '' }} group h-12 cursor-pointer items-center truncate rounded-[5px] px-6 py-4 text-[0.875rem] text-gray-700 outline-none transition duration-300 ease-linear hover:bg-blue-400/10 hover:text-blue-600 hover:outline-none focus:bg-blue-400/10 focus:text-blue-600 focus:outline-none active:bg-blue-400/10 active:text-blue-600 active:outline-none data-[te-sidenav-state-active]:text-blue-600 data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10 relative overflow-hidden flex align-bottom" href="{{route('constant.index')}}" data-te-sidenav-link-ref="">
          <span class="mr-4 [&amp;>svg]:h-3.5 [&amp;>svg]:w-3.5 [&amp;>svg]:fill-gray-700 [&amp;>svg]:transition [&amp;>svg]:duration-300 [&amp;>svg]:ease-linear group-hover:[&amp;>svg]:fill-blue-600 group-focus:[&amp;>svg]:fill-blue-600 group-active:[&amp;>svg]:fill-blue-600 group-[te-sidenav-state-active]:[&amp;>svg]:fill-blue-600 motion-reduce:[&amp;>svg]:transition-none dark:[&amp;>svg]:fill-gray-300 dark:group-hover:[&amp;>svg]:fill-gray-300 ">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M14.25 6.087c0-.355.186-.676.401-.959.221-.29.349-.634.349-1.003 0-1.036-1.007-1.875-2.25-1.875s-2.25.84-2.25 1.875c0 .369.128.713.349 1.003.215.283.401.604.401.959v0a.64.64 0 0 1-.657.643 48.39 48.39 0 0 1-4.163-.3c.186 1.613.293 3.25.315 4.907a.656.656 0 0 1-.658.663v0c-.355 0-.676-.186-.959-.401a1.647 1.647 0 0 0-1.003-.349c-1.036 0-1.875 1.007-1.875 2.25s.84 2.25 1.875 2.25c.369 0 .713-.128 1.003-.349.283-.215.604-.401.959-.401v0c.31 0 .555.26.532.57a48.039 48.039 0 0 1-.642 5.056c1.518.19 3.058.309 4.616.354a.64.64 0 0 0 .657-.643v0c0-.355-.186-.676-.401-.959a1.647 1.647 0 0 1-.349-1.003c0-1.035 1.008-1.875 2.25-1.875 1.243 0 2.25.84 2.25 1.875 0 .369-.128.713-.349 1.003-.215.283-.4.604-.4.959v0c0 .333.277.599.61.58a48.1 48.1 0 0 0 5.427-.63 48.05 48.05 0 0 0 .582-4.717.532.532 0 0 0-.533-.57v0c-.355 0-.676.186-.959.401-.29.221-.634.349-1.003.349-1.035 0-1.875-1.007-1.875-2.25s.84-2.25 1.875-2.25c.37 0 .713.128 1.003.349.283.215.604.401.96.401v0a.656.656 0 0 0 .658-.663 48.422 48.422 0 0 0-.37-5.36c-1.886.342-3.81.574-5.766.689a.578.578 0 0 1-.61-.58v0Z" />
            </svg>
          </span>
          <span>{{ __('Setting') }}</span>
        </a>
      </li>
      <li class="relative">
        <a class="group h-12 cursor-pointer items-center truncate rounded-[5px] px-6 py-4 text-[0.875rem] text-gray-700 outline-none transition duration-300 ease-linear hover:bg-blue-400/10 hover:text-blue-600 hover:outline-none focus:bg-blue-400/10 focus:text-blue-600 focus:outline-none active:bg-blue-400/10 active:text-blue-600 active:outline-none data-[te-sidenav-state-active]:text-blue-600 data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10 relative overflow-hidden flex align-bottom" href="{{route('database.backup')}}" data-te-sidenav-link-ref="">
          <span class="mr-4 [&amp;>svg]:h-3.5 [&amp;>svg]:w-3.5 [&amp;>svg]:fill-gray-700 [&amp;>svg]:transition [&amp;>svg]:duration-300 [&amp;>svg]:ease-linear group-hover:[&amp;>svg]:fill-blue-600 group-focus:[&amp;>svg]:fill-blue-600 group-active:[&amp;>svg]:fill-blue-600 group-[te-sidenav-state-active]:[&amp;>svg]:fill-blue-600 motion-reduce:[&amp;>svg]:transition-none dark:[&amp;>svg]:fill-gray-300 dark:group-hover:[&amp;>svg]:fill-gray-300 ">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 9.75v6.75m0 0-3-3m3 3 3-3m-8.25 6a4.5 4.5 0 0 1-1.41-8.775 5.25 5.25 0 0 1 10.233-2.33 3 3 0 0 1 3.758 3.848A3.752 3.752 0 0 1 18 19.5H6.75Z" />
            </svg>
          </span>
          <span>{{ __('Backup DB') }}</span>
        </a>
      </li>
      <li class="relative">
        <form id="uploadForm" action="{{ route('database.restore') }}" method="POST" enctype="multipart/form-data">
          @csrf  
          <input type="file" name="sql_file" id="database_file" class="hidden">
          <a class="group h-12 cursor-pointer items-center truncate rounded-[5px] px-6 py-4 text-[0.875rem] text-gray-700 outline-none transition duration-300 ease-linear hover:bg-blue-400/10 hover:text-blue-600 hover:outline-none focus:bg-blue-400/10 focus:text-blue-600 focus:outline-none active:bg-blue-400/10 active:text-blue-600 active:outline-none data-[te-sidenav-state-active]:text-blue-600 data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10 relative overflow-hidden flex align-bottom" id="restore_database" data-te-sidenav-link-ref="">
            <span class="mr-4 [&amp;>svg]:h-3.5 [&amp;>svg]:w-3.5 [&amp;>svg]:fill-gray-700 [&amp;>svg]:transition [&amp;>svg]:duration-300 [&amp;>svg]:ease-linear group-hover:[&amp;>svg]:fill-blue-600 group-focus:[&amp;>svg]:fill-blue-600 group-active:[&amp;>svg]:fill-blue-600 group-[te-sidenav-state-active]:[&amp;>svg]:fill-blue-600 motion-reduce:[&amp;>svg]:transition-none dark:[&amp;>svg]:fill-gray-300 dark:group-hover:[&amp;>svg]:fill-gray-300 ">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 16.5V9.75m0 0 3 3m-3-3-3 3M6.75 19.5a4.5 4.5 0 0 1-1.41-8.775 5.25 5.25 0 0 1 10.233-2.33 3 3 0 0 1 3.758 3.848A3.752 3.752 0 0 1 18 19.5H6.75Z" />
              </svg>
            </span>
            <span>{{ __('Restore DB') }}</span>
          </a>
          @error('sql_file')
              <label class="block text-sm font-medium leading-6 text-red-700">{{ $message }}</label>
          @enderror
        </form>
      </li>
      <li class="relative">
        <a class="group h-12 cursor-pointer items-center truncate rounded-[5px] px-6 py-4 text-[0.875rem] text-gray-700 outline-none transition duration-300 ease-linear hover:bg-blue-400/10 hover:text-blue-600 hover:outline-none focus:bg-blue-400/10 focus:text-blue-600 focus:outline-none active:bg-blue-400/10 active:text-blue-600 active:outline-none data-[te-sidenav-state-active]:text-blue-600 data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10 relative overflow-hidden flex align-bottom" href="{{route('database.backup_all')}}" data-te-sidenav-link-ref="">
          <span class="mr-4 [&amp;>svg]:h-3.5 [&amp;>svg]:w-3.5 [&amp;>svg]:fill-gray-700 [&amp;>svg]:transition [&amp;>svg]:duration-300 [&amp;>svg]:ease-linear group-hover:[&amp;>svg]:fill-blue-600 group-focus:[&amp;>svg]:fill-blue-600 group-active:[&amp;>svg]:fill-blue-600 group-[te-sidenav-state-active]:[&amp;>svg]:fill-blue-600 motion-reduce:[&amp;>svg]:transition-none dark:[&amp;>svg]:fill-gray-300 dark:group-hover:[&amp;>svg]:fill-gray-300 ">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 9.75v6.75m0 0-3-3m3 3 3-3m-8.25 6a4.5 4.5 0 0 1-1.41-8.775 5.25 5.25 0 0 1 10.233-2.33 3 3 0 0 1 3.758 3.848A3.752 3.752 0 0 1 18 19.5H6.75Z" />
            </svg>
          </span>
          <span>{{ __('Backup All') }}</span>
        </a>
      </li>
      @endif
    </ul>
  <div class="group/x absolute bottom-0 !top-auto h-[15px] hidden opacity-0 [transition:background-color_.2s_linear,_opacity_.2s_linear] motion-reduce:transition-none group-[&amp;.ps--active-x]/ps:block group-[&amp;.ps--active-x]/ps:bg-transparent group-hover/ps:opacity-60 group-focus/ps:opacity-60 group-[&amp;.ps--scrolling-x]/ps:opacity-60 hover:!opacity-90 hover:bg-[#eee] focus:!opacity-90 focus:bg-[#eee] [&amp;.ps--clicking]:!opacity-90 [&amp;.ps--clicking]:bg-[#eee] outline-none" style="left: 0px; bottom: 0px;"><div class="absolute bottom-[2px] rounded-md h-1.5 opacity-0 group-hover/ps:opacity-100 group-focus/ps:opacity-100 group-active/ps:opacity-100 bg-[#aaa] [transition:background-color_.2s_linear,_height_.2s_ease-in-out] group-hover/x:bg-[#999] group-hover/x:h-[11px] group-focus/x:bg-[#999] group-focus/x:h-[11px] group-[&amp;.ps--clicking]/x:bg-[#999] group-[&amp;.ps--clicking]/x:h-[11px] outline-none" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="group/y absolute right-0 !left-auto w-[15px] hidden opacity-0 [transition:background-color_.2s_linear,_opacity_.2s_linear] motion-reduce:transition-none group-[&amp;.ps--active-y]/ps:block group-[&amp;.ps--active-y]/ps:bg-transparent group-hover/ps:opacity-60 group-focus/ps:opacity-60 group-[&amp;.ps--scrolling-y]/ps:opacity-60 hover:!opacity-90 hover:bg-[#eee] focus:!opacity-90 focus:bg-[#eee] [&amp;.ps--clicking]:!opacity-90 [&amp;.ps--clicking]:bg-[#eee] outline-none" style="top: 0px; right: 0px;"><div class="absolute right-[2px] rounded-md w-1.5 opacity-0 group-hover/ps:opacity-100 group-focus/ps:opacity-100 group-active/ps:opacity-100 bg-[#aaa] [transition:background-color_.2s_linear,_width_.2s_ease-in-out] group-hover/y:bg-[#999] group-hover/y:w-[11px] group-focus/y:bg-[#999] group-focus/y:w-[11px] group-[&amp;.ps--clicking]/y:bg-[#999] group-[&amp;.ps--clicking]/y:w-[11px] outline-none" tabindex="0" style="top: 0px; height: 0px;"></div></div></nav>
