<div class="flex items-center justify-end bg-white border-b border-gray-300 w-full h-[60px] px-4">
    <div x-data="{ isOpen: false }" class="relative">
        <button type="button" @click="isOpen = !isOpen" 
            class="relative flex items-center rounded-full bg-white text-sm" 
            id="user-menu-button" aria-expanded="false" aria-haspopup="true">
            <img src="@isset($user){{ $user->image ? asset($user->image) : asset('images/profile.png') }}@else{{ asset('images/profile.png') }}@endisset" 
                alt="Profile Image" class="w-10 h-10 rounded-full mt-2 mr-10">
            </button>
    </div>
</div>
