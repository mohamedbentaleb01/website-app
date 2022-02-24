@extends('template')

@section('content')

<x-navmenu></x-navmenu>

<br><br><br><br><br><br>

@include('components.sid-forum');



<div class="flex justify-center">
  <form class="items-center w-4/5 shadow-2xl bg-white" action="{{ route('Forum.store')}}" method="POST" enctype="multipart/form-data">
    @csrf

    @include('Forum.form')

      <button class="block bg-gray-800 hover:bg-gray-700 text-white text-lg mx-auto p-4 rounded mb-5 font-bold mt-5" type="submit">Create Post</button>
  </form>
</div>

@endsection



