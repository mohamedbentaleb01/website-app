@extends('template')

@section('content')


          <div class="container2 m-auto h-screen" id="container2">
              <div class="form-container sign-in-container">
                <form method="POST" action="{{ route('register') }}">
                  @csrf
                  <h1 class="font-extrabold text-lg">{{ __('Inscription')}}</h1>

                
                  <div class="form-group row">
                    <label for="" class="float-left font-semibold">{{ __('Nom') }}</label>
                    <div class="col-md-10">
                      <input name="name" id="name" type="text" placeholder="Votre nom" class="w-full p-4 text-sm bg-gray-100 focus:outline-none border border-gray-200 rounded text-gray-600 @error('name') is-invalid @enderror"/>
                    </div>
                    @error('name')
                      <span class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <strong>{{ $message }}</strong>
                      </span> 
                    @enderror
                  </div>

                  <div class="form-group row">
                    <label for="" class="float-left font-semibold">{{ __('Email') }}</label>
                    <div class="col-md-10">
                      <input name="email" id="email" type="email" placeholder="Email" class="w-full p-4 text-sm bg-gray-100 focus:outline-none border border-gray-200 rounded text-gray-600 @error('email') is-invalid @enderror"/>
                    </div>
                    @error('email')
                      <span class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <strong>{{ $message }}</strong>
                      </span> 
                    @enderror
                  </div>

                  <div class="form-group row">
                    <label for="" class="float-left font-semibold">{{ __('Password') }}</label>
                    <div class="col-md-8">
                      <input name="password" id="password" type="password" placeholder="Password" class="w-full p-4 text-sm bg-gray-100 focus:outline-none border border-gray-200 rounded text-gray-600 @error('password') is-invalid @enderror"/>
                    </div>
                    @error('password')
                      <span class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <strong>{{ $message }}</strong>
                      </span> 
                    @enderror
                  </div>

                  <div class="form-group row">
                    <label for="" class="float-left font-semibold">{{ __('Confirm password') }}</label>
                    <div class="col-md-8">
                      <input name="password_confirmation" id="password_confirm" type="password" placeholder="Confirm password" class="w-full p-4 text-sm bg-gray-100 focus:outline-none border border-gray-200 rounded text-gray-600"/>
                    </div>
                  </div>

                 
                  <button class="bg-gray-800 text-white font-black py-2 px-5 rounded-lg mt-1 hover:bg-gray-700">{{ __("M'inscrire")}}</button>
                
                </form>
              </div>
              <div class="overlay-container">
                <div class="overlay">
                  <div class="overlay-panel overlay-right">
                    <img src="img/logo.png" class="logo" width="200" alt="logo"/>
                  </div>
                </div>
              </div>
              </div>
        
    
@endsection