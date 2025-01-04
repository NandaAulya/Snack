<div class="flex items-center justify-between bg-white border-b border-gray-300 w-full h-[60px] px-4">
    <div></div> <!-- Bagian kiri bisa diisi dengan konten lain jika diperlukan -->

    <div x-data="{ isOpen: false }" class="relative">
        <button type="button" @click="isOpen = !isOpen" 
            class="relative flex items-center rounded-full bg-white text-sm" 
            id="user-menu-button" aria-expanded="false" aria-haspopup="true">
            <img src="@isset($user){{ $user->image ? asset($user->image) : asset('images/profile.png') }}@else{{ asset('images/profile.png') }}@endisset" 
                alt="Profile Image" class="w-10 h-10 rounded-full mt-2">
            </button>
            {{-- <h2 class="text-base font-semibold text-gray-800 capitalize">{{ Auth::user()->username }}</h2>     --}}

        <div x-show="isOpen" @click.away="isOpen = false" class="absolute right-0 mt-6 w-48 bg-white border border-gray-300 rounded-md shadow-lg z-10">
            <ul class="py-1">
                <li>
                    <a href="/" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Home</a>
                </li>
                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>
