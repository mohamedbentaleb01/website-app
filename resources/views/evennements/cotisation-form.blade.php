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
            <h6 class="mb-4 text-sm text-gray-300" id="steps">Cotiser sans participation</h6>
          </a>
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
              cotiser
            </a>
          </div>
          {{-- costisation part --}}

      <form class="shadow-none bg-transparent w-full m-3" action="{{ route('event.cotisation.store', ['event' => $event->id ])}}" method="POST">
        @csrf

        <div class="mt-2" id="cotisation">
          <div class="mb-4" id="FirstName">
            <label class="block mb-2 text-sm font-semibold text-indigo-400 float-left"> First Name <span class="text-red-600">*</span> </label>
            <input
              class="
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
              type="text"
              name="firstname"
            />
          </div>

          <div class="mb-4" id="LastName">
            <label class="block mb-2 text-sm font-semibold text-indigo-400 float-left"> Last Name <span class="text-red-600">*</span> </label>
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
              placeholder="Last Name"
              type="text"
              name="lastname"
              
            />
          </div>

          <div class="mb-4" id="Email">
            <label class="block mb-2 text-sm font-semibold text-indigo-400 float-left"> E-mail <span class="text-red-600">*</span> </label>
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
              placeholder="E-mail"
              type="email"
              name="email"
              
            />
          </div>
          
          <div class="mb-4">
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

            <div class="flex justify-end">
            <button
              class="
                px-6
                py-2
                mt-4
                text-sm
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
            
            <i class='bx bx-save text-xl' ></i>
              Enregistrer
            </button>

            <div class="flex justify-center items-center" id="loader">
              <div class="animate-spin rounded-full h-5 w-5 border-b-2 border-indigo-700"></div>
            </div>

            </div>
          
          </div>
        </div>
      </form>

      
    </div>
          
          {{-- cotisation End --}}
          
          {{-- status --}}
          @if(session('status'))
      
          <script> 
              const hideForStatus = document.getElementById("hideforstatus");
              hideForStatus.style.display = "none";
              document.getElementById("previous").style.display = "none";
              </script>
            
            <a id="previous" href="{{ url('/home')}}" class="mb-2 py-2 px-1 cursor-pointer rounded-full text-gray-300 hover:text-gray-800">
              <i class='bx bx-left-arrow-alt text-2xl'></i><span>Retourner</span>
            </a>
            
            <div class="relative px-6 pt-8 pb-6 text-green-700 rounded-lg bg-green-50" role="alert">
              
              <svg class="mx-auto w-16 h-16 animate-pulse" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              
              <div class="max-w-xs mt-4 m-auto">
                <h3 class="text-lg font-bold text-center" >
                  {{ session('status') }}
                  Cotisation envoyé !
                </h3>

                <em class="text-xs text-gray-500 font-mono">
                  <i class='bx bx-info-circle'></i> 
                  L'admin va vous communiqué dans les prochains délai
                </em>
              </div>

              </div>
            </div>
            
            @endif
            {{-- end status --}}
            
          </div>
          </div>
      
          
{{--        --}}
<script type="text/javascript">

// const slidePage1 = document.querySelector("#participation"); // participation form 
// const firstNextBtn = document.querySelector("#nextBtn"); // boutton suivant
// const slidePage2 = document.querySelector("#cotisation"); //cotisation form
// const steps = document.getElementById("steps");// steps
// const section2 = document.querySelector(".cotiser");// link 2
// const section1 = document.querySelector(".participer");// link 1 
// const secondBackBtn = document.querySelector("#secondBackBtn");// btn cotiser sans ...
// const previousBtn = document.querySelector("#previous");
const saveBtn = document.getElementById("save");// enregistrer btn 


// slidePage2.style.display = "none";
// previousBtn.style.display = "none";
// document.getElementById("error-msg").style.display = "none";
// document.getElementById("info-msg").style.display = "none";
document.getElementById("loader").style.display = "none";

// // event 1
// firstNextBtn.addEventListener("click", function(){
// // check all inputs if there filled
//   const inputFeilds = document.querySelectorAll(".firstform");
//     const validInputs = Array.from(inputFeilds).filter( input => input.value !== "");
//     const invalidInputs = Array.from(inputFeilds).filter( input => input.value === "");

//     let allFilled = validInputs.length;

//     if(allFilled === 4){

//             slidePage1.style.marginTop = "-125%";
//             slidePage1.style.display = "none";
            
//             slidePage2.style.display = "block";//display cotisation form
//             steps.innerHTML = 'Step2/2';// steps
          
//             section1.classList.remove("border-indigo-500", "text-indigo-500", "bg-indigo-100");
//             section1.classList.add("border-gray-200");
//             section1.style.backgroundColor = "transparent";
          
//             section2.classList.remove("border-gray-200");
//             section2.classList.add("border-indigo-500", "text-indigo-500", "bg-indigo-100");

//             // hide other elements 
//             document.querySelector("#FirstName").style.display = "none";
//             document.querySelector("#LastName").style.display = "none";
//             document.querySelector("#Email").style.display = "none";
//             document.getElementById("info-msg").style.display = "block";

//           }
//           else{
//               document.getElementById("error-msg").style.display = "block";

//               invalidInputs.map( input => {
//               input.style.border = "1px solid #e74c3c";
//             });
//           }
            
// });

// // event 2

// secondBackBtn.addEventListener("click", function(){
//   slidePage1.style.marginTop = "-125%";
//   slidePage1.style.display = "none";

//   slidePage2.style.display = "block";//display cotisation form
//   steps.style.display = "none";

//   previousBtn.style.display = "block";// previous btn

//   section1.style.display = "none"; //hide link

//   section2.classList.remove("border-gray-200");
//   section2.classList.add("border-indigo-500", "text-indigo-500", "bg-indigo-100");
// });

//event3
saveBtn.addEventListener("click", function(){
  document.getElementById("loader").style.display = "block";
  saveBtn.classList.remove("text-white", "bg-indigo-400", "hover:bg-indigo-700");
  saveBtn.classList.add("text-gray-500", "bg-gray-300", "hover:bg-gray-300");
});


</script>
     