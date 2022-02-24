@extends('template')

@section('content')


          <div class="container2 m-auto h-screen" id="container2">
              <div class="form-container sign-in-container">
                <form action="{{ route('password.request') }}" method="POST">
                  @csrf
                  <h1 class="font-extrabold text-lg mb-5">{{ __('Password reset') }}</h1>
                    @if(session('status'))
                    <span class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                      {{ session('status') }}
                    </span>
                    @endif
                  <input name="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" />
                  @error('email')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror

                  <button class="bg-gray-800 text-white font-black py-2 px-5 rounded-lg mt-1 hover:bg-gray-700">{{ __('Reset') }}</button>
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