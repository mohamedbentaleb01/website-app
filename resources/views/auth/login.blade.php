@extends('template')

@section('content')


          <div class="container2 m-auto h-screen" id="container2">
              <div class="form-container sign-in-container">
                <form action="{{ route('login') }}" method="POST">
                  @csrf
                  <h1 class="font-extrabold text-2xl mb-2">Se connecter</h1>
                  <div class="social-container">
                    <a class="icon-facebook social-button borderless" href="http://instagram.com/username"></a>
                    <a class="icon-linkedin social-button borderless" href="http://instagram.com/username"></a>
                    <a class="icon-googleplus social-button borderless" href="http://instagram.com/username"></a>
                  </div>
                  <span>ou utilisé votre compte</span>

                  <input name="email" type="email" placeholder="Email" class="w-full p-4 text-sm bg-gray-100 focus:outline-none border border-gray-200 rounded text-gray-600 @error('email') is-invalid @enderror" />
                  @error('email')
                  <span class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror

                  <input name="password" type="password" placeholder="Password" class="w-full p-4 text-sm bg-gray-100 focus:outline-none border border-gray-200 rounded text-gray-600 @error('password') is-invalid @enderror" />
                  @error('password')
                  <span class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror


                  <a href="{{('forgot-password')}}">Mot de passe oublié ?</a>
                  <button class="Signin-button">Se connecter</button>
                </form>
              </div>
              <div class="overlay-container">
                <div class="overlay">
                  <div class="overlay-panel overlay-right ">
                    <img src="img/logo.png" class="logo" width="200" alt="logo"/>
                    <p class="mt-2 text-white font-bold text-xl">{{ __('La première fois que vous visitez')}}</p>
                    <a href="{{ url('register')}}" class="mt-2 text-white font-bold text-sm py-2 px-3 bg-gray-800 rounded-full hover:bg-gray-700 transition-colors ease-linear">{{ __("S'inscrire")}}</a>
                  </div>
                </div>
              </div>
              </div>
        
              
    
@endsection