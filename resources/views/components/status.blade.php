@if(session('status'))
    <span class="flex flex-wrap mt-4 mb-4 w-1/2 justify-center items-center m-auto border-l-8 border-{{ $color }}-800 py-2 px-2 text-center bg-{{ $color }}-300 text-{{ $color }}-700 font-semibold">
  <i class='bx bx-check'></i> {{ session('status') }}
</span>
@endif
