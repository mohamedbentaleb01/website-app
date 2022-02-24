@extends('template')

@section('content')


<x-navmenu></x-navmenu>
<br></br></br>
<x-status color="green"></x-status>

<div class="w-1/4 rounded-lg shadow-xl bg-white p-10 m-auto my-20">
  @if($user->avatar)
        <img src="{{ $user->avatar() }}" alt="" class="rounded-full p-4 h-40 m-auto shadow-md">
  @else
    <img src="/img/user-img.png" alt="" class="rounded-full p-4 h-40 m-auto shadow-md">
  @endif
  <!--Card Header-->
  <div class=" text-2xl font-extrabold py-4 px-4 text-center">
    {{ $user->name}}
  </div>
  <div>
    <ul class="text-gray-500 text-center font-semibold">
      <li>Web Designer</li>
      <li>
        @if($user->email_verified_at != Null)
        <span class="text-green-700">Verified <i class='bx bx-check'></i></span>
        @endif
      </li>
      <li>{{ $user->email }}</li>
    </ul>
  </div>
  <!--Card Footer-->
  <div class="flex text-center py-3 px-2 text-gray-500">
      
      @can('update', $user)
        <a 
          href="{{ route('users.edit', ['user' => Auth::user()->id ]) }}"
          class="py-2 px-4 mt-5 bg-yellow-600 rounded-lg text-white font-semibold hover:bg-yellow-400"
        >
          {{ __('Edit')}}
        </a>
      @endcan
      
    <button
      class="ml-2 mr-2 py-2 px-4 mt-5 bg-green-500 rounded-lg text-white font-semibold hover:bg-green-600"
    >
      {{ __('Follow')}}
    </button>
    <button
      class="py-2 px-4 mt-5 bg-blue-500 rounded-lg text-white font-semibold hover:bg-blue-400"
    >
      {{ __('Message')}}
    </button>
  </div>
</div>


@endsection