
<div class="fixed h-screen flex flex-row float-left bg-gray-100 shadow-md w-30">
  <div class="flex flex-col bg-white rounded-r-3xl overflow-hidden">
    
    <ul class="flex flex-col py-44">
      <li>
        <a href="{{ url('home') }}" class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-yellow-300 hover:bg-gray-100">
          <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-gray-400"><i class="bx bx-home"></i></span>
          <span class="text-base font-medium">Dashboard</span>
        </a>
      </li>
      <li>
        <a href="{{ url('/profile') }}" class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-yellow-300 hover:bg-gray-100">
          <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-gray-400"><i class="bx bx-user"></i></span>
          <span class="text-base font-medium">Profile</span>
        </a>
      </li>
      <li>
        <a href="{{ route('Forum.index') }}" class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-yellow-300 hover:bg-gray-100">
          <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-gray-400"><i class='bx bxs-inbox'></i></span>
          <span class="text-base font-medium">Forum</span>
        </a>
      </li>
      <li>
        <a href="#" class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-yellow-300 hover:bg-gray-100">
          <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-gray-400"><i class="bx bx-bell"></i></span>
          <span class="text-base font-medium">Notifications</span>
          <span class="ml-auto mr-6 text-base bg-red-100 rounded-full px-3 py-px text-red-500">5</span>
        </a>
      </li>
      <li>
        <a href="#" class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-yellow-300 hover:bg-gray-100">
          <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-gray-400"><i class='bx bxs-coin-stack'></i></span>
          <span class="text-base font-medium">Cotisation</span>
        </a>
      </li>
      <li>
        <div class="absolute bottom-0 m-0 w-full">

        <form method="POST" action="{{ route('logout')}}" class="shadow-none m-0 p-0">
            @csrf
              <button href="" class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 bg-red-600 text-white hover:bg-red-500 rounded-xl">
                <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-gray-400"><i class="bx bx-log-out text-white"></i></span>
                <span class="text-base font-medium">Logout</span>
              </button>
        </form>

        </div>
      </li>
    </ul>
  </div>
</div>