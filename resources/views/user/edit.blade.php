@extends('template')

@section('content')

<x-navmenu></x-navmenu>

<form action="{{ route('users.update', ['user' => $user->id])}}" method="POST" enctype="multipart/form-data">
  @method('PUT')
  @csrf
<div class="flex mt-5 h-screen bg-gray-100">
  <div class="m-auto">
     <div>
       <div class="mt-5 bg-white rounded-lg shadow">
           <div class="flex">
              <div class="flex-1 py-5 pl-5 overflow-hidden">
                 @if($user->avatar)
                     <img class="rounded-full w-1/6 py-3 border-2 border-gray-100" src="{{ $user->avatar() }}" alt="IMG">
                 @else
                     <img class="rounded-full w-1/6 py-3 border-2 border-gray-100" src="/img/user-img.png" alt="IMG">
                 @endif 
                 <label class="mt-2 font-semibold text-white float-left bg-gray-800 py-2 px-3 rounded-lg hover:bg-gray-700 cursor-pointer" for="avatar">{{ __('Changer Photo')}}</label>
                 <div class="w-3/4"><input name="file" type="file" id="avatar" class="sr-only"/></div>
              </div>
           </div>
           <div class="px-5 pb-5">
             <label class="font-semibold text-gray-800 float-left">{{ __('Name')}}</label>
              <input placeholder="Name" value="{{ $user->name }}" name="name" class=" text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500 focus:bg-white dark:focus:bg-gray-800 focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400">              <div class="flex">
                 <div class="flex-grow w-1/4 pr-2">
                  <label class="font-semibold text-gray-800 float-left">{{ __('Select language')}}</label>
                  <select placeholder="PLZ" class=" text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500 focus:bg-white dark:focus:bg-gray-800 focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400">
                    <option selected>--select language--</option>
                    <option></option>
                  </select>
                </div>
                 <div class="flex-grow">
                  <label class="font-semibold text-gray-800 float-left">{{ __("Changer l'adresse")}}</label>
                   <input placeholder="adresse" value="{{ $user->adresse }}" name="adresse" class=" text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500 focus:bg-white dark:focus:bg-gray-800 focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400">
                  </div>
              </div>
           </div>
           
           <div class="px-5 ">  
               <x-errors color="red"></x-errors>
           </div>
           
           <hr class="mt-4">
           <div class="flex flex-row-reverse p-3">
              <div class="flex-initial pl-3">
                 <button type="submit" class="flex items-center px-5 py-2.5 font-medium tracking-wide text-white capitalize   bg-black rounded-md hover:bg-gray-800  focus:outline-none focus:bg-gray-900  transition duration-300 transform active:scale-95 ease-in-out">
                    <span class="pl-2 mx-1">Save</span>
                 </button>
              </div>
           </div>
        </div>

</div>
</form>
@endsection