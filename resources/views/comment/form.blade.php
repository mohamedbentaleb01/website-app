@auth
<div class="p-12">
  <form class="shadow-none" method="POST" action="{{ route('posts.comment.store', ['post' => $post->id])}}">
    @csrf
      <label class="text-gray-500 font-semibold">{{ __('Add Comment')}} :</label><br>
      <textarea class="w-full h-44 bg-gray-100 px-1 py-4 mb-2 focus:outline-none border-2" name="content" placeholder="Add comment">
      </textarea>
      <x-errors color="red"></x-errors>
      <button class="py-2 px-3 text-black font-semibold bg-transparent border-2 border-black">
          {{ __('Ajouter') }}
      </button>
      <input type="hidden" name="post" value="{{ $post->id }}"/>
  </form>
</div>
@else
<div class="ml-2 mt-5 flex">
<a href="{{ route('login')}}" class="mb-2 py-2 px-3 text-white font-semibold bg-transparent border-2 bg-gray-800">
  {{ __('Se Connecter') }} 
</a>
<p class="ml-2 text-red-600 mt-3 font-bold">Pour ajouter un commentaire !</p>
</div>
@endauth