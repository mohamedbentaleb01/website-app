    
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
<div class="flex justify-center h-screen">
<div x-data="{ dropdownOpen: false }" class="relative my-5">
    <button @click="dropdownOpen = !dropdownOpen" class="relative z-10 block rounded-md bg-white p-1 mt-1 focus:outline-none">
    <svg class="h-5 w-5 text-gray-800" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
      <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
    </svg>
  </button>

  <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10"></div>

  <div x-show="dropdownOpen" class="absolute right-0 mt-2 py-2 w-48 bg-gray-800 rounded-md shadow-xl z-20">
    <a href="{{ url('/profile')}}" class="block px-4 py-2 text-sm capitalize">
      <i class='bx bx-user text-xl'></i> {{ __('Profile') }}
    </a>
    <a href="{{ url('home') }}" class="block px-4 py-2 text-sm capitalize">
      <i class='bx bxs-dashboard text-xl' ></i> {{ __('Dashboard') }}
    </a>
    <a href="{{ route('Forum.index')}}" class="block px-4 py-2 text-sm capitalize">
      <i class='bx bxs-conversation text-xl'></i> {{ __('Forum')}}
    </a>
    {{-- <a href="#" class="block px-4 py-2 text-sm capitalize">
      Settings
    </a> --}}
    <form method="POST" action="{{ route('logout')}}">
        @csrf
    <button class="block px-4 py-4 text-sm text-white font-bold w-full capitalize">
      <i class='bx bx-log-out-circle text-xl'></i>
    </button>
    </form>
  </div>
</div>
</div>
