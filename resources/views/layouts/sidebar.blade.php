<ul class="hidden h-screen sm:flex flex-col w-96 list-reset pl-0 mb-0 sidebar sidebar-dark accordion z-0"
    id="accordionSidebar" style="background-color: #a02929; height: 100vh; width: 14rem;">

    <!-- <li style="padding: 1.2rem 1.2rem;">
        <a class="inline-block py-1 px-4 no-underline text-base text-white" href="enrolled-courses.php">
        <span class="float-left">Dummy</span>
        </a>
    </li> -->


    <!-- Nav Item - Dashboard -->
    <li class="w-full py-2">
        <x-sidebar-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
            {{ __('Dashboard Overview') }}
        </x-sidebar-link>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    @role('student')
    <!-- Nav Item - Enrolled Courses -->
    <li class="w-full py-2 px-auto">
        <x-sidebar-link :href="route('enrolled-courses')" :active="request()->routeIs('enrolled-courses')">
            {{ __('Enrolled Courses') }}
        </x-sidebar-link>
    </li>

    <!-- Nav Item - Course Catalog-->
    <li class="w-full py-2 px-auto">
        <x-sidebar-link :href="route('course-catalog')" :active="request()->routeIs('course-catalog')">
            {{ __('Course Catalog') }}
        </x-sidebar-link>
        <!-- <svg class="float-right" xmlns="http://www.w3.org/2000/svg" height="1.2em" viewBox="0 0 512 512"><style>svg{fill:#ffffff}</style><path d="M40 48C26.7 48 16 58.7 16 72v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V72c0-13.3-10.7-24-24-24H40zM192 64c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zM16 232v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V232c0-13.3-10.7-24-24-24H40c-13.3 0-24 10.7-24 24zM40 368c-13.3 0-24 10.7-24 24v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V392c0-13.3-10.7-24-24-24H40z"/></svg> -->
    </li>

    <!-- Nav Item - View Courses -->
    <li class="w-full py-2 px-auto">
        <x-sidebar-link>
            {{ __('View Grades') }}
        </x-sidebar-link>
    </li>
    @endrole

    @role('faculty')
    <!-- Nav Item - My Courses -->
    <li class="w-full py-2 px-auto">
        <x-sidebar-link :href="route('my-courses')" :active="request()->routeIs('my-courses')">
            {{ __('My Courses') }}
        </x-sidebar-link>
    </li>
    @endrole

    @role('admin')
    <!-- Nav Item - Roles -->
    <li class="w-full py-2 px-auto">
        <x-sidebar-link :href="route('admin.roles.index')" :active="request()->routeIs('admin.roles.index')">
            {{ __('Roles') }}
        </x-sidebar-link>
    </li>

    <!-- Nav Item - Permissions -->
    <li class="w-full py-2 px-auto">
        <x-sidebar-link :href="route('admin.permissions.index')" :active="request()->routeIs('admin.permissions.index')">
            {{ __('Permissions') }}
        </x-sidebar-link>
    </li>

    <!-- Nav Item - Add-Faculty -->
    <li class="w-full py-2 px-auto">
        <x-sidebar-link :href="route('manage-faculty')" :active="request()->routeIs('manage-faculty')">
            {{ __('Manage Faculty') }}
        </x-sidebar-link>
    </li>

    <!-- Nav Item - Create-Course -->
    <li class="w-full py-2 px-auto">
        <x-sidebar-link :href="route('manage-courses')" :active="request()->routeIs('manage-courses')">
            {{ __('Manage Courses') }}
        </x-sidebar-link>
    </li>

    <!-- Nav Item - Manage-Courses -->
    <li class="w-full py-2 px-auto">
        <x-sidebar-link :href="route('manage-students')" :active="request()->routeIs('manage-students')">
            {{ __('Manage Students') }}
        </x-sidebar-link>
    </li>
    @endrole


    <!-- Divider -->
    <hr class="sidebar-divider hidden sm:block">

</ul>
<!-- End of Sidebar -->