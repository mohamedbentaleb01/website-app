<header id="main" class="fixed">
    <div id=logo><img src="/img/logo.png" class="logoim shadow-md" alt=""/></div>
      @if (Route::has('login'))
                  @auth
                      <span class="navbar">
                        <x-dropdown-menu></x-dropdown-menu></span>
                        @if(Auth::user()->avatar)
                          <span class="navbar"><img src="{{ Auth::user()->avatar() }}" alt="" class="mt-4 w-10 h-10 rounded-full"></span>
                        @else
                            <span class="navbar"><img src="/img/user-img.png" alt="" class="mt-5 w-10 h-10 rounded-full border-gray-800 border-2"></span>
                        @endif
                        <span class="navbar">
                          <i class='bx bx-bell text-3xl text-white mt-5 cursor-pointer'></i>
                        </span>
                      
                        @if(Route::is('Forum.index'))
                          <a href="{{ route('Forum.create')}}" class="navbar bg-yellow-300 mt-1 text-white font-bold py-0 px-3 rounded-md hover:shadow-inner hover:bg-gray-800 transition-all">
                            <i class='bx bxs-add-to-queue'></i> 
                            {{ __('Add Post') }}
                          </a>
                        @endif
                    @else  
                      @if(Route::has('register'))
                          <span class="navbar text-xl py-2"><a href="{{ route('login') }}" class="ml-4 text-gray-700 dark:text-gray-500 underline act"><i class='bx bx-log-in-circle text-xl'></i> {{ __("Se connecter")}}</a></span>
                      @endif
                      {{-- <span class="navbar text-xl py-2"><a href="{{ route('login') }}" class="py-1 px-1 rounded-full hover:bg-white">{{ __('Se connecter')}}</a></span> --}}
                      <span class="navbar text-xl py-2"><a class="" href="#footer">{{ __('Nous contacter') }}</a></span>
                    <span class="navbar text-xl py-2"><a class="" href="{{ route('Forum.index')}}">{{ __('Forum') }}</a></span>
                    <span class="navbar text-xl py-2" ><a class="" href="{{ url('/')}}">{{ __('Acceuil') }}</a></span>
                  @endauth 
      @endif
</header>
