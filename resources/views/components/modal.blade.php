{{-- @foreach($post->comments as $comment) --}}

{{-- modal toggle --}}
<div class="fixed z-10 overflow-y-auto top-0 w-full left-0 hidden" id="modal">
    <div class="flex items-center justify-center min-height-100vh pt-4 px-4 pb-20 text-center sm:block sm:p-0">
      <div class="fixed inset-0 transition-opacity">
        <div class="absolute inset-0 bg-gray-900 opacity-75" />
      </div>
      <span class="hidden sm:inline-block sm:align-middle sm:h-screen">&#8203;</span>
      <div class="inline-block align-center bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
          <form class="shadow-none p-0 m-0" action="{{ route('posts.comment.update', [ 'post' =>  $post , 'comment' =>  $comment  ])}}" method="POST"> 
            @method('PUT')
            @csrf        
          <label class="font-bold underline">Commentaire :</label>
          <input type="text" id="comment" class="w-full h-36 bg-gray-100 p-2 mt-2 mb-3" placeholder="modifier commentaire" name="content" />
           {{-- display errors --}} 
           <x-errors color="red"></x-errors>
          <input type="hidden" name="id" id="comment-id"/>
        </div>
       
        <div class="bg-gray-200 px-4 py-3 text-right">
            
          <button type="button" class="py-2 px-4 bg-gray-400 text-white rounded hover:bg-gray-700 mr-2" onclick="toggleModal()"><i class="fas fa-times"></i> Cancel</button>
          <button type="submit" class="py-2 px-4 bg-gray-800 text-white rounded hover:bg-gray-700 mr-2"><i class="fas fa-plus"></i> Enregistrer</button>
        </form>
        </div>
      </div>
    </div>
  </div>
  {{-- end modal --}}

{{-- @endforeach --}}
