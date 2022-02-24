<div class="flex items-center min-h-screen bg-transparent">
  <div
    class="flex-1 h-full max-w-5xl mx-auto bg-white rounded-lg"
  >
    <div class="flex flex-col md:flex-row">
      <div class="h-32 md:h-auto md:w-1/2">
        <img
          class="object-cover w-full h-full"
          src="/img/event5.jpg"
          alt="img"
        />
      </div>
      <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
        <div class="w-full">
          <a href="{{ url('/home') }}" id="previous" class="mb-2 py-2 px-1 cursor-pointer rounded-full text-gray-300 hover:text-gray-800">
            <i class='bx bx-left-arrow-alt text-2xl'></i>
          </a>
          <h6 class="mb-4 text-sm text-gray-300" id="steps">Participation</h6>
          <h3 class="mb-4 text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-pink-500 via-indigo-300 to-gray-300">
            {{ $event->title }}
          </h3>
          <div id="hideforstatus">
          <div class="flex flex-wrap mx-auto">
            <a
              class="
                inline-flex
                items-center
                justify-center
                w-1/2
                py-3
                font-medium
                leading-none
                tracking-wider
                text-indigo-500
                bg-indigo-100
                border-b-4 border-indigo-500
                rounded-t
                sm:px-6 sm:w-auto sm:justify-start
                participer
              "
            >
              Participer
            </a>
          </div>
          {{-- participation part --}}
        <form class="shadow-none bg-transparent w-full m-3" action="{{ route('event.participation.store', ['event' => $event->id ])}}" method="POST">
          @csrf

          <div class="" id="participation">
          <div class="mt-4 mb-4">
            <label class="block text-sm font-semibold text-indigo-400 float-left"> First Name <span class="text-red-500">*</span> </label>
            <input
              type="text"
              class="
                firstform
                w-96
                px-4
                py-2
                text-sm
                border
                rounded-md
                focus:border-blue-400
                focus:outline-none
                focus:ring-1
                focus:ring-blue-600
              "
              placeholder="First Name"
              name="firstname"
            />
          </div>
          <div class="mb-4">
            <label class="block mb-2 text-sm font-semibold text-indigo-400 float-left"> Last Name <span class="text-red-500">*</span> </label>
            <input
              type="text"
              class="
              firstform
                w-full
                px-4
                py-2
                text-sm
                border
                rounded-md
                focus:border-blue-400
                focus:outline-none
                focus:ring-1
                focus:ring-blue-600
              "
              placeholder="Last Name"
              name="lastname"
            />
          </div>
          <div class="mb-4">
            <label class="block mb-2 text-sm font-semibold text-indigo-400 float-left"> Phone Number <span class="text-red-500">*</span> </label>
            <input
              class="
              firstform
                w-full
                px-4
                py-2
                text-sm
                border
                rounded-md
                focus:border-blue-400
                focus:outline-none
                focus:ring-1
                focus:ring-blue-600
              "
              placeholder="Phone Number"
              type="number"
              name="number"
            />
          </div>
          <div class="mb-4">
            <label class="block mb-2 text-sm font-semibold text-indigo-400 float-left"> E-mail <span class="text-red-500">*</span> </label>
            <input
              class="
              firstform
                w-full
                px-4
                py-2
                text-sm
                border
                rounded-md
                focus:border-blue-400
                focus:outline-none
                focus:ring-1
                focus:ring-blue-600
              "
              placeholder="E-mail"
              type="email"
              name="email"
            />
          </div>

          <label class="block mt-10 mb-2 text-base font-semibold text-green-500"> Si vous voulez cotisé veuillez remplir ces champs </label>

          <hr>

          <div class="mb-4 mt-4">
            <label class="block mb-2 text-sm font-semibold text-indigo-400 float-left"> Montant <span class="">*</span> </label>
            <input
              class="
                w-full
                px-4
                py-2
                text-sm
                border
                rounded-md
                focus:border-blue-400
                focus:outline-none
                focus:ring-1
                focus:ring-blue-600
              "
              placeholder="Montant"
              type="number"
              name="montant"
            />
          </div>
          
          
          <div class="mb-4">
            <label class="block mb-2 text-sm font-semibold text-indigo-400 float-left"> Ajouter un commentaire <span class="">*</span> </label>
            <textarea
              class="
                w-full
                h-3/3
                px-4
                py-2
                text-sm
                border
                rounded-md
                focus:border-blue-400
                focus:outline-none
                focus:ring-1
                focus:ring-blue-600
                bg-gray-100
              "
              placeholder="Ajouter qlq chose"
              type="text"
              name="commentaire"
            ></textarea>
            
            <x-errors color="red"></x-errors>
          
          <div class="flex justify-between">
          <a
              class="
                px-6
                py-2
                mt-4
                text-sm
                font-semibold
                leading-5
                text-center text-indigo-500
                transition-colors
                duration-150
                border border-transparent
                rounded-lg
                hover:text-indigo-700
                hover:bg-indigo-50
                focus:outline-none
              "
              href="{{ route('event.cotisation.create', ['event' => $event->id ])}}"
            >
              Cotiser sans participation
          </a>
            <button
              class="
                px-6
                py-2
                mt-4
                text-xs
                font-semibold
                leading-5
                text-center text-white
                transition-colors
                duration-150
                bg-indigo-400
                border border-transparent
                rounded-lg
                hover:bg-indigo-700
                focus:outline-none
              "
              id="save"
            >
            
            <i class='bx bx-save text-sm' ></i>
              Enregistrer
            </button>
            
            <div class="flex justify-center items-center" id="loader">
              <div class="animate-spin rounded-full h-5 w-5 border-b-2 border-indigo-700"></div>
            </div>


          </div>
          </div>

          {{-- hide for status --}}
          </div>

        </form>

          </div>

          {{-- status --}}
          @if(session('status'))
      
          <script> 
              const hideForStatus = document.getElementById("hideforstatus");
              hideForStatus.style.display = "none";
              document.getElementById("previous").style.display = "none";
              </script>
            
            <a href="{{ url('/home') }}" id="previous"  class="mb-2 py-2 px-1 cursor-pointer rounded-full text-gray-300 hover:text-gray-800">
              <i class='bx bx-left-arrow-alt text-2xl'></i><span>Retourner</span>
            </a>
            
            <div class="relative px-6 pt-8 pb-6 text-green-700 rounded-lg bg-green-50" role="alert">
              
              <svg class="mx-auto w-16 h-16 animate-pulse" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              
              <div class="max-w-xs mt-4 m-auto">
                <h3 class="text-lg font-bold text-center " >
                  {{ session('status') }}
                </h3>
                
              
              </div>
              </div>
            </div>
            
            @endif
            {{-- end status --}}
        </div>
      </div>
    </div>
  </div>
</div>


<script>

const saveBtn = document.getElementById("save");// enregistrer btn 
document.getElementById("loader").style.display = "none";

saveBtn.addEventListener("click", function(){
  document.getElementById("loader").style.display = "block";
  saveBtn.classList.remove("text-white", "bg-indigo-400", "hover:bg-indigo-700");
  saveBtn.classList.add("text-gray-500", "bg-gray-300", "hover:bg-gray-300");
});
</script>
