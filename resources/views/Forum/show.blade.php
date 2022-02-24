@extends('template')

@section('content')

<x-navmenu></x-navmenu>

<br><br><br><br><br><br><br>


<x-status color="green"></x-status>

@include('components.sid-forum');


<div class="ml-16 w-3/5 mb-6 rounded-xl shadow-lg bg-white p-4">
  
  <div class="p-4 flex">
    <a href="{{ route('users.show', ['user' => $post->user->id ])}}">
    @if($post->user->avatar)
        <img class="w-10 h-10 rounded-full mr-4" src="{{ $post->user->avatar() }}" alt="">
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
        <div class="ml-auto hover:text-gray-400">
          <a href="{{ route('Forum.edit', ['Forum' => $post->id ])}}">
            <i class='bx bx-edit-alt'></i>
          </a>
        </div>
      @endcan
    @endauth
 
  </div>

  <div class="p-4">
    <h3 class="font-bold text-2xl">{{ $post->title }}</h3>
      @if($post->categories)
        @foreach($post->categories as $categorie)
          @foreach($categorie->getCategorieName($categorie->category_id) as $getCategoryName)
            <span class="py-1 px-1 bg-gray-200 font-bold rounded-xl text-gray-500 text-xs"><i class='bx bx-hash'></i>{{ $getCategoryName->name }}</span>
          @endforeach
        @endforeach
      @endif
    @if($post->created_at->diffInhours() < 1)
          <span class="px-1 rounded-full bg-green-300 text-green-900 font-semibold">{{ __('New')}}!</span>
    @endif
    @if($post->updated_at->diffInMinutes() < 3)
            <span class="float-right py-1 px-1 font-bold text-xs rounded-full h-5 bg-yellow-200 text-yellow-700">Updated !</span>
    @endif
    <p class="text-gray-700 text-base mt-3 mb-4">{!! $post->content !!}</p>
    @if($post->image)
    <div class="flex flex-wrap">
      @foreach($post->image as $image)
          <img src="{{ $image->url() }}" alt="post-image" class="flex h-80 sm:w-1/2 md:w-1/3 lg:w-3/4 xl:w-2/6 rounded-lg shadow-md mt-10 ml-5">
      @endforeach
    </div>
    @else  
      <em class="flex bg-yellow-200 py-2 px-2 text-yellow-600 font-semibold border-l-2 border-yellow-800 mt-4 mb-4">This post doesn't have image</em>
    @endif 
  </div>
  <hr>

  <h1 class="m-2 text-xl text-gray-900 underline font-semibold mb-3">{{__('Comments')}}:</h1>

  <div class="w-full h-auto text-white bg-gray-100 pb-5">
    
    <div class="flex flex-col m-2 shadow-inner">

      @if($post->comments->count() == 0)
        <div class="text-center font-bold bg-yellow-100 text-yellow-500">{{ __('No comments available in this post !')}}</div>
      @endif

      @foreach($post->comments as $comment)

        <div class="flex"> 
          @if($comment->user->avatar)
            <img class="w-12 m-5 h-12 rounded-full" src="{{ $comment->user->avatar() }}" alt=""/>
            @else
              <img class="w-12 m-5 h-12 rounded-full" src="/img/user-img.png" alt=""/>
          @endif
          <div class="ml-0 mt-5 px-3 py-3 w-2/5 h-auto bg-gray-500 hover:bg-gray-400 transition-colors rounded-bl-2xl">
          @if($comment->created_at->diffInhours() < 1)
            <span class="float-right py-1 px-1 font-bold text-xs rounded-full h-5 bg-green-200 text-green-700">New</span>
          @endif
          @if($comment->created_at->diffInhours() < 1 && $comment->updated_at->diffInMinutes() < 3)
            <span class="float-right py-1 px-1 font-bold text-xs rounded-full h-5 bg-yellow-200 text-yellow-700">Updated !</span>
          @endif
          <div class="font-bold" id="content">{{ $comment->content }}</div>
          <em class="font-semibol text-xs ml-auto text-gray-300">{{ $comment->created_at->diffForhumans() }}</em>

          @can('update', $comment)
          <div
          class="float-right mt-5 text-xs text-gray-200 font-bold cursor-pointer"
          id="toggle" data-id="{{ $comment->id }}" data-value="{{ $comment->content }}" onclick="toggleModal();" >
          <i class='bx bx-edit-alt'></i>
        </div>
        @endcan
        
      </div>
    </div>
    @endforeach
  </div>
  
  
</div>

<hr>

@include('comment.form')

  @foreach($post->comments as $comment)
  <x-modal comment="{{ $comment->id }}" post="{{ $comment->post->id }}"></x-modal> 
  @endforeach        
    
        <script type="text/javascript">
  function toggleModal(){
    document.getElementById("modal")
            .classList.toggle("hidden")
  
  
  $(document).on("click", "#toggle", function () {
     var mycontent = $(this).data('value');
     var idComment = $(this).data('id');
     $("#comment").val( mycontent );
     $("#comment-id").val( idComment);
  })};
  
</script>


    
@endsection
