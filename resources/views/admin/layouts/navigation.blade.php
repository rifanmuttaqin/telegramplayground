<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-14">
            <div class="flex items-center">
                <x-button id="sidebarBtn" type="button" class="hidden md:flex btn-xs 2xl:btn-sm">
                    <i class="fa-solid fa-bars"></i>
                </x-button>
                <x-button id="sidebarBtnMobile" type="button" class="flex md:hidden btn-sm"><i
                        class="fa-solid fa-chart-bar"></i>
                </x-button>

            </div>

            <div class="flex items-center justify-center gap-x-2 ml-2">
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('admin.dashboard') }}">
                        <x-application-logo class="w-5" />
                    </a>
                </div>
                <div class="shrink-0 flex items-center">
                    <h3 class="block text-xs 2xl:text-sm text-primary">Personal Beauty</h3>
                </div>
            </div>
            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <div x-data="{ dropdownOpen: false }" class="relative my-32">
                    <button @click="dropdownOpen = !dropdownOpen"
                        class="relative z-10 block rounded-md bg-white p-2 focus:outline-none">
                        <svg class="h-5 w-5 text-gray-800" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path
                                d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z" />
                        </svg>
                    </button>

                    <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10">
                    </div>

                    <div x-show="dropdownOpen"
                        class="absolute right-0 mt-2 bg-white rounded-md shadow-lg overflow-hidden z-20 border"
                        style="width:20rem;">
                        <div class="py-2">
                            @if ($navNotifications->count() == 0)
                                <div class="flex items-center px-4 py-3 border-b hover:bg-gray-100 -mx-2">
                                    <p class="text-gray-600 text-sm mx-2">
                                        Belum ada notifikasi
                                    </p>
                                </div>
                            @else
                                @foreach ($navNotifications as $notif)
                                    <a href="#"
                                        class="flex items-center px-4 py-3 border-b hover:bg-gray-100 -mx-2">
                                        <p class="text-gray-600 text-sm mx-2">
                                            {{ json_decode($notif->data)->line_1 }} | <span
                                                class="text-primary">{{ \Carbon\Carbon::parse($notif->created_at)->diffForHumans() }}</span>
                                        </p>
                                    </a>
                                @endforeach
                            @endif
                        </div>
                        <a href="{{ route('admin.notifications.index') }}"
                            class="block bg-gray-800 text-white text-center font-bold py-2">Lihat Semua</a>
                    </div>
                </div>
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="flex items-center text-xs 2xl:text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            <div>{{ Auth::user()->fullname }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('admin.user.profile.index')">
                            {{ __('Profil') }}
                        </x-dropdown-link>
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Keluar') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('admin.time-entries.attendance')" :active="request()->routeIs('admin.time-entries.attendance')">
                {{ __('Absen') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <a href="{{ route('admin.user.profile.index') }}">
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->fullname }}</div>
                    <div class="font-medium text-xs 2xl:text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </a>

            <div class="mt-3 space-y-1">
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>

@push('js-internal')
    <script>
        $(function() {
            $('#sidebarBtn').on('click', function() {
                $('#sidebarContainer').toggle('slow')
            })

            $('#sidebarBtnMobile').on('click', function() {
                $('#sidebarContainer').addClass('absolute z-50 w-1/2')
                $('#sidebarBtnMobile').toggleClass('ml-52')
                $('#sidebarContainer').toggle()
            })
        })
    </script>
@endpush
