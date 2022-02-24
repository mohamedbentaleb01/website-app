@extends('template')

@section('content')
<x-navmenu></x-navmenu>
<br><br><br>


  <div class="w-full h-56  p-0 m-0 mb-8">
    <div class="bg-opacity-50">
      <div class="bg-fixed bg-no-repeat bg-center w-full h-80 p-0 m-0" style="background-image: url('/img/logo.png')">
        {{-- <div class="w-full m-0 text-white text-center font-bold text-4xl p-10">Lorem ipsum dolor sit amet consectetur adipisicing elit. A, consequuntur!
        </div> --}} 
      </div>
      
    </div>
  </div>

  
  {{-- <em class="ml-28" >{{ App\Models\Post::all()->count() }} Post(s).</em> --}}
  @include('components.sid-forum');


  <center>
    <input class="mb-2 w-1/3 p-10 bg-white px-5 py-3 rounded-full focus:border-yellow-300 outline-none focus:border-3 shadow-2xl focus:shadow-xl transition-shadow" type="text" placeholder="chercher"/>
    <button class="mr-2 py-3 px-3 bg-yellow-300 rounded-full text-white font-bold shadow-xl" type="submit">Search</button>
  </center>

  
  <x-status color="red"></x-status>


  @if($posts->count() == 0)
  <div class="flex justify-center py-3 py2 bg-red-200 border-2 border-red-600 font-semibold text-lg text-center text-red-600 rounded-lg">
    {{ __('There is no post in this forum !!')}}
  </div>
  @else

  <div class="ml-16 mb-3 font-bold text-gray-400">{{ $posts->count()}} {{ __('Post(s) in this blog')}}</div> 

    @foreach($posts as $post)
  
      <div class="ml-16 w-3/5 mb-6 rounded-xl shadow-lg bg-white p-4 flex flex-col justify-between leading-normal">
        <div class="mb-8">
          @if($post->created_at->diffInhours() < 1)
            <span class="px-1 rounded-full float-right bg-green-300 text-green-900 font-semibold">{{ __('New')}}!</span>
          @endif

          <div class="font-bold text-3xl mb-5 text-gray-800-300"><a href="{{ route('Forum.show', ['Forum' => $post->id ])}}" class="hover:underline">{{ $post->title }}</a></div>
          
          @if($post->categories)
            @foreach($post->categories as $categorie)
              @foreach($categorie->getCategorieName($categorie->category_id) as $getCategoryName)
              <span class="py-1 px-1 bg-gray-200 font-bold rounded-xl text-gray-500 text-xs"><i class='bx bx-hash'></i>{{ $getCategoryName->name }}</span>
              @endforeach
            @endforeach
          @endif

          <p class="text-gray-700 text-xl mt-3">{!! $post->content !!}</p>
            @if($post->image)
              @foreach($post->image->take(1) as $image)
                <img class="mt-8 h-52 w-64 rounded-md" src="{{ $image->url() }}">
              @endforeach
            @endif
        </div>
        @if($post->comments)
          <em class="mt-1 mb-3 ml-auto font-bold text-gray-400">{{ $post->comments->count()}} {{ __('Comment(s) in this post')}}</em>
        @endif
        <hr class="mb-2">

        <div class="flex items-center">
          <a href="{{ route('users.show', ['user' => $post->user->id ])}}">
            
          @if($post->user->avatar)
                <img class="w-10 h-10 rounded-full mr-4" src="{{ ($post->user->avatar()) }}" alt="">
            @else
            <img class="w-10 h-10 rounded-full mr-4" src="/img/user-img.png" alt="">
          @endif
          
          <div class="text-sm">
            <b class="text-gray-900 leading-none">{{ $post->user->name}}</b>
          </a>
            <p class="text-gray-600">{{ $post->created_at->diffForhumans() }}</p>
        </div>

        @auth
          @can('update', $post)
            <a href="{{ route('Forum.edit', ['Forum' => $post->id ]) }}" class="ml-auto py-2 px-3 bg-yellow-200 text-yellow-600 font-semibold rounded-lg float-right">
              <i class='bx bx-edit-alt'></i>
              
            </a>
          @endcan
          
          @can('delete', $post)
          <form class="shadow-none m-0 p-0" action="{{ route('Forum.destroy', ['Forum' => $post->id ])}}" method="POST">
            @method('DELETE')
            @csrf
            <button onclick="Delete();" class="ml-2 py-2 px-3 bg-red-200 text-red-600 font-semibold rounded-lg float-right">
              <i class='bx bx-trash'></i>
             
            </button>
          </form>
          <script>
            //   function Delete() {
            //    var msg = confirm("Do you want to delete this post ? ");
            //    if( msg ) {
            //       return true;
            //    } else {
            //       return false;
            //    }
            // } 
          </script>
          @endcan

        @endauth
        
      </div>
    </div>
    @endforeach
    {{-- pagination --}}
    @if($posts->links())
    <div class="bg-gray-200 flex justify-center">{{ $posts->links()}}</div>
    @endif
  @endif

  


@endsection