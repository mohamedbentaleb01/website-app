<div class="flex flex-col mb-4 md:w-full mt-5">

    <label class="mb-4 font-bold text-lg text-gray-800 md:ml-2 underline">Select a categorie :</label>
      <div class="flex flex-wrap-reverse justify-between mb-4">
        @foreach($categories as $categorie)
        <div class="form-check">
          <input name="categorie[]" class="form-check-input m-1 h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 my-1 align-top bg-no-repeat bg-center bg-contain float-left cursor-pointer" type="checkbox" value="{{ $categorie->id }}"
          id="flexCheckDefault">
          <label class="form-check-label inline-block text-gray-400 font-medium" for="flex">{{ $categorie->name }}</label>
        </div>
        @endforeach
        <em class="font-extralight text-red-400 float-left text-xs">/* Ces champs ne sont pas obligatoires.</em>
      </div>



    <label class="mb-2 tracking-wide font-bold text-lg text-gray-800 underline " for="">Post Title :</label>
    <input class="
                bg-gray-200 
                  py-2 px-3 
                  text-grey-darkest 
                  md:mr-2
                  w-full 
                  rounded-md
                  focus:outline-none
                  shadow-md
                " type="text" name="title" placeholder="Place title here" id=""
                @if(Route::is('Forum.edit'))
                  value="{{ old('title', $post->title ?? null) }}"
                @endif>
  </div>

  <div class="flex flex-col mb-4 md:w-full">
    <label class="mb-2 font-bold text-lg text-gray-800 md:ml-2 underline" for="">Post Content :</label>
    <textarea class="border bg-gray-200 py-2 px-3 w-full h-36 text-grey-darkest md:ml-2 rounded-xl shadow-md focus:outline-none " placeholder="content here" type="text" name="content" id=""
    onkeypress>
    @if(Route::is('Forum.edit'))
        {{ old('content', $post->content ?? null) }}
     @endif

    </textarea>
    <em class="text-gray-400 mt-1">Feel free to post anything :)</em>
  </div>

  <div class="flex flex-col md:1/2 mb-10">
      <label for="formFileMultiple" class="mb-2 font-bold text-lg text-gray-800 md:ml-2 underline">Post images :</label>
      <input class="form-control
      block
      w-full
      px-3
      py-1.5
      text-base
      font-normal
      text-gray-700
      bg-clip-padding
      border border-solid border-gray-300
      bg-gray-200
      rounded
      transition
      ease-in-out
      m-0
      focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="file" name="images[]" id="formFileMultiple" value="{{ old('images[]', $post->image ?? null)}}" multiple>

      @if(Route::is('Forum.edit'))
      <div class="flex flex-wrap bg-gray-800 py-5 px-5 shadow-xl">
        @foreach($post->image as $image)
          <img src="{{ $image->url() }}" alt="" class="flex justify-center m-auto mt-2 h-40 w-40"/>
        @endforeach
      </div>
     
  </div>


    <div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">
      <input type="checkbox" name="toggle" id="toggle" class="toggle-checkbox absolute block w-4 h-4 rounded-full bg-white border-2 appearance-none cursor-pointer"/>
      <label for="toggle" class="toggle-label block overflow-hidden h-7 rounded-full bg-gray-300 cursor-pointer"></label>
    </div> 
    <label class="form-check-label inline-block text-gray-800" for=""><i class='bx bx-pin'></i>Pin your post</label>
    
    <style>
    .toggle-checkbox:checked {
      @apply: right-0 border-green-400;
      right: 0;
      border-color: #68D391;
    }
    .toggle-checkbox:checked + .toggle-label {
      @apply: bg-green-400;
      background-color: #68D391;
    }
    </style>
  
  @endif

  <x-errors color="red"></x-errors>
  

  
  




