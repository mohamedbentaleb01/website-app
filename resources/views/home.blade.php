@extends('template')

@section('content')

<x-navmenu></x-navmenu>
<x-sidebar-menu></x-sidebar-menu>

<br><br><br><br>
<x-status color="green"></x-status>


<div class="flex flex-wrap">
<a
class="flex flex-col justify-between p-7 transition-shadow bg-gradient-to-t from-gray-800 to-gray-500 rounded-sm shadow-xl group hover:shadow-lg w-1/6 ml-56 h-auto"
>
<div>
    @if($myPosts->count() == 0)
      <form class="shadow-none bg-transparent border-0 m-0 p-0 float-right ml-auto" method="POST" action="{{ route('Forum.create')}}">
        @csrf
        @method('GET')
      <button href="" class="py-2 px-2 bg-white shadow-md float-right text-2xl rounded-full font-extrabold text-white-500 focus:shadow-inner ">+</button>
      </form>
    @endif
    <h5 class="text-5xl font-bold text-white">{{ $myPosts->count()}}</h5>
    <div class="pt-2 mt-4 border-t-2 border-white">    
      <p class="text-sm font-medium tracking-widest text-white uppercase"><i class='bx bx-clipboard text-5xl'></i>&nbsp;Post(s)</p>
    </div>
  </div>
  
  <div class="inline-flex items-center mt-16 text-white">
    @if(!$myPosts->count() == 0)
    <p class="text-lg font-medium cursor-pointer">{{ __('Voir tout')}}</p>
    
    <svg
    xmlns="http://www.w3.org/2000/svg"
    class="w-6 h-6 ml-3 transition-transform transform group-hover:translate-x-3"
    fill="none"
    viewBox="0 0 24 24"
    stroke="currentColor"
    >
    @endif
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
  </svg>
</div>
</a>

<a
class="flex flex-col justify-between p-7 transition-shadow bg-gradient-to-r from-yellow-800 to-yellow-500 rounded-sm shadow-xl group hover:shadow-lg w-2/6 ml-12 h-auto"
>
<div>
  <h5 class="text-5xl font-bold text-white">{{ $myComments->count() }}</h5>
  <div class="pt-2 mt-4 border-t-2 border-white">    
    <p class="text-sm font-medium tracking-widest text-white uppercase"><i class='bx bx-comment-detail text-5xl'></i>&nbsp;Comment(s)</p>
  </div>
</div>

<div class="inline-flex items-center mt-16 text-white">
  <p class="text-lg font-medium cursor-pointer">{{ __('Voir tout')}}</p>
  
  <svg
  xmlns="http://www.w3.org/2000/svg"
  class="w-6 h-6 ml-3 transition-transform transform group-hover:translate-x-3"
  fill="none"
  viewBox="0 0 24 24"
  stroke="currentColor"
  >

  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
</svg>
</div>

</a>

<a
class="flex flex-col justify-between p-7 transition-shadow bg-gradient-to-r from-green-800 to-green-500 rounded-sm shadow-xl group hover:shadow-lg w-1/4 ml-12 h-auto"
>
<div>
  <h5 class="text-5xl font-bold text-white">0</h5>
  <div class="pt-2 mt-4 border-t-2 border-white">    
    <p class="text-sm font-medium tracking-widest text-white uppercase"><i class='bx bxs-bell text-6xl'></i>&nbsp;Notification(s)</p>
  </div>
</div>

<div class="inline-flex items-center mt-16 text-white">
  <p class="text-lg font-medium cursor-pointer">{{ __('Voir tout')}}</p>
  
  <svg
  xmlns="http://www.w3.org/2000/svg"
  class="w-6 h-6 ml-3 transition-transform transform group-hover:translate-x-3"
  fill="none"
  viewBox="0 0 24 24"
  stroke="currentColor"
  >

  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
</svg>
</div>

</a>


</div>
{{-- end section one --}}


