@extends('template')

@section('content')


          <div class="container2 m-auto h-screen" id="container2">
              <div class="form-container sign-in-container">
                <form method="POST" action="{{ route('password.update')}}">
                  @csrf
                  <input type="hidden" name="token" value="{{ $request->route('token') }}">
                  <h2 class="font-extrabold text-lg mb-5">{{ __('Reinitialiser mot de passe')}}</h2>
                  @if(session('status'))
                    <span class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
                      {{ session('status') }}
                    </span>
                  @endif

                  <div class="form-group row">
                    <label for="" class="float-left font-semibold">{{ __('Email') }}</label>
                    <div class="col-md-10">
                      <input name="email" id="email" type="email" value="{{ $request->email }}" placeholder="Email" class="max-w-full rounded-lg py-2 px-2 focus: outline-none @error('email') is-invalid @enderror"/>
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
                      <input name="password" id="password" type="password" placeholder="Password" class="max-w-full rounded-lg py-2 px-2 focus: outline-none @error('password') is-invalid @enderror"/>
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
                      <input name="password_confirmation" id="password_confirm" type="password" placeholder="Confirm password" class="max-w-full rounded-lg py-2 px-2 focus: outline-none"/>
                    </div>
                  </div>

                 
                  <button class="bg-gray-800 text-white font-black py-2 px-5 rounded-lg mt-1 hover:bg-gray-700">{{ __('Reinitialiser')}}</button>
                
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