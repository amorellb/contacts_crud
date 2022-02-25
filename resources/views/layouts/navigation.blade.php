<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}">
                        <x-application-logo class="block h-10 w-auto fill-current text-gray-600"/>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                        {{ __('Home') }}
                    </x-nav-link>
                    <x-nav-link :href="route('contacts.index')" :active="request()->routeIs('contacts.*')">
                        {{ __('Contact') }}
                    </x-nav-link>
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>
            </div>

            {{--  Language selector dropdown  --}}
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <div class="pt-2 pb-3 space-y-1">
                            <div class="hidden fixed top-0 @if (Route::has('login')) @auth right-20 @else right-50 @endauth @endif px-6 py-4 sm:block">
                                <a id="navbarDropdown"
                                   class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out"
                                   href="#" role="button"
                                   data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false" v-pre>
                                    @if (app()->getLocale() === 'en'){{"🇬🇧 "}}{{ __("Language") }}@endif
                                    @if (app()->getLocale() === 'es'){{"🇪🇸 "}}{{ __("Language") }}@endif
                                    @if (app()->getLocale() === 'ca'){{"🇪🇸🤷 "}}{{ __("Language") }}@endif
                                </a>
                            </div>
                        </div>
                    </x-slot>
                    <x-slot name="content">
                        <div>
                            <x-nav-link :href="route('set_language', ['en'])">{{ __("🇬🇧") }}</x-nav-link>
                            <x-nav-link :href="route('set_language', ['es'])">{{ __("🇪🇸") }}</x-nav-link>
                            <x-nav-link :href="route('set_language', ['ca'])">{{ __("🇪🇸🤷") }}</x-nav-link>
                        </div>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <div class="pt-2 pb-3 space-y-1">
                            @if (Route::has('login'))
                                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                                    @auth
                                        <button
                                            class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                            <div>{{ Auth::user()->name }}</div>

                                            <div class="ml-1">
                                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                     viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                          clip-rule="evenodd"/>
                                                </svg>
                                            </div>
                                        </button>
                                    @else
                                        <a href="{{ route('login') }}"
                                           class="text-sm text-gray-700 dark:text-gray-500 underline hover:text-black">Log
                                            in</a>

                                        @if (Route::has('register'))
                                            <a href="{{ route('register') }}"
                                               class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline hover:text-black">Register</a>
                                        @endif
                                    @endauth
                                </div>
                            @endif
                        </div>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Authentication -->
                        @if (Route::has('login'))
                            @auth
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-dropdown-link :href="route('logout')"
                                                     onclick="event.preventDefault(); this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            @endauth
                        @endif
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"/>
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                              stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')">
                {{ __('Home') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('contacts.index')" :active="request()->routeIs('contacts.*')">
                {{ __('Contact') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        {{--  Language selector  --}}
        <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden pt-4 pb-1 border-t border-gray-200">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false" v-pre>
                {{ __("Language") }}
            </a>
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('set_language', ['en'])"
                                       :active="request()->routeIs('en')">{{ __("🇬🇧") }}</x-responsive-nav-link>
                <x-responsive-nav-link :href="route('set_language', ['es'])"
                                       :active="request()->routeIs('es')">{{ __("🇪🇸") }}</x-responsive-nav-link>
                <x-responsive-nav-link :href="route('set_language', ['ca'])"
                                       :active="request()->routeIs('*ca*')">{{ __("🇪🇸🤷") }}</x-responsive-nav-link>
            </div>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            @if (Route::has('login'))
                @auth
                    <div class="px-4">
                        <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                        <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                    </div>
                @endauth
            @endif
            <div class="mt-3 space-y-1">
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    @if (Route::has('login'))
                        @auth
                            <x-responsive-nav-link :href="route('logout')"
                                                   onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-responsive-nav-link>
                        @else
                            <x-responsive-nav-link :href="route('login')"
                                                   onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                {{ __('Log In') }}
                            </x-responsive-nav-link>
                            <x-responsive-nav-link :href="route('register')"
                                                   onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                {{ __('Register') }}
                            </x-responsive-nav-link>
                        @endauth
                    @endif
                </form>
            </div>
        </div>
    </div>
</nav>
