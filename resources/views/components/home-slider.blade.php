<link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet"> 

		<style>
			.carousel-open:checked + .carousel-item {
				position: static;
				opacity: 100;
			}
			.carousel-item {
				-webkit-transition: opacity 0.6s ease-out;
				transition: opacity 0.6s ease-out;
			}
			#carousel-1:checked ~ .control-1,
			#carousel-2:checked ~ .control-2,
			#carousel-3:checked ~ .control-3 {
				display: block;
			}
			.carousel-indicators {
				list-style: none;
				margin: 0;
				padding: 0;
				position: absolute;
				bottom: 2%;
				left: 0;
				right: 0;
				text-align: center;
				z-index: 10;
			}
			#carousel-1:checked ~ .control-1 ~ .carousel-indicators li:nth-child(1) .carousel-bullet,
			#carousel-2:checked ~ .control-2 ~ .carousel-indicators li:nth-child(2) .carousel-bullet,
			#carousel-3:checked ~ .control-3 ~ .carousel-indicators li:nth-child(3) .carousel-bullet {
				color: #2b6cb0;  /*Set to match the Tailwind colour you want the active one to be */
			}
            @media screen and (max-width: 1100px){
                .carousel{
                    width: 90%;
                    margin-left: auto;   
                }
            }
		</style>



<div class="font-sans leading-normal tracking-normal w-5/6 ml-auto">

<div class="carousel relative shadow-2xl bg-white">
	<div class="carousel-inner relative overflow-hidden w-full">
	  <!--Slide 1-->
		<input class="carousel-open" type="radio" id="carousel-1" name="carousel" aria-hidden="true" hidden="" checked="checked">
		<div class="carousel-item absolute opacity-0" style="height:50vh;">
            {{-- @foreach($latestEvent as $event) --}}
			<div class="block h-full w-auto bg-cover bg-center bg-no-repeat text-white font-bold text-3xl text-center " style="background-image: url('/img/event5.jpg')">Nos derniers evennements:
                <div class="bg-black opacity-70 mt-40 h-full flex justify-center">
                {{-- <div class="block h-full w-3/4 text-center text-white text-2xl underline">{{ $latestEvent->title}} :</div> --}}
                <div class="block h-full w-3/4 text-center text-white text-xl m-3">
                <a href="" class=" py-2 px-2 bg-white text-black text-sm font-bold hover:underline hover:bg-gray-800 hover:text-white">Voir plus</a>
                </div>
            </div>
            </div>
            {{-- @endforeach --}}
        </div>
		
	</div>
</div>

</div>

