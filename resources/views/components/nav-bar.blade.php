<nav x-data="{ isOpen: false }" class="z-[1000] w-full border-b-2 bg-white h-[120px]">
    <div class="mx-auto max-w-auto px-2 sm:px-6 lg:px-8">
        <div class="relative flex h-[70px] items-center justify-between">
            <div class="flex flex-1 items-center justify-start">
                <div class="flex items-center">
                    {{-- logo --}}
                    <img class="h-[200px] w-[200px] mt-8" src="{{ asset('images/logo.png') }}">
                </div>
                <div class="flex-1 hidden sm:block">
                    <div class="flex justify-center space-x-4 p-20 font-poppins mt-20">
                        <a href="{{ route('home') }}"
                            class="rounded-md  px-3 py-2 text-xl font-semibold   hover:text-gray-900 text-gray-700 capitalize"
                            aria-current="page">home
                        </a>
                        <a href="{{ route('ourMenu') }}"
                            class="rounded-md px-3 py-2 text-xl font-semibold  hover:text-gray-900 text-gray-700 capitalize"">our
                            menu
                        </a>
                        <a href="{{ route('maps') }}"
                            class="rounded-md px-3 py-2 text-xl font-semibold  hover:text-gray-900 text-gray-700 capitalize">
                            store location
                        </a>
                    </div>
                </div>
            </div>

            {{-- profile dropdown --}}
            <div class="relative ml-3">
                <div>
                    <button type="button" @click="isOpen = !isOpen"
                        class="relative flex rounded-full bg-white text-sm " id="user-menu-button" aria-expanded="false"
                        aria-haspopup="true">
                        <img class="size-12 rounded-full mr-10 mt-20" src="{{ asset('images/profile.jpg') }}"
                            alt="profile">
                    </button>
                </div>

                <div x-show="isOpen" x-transition:enter="transition ease-out duration-100 transform"
                    x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-75 transform"
                    x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                    class="origin-top-right absolute right-0 mt-10 w-[130px] rounded-md shadow-lg bg-purple-100 mr-10 z-[1000]"
                    class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black/5 focus:outline-none"
                    role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                    @auth
                        @if (auth()->user()->role === 'admin')
                            <a href="{{ route('adminDashboard') }}"
                                class="block w-full px-4 py-2 text-lg text-background hover:bg-purple-200 hover:rounded-md"
                                role="menuitem" tabindex="-1">Admin Panel</a>
                        @endif
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            class="block py-2.5 px-4 rounded transition duration-200 hover:bg-purple-200">
                            Logout
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                            class="block w-full px-4 py-2 text-lg text-background text-left hover:bg-purple-200 hover:rounded-md"
                            role="menuitem" tabindex="-1">Login</a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</nav>