<section>
  <div class="
    items-center
    w-full
    px-5
    py-12
    mx-auto
    md:px-12
    lg:px-24
    max-w-7xl
    ml-36
    ">
    <div class="pb-5 border-b border-black">
      <a href="{{ route('events.index') }}" class="flex float-right ml-auto rounded-xl text-gray-800 font-bold"><i class='bx bx-list-plus text-lg'></i>Voir tout</a>
      <h3 class="text-lg font-medium leading-6 text-neutral-600"><i class='bx bx-calendar-event text-2xl'></i> Events Available : </h3>
    </div>
    <div class="mt-10 p-5 rounded-lg mx-auto max-w-7xl bg-black shadow-lg relative inset-0 object-cover w-full m-auto h-full opacity-90" style="background-image: url('/img/event5.jpg'); ">
      @if($event->plannified_at > now())
      <span class="float-right font-extrabold bg-green-300 text-green-600 rounded-full px-1">جديد</span>
       {{-- <div class="grid max-w-lg gap-12 mx-auto mt-12 lg:grid-cols-3 lg:max-w-none"> --}}
        <div class="flex h-auto mb-12 overflow-hidden cursor-pointer">
          <a href="/blog-post">
            <div class="flex-shrink-0">
              {{-- @foreach($event->image as $image)
              <img class="object-cover w-full h-56 rounded-lg" src="{{ $image->url() }}" alt="">
              @endforeach --}}
              {{-- <img class="w-1/2 h-screen rounded-lg" src="/img/event5.jpg" alt=""> --}}
            </div>
          </a>
          <div class="flex flex-col ml-14 mx-auto justify-between">
            <div class="flex flex-col">
                <div class="flex pt-6 space-x-1 text-sm text-gray-500">
                  <time datetime="2020-03-10">Ajouté le : {{ $event->created_at }} </time>
                  <span aria-hidden="true" class="font-extrabold"> · </span>
                  <span> {{ $event->created_at->diffForHumans() }} </span>
                </div>
              <a href="#" class=" mt-6 space-y-6">
                <h3 class="
              text-3xl
              font-bold
              leading-none
              tracking-tighter
              text-white
            "> {{$event->title}} </h3>
                <!--------->
                <p class="text-lg font-normal text-gray-400"> {{ $event->content }} </p>
                <p class="text-sm text-green-500 font-bold" ><i class='bx bxs-bell'></i>&nbsp;Plannifier le : {{ $event->plannified_at }}</p>
              </a>
            </div>
            {{-- modal open --}}
            <div class="flex justify-end">
              @if($checkIdofUser)
              <div class="mt-16 py-2 px-2 text-center bg-green-100 text-green-500 font-bold rounded-xl cursor-not-allowed">Participation envoyé !</div>
              @else 
                <a href="{{ route('event.participation.create', ['event' => $event->id ])}}" class="mt-16 py-2 px-24 text-center bg-indigo-500 hover:bg-indigo-600 text-white font-bold rounded-xl" id="go">Participer</a>

                <div class="" id="loader1">
                  <div class="animate-spin rounded-full h-5 w-5 border-b-2 border-white"></div>
                </div>

              @endif
              
            </div>

          </div>
          {{--  --}}
        </div>
            {{-- </div> --}}
            @else 
              <span class="flex justify-center py-2 px-2 text-center bg-red-500 text-white font-bold rounded-xl"><i class='bx bx-sad text-2xl'></i>&nbsp;{{__('لا يوجد حدث في هذه اللحظة! !')}}</span>
            @endif
          </div>
        </div>
</section>


<script type="text/javascript">

const goBtn = document.getElementById("go");
const loader = document.getElementById("loader1");

loader.style.display = "none";

goBtn.addEventListener("click", function(){

  goBtn.classList.remove("text-white", "bg-indigo-500", "hover:bg-indigo-600");
  goBtn.classList.add("text-gray-500", "bg-gray-300", "hover:bg-gray-300");
  loader.style.display = "block";


});
</script>


@endsection
