<div class="inline-grid w-3/12 float-right mr-8">
    <div class="bg-white float-right rounded-xl shadow-xl p-4">
      <p class="font-bold text-xl text-yellow-400">
        <i class='bx bx-category'></i>
        {{ __('Topics')}}
      </p>
      <hr>
      <div class="flex flex-wrap justify-start mt-6 mb-3">
        
          @foreach($categories as $categorie) 
            <span class="font-semibold text-xs bg-blue-300 py-2 px-1 text-blue-900 rounded-full m-1 hover:bg-blue-200 cursor-pointer"><i class='bx bx-hash'></i>{{ $categorie->name }}</span>
          @endforeach 
        
      </div>
    </div><br>

    <div class="bg-white float-right rounded-xl shadow-xl p-4">
      <p class="font-bold text-xl text-yellow-400"><i class='bx bx-trending-up'></i>
        {{ __('Most Active Users')}}
      </p>
      <hr>
      <div class="flex flex-col mt-6 mb-3">
        @foreach($users as $user)
          <div class="m-1">
            @if($user->avatar)
            <img class="rounded-full h-11 w-11" src="{{ $user->avatar() }}" alt="User-img" />
            @else
              <img class="rounded-full h-11 w-11" src="/img/user-img.png" alt="User-img" />
            @endif
          </div>
          <div class="m-1">
            <a href="#user" class="font-bold">{{ $user->name }}</a></br>
            <em class="text-gray-300 font-light">{{ $user->posts->count() }}Post(s)</em>
          </div>
        @endforeach
      </div>
    </div><br>

    <div class="bg-white float-right rounded-xl shadow-xl p-4">
      <p class="font-bold text-xl text-yellow-400"><i class='bx bxs-comment-detail'></i>
        {{ __('Posts Recently commented')}}
      </p>
      <hr>
      {{-- @foreach($lastCommented as $commented) --}}
      <p class="m-2">
        <div class="font-bold">{{ $lastCommented->post->title }}&nbsp;</div>
        <span class="text-gray-300 font-light">Commented By : {{ $lastCommented->user->name }} </span>
      </p>
      {{-- @endforeach --}}
    </div><br>

    <div class="bg-white float-right rounded-xl shadow-xl p-4">
      <p class="font-bold text-xl text-yellow-400"><i class='bx bxs-comment-check'></i>
        {{ __('Most Post Commented')}}
      </p>
      <hr>
      <div class="flex flex-col">
      @foreach($MostPostCommented as $post)
        <div class="mt-3 mb-2 font-bold hover:underline cursor-pointer">{{ $post->title }}&nbsp;<span class="py-1 px-1 bg-green-500 rounded-lg text-white font-bold">{{ $post->comments->count() }}<span></div>
      @endforeach
      </div>
    </div><br>
</div>
