@extends('template')


@section('content')
    
<x-navmenu></x-navmenu>

<section class="pt-16 pb-10">
  <div class="bg-scroll h-96 p-16 md:p-24 w-full text-center bg-gradient-to-tl from-gray-600 via-gray-800 to-gray-900">
    <div class="flex justify-center">
      <span class="p-2 bg-clip-text text-transparent bg-gradient-to-r from-pink-500 via-indigo-300 to-gray-300 text-lg md:text-xl font-bold mb-1">ابتسامت الغد تشاركك</span>
    </div>
    <div class="text-4xl md:text-6xl bg-clip-text text-transparent bg-gradient-to-r from-pink-500 via-indigo-300 to-gray-300 mt-2 mb-5 font-extrabold"> 
      أفضل لحظات الحدث
    </div>
    <span class="text-xl md:text-2xl bg-clip-text text-transparent bg-gradient-to-r from-pink-500 via-indigo-300 to-gray-300 mt-2">
      تشارك جمعياتنا معك أهم الأحداث الماضية.
    </span>
    <div class="flex m-auto w-full justify-center mt-6">
      {{-- render into one component --}}
       @livewire('search-event') 
      {{--  --}}
    </div>

    

  </div>
  <div class="text-3xl m-10 font-bold underline font-sans ">
    Upcomming event : 
  </div>
  @if(!$upcommingEvent->count() == 0)
  <aside class="relative text-white bg-amber-900">
    @if($upcommingEvent->image)
      @foreach($upcommingEvent->image->take(1) as $image)
      <img
        src="{{ $image->getEventImages() }}"
        alt=""
        class="absolute inset-0 object-cover w-full m-auto h-full opacity-75"
      />
      @endforeach
    @endif
  
    <div class="relative max-w-screen-xl px-4 py-24 mx-auto sm:px-6 lg:px-8">
      <div class="max-w-3xl mx-auto text-center">
        <strong class="inline-block px-3 py-1 text-xs font-semibold text-white bg-green-500 uppercase bg-amber-600">
          <i class='bx bx-bell text-lg'></i> Plannifier le : {{ $upcommingEvent->plannified_at }}
        </strong>
  
        <h2 class="mt-2 text-4xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-pink-500 via-indigo-300 to-gray-300 sm:text-6xl">
          {{ $upcommingEvent->title }}
        </h2>
  
        <a
          href="{{ route('events.show', ['event' => $upcommingEvent->id ])}}"
          class="inline-flex items-center px-5 py-3 mt-8 font-medium text-white border border-white rounded-lg hover:bg-indigo-300 hover:text-amber-600 hover:border-indigo-300"
        >
          Voir Plus
  
          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="flex-shrink-0 w-4 h-4 ml-3"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
          >
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
          </svg>
        </a>
      </div>
    </div>
  </aside>
  @else
  <div class="text-center">
    <span role="img" class="text-5xl">
      😢
    </span>
  
    <p class="mt-6 text-gray-500 font-semibold">
      {{ __('There is no event in this moment ')}}
    </p>
  </div>
  @endif

  <div class="text-3xl m-10 font-bold underline font-sans ">
    Autres evennement : 
  </div>

     <div class="flex justify-center flex-wrap -mx-4">
       @foreach($events as $event)
        <div class="modal-open cursor-pointer m-20 md:m-12 w-full md:w-1/2 lg:w-1/4 px-4 rounded-xl bg-transparent bg-white shadow-2xl transform transition duration-500 hover:scale-110
        hover:-translate-y-6"  id="eventToggle" data-id="{{ $event->id }}" data-value="{{ $event->image }}" onclick="getIdEvent();">
           <div class="max-w-[370px] mx-auto mb-10">
              <div class="rounded overflow-hidden mb-8">
                @if($event->image)
                  @foreach($event->image->take(1) as $image)
                  <div class="flex flex-shrink-0">
                  <img
                      src="{{ $image->getEventImages() }}"
                      alt="events"
                      class="object-cover w-full h-56 rounded-lg"
                      />
                  </div>
                  @endforeach

                @endif
              </div>
              <div>
                 <span
                    class="
                    bg-blue-500
                    rounded
                    inline-block
                    text-center
                    py-1
                    px-4
                    text-xs
                    leading-loose
                    font-semibold
                    text-white
                    mb-5
                    "
                    >
                 {{ $event->created_at->format('F,j y')}}
                 </span>
                 <h3>
                    <a
                       class="
                       font-semibold
                       text-xl
                       sm:text-2xl
                       lg:text-xl
                       xl:text-2xl
                       mb-4
                       inline-block
                       text-dark
                       hover:text-primary
                        "
                       >
                    {{ $event->title }}
                 </a>
                 </h3>
                 <p class="text-base text-body-color text-gray-500 mb-11">
                    {{ $event->content }}
                 </p>
                 <div class="flex flex-wrap w-3/5 m-auto text-gray-500 bg-gray-100 p-2 rounded-full ">
                    <i class='bx bx-calendar text-xl'></i>
                    <p class="ml-1">{{ $event->plannified_at }}</p>
                    <div class="m-auto flex flex-wrap">
                      <i class='bx bx-group text-xl'></i>
                      <p class="ml-1">{{ $event->participations()->count() }}</p>
                    </div>
                    <div class="ml-auto flex flex-wrap">
                      <i class='bx bxs-coin-stack text-xl'></i>
                      <p class="ml-1">{{ $event->cotisations()->count() }}</p>
                    </div>
                 </div>
              </div>
              <a href="{{ route('events.show', ['event' => $event->id ])}}" class="block text-center m-10 py-2 px-auto bg-transparent-900 text-white bg-gradient-to-r from-pink-500 via-indigo-300 to-gray-300 font-bold rounded-xl shadow-md">Voir plus</a>
            </div>
        </div>
        @endforeach
      </div>
</section>

  




<footer>
  @if($events->links())
    <div class="bg-gray-200 flex justify-center">{{ $events->links()}}</div>
    @endif
</footer>

@endsection