@extends('template')

@section('content')


          <div class="container2 m-auto h-screen" id="container2">
              <div class="form-container sign-in-container">
                <form method="POST" action="{{ route('verification.send') }}" >
                  @csrf
                  <h3 class="font-semibold text-lg mb-5">{{ __('Click to verify your email and get authentification link')}}</h3>
                  @if(session('status'))
                   <span class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
                     {{ session('status')}}
                   </span>
                  @endif

                  <button class="bg-gray-800 text-white font-black py-2 px-5 rounded-lg mt-1 hover:bg-gray-700">{{ __('Verify email') }}</button>
                </form>
              </div>
              <div class="overlay-container">
                <div class="overlay">
                  <div class="overlay-panel overlay-right">
                    <img src="/img/logo.png" class="logo" width="200" alt="logo"/>
                  </div>
                </div>
              </div>
              </div>
        
    
@endsection